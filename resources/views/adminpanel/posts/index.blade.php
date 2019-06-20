@extends('adminpanel.partials.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h2>Posts</h2>
        </div>
        <div class="col-md-8 text-right">
            <div class="btn-group mr-6">
                <a href="{{route('posts.create')}}" type="button" class="btn btn-sm btn-outline-secondary" style="padding: 10px; margin-top: 5px;">Add New Post</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th> id</th>
                <th> Category</th>
                <th> Title</th>
                <th> Description</th>
                <th> Edit</th>
                <th> Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->category->title}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td><a class="btn btn-success" href="{{route('posts.edit',$post->id)}}">EDIT</a></td>
                    <td>
                        <form action="{{ route('posts.destroy', ['id' => $post->id]) }}" method="post">
                            <input class="btn btn-danger" type="submit" value="Delete" />
                            @method('delete')
                            @csrf
                        </form>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
