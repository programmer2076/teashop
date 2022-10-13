@extends('layouts.app')

@section('title', 'Create Table')

@section('content')
    <div class="container-fluid col-md-4 col-md-offset" style="padding:5px 0;">
        <div class="card mt-5">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <legend class="text-center fw-bolder text-primary">Create Category</legend>
                    @if(session('status'))
                        <div class="alert alert-success pt-1 pb-1 text-center rounded-0">{{session('status')}}</div>
                    @endif

                    <input type="number" hidden name="user_id" value="{{ auth()->user()->getAuthIdentifier() }}">                    

                    <div class="row mb-3">
                        <label for="name" class="col-md-4 color-one col-form-label text-md-end">{{ __('names *') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" placeholder="Enter names" class="form-control shadow-sm @error('name') is-invalid @enderror" 
                            name="name" value="{{ old('name') }}" autocomplete="name" autofocus required>
                            
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-primary">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

