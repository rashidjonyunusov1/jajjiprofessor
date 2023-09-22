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
                        <h3>Complaints</h3>
                        <a class="create__btn" href="{{ route('admin.complaints.index') }}"> <i class='bx bx-arrow-back'></i>Qaytish</a>

                    </div>
                    
                    <form class="create__inputs" action="{{ route('admin.complaints.update', $complaint->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <strong> Name :</strong>
                        <input type="text" name="name" value="{{ $complaint->name }}" class="form-control"> <br>

                        <strong> Complaint :</strong>
                        <input type="text" name="complaint" value="{{ $complaint->complaint }}" class="form-control"> <br>

                        <input type="submit" value="Qo`shish">

                    </form>
                    
                </div>

            </div>
        </main>
        <!-- MAIN -->

@endsection
