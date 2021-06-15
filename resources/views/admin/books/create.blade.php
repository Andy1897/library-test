@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Создание книги</h1>
                <form action="{{route('admin.books.store')}}" class="form" method="post" enctype="multipart/form-data">
                    @csrf

                    @include('admin.books.partials.form')


                    <button class="btn btn-info">Создать</button>
                </form>
            </div>
        </div>
    </div>
@endsection
