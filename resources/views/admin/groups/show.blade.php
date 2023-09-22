@extends('admin.layouts.main')


@section('content')

<!-- MAIN -->
<main>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Show</h3>
                <a class="create__btn" href="{{ route('admin.groups.index') }}"></i>Back</a>
            </div>
            <table>
                <tr>
                    <td>ID</td>
                    <td>{{ $group->id }}</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><img src="/files/{{ $group->img }}" width="60px"></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>{{ $group->title }}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{ $group->description }}</td>
                </tr>
                <tr>
                    <td>Age</td>
                    <td>{{ $group->age }}</td>
                </tr>
                <tr>
                    <td>Space</td>
                    <td>{{ $group->space }}</td>
                </tr>
                <tr>
                    <td>Time</td>
                    <td>{{ $group->time }}</td>
                </tr>
                <tr>
                    <td>Money</td>
                    <td>{{ $group->money }}</td>
                </tr>
            </table>
        </div>

    </div>
</main>
<!-- MAIN -->

@endsection
