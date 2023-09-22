@extends('admin.layouts.main')


@section('content')

<!-- MAIN -->
<main>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Show</h3>
                <a class="create__btn" href="{{ route('admin.comments.index') }}"></i>Back</a>
            </div>
            <table>
                <tr>
                    <td>ID</td>
                    <td>{{ $comment->id }}</td>
                </tr>
                <tr>
                    <td>Icon</td>
                    <td><img src="/files/{{ $comment->icon }}" width="60px"></td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{ $comment->description }}</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><img src="/files/{{ $comment->img }}" width="60px"></td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $comment->name }}</td>
                </tr>
                <tr>
                    <td>Field</td>
                    <td>{{ $comment->field }}</td>
                </tr>
                <tr>
                    <td>Time</td>
                    <td>{{ $comment->created_at }}</td>
                </tr>
            </table>
        </div>

    </div>
</main>
<!-- MAIN -->

@endsection
