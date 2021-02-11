@extends('layouts.product')
@section('content')

    <div class="container-fluid">
        <h1 class="text-center mb-4"><i class="far fa-list-alt"></i> Lista de productos</h1>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card transparente">
                    <div class="card-header">
                        <p class="lead text-primary"> Productos registrados</p>
                        <div class="row justify-content-end ">
                            <a href="{{ route('producto.create') }}" class="btn btn-sm bg-primary text-white mr-3">
                                <i class="fas fa-plus complemento-plus text-white"></i> Agregar producto</a>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="order-table table table-hover" cellspacing="0" width="100%" id="example2">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Imagen</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Activo</th>
                                    <th scope="col">Slider principal</th>
                                    <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($producto as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            @if ($product->images->count() <=0)

                                                <img style="height:100px; width:100px;" src="{{ url('/img/1612845227_television.jpg')}}"
                                                    class="round-circle">
                                            @else
                                                <img src="{{ $product->images->random()->url }}" style="height:100px; width:100px;" class="round-circle">
                                            @endif
                                        </td>
                                        <td>{{ $product->nombre }}</td>
                                        <td>{{ $product->status }}</td>
                                        <td>{{ $product->activo }}</td>
                                        <td>{{ $product->sliderprincipal }}</td>

                                        <td>
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-info dropdown-toggle text-white" href="#"
                                                    role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cogs"></i>
                                                    Aciones
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                    <a class="dropdown-item text-success" href="#"><i
                                                            class="far fa-eye"></i> Ver producto</a>
                                                    <a class="dropdown-item text-primary" href="{{ route('producto.edit', $product->id) }}"><i
                                                            class="far fa-edit"></i> Editar producto</a>
                                                    <a class="dropdown-item text-danger"
                                                        onclick="return confirm('¿ Estas seguro de eliminar esta categoria ?')"
                                                        href="#"><i class="fas fa-trash-alt"></i> Eliminar producto</a>
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
