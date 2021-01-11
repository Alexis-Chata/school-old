@if ($errors->any())

    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">* {{ $error }}</p>
    @endforeach

@endif

<form method="post" action="{{ $action }}" class="row g-3">
    @csrf
    <div class="align-self-center col-auto">
      <label class="m-0">Seccion: </label>
    </div>
    <div class="col-auto">
      <input type="text" name="name" class="form-control" placeholder="Seccion" value="{{ $seccion->name }}" autofocus>
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary">Registrar</button>
    </div>
    @if (!empty($put))
        <input type="hidden" name="_method" value="PUT">
    @endif

  </form>
  <br />
