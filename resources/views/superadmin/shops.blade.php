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
                <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Shops</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">
                        <a href="{{ url('/super-admin/dashboard') }}" class="text-gray-600 text-hover-primary">Dashboard</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">Shops</li>
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


    <!--begin::Container-->
    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">


            <!--begin::Row-->
            <div class="row gy-lg-5 g-xl-10">
                <div class="col-12">

                    <!--begin::Toolbar-->
                    <div class="d-flex flex-wrap flex-stack pt-10 pb-8">
                        <!--begin::Heading-->
                        <h1 class="fw-bolder my-2">Shops
                        </h1>
                        <!--end::Heading-->
                    </div>
                    <!--end::Toolbar-->


                    <!--begin::Tab Content-->
                    <div class="tab-content">

                        <!--begin::Tab pane-->
                        <div id="kt_project_targets_table_pane" class="tab-pane fade  show active">

                            <div class="card card-p-0 card-flush">
                                <div class="card-header align-items-center p-5 gap-2 gap-md-5">
                                    <div class="card-title">
                                        <!--begin::Search-->
                                        <div class="d-flex align-items-center position-relative my-1">
                                            <span class="svg-icon svg-icon-1 position-absolute ms-4"><i
                                                    class="fa fa-search"></i> </span>
                                            <input type="text" data-kt-filter="search"
                                                class="form-control form-control-solid w-250px ps-14"
                                                placeholder="Search here" />
                                        </div>
                                        <!--end::Search-->
                                        
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <table class="table align-middle border rounded table-row-dashed fs-6 g-5"
                                        id="kt_datatable_example_1">
                                        <thead>
                                            <!--begin::Table row-->
                                            <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase">
                                                <th class="min-w-100px">#</th>
                                                <th class="min-w-100px">Name</th>
                                                <th class="min-w-100px">Email</th>
                                                <th class="min-w-100px">Password</th>
                                                <th class="min-w-100px">Status</th>
                                                <th class="min-w-100px">Admin Status</th>
                                                <th class="min-w-100px pe-5">Actions</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <tbody class="fw-bold text-gray-600">

                                            @forelse($shops as $admin)
                                                <tr class="odd">
                                                    <td>
                                                        <a href="#"
                                                            class="text-dark text-hover-primary">{{ $loop->iteration }}</a>
                                                    </td>


                                                    <td>
                                                        <a href="#"
                                                            class="text-dark text-hover-primary">{{ $admin->name }}</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-dark text-hover-primary">{{ $admin->email }}</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-dark text-hover-primary">{{ $admin->password }}</a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-dark text-hover-primary">
                                                            @if ($admin->status == 1)
                                                                Blocked
                                                            @elseif($admin->status == 0)
                                                                Un Blocked
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td>
                                                        <a href="#" class="text-dark text-hover-primary">
                                                            @if ($admin->blocked_by_admin == 1)
                                                                Blocked
                                                            @elseif($admin->blocked_by_admin == 0)
                                                                Un Blocked
                                                            @endif
                                                        </a>
                                                    </td>

                                                    <td class="text-end">
                                                        <!--begin::Menu-->
                                                        <div>
                                                            <button type="button"
                                                                class="btn btn-icon btn-light-primary w-100"
                                                                data-kt-menu-trigger="click"
                                                                data-kt-menu-placement="bottom-end">
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                                                <span class="svg-icon svg-icon-2 me-2">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                        height="24px" viewBox="0 0 24 24">
                                                                        <g stroke="none" stroke-width="1" fill="none"
                                                                            fill-rule="evenodd">
                                                                            <rect x="5" y="5" width="5"
                                                                                height="5" rx="1"
                                                                                fill="#000000" />
                                                                            <rect x="14" y="5" width="5"
                                                                                height="5" rx="1"
                                                                                fill="#000000" opacity="0.3" />
                                                                            <rect x="5" y="14" width="5"
                                                                                height="5" rx="1"
                                                                                fill="#000000" opacity="0.3" />
                                                                            <rect x="14" y="14" width="5"
                                                                                height="5" rx="1"
                                                                                fill="#000000" opacity="0.3" />
                                                                        </g>
                                                                    </svg>
                                                                </span>
                                                                <!--end::Svg Icon-->

                                                                Actions
                                                            </button>
                                                            <!--begin::Menu 3-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold w-200px py-3"
                                                                data-kt-menu="true">
                                                                <!--begin::Heading-->
                                                                <div class="menu-item px-3">
                                                                    <div
                                                                        class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">
                                                                        Actions</div>
                                                                </div>
                                                                <!--end::Heading-->
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="javascript:edit_modal('{{ $admin->id }}','{{ $admin->name }}','{{ $admin->email }}','{{ $admin->status }}');"
                                                                        class="btn btn-light-success fw-bolder mb-3 w-100"
                                                                        data-kt-menu-placement="bottom-end">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                                        <span
                                                                            class="fas fa-edit svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                                                        </span>
                                                                        <!--end::Svg Icon-->Edit
                                                                    </a>

                                                                </div>
                                                                <div class="menu-item px-3">
                                                                    <a href="javascript:edit_password('{{ $admin->id }}');"
                                                                        class="btn btn-light-success fw-bolder mb-3 w-100"
                                                                        data-kt-menu-placement="bottom-end">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                                        <span
                                                                            class="fas fa-edit svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                                                        </span>
                                                                        <!--end::Svg Icon-->Edit Password
                                                                    </a>

                                                                </div>
                                                                <div class="menu-item px-3">
                                                                    <a href="javascript:add_admin_modal('{{ $admin->id }}');"
                                                                        class="btn btn-light-success fw-bolder mb-3 w-100"
                                                                        data-kt-menu-placement="bottom-end">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                                        <span
                                                                            class="fas fa-add svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                                                        </span>
                                                                        <!--end::Svg Icon-->Add Admin
                                                                    </a>

                                                                </div>
                                                                <div class="menu-item px-3">
                                                                    <a href="javascript:showAdmins('{{ $admin->id }}');"
                                                                        class="btn btn-light-success fw-bolder mb-3 w-100"
                                                                        data-kt-menu-placement="bottom-end">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                                        <span
                                                                            class="fas fa-add svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                                                        </span>
                                                                        <!--end::Svg Icon-->View Admins
                                                                    </a>

                                                                </div>
                                                                <div class="menu-item px-3">
                                                                    <a href="{{ route('superadmin.inventory.show', $admin->id) }}"
                                                                        class="btn btn-light-success fw-bolder mb-3 w-100"
                                                                        data-kt-menu-placement="bottom-end">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                                        <span
                                                                            class="fas fa-eye svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                                                        </span>
                                                                        <!--end::Svg Icon-->View inventory
                                                                    </a>

                                                                </div>
                                                                <div class="menu-item px-3">
                                                                    <a href="{{ route('superadmin.invoice.show', $admin->id) }}"
                                                                        class="btn btn-light-success fw-bolder mb-3 w-100"
                                                                        data-kt-menu-placement="bottom-end">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                                        <span
                                                                            class="fas fa-eye svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                                                        </span>
                                                                        <!--end::Svg Icon-->View Sales
                                                                    </a>

                                                                </div>
                                                                <div class="menu-item px-3">
                                                                    <a href="{{ route('superadmin.claims.show', $admin->id) }}"
                                                                        class="btn btn-light-success fw-bolder mb-3 w-100"
                                                                        data-kt-menu-placement="bottom-end">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                                        <span
                                                                            class="fas fa-eye svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                                                        </span>
                                                                        <!--end::Svg Icon-->View Claims
                                                                    </a>

                                                                </div>
                                                                <!--end::Menu item-->
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="javascript:delete_modal('{{ $admin->id }}');"
                                                                        class="btn btn-light-danger fw-bolder mb-3 w-100"
                                                                        data-kt-menu-placement="bottom-end">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                                        <span
                                                                            class="bi bi-trash-fill svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                                                        </span>
                                                                        <!--end::Svg Icon-->Delete
                                                                    </a>

                                                                </div>
                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu 3-->
                                                        </div>
                                                        <!--end::Menu-->
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!--end::Tab pane-->
                    </div>
                    <!--end::Tab Content-->

                </div>
            </div>
            <!--end::Row-->




        </div>
        <!--end::Post-->
    </div>
    <!--end::Container-->





@endsection




@section('footer_modals')



    <div class="modal fade" tabindex="-1" id="add_modal">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Add Details</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black"></rect>
                            </svg>
                        </span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">

                    <!--begin::Form-->
                    <form class="form" method="post" action="{{ url('super-admin/shop/add') }}"
                        enctype="multipart/form-data" id="form_insert">
                        @csrf

                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                            data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">


                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input required type="text" name="name"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Name"
                                    value="{{ old('name') }}" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Email</label>
                                <!--end::Label-->

                                <!--begin::Input group-->
                                <div class="input-group">
                                    <input required type="email" name="email"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Email"
                                        value="{{ old('email') }}">

                                    </span>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Password</label>
                                <!--end::Label-->

                                <!--begin::Input group-->
                                <div class="input-group">
                                    <input required type="password" name="password"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Password">

                                    </span>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Confirm Password</label>
                                <!--end::Label-->

                                <!--begin::Input group-->
                                <div class="input-group">
                                    <input required type="password" name="password_confirmation"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Password">

                                    </span>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Input group-->

                        </div>
                        <!--end::Scroll-->

                        <div class="modal-footer px-0">
                            <!--begin::Actions-->
                            <div
                                class=" w-100 d-flex  justify-content-between flex-wrap flex-row-reverse flex-row-reverse">
                                <button type="submit" class="btn btn-primary ms-10" id="submit_btn" name="">
                                    <span class="indicator-label">
                                        Submit
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                    </form>
                    <!--end::Form-->
                </div>

            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" id="add_admin_modal">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Add Admins</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black"></rect>
                            </svg>
                        </span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">
                    <!--begin::Form-->
                    <form class="form" method="post" action="{{ url('super-admin/shop/add-admin') }}"
                        enctype="multipart/form-data" id="form_insert">
                        @csrf

                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                            data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                            <!--begin::Select-->
                            <div class="mb-3">

                                <label for="admin_select" class="form-label">Select Admin</label>
                                <select class="form-select" id="admin_select" name="admin_id" required>
                                    <option value="">Select an admin</option>
                                    @foreach ($admins as $admin)
                                        <option value="{{ $admin->id }}">{{ $admin->email }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Select-->

                        </div>
                        <!--end::Scroll-->

                        <div class="modal-footer px-0">
                            <input type="hidden" name="shop_id" id="add_admin_shop_id">
                            <!--begin::Actions-->
                            <div class="w-100 d-flex justify-content-between flex-wrap flex-row-reverse flex-row-reverse">
                                <button type="submit" class="btn btn-primary ms-10" id="submit_btn" name="">
                                    <span class="indicator-label">
                                        Submit
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                    </form>
                    <!--end::Form-->
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" id="edit_password_modal">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Password</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black"></rect>
                            </svg>
                        </span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">

                    <!--begin::Form-->
                    <form class="form" method="post" action="{{ url('super-admin/shop/update-password') }}"
                        enctype="multipart/form-data" id="form_insert">
                        @csrf

                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                            data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">


                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Password</label>
                                <!--end::Label-->

                                <!--begin::Input group-->
                                <div class="input-group">
                                    <input required type="password" name="password"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Password">

                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Confirm Password</label>
                                <!--end::Label-->

                                <!--begin::Input group-->
                                <div class="input-group">
                                    <input required type="password" name="password_confirmation"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Password">

                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Input group-->

                        </div>
                        <!--end::Scroll-->

                        <div class="modal-footer px-0">
                            <!--begin::Actions-->
                            <div
                                class=" w-100 d-flex  justify-content-between flex-wrap flex-row-reverse flex-row-reverse">

                                <input type="hidden" name="id" id="edit_password_id">
                                <button type="submit" class="btn btn-primary ms-10" id="submit_btn" name="">
                                    <span class="indicator-label">
                                        Submit
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                    </form>
                    <!--end::Form-->
                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" id="view_modal">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">View Card Details</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black"></rect>
                            </svg>
                        </span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">

                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_view_user_scroll"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                        data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Image</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <img src="" class="w-100" id="view_image">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Status</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <span class="badge badge-success badge-danger" id="view_status"></span>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Title</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input readonly="" id="view_title" type="text" name="title"
                                class="form-control form-control-solid mb-3 mb-lg-0" value="" placeholder="Name"
                                required />
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-7">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2">Description</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea readonly="" id="view_description" class="form-control form-control-solid mb-3 mb-lg-0"
                                name="description"></textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--end::Scroll-->

                    <div class="modal-footer">
                        <!--begin::Actions-->
                        <div class="text-start">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Form-->
                </div>

            </div>
        </div>
    </div>




    <div class="modal fade" tabindex="-1" id="edit_modal">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Details</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black"></rect>
                            </svg>
                        </span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">

                    <!--begin::Form-->
                    <form class="form" method="post" action="{{ url('super-admin/shop/edit') }}"
                        enctype="multipart/form-data" id="edit_form">
                        @csrf

                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                            data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input required type="text" name="name" id="edit_name"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Name" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Email</label>
                                <!--end::Label-->
                                <!--begin::Input group-->
                                <div class="input-group">
                                    <input required type="email" name="email" id="edit_email"
                                        class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Email">
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group for Status-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="fw-bold fs-6 mb-2">Status</label>
                                <!--end::Label-->
                                <!--begin::Input group-->
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="status" id="edit_status"
                                        value="1">
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Input group-->

                        </div>
                        <!--end::Scroll-->

                        <div class="modal-footer px-0">

                            <input type="hidden" name="id" id="edit_id">
                            <!--begin::Actions-->
                            <div class="w-100 d-flex justify-content-between flex-wrap flex-row-reverse flex-row-reverse">
                                <button type="submit" class="btn btn-primary ms-10" id="submit_btn" name="">
                                    <span class="indicator-label">
                                        Submit
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                    </form>
                    <!--end::Form-->

                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" tabindex="-1" id="delete_modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">Are You sure ?</h5>

                    <!--begin::Close-->
                    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                        aria-label="Close">
                        <span class="svg-icon svg-icon-2x">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black"></rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="black"></rect>
                            </svg>
                        </span>
                    </div>
                    <!--end::Close-->
                </div>

                <div class="modal-body">

                    <!--begin::Form-->
                    <form class="form" method="post" action="{{ url('super-admin/shop/delete') }}"
                        enctype="multipart/form-data" id="form_delete">
                        @csrf
                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7 text-center" id="kt_modal_add_user_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                            data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                    colors="primary:#f7b84b,secondary:#f06548"
                                    style="width:100px;height:100px"></lord-icon>
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Do you really want to delete these
                                    records?</label>
                                <!--end::Label-->
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2">Deleting this, is a permanent action and cannot
                                    be undone. All associated data will also be permanently deleted.</label>
                                <!--end::Label-->
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--end::Scroll-->

                        <div class="modal-footer px-0">
                            <input type="hidden" name="id" id="delete_id">
                            <!--begin::Actions-->
                            <div class=" w-100 d-flex  justify-content-between flex-wrap flex-row-reverse">
                                <button type="submit" class="btn btn-danger ms-10" id="delete_btn" name="">
                                    <span class="indicator-label">
                                        Delete
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            </div>
                            <!--end::Actions-->
                        </div>
                    </form>
                    <!--end::Form-->
                </div>

            </div>
        </div>
    </div>


    <!-- Modal to display admins -->
    <div id="admins_modal" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Admins</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ul id="admins_list" class="list-group">
                        <!-- Admins will be listed here -->
                    </ul>
                </div>
                <div class="modal-footer">
                    <form id="delete_form" method="POST" action="{{ url('super-admin/shop/delete-admin') }}">
                        @csrf
                        @method('DELETE')
                        <input type="hidden" name="shop_id" id="shop_id">
                        <input type="hidden" name="admin_id" id="admin_id">
                        <button type="submit" class="btn btn-danger" id="delete_button">Delete Admin</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer_scripts')


    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('admin/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->

    <!--end::Page Custom Javascript-->

    <script>
        function add_modal() {

            $("#add_modal").modal('show');
        }

        function add_admin_modal(shop_id) {
            $("#add_admin_shop_id").val(shop_id);
            $("#add_admin_modal").modal('show');
        }

        function view_modal(coupon_id, title, description, image_src) {
            // Update the image source
            $("#view_image").attr("src", image_src);

            // Update the title
            var decodedTitle = title.replace(/--/g, "'").replace(/__/g, '"');
            $("#view_title").val(decodedTitle);

            // Update the description
            var decodedDescription = description.replace(/--/g, "'").replace(/__/g, '"');
            $("#view_description").val(decodedDescription);



            // Show the modal
            $("#view_modal").modal('show');
        }


        function edit_modal(coupon_id, code, discount, status) {
            // Set values in the form fields
            $('#edit_id').val(coupon_id);
            $('#edit_name').val(code);
            $('#edit_email').val(discount);

            // Set the toggle switch based on the status
            $('#edit_status').prop('checked', status == 1);

            // Show the modal
            $("#edit_modal").modal('show');
        }

        function edit_password(coupon_id) {
            // Set values in the form fields
            $('#edit_password_id').val(coupon_id);

            // Show the modal
            $("#edit_password_modal").modal('show');
        }
        $('#edit_form').on('submit', function() {
            // Check the status of the toggle and set a hidden input to ensure '0' is sent if unchecked
            if (!$('#edit_status').is(':checked')) {
                $('<input>').attr({
                    type: 'hidden',
                    name: 'status',
                    value: '0'
                }).appendTo('#edit_form');
            }
        });

        function delete_modal(coupon_id) {

            $('#delete_id').val(coupon_id);
            $("#delete_modal").modal('show');
        }

        function showAdmins(shopId) {
            $.ajax({
                url: '/super-admin/admin/view-admins/' + shopId,
                type: 'GET',
                success: function(result) {
                    var adminsList = $('#admins_list');
                    adminsList.empty(); // Clear the list
                    console.log(result.admins);
                    result.admins.forEach(function(admin) {
                        adminsList.append(
                            '<li class="list-group-item">' +
                            admin.email +
                            ' <button type="button" class="btn btn-danger btn-sm float-end" onclick="setAdminToDelete(' +
                            shopId + ', ' + admin.id + ', \'' + admin.email +
                            '\')">Delete</button>' +
                            '</li>'
                        );
                    });

                    $("#shop_id").val(shopId); // Set shop_id in form
                    $("#admins_modal").modal('show');
                },
                error: function(xhr) {
                    alert('An error occurred while fetching admins.');
                }
            });
        }

        function setAdminToDelete(shopId, adminId, adminName) {
            // Set shop_id and admin_id for deletion
            $('#shop_id').val(shopId);
            $('#admin_id').val(adminId);
            $('#delete_button').text('Delete ' + adminName);
        }
    </script>


    <script>
        @if ($message = Session::get('success'))
            Swal.fire({
                text: "{{ $message }}",
                icon: "success",
                buttonsStyling: false,
                showConfirmButton: false,
                timer: 2800
            });
        @endif
        @if ($message = Session::get('error'))
            Swal.fire({
                text: "{{ $message }}",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
                    confirmButton: "btn btn-primary"
                }
            });
        @endif
    </script>



    <script>
        "use strict";

        // Class definition
        var KTDatatablesButtons = function() {
            // Shared variables
            var table;
            var datatable;

            // Private functions
            var initDatatable = function() {
                // Set date data order
                const tableRows = table.querySelectorAll('tbody tr');

                tableRows.forEach(row => {
                    const dateRow = row.querySelectorAll('td');
                    const realDate = moment(dateRow[3].innerHTML, "DD MMM YYYY, LT")
                        .format(); // select date from 4th column in table
                    dateRow[3].setAttribute('data-order', realDate);
                });

                // Init datatable --- more info on datatables: https://datatables.net/manual/
                datatable = $(table).DataTable({
                    "info": false,
                    'order': [],
                    'pageLength': 10,
                });
            }

            // Hook export buttons
            var exportButtons = () => {
                const documentTitle = 'Customer Orders Report';
                var buttons = new $.fn.dataTable.Buttons(table, {
                    buttons: [{
                            extend: 'copyHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'excelHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'csvHtml5',
                            title: documentTitle
                        },
                        {
                            extend: 'pdfHtml5',
                            title: documentTitle
                        }
                    ]
                }).container().appendTo($('#kt_datatable_example_1_export'));

                // Hook dropdown menu click event to datatable export buttons
                const exportButtons = document.querySelectorAll(
                    '#kt_datatable_example_1_export_menu [data-kt-export]');
                exportButtons.forEach(exportButton => {
                    exportButton.addEventListener('click', e => {
                        e.preventDefault();

                        // Get clicked export value
                        const exportValue = e.target.getAttribute('data-kt-export');
                        const target = document.querySelector('.dt-buttons .buttons-' +
                            exportValue);

                        // Trigger click event on hidden datatable export buttons
                        target.click();
                    });
                });
            }

            // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
            var handleSearchDatatable = () => {
                const filterSearch = document.querySelector('[data-kt-filter="search"]');
                filterSearch.addEventListener('keyup', function(e) {
                    datatable.search(e.target.value).draw();
                });
            }

            // Public methods
            return {
                init: function() {
                    table = document.querySelector('#kt_datatable_example_1');

                    if (!table) {
                        return;
                    }

                    initDatatable();
                    exportButtons();
                    handleSearchDatatable();
                }
            };
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTDatatablesButtons.init();
        });
    </script>


@endsection
