@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <div class="card">
                <div class="card-header text-dark text-center fw-bolder">
                    <span class="text-success">Order Successfully</span>
                </div>

                @if($dataLists != null)
                <div class="card-body my-3">
                    <div class="d-flex justify-content-end mb-4">
                        <a class="btn btn-primary" href="{{ route('report') }}">Export to PDF</a>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Item</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dataLists as $data)
                            <tr>
                                <th scope="row">{{ $data->id }}</th>
                                <td>{{ $data->menu->name }}</td>
                                <td>{{ $data->menu->price / 100 }}</td>
                                <td>{{ $data->created_at->format("Y-m-d") }}</td>
                            </tr>
                            @endforeach 
                        </tbody>
                        <tfoot>
                        <td class="fw-bolder">Total Amount </td>
                                <td> - </td>
                                <td class="fw-bolder">{{ $totalAmount }} Ks</td>
                        </tfoot>
                    </table>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection



