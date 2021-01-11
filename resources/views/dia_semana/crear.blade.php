@extends('adminlte::page')

@section('title', 'Crear Dia Semana')

@section('content_header')
    <div class="container">
        <h1 class="mt-3">Crear Dia Semana</h1>
    </div>
@stop

@section('plugins.Datatables', true)

@section('content')

    <main role="main" class="flex-shrink-0">
        <div class="container">
            <p><a href="{{route('dia_semana.crear')}}">Regresar</a></p>
            <section class="content">
                @include('dia_semana._form')
            </section>
        </div>
    </main>
<div class="card">
    <div class="card-body">
        <table id="tbl_anio" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created_at</th>
                    <th>Update_at</th>
                </tr>
            </thead>
            <tbody>
                @php
                    //print_r($anio);
                @endphp

                @foreach ($dia_semanas as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->created_at }}</td>
                    <td>{{ $value->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

@section('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.bootstrap4.min.css">
@stop

@section('js')
    {{-- <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>--}}
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
        $('#tbl_anio').DataTable({
            responsive:true,
            autoWidth:false,
            "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "Nada encontrado - lo sentimos",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(Filtrado de _MAX_ registrados totales)",
            "search": "Buscar:",
            "paginate":{
                "next": "Siguiente",
                "previous": "Anterior"
            }
            },
            "order": [[ 0, "desc" ]]
        });
        } );
    </script>
@stop
