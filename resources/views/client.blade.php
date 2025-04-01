<!DOCTYPE html>
<html lang="en">

<style>
    nav{
        display: flex;
        width: 100%;
        height: 103px;
        padding: 0px 10px;
        justify-content: space-between;
        align-items: center;
        flex-shrink: 0;
        }

     .letras{
        color: #000;
        font-family: Inter;
        font-size: 16px;
        font-style: normal;
        font-weight: 700;
        line-height: normal;
     }   

</style>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{env('APP_NAME')}}</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{asset('libs/sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <!-- Agregar DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Logo o nombre de la aplicación -->
        <a class="navbar-brand ms-5" href="{{ url('/') }}">
        <img src="{{ asset('storage/img/recurso11.png') }}" alt="Recurso 11">
        </a>
        <!-- Botón para dispositivos móviles -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Contenido del navbar -->
        <div class="collapse navbar-collapse ms-5"  id="navbarNav">
    <ul class="navbar-nav mx-auto"> 
        <!-- Elementos centrados -->
        <li class="nav-item dropdown me-4 letras"> <a class="navbar-brand " href="">Inicio</a></li>
        <li class="nav-item dropdown me-4 letras"> <a class="navbar-brand " href="">Carrito</a></li>
        <li class="nav-item dropdown me-4 letras"> <a class="navbar-brand " href="">Mi Cuenta</a></li>
        <li class="nav-item dropdown me-4 letras"> <a class="navbar-brand " href="">Quienes somos</a></li>
        <li class="nav-item dropdown me-4 letras"> <a class="navbar-brand " href="">Preguntas Frecuentes</a></li>
        <li class="nav-item dropdown me-4 letras"> <a class="navbar-brand " href="">Contactos</a></li>
    </ul>

    <ul class="navbar-nav ms-auto"> 
        @auth
        <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('perfil') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Salir') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        
        @else
            <!-- Si el usuario no está autenticado -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Iniciar sesión</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Registrarse</a>
            </li>
        @endauth
    </ul>
</div>
    </div>
</nav>
                <!-- End of Topbar -->

            @include('layouts.partials.content')

            </div>
            <!-- End of Main Content -->

            @include('layouts.partials.footer')

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('libs/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src=" {{asset('libs/sbadmin/js/sb-admin-2.min.js')}} "></script>

    <!-- Page level plugins -->
    <script src="{{asset('libs/chart.js/Chart.min.js')}}"></script>

</body>

</html>