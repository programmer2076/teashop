@extends('layouts.app')

@section('content')
    <div class="row justify-content-center g-0">
                
        <div class="list-group col-md-5">
            @if(session('warning'))
                <div class="cart-footer text-center text-danger m-3"> {{ session('warning') }} </div>
            @endif
            <a class="list-group-item list-group-item-action active shadow rounded-0" aria-current="true">
                <div class="text-md-center">
                    <h5 class="mb-1 fw-bolder">USERS</h5>
                </div>
            </a>
            @foreach($users as $user)
                <a href="{{ route('user.edit', ['user'=>$user]) }}" 
                class="list-group-item list-group-item-action list-group-item-dark rounded-0">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1 color-three fw-bolder">{{ $user->name }}</h5>
                        
                        @if($user->hasRole('admin'))
                            <small class="text-success">Admin</small>
                        @endif
                        <!-- <small class="text-muted">{{ $user->created_at->diffForHumans() }}</small> -->
                    </div>
                    <p class="mb-1 color-four">{{ $user->email }}</p>
                </a>
            @endforeach
        </div>   
    </div>
@endsection