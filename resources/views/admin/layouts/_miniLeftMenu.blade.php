<ul class=" navigation">
    <li {!! (Request::is('admin') ? 'class="active"' : '') !!}>
        <a href="{{ route('admin.dashboard') }}">
            <i class="material-icons menu-icon text-primary leftsize">home</i>
            <span class="mm-text">Dashboard</span>
        </a>
    </li>
    <li {!! (Request::is('admin/datatables') || Request::is('admin/editable_datatables') || Request::is('admin/dropzone') || Request::is('admin/multiple_upload') || Request::is('admin/custom_datatables') || Request::is('admin/selectfilter') ? 'class="active menu-dropdown"' : 'class="menu-dropdown"') !!}>
        <a href="javascript:void(0)">
            <i class="menu-icon material-icons text-success leftsize">local_florist</i>
            <span class="title mm-text">Laravel Examples</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/datatables') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/datatables') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class=" mm-text">Ajax Data Tables</span>
                </a>
            </li>
            <li {!! (Request::is('admin/editable_datatables') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/editable_datatables') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class=" mm-text"> Editable Data Tables</span>
                </a>
            </li>
            <li {!! (Request::is('admin/custom_datatables') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/custom_datatables') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class=" mm-text">Custom Datatables</span>
                </a>
            </li>
            <li {!! (Request::is('admin/dropzone') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/dropzone') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class=" mm-text">Drop Zone</span>
                </a>
            </li>
            <li {!! (Request::is('admin/multiple_upload') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/multiple_upload') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class=" mm-text"> Multiple File Upload</span>
                </a>
            </li>
            <li {!! (Request::is('admin/selectfilter') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/selectfilter') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class=" mm-text"> Select2 Filters</span>
                </a>
            </li>
        </ul>
    </li>
    <li  {!! ( Request::is('admin/laravel_chart') || Request::is('admin/database_chart') ? 'class="active menu-dropdown"' : 'class="menu-dropdown"') !!}>
        <a href="#">
            <i class=" menu-icon material-icons text-info leftsize">insert_chart</i>
            <span class="title mm-text">Laravel Charts</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/laravel_chart') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/laravel_chart') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Simple charts</span>
                </a>
            </li>
            <li {!! (Request::is('admin/database_chart') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/database_chart') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Database Charts</span>
                </a>
            </li>

        </ul>
    </li>
    <li {!! (Request::is('admin/generator_builder') ? 'class="active"' : '') !!}>
        <a href="{{  URL::to('admin/generator_builder') }}">
            <i class="material-icons text-success leftsize">build</i>
            <span class="mm-text">Generator Builder</span>
        </a>
    </li>

    <li {!! (Request::is('admin/log_viewers') || Request::is('admin/log_viewers/logs')  ? 'class="active" ' : '') !!}>

        <a href="{{  URL::to('admin/log_viewers') }}">
            <i class="material-icons text-danger leftsize">bug_report</i>
            <span class="mm-text">Log Viewer</span>
        </a>
    </li>
    <li {!! (Request::is('admin/activity_log') ? 'class="active"' : '') !!}>
        <a href="{{  URL::to('admin/activity_log') }}">
            <i class="material-icons text-success leftsize">visibility</i>
            <span class="mm-text">Activity Log</span>
        </a>
    </li>

    <li {!! (Request::is('admin/form_examples') || Request::is('admin/editor') || Request::is('admin/editor2')
    || Request::is('admin/form_layout') || Request::is('admin/validation') || Request::is('admin/formelements') || Request::is('admin/dropdowns')
    || Request::is('admin/radio_checkbox') || Request::is('admin/ratings') || Request::is('admin/form_layouts') || Request::is('admin/formwizard')
    || Request::is('admin/accordionformwizard') || Request::is('admin/datepicker') | Request::is('admin/advanced_datepickers')? 'class="active menu-dropdown"' : 'class="menu-dropdown"') !!}>
        <a href="#">
            <i class="menu-icon material-icons text-info leftsize">assignment</i>
            <span class="title mm-text">Forms</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/form_examples') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/form_examples') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Form Examples</span>
                </a>
            </li>
            <li {!! (Request::is('admin/editor') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/editor') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Form Editors</span>
                </a>
            </li>
            <li {!! (Request::is('admin/editor2') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/editor2') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Form Editors2</span>
                </a>
            </li>
            <li {!! (Request::is('admin/validation') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/validation') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Form Validation</span>
                </a>
            </li>
            <li {!! (Request::is('admin/formelements') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/formelements') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Form Elements</span>
                </a>
            </li>
            <li {!! (Request::is('admin/dropdowns') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/dropdowns') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Drop Downs</span>
                </a>
            </li>
            <li {!! (Request::is('admin/radio_checkbox') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/radio_checkbox') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Radio and Checkbox</span>
                </a>
            </li>
            <li {!! (Request::is('admin/ratings') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/ratings') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Ratings</span>
                </a>
            </li>
            <li {!! (Request::is('admin/form_layouts') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/form_layouts') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Form Layouts</span>
                </a>
            </li>
            <li {!! (Request::is('admin/formwizard') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/formwizard') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Form Wizards</span>
                </a>
            </li>
            <li {!! (Request::is('admin/accordionformwizard') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/accordionformwizard') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Accordion Wizards</span>
                </a>
            </li>

            <li {!! (Request::is('admin/datepicker') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/datepicker') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Date Pickers</span>
                </a>
            </li>
            <li {!! (Request::is('admin/advanced_datepickers') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/advanced_datepickers') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Advanced Date Pickers</span>
                </a>
            </li>
        </ul>
    </li>

    <li  {!! (Request::is('admin/animatedicons') || Request::is('admin/buttons') || Request::is('admin/advanced_buttons') || Request::is('admin/tabs_accordions') || Request::is('admin/panels') || Request::is('admin/icon') || Request::is('admin/color') || Request::is('admin/grid') || Request::is('admin/carousel') || Request::is('admin/advanced_modals') || Request::is('admin/tagsinput') || Request::is('admin/nestable_list') || Request::is('admin/sortable_list') || Request::is('admin/toastr') || Request::is('admin/notifications')|| Request::is('admin/treeview_jstree')|| Request::is('admin/sweetalert') || Request::is('admin/session_timeout') || Request::is('admin/portlet_draggable') ? 'class="active menu-dropdown"' : 'class="menu-dropdown"') !!}>
        <a href="#">
            <i class="menu-icon material-icons text-warning leftsize">brush</i>
            <span class="title mm-text">UI Features</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/animatedicons') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/animatedicons') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Animated Icons</span>
                </a>
            </li>
            <li {!! (Request::is('admin/buttons') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/buttons') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Buttons</span>
                </a>
            </li>
            <li {!! (Request::is('admin/advanced_buttons') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/advanced_buttons') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Advanced Buttons</span>
                </a>
            </li>
            <li {!! (Request::is('admin/tabs_accordions') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/tabs_accordions') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Tabs and Accordions</span>
                </a>
            </li>
            <li {!! (Request::is('admin/panels') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/panels') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Panels</span>
                </a>
            </li>
            <li {!! (Request::is('admin/icon') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/icon') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Font Icons</span>
                </a>
            </li>
            <li {!! (Request::is('admin/color') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/color') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Color Picker Slider</span>
                </a>
            </li>
            <li {!! (Request::is('admin/grid') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/grid') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Grid Layout</span>
                </a>
            </li>
            <li {!! (Request::is('admin/carousel') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/carousel') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Carousel</span>
                </a>
            </li>
            <li {!! (Request::is('admin/advanced_modals') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/advanced_modals') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Advanced Modals</span>
                </a>
            </li>
            <li {!! (Request::is('admin/tagsinput') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/tagsinput') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Tags Input</span>
                </a>
            </li>
            <li {!! (Request::is('admin/nestable_list') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/nestable_list') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text"> Nestable List</span>
                </a>
            </li>

            <li {!! (Request::is('admin/sortable_list') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/sortable_list') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Sortable List</span>
                </a>
            </li>

            <li {!! (Request::is('admin/treeview_jstree') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/treeview_jstree') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Treeview and jsTree</span>
                </a>
            </li>

            <li {!! (Request::is('admin/toastr') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/toastr') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Toastr Notifications</span>
                </a>
            </li>

            <li {!! (Request::is('admin/sweetalert') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/sweetalert') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Sweet Alert</span>
                </a>
            </li>

            <li {!! (Request::is('admin/notifications') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/notifications') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text"> Notifications</span>
                </a>
            </li>
            <li {!! (Request::is('admin/session_timeout') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/session_timeout') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text"> Session Timeout</span>
                </a>
            </li>
            <li {!! (Request::is('admin/portlet_draggable') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/portlet_draggable') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Draggable Portlets</span>
                </a>
            </li>
        </ul>
    </li>
    <li {!! (Request::is('admin/general') || Request::is('admin/pickers') || Request::is('admin/x-editable') || Request::is('admin/timeline') || Request::is('admin/transitions') || Request::is('admin/sliders') || Request::is('admin/knob') ? 'class="active menu-dropdown"' : 'class="menu-dropdown"') !!}>
        <a href="#">
            <i class=" menu-icon material-icons text-danger leftsize">settings_input_component</i>
            <span class="title mm-text">UI Components</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/general') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/general') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">General Components</span>
                </a>
            </li>
            <li {!! (Request::is('admin/pickers') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/pickers') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Pickers</span>
                </a>
            </li>
            <li {!! (Request::is('admin/x-editable') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/x-editable') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">X-editable</span>
                </a>
            </li>
            <li {!! (Request::is('admin/timeline') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/timeline') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Timeline</span>
                </a>
            </li>
            <li {!! (Request::is('admin/transitions') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/transitions') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Transitions</span>
                </a>
            </li>
            <li {!! (Request::is('admin/sliders') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/sliders') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Sliders</span>
                </a>
            </li>
            <li {!! (Request::is('admin/knob') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/knob') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Circles Sliders</span>
                </a>
            </li>
        </ul>
    </li>
    <li {!! (Request::is('admin/simple_table') || Request::is('admin/responsive_tables') || Request::is('admin/advanced_tables') || Request::is('admin/advanced_tables2') ? 'class="active menu-dropdown"' : 'class="menu-dropdown"') !!}>
        <a href="#">
            <i class="menu-icon material-icons text-primary leftsize">view_module</i>
            <span class="title mm-text">DataTables</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/simple_table') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/simple_table') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Simple tables</span>
                </a>
            </li>
            <li {!! (Request::is('admin/advanced_tables') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/advanced_tables') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Advanced Data Tables</span>
                </a>
            </li>
            <li {!! (Request::is('admin/advanced_tables2') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/advanced_tables2') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Advanced Data Tables2</span>
                </a>
            </li>

            <li {!! (Request::is('admin/responsive_tables') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/responsive_tables') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Responsive Datatables</span>
                </a>
            </li>
            <li {!! (Request::is('admin/jtable') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/jtable') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">JTable</span>
                </a>
            </li>
        </ul>
    </li>
    <li {!! (Request::is('admin/charts') || Request::is('admin/piecharts') || Request::is('admin/charts_animation') || Request::is('admin/jscharts') || Request::is('admin/sparklinecharts') ? 'class="active menu-dropdown"' : 'class="menu-dropdown"') !!}>
        <a href="#">
            <i class="menu-icon material-icons text-success leftsize">insert_chart</i>
            <span class="title mm-text">Charts</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/charts') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/charts') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Flot Charts</span>
                </a>
            </li>
            <li {!! (Request::is('admin/piecharts') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/piecharts') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Pie Charts</span>
                </a>
            </li>
            <li {!! (Request::is('admin/charts_animation') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/charts_animation') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Animated Charts</span>
                </a>
            </li>
            <li {!! (Request::is('admin/jscharts') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/jscharts') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">JS Charts</span>
                </a>
            </li>
            <li {!! (Request::is('admin/sparklinecharts') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/sparklinecharts') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Sparkline Charts</span>
                </a>
            </li>
        </ul>
    </li>
    <li {!! (Request::is('admin/calendar') ? 'class="active"' : '') !!}>
        <a href="{{ URL::to('admin/calendar') }}">
            <i class="menu-icon material-icons text-warning leftsize">today</i>
            <span class="mm-text">Calendar</span>
            <span class="badge badge-danger event_count mm-text">7</span>
        </a>
    </li>
    <li {!! (Request::is('admin/inbox') || Request::is('admin/compose') || Request::is('admin/view_mail') ? 'class="active menu-dropdown"' : 'class="menu-dropdown"') !!}>
        <a href="#">
            <i class="menu-icon material-icons text-info leftsize">email</i>
            <span class="title mm-text">Email</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/inbox') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/inbox') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Inbox</span>
                </a>
            </li>
            <li {!! (Request::is('admin/compose') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/compose') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Compose</span>
                </a>
            </li>
            <li {!! (Request::is('admin/view_mail') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/view_mail') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Single Mail</span>
                </a>
            </li>
        </ul>
    </li>
    <li {!! (Request::is('admin/tasks') ? 'class="active"' : '') !!}>
        <a href="{{ URL::to('admin/tasks') }}">
            <i class="menu-icon material-icons text-danger leftsize">list</i>
            <span class="mm-text">Tasks</span>
            <span class="badge badge-danger mm-text" id="taskcount">{{ Request::get('tasks_count') }}</span>
        </a>
    </li>
    <li {!! (Request::is('admin/gallery') || Request::is('admin/masonry_gallery') || Request::is('admin/imagecropping') || Request::is('admin/imgmagnifier') ? 'class="active menu-dropdown"' : 'class="menu-dropdown"') !!}>
        <a href="#">
            <i class="menu-icon material-icons text-primary leftsize">photo_library</i>
            <span class="title mm-text">Gallery</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/gallery') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/gallery') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Gallery</span>
                </a>
            </li>
            <li {!! (Request::is('admin/masonry_gallery') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/masonry_gallery') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Masonry Gallery</span>
                </a>
            </li>
            <li {!! (Request::is('admin/imagecropping') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/imagecropping') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Image Cropping</span>
                </a>
            </li>
            <li {!! (Request::is('admin/imgmagnifier') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/imgmagnifier') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Image Magnifier</span>
                </a>
            </li>
        </ul>
    </li>
    <li {!! (Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/user_profile') || Request::is('admin/users/*') || Request::is('admin/deleted_users') ? 'class="active menu-dropdown"' : 'class="menu-dropdown"') !!}>
        <a href="#">
            <i class="menu-icon material-icons text-success leftsize">group</i>
            <span class="title mm-text">Users</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/users') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/users') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Users</span>
                </a>
            </li>
            <li {!! (Request::is('admin/users/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/users/create') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Add New User</span>
                </a>
            </li>
            <li {!! ((Request::is('admin/users/*')) && !(Request::is('admin/users/create')) ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::route('admin.users.show',Sentinel::getUser()->id) }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">View Profile</span>
                </a>
            </li>
            <li {!! (Request::is('admin/deleted_users') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/deleted_users') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Deleted Users</span>
                </a>
            </li>
        </ul>
    </li>
    <li {!! (Request::is('admin/groups') || Request::is('admin/groups/create') || Request::is('admin/groups/*') ? 'class="active menu-dropdown"' : 'class="menu-dropdown"') !!}>
        <a href="#">
            <i class="menu-icon material-icons text-warning leftsize">group</i>
            <span class="title mm-text">Groups</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/groups') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/groups') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Groups</span>
                </a>
            </li>
            <li {!! (Request::is('admin/groups/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/groups/create') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Add New Group</span>
                </a>
            </li>
        </ul>
    </li>
    <li {!! (Request::is('admin/googlemaps') || Request::is('admin/vectormaps') || Request::is('admin/advancedmaps') ? 'class="active menu-dropdown"' : 'class="menu-dropdown"') !!}>
        <a href="#">
            <i class="menu-icon material-icons text-info leftsize">map</i>
            <span class="title mm-text">Maps</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/googlemaps') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/googlemaps') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Google Maps</span>
                </a>
            </li>
            <li {!! (Request::is('admin/vectormaps') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/vectormaps') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Vector Maps</span>
                </a>
            </li>
            <li {!! (Request::is('admin/advancedmaps') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/advancedmaps') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Advanced Maps</span>
                </a>
            </li>
        </ul>
    </li>
    <li {!! ((Request::is('admin/blogcategory') || Request::is('admin/blogcategory/create') || Request::is('admin/blog') ||  Request::is('admin/blog/create')) || Request::is('admin/blog/*') || Request::is('admin/blogcategory/*') ? 'class="active menu-dropdown"' : 'class="menu-dropdown"') !!}>
        <a href="#">
            <i class="menu-icon material-icons text-warning leftsize">chat_bubble</i>
            <span class="title mm-text">Blog</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/blogcategory') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/blogcategory') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Blog Category List</span>
                </a>
            </li>
            <li {!! (Request::is('admin/blog') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/blog') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Blog List</span>
                </a>
            </li>
            <li {!! (Request::is('admin/blog/create') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/blog/create') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Add New Blog</span>
                </a>
            </li>
        </ul>
    </li>
    <li {!! (Request::is('admin/news') || Request::is('admin/news_item')  ? 'class="active menu-dropdown"' : 'class="menu-dropdown"') !!}>
        <a href="#">
            <i class="menu-icon material-icons text-danger leftsize">open_with</i>
            <span class="title mm-text">News</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/news') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/news') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">News</span>
                </a>
            </li>
            <li {!! (Request::is('admin/news_item') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/news_item') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">News Details</span>
                </a>
            </li>
        </ul>
    </li>
    <li {!! (Request::is('admin/minisidebar') ? 'class="active"' : '') !!}>
        <a href="{{  URL::to('admin/minisidebar') }}">
            <i class="material-icons text-success leftsize">sort</i>
            <span class="mm-text">Mini Sidebar</span>
        </a>
    </li>
    <li {!! (Request::is('admin/fixedmenu') ? 'class="active"' : '') !!}>
        <a href="{{  URL::to('admin/fixedmenu') }}">
            <i class="material-icons text-primary leftsize">sort</i>
            <span class="mm-text">Fixed Menu</span>
        </a>
    </li>
    <li {!! (Request::is('admin/invoice') || Request::is('admin/blank')  ? 'class="active menu-dropdown"' : 'class="menu-dropdown"') !!}>
        <a href="#">
            <i class="menu-icon material-icons text-primary leftsize">flag</i>
            <span class="title mm-text">Pages</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu sidebarbottom">
            <li {!! (Request::is('admin/lockscreen') ? 'class="active"' : '') !!}>
                <a href="{{ URL::route('lockscreen',Sentinel::getUser()->id) }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Lockscreen</span>
                </a>
            </li>
            <li {!! (Request::is('admin/invoice') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/invoice') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Invoice</span>
                </a>
            </li>
            <li {!! (Request::is('admin/login') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/login') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Login</span>
                </a>
            </li>
            <li {!! (Request::is('admin/login2') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/login2') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Login 2</span>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('admin/login#toregister') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Register</span>
                </a>
            </li>
            <li>
                <a href="{{ URL::to('admin/register2') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Register2</span>
                </a>
            </li>
            <li {!! (Request::is('admin/404') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/404') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">404 Error</span>
                </a>
            </li>
            <li {!! (Request::is('admin/500') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/500') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">500 Error</span>
                </a>
            </li>
            <li {!! (Request::is('admin/blank') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/blank') }}">
                    <i class="material-icons">keyboard_arrow_right</i>
                    <span class="mm-text">Blank Page</span>
                </a>
            </li>
        </ul>
    </li>
    <!-- Menus generated by CRUD generator -->
    {{--@include('admin/layouts/menu')--}}
</ul>