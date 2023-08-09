<div class="sidebar-wrapper sidebar-theme">
    <nav id="sidebar">
        <div class="navbar-nav theme-brand flex-row text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="./index.html">
                        <img src="{{ Vite::asset('public/src/assets/images/glasses.png') }}" class="navbar-logo"
                            alt="logo">
                    </a>
                </div>
                <div class="nav-item theme-text">
                    <a href="/" class="nav-link"> Glasses </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevrons-left">
                        <polyline points="11 17 6 12 11 7"></polyline>
                        <polyline points="18 17 13 12 18 7"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="/" class="dropdown-toggle">
                    <div class="">
                        <i class='bx bxs-dashboard' style="font-size: 20px"></i>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>
            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-minus">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg><span>Management List</span></div>
            </li>
            @can('dossiers')
                <li class="menu">
                    <a href="#dossiers" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class='bx bx-file' style="font-size: 20px"></i>
                            <span>Dossiers</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="dossiers" data-bs-parent="#accordionExample">
                        @can('dossiers')
                            <li>
                                <a href="/dossiers"> List </a>
                            </li>
                        @endcan
                        @can('add dossier')
                            <li>
                                <a href="/dossier/add"> Create </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('agents')
                <li class="menu">
                    <a href="#agents" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class='bx bxs-group' style="font-size: 20px"></i>
                            <span>Agents</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="agents" data-bs-parent="#accordionExample">
                        @can('agents')
                            <li>
                                <a href="/agents"> List </a>
                            </li>
                        @endcan
                        @can('add agent')
                            <li>
                                <a href="/agent/add"> Create </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('products')
                <li class="menu">
                    <a href="#products" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class='bx bx-cart-alt' style="font-size: 20px"></i>
                            <span>Products</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="products" data-bs-parent="#accordionExample">
                        @can('products')
                            <li>
                                <a href="/products"> List </a>
                            </li>
                        @endcan
                        @can('add product')
                            <li>
                                <a href="/product/add"> Create </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('users')
                <li class="menu">
                    <a href="#users" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class='bx bx-user' style="font-size: 20px"></i>
                            <span>Users</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="users" data-bs-parent="#accordionExample">
                        @can('users')
                            <li>
                                <a href="/users"> List </a>
                            </li>
                        @endcan
                        @can('add user')
                            <li>
                                <a href="/user/add"> Create </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('roles')
                <li class="menu">
                    <a href="#roles" data-bs-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <i class='bx bx-rocket' style="font-size: 20px"></i>
                            <span>Roles</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled" id="roles" data-bs-parent="#accordionExample">
                        @can('roles')
                            <li>
                                <a href="/roles"> List </a>
                            </li>
                        @endcan
                        @can('add role')
                            <li>
                                <a href="/role/add"> Create </a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
        </ul>
    </nav>
</div>
