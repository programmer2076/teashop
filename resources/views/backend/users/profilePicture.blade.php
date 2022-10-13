@extends('layouts.app')

@section('title', 'Profile Picture')

@section('content')
    <div class="container-fluid col-md-6 col-md-offset" style="padding:5px 0;">
        <!-- Gallery -->
        <div class="d-flex justify-content-center pt-2 pb-2">
            <a href="{{ route('prop.create') }}" type="button" 
                class="btn btn-outline-dark btn-block">
                Upload Profile Picture
            </a>
        </div>
        <div class="row border bg-dark">
            @foreach($props as $prop)
            <div class="col-md-2 mt-2 mb-2">
                <img
                src="{{ url('/images/profile/'.$prop->u_number.'/'.$prop->image) }}"
                class="w-100 shadow-1-strong rounded-0"
                alt="Boat on Calm Water"
                />
            </div>
            @endforeach

        </div>
        <!-- Gallery -->
    </div>
@endsection

