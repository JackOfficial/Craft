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
              <li class="breadcrumb-item active">Update Category</li>
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
            <!-- general form elements -->

            @if (Session::has('updateCategorySuccess'))
            <div class="alert alert-success alert-dismissible mb-2" style="margin: 5px 5px 0px 5px;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
          <strong><i class="fas fa-check"></i></strong> {{ Session::get('updateCategorySuccess') }} </div>
          @elseif(Session::has('updateCategoryFail'))
          <div class="alert alert-danger alert-dismissible mb-2" style="margin: 5px 5px 0px 5px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
          <strong>FAILED:</strong> {{ Session::get('updateCategoryFail') }} </div> 
            @endif

           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-plus"></i> Add Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('admin.product-categories.update', $category->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">

                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" value="{{ $category->category }}" class="form-control @error('category') is-invalid @enderror" id="category" name="category" placeholder="Enter Category" required>
                            @error('category')
                            <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                               </span>
                        @enderror  
                        </div>

                        <div class="form-group">
                          <label for="photo">photo</label>
                          <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" name="photo" placeholder="Enter photo" />
                          @error('photo')
                          <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                             </span>
                      @enderror  
                      </div>

                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea rows="4" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Enter description" required>{{ $category->description }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                           </span>
                    @enderror  
                    </div>

                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"><span><i class="fa fa-plus"></i> Add</span></button>
                </div>
              </form>
            </div>
            <!-- /.card -->

          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-12">
            <img alt="African Painting" class="img shadow img-responsive w-100" src="/storage/{{ $category->photo }}" />
          <div class="text-center bg-secondary">{{ $category->category }}</div>
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