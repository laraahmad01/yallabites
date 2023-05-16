@extends('StoreProfile')

<div class="col-lg-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Check Your Items</h4>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Calories</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <td colspan="5"><h2>{{ $category->name }}</h2></td>
                        </tr>
                        @foreach($category->items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->price }}</td>
                            <td>{{ $item->calories }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <form action="{{ route('storedeleteitem', ['id' => $item->id]) }}" >
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">Delete</button>
                                </form>
                                <form action="{{ route('itemedit', ['id' => $item->id]) }}" method="GET">
                                    <button type="submit">Edit</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>