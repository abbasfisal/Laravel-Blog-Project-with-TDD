<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description"
          content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google.">
    <meta name="keywords"
          content="materialize, admin template, dashboard template, flat admin template, responsive admin template, eCommerce dashboard, analytic dashboard">
    <meta name="author" content="ThemeSelect">
    <title>Blog |laravel9</title>
    <link rel="apple-touch-icon" href="{{asset('materialize/fav/apple-touch-icon-152x152.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('materialize/fav/favicon-32x32.png')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- BEGIN: VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('materialize/css/vendors.min.css')}}">
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('materialize/css/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('materialize/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('materialize/css/style-horizontal.css')}}">
    <!-- END: Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('materialize/css/custom.css')}}">
    <!-- END: Custom CSS-->
</head>

<body class="horizontal-layout page-header-light horizontal-menu preload-transitions 2-columns"
      data-open="click"
      data-menu="horizontal-menu" data-col="2-columns">

<!-- BEGIN: Header-->
<header class="page-topbar" id="header">
    <div class="navbar navbar-fixed">
        <nav class="navbar-main navbar-color nav-collapsible sideNav-lock navbar-dark gradient-45deg-light-blue-cyan">
            <div class="nav-wrapper">

                <div class="header-search-wrapper hide-on-med-and-down"><i class="material-icons">search</i>
                    <input class="header-search-input z-depth-2" type="text" name="Search"
                           placeholder="Explore Materialize" data-search="template-list">
                    <ul class="search-list collection display-none"></ul>
                </div>
                <ul class="navbar-list right">
                    <li class="hide-on-med-and-down"><a class="waves-effect waves-block waves-light toggle-fullscreen"
                                                        href="javascript:void(0);"><i class="material-icons">settings_overscan</i></a>
                    </li>
                    <li class="hide-on-large-only"><a class="waves-effect waves-block waves-light search-button"
                                                      href="javascript:void(0);"><i
                                class="material-icons">search </i></a></li>
                    <li><a class="waves-effect waves-block waves-light notification-button" href="javascript:void(0);"
                           data-target="notifications-dropdown"><i class="material-icons">notifications_none<small
                                    class="notification-badge orange accent-3">5</small></i></a></li>
                    <li><a class="waves-effect waves-block waves-light profile-button" href="javascript:void(0);"
                           data-target="profile-dropdown"><span class="avatar-status avatar-online">
                                <img src="{{asset('materialize/fav/avatar-7.png')}}" alt="avatar"><i></i></span></a>
                    </li>

                </ul>

                <!-- notifications-dropdown-->
                <ul class="dropdown-content" id="notifications-dropdown">
                    <li>
                        <h6>NOTIFICATIONS<span class="new badge">5</span></h6>
                    </li>
                    <li class="divider"></li>
                    <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle cyan small">add_shopping_cart</span>
                            A new order has been placed!</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">2 hours ago
                        </time>
                    </li>
                    <li><a class="black-text" href="#!"><span
                                class="material-icons icon-bg-circle red small">stars</span> Completed the task</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">3 days ago
                        </time>
                    </li>
                    <li><a class="black-text" href="#!"><span
                                class="material-icons icon-bg-circle teal small">settings</span> Settings updated</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">4 days ago
                        </time>
                    </li>
                    <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle deep-orange small">today</span>
                            Director meeting started</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">6 days ago
                        </time>
                    </li>
                    <li><a class="black-text" href="#!"><span class="material-icons icon-bg-circle amber small">trending_up</span>
                            Generate monthly report</a>
                        <time class="media-meta grey-text darken-2" datetime="2015-06-12T20:50:48+08:00">1 week ago
                        </time>
                    </li>
                </ul>

                <!-- profile-dropdown-->
                <ul class="dropdown-content" id="profile-dropdown">
                    <li><a class="grey-text text-darken-1" href="user-profile-page.html"><i class="material-icons">person_outline</i>
                            Profile</a></li>

                    <li><a class="grey-text text-darken-1" href="user-login.html"><i
                                class="material-icons">keyboard_tab</i> Logout</a></li>
                </ul>
            </div>
            <nav class="display-none search-sm">
                <div class="nav-wrapper">
                    <form id="navbarForm">
                        <div class="input-field search-input-sm">
                            <input class="search-box-sm" type="search" required="" id="search"
                                   placeholder="Explore Materialize" data-search="template-list">
                            <label class="label-icon" for="search"><i
                                    class="material-icons search-sm-icon">search</i></label><i
                                class="material-icons search-sm-close">close</i>
                            <ul class="search-list collection search-list-sm display-none"></ul>
                        </div>
                    </form>
                </div>
            </nav>
        </nav>
        <!-- BEGIN: Horizontal nav start-->
        <nav class="white hide-on-med-and-down" id="horizontal-nav">
            <div class="nav-wrapper">
                <ul class="left hide-on-med-and-down" id="ul-horizontal-nav" data-menu="menu-navigation">

                    <li>
                        <a class="dropdown-menu" href="Javascript:void(0)" data-target="formsTables">
                            <i class="material-icons">chrome_reader_mode</i>
                            <span><span class="dropdown-title" data-i18n="Forms &amp; Tables">Forms &amp; Tables</span>
                                <i class="material-icons right">keyboard_arrow_down</i>
                            </span>
                        </a>
                        <ul class="dropdown-content dropdown-horizontal-list" id="formsTables">
                            <li data-menu=""><a href="table-basic.html"><span
                                        data-i18n="Basic Tables">Basic Tables</span></a>
                            </li>
                            <li data-menu=""><a href="table-data-table.html"><span
                                        data-i18n="Data Tables">Data Tables</span></a>
                            </li>
                            <li class="dropdown dropdown-submenu" data-menu="dropdown-submenu"><a
                                    class="dropdownSub-menu" href="Javascript:void(0)" data-target="formsDropdown"><span
                                        data-i18n="Forms">Forms</span><i class="material-icons right">chevron_right</i></a>
                                <ul class="dropdown-content dropdown-horizontal-list" id="formsDropdown">
                                    <li data-menu=""><a href="form-elements.html"><span data-i18n="Form Elements">Form Elements</span></a>
                                    </li>
                                    <li data-menu=""><a href="form-select2.html"><span data-i18n="Form Select2">Form Select2</span></a>
                                    </li>
                                    <li data-menu=""><a href="form-validation.html"><span data-i18n="Form Validation">Form Validation</span></a>
                                    </li>
                                    <li data-menu=""><a href="form-masks.html"><span
                                                data-i18n="Form Masks">Form Masks</span></a>
                                    </li>
                                    <li data-menu=""><a href="form-editor.html"><span data-i18n="Form Editor">Form Editor</span></a>
                                    </li>
                                    <li data-menu=""><a href="form-file-uploads.html"><span data-i18n="File Uploads">File Uploads</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li data-menu=""><a href="form-layouts.html"><span
                                        data-i18n="Form Layouts">Form Layouts</span></a>
                            </li>
                            <li data-menu=""><a href="form-wizard.html"><span data-i18n="Form Wizard">Form Wizard</span></a>
                            </li>
                        </ul>
                    </li>


                </ul>
            </div>
            <!-- END: Horizontal nav start-->
        </nav>
    </div>
</header>
<!-- END: Header-->

<ul class="display-none" id="default-search-main">
    <li class="auto-suggestion-title"><a class="collection-item" href="#">
            <h6 class="search-title">FILES</h6>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img src="../../../app-assets/images/icon/pdf-image.png" width="24" height="30"
                                             alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span
                            class="black-text">Two new item submitted</span><small class="grey-text">Marketing
                            Manager</small></div>
                </div>
                <div class="status"><small class="grey-text">17kb</small></div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img src="../../../app-assets/images/icon/doc-image.png" width="24" height="30"
                                             alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span
                            class="black-text">52 Doc file Generator</span><small class="grey-text">FontEnd
                            Developer</small></div>
                </div>
                <div class="status"><small class="grey-text">550kb</small></div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img src="../../../app-assets/images/icon/xls-image.png" width="24" height="30"
                                             alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span
                            class="black-text">25 Xls File Uploaded</span><small class="grey-text">Digital Marketing
                            Manager</small></div>
                </div>
                <div class="status"><small class="grey-text">20kb</small></div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img src="../../../app-assets/images/icon/jpg-image.png" width="24" height="30"
                                             alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">Anna Strong</span><small
                            class="grey-text">Web Designer</small></div>
                </div>
                <div class="status"><small class="grey-text">37kb</small></div>
            </div>
        </a></li>
    <li class="auto-suggestion-title"><a class="collection-item" href="#">
            <h6 class="search-title">MEMBERS</h6>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img class="circle" src="../../../app-assets/images/avatar/avatar-7.png"
                                             width="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">John Doe</span><small
                            class="grey-text">UI designer</small></div>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img class="circle" src="../../../app-assets/images/avatar/avatar-8.png"
                                             width="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">Michal Clark</span><small
                            class="grey-text">FontEnd Developer</small></div>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img class="circle" src="../../../app-assets/images/avatar/avatar-10.png"
                                             width="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span
                            class="black-text">Milena Gibson</span><small class="grey-text">Digital Marketing</small>
                    </div>
                </div>
            </div>
        </a></li>
    <li class="auto-suggestion"><a class="collection-item" href="#">
            <div class="display-flex">
                <div class="display-flex align-item-center flex-grow-1">
                    <div class="avatar"><img class="circle" src="../../../app-assets/images/avatar/avatar-12.png"
                                             width="30" alt="sample image"></div>
                    <div class="member-info display-flex flex-column"><span class="black-text">Anna Strong</span><small
                            class="grey-text">Web Designer</small></div>
                </div>
            </div>
        </a></li>
</ul>
<ul class="display-none" id="page-search-title">
    <li class="auto-suggestion-title">
        <a class="collection-item" href="#">
            <h6 class="search-title">PAGES</h6>
        </a>
    </li>
</ul>
<ul class="display-none" id="search-not-found">
    <li class="auto-suggestion">
        <a class="collection-item display-flex align-items-center" href="#"><span
                class="material-icons">error_outline</span><span class="member-info">No results found.</span>
        </a>
    </li>
</ul>


<!-- BEGIN: SideNav-->
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-fixed hide-on-large-only">
    <div class="brand-sidebar sidenav-light"></div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed hide-on-large-only menu-shadow"
        id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="bold"><a class="collapsible-header waves-effect waves-cyan " href="Javascript:void(0)"><i
                    class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Dashboard">Dashboard</span><span
                    class="badge badge pill red float-right mr-10">3</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a href="dashboard-modern.html"><i class="material-icons">radio_button_unchecked</i><span
                                data-i18n="Modern">Modern</span></a>
                    </li>
                    <li><a href="dashboard-ecommerce.html"><i class="material-icons">radio_button_unchecked</i><span
                                data-i18n="eCommerce">eCommerce</span></a>
                    </li>
                    <li><a href="dashboard-analytics.html"><i class="material-icons">radio_button_unchecked</i><span
                                data-i18n="Analytics">Analytics</span></a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="bold"><a class="waves-effect waves-cyan "
                            href="../https://pixinvent.com/materialize-material-design-admin-template/documentation/index.html"
                            target="_blank"><i class="material-icons">import_contacts</i><span class="menu-title"
                                                                                               data-i18n="Documentation">Documentation</span></a>
        </li>
        <li class="bold"><a class="waves-effect waves-cyan " href="https://pixinvent.ticksy.com/" target="_blank"><i
                    class="material-icons">help_outline</i><span class="menu-title"
                                                                 data-i18n="Support">Support</span></a>
        </li>
    </ul>
    <div class="navigation-background"></div>
    <a class="sidenav-trigger btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#"
       data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
<!-- END: SideNav-->

<!-- BEGIN: Page Main-->
<div id="main">
    <div class="row">
        <div class="pt-1 pb-0" id="breadcrumbs-wrapper">
            <!-- Search for small screen-->
            <div class="container">


                <div class="section mt-2" id="blog-list">
                    <div class="row">
                        <!-- Fashion Card -->
                       {{-- <div class="col s12 m6 l4">
                            <div class="card-panel border-radius-6 mt-10 card-animation-1">
                                <a href="#"><img class="responsive-img border-radius-8 z-depth-4 image-n-margin"
                                                 src="{{asset('materialize/fav/news-fashion.jpg')}}" alt=""></a>
                                <h6 class="deep-purple-text text-darken-3 mt-5"><a href="#">Fashion</a></h6>
                                <span>Fashion is a popular style, especially in clothing, footwear, lifestyle, accessories, makeup, hairstyle
                                        and body.</span>
                                <div class="display-flex justify-content-between flex-wrap mt-4">
                                    <div class="display-flex align-items-center mt-1">
                                        <img src="{{asset('materialize/fav/avatar-7.png')}}" width="30" alt="fashion"
                                             class="circle mr-10 vertical-text-middle">
                                        <span class="pt-2">Taniya</span>
                                    </div>
                                    <div class="display-flex mt-3 right-align social-icon">
                                        <span class="material-icons">favorite_border</span> <span
                                            class="ml-3 vertical-align-top">340</span>
                                        <span class="material-icons ml-10">chat_bubble_outline</span> <span
                                            class="ml-3 vertical-align-top">80</span>
                                    </div>
                                </div>
                            </div>
                        </div>--}}
                        @yield('content')
                    </div>

                </div>


            </div>


        </div>


    </div>
</div>
<!-- END: Page Main-->

<!-- BEGIN: Footer-->
<footer
    class="page-footer footer footer-static footer-dark gradient-45deg-light-blue-cyan gradient-shadow navbar-border navbar-shadow">
    <div class="footer-copyright">
        <div class="container"><span>&copy; 2020 <a href="http://themeforest.net/user/pixinvent/portfolio?ref=pixinvent"
                                                    target="_blank">PIXINVENT</a> All rights reserved.</span><span
                class="right hide-on-small-only">Design and Developed by <a href="https://pixinvent.com/">PIXINVENT</a></span>
        </div>
    </div>
</footer>
<!-- END: Footer-->

{{--JS--}}
<script src="{{asset('materialize/js/vendors.min.js')}}"></script>
<script src="{{asset('materialize/js/plugins.min.js')}}"></script>
<script src="{{asset('materialize/js/search.min.js')}}"></script>
<script src="{{asset('materialize/js/custom-script.js')}}"></script>

</body>

</html>
