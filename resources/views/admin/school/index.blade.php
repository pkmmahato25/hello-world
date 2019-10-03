@extends('adminlte::page')

@section('title', 'Dashboard')
@push('css')
<style>
   td img { display: block; }
    </style>
@endpush
@section('content_header')
    
@stop

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          School Master
        
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
             
            </div>
            <!-- /.box-header -->
            <div class="">
            <a href="{{route('school.create')}}" class="btn btn-success align-right">Add New</a>
            </div>
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone NO</th>
                        <th>Email</th>
                        <th>Principal</th>
                        <th>Owner</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($school as $key=>$value)
                        <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$value->name ?? ""}}</td>
                        <td>{{$value->address ?? ""}}</td>
                        <td>{{$value->phone ?? ""}}</td>
                        <td>{{$value->email ?? ""}}</td>
                        <td>{{$value->principal ?? ""}}</td>
                        <td>{{$value->owner ?? ""}}</td>
                        <td> <img src="{{URL::asset('storage/uploads/school/thumbnails/'.$value->image)}}" class="img-circle thumbnail" alt="" width="20%" ></td>
                        <td>{{$value->created_at ->diffForHumans() ?? ""}}</td>
                        <td>{{$value->updated_at ->diffForHumans() ?? ""}}</td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                
                                <a href="{{ route('school.edit',$value->id) }}" class="edit-model btn btn-warning btn-sm " >
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <button class="delete-model btn btn-danger btn-sm " type="button" onclick="deleteSchool({{ $value->id }})">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                        <form id="delete-form-{{ $value->id }}" action="{{ route('school.destroy',$value->id) }}" method="POST" style="display: none;">
                                                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                      </form>
                                </div>
            
                        </td>
                        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              
              <!-- /.box-body -->

          </div>
          <!-- /.box -->

        
        <!--/.col (right) -->
      </div>
    </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  
  <!-- /.content-wrapper -->
       
@endsection



@push('js')
    <script>

        $(document).ready(function() {
            $('#example1').DataTable();
        } );

    </script>
    <script type="text/javascript">
      function deleteSchool(id) {
       const swalWithBootstrapButtons = Swal.mixin({
      customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
      },
      buttonsStyling: false
    })
    
    swalWithBootstrapButtons.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonText: 'Yes, delete it!',
      cancelButtonText: 'No, cancel!',
      reverseButtons: true
    }).then((result) => {
      if (result.value) {
        event.preventDefault();
          document.getElementById('delete-form-'+id).submit();
          alert(id);
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          'Cancelled',
          'Your imaginary file is safe :)',
          'error'
        )
      }
    })
      }</script>


@endpush