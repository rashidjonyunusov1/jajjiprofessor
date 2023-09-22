@extends('admin.layouts.main')


@section('content')

<!-- MAIN -->
<main>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Show</h3>
                <a class="create__btn" href="{{ route('admin.humans.index') }}"></i>Back</a>
            </div>
            <table>
                <tr>
                    <td>ID</td>
                    <td>{{ $human->id }}</td>
                </tr>
                <tr>
                    <td>Name</td>
                    <td>{{ $human->name }}</td>
                </tr>
                <tr>
                    <td>Numbers:</td>
                    
                        <td>
                            @foreach($human->numbers as $item)    
                                {{ $item->number }} <br>
                            @endforeach                    
                        </td>
                    
                </tr>
            </table>
        </div>

    </div>
</main>
<!-- MAIN -->

@endsection
