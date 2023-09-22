@extends('admin.layouts.main')


@section('content')

<!-- MAIN -->
<main>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Show</h3>
                <a class="create__btn" href="{{ route('admin.orders.index') }}"></i>Back</a>
            </div>
            <table>
                <tr>
                    <td>ID</td>
                    <td>{{ $order->id }}</td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td>{{ $order->title }}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{ $order->description }}</td>
                </tr>
                <tr>
                    <td>Category-1</td>
                    <td>{{ $order->categoryone }}</td>
                </tr>
                <tr>
                    <td>Category-2</td>
                    <td>{{ $order->categorytwo }}</td>
                </tr>
                <tr>
                    <td>Category-3</td>
                    <td>{{ $order->categorythree }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $order->name }}</td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>{{ $order->phone }}</td>
                </tr>
                <tr>
                    <td>Class</td>
                    <td>{{ $order->classes }}</td>
                </tr>
            </table>
        </div>

    </div>
</main>
<!-- MAIN -->

@endsection
