@extends('layouts.app')

@section('content')
    <div class="row justify-content-center g-0">
        <div class="list-group text-center col-md-5 mx-auto bg-info g-0">
            <a class="list-group-item list-group-item-action text-danger 
            fw-bolder list-group-item-primary rounded-0 shadow-lg" 
            href="{{ route('role.create') }}">CREATE ROLE</a>
            @if(count($roles))
                @foreach($roles as $role)
                    <a href="{{ route('role.edit', ['role'=>$role]) }}" title="click to edit" 
                    class="list-group-item list-group-item-action list-group-item-danger rounded-0">
                            {{ strtoupper($role->name) }}
                    </a>                                              
                @endforeach                        
            @endif
        </div>
    </div>
@endsection