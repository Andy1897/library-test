@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Изменение автора</h1>
                <form action="{{route('admin.authors.update',$author)}}" class="form" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    @include('admin.authors.partials.form')


                    <button class="btn btn-info">Сохранить</button>
                </form>


                <hr>

                <form action="{{route('admin.authors.destroy',$author)}}" class="form text-right" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger">Удалить</button>
                </form>

            </div>
        </div>
    </div>
@endsection
