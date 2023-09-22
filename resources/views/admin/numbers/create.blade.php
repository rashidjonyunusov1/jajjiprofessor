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
        @if(session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif
    <!-- MAIN -->
        <main>

            <div class="table-data">
                <div class="order">
                    <div class="head">
                        <h3>Add numbers</h3>
                        <a class="create__btn" href="{{ route('admin.numbers.index') }}"> <i class='bx bx-arrow-back'></i>Qaytish</a>

                    </div>

                    <form class="create__inputs" action="{{ route('admin.numbers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <strong> Number :</strong>
                        <input type="number" name="number" class="form-control"> <br>

                        <strong> Human :</strong>
                        <select name="human_id" id="" class="form-control">
                            @foreach($humans as $item)
                                <option value="{{ $item->id }}">{{ $item->name  }}</option>
                            @endforeach
                        </select> <br>


                        <input type="submit" value="Qo`shish">

                    </form>
                </div>

            </div>
        </main>
        <!-- MAIN -->

@endsection
