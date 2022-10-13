@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            
            <div class="card">
                <div class="card-header text-dark fw-bolder">{{ __('Home - ') }} 
                    <b class="text-danger">Mi Mi Tea & Food</b>
                </div>

                <div class="card-body border my-3">
                    <div class="row row-cols-1 row-cols-md-5 g-4">
                        @foreach($dataLists as $data)
                        <div onmouseover="showSelect( {{$data->id}} )" onmouseout="hideSelect( {{$data->id}} )" 
                            class="col position-relative">
                            <div id="table{{$data->id}}" class="card h-100">
                                <img src="{{ url('/images/desk/'.$data->image) }}"  
                                class="card-img-top" alt="...">
                                <div id="tableBody{{$data->id}}" class="card-body">
                                    <h5 class="card-title">Table {{ $data->id }}</h5>
                                    <h6 id="subtitle{{$data->id}}" class="card-subtitle table-subtitle mb-2"> Avaliable </h6>
                                    @hasrole('admin')
                                    <a href="{{ route('table.edit', ['desk' => $data]) }}" class="card-link">Edit</a>
                                    <a href="#" class="card-link">Delete</a>
                                    @endhasrole
                                    <a id="{{$data->id}}" onclick="selectTable({{ $data->id }})" 
                                        class="btn btn-primary choose-table btn-sm position-absolute bottom-0 end-0"
                                        style="border-radius: 0 0 4px;">
                                        Select</a>
                                </div>
                            </div>
                        </div> 
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@include('layouts.menu')
<script>
    window.onload = (event) => {
        selectTable("<?= $currentStack ?>")
  console.log('page is fully loaded');
};
</script>


