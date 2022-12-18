<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tableau de bord /Alternative Naissance</title>
    <meta content="" name="description">
    <meta content="" name="keywords">


    <!-- Favicons -->

    <link href="{{ asset('admin_assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('admin_assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->

    <link href="{{ asset('admin_assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('admin_assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->

    <link href="{{ asset('admin_assets/css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>

    <!-- =======================================================
    * Template Name: NiceAdmin - v2.1.0
    * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <a href="/" class="logo d-flex align-items-center">

            <img src="{{ asset('admin_assets/img/bboylagaet/lagaet_logo.png') }}" alt="">
            <span class="d-none d-lg-block">Admin</span>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">


            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                        <img src="admin_assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"> {{ Auth::user()->name }}</span>
                    </a><!-- End Profile Iamge Icon -->



                    <ul class="dropdown-menu" role="menu">

                        <li class="dropdown-header">
                            <h6>{{ Auth::user()->name }}</h6>
                            <span>{{ Auth::user()->email }}</span>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">


            <li><a class="waves-effect waves-dark" href="" aria-expanded="false"><i class="fa fa-list"></i><span class="hide-menu"></span></a> </li>

            <li class="nav-item">
                <a class="nav-link " href="/admin">
                    <i class="bi bi-grid"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>
        <!-- End Dashboard Nav -->


            <li class="nav-item">
                <a class="nav-link " href="{{route('membre')}}">
                    <i class="bi bi-grid"></i>
                    <span>Membre</span>
                </a>
            </li>
        <!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link " href="{{route('accompagnante')}}">
                <i class="bi bi-grid"></i>
                <span>Accompagnantes</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link " href="{{route('accompagnement')}}">
                <i class="bi bi-grid"></i>
                <span>Accompagnements</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link " href="{{route('relevaille')}}">
                <i class="bi bi-grid"></i>
                <span>Relevailles</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link " href="{{route('rencontre')}}">
                <i class="bi bi-grid"></i>
                <span>Rencontres</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link " href="{{route('type_formation')}}">
                <i class="bi bi-grid"></i>
                <span>Type Formation</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link " href="{{route('formation')}}">
                <i class="bi bi-grid"></i>
                <span>Formation</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->


        <li class="nav-item">
            <a class="nav-link " href="{{route('requetes')}}">
                <i class="bi bi-grid"></i>
                <span>Requetes</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link " href="{{route('requetes.favori')}}">
                <i class="bi bi-grid"></i>
                <span>Requetes favori</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->



        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Base de donnée</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li class="nav-item">
                    <a class="nav-link " href="{{route('statut_citoyen')}}">
                        <i class="bi bi-grid"></i>
                        <span>Statut Citoyen</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link " href="{{route('statut_membre')}}">
                        <i class="bi bi-grid"></i>
                        <span>Statut Membre</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link " href="{{route('statut_accompagnante')}}">
                        <i class="bi bi-grid"></i>
                        <span>Statut des Accompagnantes</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link " href="{{route('clsc')}}">
                        <i class="bi bi-grid"></i>
                        <span>Clsc</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link " href="{{route('source_revenu')}}">
                        <i class="bi bi-grid"></i>
                        <span>Source de Revenus</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link " href="{{route('cercle_familial')}}">
                        <i class="bi bi-grid"></i>
                        <span>Cercle Familial</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link " href="{{route('references_donnees')}}">
                        <i class="bi bi-grid"></i>
                        <span>Références Données</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link " href="{{route('attentes')}}">
                        <i class="bi bi-grid"></i>
                        <span>Attentes</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link " href="{{route('preoccupations_accouchement')}}">
                        <i class="bi bi-grid"></i>
                        <span>Préoccupations accouchement</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link " href="{{route('preoccupations_bebe')}}">
                        <i class="bi bi-grid"></i>
                        <span>Préoccupations bébé</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link " href="{{route('preoccupations_grossesse')}}">
                        <i class="bi bi-grid"></i>
                        <span>Préoccupations grossesse</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link " href="{{route('accouchement_personnes_prevues')}}">
                        <i class="bi bi-grid"></i>
                        <span>Personnes Prévues à l'accouchement</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link " href="{{route('source_diffusion')}}">
                        <i class="bi bi-grid"></i>
                        <span>Source Diffusion</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link " href="{{route('soignants')}}">
                        <i class="bi bi-grid"></i>
                        <span>Soignants</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link " href="{{route('lieux_formation')}}">
                        <i class="bi bi-grid"></i>
                        <span>Lieux Formation</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
                <li class="nav-item">
                    <a class="nav-link " href="{{route('prerequis')}}">
                        <i class="bi bi-grid"></i>
                        <span>Prerequis</span>
                    </a>
                </li>
                <!-- End Dashboard Nav -->
            </ul>
        </li><!-- End Components Nav -->


        @endif



    </ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tableau de bord</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item active">Tableau de bord</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->


    @yield('content')

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
    <div class="copyright">
        &copy; Copyright <strong><span>Alternative Naissance</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        Designed by <a href="https://catalystdv.com/">Catalysdv</a>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/php-email-form/validate.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/chart.js/chart.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="https://cdn.tiny.cloud/1/w2k0dw0464qj8wniq2e3ujvo25t094fpaxl70ep2yzsxhm0y/tinymce/6/plugins.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea',



    });
</script>

<!-- Template Main JS File
<script src="admin_assets/js/main.js') }}"></script>-->
@yield('scripts')

</body>

</html>
