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
            <h1>Pango Admin Panel</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Lessors</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <x-lessor-component />
</div>

@endsection