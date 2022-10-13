@extends('layouts.app')

@section('content')
    <div class="row justify-content-center g-0">
        <div class="col-md-5 mb-5">
            <div class="card bg-three rounded-0">
                <div class="card-header bg-dark rounded-0 text-light text-center fw-bolder">{{ __('Edit User') }}</div>

                <div class="card-body">
                    <form method="POST">
                        @csrf

                        @if(session('status'))
                            <div class="text-md-center fw-bolder text-success my-3">{{ session('status') }}</div>
                        @endif

                        <input type="number" hidden name="user_id" readonly value="{{ auth()->user()->getAuthIdentifier() }}">
                        <div class="form-group row mb-4">
                            <label for="name" class="col-md-4 col-form-label color-one text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" 
                                class="form-control shadow-sm color-two @error('name') is-invalid @enderror" 
                                name="name" value="{{ $user->name }}">

                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label for="email" class="col-md-4 col-form-label color-one text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" 
                                class="form-control shadow-sm color-two @error('email') is-invalid @enderror" 
                                name="email" value="{{ $user->email }}" readonly>
                            </div>
                        </div>

                        
                        <div class="form-group row mb-4">
                            <label for="selectRole" class="col-md-4 col-form-label color-one text-md-end">{{ __('Select Roles') }}</label>
                            <div class="col-md-6">
                                <select class="form-control color-two" name="role[]" id="selectRole">
                                    <option class="" value="">none</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}"
                                            @if(in_array($role->name,$user->roles()->pluck('name')->toArray()))
                                                    selected
                                            @endif
                                            >{{$role->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('role')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="mt-2 mb-2 text-end">
                        <a href="{{ route('user.delete', ['user'=>$user]) }}" class="btn btn-danger">
                            {{ __('Delete') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
