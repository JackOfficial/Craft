@extends('admin.layouts.app')
@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Services</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin">Home</a></li>
              <li class="breadcrumb-item active">Services</li>
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

            @if (Session::has('deleteServiceSuccess'))
            <div class="alert alert-success alert-dismissible mb-2" style="margin: 5px 5px 0px 5px;">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
          <strong><i class="fas fa-check"></i></strong> {{ Session::get('deleteServiceSuccess') }} </div>
          @elseif(Session::has('deleteServiceFail'))
          <div class="alert alert-danger alert-dismissible mb-2" style="margin: 5px 5px 0px 5px;">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> 
          <strong>FAILED:</strong> {{ Session::get('deleteServiceFail') }} </div> 
            @endif

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">{{ $servicesCounter }} Services</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Category</th>
                     <th>Service ID</th>
                    <th>Service</th>
                    <th>Rate Per 1000</th>
                    <th>Min Order</th>
                    <th>Max Order</th>
                    <th>Average Completition Time</th>
                    <th>Start</th>
                    <th>Speed</th>
                    <th>Quality</th>
                    <th>Refill</th>
                    <th>Description</th>
                    <th>Created_at</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                 
                   @foreach ($services as $service)
                   <tr> 
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $service->id }}
                    <livewire:admin.mention-component :serviceID="$service->id" :status="$service->status" />
                    </td>
                    <td>{{ $service->category }}</td>
                     <td>{{ $service->serviceId }}</td>
                    <td>{{ $service->service }}</td>
                    <td>{{ $service->rate_per_1000 }}</td>
                    <td>{{ $service->min_order }}</td>
                    <td>{{ $service->max_order }}</td>
                    <td>{{ $service->Average_completion_time }}</td>
                    <td>{{ $service->start }}</td>
                    <td>{{ $service->speed }}</td>
                    <td>{{ $service->quality }}</td>
                    <td>{{ $service->refill }}</td>
                    <td>{!! $service->description !!}</td>
                    <td>{{ $service->created_at }}</td>
                    <td>
                        <form method="POST" action="{{ route('service.destroy', $service->id) }}">
                          @csrf
                            @method('DELETE')
                            <a class="btn btn-success" href="{{ route('service.edit', $service->id) }}"><i class="fa fa-edit"></i> Edit</a>&nbsp;
                            @if($service->status == 1)
                            <a class="btn btn-warning" href="{{ route('service.show', $service->id) }}"><i class="fa fa-times"></i> Disable</a>&nbsp;
                            @else
                            <a class="btn btn-warning" href="{{ route('service.show', $service->id) }}"><i class="fa fa-check"></i> Enable</a>&nbsp;
                            @endif
                            
                           <button type="submit" class="btn btn-danger"><span><i class="fa fa-trash"></i></span> Delete</button>
                        </form>

<div class="form-group d-none">
<div class="custom-control custom-switch">
<input type="checkbox" class="custom-control-input" id="customSwitch1">
<label class="custom-control-label" for="customSwitch1">Disable</label>
</div>
</div>

                        </td>
                  </tr>   
                   @endforeach 
    
                  
              
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Category</th>
                     <th>Service ID</th>
                    <th>Service</th>
                    <th>Rate Per 1000</th>
                    <th>Min Order</th>
                    <th>Max Order</th>
                    <th>Average Completition Time</th>
                    <th>Start</th>
                    <th>Speed</th>
                    <th>Quality</th>
                    <th>Refill</th>
                    <th>Description</th>
                    <th>Created_at</th>
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