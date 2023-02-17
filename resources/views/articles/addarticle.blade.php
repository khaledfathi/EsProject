@extends('layout')
@section('Title', 'Articles | New Articles')
@section('ContentTitle', 'New Article')
@section('Content')
    @if ($errors->any())
        <div class="alert alert-danger " style="margin: 0% 10%;text-align:center" role="alert">
            {{ $errors->first() }}
        </div>
    @endif
    <div class="card-body">
        <!-- /.card-body -->
        <div class="card card-warning col-12">
            <div class="card-header">
                <h3 class="card-title">Article</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form action="{{ url('articles/newarticle') }}" method='post' enctype="multipart/form-data" >
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <!-- text input -->
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Author</label>
                                <input type="text" class="form-control" disabled=""
                                    value="{{ auth()->user()->name }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Abstract</label>
                            <textarea class="form-control" rows="2" name="abstract"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control" rows="10" name="content"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            @if ($Categories)
                                @foreach ($Categories as $Category)
                                   <option value="{{$Category->id}}">{{$Category->name}}</option> 
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Cover Image</label>
                        <input class="form-control" type="file" name="cover_image" >
                    </div>

                    <div class="card-footer row justify-content-center">
                        <input type="submit" class="btn btn-primary col-2 " value="Save and Publish">
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
