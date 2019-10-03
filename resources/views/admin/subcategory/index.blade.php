{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@push('css')

@endpush
@section('content_header')
    <h1>Category <a href="{{route('subcategory.create')}}" class="btn btn-success">Create</a></h1>
@stop

@section('content')
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>
                    <!-- /.box-header -->
                  
                    <div class="box-body">
                       
                        <table id="example1" class="table table-hover responsive">
                            <thead>
                                <th>NO</th>
                                <th>Name</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach($subcategory as $key =>$value)
                            <td>{{$key + 1}}</td>
                            <td>{{$value->name}}</td>
                                <td>
                                <button class="btn btn-primary">View</button>
                                <a href="{{route('category.edit',$value->id)}}" class="btn btn-success">Edit</a>
                                <button class="btn btn-danger">Delete</button>
                            </td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
        
   
       
@endsection



@push('js')
    <script>

        $(document).ready(function() {
            $('#example1').DataTable();
        } );

    </script>


@endpush