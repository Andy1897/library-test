@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a class="btn btn-sm btn-success" href="{{route('admin.authors.create')}}">Добавить автора</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Имя</th>
                            <th>Написал книг</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($authors as $author)
                            <tr>
                                <td>{{ $author->id }}</td>
                                <td><a href="{{route('admin.authors.edit',$author)}}">{{ $author->name }}</a></td>
                                <td>{{ $author->books->count() }}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
