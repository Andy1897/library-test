@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h1>Создание автора</h1>
                <form action="{{route('admin.authors.store')}}" class="form" method="post" enctype="multipart/form-data">
                    @csrf

                    @include('admin.authors.partials.form')


                    <button class="btn btn-info">Создать</button>
                </form>
            </div>
        </div>
    </div>
@endsection
