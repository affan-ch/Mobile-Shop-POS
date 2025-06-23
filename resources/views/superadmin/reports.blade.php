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
                        <a href="{{ url('/super-admin/dashboard') }}" class="text-gray-600 text-hover-primary">Dashobard</a>
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
                    <!--begin::Controls-->
                    <div class="d-flex flex-wrap my-1">
                        <!--begin::Tab nav-->
                        <ul class="nav nav-pills me-5">
                            <li class="nav-item m-0">
                                <a class="btn btn-sm btn-icon btn-light btn-color-muted btn-active-primary active"
                                    data-bs-toggle="tab" href="#kt_project_targets_table_pane">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path
                                                d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                                fill="black" />
                                            <path opacity="0.3"
                                                d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                                fill="black" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                            </li>
                        </ul>
                        <!--end::Tab nav-->
                    </div>
                    <!--end::Controls-->
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
