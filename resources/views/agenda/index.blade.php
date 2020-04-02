@extends('plantilla.plantilla')

@section('titulo', 'Agenda')

@section('contenido')





    <div class="container-fluid ">


        @if( session('datos') )
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('datos') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

        @if( session('cancelar') )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('cancelar') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        <br>

        @include('agenda.navuser')


        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="{{route('agenda.index')}}">Inicio</a></li>
            </ol>
        </nav>


            <nav class="navbar navbar-light float-right">
                <form class="form-inline">

                    <select name="tipo"  class="form-control mr-sm-2" id="exampleFormControlSelect1">
                        <option>Buscar por tipo</option>
                        <option>nombres</option>
                        <option>apellidos</option>
                        <option>telefono</option>
                        <option>movil</option>
                        <option>email</option>
                    </select>

                    <input name="buscarpor" class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>


                </form>
            </nav>

        <br>
        <h1 class="text-center">Datos personales</h1>

        <br>
        <div class="row float-right">
            <a href="{{ route('agenda.create') }}" class="btn btn-info btncolorblanco"><i class="fas fa-user-plus"></i> Agregar un nuevo Registro</a>
        </div>
        <br>


        <table class="table-responsive table text-center">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombres y apellidos</th>
                <th scope="col">Telefono</th>
                <th scope="col">Celular</th>
                <th scope="col">Sexo</th>
                <th scope="col">Email</th>
                <th scope="col">Posición</th>
                <th scope="col">Departamento</th>
                <th scope="col">Salario</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Acción</th>

            </tr>
            </thead>
            <tbody>
            @foreach ( $agenda as $agendaitem)
            <tr>
                <th scope="row">{{ $agendaitem->id }}</th>
                <td>
                    <a href="{{ route('agenda.show', $agendaitem->id) }}">
                        {{ $agendaitem->nombres }} {{ $agendaitem->apellidos }}
                    </a>
                </td>
                <td>{{ $agendaitem->telefono }}</td>
                <td>{{ $agendaitem->movil }}</td>
                <td>{{ $agendaitem->sexo }}</td>
                <td>{{ $agendaitem->email }}</td>
                <td>{{ $agendaitem->posicion }}</td>
                <td>{{ $agendaitem->departamento }}</td>
                <td>{{ $agendaitem->salario }}</td>
                <td>{{ $agendaitem->fechadenacimiento }}</td>
                <td><a href="{{route('agenda.edit', $agendaitem->id)}}" class="btn btn-success btncolorblanco">
                        <i class="fa fa-edit"></i> Editar
                    </a>

                    <a href="{{ route('agenda.confirm', $agendaitem->id ) }}" class="btn btn-danger btncolorblanco">
                        <i class="fa fa-trash-alt"></i> Eliminar
                    </a>
                </td>

            </tr>
@endforeach
            </tbody>
        </table>

            {{ $agenda->appends($_GET) }}

    </div>

    <br>

@include('plantilla.footer', ['container' => 'container-fluid'])

@endsection
