@extends('superadmin.layouts.main')
@extends('superadmin.layouts.top_bar')
@section('page_title', 'Shops')

@section('header_styles')
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admin/assets/plugins/custom/vis-timeline/vis-timeline.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendor Stylesheets-->
@endsection

@section('header_scripts')
@endsection

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar py-5 py-lg-5" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column me-3">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Reports</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">
                        <a href="{{ url('/super-admin/dashboard') }}" class="text-gray-600 text-hover-primary">Dashboard</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">Reports</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            {{-- Optional Actions --}}
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-body">
                <!-- START: UPDATED SECTION -->
                <div class="mb-10">
                    <h2 class="fw-bolder">Generate Reports</h2>
                    <div class="text-muted fw-bold fs-7">Select your criteria to preview or download a report.</div>
                </div>

                <form id="reportForm">
                    <div class="row g-5">
                        <!-- Report Type -->
                        <div class="col-md-6">
                            <label for="report_type" class="form-label fw-bold">Report Type</label>
                            <select name="report_type" id="report_type" class="form-select" data-control="select2" data-hide-search="true">
                                <option value="sales">Sales Report</option>
                                <option value="warranty">Warranty Claims</option>
                                <option value="inventory">Inventory Report</option>
                                <option value="revenue">Revenue Report</option>
                                <option value="discounts">Discount Report</option>
                            </select>
                        </div>

                        <!-- Shop -->
                        <div class="col-md-6">
                            <label for="shop_id" class="form-label fw-bold">Select Shop</label>
                            <select name="shop_id" id="shop_id" class="form-select" data-control="select2" data-placeholder="Select a shop...">
                                <option value="">All Shops</option>
                                @foreach($shops as $shop)
                                    <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Start Date -->
                        <div class="col-md-6">
                            <label for="start_date" class="form-label fw-bold">Start Date</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" required>
                        </div>

                        <!-- End Date -->
                        <div class="col-md-6">
                             <label for="end_date" class="form-label fw-bold">End Date</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" required>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="d-flex gap-3 mt-8">
                        <button type="button" id="previewReport" class="btn btn-success w-100">Preview Report</button>
                        <button type="button" id="downloadReport" class="btn btn-secondary w-100">Download Excel</button>
                    </div>
                </form>
                <!-- END: UPDATED SECTION -->
            </div>
        </div>

        <!-- START: NEW CONTAINER FOR SUMMARY CARD -->
        <div id="summaryCardContainer" class="mt-10">
            <!-- The summary card will be injected here -->
        </div>
        <!-- END: NEW CONTAINER FOR SUMMARY CARD -->

        <!-- START: CONTAINER FOR PREVIEW TABLE -->
        <div id="reportPreviewContainer" class="mt-5">
            <!-- The report preview table will be injected here -->
        </div>
        <!-- END: CONTAINER FOR PREVIEW TABLE -->
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <!-- START: UPDATED JAVASCRIPT -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Attach event listeners to the buttons
            document.getElementById("previewReport").addEventListener("click", function() {
                fetchReportData(generateHtmlTable);
            });

            document.getElementById("downloadReport").addEventListener("click", function() {
                fetchReportData(function(data, reportType) {
                    if (!data || data.length === 0) {
                        alert("No data available to download for the selected criteria.");
                        return;
                    }
                    generateExcel(data, reportType);
                });
            });
        });

        function fetchReportData(onSuccess) {
            let reportType = document.getElementById("report_type").value;
            let shopId = document.getElementById("shop_id").value;
            let startDate = document.getElementById("start_date").value;
            let endDate = document.getElementById("end_date").value;

            // Date validation (excluding inventory which doesn't need dates)
            if (reportType !== 'inventory' && (!startDate || !endDate)) {
                alert('Please select both a start and end date for this report type.');
                return;
            }

            const previewContainer = document.getElementById("reportPreviewContainer");
            const summaryContainer = document.getElementById("summaryCardContainer");
            previewContainer.innerHTML = `<div class="d-flex justify-content-center align-items-center p-5"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><span class="ms-3">Fetching report data...</span></div>`;
            summaryContainer.innerHTML = ""; // Clear previous summary

            const apiUrl = `/api/reports/data?report_type=${reportType}&shop_id=${shopId}&start_date=${startDate}&end_date=${endDate}`;

            fetch(apiUrl)
                .then(response => response.json())
                .then(result => {
                    if (result.error) {
                         throw new Error(result.error);
                    }
                    onSuccess(result.data, reportType);
                })
                .catch(error => {
                    console.error("Error fetching report:", error);
                    previewContainer.innerHTML = `<div class="alert alert-danger">An error occurred while fetching the report: ${error.message}</div>`;
                });
        }

        function generateHtmlTable(data, reportType) {
            const previewContainer = document.getElementById("reportPreviewContainer");
            const summaryContainer = document.getElementById("summaryCardContainer");

            // Clear previous results
            previewContainer.innerHTML = "";
            summaryContainer.innerHTML = "";

            if (!data || data.length === 0) {
                previewContainer.innerHTML = `<div class="alert alert-warning text-center">No data available for the selected criteria.</div>`;
                return;
            }

            // --- START: SUMMARY CARD LOGIC ---
            if (reportType === 'sales') {
                // Calculate total sales from the 'Total Price' column
                const totalSales = data.reduce((sum, sale) => sum + (parseFloat(sale['Total Price']) || 0), 0);
                const formattedTotal = totalSales.toLocaleString('en-US', { minimumFractionDigits: 2, maximumFractionDigits: 2 });

                const cardHtml = `
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-flush bg-gray-100 bg-opacity-70 rounded-2 px-6 py-5 h-100">
                                <div class="d-flex justify-content-between">
                                    <div class="symbol symbol-30px me-5 mb-8">
                                        <span class="symbol-label">
                                            <i class="fas fa-chart-line fs-2qx text-primary"></i>
                                        </span>
                                    </div>
                                    <div class="text-end">
                                        <span class="text-dark fw-boldest d-block fs-2qx lh-1 mb-1">${formattedTotal}</span>
                                        <span class="text-gray-500 fw-semibold fs-6">Total Sales</span>
                                    </div>
                                </div>
                                <div class="mt-auto">
                                    <span class="text-gray-700 fw-bold fs-6">Sum of Sales in Period</span>
                                </div>
                            </div>
                        </div>
                    </div>`;
                summaryContainer.innerHTML = cardHtml;
            }
            // --- END: SUMMARY CARD LOGIC ---

            const headers = Object.keys(data[0]);
            const reportTitle = reportType.replace(/_/g, ' ').replace(/\b\w/g, l => l.toUpperCase());

            let tableHtml = `<div class="card shadow-sm"><div class="card-header"><h3 class="card-title">${reportTitle} Preview</h3></div><div class="card-body py-3"><div class="table-responsive">`;
            // Add the table-bordered class for borders
            tableHtml += `<table class="table table-striped table-row-bordered gy-5 gs-7">`;
            tableHtml += `<thead><tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">`;
            headers.forEach(header => {
                tableHtml += `<th>${header}</th>`;
            });
            tableHtml += `</tr></thead><tbody>`;

            data.forEach(row => {
                tableHtml += `<tr>`;
                headers.forEach(header => {
                    const value = row[header] !== null && row[header] !== undefined ? row[header] : '';
                    tableHtml += `<td>${value}</td>`;
                });
                tableHtml += `</tr>`;
            });

            tableHtml += `</tbody></table></div></div></div>`;
            previewContainer.innerHTML = tableHtml;
        }

        function generateExcel(data, reportType) {
            let worksheet = XLSX.utils.json_to_sheet(data);
            let workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "Report");
            XLSX.writeFile(workbook, `${reportType}_report.xlsx`);
        }
    </script>
    <!-- END: UPDATED JAVASCRIPT -->
@endsection

@section('footer_modals')
@endsection

@section('footer_scripts')
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{asset('admin/assets/js/widgets.bundle.js')}}"></script>
    <script src="{{asset('admin/assets/js/custom/widgets.js')}}"></script>
    <!--end::Page Custom Javascript-->

    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{asset('admin/assets/plugins/custom/vis-timeline/vis-timeline.bundle.js')}}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
@endsection