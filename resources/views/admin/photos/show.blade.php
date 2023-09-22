@extends('admin.layouts.main')


@section('content')

<!-- MAIN -->
<main>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Show</h3>
                <a class="create__btn" href="{{ route('admin.photos.index') }}"></i>Back</a>
            </div>
            <table>
                <tr>
                    <td>ID</td>
                    <td>{{ $photo->id }}</td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td><img src="/files/{{ $photo->img }}" width="50px"></td>
                </tr>
                
            </table>
        </div>

    </div>
</main>
<!-- MAIN -->

@endsection
