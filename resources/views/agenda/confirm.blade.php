@extends('plantilla.plantilla')

@section('titulo', 'Confirmar borrado')

@section('contenido')
    <div class="container py-5">
        <h1>¿Deseas eliminar el registro de {{ $agenda->nombres }} {{ $agenda->apellidos }}?</h1>
        <form method="post" action="{{ route('agenda.destroy', $agenda->id )}}">
            @method('DELETE')
            @csrf
            <button type="submit" class="redondo btn btn-danger">
                <i class="fas fa-trash-alt"></i> Eliminar
            </button>
            <a class="redondo btn btn-secondary" href="{{route('cancelar')}}">
                <i class="fas fa-ban"> Cancelar</i>
            </a>
        </form>
    </div>
    @include('plantilla.footer', ['container' => 'container'])
    @endsection
