@extends('admin.layouts.main')


@section('content')

<!-- MAIN -->
<main>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Comments</h3>
                <a class="create__btn" href="{{ route('admin.comments.create') }}"> <i class='bx bxs-folder-plus'></i>Yaratish</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Field</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($comments as $item)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td><img src="/files/{{ $item->img }}" width="50px"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->field }}</td>
                            <td>{{ $item->created_at }}</td>                            
                            <td>
                                <form method="POST" action="{{ route('admin.comments.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <a class="btn btn-primary" href="{{ route('admin.comments.show', $item->id) }}"><ion-icon name="eye-outline"></ion-icon></a>
                                    <a class="btn btn-primary" href="{{ route('admin.comments.edit', $item->id) }}"><ion-icon name="create-outline"></ion-icon></a>

                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete ?')"><ion-icon name="trash-outline"></ion-icon></button>

                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $comments->links() }}
        </div>

    </div>
</main>
<!-- MAIN -->

@endsection
