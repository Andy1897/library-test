@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a class="btn btn-sm btn-success" href="{{route('admin.books.create')}}">Добавить книгу</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Название</th>
                            <th>Автор</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td><a href="{{route('admin.books.edit',$book)}}">{{ $book->title }}</a></td>
                                <td>{{ $book->author->name ?? '-'}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
