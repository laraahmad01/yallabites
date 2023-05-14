<form action="{{ route('store.search') }}" method="GET">
    <input type="text" name="query" value="{{ $query }}" placeholder="Search stores...">
    <button type="submit">Search</button>
</form>

@if(count($stores) > 0)
    <h2>Search Results</h2>

    <ul>
        @foreach($stores as $store)
            <li><a href="{{ route('store.show', $store->id) }}">{{ $store->name }}</a></li>
        @endforeach
    </ul>
@else
    <p>No stores found.</p>
@endif
