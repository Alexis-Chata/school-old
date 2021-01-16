
@extends('adminlte::page')

@section('title', 'Editar Año Academico')

@section('content_header')
    <div class="container">
        <h1 class="mt-3">Editar Año Academico</h1>
    </div>
@stop

@section('content')

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <p><a href="{{route('anio_academico.create')}}">Regresar</a></p>
            <section class="content">
                @include('anio_academico._form')
            </section>
        </div>
    </main>

@endsection
