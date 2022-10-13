@extends('layouts.app')

@section('title', 'CREATE PRODUCT')

@section('content')
    <div class="container-fluid col-md-3 col-md-offset" style="padding:5px 0;">
        <div class="card mt-5">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <legend class="text-center fw-bolder text-primary">CREATE Profile Picture</legend>
                    @if(session('status'))
                        <div class="alert alert-success pt-1 pb-1 rounded-0">{{session('status')}}</div>
                    @endif

                    <input type="number" hidden name="user_id" value="{{ auth()->user()->getAuthIdentifier() }}">                    

                    <div class="form-group mb-3">
                        <label for="image" class="text-primary fw-bolder">{{ __('Upload Profile Picture') }}</label>

                        <input id="image" type="file" accept="image/*"
                            class="form-control-file @error('image') is-invalid @enderror" name="image"
                            value="{{ old('image') }}">

                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-outline-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

