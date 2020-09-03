 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h3 class="card-title">Current registered Property</h3>
              <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addProperty">Add new Property</button>
            </div>
            <!-- /.card-header -->
            {{-- company_id 	name 	location 	currency 	price  --}}
            <div class="card-body">
                <table style="width: 100%;" id="example1" class="table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Property</th>
                        <th>Name</th>
                        <th>Location</th>
                        <th>Currency</th>
                        <th>Price /<small>month</small></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                       @foreach ($apartments as $item)
                            <tr>
                                <td>{{ \App\Lessor::find($item->company_id)->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->location }}</td>
                                <td>{{ $item->currency }}</td>
                                <td>{{ $item->price }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#moreDetails{{ $item->id }}">More</button>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editApartment{{ $item->id }}">Edit</button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#moreDetails{{ $item->id }}">Block</button>
                                    {{-- <button class="btn btn-sm btn-danger" title="Delete {{$item->abbriviation}}" data-toggle="modal" data-target="#moreDetails{{ $item->id }}">X</button> --}}
                                </td>
                            </tr>
                            <!-- The Modal -->
                       
                       @endforeach
                    
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    @foreach ($apartments as $item)
        <div class="modal fade" id="editApartment{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
            
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Edit Apartment</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
            
                    <!-- Modal body -->
                    <div class="modal-body">
                    <form id="update-apartment{{$item->id}}" action="">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" value="{{ $item->name }}" class="form-control" name="name" id="name" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Location:</label>
                            <input type="text" class="form-control" value="{{$item->location}}" name="location" id="location" required>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Currency:</label>
                            <select class="form-control" id="sel1">
                                <option>{{ $item->currency }}</option>
                                <option>Tshs</option>
                                <option>USD</option>
                            </select>
                        </div> 
                        <div class="form-group">
                            <label for="phone">Price:</label>
                            <input type="number" min="1000" name="price" value="{{$item->price}}" class="form-control" id="price" required>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Select Property:</label>
                            <select name="owner_id" class="form-control" id="sel1">
                                <div style="max-height: 200px">
                                    <option value="{{$item->company_id}}">{{\App\Property::find($item->company_id)->name}}</option>
                                    @foreach(\App\Property::where('owner_id', Auth::user()->id) as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </div>
                            </select>
                        </div> 
                        <button type="submit" class="btn btn-primary update_apartment_btn" update_id={{$item->id}} >Save Changes</button>
                    </form> 
                    </div>
            
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
            
                </div>
            </div>
        </div>
    @endforeach
    <div class="modal fade" id="addApartment">
        <div class="modal-dialog">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Add Apartment</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <form id="add-property" method="POST" action="{{ route('addApartment') }}">
                        @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Location:</label>
                        <input type="text" class="form-control" name="location" id="location" required>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Currency:</label>
                        <select class="form-control" id="sel1" required>
                            <option>Tshs</option>
                            <option>USD</option>
                        </select>
                    </div> 
                    <div class="form-group">
                        <label for="phone">Price:</label>
                        <input type="number" min="1000" name="price"  class="form-control" id="price" required>
                    </div>
                    <div class="form-group">
                            <label for="sel1">Select Owner:</label>
                            <select name="owner_id" class="form-control" id="sel1">
                            <div style="max-height: 200px; overflow: auto">
                                    <option value=""> -------Select Property------ </option>
                                    @foreach(\App\Property::where('owner_id', Auth::user()->id) as $value)
                                       <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                            </div>
                            </select>
                    </div> 
                  
                    <div class="row" id="message"></div>
                    <button type="submit" id="add-apartment_btn" class="btn btn-primary">Add Apartment</button>
                </form> 
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>   
            </div>
        </div>
    </div>

    @foreach($apartments as $item)
        <div class="modal" id="moreDetails{{ $item->id }}">
            <div class="modal-dialog">
                <div class="modal-content">
            
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Apartment More Details</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
            
                    <!-- Modal body -->
                    <div class="modal-body table-responsive">
                        <table class="table table-striped table-hover">
                        
                            <tbody>
                                {{-- company_id 	name 	location 	currency 	price  --}}
                                <tr><td><b>Name: </b></td><td>{{ $item->name }}</td></tr>
                                <tr><td><b>Location: </b></td><td>{{ $item->location }}</td></tr>
                                <tr><td><b>Lessor: </b></td><td>{{\App\Lessor::find(Auth::user()->id)->name}}</td></tr>
                                <tr><td><b>Currency: </b></td><td>{{ $item->currency }}</td></tr>
                                <tr><td><b>Price <small>monthly</small>: </b></td><td>{{ $item->price }}</td></tr>
                                <tr><td><b>Licence Type: </b></td><td>{{ \App\Property::find($item->company_id)->licence }}</td></tr>
                                <tr><td><b>Contract date: </b></td><td>{{ $item->contract_date }}</td></tr>
                                <tr><td><b>Registered at: </b></td><td>{{ $item->created_at }}</td></tr>
                                <tr><td><b>Updated at: </b></td><td>{{ $item->updated_at }}</td></tr>
                                <tr>
                                    <td><b>Lessee: </b></td>
                                    <td>
                                        @if (App\Lessee::where('apartment_id',$item->id)->count() == 1)
                                            @foreach (App\Lessee::where('apartment_id',$item->id)->get as $value)
                                            <b class="text-success">{{ $value->name }}</b>
                                            @endforeach  
                                        @else
                                            <b class="text-indo">Not yet assigned to lessee</b>
                                        @endif
                                    </td>
                               </tr>
                            </tbody>
                        </table>
                    </div>
            
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
            
                </div>
            </div>
        </div>
    @endforeach
  </section>
  <!-- /.content -->