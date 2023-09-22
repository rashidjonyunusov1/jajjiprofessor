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
                        <h3>Teachers</h3>
                        <a class="create__btn" href="{{ route('admin.teachers.index') }}"> <i class='bx bx-arrow-back'></i>Qaytish</a>

                    </div>

                    <form class="create__inputs" action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <strong> Image :</strong>
                        <input type="file" name="img" value="{{ $teacher->img }}" class="form-control"> <br>

                        <strong> Name :</strong>
                        <input type="text" name="name" value="{{ $teacher->name }}" class="form-control"> <br>

                        <strong> Field :</strong>
                        <input type="text" name="field" value="{{ $teacher->field }}" class="form-control"> <br>

                        <input type="submit" value="Qo`shish">

                    </form>
                </div>

            </div>
        </main>
        <!-- MAIN -->

@endsection
