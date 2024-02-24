@extends('admin.layouts.app')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Add Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <!-- general form elements -->

        <div class="row">
 <div class="col-md-6">

            @if (Session::has('addServiceSuccess'))
            <div class="alert alert-success alert-dismissible mb-2" style="margin: 5px 5px 0px 5px;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
          <strong><i class="fas fa-check"></i></strong> {{ Session::get('addServiceSuccess') }} </div>
          @elseif(Session::has('addServiceFail'))
          <div class="alert alert-danger alert-dismissible mb-2" style="margin: 5px 5px 0px 5px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
          <strong>FAILED:</strong> {{ Session::get('addServiceFail') }} </div> 
            @endif

           <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title"><i class="fa fa-plus"></i> Add Service</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                @csrf
               
                <div class="card-body">
              <div class="row">
<div class="col-md-12">
  <div class="form-group">
    <label for="category">Category</label>
    <select name="category" class="form-control @error('category') is-invalid @enderror" required>
     @foreach ($categories as $category)
     <option value="{{ $category->id }}">{{ $category->category }}</option>    
     @endforeach
   </select>
   @error('category')
                   <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                      </span>
               @enderror 
 </div>

 <div class="form-group">
    <label for="product">Product name</label>
    <input type="text" value="{{ old('product') }}" class="form-control @error('product') is-invalid @enderror" id="product" name="product" placeholder="Enter product name" />
    @error('product')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
       </span>
  @enderror  
  </div>

  <div class="form-group">
    <label for="photo">photo</label>
    <input type="file" multiple class="form-control @error('photo') is-invalid @enderror" accept="image/*" id="photo" name="photo[]" placeholder="Enter photo" required />
    @error('photo')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
       </span>
@enderror  
</div>

<div class="row">
   <div class="col-md-6">
        <div class="form-group">
  <label for="price">Price</label>
  <input type="text" value="{{ old('price') }}" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Enter service ID" />
  @error('price')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
     </span>
@enderror  
</div>
   </div> 
   <div class="col-md-6">
        <div class="form-group">
  <label for="quantity">Quantity</label>
  <input type="text" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" placeholder="Enter Quantity" required />
  @error('quantity')
  <span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
     </span>
@enderror  
</div>
   </div> 
</div>


 

</div>
              </div>

              <div class="row">
                <div class="col-md-12">

                    

                  <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="summernote" class="form-control @error('description') is-invalid @enderror" name="description" value="{{old('description')}}"></textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                       </span>
                @enderror
                </div>    
                </div>
              </div>
            
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-warning"><span><i class="fa fa-plus"></i> Add</span></button>
                </div>
              </form>
            </div>
            <!-- /.card -->

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