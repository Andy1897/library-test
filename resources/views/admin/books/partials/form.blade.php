<div class="form-group">
    <label>Название</label>
    <input type="text" class="form-control" name="title" value="{{$book->title ?? old('title')}}">
</div>

<div class="form-group">
    <label>Автор</label>
    <select class="form-control"  name="author_id">
        @foreach($authors as $author)
            <option
                value="{{$author->id}}"
                @if(isset($book))
                    {{ $book->author->id == $author->id ? 'selected' : 'не выбран' }}
                @endif

            >{{$author->name}}</option>
        @endforeach
    </select>
</div>
