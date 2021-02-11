@extends('layouts.home')
@section('content')

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <form action="#" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <h5 class="text-left mb-4"> <i class="fas fa-spell-check"></i> Datos generados automaticamente</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="visitas">Visitas</label>
                                            <input type="number" name="visitas"
                                                class="form-control" readonly value="{{ $producto->visitas}}">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ventas">Ventas</label>
                                            <input type="number" name="ventas"
                                                class="form-control"
                                                readonly value="{{ $producto->ventas}}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
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
                                                placeholder="Nombre de producto" value="{{  $producto->nombre}}">
                                            @error('nombre')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="slug">Slug</label>
                                            <input type="text" name="slug"
                                                class="form-control @error('slug') is-invalid @enderror"
                                                placeholder="Nombre de slug" value="{{  $producto->slug }}">
                                            @error('slug')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mt-4 mb-4">
                                            <label for="category_id">Categoria</label>
                                            <select name="category_id"
                                                class="form-control select2 @error('category_id') is-invalid @enderror" >
                                                @foreach ($categorias as $categoria)
                                                    @if ($categoria->id == $producto    ->category_id)
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
                                                value="{{ $producto->cantidad }}" placeholder="Cantidad">
                                            @error('cantidad')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Seccion precios --}}
                            <div class="card card-info" id="app">
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
                                                <input type="number" name="precio_anterior" min="0" step=".01" class="form-control"
                                                    placeholder="Precio anterior" v-model="precio_anterior" value="{{ $producto->precio_anterior }}">
                                            </div>
                        
                                        </div>
                                        <div class="col-md-6">
                                            <label for="precio_actual">Precio actual</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">$</span>
                                                </div>
                                                <input type="number" name="precio_actual" min="0" step=".01" class="form-control"
                                                    placeholder="Precio actual" v-model="precio_actual" value="{{ $producto->precio_actual }}">
                                            </div>
                        
                                            <br>
                                            <span id="descuento">
                                                @{{ generardescuento }}
                                            </span>
                                        </div>
                                        <div class="col-md-12 mt-6">
                                            <label for="category_id">Porcentaje de descuento</label>
                                            <div class="input-group">
                                                <input class="form-control" type="number" id="porcentaje_descuento" name="porcentaje_descuento"
                                                    step="any" min="1" max="100" value="0" v-model="porcentaje_descuento">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                            <div class="progress mt-3 mb-4">
                                                <div class="progress-bar" role="progressbar" v-bind:style="{width:porcentaje_descuento+'%'}"
                                                    aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">@{{ porcentaje_descuento }}%</div>
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
                                                placeholder="Estatus" value="{{ $producto->status }}">
                                        </div>
                                        <div class="col-md-6 mb-1">
                                            <div class="form-group clearfix">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox"
                                                        class="custom-control-input @error('activo') is-invalid @enderror"
                                                        id="activo" name="activo"
                                                        @if ($producto->activo== 'Si')
                                                        checked
                                                        @endif
                                                        >
                                                    <label class="custom-control-label" for="activo">Activo</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input" id="sliderprincipal"
                                                        name="sliderprincipal"
                                                        @if ($producto->sliderprincipal == 'Si')
                                                        checked
                                                        @endif
                                                        
                                                        >
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
                                                rows="2">{{  $producto->descripcion_corta }}</textarea>
                                            @error('descripcion_corta')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <label for="descripcion_larga">Descripción larga</label>
                                            <textarea name="descripcion_larga"
                                                class="form-control @error('descripcion_larga') is-invalid @enderror"
                                                rows="2">{{ $producto->descripcion_larga}}</textarea>
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
                                                rows="3">{{ $producto->especificaciones }}</textarea>
                                            @error('especificaciones')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mt-1">
                                            <label for="datos_de_interes">Datos de interes</label>
                                            <textarea name="datos_de_interes"
                                                class="form-control @error('datos_de_interes') is-invalid @enderror"
                                                rows="3">{{ $producto->datos_de_interes }}</textarea>
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
                                                <label for="imagenes">Subir imagen</label>
                                                <input type="file" class="form-control-sm" name="imagenes[]" id="imagenes[]"
                                                multiple accept="image/*">
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
