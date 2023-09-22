@extends('admin.layouts.main')


@section('content')

@if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<!-- MAIN -->

<main>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Numbers</h3>
                <a class="create__btn" href="{{ route('admin.numbers.create') }}"> <i class='bx bxs-folder-plus'></i>Yaratish</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Number</th>
                        <th>Human</th>
                        <th>Data</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($numbers as $item)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{ $item->number }}</td>
                            <td>{{ $item->name ?? 'Bog`lanmagan' }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>

                                <form method="POST" action="{{ route('admin.numbers.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <a class="btn btn-primary" href="{{ route('admin.numbers.show', $item->id) }}"><ion-icon name="eye-outline"></ion-icon></a>
                                    <a class="btn btn-primary" href="{{ route('admin.numbers.edit', $item->id) }}"><ion-icon name="create-outline"></ion-icon></a>

                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete ?')"><ion-icon name="trash-outline"></ion-icon></button>

                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $numbers->links() }}
        </div>

    </div>
</main>
<!-- MAIN -->

@endsection
