<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Bare - Start Bootstrap Template</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">Produtora</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('home') }}">Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Registro</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4>DVD's</h4>
                    <hr>
                    @if(session('success'))
                        <div class="alert alert-info">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(auth()->check())
                        <div class="row">
                            <div class="col-12">
                                <div class="float-right">
                                    <a href="{{ route('dvd.create') }}">
                                        <button class="btn btn-info">Adicionar DVD</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Título</th>
                                    <th scope="col">Ano</th>
                                    <th scope="col">Produtora</th>
                                    <th scope="col">Legendas disponíveis</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($dvds as $dvd)
                                    <tr>
                                        <th scope="row"> {{ $dvd->title }} </th>
                                        <td> {{ $dvd->year }} </td>
                                        <td> {{ $dvd->producer->name }} </td>
                                        <td>
                                            <a href="#!" legend-data="{{ $dvd->id }}">
                                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript -->
        <script
                src="//code.jquery.com/jquery-3.3.1.min.js"
                integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
                crossorigin="anonymous"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.min.js"></script>
        <script>
            $(document).ready(function() {
                $('[legend-data]').click(function() {
                    let id = $(this).attr('legend-data');
                    const url = '/api/legend/' + id;

                    $.ajax({
                        url: url,
                        type: 'GET',
                        cache: false,
                        dataType: 'JSON',
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            Swal.fire({
                                title: 'Obtendo informação, aguarde...',
                                html: '<i class="fa fa-cog fa-spin fa-5x fa-fw"></i>',
                                showCloseButton: false,
                                showCancelButton: false,
                                showConfirmButton: false,
                                focusConfirm: false,
                                allowOutsideClick: false,
                            });
                        }
                    }).done(function(data) {
                        if(data.code == 200) {
                            let legends = data.data;
                            var legendsString = "";
                            $.each(legends, function(index, value) {
                                legendsString += value + '<br>';
                            });
                            Swal.fire({
                                title: '<strong>Legendas disponíveis</strong>',
                                type: 'info',
                                html: legendsString,
                                showCloseButton: true,
                                showCancelButton: true,
                                focusConfirm: false,
                                confirmButtonText:
                                    '<i class="fa fa-thumbs-up"></i> Great!',
                                confirmButtonAriaLabel: 'Ok',
                            })
                        } else {
                            console.log('ERROR');
                            console.log(res);
                            console.log('ERROR');
                            Swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Ocorreu um erro inesperado. Contate um adminsitrador.',
                            });
                        }
                    }).fail(function(err) {
                        console.log('ERROR');
                        console.log(err);
                        console.log('ERROR');
                        Swal.fire({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Ocorreu um erro inesperado. Contate um adminsitrador.',
                        });
                    })


                    return false;
                });
            });
        </script>
    </body>

</html>
