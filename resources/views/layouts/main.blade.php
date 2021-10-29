<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />
        <meta
            name="description"
            content="Dashboard"
        />
        <meta name="author" content="AdminKit" />
        <meta
            name="keywords"
            content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web"
        />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="preconnect" href="https://fonts.gstatic.com/" />
        <link rel="shortcut icon" href="{{ asset('assets/img/icons/icon-48x48.png') }}" />
        <link rel="canonical" href="" />
        @stack('page-css')
        <title>E-Commerce | @yield('title')</title>

        <link
            href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&amp;display=swap"
            rel="stylesheet"
        />
        <link href="{{ asset('/assets/css/light.css') }}" rel="stylesheet" />
        <script src="{{ asset('assets/js/settings.js') }}"></script>
        <style>
            body {
                opacity: 0;
            }
        </style>
        <!-- END SETTINGS -->
        <script
            async
            src="https://www.googletagmanager.com/gtag/js?id=UA-120946860-10"
        ></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag("js", new Date());

            gtag("config", "UA-120946860-10", { anonymize_ip: true });
        </script>
    </head>
    <body
        data-theme="default"
        data-layout="fluid"
        data-sidebar-position="left"
        data-sidebar-layout="default"
    >


        <div class="wrapper">
            {{-- sidebar --}}
            <nav id="sidebar" class="sidebar js-sidebar">
                <div class="sidebar-content js-simplebar">
                    <a class="sidebar-brand" href="/">
                        <span class="sidebar-brand-text align-middle">
                            E-Commerce
                        </span>
                        <svg
                            class="sidebar-brand-icon align-middle"
                            width="32px"
                            height="32px"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke="#FFFFFF"
                            stroke-width="1.5"
                            stroke-linecap="square"
                            stroke-linejoin="miter"
                            color="#FFFFFF"
                            style="margin-left: -3px"
                        >
                            <path
                                d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"
                            ></path>
                            <path d="M20 12L12 16L4 12"></path>
                            <path d="M20 16L12 20L4 16"></path>
                        </svg>
                    </a>

                    <div class="sidebar-user">
                        <div class="d-flex justify-content-center">
                            <div class="flex-shrink-0">
                                <img
                                    src="{{ asset('assets/img/avatars/avatar.jpg') }}"
                                    class="avatar img-fluid rounded me-1"
                                    alt="{{ Auth::user()->name }}"
                                />
                            </div>
                            <div class="flex-grow-1 ps-2">
                                <a
                                    class="sidebar-user-title"
                                    href="#"
                                >
                                {{ Auth::user()->name }}
                                </a>
                                <div class="sidebar-user-subtitle">
                                    Designer
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="sidebar-nav">
                        <li class="sidebar-header">Pages</li>

                        <li class="sidebar-item @yield('index')">
                            <a class="sidebar-link" href="/admin/index">
                                <i class="align-middle" data-feather="sliders"></i>
                                <span class="align-middle">Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item @yield('productList')">
                            <a class="sidebar-link" href="{{ url('/admin/product') }}">
                                <i class="align-middle" data-feather="layers"></i>
                                <span class="align-middle">Products</span>
                            </a>
                        </li>

                        <li class="sidebar-item @yield('orders')">
                            <a
                                href="#orders"
                                data-bs-toggle="collapse"
                                class="sidebar-link collapsed"
                            >
                                <i
                                    class="align-middle"
                                    data-feather="clipboard"
                                ></i>
                                <span class="align-middle">Orders</span>
                                <span id="orderCounts" class="align-middle bg-primary badge"></span>
                            </a>
                            <ul
                                id="orders"
                                class="sidebar-dropdown list-unstyled collapse @yield('orderShow')"
                                data-bs-parent="#sidebar"
                            >
                                <li class="sidebar-item @yield('orderListActive')">
                                    <a
                                        class="sidebar-link"
                                        href="{{ url('/admin/orders/order-list') }}"
                                        >Order List<span id="orderCount"
                                        class="
                                            sidebar-badge
                                            badge
                                            bg-primary
                                        "
                                        ></span></a
                                    >
                                </li>
                                <li class="sidebar-item @yield('completeOrderActive')">
                                    <a
                                        class="sidebar-link"
                                        href="{{ url('/admin/order/complete-orders') }}"
                                        >Completed Order's
                                    </a
                                    >
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item @yield('people')">
                            <a
                                data-bs-target="#people"
                                data-bs-toggle="collapse"
                                class="sidebar-link collapsed"
                            >
                                <i
                                    class="align-middle"
                                    data-feather="user"
                                ></i>
                                <span class="align-middle">People</span>
                            </a>
                            <ul
                                id="people"
                                class="sidebar-dropdown list-unstyled collapse @yield('peopleShow')"
                                data-bs-parent="#sidebar"
                            >
                                <li class="sidebar-item @yield('deliveryBoyActive')">
                                    <a
                                        class="sidebar-link"
                                        href="{{ url('/admin/people/delivery-boy') }}"
                                        >Delivery Boy</a
                                    >
                                </li>
                                <li class="sidebar-item @yield('customerActive')">
                                    <a
                                        class="sidebar-link "
                                        href="{{ url('/admin/peoples/customer') }}"
                                        {{-- {{ route('customer.index') }} --}}
                                        >Customer</a
                                    >
                                </li>
                                <li class="sidebar-item @yield('userActive')">
                                    <a class="sidebar-link" href="{{ url('/admin/people/user') }}"
                                        >User</a
                                    >
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item @yield('settings')">
                            <a
                                data-bs-target="#settings"
                                data-bs-toggle="collapse"
                                class="sidebar-link collapsed"
                            >
                                <i
                                    class="align-middle"
                                    data-feather="settings"
                                ></i>
                                <span class="align-middle">Settings</span>
                            </a>
                            <ul
                                id="settings"
                                class="sidebar-dropdown list-unstyled collapse @yield('settingsShow')"
                                data-bs-parent="#sidebar"
                            >
                                <li class="sidebar-item @yield('categoryListActive')">
                                    <a
                                        class="sidebar-link"
                                        href="{{ url('/admin/setting/category-list') }}"
                                        >Category List</a
                                    >
                                </li>
                                <li class="sidebar-item @yield('orderStatusActive')">
                                    <a
                                        class="sidebar-link"
                                        href="{{ url('/admin/settings/order-status') }}"
                                        >Order Status</a
                                    >
                                </li>
                                <li class="sidebar-item @yield('bannerManagementActive')">
                                    <a
                                        class="sidebar-link"
                                        href="{{ url('/admin/settingss/banner-management') }}"
                                        >Banner Management</a
                                    >
                                </li>
                                <li class="sidebar-item @yield('userLevelActive')">
                                    <a
                                        class="sidebar-link"
                                        href="{{ url('/admin/settingsss/user-level') }}"
                                        >User Level</a
                                    >
                                </li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </nav>
            {{-- End sidebar --}}

            <div class="main">
                <nav class="navbar navbar-expand navbar-light navbar-bg">
                    <a class="sidebar-toggle js-sidebar-toggle">
                        <i class="hamburger align-self-center"></i>
                    </a>

                    <form class="d-none d-sm-inline-block">
                        <div class="input-group input-group-navbar">
                            <input
                                type="text"
                                class="form-control"
                                placeholder="Search…"
                                aria-label="Search"
                            />
                            <button class="btn" type="button">
                                <i
                                    class="align-middle"
                                    data-feather="search"
                                ></i>
                            </button>
                        </div>
                    </form>

                    <div class="navbar-collapse collapse">
                        <ul class="navbar-nav navbar-align">
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-icon dropdown-toggle"
                                    href="#"
                                    id="alertsDropdown"
                                    data-bs-toggle="dropdown"
                                >
                                    <div class="position-relative">
                                        <i
                                            class="align-middle"
                                            data-feather="bell"
                                        ></i>
                                        <span class="indicator">4</span>
                                    </div>
                                </a>
                                <div
                                    class="
                                        dropdown-menu
                                        dropdown-menu-lg
                                        dropdown-menu-end
                                        py-0
                                    "
                                    aria-labelledby="alertsDropdown"
                                >
                                    <div class="dropdown-menu-header">
                                        4 New Notifications
                                    </div>
                                    <div class="list-group">
                                        <a href="#" class="list-group-item">
                                            <div
                                                class="
                                                    row
                                                    g-0
                                                    align-items-center
                                                "
                                            >
                                                <div class="col-2">
                                                    <i
                                                        class="text-danger"
                                                        data-feather="alert-circle"
                                                    ></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="text-dark">
                                                        Update completed
                                                    </div>
                                                    <div
                                                        class="
                                                            text-muted
                                                            small
                                                            mt-1
                                                        "
                                                    >
                                                        Restart server 12 to
                                                        complete the update.
                                                    </div>
                                                    <div
                                                        class="
                                                            text-muted
                                                            small
                                                            mt-1
                                                        "
                                                    >
                                                        30m ago
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <div
                                                class="
                                                    row
                                                    g-0
                                                    align-items-center
                                                "
                                            >
                                                <div class="col-2">
                                                    <i
                                                        class="text-warning"
                                                        data-feather="bell"
                                                    ></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="text-dark">
                                                        Lorem ipsum
                                                    </div>
                                                    <div
                                                        class="
                                                            text-muted
                                                            small
                                                            mt-1
                                                        "
                                                    >
                                                        Aliquam ex eros,
                                                        imperdiet vulputate
                                                        hendrerit et.
                                                    </div>
                                                    <div
                                                        class="
                                                            text-muted
                                                            small
                                                            mt-1
                                                        "
                                                    >
                                                        2h ago
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <div
                                                class="
                                                    row
                                                    g-0
                                                    align-items-center
                                                "
                                            >
                                                <div class="col-2">
                                                    <i
                                                        class="text-primary"
                                                        data-feather="home"
                                                    ></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="text-dark">
                                                        Login from 192.186.1.8
                                                    </div>
                                                    <div
                                                        class="
                                                            text-muted
                                                            small
                                                            mt-1
                                                        "
                                                    >
                                                        5h ago
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                        <a href="#" class="list-group-item">
                                            <div
                                                class="
                                                    row
                                                    g-0
                                                    align-items-center
                                                "
                                            >
                                                <div class="col-2">
                                                    <i
                                                        class="text-success"
                                                        data-feather="user-plus"
                                                    ></i>
                                                </div>
                                                <div class="col-10">
                                                    <div class="text-dark">
                                                        New connection
                                                    </div>
                                                    <div
                                                        class="
                                                            text-muted
                                                            small
                                                            mt-1
                                                        "
                                                    >
                                                        Christina accepted your
                                                        request.
                                                    </div>
                                                    <div
                                                        class="
                                                            text-muted
                                                            small
                                                            mt-1
                                                        "
                                                    >
                                                        14h ago
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-menu-footer">
                                        <a href="#" class="text-muted"
                                            >Show all notifications</a
                                        >
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a
                                    class="
                                        nav-icon
                                        js-fullscreen
                                        d-none d-lg-block
                                    "
                                    href="#"
                                >
                                    <div class="position-relative">
                                        <i
                                            class="align-middle"
                                            data-feather="maximize"
                                        ></i>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a
                                    class="nav-icon pe-md-0 dropdown-toggle"
                                    href="#"
                                    data-bs-toggle="dropdown"
                                >
                                    <img
                                        src="{{ asset('assets/img/avatars/avatar.jpg') }}"
                                        class="avatar img-fluid rounded"
                                        alt="{{ Auth::user()->name }}"
                                    />
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a
                                        class="dropdown-item"
                                        href="pages-profile.html"
                                        ><i
                                            class="align-middle me-1"
                                            data-feather="user"
                                        ></i>
                                        Profile</a
                                    >
                                    <a class="dropdown-item" href="#"
                                        ><i
                                            class="align-middle me-1"
                                            data-feather="pie-chart"
                                        ></i>
                                        Analytics</a
                                    >
                                    <div class="dropdown-divider"></div>
                                    <a
                                        class="dropdown-item"
                                        href="pages-settings.html"
                                        ><i
                                            class="align-middle me-1"
                                            data-feather="settings"
                                        ></i>
                                        Settings & Privacy</a
                                    >
                                    <a class="dropdown-item" href="#"
                                        ><i
                                            class="align-middle me-1"
                                            data-feather="help-circle"
                                        ></i>
                                        Help Center</a
                                    >
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                    >Log out</a
                                    >
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>

                {{-- Content --}}
                @yield('content')
                {{-- End Content --}}

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row text-muted">
                            <div class="col-6 text-start">
                                <p class="mb-0">
                                    <a href="index.html" class="text-muted"
                                        ><strong>E-Commerce</strong></a
                                    >
                                    &copy;{{ now()->year }}
                                </p>
                            </div>
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        </script>
        @stack('page-scripts')
    </body>
</html>
