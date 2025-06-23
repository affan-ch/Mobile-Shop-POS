@extends('shop.layouts.main')
@extends('shop.layouts.top_bar')
@section('page_title', 'Inventory')

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
                <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Inventory</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-dot fw-bold text-gray-600 fs-7 my-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">
                        <a href="{{ url('/shop/dashboard') }}" class="text-gray-600 text-hover-primary">Dashobard</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-gray-600">Inventory</li>
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
                        <h1 class="fw-bolder my-2">Products
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
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
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
                                        <!--begin::Export buttons-->
                                        <div id="kt_datatable_example_1_export" class="d-none"></div>
                                        <!--end::Export buttons-->
                                    </div>
                                    <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
                                        <!--begin::Export dropdown-->
                                        <!--
                                                                                                                <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                                                                                    <span class="svg-icon svg-icon-1 position-absolute ms-4"></span>
                                                                                                                    Export Table
                                                                                                                </button>
                                                                            -->
                                        <!--end::Export dropdown-->
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
                                                <th class="min-w-100px">Price</th>
                                                <th class="min-w-100px">Image</th>
                                                <th class="min-w-100px">Warranty Period</th>
                                                <th class="min-w-100px">Warranty Unit</th>
                                                <th class="min-w-100px">Quantity</th>
                                                <th class="min-w-100px">Sold Quantity</th>
                                                <th class="min-w-100px pe-5">Actions</th>
                                            </tr>
                                            <!--end::Table row-->
                                        </thead>
                                        <tbody class="fw-bold text-gray-600">

                                            @forelse($products as $product)
                                                <tr class="odd">
                                                    <td>
                                                        <a href="#"
                                                            class="text-dark text-hover-primary">{{ $loop->iteration }}</a>
                                                    </td>


                                                    <td>
                                                        <a href="#"
                                                            class="text-dark text-hover-primary">{{ $product->name }}</a>
                                                    </td>
                                                    <td>
                                                        <a href="#"
                                                            class="text-dark text-hover-primary">{{ $product->price }}</a>
                                                    </td>
                                                    <td>
                                                        <img src="{{ asset('products/' . $product->image) }}"
                                                            alt="{{ $product->name }}" width="100">
                                                    </td>
                                                    <td>
                                                        {{ $product->warranty_duration === null || $product->warranty_duration <= 0 ? 'N/A' : $product->warranty_duration }}
                                                    </td>
                                                    <td>
                                                        @if($product->warranty_duration === null || $product->warranty_duration <= 0)
                                                            N/A
                                                        @else
                                                            @if($product->warranty_unit === 0)
                                                                Day
                                                            @elseif($product->warranty_unit === 1)
                                                                Month
                                                            @elseif($product->warranty_unit === 2)
                                                                Year
                                                            @else
                                                                N/A
                                                            @endif
                                                        @endif
                                                    </td>
                                                    
                                                    <td>{{ $product->qty }}</td>
                                                    <td>{{ $product->sold_qty }}</td>

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
                                                                    <a href="javascript:edit_modal('{{ $product->id }}', '{{ $product->name }}', '{{ $product->price }}', '{{ $product->description }}', '{{ $product->warranty_unit }}', '{{ $product->warranty_duration }}','{{ $product->qty }}', '{{ $product->sold_qty }}', '{{ asset('products/' . $product->image) }}');"
                                                                        class="btn btn-light-success fw-bolder mb-3 w-100"
                                                                        data-kt-menu-placement="bottom-end">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                                        <span
                                                                            class="fas fa-edit svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                                                        </span>
                                                                        <!--end::Svg Icon-->Edit
                                                                    </a>

                                                                </div>
                                                                <!--end::Menu item-->
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="javascript:view_modal('{{ $product->id }}', '{{ $product->name }}', '{{ $product->price }}', '{{ $product->description }}', '{{ $product->warranty_unit }}', '{{ $product->warranty_duration }}','{{ $product->qty }}', '{{ $product->sold_qty }}', '{{ asset('products/' . $product->image) }}');"
                                                                        class="btn btn-light-success fw-bolder mb-3 w-100"
                                                                        data-kt-menu-placement="bottom-end">
                                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                                                                        <span
                                                                            class="fas fa-edit svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                                                                        </span>
                                                                        <!--end::Svg Icon-->View
                                                                    </a>

                                                                </div>
                                                                <!--end::Menu item-->
                                                                <!--begin::Menu item-->
                                                                <div class="menu-item px-3">
                                                                    <a href="javascript:delete_modal('{{ $product->id }}');"
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
                    <form class="form" method="post" action="{{ url('shop/storeProduct') }}"
                        enctype="multipart/form-data" id="form_insert">
                        @csrf

                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                            data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">


                            <!-- Product Name -->
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Product Name</label>
                                <input required type="text" name="name"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Product Name"
                                    value="{{ old('name') }}">
                            </div>

                            <!-- Product Price -->
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Product Price</label>
                                <input required type="number" step="0.01" name="price"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Price"
                                    value="{{ old('price') }}">
                            </div>

                            <!-- Product Image -->
                            <div class="fv-row mb-7">
                                <label class="fw-bold fs-6 mb-2">Product Image</label>
                                <input type="file" name="image"
                                    class="form-control form-control-solid mb-3 mb-lg-0">
                            </div>

                            <!-- Description -->
                            <div class="fv-row mb-7">
                                <label class="fw-bold fs-6 mb-2">Description</label>
                                <textarea name="description" class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Description">{{ old('description') }}</textarea>
                            </div>

                            <!-- Warranty Unit -->
                            <div class="fv-row mb-7">
                                <label class="fw-bold fs-6 mb-2">Warranty Unit</label>
                                <select name="warranty_unit" class="form-control form-control-solid mb-3 mb-lg-0">
                                    <option value="0" {{ old('warranty_unit') == 0 ? 'selected' : '' }}>Day
                                    </option>
                                    <option value="1" {{ old('warranty_unit') == 1 ? 'selected' : '' }}>Month
                                    </option>
                                    <option value="2" {{ old('warranty_unit') == 2 ? 'selected' : '' }}>Year
                                    </option>
                                </select>
                            </div>

                            <!-- Warranty Period -->
                            <div class="fv-row mb-7">
                                <label class="fw-bold fs-6 mb-2">Warranty Period</label>
                                <input type="number" name="warranty_duration"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Warranty Period"
                                    value="{{ old('warranty_duration') }}">
                            </div>

                            <!-- Quantity -->
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Quantity</label>
                                <input required type="number" name="qty"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Quantity"
                                    value="{{ old('qty') }}">
                            </div>

                            <!-- Sold Quantity -->
                            <div class="fv-row mb-7">
                                <label class="required fw-bold fs-6 mb-2">Sold Quantity</label>
                                <input required type="number" name="sold_qty"
                                    class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Sold Quantity"
                                    value="{{ old('sold_qty', 0) }}">
                            </div>

                        </div>
                        <!--end::Scroll-->


                        <div class="modal-footer px-0">
                            <!--begin::Actions-->
                            <div
                                class=" w-100 d-flex  justify-content-between flex-wrap flex-row-reverse flex-row-reverse">

                                <input type="hidden" name="id" id="add_product_id" value="{{ $shop_id }}">
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
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content shadow-none">
                <div class="modal-header">
                    <h5 class="modal-title">View Product Details</h5>

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
                    <!-- Product Name -->
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <p id="viewName" class="form-control-plaintext"></p>
                    </div>

                    <!-- Product Price -->
                    <div class="mb-3">
                        <label class="form-label">Product Price</label>
                        <p id="viewPrice" class="form-control-plaintext"></p>
                    </div>

                    <!-- Product Image -->
                    <div class="mb-3">
                        <label class="form-label">Product Image</label>
                        <img id="viewImage" src="" class="img-fluid" style="max-width: 200px;"
                            alt="Product Image">
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <p id="viewDescription" class="form-control-plaintext"></p>
                    </div>

                    <!-- Warranty is Monthly -->
                    <div class="mb-3">
                        <label class="form-label">Warranty Unit</label>
                        <p id="viewWarrantyIsMonthly" class="form-control-plaintext"></p>
                    </div>

                    <!-- Warranty Period -->
                    <div class="mb-3">
                        <label class="form-label">Warranty Period</label>
                        <p id="viewWarranty" class="form-control-plaintext"></p>
                    </div>

                    <!-- Quantity -->
                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <p id="viewQty" class="form-control-plaintext"></p>
                    </div>

                    <!-- Sold Quantity -->
                    <div class="mb-3">
                        <label class="form-label">Sold Quantity</label>
                        <p id="viewSoldQty" class="form-control-plaintext"></p>
                    </div>
                </div>

                <div class="modal-footer px-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
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
                    <form class="form" method="post" action="{{ url('shop/updateProduct') }}"
                        enctype="multipart/form-data" id="edit_form">
                        @csrf

                        <!--begin::Scroll-->
                        <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_user_scroll"
                            data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                            data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header"
                            data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">

                            <!-- Product Name -->
                            <div class="mb-3">
                                <label for="editName" class="form-label">Product Name</label>
                                <input type="text" class="form-control" id="editName" name="name" required>
                            </div>

                            <!-- Product Price -->
                            <div class="mb-3">
                                <label for="editPrice" class="form-label">Product Price</label>
                                <input type="number" class="form-control" id="editPrice" name="price" step="0.01"
                                    required>
                            </div>

                            <!-- Product Image -->
                            <div class="mb-3">
                                <label for="editImage" class="form-label">Product Image</label>
                                <input type="file" class="form-control" id="editImage" name="image">
                                <img id="editImagePreview" src="" class="img-fluid mt-2"
                                    style="max-width: 200px;" alt="Product Image">
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="editDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="editDescription" name="description"></textarea>
                            </div>

                            <!-- Warranty is Monthly -->
                            <div class="mb-3">
                                <label for="editWarrantyIsMonthly" class="form-label">Warranty Unit</label>
                                <select class="form-control" id="editWarrantyIsMonthly" name="warranty_unit">
                                    <option value="0">Day</option>
                                    <option value="1">Month</option>
                                    <option value="2">Year</option>
                                </select>
                            </div>

                            <!-- Warranty Period -->
                            <div class="mb-3">
                                <label for="editWarranty" class="form-label">Warranty Period</label>
                                <input type="number" class="form-control" id="editWarranty" name="warranty_duration">
                            </div>

                            <!-- Quantity -->
                            <div class="mb-3">
                                <label for="editQty" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="editQty" name="qty" required>
                            </div>

                            <!-- Sold Quantity -->
                            <div class="mb-3">
                                <label for="editSoldQty" class="form-label">Sold Quantity</label>
                                <input type="number" class="form-control" id="editSoldQty" name="sold_qty" required>
                            </div>

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
                    <form class="form" method="post" action="{{ url('shop/deleteProduct') }}"
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

        function view_modal(product_id, name, price, description, warranty_unit, warranty_duration, qty, sold_qty, imageUrl) {
            // Populate view modal fields with provided values
            document.getElementById('viewName').textContent = name;
            document.getElementById('viewPrice').textContent = `$${price}`;
            document.getElementById('viewDescription').textContent = description;
            document.getElementById('viewWarrantyIsMonthly').textContent = 
                warranty_duration === null || warranty_duration <= 0 
                    ? 'N/A' 
                    : warranty_unit == 0 
                        ? 'Day' 
                        : warranty_unit == 1 
                            ? 'Month' 
                            : warranty_unit == 2 
                                ? 'Year' 
                                : 'N/A';
            document.getElementById('viewWarranty').textContent = warranty_duration || 'N/A';
            document.getElementById('viewQty').textContent = qty;
            document.getElementById('viewSoldQty').textContent = sold_qty;

            // Handle image preview
            const imagePreview = document.getElementById('viewImage');

            if (imageUrl) {
                imagePreview.src = imageUrl; // Set the image URL in the preview
                imagePreview.style.display = 'block';
            } else {
                imagePreview.src = ''; // Clear the preview if no image URL
                imagePreview.style.display = 'none';
            }

            // Show the modal
            $("#view_modal").modal('show');
        }



        function edit_modal(product_id, name, price, description, warranty_unit, warranty_duration, qty, sold_qty, imageUrl) {
            // Set the product ID and shop ID
            $('#edit_id').val(product_id);
            // Populate form fields with provided values
            document.getElementById('editName').value = name;
            document.getElementById('editPrice').value = price;
            document.getElementById('editDescription').value = description;
            document.getElementById('editWarrantyIsMonthly').value = warranty_unit;
            document.getElementById('editWarranty').value = warranty_duration;
            document.getElementById('editQty').value = qty;
            document.getElementById('editSoldQty').value = sold_qty;

            // Handle image preview
            const imageInput = document.getElementById('editImage');
            const imagePreview = document.getElementById('editImagePreview');

            if (imageUrl) {
                imagePreview.src = imageUrl; // Set the image URL in the preview
                imagePreview.style.display = 'block';
            } else {
                imagePreview.src = ''; // Clear the preview if no image URL
                imagePreview.style.display = 'none';
            }

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
