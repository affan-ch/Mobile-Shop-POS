
@section('top-bar')

    <!--begin::Header-->
    <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
        <!--begin::Container-->
        <div class="container-xxl d-flex flex-grow-1 flex-stack">
            <!--begin::Header Logo-->
            <div class="d-flex align-items-center me-5">
                <!--begin::Heaeder menu toggle-->
                <div class="d-lg-none btn btn-icon btn-active-color-primary w-30px h-30px ms-n2 me-3" id="kt_header_menu_toggle">
                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                    <span class="svg-icon svg-icon-2">
										<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
											<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="black" />
											<path opacity="0.3" d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z" fill="black" />
										</svg>
									</span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Heaeder menu toggle-->
                <a href="{{url('/admin-panel/dashboard')}}">
                    <img alt="Logo" src="{{asset('app/assets/img/logo.png')}}" class="h-50px" />
                </a>
            </div>
            <!--end::Header Logo-->
            <!--begin::Topbar-->
            <div class="d-flex align-items-center flex-shrink-0">

                <!--begin::User-->
                <div class="d-flex align-items-center ms-3 ms-lg-4" id="kt_header_user_menu_toggle">
                    <!--begin::Menu- wrapper-->
                    <!--begin::User icon(remove this button to use user avatar as menu toggle)-->
                    <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline btn-outline-secondary w-30px h-30px w-lg-40px h-lg-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                        <span class="svg-icon svg-icon-1">
											<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
												<path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="black" />
												<rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="black" />
											</svg>
										</span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::User icon-->
                    <!--begin::User account menu-->
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
                        <!--begin::Menu item-->
                        <div class="menu-item px-3">
                            <div class="menu-content d-flex align-items-center px-3">
                                <!--begin::Avatar-->
                                <div class="symbol symbol-50px me-5">
                                    <img alt="Logo" src="{{asset('admin/assets/media/avatars/300-1.jpg')}}" />
                                </div>
                                <!--end::Avatar-->
                                <!--begin::Username-->
                                <div class="d-flex flex-column">
                                    <div><span class="fw-bolder d-flex align-items-center fs-5 badge badge-light-success px-2 py-1">{{$rec->name}}</span></div>
                                    <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{$rec->email}}</a>
                                </div>
                                <!--end::Username-->
                            </div>
                        </div>
                        <!--end::Menu item-->
                        

                        <!--begin::Menu separator-->
                        <div class="separator my-2"></div>
                        <!--end::Menu separator-->

                        <!--begin::Menu item-->
                        <div class="menu-item px-5">
                            <a href="{{url('/admin-panel/logout')}}" class="menu-link px-5">Sign Out</a>
                        </div>
                        <!--end::Menu item-->
                    </div>
                    <!--end::User account menu-->
                    <!--end::Menu wrapper-->
                </div>
                <!--end::User -->

                <!--begin::Sidebar Toggler-->
                <!--end::Sidebar Toggler-->
            </div>
            <!--end::Topbar-->
        </div>
        <!--end::Container-->
        <!--begin::Separator-->
        <div class="separator"></div>
        <!--end::Separator-->
        <!--begin::Container-->
        <div class="header-menu-container container-xxl d-flex flex-stack h-lg-75px w-100" id="kt_header_nav">
            <!--begin::Menu wrapper-->
            <div class="header-menu flex-column flex-lg-row" data-kt-drawer="true" data-kt-drawer-name="header-menu" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_header_menu_toggle" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}">
                <!--begin::Menu-->
                <div class="menu menu-lg-rounded menu-column menu-lg-row menu-state-bg menu-title-gray-700 menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-400 fw-bold my-5 my-lg-0 align-items-stretch flex-grow-1" id="#kt_header_menu" data-kt-menu="true">
                    <div class="menu-item {{ request()->is('super-admin/dashboard') ? 'here' : '' }}">
                        <a class="menu-link py-3" href="{{url('/super-admin/dashboard')}}">
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('super-admin/admins') ? 'here' : '' }}">
                        <a class="menu-link py-3" href="{{url('/super-admin/admins')}}">
                            <span class="menu-title">Admins</span>
                        </a>
                    </div>
                    <div class="menu-item {{ request()->is('super-admin/shops') ? 'here' : '' }}">
                        <a class="menu-link py-3" href="{{url('/super-admin/shops')}}">
                            <span class="menu-title">Shops</span>
                        </a>
                    </div>

                    <div class="menu-item {{ request()->is('super-admin/reports') ? 'here' : '' }}">
                        <a class="menu-link py-3" href="{{url('/super-admin/reports')}}">
                            <span class="menu-title">Reports</span>
                        </a>
                    </div>

                </div>
                <!--end::Menu-->
                <!--begin::Actions-->
                <div class="flex-shrink-0 p-4 p-lg-0 me-lg-2">
                    <a href="{{url('/super-admin/logout')}}" class="btn btn-sm btn-light-danger fw-bolder w-100 w-lg-auto  btn-hover-scale" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click" title="Sign Out">Sign Out</a>
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Menu wrapper-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Header-->

@endsection
