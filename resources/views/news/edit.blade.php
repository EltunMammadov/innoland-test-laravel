<form method="POST" enctype="multipart/form-data" action="{{ route('news.update', $news->id) }}">
    @csrf
    @method('PUT')

    <input name="title" value="{{ $news->title }}"> <br> <br>
    <textarea name="description">{{ $news->description }}</textarea> <br> <br>
    <input type="file" name="image"> <br> <br>
    <button>Update</button>
</form>
