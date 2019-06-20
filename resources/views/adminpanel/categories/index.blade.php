@extends('adminpanel.partials.dashboard')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <h2>Categories</h2>
        </div>
        <div class="col-md-8 text-right">
            <div class="btn-group mr-6">
                <a href="{{route('categories.create')}}" type="button" class="btn btn-sm btn-outline-secondary" style="padding: 10px; margin-top: 5px;">Add New Category</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th> id</th>
                <th> Title</th>
                <th> Edit</th>
                <th> Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($list as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->title}}</td>
                    <td><a class="btn btn-success" href="{{route('categories.edit',$category->id)}}">EDIT</a></td>
                    <td>
                        <form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="post">
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
