@extends('layout.admin')
@section('content')
    <div class="container">
        <h1 class="text-center fw-bold text-dark mb-5">Danh sách các dang mục</h1>
        <div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        <th>description</th>
                        <th>image</th>
                        <th>parent_id</th>
                        <th>is_active</th>
                        <th>is_deleted</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category['id'] }}</td>
                            <td>{{ $category['name'] }}</td>
                            <td>{{ $category['description'] }}</td>
                            <td>{{ $category['image'] }}</td>
                            <td>{{ $category['parent_id'] }}</td>
                            <td>{{ $category['is_active'] }}</td>
                            <td>{{ $category['is_deleted'] }}</td>
                            <td>
                                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-sm btn-primary">Detail</a>

                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-info">Edit</a>

                                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" >Delete</button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $categories->links() }}
        </div>
    </div>

@endsection