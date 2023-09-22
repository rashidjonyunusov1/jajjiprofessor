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
                        <h3>Add Group</h3>
                        <a class="create__btn" href="{{route('admin.groups.index')}}"> <i class='bx bx-arrow-back'></i>Qaytish</a>

                    </div>

                    <form class="create__inputs" action="{{ route('admin.groups.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <strong> Rasm(png yoki jpg) :</strong>
                        <input type="file" name="img" class="form-control"> <br>

                        <strong> Title :</strong>
                        <input type="text" name="title" class="form-control"> <br>

                        <strong> Description :</strong>
                        <input type="text" name="description" class="form-control"> <br>

                        <strong> Age :</strong>
                        <input type="number" name="age" class="form-control"> <br>

                        <strong> Space :</strong>
                        <input type="number" name="space" class="form-control"> <br>

                        <strong> Time :</strong>
                        <input type="time" name="time" class="form-control"> <br>

                        <strong> Money :</strong>
                        <input type="number" name="money" class="form-control"> <br>

                        <input type="submit" value="Qo`shish">

                    </form>
                </div>

            </div>
        </main>
        <!-- MAIN -->

@endsection
