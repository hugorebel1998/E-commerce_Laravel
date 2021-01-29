@extends('layouts.home')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="{{ route('producto.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            {{-- Seccion datos de producto --}}
                            <div class="card card-navy">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-left mb-4"> <i class="fas fa-spell-check"></i> Datos del producto</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="nombre">Nombre de producto</label>
                                            <input type="text" name="nombre"
                                                class="form-control @error('nombre') is-invalid @enderror"
                                                placeholder="Nombre de producto">
                                            @error('nombre')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="slug">Slug</label>
                                            <input type="text" name="slug"
                                                class="form-control @error('slug') is-invalid @enderror"
                                                placeholder="Nombre de slug">
                                            @error('slug')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mt-4 mb-4">
                                            <label for="category_id">Categoria</label>
                                            <select name="category_id"
                                                class="form-control @error('category_id') is-invalid @enderror">
                                                @foreach ($categorias as $categoria)
                                                    @if ($loop->first)
                                                        <option value="{{ $categoria->id }}" selected="selected">
                                                            {{ $categoria->nombre }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mt-4 mb-4">
                                            <label for="cantidad">Cantidad</label>
                                            <input type="number" name="cantidad"
                                                class="form-control @error('cantidad') is-invalid @enderror"
                                                value="{{ old('cantidad') }}" placeholder="Cantidad">
                                            @error('cantidad')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Seccion precios --}}
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-left mb-4"> <i class="far fa-credit-card"></i> Sección de precios</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="precio_anterior">Precio anterior</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="number" name="precio_anterior" min="0" step=".01"
                                                    class="form-control @error('precio_anterior') is-invalid @enderror"
                                                    placeholder="Precio anterior">
                                            </div>
                                            @error('precio_anterior')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="precio_actual">Precio actual</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="number" name="precio_actual" min="0" step=".01"
                                                    class="form-control @error('precio_actual') is-invalid @enderror"
                                                    placeholder="Precio actual">
                                            </div>
                                            @error('precio_actual')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            <br>
                                            <span id="descuento"></span>
                                        </div>
                                        <div class="col-md-12 mt-6">
                                            <label for="category_id">Porcentaje de descuento</label>
                                            <div class="input-group">
                                                <input class="form-control" type="number" id="porcentajededescuento"
                                                    name="porcentajededescuento" step="any" min="0" min="100" value="0">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">%</span>
                                                </div>

                                            </div>
                                            <div class="progress mt-3 mb-4">
                                                <div class="progress-bar" role="progressbar" style="width: 0%;"
                                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Seccion administrador --}}
                            <div class="card card-navy">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-left mb-4"> <i class="fas fa-spell-check"></i> Administrador</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="status">Estatus</label>
                                            <input type="text" name="status"
                                                class="form-control @error('status') is-invalid @enderror"
                                                placeholder="Estatus">
                                            @error('status')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <div class="form-group clearfix">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox"
                                                        class="custom-control-input @error('activo') is-invalid @enderror"
                                                        id="activo" name="activo">
                                                    <label class="custom-control-label" for="activo">Activo</label>
                                                </div>
                                                @error('activo')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror

                                            </div>

                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="sliderprincipal"
                                                        name="sliderprincipal">
                                                    <label class="custom-control-label" for="sliderprincipal">Aparece en el
                                                        Slider principal</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            {{-- Seccion descripcion de producto
                            --}}
                            <div class="card card-navy">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-left mb-4"><i class="fab fa-accusoft"></i> Descripción de producto</h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="descripcion_corta">Descripción corta</label>
                                            <textarea name="descripcion_corta"
                                                class="form-control @error('descripcion_corta') is-invalid @enderror"
                                                rows="2"></textarea>
                                            @error('descripcion_corta')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label for="descripcion_larga">Descripción larga</label>
                                            <textarea name="descripcion_larga"
                                                class="form-control @error('descripcion_larga') is-invalid @enderror"
                                                rows="2"></textarea>
                                            @error('descripcion_larga')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- Sección especificaciónes de producto
                            --}}
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-left "><i class="fab fa-accusoft"></i> Expecificaciónes de producto
                                    </h5>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="especificaciones">Especificaciónes</label>
                                            <textarea name="especificaciones"
                                                class="form-control @error('especificaciones') is-invalid @enderror"
                                                rows="3"></textarea>
                                            @error('especificaciones')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mt-1">
                                            <label for="datos_de_interes">Datos de interes</label>
                                            <textarea name="datos_de_interes"
                                                class="form-control @error('datos_de_interes') is-invalid @enderror"
                                                rows="3"></textarea>
                                            @error('datos_de_interes')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- Seccion imagen --}}
                            <div class="card card-navy">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-left mb-4"> <i class="far fa-file-image"></i> Subir imagen</h5>
                                    <div class="row">
                                        <div class="col-md-12 mb-5">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="archivosimagenes[]"
                                                    multiple accept="image/*">
                                                <label class="custom-file-label" for="customFile">Subir imagen</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-left">
                        <button type="submit" class="btn btn-success"> <i class="fas fa-save"></i> Guardar producto</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
