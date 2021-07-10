<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Sohel Telecom</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/monster-admin-lite/" />
    <link href="{{asset('../backendasset/assets/plugins/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link href="{{asset('../backendasset/css/style.min.css')}}" rel="stylesheet">
   
</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6" >
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand justify-content-center" href="{{url('/')}}">
                       
                        <b class="logo-icon">
                        
                           

                        </b>
                        <span class="logo-text">
                            <!-- dark Logo text -->
                            <h3>Sohel Telecom</h3>

                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5" style="background-color:white;" >
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-auto mt-md-0 ">
                        <li class="nav-item hidden-sm-down">
                            <form class="app-search pl-3">
                                <input type="text" class="form-control" placeholder="Search for..."> <a
                                    class="srh-btn"><i class="ti-search"></i></a>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav">
                       <li class="nav-item dropdown">
                           <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color: black">
                               {{ Auth::user()->name }}
                           </a>

                           <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                   {{ __('Logout') }}
                               </a>

                               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                   @csrf
                               </form>
                           </div>
                       </li>
                        
                    </ul>
                </div>
            </nav>
        </header>
        
        @include('layout.sidebar')
       
        <div class="page-wrapper" style="min-height: 530px;">
           @yield('content')  
        </div>
           
            <footer class="footer text-center" style="font-size: 14px;" >
                © System developed by <a href="#">Hussain & Rahat</a><br>
                <span>Cell: 01719508793</span>
            </footer>
          @yield('scripts') 
        </div>
        
    </div>
   
    <script src="{{asset('../backendasset/assets/plugins/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{asset('../backendasset/assets/plugins/popper.js/dist/umd/popper.min.js')}}"></script>
    <script src="{{asset('../backendasset/assets/plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('../backendasset/js/app-style-switcher.js')}}"></script>
   
    <script src="{{asset('../backendasset/js/sidebarmenu.js')}}"></script>
    <!--Custom JavaScript -->
    <script src="{{asset('../backendasset/js/custom.js')}}"></script>
    <script src="{{asset('../backendasset/js/report.js')}}"></script>
    <!--This page JavaScript -->
    <!--flot chart-->
    <script src="{{asset('../backendasset/assets/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('../backendasset/assets/plugins/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('../backendasset/js/pages/dashboards/dashboard1.js')}}"></script>
</body>

</html>