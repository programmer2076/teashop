@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="card">
                <div class="card-header text-dark fw-bolder">{{ __('Home - ') }} 
                    <b class="text-danger">Mi Mi Tea & Food</b>
                    <span>{{ isset($totalAmount) ? $totalAmount : 0 }}Ks</span>
                </div>

                <div class="card-body my-3">
                    <div class="row row-cols-1 row-cols-md-5 g-4">
                        @if($dataLists !== null)
                            @foreach($dataLists as $data)
                            <div class="col position-relative">
                                <div class="card h-100">
                                    <img src="{{ url('/images/menu/'.$data->menu->image) }}"  
                                    class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $data->menu->name }}</h5>
                                        <h6 class="card-subtitle table-subtitle mb-2"> 
                                            <small>Price - {{ $data->menu->price / 100 }}Ks</small>
                                        </h6>                                    
                                    </div>
                                </div>
                            </div> 
                            @endforeach
                        @else
                            <p>Empty Data</p>
                        @endif
                    </div>
                </div>

                <div class="card-footer d-grid gap-2 col-6 mx-auto">
                    <a href="{{ route('checkout') }}" class="btn btn-primary" type="button">CheckOut</a>
                    <!-- <a
                        class="btn btn-primary btn-sm">
                        Select</a> -->
                </div>

            </div>
        </div>
    </div>
</div>
@endsection



