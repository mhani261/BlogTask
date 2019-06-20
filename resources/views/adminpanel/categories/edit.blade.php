@extends('adminpanel.partials.dashboard')
@section('content')
    <div class="container">
        <form action="{{route('posts.update',$category->id)}}" method="post"  style="margin: 2%">
            @csrf
            {{ method_field('PUT') }}
            <div class="row">
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="Title">Title</label>
                        <small style="color: red; display:{{$errors->has('title')? '' : 'none'}}"> This filed is required</small>
                        <input type="text"  name="title" class="form-control" id="Title" value="{{$category->title}}" placeholder="Category Title">
                    </div>
                </div>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection