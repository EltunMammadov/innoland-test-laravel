<form method="POST" enctype="multipart/form-data" action="{{ route('news.store') }}">
    @csrf
    <input name="title" placeholder="Title"><br><br>
    <textarea name="description"></textarea><br><br>
    <input type="file" name="image"><br><br>
    <button>Save</button>
</form>
