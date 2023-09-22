@extends('admin.layouts.main')


@section('content')

<!-- MAIN -->
<main>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Teachers</h3>
                <a class="create__btn" href="{{ route('admin.teachers.create') }}"> <i class='bx bxs-folder-plus'></i>Yaratish</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Img</th>
                        <th>Name</th>
                        <th>Field</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teachers as $item)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td><img src="/files/{{ $item->img }}" width="60px"></td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->field }}</td>
                            <td>{{ $item->created_at }}</td>                            <td>

                            <form method="POST" action="{{ route('admin.teachers.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <a class="btn btn-primary" href="{{ route('admin.teachers.show', $item->id) }}"><ion-icon name="eye-outline"></ion-icon></a>
                                    <a class="btn btn-primary" href="{{ route('admin.teachers.edit', $item->id) }}"><ion-icon name="create-outline"></ion-icon></a>

                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete ?')"><ion-icon name="trash-outline"></ion-icon></button>

                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $teachers->links() }}
        </div>

    </div>
</main>
<!-- MAIN -->

@endsection
