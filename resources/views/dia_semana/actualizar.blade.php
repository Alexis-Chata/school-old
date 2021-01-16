
@extends('adminlte::page')

@section('title', 'Editar Dia Semana')

@section('content_header')
    <div class="container">
        <h1 class="mt-3">Editar Dia Semana</h1>
    </div>
@stop

@section('content')

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <p><a href="{{route('dia_semana.create')}}">Regresar</a></p>
            <section class="content">
                @include('dia_semana._form')
            </section>
        </div>
    </main>

@endsection
