@extends('admin.layouts.main')


@section('content')

<!-- MAIN -->
<main>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Complaints</h3>
                <a class="create__btn" href="{{ route('admin.complaints.create') }}"> <i class='bx bxs-folder-plus'></i>Yaratish</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Complaint</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($complaints as $item)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->complaint }}</td>
                            <td>{{ $item->created_at }}</td>                            
                            <td>
                                <form method="POST" action="{{ route('admin.complaints.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <a class="btn btn-primary" href="{{ route('admin.complaints.show', $item->id) }}"><ion-icon name="eye-outline"></ion-icon></a>
                                    <a class="btn btn-primary" href="{{ route('admin.complaints.edit', $item->id) }}"><ion-icon name="create-outline"></ion-icon></a>

                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete ?')"><ion-icon name="trash-outline"></ion-icon></button>

                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $complaints->links() }}
        </div>

    </div>
</main>
<!-- MAIN -->

@endsection
