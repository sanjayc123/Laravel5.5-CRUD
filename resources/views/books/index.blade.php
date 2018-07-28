@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Books CRUD</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('books.create') }}"> Create New Book</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Description</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @if (count($books) < 1)
            <td align="center" colspan="7">No books found.</td>
        @endif
        @foreach ($books as $book)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $book->isbn}}</td>
            <td>{{ $book->title}}</td>
            <td>{{ $book->author}}</td>
            <td>{{ $book->description}}</td>
            <td>{{ Html::image(URL::to("/uploads/books/".$book->image), "Book Cover", ['width' => 50, 'height' => 50]) }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('books.show',$book->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('books.edit',$book->id) }}">Edit</a>
                {!! Form::open(['method' => 'DELETE','route' => ['books.destroy', $book->id],'style'=>'display:inline']) !!}
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            </td>
        </tr>
        @endforeach
    </table>

    {!! $books->links() !!}
@endsection