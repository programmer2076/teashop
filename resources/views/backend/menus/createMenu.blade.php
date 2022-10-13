@extends('layouts.app')

@section('title', 'Create Table')

@section('content')
    <div class="container-fluid col-md-5 col-md-offset" style="padding:5px 0;">
        <div class="card mt-5">
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    @csrf
                    <legend class="text-center fw-bolder text-primary">Create Menu</legend>
                    @if(session('status'))
                        <div class="alert alert-success pt-1 pb-1 text-center rounded-0">{{session('status')}}</div>
                    @endif

                    <div class="row mb-3">
                        <label for="category_id" class="col-md-4 col-form-label color-one text-md-end">{{ __("Select Category") }}</label>
                        <div class="col-md-6">
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                <option value="" disabled selected>Select Category</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                            <div class="col-md-4"></div>
                        <div class="col-md-6 form-check form-switch mx-3">
                            <input id="promote" type="checkbox" name="promote" 
                            class="form-check-input shadow-sm @error('promote') is-invalid @enderror" >
                            <label for="promote" class="col-md-4 color-one form-check-label text-primary fw-bolder">
                                {{ __('New Menu') }}</label>

                            @error('promote')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 color-one col-form-label text-md-end">{{ __('names *') }}</label>
                        <div class="col-md-6">
                            <input id="name" type="text" placeholder="Enter names" name="name" value="{{ old('name') }}"
                            class="form-control shadow-sm @error('name') is-invalid @enderror" required   autocomplete="name" autofocus>
                            
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                            <label for="description" class="col-md-4 color-one col-form-label text-md-end">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <textarea class="form-control" placeholder="Enter descriptions" 
                                id="description" name="description" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="price" class="col-md-4 col-form-label color-one text-md-end">{{ __("Price") }}</label>

                            <div class="col-md-6">
                                <input id="price" type="number" placeholder="0.01" min="0" step="any" 
                                class="form-control @error('price') is-invalid @enderror" name="price" 
                                value="{{ old('price') }}" required autocomplete="price" autofocus>

                                @error('price')
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

