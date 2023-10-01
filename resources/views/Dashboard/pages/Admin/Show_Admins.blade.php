@extends('Dashboard.layout.Dashboard_Layout')


@section('content')
    @include('Dashboard.include.success')
    <div>
        <table class="table table-hover text-center">
            <thead class="text-primary">
                <tr>
                    <th>Admin ID</th>
                    <th>Name</th>
                    <th>Rank</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($Admins as $Admin)
                    <tr>
                        <td>{{ $Admin->admin_id }}</td>
                        <td>{{ $Admin->name }}</td>
                        <td>{{ $Admin->rank }}</td>
                        <td>
                            <form action="{{ route('admin.destroy', $Admin->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
