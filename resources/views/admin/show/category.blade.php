@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Add Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <img alt="African Painting" class="img img-responsive w-100" src="/storage/{{ $category->photo }}" />
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12 col-12">
            <h3>{{ $category->category }}</h3>
            <p>{{ $category->description != null ? $category->description : 'No description to show' }}</p>
            <a class="btn btn-success rounded-pill" href="{{ route('admin.product-categories.edit', $category->id) }}"><span><i class="fa fa-edit"></i> Change</span></a>
        </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection