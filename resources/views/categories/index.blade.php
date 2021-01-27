@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <h1 class="text-center mb-4"> Categorias</h1>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card transparente">
                    <div class="card-header">
                        <p class="lead text-primary"> Categorias registradas</p>
                        <div class="row justify-content-end ">
                            <a href="{{ route('categoria.create')}}" class="btn btn-sm bg-primary text-white mr-3">
                                <i class="fas fa-plus complemento-plus text-white"></i> Agregar empresas</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                            <thead>
                                <tr>
                                    <!-- <th scope="col">ID</th> -->
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Descripción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoria as $category)


                                    <tr>
                                        <td>{{ $category->nombre }}</td>
                                        <td>{{ $category->slug}}</td>
                                        <td>{{ $category->descripcion}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('components.buscador')
@endsection
