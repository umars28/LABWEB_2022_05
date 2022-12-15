@extends('layout')
@section('content')
<div class="card">
  <div class="card-header">Sellers Permissions Page</div>
  <div class="card-body">

    <form action="{{ url('sellers_permissions') }}" method="post" id="data">
      {!! csrf_field() !!}
      <label>Seller ID</label></br>
      <select class="form-select" name="sellers_id" form="data">
      @foreach ($sellers as $seller)
        <option value="{{ $seller->id }}">{{ $seller->id }}. {{ $seller->name }}</option>
      @endforeach
      </select>
      <label>Permission ID</label></br>
      <select class="form-select" name="permissions_id" form="data">
      @foreach ($permissions as $permission)
        <option value="{{ $permission->id }}">{{ $permission->id }}. {{ $permission->name }}</option>
      @endforeach
      </select>
      <input type="submit" value="Save" class="btn btn-success"></br>
    </form>

  </div>
</div>
@stop











