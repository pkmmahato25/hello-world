@extends('adminlte::page')

@section('title', 'Student')
@push('css')
{{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"> --}}
<style>
   td img { display: block; }
   table {
        width: 800px;
        margin: 0 auto;
    }
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
                <div class="text-right">
                    <a href="{{route('student.create')}}" class="btn btn-success align-right">Add New</a>
                    </div>
            </div>
            <!-- /.box-header -->
           
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                  <div class="  card-body table-responsive p-0">
                      <table id="table" class="table table-hover">
                        <thead class="danger">
                        <tr>
                            <th>Action</th>
                            <th>No</th>
                            <th>Name</th>
                            <th>School</th>
                            <th>ID Number</th>
                            <th>Effective Date</th>
                            <th>Name Thar</th>
                            <th>Section</th>
                            <th>Class</th>
                            <th>Roll No</th>
                            <th>Admission Date </th>
                            <th>Nepali Date </th>
                            <th>English Date</th>
                            <th>Age</th>
                            <th>Sex</th>
                            <th>Student Type</th>
                            <th>Religion</th>
                            <th>Monther Tongue</th>
                            <th>Caste Detail</th>
                            <th>Father Name</th>
                            <th>Mother Name</th>
                            <th>Grandfather Name</th>
                            <th>Guardian Name</th>
                            <th>Zone</th>
                            <th>Village Town</th>
                            <th>District</th>
                            <th>Ward</th>
                            <th>Temporary Address</th>
                            <th>Contact Number</th>
                            <th>Remarks</th>
                            <th>Image </th>
                            <th>Action</th>
                            <th>Image </th>
                           
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($student as $key=>$value)
                            <tr>
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
                            <td>{{$key+1}}</td>
                            <td>{{$value->name ?? ""}}</td>
                            <td>{{$value->school ?$value->school->name :""}}</td>
                            <td>{{$value->id_number ?? ""}}</td>
                            <td>{{$value->effective_from ?? ""}}</td>
                            <td>{{$value->thar ?? ""}}</td>
                            <td>{{$value->section_id?? ""}}</td>
                            <td>{{$value->class_id?? ""}}</td>
                            <td>{{$value->roll_no ?? ""}}</td>
                            <td>{{$value->admission_date ?? ""}}</td>
                            <td>{{$value->nepali_date ?? ""}}</td>
                            <td>{{$value->english_date ?? ""}}</td>
                            <td>{{$value->age ?? ""}}</td>
                            <td>{{$value->sex ?? ""}}</td>
                            <td>{{$value->student_type ?? ""}}</td>
                            <td>{{$value->religion ?? ""}}</td>
                            <td>{{$value->mother_tongue ?? ""}}</td>
                            <td>{{$value->caste_detail ?? ""}}</td>
                            <td>{{$value->father_name ?? ""}}</td>
                            <td>{{$value->mother_name ?? ""}}</td>
                            <td>{{$value->grandfather_name ?? ""}}</td>
                            <td>{{$value->guradian_name ?? ""}}</td>
                            <td>{{$value->zone ?? ""}}</td>
                            <td>{{$value->village_town ?? ""}}</td>
                            <td>{{$value->district ?? ""}}</td>
                            <td>{{$value->ward ?? ""}}</td>
                            <td>{{$value->temporary_address ?? ""}}</td>
                            <td>{{$value->contact_number ?? ""}}</td>
                            <td>{{$value->remarks ?? ""}}</td>
                            <td> <img src="{{URL::asset('storage/uploads/student/thumbnails/'.$value->image)}}" class="img-circle thumbnail" alt="" width="120%" ></td>
                            <td>{{$value->created_at ->diffForHumans() ?? ""}}</td>
                            <td>{{$value->updated_at ->diffForHumans() ?? ""}}</td>
                           
                            
                            </tr>
                            @endforeach
                        </tbody>
                      
                
                      </table>
                    
                    </div>
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

{{-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> --}}
    <script>

    $(document).ready(function() {
      var table = $('#table').DataTable( {
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         true,
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
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