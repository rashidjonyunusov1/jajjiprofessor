@extends('admin.layouts.main')


@section('content')

<!-- MAIN -->
<main>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Show</h3>
                <a class="create__btn" href="{{ route('admin.complaints.index') }}"></i>Back</a>
            </div>
            <table>
                <tr>
                    <td>Name</td>
                    <td>{{ $complaint->name}}</td>
                </tr>
                <tr>
                    <td>Complaint</td>
                    <td>{{ $complaint->complaint }}</td>
                </tr>
                <tr>
                    <td>Time</td>
                    <td>{{ $complaint->create_at }}</td>
                </tr>
            </table>
        </div>

    </div>
</main>
<!-- MAIN -->

@endsection
