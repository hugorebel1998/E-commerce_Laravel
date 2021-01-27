@extends('layouts.home')
@section('content')

    <div class="container">
        <div class="row justify-content-center" id="app">
            <div class="col-md-10">
                <div class="card card-info">
                    <div class="card-header">
                        <div class="card-tittle">Crear categoria</div>
                    </div>
                    <div class="card-body">
                        <form action="#" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nombre">Nombre de categoria</label>
                                    <input type="text" name="nombre"
                                        class="form-control @error('nombre') is-invalid @enderror" id="nombre"
                                        placeholder="Nombre de categoria">

                                    @error('nombre')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-md-6">
                                    <label for="slug">Slug</label>
                                    <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror"
                                        id="slug" placeholder="Nombre de categoria">

                                    @error('slug')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror

                                </div>
                                <div class="col-md-12 mt-4">
                                    <label for="descripcion">Decripción</label>
                                    <textarea name="descripcion" id="descripcion"
                                        class="form-control @error('descripcion') is-invalid @enderror" rows="3"></textarea>

                                    @error('descripcion')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-sm btn-primary"> <i class="fas fa-save"></i>
                                    Guardar</button>
                            </div>
                        </form> <br><br>
                        {{ nombre }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var app = new Vue({
            el: '#app',
            data: {
                nombre: 'Hugo Guillermo'
            }
        });
    </script>
@endsection
