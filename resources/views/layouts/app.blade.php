<!DOCTYPE html>
<html>
    <head>
        @include('include/head')
    </head>
    <body>
        @include('include/header')
        @include('include/sidebar')
        <div class="main-container">
            <div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
                <div class="min-height-200px">
                    <div class="page-header">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <div class="title">
                                    <h4>@yield('titulo-pagina')</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">@yield('titulo-pagina')</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-6 col-sm-12 text-right">
                                <div class="dropdown">
                                    <a class="btn btn-primary dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                        January 2018
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">Export List</a>
                                        <a class="dropdown-item" href="#">Policies</a>
                                        <a class="dropdown-item" href="#">View Assets</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
                        @yield('conteudo-pagina')
                    </div>
                </div>
                @include('include/footer')
            </div>
        </div>
        @include('include/script')
    </body>
</html>