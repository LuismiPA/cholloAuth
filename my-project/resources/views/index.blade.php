@extends('estatico')
@section('title')
{{$title}}
@endsection
@section('contenido')
<h1 class="text-center mb-5 text-primary">{{$titulo}}</h1>
@if(session('mensaje'))
    <div class="mensaje-nota-creada">
        <h5 class="text-primary text-center mb-5">{{ session('mensaje') }}</h5>
    </div>
@endif
<div class="row row-cols-1 row-cols-md-3 container ml-auto mr-auto ">
    @foreach ($chollos as $chollo)
                <div class="col mb-4 tarjeta mb-4 ">
                  <a class="enlaceIndex" href={{route("detalles",$chollo->id)}}>
                      <div class="card m-auto border-info">
                        <div class="imagenChollo" data-imagen={{asset('assets/images/'.$chollo->id.'-chollo-severo.jpg')}}></div>
                        {{-- <img src={{asset('assets/images/'.$chollo->id.'-chollo-severo.jpg')}} class="card-img-top" alt="imagen producto" width="100px" height="auto"> --}}
                        <div class="card-body">
                          <h5 class="card-header">{{$chollo->titulo}}</h5>
                          <p class="card-text precioAntes d-inline">{{$chollo->precio}} </p>
                          <p class="card-text precioOferta d-inline ml-2">{{$chollo->precio_descuento}}</p>
                          <p class="descripcionTarjeta card-text ">{{$chollo->descripcion}}</p>
                        </div>
                        <div class="ml-4 mb-4">
                          <a href={{route("editar",$chollo->id)}}><button class="btn btn-primary">Editar</button></a>
                          <form action="{{ route('eliminar', $chollo->id) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <a href={{route("eliminar",$chollo->id)}}><button class="btn btn-danger">Borrar</button></a>
                          </form>                       
                          </div>
                      </div>
                  </a>
                </div>
            @endforeach    
    </div>
    <div class="d-flex justify-content-center">
      {{$chollos->links()}}
      {{-- editar esta carpeta para cambiar la paginacion my-project\vendor\laravel\framework\src\Illuminate\Pagination\resources\views\tailwind.blade.php --}}
  </div>
    <script src="{{asset('assets/js/imagenTarjeta.js')}}"></script>
    
    {{-- <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">An item</li>
          <li class="list-group-item">A second item</li>
          <li class="list-group-item">A third item</li>
        </ul>
        <div class="card-body">
          <a href="#" class="card-link">Card link</a>
          <a href="#" class="card-link">Another link</a>
        </div>
      </div> --}}
@endsection