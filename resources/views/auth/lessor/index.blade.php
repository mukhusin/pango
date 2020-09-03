@extends('layouts.users')
@section('content')
<x-header />
<x-asidebar />
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Pango Lessor Panel</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="/admin">Home</a></li> --}}
              <li class="breadcrumb-item active">Home</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <x-lessors-component />

    <div class="modal fade" id="LessorPropertyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xlg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Properties</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body table-responsive">
            <table class="table table-stripped table-hover">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Licence</th>
                  <th>Total Apartment</th>
                  <th>Contract Date</th>
                  <th>Abbriviation</th>
                  <th></th>
                </tr>
              </thead>
              {{-- id 	owner_id 	name 	address 	licence 	contract_date 	apartment_num 	abbriviation  --}}
               <tbody>
                 <?php 
                      $id = \App\Lessor::where('user_id',Auth::user()->id)->first();
                  ?>
                  @foreach (\App\Property::where('owner_id',$id->id)->get() as $item)
                        <tr>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->address }}</td>
                          <td>{{ $item->licence }}</td>
                          <td>{{ $item->apartment_num }}</td>
                          <td>{{ $item->contract_date }}</td>
                          <td>{{ $item->abbriviation }}</td>
                          <td><a href="/apartment-page" class="btn btn-primary btn-sm">Apartments</a></td>
                        </tr>
                  @endforeach
               </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection