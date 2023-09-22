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
                        <h3>Comments</h3>
                        <a class="create__btn" href="{{route('admin.comments.index')}}"> <i class='bx bx-arrow-back'></i>Qaytish</a>

                    </div>

                    <form class="create__inputs" action="{{ route('admin.comments.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <strong> Icon :</strong>
                        <input type="file" name="icon" class="form-control"> <br>

                        <strong> Description :</strong>
                        <input type="text" name="description" class="form-control"> <br>

                        <strong> Image :</strong>
                        <input type="file" name="img" class="form-control"> <br>

                        <strong> Name :</strong>
                        <input type="text" name="name" class="form-control"> <br>

                        <strong> Field :</strong>
                        <input type="text" name="field" class="form-control"> <br>

                        <input type="submit" value="Qo`shish">

                    </form>
                </div>

            </div>
        </main>
        <!-- MAIN -->

@endsection
