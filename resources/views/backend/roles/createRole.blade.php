@extends('layouts.app')

@section('content')
    <div class="row justify-content-center g-0">
        <div class="col-md-5">
            <div class="card bg-three rounded-0">
                <div class="card-header bg-dark rounded-0 text-light text-center"> {{ __('CREATE ROLE') }} </div>

                <div class="card-body">
                    <form method="POST">
                        @csrf

                        @if(session('status'))
                            <div class="alert text-success text-md-center justify-content-center fw-bolder">{{ session('status') }}</div>
                        @endif

                        <input type="number" hidden name="user_id" value="{{ auth()->user()->getAuthIdentifier() }}">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 color-one col-form-label text-md-end">{{ __('Enter Role') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" placeholder="admin" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success br-one">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection