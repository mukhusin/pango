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
              <li class="breadcrumb-item"><a href="/lessor">Home</a></li>
              <li class="breadcrumb-item active">Apartment</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <x-apartments-component />
</div>

@endsection