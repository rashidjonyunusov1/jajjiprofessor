@extends('admin.layouts.main')


@section('content')

<!-- MAIN -->
<main>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Humans</h3>
                <a class="create__btn" href="{{ route('admin.humans.create') }}"> <i class='bx bxs-folder-plus'></i>Yaratish</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <!-- <th>Number</th> -->
                        <th>Data</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($humans as $item)
                        <tr>
                            <td>{{ ++$loop->index }}</td>
                            <td>{{ $item->name }}</td>
                            <!-- <td>{{ $item->number->number ?? 'Bog`lanmagan' }}</td> -->
                            <td>{{ $item->created_at }}</td>
                            <td>

                                <form method="POST" action="{{ route('admin.humans.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <a class="btn btn-primary" href="{{ route('admin.humans.show', $item->id) }}"><ion-icon name="eye-outline"></ion-icon></a>
                                    <a class="btn btn-primary" href="{{ route('admin.humans.edit', $item->id) }}"><ion-icon name="create-outline"></ion-icon></a>

                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Do you want to delete ?')"><ion-icon name="trash-outline"></ion-icon></button>

                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $humans->links() }}
        </div>

    </div>
</main>
<!-- MAIN -->

@endsection
