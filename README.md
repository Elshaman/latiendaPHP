<table>
    <tr>
        <td>
            <img  src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400">
        </td>
        <td>
        <img  src="https://upload.wikimedia.org/wikipedia/commons/8/83/Sena_Colombia_logo.svg"  ></td>
    </tr>
</table>

# LaTiendaPHP - Formulario de Ingreso de producto

El formulario de ingreso de producto se base en [materialize forms](https://materializecss.com/text-inputs.html). Tendrá un menú que estará en el layout del cual heredarán todas las vistas del proyecto, y la vista particular del formulario

---

## Layout Principal

El layout principal está en la carpeta **resources/views/layout** y s¿lo llamaremos **principal.blade.php** este es el código: 

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>Document</title>
    </head>

    <body>
        <nav>
            <div class="nav-wrapper">
                <a href="#" class="brand-logo">Logo</a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li><a href="sass.html">Sass</a></li>
                    <li><a href="badges.html">Components</a></li>
                    <li><a href="collapsible.html">JavaScript</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
        @yield('contenido')
        </div>
        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('select');
                var instances = M.FormSelect.init(elems, {});
            });
        </script>
    </body>

    </html>

observe que contiene 
las librerías 
de materialize y google 
fonts icons, junto con codigo 
javascript para inicializar 
los **select** en el formulario de 
Registro de producto

---

## Formulario de Registro de Producto:

Haremos el formulario de registro de producto en el archivo **resources/views/productos/create.blade.php:**


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

    
