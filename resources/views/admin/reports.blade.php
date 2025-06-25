@extends('admin.layouts.main')
@extends('admin.layouts.top_bar')
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
                        <a href="{{ url('/admin-panel/dashboard') }}" class="text-gray-600 text-hover-primary">Dashboard</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">Reports</li>
                    <!--end::Item-->
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
            <!--begin::Actions-->
            <div class="d-flex align-items-center py-2 py-md-1">

                <!--begin::Button-->
                <span data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="Add">
                    <a href="javascript:add_modal();"
                        class="btn btn-icon btn-primary fw-bolder w-100 px-4  btn-hover-scale"><i
                            class="las la-plus fs-2 me-4  "></i> Add</a>
                </span>

            </div>
            <!--end::Actions-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Toolbar-->
    <div class="container">
        <div class="row gy-lg-5 g-xl-10">
            <div class="col-12">

                <!--begin::Toolbar-->
                <div class="d-flex flex-wrap flex-stack pt-10 pb-8">
                    <!--begin::Heading-->
                    <h1 class="fw-bolder my-2">Download Reports
                    </h1>
                    <!--end::Heading-->

                </div>
                <!--end::Toolbar-->
                <form id="reportForm">
                    <select name="report_type" id="report_type" class="form-control mb-2">
                        <option value="sales">Sales Report</option>
                        <option value="warranty">Warranty Claims</option>
                        <option value="inventory">Inventory Report</option>
                        <option value="revenue">Revenue Report</option>
                        <option value="discounts">Discount Report</option>
                    </select>
                    <select name="shop_id" id="shop_id" class="form-control mb-2">
                        <option value="">All Shops</option>
                        @foreach($shops as $shop)
                            <option value="{{ $shop->id }}">{{ $shop->name }}</option>
                        @endforeach
                    </select>
                    <input type="date" id="start_date" name="start_date" class="form-control mb-2" required>
                    <input type="date" id="end_date" name="end_date" class="form-control mb-2" required>
                    <button type="button" id="downloadReport" class="btn btn-lg btn-primary w-100 mb-5">Download
                        Excel</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script>
        document.getElementById("downloadReport").addEventListener("click", function () {
            let reportType = document.getElementById("report_type").value;
            let shopId = document.getElementById("shop_id").value;
            let startDate = document.getElementById("start_date").value;
            let endDate = document.getElementById("end_date").value;

            fetch(`/api/reports/data?report_type=${reportType}&shop_id=${shopId}&start_date=${startDate}&end_date=${endDate}`)
                .then(response => response.json())
                .then(data => {
                    if (!data.data.length) {
                        alert("No data available for the selected criteria.");
                        return;
                    }
                    generateExcel(data.data, reportType);
                })
                .catch(error => console.error("Error:", error));
        });

        function generateExcel(data, reportType) {
            let worksheet = XLSX.utils.json_to_sheet(data);
            let workbook = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(workbook, worksheet, "Report");

            XLSX.writeFile(workbook, `${reportType}_report.xlsx`);
        }
    </script>
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
    <script src="{{url('https://cdn.amcharts.com/lib/5/index.js')}}"></script>
    <script src="{{url('https://cdn.amcharts.com/lib/5/geodata/worldLow.js')}}"></script>
    <script src="{{url('https://cdn.amcharts.com/lib/5/geodata/continentsLow.js')}}"></script>
    <script src="{{url('https://cdn.amcharts.com/lib/5/geodata/usaLow.js')}}"></script>
    <script src="{{url('https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js')}}"></script>
    <script src="{{url('https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js')}}"></script>
    <script src="{{url('https://cdn.amcharts.com/lib/5/themes/Animated.js')}}"></script>
    <script src="{{url('https://cdn.amcharts.com/lib/5/xy.js')}}"></script>
    <script src="{{url('https://cdn.amcharts.com/lib/5/percent.js')}}"></script>
    <script src="{{url('https://cdn.amcharts.com/lib/5/radar.js')}}"></script>



@endsection
