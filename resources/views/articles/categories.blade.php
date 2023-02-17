
@extends('layout')
@section('Title', 'Articles | Categories')
@section('ContentTitle', 'Categories')

@section('Content')
</i><div class="card-body">
  <div class= "float-right " style="margin: 0px 20px 20px">
      <a href="{{url('articles/addcategory')}}" class="btn btn-block btn-primary" >New Category</a>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th>ID</th>
        <th>Category Name</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @if ($Categories)
        @foreach ($Categories as $Category)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$Category->id}}</td>
              <td>{{$Category->name}}</td>
              <td><a href="http://localhost/articles/editcategory?id={{$Category->id}}&name={{$Category->name}}" class="btn btn-primary">Edit</a></td>
              <td><a href="http://localhost/articles/deletecategory?id={{$Category->id}}" class="btn btn-danger">Delete</a></td>
            </tr>
        @endforeach
      @endif
    </tbody>
  </table>
</div>
@endsection 