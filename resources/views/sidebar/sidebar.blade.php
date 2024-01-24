<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>
                {{-- <li class="{{set_active(['setting/page'])}}">
                    <a href="{{ route('setting/page') }}">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </a>
                </li> --}}
                <li class="submenu {{ set_active(['home', 'student/dashboard']) }}">
                    <a href="{{ route('student/dashboard') }}" class="{{ set_active(['student/dashboard']) }}">
                        <i class="fas fa-tachometer-alt"></i>
                        <span> Dashboard</span>
                        {{-- <span class="menu-arrow"></span> --}}
                    </a>
                    {{-- <ul>
                        @if (Auth::check())
                            @if (Auth::user()->role_name == 'Dosen')
                                <li><a href="{{ route('teacher/dashboard') }}"
                                        class="{{ set_active(['teacher/dashboard']) }}">Teacher Dashboard</a></li>
                            @elseif(Auth::user()->role_name == 'Student')
                                <li><a href="{{ route('student/dashboard') }}"
                                        class="{{ set_active(['student/dashboard']) }}">Student Dashboard</a></li>
                            @elseif(Auth::user()->role_name == 'Super Admin')
                                <li><a href="{{ route('superadmin/dashboard') }}"
                                        class="{{ set_active(['superadmin/dashboard']) }}">Super Admin Dashboard</a>
                                </li>
                            @elseif(Auth::user()->role_name == 'Staff')
                                <li><a href="{{ route('staff/dashboard') }}"
                                        class="{{ set_active(['staff/dashboard']) }}">Staff
                                        Dashboard</a></li>
                            @endif
                        @endif
                    </ul> --}}
                </li>

                {{-- START-ROLE: DOSEN --}}
                {{-- @if (Auth::check())
                @if (Auth::user()->role_name == 'Dosen')
                <li class="{{set_active(['dosen/jadwalsidangmahasiswa'])}}">
                    <a href="{{ route('dosen/jadwalsidangmahasiswa') }}"><i class="fas fa-calendar-day"></i>
                        <span>Jadwal Sidang</span></a>
                </li>
                @elseif(Auth::user()->role_name == 'Student')
                <li class="{{set_active(['student/jadwalsidangproposal'])}}">
                    <a href="{{ route('student/jadwalsidangproposal') }}"><i class="fas fa-calendar-day"></i>
                        <span>Jadwal Sidang</span></a>
                </li>
                @endif
                @endif
                @if (Session::get('role_name') === 'Admin' || Session::get('role_name') === 'Super Admin')
                <li
                    class="submenu {{set_active(['list/users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">
                    <a href="#">
                        <i class="fas fa-shield-alt"></i>
                        <span>User Management</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('list/users') }}"
                                class="{{set_active(['list/users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">List
                                Users</a></li>
                    </ul>
                </li>
                @endif --}}
                {{-- END-ROLE: DOSEN --}}

                @if (Auth::check())
                    {{-- START: MENU STAFF --}}
                    @if (Auth::user()->role_name == 'Staff')
                        <li class="{{ set_active(['staff/dashboard']) }}">
                            <a href="{{ route('staff/dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="{{ set_active(['staff/mahasiswa']) }}">
                            <a href="{{ route('staff/mahasiswa') }}">
                                <i class="fas fa-graduation-cap"></i>
                                <span>Mahasiswa</span>
                            </a>
                        </li>
                        {{-- END: MENU STAFF --}}

                        {{-- START: MENU MAHASISWA --}}
                    @elseif(Auth::user()->role_name == 'Mahasiswa')
                        <li class="{{ set_active(['staff/dashboard']) }}">
                            <a href="{{ route('staff/dashboard') }}">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="{{ set_active(['staff/mahasiswa']) }}">
                            <a href="{{ route('staff/mahasiswa') }}">
                                <i class="fas fa-graduation-cap"></i>
                                <span>Mahasiswa</span>
                            </a>
                        </li>
                        {{-- END: MENU MAHASISWA --}}

                        {{-- START: MENU DOSEN --}}
                    @elseif(Auth::user()->role_name == 'Dosen')
                        <li class="{{ set_active(['dosen/jadwalsidangmahasiswa']) }}">
                            <a href="{{ route('dosen/jadwalsidangmahasiswa') }}"><i class="fas fa-calendar-day"></i>
                                <span>Jadwal
                                    Sidang</span></a>
                        </li>
                    @endif
                    {{-- END: MENU DOSEN --}}
                @endif


                {{-- <li
                    class="submenu  {{set_active(['teacher/add/page','teacher/list/page','teacher/grid/page','teacher/edit'])}} {{ (request()->is('teacher/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-chalkboard-teacher"></i>
                        <span> Teachers</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('teacher/list/page') }}"
                                class="{{set_active(['teacher/list/page','teacher/grid/page'])}}">Teacher List</a></li>
                        <li><a href="teacher-details.html">Teacher View</a></li>
                        <li><a href="{{ route('teacher/add/page') }}"
                                class="{{set_active(['teacher/add/page'])}}">Teacher Add</a></li>
                        <li><a class="{{ (request()->is('teacher/edit/*')) ? 'active' : '' }}">Teacher Edit</a></li>
                    </ul>
                </li> --}}

                {{-- <li
                    class="submenu {{set_active(['department/add/page','department/edit/page'])}} {{ request()->is('department/edit/*') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-building"></i>
                        <span> Departments</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('department/list/page') }}"
                                class="{{set_active(['department/list/page'])}} {{ request()->is('department/edit/*') ? 'active' : '' }}">Department
                                List</a></li>
                        <li><a href="{{ route('department/add/page') }}"
                                class="{{set_active(['department/add/page'])}}">Department Add</a></li>
                        <li><a>Department Edit</a></li>
                    </ul>
                </li> --}}

                {{-- <li
                    class="submenu {{set_active(['subject/list/page','subject/add/page'])}} {{ request()->is('subject/edit/*') ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-book-reader"></i>
                        <span> Subjects</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="{{set_active(['subject/list/page'])}} {{ request()->is('subject/edit/*') ? 'active' : '' }}"
                                href="{{ route('subject/list/page') }}">Subject List</a></li>
                        <li><a class="{{set_active(['subject/add/page'])}}"
                                href="{{ route('subject/add/page') }}">Subject Add</a></li>
                        <li><a>Subject Edit</a></li>
                    </ul>
                </li> --}}

                {{-- <li class="submenu {{set_active(['invoice/list/page','invoice/paid/page',
                    'invoice/overdue/page','invoice/draft/page','invoice/recurring/page',
                    'invoice/cancelled/page','invoice/grid/page','invoice/add/page',
                    'invoice/edit/page','invoice/view/page','invoice/settings/page',
                    'invoice/settings/tax/page','invoice/settings/bank/page'])}}">
                    <a href="#"><i class="fas fa-clipboard"></i>
                        <span> Invoices</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="{{set_active(['invoice/list/page','invoice/paid/page','invoice/overdue/page','invoice/draft/page','invoice/recurring/page','invoice/cancelled/page'])}}"
                                href="{{ route('invoice/list/page') }}">Invoices List</a></li>
                        <li><a class="{{set_active(['invoice/grid/page'])}}"
                                href="{{ route('invoice/grid/page') }}">Invoices Grid</a></li>
                        <li><a class="{{set_active(['invoice/add/page'])}}" href="{{ route('invoice/add/page') }}">Add
                                Invoices</a></li>
                        <li><a class="{{set_active(['invoice/edit/page'])}}"
                                href="{{ route('invoice/edit/page') }}">Edit Invoices</a></li>
                        <li><a class="{{set_active(['invoice/view/page'])}}"
                                href="{{ route('invoice/view/page') }}">Invoices Details</a></li>
                        <li><a class="{{set_active(['invoice/settings/page','invoice/settings/tax/page','invoice/settings/bank/page'])}}"
                                href="{{ route('invoice/settings/page') }}">Invoices Settings</a></li>
                    </ul>
                </li> --}}

                @if (Auth::check())
                    @if (Auth::user()->role_name == 'Dosen')
                        <li class="{{ set_active(['dosen/jadwalsidangmahasiswa']) }}">
                            <a href="{{ route('dosen/jadwalsidangmahasiswa') }}"><i
                                    class="fas fa-file-invoice-dollar"></i>
                                <span>Account Dosen</span></a>
                        </li>
                    @elseif(Auth::user()->role_name == 'Student')
                        <li class="{{ set_active(['accountprofilemahasiswa/page']) }}">
                            <a href="{{ route('accountprofilemahasiswa/page') }}"><i
                                    class="fas fa-file-invoice-dollar"></i>
                                <span>Account Mahasiswa</span></a>
                        </li>
                    @endif
                @endif
                {{-- <li>
                    <a href="holiday.html"><i class="fas fa-holly-berry"></i> <span>Holiday</span></a>
                </li>
                <li>
                    <a href="fees.html"><i class="fas fa-comment-dollar"></i> <span>Fees</span></a>
                </li>
                <li>
                    <a href="exam.html"><i class="fas fa-clipboard-list"></i> <span>Exam list</span></a>
                </li>
                <li>
                    <a href="event.html"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
                </li>
                <li>
                    <a href="library.html"><i class="fas fa-book"></i> <span>Library</span></a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
