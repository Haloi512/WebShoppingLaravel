@extends('admin.layouts.master')

@section('title')
    Add Category
@endsection

@section('content')
<div class="card shadow mb-4">
<div class="container">
    <h2>Add category</h2>
    <hr>
    <form class="form-horizontal" action="{{route('category.store')}}" method="post">
        @csrf
      <div class="form-group">
        <label class="control-label col-sm-2" for="email">name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" placeholder="" name="name">
        </div>
      </div>
      {{-- <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-10">          
          <textarea type="text" class="form-control" id="pwd" placeholder="Enter password" name="pwd"></textarea>
        </div>
      </div> --}}
      <div class="form-group">
        <div class="col-sm-10">
        <label class="control-label col-sm-2" for="status">Status</label>
        <select class="form-control" name="status">
          <option value="1">show</option>
          <option value="0">hidden</option>
        </select>
        </div>
      </div>
      <div class="form-group">        
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection