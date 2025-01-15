<!DOCTYPE html>
<html>

<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/forms/general.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Apr 2024 05:38:53 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta http-equiv="refresh" content="30"> --}}
    <title>Justairports.com | CRM</title>
    @if (Route::currentRouteName() == 'admin.all_jobs')
        <style>

        </style>
    @endif
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


    <!-- <link rel="stylesheet" href="{{ url('public/assets/backend/css/bootstrap.min.css') }}"> -->

    <link rel="stylesheet" href="{{ url('public/assets/backend/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="{{ url('public/assets/backend/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ url('public/assets/backend/css/AdminLTE.min.css') }}">

    <link rel="stylesheet" href="{{ url('public/assets/backend/css/_all-skins.min.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ url('public/assets/backend/css/jobs.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets/backend/css/main.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets/backend/css/accounttable.css') }}">
    <link rel="stylesheet" href="{{ url('public/assets/backend/css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-timepicker/1.13.1/jquery.timepicker.min.css">
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

    <!--add new link for date picker-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <!--add new link for date picker-->
    
    <!---country code link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"> 
    <!---country code link-->

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <script nonce="f8c25bf6-247a-4a98-9231-402b3399ce55">



        try {
            (function(w, d) {
                ! function(j, k, l, m) {
                    j[l] = j[l] || {};
                    j[l].executed = [];
                    j.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    j.zaraz._v = "5592";
                    j.zaraz.q = [];
                    j.zaraz._f = function(n) {
                        return async function() {
                            var o = Array.prototype.slice.call(arguments);
                            j.zaraz.q.push({
                                m: n,
                                a: o
                            })
                        }
                    };
                    for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
                    j.zaraz.init = () => {
                        var q = k.getElementsByTagName(m)[0],
                            r = k.createElement(m),
                            s = k.getElementsByTagName("title")[0];
                        s && (j[l].t = k.getElementsByTagName("title")[0].text);
                        j[l].x = Math.random();
                        j[l].w = j.screen.width;
                        j[l].h = j.screen.height;
                        j[l].j = j.innerHeight;
                        j[l].e = j.innerWidth;
                        j[l].l = j.location.href;
                        j[l].r = k.referrer;
                        j[l].k = j.screen.colorDepth;
                        j[l].n = k.characterSet;
                        j[l].o = (new Date).getTimezoneOffset();
                        if (j.dataLayer)
                            for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
                                    ...x[1],
                                    ...y[1]
                                })), {}))) zaraz.set(w[0], w[1], {
                                scope: "page"
                            });
                        j[l].q = [];
                        for (; j.zaraz.q.length;) {
                            const z = j.zaraz.q.shift();
                            j[l].q.push(z)
                        }
                        r.defer = !0;
                        for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C
                            .startsWith("_zaraz_"))).forEach((B => {
                            try {
                                j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
                            } catch {
                                j[l]["z_" + B.slice(7)] = A.getItem(B)
                            }
                        }));
                        r.referrerPolicy = "origin";
                        r.src = "../../../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[
                            l])));
                        q.parentNode.insertBefore(r, q)
                    };
                    ["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener(
                        "DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>
  
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <header class="main-header">

            <a href="#" class="logo">
                <img src="{{ url('public/assets/backend/images/brand_logo.png') }}" class="logo" alt=""
                    width="100%">
            </a>

            <nav class="navbar navbar-static-top">

                <div class="d-flex align-items-center">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>

                    <a type="button" data-bs-toggle="modal" data-bs-target="#new_job" class="new_job_btn"
                        style="color: white;">
                        New Job
                    </a>
                </div>


                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                            <a href="#" class="profile_btn d-flex gap-2 " data-toggle="dropdown" id="profile_btn">
                                <img src="
              @if (Auth::user()->profile != '') {{ url(Auth::user()->profile) }}
                    @else
                {{ url('public/assets/backend/images/user.png') }} @endif 
                  "
                                    class="user-image" alt="User Image">
                                <span class="hidden-xs">{{ Auth::user()->name }} </span>
                            </a>
                            <ul class="dropdown-menu profile_dropdown" id="profile_dropdown">

                                <li class="user-header">
                                    <img src="
                  @if (Auth::user()->profile != '') {{ url(Auth::user()->profile) }}
                    @else
                {{ url('public/assets/backend/images/user.png') }} @endif
                  "
                                        class="img-circle" alt="User Image">
                                    <p>
                                        {{ Auth::user()->name }}
                                    </p>
                                </li>
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('admin.profile') }}"
                                            class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <button type="submit" class="btn btn-default btn-flat">Sign out</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        @php
            $unread_job_count = \App\Models\Backend\Job::where('read_status', 0)->count();
            $unread_campaign_count = \App\Models\Backend\Campaign::where('comment', NULL)->count();
        @endphp
        <aside class="main-sidebar">
            <section class="sidebar">
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="treeview active" id="jobs" onclick="toggleSubMenu('jobs')">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> 
                            <span>Jobs
                               
                            </span>
                            
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" id="submenu-jobs">
                            <li><a href="{{ route('admin.control_job') }}">Control Jobs</a></li>
                            <li><a href="{{ route('admin.wip_job') }}">WIP Jobs</a></li>
                            <!-- <li><a href="{{ route('admin.new_job') }}">New Job</a></li> -->
                            <li> <a href="" data-bs-toggle="modal" data-bs-target="#new_job">
                                    New Job
                                </a></li>
                            <li class="d-flex"><a href="{{ route('admin.all_jobs') }}">All Jobs</a>
                             <span class="btn-primary position-relative" style="top: 0px; margin-left: 20px;">
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="width: 20px; height: 20px; display: flex; justify-content: center; align-items: center; font-weight: 900;">
                                        {{$unread_job_count}}
                                    </span>
                                </span></li>
                            <!-- <li><a href="{{ route('admin.deleted_jobs') }}">Deleted Jobs</a></li> -->
                            <li><a href="{{ route('admin.canceled_job') }}">Cancelled Jobs</a></li>
                            <li><a href="{{ route('admin.transfer_job') }}">Transfer Job</a></li>
                            <li><a href="{{ route('admin.print_jobs') }}">Print Jobs</a></li>
                            <li><a href="{{ route('admin.job_summary') }}">Job Summary</a></li>
                            <li><a href="{{ route('admin.job_summary') }}">Job History</a></li>
                        </ul>
                    </li>
                    <li class="treeview" id="search" onclick="toggleSubMenu('search')">
                        <a href="#">
                            <i class="fa fa-search"></i> <span>Search</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" id="submenu-search">
                            <li><a href="{{ route('admin.search') }}">Search Job</a></li>
                            <li><a href="{{ route('admin.for_client') }}">For Client</a></li>
                           
                            <li><a href="{{ route('admin.search_by_number') }}">By Number</a></li>
                            <li><a href="{{ route('admin.search_by_date_time') }}">By Date Time</a></li>
                            <li><a href="{{ route('admin.search_by_telephonist') }}">By Telephonist</a></li>
                            <li><a href="{{ route('admin.search_by_x_reference') }}">By X-reference</a></li>
                        </ul>
                    </li>
                    <li class="treeview" id="drivers" onclick="toggleSubMenu('drivers')">
                        <a href="#">
                            <i class="fa fa-user"></i> <span>Drivers</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" id="submenu-drivers">
                            <li><a href="{{ route('admin.driver_profile') }}">Driver Overview</a></li>
                            <li><a href="{{ route('admin.add_new_driver') }}">Add New Driver</a></li>
                            <li><a href="{{ route('admin.driver_applied') }}">Driver Applied</a></li>
                            <li><a href="{{ route('admin.suspended_drivers') }}">Suspended Drivers</a></li>
                            <li><a href="{{ route('admin.expired_document') }}">Expired Documents</a></li>
                            <li><a href="{{ route('admin.verified_driver_document') }}">Verified Driver Document</a>
                            </li>
                            <li><a href="{{ route('admin.driver_leaves') }}">Driver Leaves</a></li>
                        </ul>
                    </li>
                    <li class="treeview" id="users" onclick="toggleSubMenu('users')">
                        <a href="#">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i> <span>Accounts</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" id="submenu-users">
                            <li><a href="{{ route('admin.invoice.create') }}">Generate Invoice</a></li>
                            <li><a href="{{ route('admin.for_driver') }}">Driver</a></li>
                            <!-- <li><a href="{{ route('admin.invoice.search') }}">Search Invoice</a></li>
                            <li><a href="{{ route('admin.invoice.index') }}">View Invoice</a></li> -->
                            <li><a href="{{ route('admin.invoice.setting') }}">Setting</a></li>
                        </ul>
                    </li>
                        
                    <!---- history side bar -->
                    <li class="treeview">
                        <a href="#">
                           <i class="fas fa-history"></i> <span> History</span> 
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>    
                        <ul class="treeview-menu" id="submenu-users">
                             <li><a href="{{route('admin.history_data.job_history')}}"> Job History</a></li> 
                             <li><a href="{{route('admin.history_data.client_history')}}"> Client History</a></li> 
                        </ul>
                    </li>
                    <!---- history side bar end -->
                    
                    <li>
                        <a href="{{ route('admin.car_type') }}">
                            <i class="fa fa-car"></i> <span>Car Type</span>
                        </a>
                    </li>

                    <li class="treeview" id="users" onclick="toggleSubMenu('users')">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>Users</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" id="submenu-users">
                            <li><a href="{{ route('admin.accounts') }}">Accounts</a></li>
                            <li><a href="{{ route('admin.users') }}">App Users</a></li>
                            <li><a href="{{route('admin.operators.index')}}">Operators</a></li>
                            <!-- <li><a href="{{ route('admin.admins') }}">Admins</a></li>  -->
                        </ul>
                    </li>

                    <li class="treeview" id="leads" onclick="toggleSubMenu('leads')">
                        <a href="#">
                            <i class="fa fa-users"></i> <span>Leads</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu" id="submenu-users">
                            <li><a href="{{route("backend.leads.website_leads")}}">Web</a></li> 
                        </ul>
                    </li>
                    <li class="treeview" id="leads" onclick="toggleSubMenu('leads')">
                        <a href="#">
                            <i class="fa fa-users"></i>
                            <span>Campaign
                                 <span class="btn-primary position-relative" style="top: 6px; margin-left: 20px;">
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="width: 20px; height: 20px; display: flex; justify-content: center; align-items: center; font-weight: 900;">
                                {{$unread_campaign_count}}
                                </span>
                                </span>
                            </span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>    
                        <ul class="treeview-menu" id="submenu-users">
                             <li><a href="{{route('backend.leads.landing_page_one')}}">Landing Page 1</a></li> 
                        </ul>
                    </li>
    
                    
                    


                    <li class="treeview" id="analytice-job">
                        <a href=""> <i class="fa fa-car"></i> <span>Additional</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('admin.user_analytic') }}">
                                    Job Details
                                </a></li>
                            <li>
                                <a href="{{ route('admin.booking_slot') }}">
                                    Booking Slots
                                </a>
                            </li>



                        </ul>

                    </li>


                    <!-- <li>
            <a href="{{ route('admin.booking_slot') }}">
              <i class="fa fa-car"></i> <span>Booking Slots</span>
            </a>
          </li> -->
                </ul>
            </section>

        </aside>
