@extends('layouts.app')

@section('content')
<div class="row justify-content-center g-0">
        <div class="col-md-5 mx-auto">
            <div class="card rounded-0">
                <div class="card-header bg-dark text-white-50 rounded-0">{{ __('DELETE USER') }}</div>

                <div class="card-body text-center">
                    <h5 class="card-title text-danger">Are u sure!</h5>
                    <p class="card-text text-danger">'Permanently delete user <strong>{{ $user->email }}</strong> </p>
                    <a href="{{ route('user') }}" class="btn btn-light m-1">
                        {{ __('Cancel') }}
                    </a>
                    <a href="{{ route('user.destroy', ['user'=>$user]) }}" class="btn btn-danger m-1">
                        {{ __('Confirm') }}
                    </a>
                </div>
            </div>
        </div>
</div>
@endsection
