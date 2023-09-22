@extends('admin.layouts.main')


@section('content')

<!-- MAIN -->
<main>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Show</h3>
                <a class="create__btn" href="{{ route('admin.blogs.index') }}"></i>Back</a>
            </div>
            <table>
                <tr>
                    <td>ID</td>
                    <td>{{ $win->id }}</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><img src="/files/{{ $win->img }}" width="50px"></td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>{{ $win->title }}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{ $win->description }}</td>
                </tr>
                
            </table>
        </div>

    </div>
</main>
<!-- MAIN -->

@endsection
