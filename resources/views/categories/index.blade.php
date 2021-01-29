@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <h1 class="text-center mb-4"><i class="far fa-list-alt"></i> Lista de categorias</h1>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card transparente">
                    <div class="card-header">
                        <p class="lead text-primary"> Categorias registradas</p>
                        <div class="row justify-content-end ">
                            <a href="{{ route('categoria.create')}}" class="btn btn-sm bg-primary text-white mr-3">
                                <i class="fas fa-plus complemento-plus text-white"></i> Agregar categoria</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Fecha registro</th>
                                    <th scope="col">Fecha actualización</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoria as $category)
                                    <tr>
                                        <td>{{ $category->nombre }}</td>
                                        <td>{{ $category->slug}}</td>
                                        <td>{{ $category->descripcion}}</td>
                                        <td>{{ $category->created_at}}</td>
                                        <td>{{ $category->updated_at}}</td>

                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-info dropdown-toggle text-white" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cogs"></i>
                                                    Aciones
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                  <a class="dropdown-item text-success" href="{{ route('categoria.show', $category->id)}}"><i class="far fa-eye"></i> Ver categoria</a>
                                                  <a class="dropdown-item text-primary" href="{{ route('categoria.edit', $category->id)}}"><i class="far fa-edit"></i > Editar categoria</a>
                                                  <a class="dropdown-item text-danger" onclick="return confirm('¿ Estas seguro de eliminar esta categoria ?')" href="{{ route('categoria.delete', $category->id)}}"><i class="fas fa-trash-alt"></i> Eliminar categoria</a>
                                                </div>
                                              </div>
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
    @include('components.buscador')
@endsection

