@extends('admin.layouts.app')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Variations</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Variations</li>
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

            @if (Session::has('variationSuccess'))
            <div class="alert alert-success alert-dismissible mb-2" style="margin: 5px 5px 0px 5px;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
          <strong><i class="fas fa-check"></i></strong> {{ Session::get('variationSuccess') }} </div>
          @elseif(Session::has('variationFail'))
          <div class="alert alert-danger alert-dismissible mb-2" style="margin: 5px 5px 0px 5px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
          <strong>FAILED:</strong> {{ Session::get('variationFail') }} </div> 
            @endif

            <a href="{{ route('admin.variations.create') }}" class="btn btn-primary btn-sm mb-2">Add Category</a>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $categoriesCounter }} {{ ($categoriesCounter > 1) ? 'Categories' : 'Category' }}</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>

                   @forelse ($categories as $category)
                   <tr> 
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{ route('admin.product-categories.show', $category->id) }}">{{ $category->category }}</a></td>
                    <td>
                      <a href="/storage/{{ $category->photo }}">
                        <img alt="African Painting" class="img img-responsive thumbnail" style="width: 100px; height: auto;" src="/storage/{{ $category->photo }}" />
                      </a>
                    </td>
                    <td>{{ $category->description != null ? Str::limit($category->description, 25) : 'No Description' }}</td>
                    <td>
                      @if($category->status == 1)
                        <span class="badge badge-success">Active</span>
                      @else
                        <span class="badge badge-danger">Disactive</span>
                      @endif
                      </td>
                    <td>{{ $category->created_at }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td>
                        <form method="POST" action="{{ route('admin.product-categories.destroy', $category->id) }}">
                          @csrf
                            @method('DELETE')
                            <a class="btn btn-success btn-sm" href="{{ route('admin.product-categories.edit', $category->id) }}"><i class="fa fa-edit"></i> Edit</a>&nbsp;
                           <button type="submit" class="btn btn-danger btn-sm"><span><i class="fa fa-trash"></i></span> Delete</button>
                        </form>
                        </td>
                  </tr>   
                  @empty
                  <tr> 
                    <td colspan="6" class="text-center py-2">No category to display</td>
                  </tr>   
                   @endforelse
                  
              
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created at</th>
                    <th>Updated at</th>
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