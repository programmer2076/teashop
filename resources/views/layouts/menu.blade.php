<!-- Menu Modal -->
<div class="modal fade" id="menuModal" tabindex="-1" aria-labelledby="menuModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="menuModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <div class="row row-cols-1 row-cols-md-5 g-4">
                @foreach($menuLists as $data)
                <div onmouseover="showMenuSelect( {{$data->id}} )" onmouseout="hideMenuSelect( {{$data->id}} )" 
                    class="col position-relative">
                    <div id="menu{{$data->id}}" class="card h-100">
                        <img src="{{ url('/images/menu/'.$data->image) }}"  
                        class="card-img-top" alt="...">
                        <div id="menuBody{{$data->id}}" class="card-body">
                            <h5 class="card-title position-relative">{{ $data->name }}
                            @if($data->promote)
                                <small><span class="badge bg-danger rounded-pill
                                position-absolute top-0 start-100 translate-middle">
                                New
                                </span></small>
                            @endif
                            </h5>
                            
                            <h6 id="subtitleMenu{{$data->id}}" class="card-subtitle table-subtitle mb-2"> 
                                <small>Price - {{ $data->price }}</small>
                            </h6>
                            <p class="card-text">
                                <small>{{ $data->description }}</small>
                            </p>
                            @hasrole('admin')
                            <a href="{{ route('table.edit', ['desk' => $data]) }}" class="card-link">Edit</a>
                            <a href="#" class="card-link">Delete</a>
                            @endhasrole
                            <a id="m{{$data->id}}" 
                                class="btn btn-primary choose-table btn-sm position-absolute bottom-0 end-0"
                                style="border-radius: 0 0 4px;">
                                Select</a>
                        </div>
                    </div>
                </div> 
                @endforeach
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>