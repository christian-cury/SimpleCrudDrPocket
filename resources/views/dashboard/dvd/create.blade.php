@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Criar DVD</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <form action="{{ route('dvd.store') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Título DVD</label>
                                        <input type="text" class="form-control" required name="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Ano</label>
                                        <input type="number" class="form-control" required min="1000" max="9999" value="2019" name="year">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Produtora</label>
                                        <input type="text" class="form-control" required name="producer">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Sinópse</label>
                                        <textarea class="form-control" required rows="5" name="synopsis"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary" style="width: 100%;">Adicionar</button>
                                </form>
                                <hr>
                                <a href="{{ route('home') }}" style="width: 100%;">
                                    <button class="btn btn-warning" style="width: 100%;">Voltar</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection