{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@push('css')

@endpush
@section('content_header')
    <h1>Category</h1>
@stop

@section('content')
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap">
            <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>
                    <!-- /.box-header -->
                    @if($errors->any())
                    @foreach($errors->all() as $errors)
                        
                        <div class="alert alert-danger alert-dismissible">
                                <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
                                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                {{$errors}}
                              </div>
                    @endforeach

                    @endif
                    <div class="box-body">
                        <div class="col-md-6">
                    <form action="{{ route('category.store')}}" enctype="multipart/form-data" method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                            <label>Select</label>
                            <select class="form-control">
                              <option>option 1</option>
                              <option>option 2</option>
                              <option>option 3</option>
                              <option>option 4</option>
                              <option>option 5</option>
                            </select>
                          </div>
                        <div class="form-group">
                            <label for="category">Category Name</label>
                        <input type="text" class="form-control"name="categoryname" id="category" value="">
                        </div>
                        <input type="submit" value="Save" class="btn btn-success">
                    </div>
                           
                        </form>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
            
        
   
       
@endsection



@push('js')
@endpush