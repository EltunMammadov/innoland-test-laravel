<a href="{{ route('news.create') }}">Add News</a>

@foreach($news as $item)
    <h3>{{ $item->title }}</h3>
    <p>{{ $item->description }}</p>

    @if($item->image)
        <img src="{{ asset('storage/'.$item->image) }}" width="150">
    @endif

    <a href="{{ route('news.edit', $item->id) }}">Edit</a>

    <form method="POST" action="{{ route('news.destroy', $item->id) }}">
        @csrf
        @method('DELETE')
        <button>Delete</button>
    </form>
@endforeach
