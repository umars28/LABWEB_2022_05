@extends('layout')
@section('content')
<div class="card">
  <div class="card-header">Categories Page</div>
  <div class="card-body">
      
      <form action="{{ url('categories/' .$categories->id) }}" method="post" id="data">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{$categories->id}}" id="id" />
        <label>Name</label></br>
        <input type="text" name="name" id="name" value="{{$categories->name}}" class="form-control"></br>
        <label>Status</label></br>
        <select class="form-select" name="status" form="data">
          <option value="Active" selected>Active</option>
          <option value="No Active">No Active</option>
        </select>
        <input type="submit" value="Update" class="btn btn-success"></br>
    </form>
  
  </div>
</div>
@stop