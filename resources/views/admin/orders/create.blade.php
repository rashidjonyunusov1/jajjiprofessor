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
                        <h3>Add order</h3>
                        <a class="create__btn" href="{{route('admin.orders.index')}}"> <i class='bx bx-arrow-back'></i>Qaytish</a>

                    </div>

                    <form class="create__inputs" action="{{ route('admin.orders.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <strong> Title :</strong>
                        <input type="text" name="title" class="form-control"> <br>

                        <strong> Description :</strong>
                        <input type="text" name="description" class="form-control"> <br>

                        <strong> Category-1 :</strong>
                        <input type="text" name="categoryone" class="form-control"> <br>

                        <strong> Category-2 :</strong>
                        <input type="text" name="categorytwo" class="form-control"> <br>

                        <strong> Category-3 :</strong>
                        <input type="text" name="categorythree" class="form-control"> <br>

                        <strong> Name :</strong>
                        <input type="text" name="name" class="form-control"> <br>

                        <strong> Phone :</strong>
                        <input type="tel" name="phone" class="form-control"> <br>

                        <strong> Classes :</strong>
                        <input type="text" name="classes" class="form-control"> <br>

                        <input type="submit" value="Qo`shish">

                    </form>
                </div>

            </div>
        </main>
        <!-- MAIN -->

@endsection
