
@extends('layout')
@section('Title', 'Articles | Edit Categories')
@section('ContentTitle', 'Edit Category')

@section('Content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Category</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <form action ="updatecategory" method="post" >
    <div class="card-body">
      <div class="form-group">
        <label for="CategoryName">Category Name</label>
        <input type="text" class="form-control" id="CategoryName" placeholder="Category Name" name="name" value="{{$Name}}">
        <input type="hidden" name="id" value="{{$Id}}">
      </div>
    </div>
    <!-- /.card-body -->
    @if ($errors->any())      
      <div class="alert alert-danger" style="margin: 0% 20%;text-align:center"  role="alert">
        {{$errors->first()}}
      </div>
    @endif
    <div class="card-footer row justify-content-center">
      <input type="submit" class="btn btn-primary col-2 " value = "Update">
    </div>
  </form>
</div>
@endsection 