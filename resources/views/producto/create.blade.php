@extends('layouts.principal')

@section('contenido')
    <div class="row">
        <h2 class="blue-text text-lighten-1"> Nuevo Producto </h2>
    </div>
    <div class="row">
        <form class="col s12" method="POST" action="{{ route('productos.store') }}">
            @csrf
            <div class="row">
                <div class="input-field col s8">
                    <i class="material-icons prefix">devices_other</i>
                    <input id="nombre" type="text" class="validate">
                    <label for="nombre">Nombre</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8">
                    <i class="material-icons prefix">dvr</i>
                    <textarea id="desc" class="materialize-textarea"></textarea>
                    <label for="desc">Descripción</label>
                </div>
                <div class="row">
                    <div class="input-field col s8">
                        <i class="material-icons prefix">local_atm</i>
                        <input id="precio" type="text" class="validate">
                        <label for="precio">Precio</label>
                    </div>
                </div>
                <div class="row">
                    <div class="file-field input-field col s8">
                        <div class="btn">
                            <span>Imagen de producto...</span>
                            <input type="file">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8">
                        <select>
                            <option value="" disabled selected>Escoje marca</option>
                            @foreach ($marcas as $marca)
                                <option value="{{ $marca->id }}">{{ $marca->nombre }}</option>
                            @endforeach
                        </select>
                        <label>Selección de marca</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s8">
                        <select>
                            <option value="" disabled selected>Escoje categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        <label>Selección de categoría</label>
                    </div>
                </div>
                <div class="row">
                    <div class="s8">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                            <i class="material-icons right">send</i>
                        </button>

                    </div>

                </div>
        </form>
    </div>
@endsection
