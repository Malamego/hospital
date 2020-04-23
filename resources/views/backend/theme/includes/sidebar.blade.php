<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="nav-item start {{ active_route('admin.index') }}">
                <a href="{{ aurl('/') }}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">{{ trans('main.dashboard') }}</span>
                </a>
            </li>

            <li class="heading">
                <h3 class="uppercase">{{ trans('main.users') }}</h3>
            </li>

            <li class="nav-item  {{ active_route('users.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">{{ trans('main.users') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ active_route('users.create') }}">
                        <a href="{{ route('users.create') }}" class="nav-link ">
                            <span class="title">{{ trans('main.add') }} {{ trans('main.user') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_route('users.index') }}">
                        <a href="{{ route('users.index') }}" class="nav-link ">
                            <span class="title">{{ trans('main.show-all') }} {{ trans('main.users') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  {{ active_route('roles.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-get-pocket"></i>
                    <span class="title">{{ trans('main.roles') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ active_route('roles.create') }}">
                        <a href="{{ route('roles.create') }}" class="nav-link ">
                            <span class="title">{{ trans('main.add') }} {{ trans('main.role') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_route('roles.index') }}">
                        <a href="{{ route('roles.index') }}" class="nav-link ">
                            <span class="title">{{ trans('main.show-all') }} {{ trans('main.roles') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  {{ active_route('permissions.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-tripadvisor"></i>
                    <span class="title">{{ trans('main.permissions') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ active_route('permissions.create') }}">
                        <a href="{{ route('permissions.create') }}" class="nav-link ">
                            <span class="title">{{ trans('main.add') }} {{ trans('main.permissions') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_route('permissions.index') }}">
                        <a href="{{ route('permissions.index') }}" class="nav-link ">
                            <span class="title">{{ trans('main.show-all') }} {{ trans('main.permissions') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Add Patients and Prescriptions  -->
            <li class="heading">
                <h3 class="uppercase">{{ trans('main.Pateint_Prescriptions') }}</h3>
            </li>

            <li class="nav-item  {{ active_route('prescriptions.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-get-pocket"></i>
                    <span class="title">{{ trans('main.prescriptions') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ active_route('prescriptions.create') }}">
                        <a href="{{ route('prescriptions.create') }}" class="nav-link ">
                            <span class="title">{{ trans('main.add') }} {{ trans('main.prescription') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_route('prescriptions.index') }}">
                        <a href="{{ route('prescriptions.index') }}" class="nav-link ">
                            <span class="title">{{ trans('main.show-all') }} {{ trans('main.prescriptions') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  {{ active_route('patients.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-tripadvisor"></i>
                    <span class="title">{{ trans('main.patients') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ active_route('patients.create') }}">
                        <a href="{{ route('patients.create') }}" class="nav-link ">
                            <span class="title">{{ trans('main.add') }} {{ trans('main.patient') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_route('patients.index') }}">
                        <a href="{{ route('patients.index') }}" class="nav-link ">
                            <span class="title">{{ trans('main.show-all') }} {{ trans('main.patients') }}</span>
                        </a>
                    </li>
                </ul>
            </li>


            <!-- Add medical form and Medications -->
            <li class="heading">
                <h3 class="uppercase">{{ trans('main.pharmacy') }}</h3>
            </li>

            <li class="nav-item  {{ active_route('medications.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-get-pocket"></i>
                    <span class="title">{{ trans('main.medications') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ active_route('medications.create') }}">
                        <a href="{{ route('medications.create') }}" class="nav-link ">
                            <span class="title">{{ trans('main.add') }} {{ trans('main.medication') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_route('medications.index') }}">
                        <a href="{{ route('medications.index') }}" class="nav-link ">
                            <span class="title">{{ trans('main.show-all') }} {{ trans('main.medications') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  {{ active_route('medicalforms.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-get-pocket"></i>
                    <span class="title">{{ trans('main.medicalforms') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ active_route('medicalforms.create') }}">
                        <a href="{{ route('medicalforms.create') }}" class="nav-link ">
                            <span class="title">{{ trans('main.add') }} {{ trans('main.medicalform') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_route('medicalforms.index') }}">
                        <a href="{{ route('medicalforms.index') }}" class="nav-link ">
                            <span class="title">{{ trans('main.show-all') }} {{ trans('main.medicalforms') }}</span>
                        </a>
                    </li>
                </ul>
            </li>


            <!-- Add departbeds and Beds -->
            <li class="heading">
                <h3 class="uppercase">{{ trans('main.departbeds') }}</h3>
            </li>

            <li class="nav-item  {{ active_route('beds.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-get-pocket"></i>
                    <span class="title">{{ trans('main.beds') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ active_route('beds.create') }}">
                        <a href="{{ route('beds.create') }}" class="nav-link ">
                            <span class="title">{{ trans('main.add') }} {{ trans('main.bed') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_route('beds.index') }}">
                        <a href="{{ route('beds.index') }}" class="nav-link ">
                            <span class="title">{{ trans('main.show-all') }} {{ trans('main.beds') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item  {{ active_route('departments.*') }}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="fa fa-get-pocket"></i>
                    <span class="title">{{ trans('main.departments') }}</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item {{ active_route('departments.create') }}">
                        <a href="{{ route('departments.create') }}" class="nav-link ">
                            <span class="title">{{ trans('main.add') }} {{ trans('main.department') }}</span>
                        </a>
                    </li>
                    <li class="nav-item {{ active_route('departments.index') }}">
                        <a href="{{ route('departments.index') }}" class="nav-link ">
                            <span class="title">{{ trans('main.show-all') }} {{ trans('main.departments') }}</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
