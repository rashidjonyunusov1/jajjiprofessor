@extends('admin.layouts.main')


@section('content')

<!-- MAIN -->
<main>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Show</h3>
                <a class="create__btn" href="{{ route('admin.teachers.index') }}"></i>Back</a>
            </div>
            <table>
                <tr>
                    <td>ID</td>
                    <td>{{ $teacher->id }}</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><img src="/files/{{ $teacher->img }}" width="60px"></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $teacher->name }}</td>
                </tr>
                <tr>
                    <td>Field</td>
                    <td>{{ $teacher->field }}</td>
                </tr>
                
            </table>
        </div>

    </div>
</main>
<!-- MAIN -->

@endsection
