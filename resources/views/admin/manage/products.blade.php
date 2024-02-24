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
              <li class="breadcrumb-item active">Products</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <div class="row">
          <div class="col-12">

            @if (Session::has('productSuccess'))
            <div class="alert alert-success alert-dismissible mb-2" style="margin: 5px 5px 0px 5px;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
          <strong><i class="fas fa-check"></i></strong> {{ Session::get('productSuccess') }} </div>
          @elseif(Session::has('productFail'))
          <div class="alert alert-danger alert-dismissible mb-2" style="margin: 5px 5px 0px 5px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
          <strong>FAILED:</strong> {{ Session::get('productFail') }} </div> 
            @endif

            <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-sm mb-2">Add Product</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $productsCounter }} {{ ($productsCounter > 1) ? 'Categories' : 'Category' }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>

                   @forelse ($products as $product)
                   <tr> 
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->category ?? 'No Category' }}</td>
                    <td>
                      <a href="/storage/{{ $product->photo }}">
                        <img alt="{{ $product->product }}" class="img img-responsive thumbnail" style="width: 100px; height: auto;" src="{{ asset('storage/photos/product_photos_thumb/' . $product->photo) }}" />
                    <div class="text-center bg-secondary"><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->product  }}</a></div>  
                    </a>
                    </td>
                    <td>{!! $product->description != null ? Str::limit($product->description, 25) : 'No Description' !!}</td>
                    <td>{{ number_format($product->price) }} RWF</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                      @if($product->status == 1)
                        <span class="badge badge-success">Active</span>
                      @else
                        <span class="badge badge-danger">Disactive</span>
                      @endif
                      </td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}">
                          @csrf
                            @method('DELETE')
                            <a class="btn btn-success btn-sm" href="{{ route('admin.products.edit', $product->id) }}"><i class="fa fa-edit"></i> Edit</a>&nbsp;
                           <button type="submit" class="btn btn-danger btn-sm"><span><i class="fa fa-trash"></i></span> Delete</button>
                        </form>
                        </td>
                  </tr>   
                  @empty
                  <tr> 
                    <td colspan="9" class="text-center py-2">No product to display</td>
                  </tr>   
                   @endforelse
                  
              
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Actions</th>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection