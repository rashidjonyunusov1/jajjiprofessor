@extends('admin.layouts.main')


@section('content')
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    <!-- MAIN -->
        <main>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Edit Group</h3>
                        <a class="create__btn" href="{{ route('admin.groups.index') }}"> <i class='bx bx-arrow-back'></i>Qaytish</a>

                    </div>

                    <form class="create__inputs" action="{{ route('admin.groups.update', $group->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <strong> Rasm(png yoki jpg) :</strong>
                        <input type="file" name="img" class="form-control"> <br>

                        <strong> Title :</strong>
                        <input type="text" name="title" value="{{ $group->title }}" class="form-control"> <br>

                        <strong> Description :</strong>
                        <input type="text" name="description" value="{{ $group->description }}" class="form-control"> <br>

                        <strong> Age :</strong>
                        <input type="text" name="age" value="{{ $group->age }}" class="form-control"> <br>

                        <strong> Space :</strong>
                        <input type="text" name="space" value="{{ $group->space }}" class="form-control"> <br>

                        <strong> Time :</strong>
                        <input type="text" name="time" value="{{ $group->time }}" class="form-control"> <br>

                        <strong> Money :</strong>
                        <input type="text" name="money" value="{{ $group->money }}" class="form-control"> <br>

                        <input type="submit" value="Edit">

                    </form>
                </div>

            </div>
        </main>
        <!-- MAIN -->

@endsection
