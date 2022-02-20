@extends('estatico')

@section('contenido')
<h1 class="text-center mt-5">Detalles chollo</h1>
@error('imagen')
    <p class="text-danger">{{$message}}</p>
@enderror
<form action="{{ route('update',$chollo->id) }}" class="w-50 m-auto" method="POST" enctype="multipart/form-data">
    @method('PUT') {{-- Necesitamos cambiar al método PUT para editar --}}
    @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}
    @if(session('mensaje'))
    <div class="mensaje-nota-creada">
        <h5 class="text-primary text-center mb-5">{{ session('mensaje') }}</h5>
    </div>
@endif
    <div class="form-row">
    @csrf {{-- Cláusula para obtener un token de formulario al enviarlo --}}
        <div class="form-group col-md-6">
            <input type="text" name="titulo" value="{{$chollo->titulo}}" class="form-control" placeholder="Titulo del chollo" autofocus>
                <select name="categoria" value="{{$chollo->categoria}}" class="form-control">
                    <option value="electronica">Electrónica</option>
                    <option value="moda">Moda</option>
                    <option value="hogar">Hogar</option>
                    <option value="cuidadoPersonal">Cuidado Personal</option>
                    <option value="alimentacion">Alimentación</option>
                    <option value="deporte">Deportes</option>
                </select>
        </div>
        <div class="form-group col-md-6">
            <input type="text" name="url" value="{{$chollo->url}}" id="url" placeholder="Url del chollo" class="form-control">
        </div>
        <div class="form-group col-md-6">
            <input type="number" name="precio" value="{{$chollo->precio}}" id="precio" step="0.01" class="form-control" placeholder="Precio anterior">
            <input type="number" name="precio_descuento" value="{{$chollo->precio_descuento}}" id="precio_descuento" step="0.01"class="form-control" placeholder="Precio rebajado" >
        </div>
        
        
        <div class="form-group col-md-6">
            {{-- <form action="{{ route('guardar') }}" method="POST" enctype="multipart/form-data"> --}}
                <input type="file" name="imagen" id="imagen" placeholder="Imagen del chollo" class="form-control" accept=".jpg">
            {{-- </form> --}}
            <select name="disponible" value="{{$chollo->disponible}}" id="disponible" class=" form-control">
                <option value="1">Disponible</option>
                <option value="0">No Disponible</option>
            </select>
        </div>

        <textarea name="descripcion" id="descripcion" cols="30" rows="10" placeholder="Descripción del chollo" class="form-control mb-2">{{$chollo->descripcion}}</textarea>
    </div>
            <button class="btn btn-primary btn-block btn-enviar w-50 ml-auto mr-auto mb-5" type="submit">
            Actualizar chollo
            </button>
    </form>
@endsection