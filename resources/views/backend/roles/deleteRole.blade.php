@extends('layouts.app')

@section('content')
    <div class="row justify-content-center g-0">
        <div class="col-md-5">
            <div class="card bg-three rounded-0">
                <div class="card-header bg-dark rounded-0 text-light text-center">{{ __('DELETE ROLE') }}</div>

                <div class="card-body text-md-center">
                    <h5 class="card-title text-danger">Are u sure!</h5>
                    <p class="card-text text-danger">'Permanently delete this <strong>{{ $role->name }}</strong> role </p>
                    <a href="{{ route('role') }}" class="btn btn-light m-1">
                        {{ __('Cancel') }}
                    </a>
                    <a href="{{ route('role.destroy', ['role'=>$role]) }}" class="btn btn-danger m-1">
                        {{ __('Confirm') }}
                    </a>
                </div>
            </div>
        </div>
    </div>    
@endsection