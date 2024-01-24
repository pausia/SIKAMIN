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
                <li class="submenu {{set_active(['home','teacher/dashboard','student/dashboard','superadmin/dashboard','staff/dashboard'])}}">
                    <a>
                        <i class="fas fa-tachometer-alt"></i>
                        <span> Dashboard</span> 
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                    @if(Auth::check())
                        @if(Auth::user()->role_name == 'Dosen')
                            <li><a href="{{ route('teacher/dashboard') }}" class="{{ set_active(['teacher/dashboard']) }}">Teacher Dashboard</a></li>
                        @elseif(Auth::user()->role_name == 'Student')
                            <li><a href="{{ route('student/dashboard') }}" class="{{ set_active(['student/dashboard']) }}">Student Dashboard</a></li>
                        @elseif(Auth::user()->role_name == 'Super Admin')
                            <li><a href="{{ route('superadmin/dashboard') }}" class="{{ set_active(['superadmin/dashboard']) }}">Super Admin Dashboard</a></li>
                        @elseif(Auth::user()->role_name == 'Staff')
                            <li><a href="{{ route('staff/dashboard') }}" class="{{ set_active(['staff/dashboard']) }}">Staff Dashboard</a></li>
                        @endif
                    @endif
                    </ul>
                </li>
                @if(Auth::check())
                    @if(Auth::user()->role_name == 'Dosen')
                        <li class="{{set_active(['dosen/jadwalsidangmahasiswa'])}}">
                            <a href="{{ route('dosen/jadwalsidangmahasiswa') }}"><i class="fas fa-calendar-day"></i> <span>Jadwal Sidang</span></a>
                        </li>
                    @elseif(Auth::user()->role_name == 'Student')
                        <li class="{{set_active(['student/jadwalsidangproposal'])}}">
                            <a href="{{ route('student/jadwalsidangproposal') }}"><i class="fas fa-calendar-day"></i> <span>Jadwal Sidang</span></a>
                        </li>
                    @endif
                @endif

                {{-- Khusus Staff -------------------------------------------------------------------------------------------------------}}
                @if(Auth::check())
                    @if(Auth::user()->role_name == 'Staff')
                        <li class="submenu {{set_active(['staff/mahasiswalist/page','student/grid','student/add/page'])}} {{ (request()->is('student/edit/*')) ? 'active' : '' }} {{ (request()->is('student/profile/*')) ? 'active' : '' }}">
                            <a href="#"><i class="fas fa-graduation-cap"></i>
                                <span> Mahasiswa</span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul>
                                <li><a href="{{ route('staff/mahasiswalist/page') }}"  class="{{set_active(['student/list','student/grid'])}}">Mahasiswa List</a></li>
                                <li><a href="{{ route('staff/aturjadwal/page') }}"  class="{{set_active(['student/list','student/grid'])}}">Atur Jadwal Sidang</a></li>
                            </ul>
                        </li>
                    @endif
                @endif

                {{-- END Khusus Staff -----------------------------------------------------------------------------------------------------}}
                {{--- Khusus Dosen ----------------------------------------------------------------------------------------------------------}}
                <li class="submenu  {{set_active(['dosen/mahasiswabimbingan/list/page','dosen/mahasiswabimbingan/grid/page'])}} {{ (request()->is('teacher/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-chalkboard-teacher"></i>
                        <span> Dosen Bimbingan</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('dosen/mahasiswabimbingan/list/page') }}" class="{{set_active(['dosen/mahasiswabimbingan/list/page','dosen/mahasiswabimbingan/grid/page'])}}">Mahasiswa Bimbingan</a></li>
                        {{-- <li><a href="{{ route('teacher/list/page') }}" class="{{set_active(['teacher/list/page','teacher/grid/page'])}}">Teacher List</a></li> --}}
                    </ul>
                </li>
                
                {{--- END Khusus Dosen ----------------------------------------------------------------------------------------------------------}}
                <li class="menu-title">
                    <span>Management</span>
                </li>

                @if(Auth::check())
                    @if(Auth::user()->role_name == 'Dosen')
                        <li class="{{set_active(['dosen/jadwalsidangmahasiswa'])}}">
                            <a href="{{ route('dosen/jadwalsidangmahasiswa') }}"><i class="fas fa-file-invoice-dollar"></i> <span>Account Dosen</span></a>
                        </li>
                    @endif
                @endif
            </ul>
        </div>
    </div>
</div>