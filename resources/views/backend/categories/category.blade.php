@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header fw-bolder">{{ __('Table') }}</div>

                <div class="card-body">
                <ul class="list-group list-group-flush text-center">

                    @foreach($dataLists as $data)
                            <li class="list-group-item my-1 d-flex justify-content-between 
                            align-items-start list-group-item-success">
                                <a class="card-link">{{ $data->name }}</a>
                                <a href="#" class="btn btn-sm btn-primary rounded-0">edit</a>
                            </li>
                        @endforeach
                        </ul> 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
