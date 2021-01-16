
@extends('adminlte::page')

@section('title', 'Editar Seccion')

@section('content_header')
    <div class="container">
        <h1 class="mt-3">Editar Seccion</h1>
    </div>
@stop

@section('content')

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <p><a href="{{route('seccion.create')}}">Regresar</a></p>
            <section class="content">
                @include('seccion._form')
            </section>
        </div>
    </main>

@endsection
