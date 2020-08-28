 <!-- Main content -->
 <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
              <h3 class="card-title">Current registered Lessors</h3>
              <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addLessor">Add new Lessor</button>
            </div>
            <!-- /.card-header -->
            {{-- name 	phone 	address 	nida 	created_at --}}
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>NID</th>
                        <th>Registered at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                 <tbody>
                      @foreach ($lessors as $item)
                          <tr>
                              <td>{{$item->name}}</td>
                              <td>{{$item->phone}}</td>
                              <td>{{$item->address}}</td>
                              <td>{{$item->nida}}</td>
                              <td>{{$item->created_at}}</td>
                              <td>
                                  <button title="Edit details" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editDetails{{ $item->id }}"><i class="fas fa-edit"></i></button>
                                  <button title="Deactivate" class="btn btn-sm btn-warning"><i class="fas fa-lock"></i></button>
                                  <button title="Delete" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                              </td>
                          </tr>
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
    @foreach ($lessors as $item)
        <div class="modal fade" id="editDetails{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
            
                    <!-- Modal Header -->
                    <div class="modal-header">
                    <h4 class="modal-title">Edit property Chairman</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
            
                    <!-- Modal body -->
                    <div class="modal-body">
                    <form id="update-owner{{$item->id}}" action="">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input name="name" type="text" class="form-control" value="{{ $item->name }}" id="name">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input name="phone" type="number" min="0" value="{{ $item->phone }}" class="form-control" id="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Address:</label>
                            <input name="address" type="text" min="0" value="{{ $item->address }}" class="form-control" id="address" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">NIDA:</label>
                            <input hidden name="id" value="{{ $item->id }}" type="text">
                            <input name="nida" type="text" min="0" value="{{ $item->nida }}" class="form-control" id="nida" required>
                        </div>
                        <button type="submit" class="btn btn-primary update_owner_btn" update_id={{$item->id}} >Save Changes</button>
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
    <div class="modal fade" id="addLessor">
        <div class="modal-dialog">
            <div class="modal-content">
        
                <!-- Modal Header -->
                <div class="modal-header">
                <h4 class="modal-title">Register Lessor</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
        
                <!-- Modal body -->
                <div class="modal-body">
                    <form id="add-lessor" method="POST" action="{{ route('addLessor') }}">
                        @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="number" min="0" name="phone"  class="form-control" id="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Address:</label>
                        <input type="text" min="0" name="address" class="form-control" id="address" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">NID:</label>
                        <input type="text" name="nida" class="form-control" id="nida" required>
                    </div>
                    <div class="row" id="message"></div>
                    <button type="submit" id="add-cahair" class="btn btn-primary">Add Lessor</button>
                </form> 
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>   
            </div>
        </div>
    </div>
  </section>
  <!-- /.content -->