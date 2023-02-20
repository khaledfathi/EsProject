
@extends('layout')
@section('Title', 'Articles | Articles')
@section('ContentTitle', 'Articles')

@section('Content')
</i><div class="card-body">
  <div class= "float-right " style="margin: 0px 20px 20px">
      <a href="{{url('articles/addarticle')}}" class="btn btn-block btn-primary" >New Article</a>
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th style="width: 10px">#</th>
        <th>ID</th>
        <th>Title</th>
        <th>Category</th>
        <th>Created</th>
        <th>Last Update</th>
        <th>cover</th>
        <th>View</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @if ($Articles)
        @foreach ($Articles as $Article)
           <tr>
           <td>{{$loop->index}}</td>
           <td>{{$Article->id}}</td> 
           <td>{{$Article->title}}</td> 
           <td>{{$Article->category_name}}</td> 
           <td>{{$Article->created_at}}</td> 
           <td>{{$Article->updated_at}}</td> 
           <td><img src= "{{url($Article->cover_image)}}" width="100" hight="100"></td>
           <td><a href="#" class="btn btn-success">View</a></td>
           <td><a href="{{url('articles/editarticle?id='.$Article->id)}}" class="btn btn-primary">Edit</a></td>
           <td><a href="{{url('articles/deletearticle?id='.$Article->id)}}" class="btn btn-danger">Delete</a></td>
          </tr>
        @endforeach
      @endif
    
    </tbody>
  </table>
</div>
@endsection 