@extends('layouts.category')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <hr>
                        <div class="row ">
                            <div class="col-md-6">
                                <p><b>Nombre de categoria:</b> {{ $categoria->nombre }}</p>
                            </div>

                            <div class="col-md-6">
                                <p><b>Nombre de slug:</b> {{ $categoria->slug }}</p>
                            </div>
                            <div class="col-md-12 mt-4">
                                <b>Descrición de la caegoria</b>
                                <p>{{ $categoria->descripcion }}</p>

                            </div>
                        </div>
                        <div class="text-left">
                            <a href="{{ route('categoria.index')}}" class="btn btn-sm btn-success"><i class="fas fa-arrow-left"></i></a>
                        </div>
                        <div class="text-right">
                            <a href="{{ route('categoria.edit', $categoria->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
