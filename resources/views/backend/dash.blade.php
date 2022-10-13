@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header fw-bolder">{{ __('Dashboard') }}</div>

                <div class="card-body border my-3">
                    <h5 class="card-title fw-bolder">User & Role</h5>
                    <a href="{{ route('user') }}" class="card-link fw-bolder ">User</a>
                    <a href="{{ route('role') }}" class="card-link fw-bolder ">Role</a>
                    <a href="{{ route('role.create') }}" class="card-link fw-bolder ">Create Role</a>
                </div>

                <div class="card-body border my-3">
                    <h5 class="card-title fw-bolder">Table</h5>
                    <a href="{{ route('desk') }}" class="card-link fw-bolder ">Table</a>
                    <a href="{{ route('desk.create') }}" class="card-link fw-bolder">Create Table</a>
                    <!-- <ul class="list-group list-group-flush text-center">
                        <li class="list-group-item">
                            <a href="#" class="card-link">Another link</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="card-link">Another link</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="card-link">Another link</a>
                        </li>
                        <li class="list-group-item">
                            <a href="#" class="card-link">Another link</a>
                        </li>
                    </ul> -->
                </div>

                <div class="card-body border my-3">
                    <h5 class="card-title fw-bolder">Category</h5>
                    <a href="{{ route('category') }}" class="card-link fw-bolder">Category</a>
                    <a href="{{ route('category.create') }}" class="card-link fw-bolder">Create Table</a>
                </div>
                <div class="card-body border my-3">
                    <h5 class="card-title fw-bolder">Menu</h5>
                    <a href="{{ route('menu') }}" class="card-link fw-bolder">Menu</a>
                    <a href="{{ route('menu.create') }}" class="card-link fw-bolder">Create Menu</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
