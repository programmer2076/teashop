@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header fw-bolder">{{ __('Table') }}</div>

                <div class="card-body">
                <div class="row row-cols-1 row-cols-md-5 g-4">
                        @foreach($dataLists as $data)
                        <div class="col">
                            <div class="card h-100">
                            <img src="{{ url('/images/desk/'.$data->image) }}"  
                            class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Table {{ $data->id }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $data->tag ?? '' }}</h6>
                                <a href="{{ route('table.edit', ['desk' => $data]) }}" class="card-link">Edit</a>
                                <a href="#" class="card-link">Delete</a>
                            </div>
                            </div>
                        </div> 
                        @endforeach
                       
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
