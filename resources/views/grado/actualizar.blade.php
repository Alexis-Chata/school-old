
@extends('adminlte::page')

@section('title', 'Editar Grado')

@section('content_header')
    <div class="container">
        <h1 class="mt-3">Editar Grado</h1>
    </div>
@stop

@section('content')

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <p><a href="{{route('grado.create')}}">Regresar</a></p>
            <section class="content">
                @include('grado._form')
            </section>
        </div>
    </main>

@endsection
