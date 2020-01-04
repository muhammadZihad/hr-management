<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">User Menu</li>
            <li>
                <a href="{{route('home')}}">
                    <i class="metismenu-icon fas fa-tachometer-alt">
                    </i>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="{{route('employee.index')}}">
                    <i class="metismenu-icon fas fa-user-tie">
                    </i>Employees
                </a>
            </li>
            <li>
                <a href="{{ route('single.attendance',auth()->user()->id) }}">
                    <i class="metismenu-icon fas fa-user-check">
                    </i>My Attendences
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon fas fa-dollar-sign">
                    </i>My Salary
                </a>
            </li>
            <li>
                <a href="{{ route('myschedule') }}">
                    <i class="metismenu-icon fas fa-bell">
                    </i>My Schedule
                </a>
            </li>


            @admin
            <li class="app-sidebar__heading">Admin Menu</li>
            <li>
                <a href="forms-validation.html">
                    <i class="metismenu-icon fas fa-user-shield">
                    </i>Admin
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon fas fa-users-cog"></i>
                    Employees
                    <i class="metismenu-state-icon fas fa-sort-down"></i>
                </a>
                <ul>
                    <li>
                        <a href="{{route('employee.index')}} ">
                            <i class="metismenu-icon"></i>
                            All Employee
                        </a>
                    </li>
                    <li>
                        <a href="{{route('employee.create')}}">
                            <i class="metismenu-icon">
                            </i>New Employee
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon fas fa-tasks"></i>
                    Schedule
                    <i class="metismenu-state-icon fas fa-sort-down"></i>
                </a>
                <ul>
                    <li>
                        <a href="{{route('schedule.index')}}">
                            <i class="metismenu-icon"></i>
                            All schedules
                        </a>
                    </li>
                    <li>
                        <a href="{{route('schedule.create')}}">
                            <i class="metismenu-icon">
                            </i>New Schedule
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon fas fa-sign-out-alt">
                    </i>Leave
                </a>
            </li>

            <li>
                <a href={{ route('attendances') }}>
                    <i class="metismenu-icon fas fa-check-double">
                    </i>Attendences
                </a>
            </li>
            <li>
                <a href="{{ route('salary.index') }}">
                    <i class="metismenu-icon fas fa-donate">
                    </i>Salary
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon fas fa-users-cog"></i>
                    Extra
                    <i class="metismenu-state-icon fas fa-sort-down"></i>
                </a>
                <ul>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon"></i>
                            Department
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon">
                            </i>Designation
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="metismenu-icon">
                            </i>Common Salary
                        </a>
                    </li>
                </ul>
            </li>
            @endadmin



        </ul>
    </div>
</div>