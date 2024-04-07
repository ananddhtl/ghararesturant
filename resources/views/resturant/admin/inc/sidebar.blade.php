        <!-- Menu -->


        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
            <div class="app-brand demo">
                <a href="/admin/" class="app-brand-link">
                    <span class="app-brand-text demo menu-text fw-bolder ms-2">Admin</span>
                </a>

                <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                    <i class="bx bx-chevron-left bx-sm align-middle"></i>
                </a>
            </div>

            <div class="menu-inner-shadow"></div>

            <ul class="menu-inner py-1">
                <!-- Dashboard -->
                <li class="menu-item active">
                    <a href="/admin/" class="menu-link">
                        <i class="menu-icon tf-icons bx bx-home-circle"></i>
                        <div data-i18n="Analytics">Dashboard</div>
                    </a>
                </li>

                <li class="menu-header small text-uppercase">
                    <span class="menu-header-text">Manage Orders and reservation</span>
                </li>
                <li class="menu-item {{ Route::is('orders.index') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                        <div data-i18n="Account Settings">Orders</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('orders.index') }}" class="menu-link">
                                <div data-i18n="Notifications">Manage</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item {{ Route::is('reservation.index') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="fa-solid fa-calendar-days"></i>&nbsp;&nbsp;
                        <div data-i18n="Account Settings">Reservation</div>
                    </a>
                    <ul class="menu-sub">

                        <li class="menu-item">
                            <a href="{{ route('reservation.index') }}" class="menu-link">
                                <div data-i18n="Notifications">Manage</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item {{ Route::is('newsletter.index') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="fa-solid fa-calendar-days"></i>&nbsp;&nbsp;
                        <div data-i18n="Account Settings">Newsletter</div>
                    </a>
                    <ul class="menu-sub">

                        <li class="menu-item">
                            <a href="{{ route('newsletter.index') }}" class="menu-link">
                                <div data-i18n="Notifications">Manage</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="menu-item {{ Route::is('payments.index') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="fa fa-money" aria-hidden="true"></i>
                        <div data-i18n="Account Settings">Payments</div>
                    </a>
                    <ul class="menu-sub">

                        <li class="menu-item">
                            <a href="{{ route('payments.index') }}" class="menu-link">
                                <div data-i18n="Notifications">Manage</div>
                            </a>
                        </li>
                    </ul>
                </li>

                @if (Auth::check() && Auth::user()->role == 1)
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Manage File</span>
                    </li>
                    <li class="menu-item {{ Route::is('fileManager.create', 'fileManager.index') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa-solid fa-envelope"></i>&nbsp;&nbsp;
                            <div data-i18n="Account Settings">File Manager</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('fileManager.create') }}" class="menu-link">
                                    <div data-i18n="Account">Create</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('fileManager.index') }}" class="menu-link">
                                    <div data-i18n="Notifications">Manage</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Manage</span>
                    </li>
                    <li class="menu-item {{ Route::is('admins.index') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa-solid fa-user"></i>&nbsp;&nbsp;
                            <div data-i18n="Account Settings">Admin</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('admins.index') }}" class="menu-link">
                                    <div data-i18n="Notifications">Manage</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item {{ Route::is('users.index') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa-solid fa-user"></i>&nbsp;&nbsp;
                            <div data-i18n="Account Settings">User</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('users.index') }}" class="menu-link">
                                    <div data-i18n="Notifications">Manage</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item {{ Route::is('staffs.index') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa-solid fa-user"></i>&nbsp;&nbsp;
                            <div data-i18n="Account Settings">Staff</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('staffs.index') }}" class="menu-link">
                                    <div data-i18n="Notifications">Manage</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Pages</span>
                    </li>

                    <li class="menu-item {{ Route::is('tables.create', 'tables.index') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa fa-table" aria-hidden="true"></i>
                            <div data-i18n="Account Settings">Table</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('tables.create') }}" class="menu-link">
                                    <div data-i18n="Account">Create</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('tables.index') }}" class="menu-link">
                                    <div data-i18n="Notifications">Manage</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item {{ Route::is('carousels.create', 'carousels.index') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa-solid fa-sliders"></i>&nbsp;&nbsp;
                            <div data-i18n="Account Settings">carousel</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('carousels.create') }}" class="menu-link">
                                    <div data-i18n="Account">Create</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('carousels.index') }}" class="menu-link">
                                    <div data-i18n="Notifications">Manage</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ Route::is('abouts.create', 'abouts.index') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa-solid fa-address-card"></i>&nbsp;&nbsp;
                            <div data-i18n="Account Settings">About</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('abouts.create') }}" class="menu-link">
                                    <div data-i18n="Account">Create</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('abouts.index') }}" class="menu-link">
                                    <div data-i18n="Notifications">Manage</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="menu-item {{ Route::is('about_featurew.create', 'about_featurew.index') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa-solid fa-bars"></i>&nbsp;&nbsp;
                            <div data-i18n="Account Settings">About Feature</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('about_features.create') }}" class="menu-link">
                                    <div data-i18n="Account">Create</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('about_features.index') }}" class="menu-link">
                                    <div data-i18n="Notifications">Manage</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ Route::is('foods.create', 'foods.index') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa-solid fa-burger"></i>&nbsp;&nbsp;
                            <div data-i18n="Account Settings">Food</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('foods.create') }}" class="menu-link">
                                    <div data-i18n="Account">Create</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('foods.index') }}" class="menu-link">
                                    <div data-i18n="Notifications">Manage</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    {{-- <li
                    class="menu-item {{ Route::is('course_reviews.create', 'course_reviews.index') ? 'active' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="fa-solid fa-book-open-reader"></i></i>&nbsp;&nbsp;
                        <div data-i18n="Account Settings">Course Review</div>
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item">
                            <a href="{{ route('course_reviews.index') }}" class="menu-link">
                                <div data-i18n="Notifications">Manage</div>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                    <li
                        class="menu-item {{ Route::is('testimonials.create', 'testimonials.index') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa-solid fa-plus"></i>&nbsp;&nbsp;
                            <div data-i18n="Account Settings">Testimonial</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('testimonials.create') }}" class="menu-link">
                                    <div data-i18n="Account">Create</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('testimonials.index') }}" class="menu-link">
                                    <div data-i18n="Notifications">Manage</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li
                        class="menu-item {{ Route::is('team_members.create', 'team_members.index') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa-sharp fa-solid fa-people-group"></i>&nbsp;&nbsp;
                            <div data-i18n="Account Settings">Team Members</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('team_members.create') }}" class="menu-link">
                                    <div data-i18n="Account">Create</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="{{ route('team_members.index') }}" class="menu-link">
                                    <div data-i18n="Notifications">Manage</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ Route::is('settings.create', 'settings.index') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa fa-cogs" aria-hidden="true"></i> &nbsp;&nbsp;
                            <div data-i18n="Account Settings">Settings</div>
                        </a>
                        <ul class="menu-sub">

                            <li class="menu-item">
                                <a href="{{ route('settings.index') }}" class="menu-link">
                                    <div data-i18n="Notifications">Manage</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ Route::is('contacts.index') ? 'active' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="fa fa-phone" aria-hidden="true"></i> &nbsp;&nbsp;
                            <div data-i18n="Account Settings">Contacts</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="{{ route('contacts.index') }}" class="menu-link">
                                    <div data-i18n="Notifications">Manage</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                <li class="menu-item">
                    <a href="{{ route('logout') }}" class="menu-link menu-toggle"
                        onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
                        <i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbsp;
                        <div data-i18n="Account Settings">Logout</div>
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </aside>
        <!-- / Menu -->
