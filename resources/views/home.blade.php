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
                        <div id="tableBox{{$data->id}}" onmouseover="showSelect( {{$data->id}} )" onmouseout="hideSelect( {{$data->id}} )" 
                            class="col position-relative table-box">
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
        var currentStack = `<?= $currentStack ?>`
        selectTable(currentStack)
        var stacks = `<?= $stacks ?>`
        var trickyStacks = JSON.parse(stacks)
        const tableLists = [];
        for(var i = 0; i < trickyStacks.length; i++){
            if(trickyStacks[i].desk_id != currentStack){
                tableLists.push(trickyStacks[i].desk_id)
            }
        } 
        var trickyStacks = undefined;

        for(var i in tableLists){
            readTable(tableLists[i])
        }
        function readTable(id){
            console.log(`Table is ${id}`)
            document.getElementById("table"+id).style.border='1px solid red'
                document.getElementById("subtitle"+id).innerHTML="Selected"
                document.getElementById("subtitle"+id).classList.add("text-muted")
                const tableBody = document.getElementById("tableBody"+id)
                tableBody.removeChild(tableBody.lastElementChild)
                const tableBox = document.getElementById("tableBox"+id)
                tableBox.removeAttribute("onmouseover")
                tableBox.removeAttribute("onmouseout")
        }
};
</script>


