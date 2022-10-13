@extends('layouts.app')

@section('title', 'Create Table')

@section('content')
    <div class="container-fluid col-md-5 col-md-offset" style="padding:5px 0;">
        <div class="card mt-5">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <legend class="text-center fw-bolder text-primary">Edit Table</legend>
                    @if(session('status'))
                        <div class="alert alert-success pt-1 pb-1 text-center rounded-0">{{session('status')}}</div>
                    @endif

                    <input type="number" hidden name="user_id" value="{{ auth()->user()->getAuthIdentifier() }}">                    

                    <div class="row mb-3">
                        <label for="tag" class="col-md-4 color-one col-form-label text-md-end">{{ __('Tags ( Optional )') }}</label>
                        <div class="col-md-6">
                            <input id="tag" type="text" placeholder="Enter Tags" class="form-control shadow-sm @error('tag') is-invalid @enderror" 
                            name="tag" value="{{ $data->tag ?? '' }}" autocomplete="tag" autofocus>
                            
                            @error('tag')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label color-one text-md-end">
                                {{ __('Upload Table') }}<b class="text-danger"> * </b>
                            </label>

                            <div class="col-md-6">
                                <input id="image" type="file" accept="image/*" required
                                       class="form-control shadow-sm @error('image') is-invalid @enderror" name="image"
                                       value="{{ old('image') }}">

                                @error('image')
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

