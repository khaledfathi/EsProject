@extends('layout')
@section('Title', 'Profile')
@section('ContentTitle' , 'Profile')

@section('Content')
<div class="col-md-12">
    <!-- Profile Image -->
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
        <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="{{url(auth()->user()->profile_image)}}" alt="User profile picture">
        </div>
        <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>
        <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
            <b>Articles Posted</b> <a class="float-right">{{$ArticlesCount}}</a>
            </li>
            <li class="list-group-item">
            <b>Name</b> <a class="float-right">{{Auth::user()->name}}</a>
            </li>
            <li class="list-group-item">
            <b>Email</b> <a class="float-right">{{Auth::user()->email}}</a>
            </li>
        </ul>
        <div class = " row justify-content-center">
            <a href="#" class="btn btn-primary btn-block col-3"><b>Show Posts</b></a>
        </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
@endsection 