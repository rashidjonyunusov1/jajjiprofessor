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
                        <h3>Edit number</h3>
                        <a class="create__btn" href="{{ route('admin.numbers.index') }}"> <i class='bx bx-arrow-back'></i>Qaytish</a>

                    </div>

                    <form class="create__inputs" action="{{ route('admin.numbers.update', $number->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <strong> number :</strong>
                        <input type="number" name="number" value="{{ $number->number }}" class="form-control"> <br>

                        <strong> Human :</strong>
                        <select name="human_id" id="" class="form-control">
                            <option value="{{ $number->human_id }}">{{ $number->human->name }}</option>
                            @foreach($humans as $item)
                                @if($number->human_id != $item->id )
                                    <option value="{{ $item->id }}">{{ $item->name  }}</option>
                                @endif
                            @endforeach
                        </select> <br>

                        <input type="submit" value="Edit">

                    </form>
                </div>

            </div>
        </main>
        <!-- MAIN -->

@endsection
