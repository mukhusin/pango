 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h3 class="card-title">Current registered Property</h3>
              <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addLessor">Add new Property</button>
            </div>
            <!-- /.card-header -->
            {{-- name 	phone 	address 	nida 	created_at --}}
            <div class="card-body">
                <table style="width: 100%;" id="example" class="table table-hover table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Owner</th>
                        <th>Licence</th>
                        <th>Contract Date</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                       @foreach ($property as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td>{{\App\CompanyOwner::find($item->owner_id)->name}}</td>
                                <td>{{ $item->licence }}</td>
                                <td>{{ $item->contract_date }}</td>
                                <td>
                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#moreDetails{{ $item->id }}">More</button>
                                    <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editProperty{{ $item->id }}">Edit</button>
                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#moreDetails{{ $item->id }}">Block</button>
                                    <button class="btn btn-sm btn-danger" title="Delete {{$item->abbriviation}}" data-toggle="modal" data-target="#moreDetails{{ $item->id }}">X</button>
                                </td>
                            </tr>
                            <!-- The Modal -->
                       
                       @endforeach
                    
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Owner</th>
                        <th>Licence</th>
                        <th>Contract Date</th>
                        <th></th>
                    </tr>
                    </tfoot>
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
    @foreach ($property as $item)
    <div class="modal fade" id="editProperty{{ $item->id }}">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Edit property</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                <form id="update-property{{$item->id}}" action="">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" value="{{ $item->name }}" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Abbrivation:</label>
                        <input type="text" class="form-control" value="{{$item->abbriviation}}" name="abbriviation" id="abbriviation" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Number of Apartments:</label>
                        <input type="number" min="0" value="{{ $item->apartment_num }}" name="apartment"  class="form-control" id="apartment" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Address:</label>
                        <input type="text" name="address" value="{{$item->address}}" class="form-control" id="address" required>
                    </div>
                    <div class="form-group">
                        <label for="sel1">Select Owner:</label>
                        <select name="owner_id" class="form-control" id="sel1">
                            <div style="max-height: 200px">
                                <option value="{{$item->owner_id}}">{{\App\CompanyOwner::find($item->owner_id)->name}}</option>
                                @foreach(\App\CompanyOwner::all() as $value)
                                    <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                            </div>
                        </select>
                    </div> 
                    <div class="form-group">
                    <label for="sel1">Licence Interval:</label>
                    <select class="form-control" id="sel1">
                        <option>{{ $item->licence }}</option>
                        <option>1 Months</option>
                        <option>3 Months</option>
                        <option>6 Months</option>
                        <option>1 year</option>
                    </select>
                    </div> 
                    <div class="form-group">
                    <label for="phone">Contact Date:</label>
                    <input type="date" value="{{ $item->contract_date }}" name="contract_date"  class="form-control" id="contact_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary update_property_btn" update_id={{$item->id}} >Save Changes</button>
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
<div class="modal fade" id="addProperty">
    <div class="modal-dialog">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Add property</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body">
                <form id="add-property" method="POST" action="{{ route('addProperty') }}">
                    @csrf
                   <div class="form-group">
                     <label for="name">Name:</label>
                     <input type="text" class="form-control" name="name" id="name" required>
                   </div>
                   <div class="form-group">
                    <label for="name">Abbrivation:</label>
                    <input type="text" class="form-control" name="abbriviation" id="abbriviation" required>
                  </div>
                   <div class="form-group">
                     <label for="phone">Number of Apartments:</label>
                     <input type="number" min="0" name="apartment"  class="form-control" id="apartment" required>
                   </div>
                   <div class="form-group">
                    <label for="phone">Address:</label>
                    <input type="text" name="address"  class="form-control" id="address" required>
                  </div>
                   <div class="form-group">
                        <label for="sel1">Select Owner:</label>
                        <select name="owner_id" class="form-control" id="sel1">
                           <div style="max-height: 200px; overflow: auto">
                                  <option value=""> -------Select Owner------ </option>
                                @foreach(\App\CompanyOwner::all() as $value)
                                   <option value="{{$value->id}}">{{$value->name}}</option>
                                @endforeach
                           </div>
                        </select>
                  </div> 
                  <div class="form-group">
                    <label for="sel1">Licence Interval:</label>
                    <select name="licence" class="form-control" id="sel1">
                      <option>1 Month</option>
                      <option>3 Months</option>
                      <option>6 Months</option>
                      <option>1 year</option>
                    </select>
                  </div> 
                  <div class="form-group">
                    <label for="phone">Contact Date:</label>
                    <input type="date" name="contract_date"  class="form-control" id="contact_date" required>
                  </div>
                   <div class="row" id="message"></div>
                   <button type="submit" id="add-property_btn" class="btn btn-primary">Add Property</button>
               </form> 
            </div>
    
            <!-- Modal footer -->
            <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>   
        </div>
    </div>
</div>

@foreach($property as $item)
<div class="modal" id="moreDetails{{ $item->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
    
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Properties More Details</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
    
            <!-- Modal body -->
            <div class="modal-body table-responsive">
                 <table class="table table-striped table-hover">
                   
                     <tbody>
                         <tr><td><b>Name: </b></td><td>{{ $item->name }}</td></tr>
                         <tr><td><b>Abbriviation: </b></td><td>{{ $item->abbriviation }}</td></tr>
                         <tr><td><b>Chairman: </b></td><td>{{\App\CompanyOwner::find($item->owner_id)->name}}</td></tr>
                         <tr><td><b>Address: </b></td><td>{{ $item->address }}</td></tr>
                         <tr><td><b>Total Apartments: </b></td><td>{{ $item->apartment_num }}</td></tr>
                         <tr><td><b>Licence Type: </b></td><td>{{ $item->licence }}</td></tr>
                         <tr><td><b>Contract date: </b></td><td>{{ $item->contract_date }}</td></tr>
                         <tr><td><b>Registered at: </b></td><td>{{ $item->created_at }}</td></tr>
                         <tr><td><b>Updated at: </b></td><td>{{ $item->updated_at }}</td></tr>
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