{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@push('css')

@endpush
@section('content_header')
    <h1>Add School</h1>
@stop

@section('content')
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap">
            <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Add School</h3>
                    </div>
                    <!-- /.box-header -->
                    {{-- @if($errors->any())
                      @foreach($errors->all() as $errors)
                        
                        <div class="alert alert-danger alert-dismissible">
                                <button class="close" aria-hidden="true" type="button" data-dismiss="alert">×</button>
                                <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                                {{$errors}}
                        </div>
                      @endforeach

                    @endif --}}
                    <div class="box-body">
                        <div class="col-md-6">
                            <form action="{{ route('school.store')}}" enctype="multipart/form-data" method="POST">
                                 <input type="hidden" name="_token" value="{{csrf_token()}}">
                             <div class="form-group">
                                 <label for="category">School Name</label>
                                <input type="text" class="form-control"name="school_name" id="school_name" value="">
                             </div>
                            
                         </div>
                         <div class="col-md-6">
                              
                                 <div class="form-group">
                                     <label for="category">Address</label>
                                    <input type="text" class="form-control"name="address" id="address" value="">
                                 </div>
                            
                                      
                                
                             </div>
                            <div class="col-md-6">

                            <div class="form-group">
                            <label for="category">Phone NO</label>
                            <input type="text" class="form-control"name="phone" id="phone" value="">
                            </div>


                            </div>
                                 <div class="col-md-6">
                                       
                                         <div class="form-group">
                                             <label for="category">Email</label>
                                            <input type="text" class="form-control"name="email" id="email" value="">
                                         </div>
                                    
                                     </div>
                                     <div class="col-md-6">
                                           
                                             <div class="form-group">
                                                 <label for="category">Principal</label>
                                                <input type="text" class="form-control"name="principal" id="principal" value="">
                                             </div>
                                        
                                            
                                         </div>
                                         <div class="col-md-6">
                                              
                                                 <div class="form-group">
                                                     <label for="category">Owner</label>
                                                    <input type="text" class="form-control"name="owner" id="owner" value="">
                                                 </div>
                                            
                                                
                                             </div>
                                             <div class="col-md-6">
                                           
                                                    <div class="form-group">
                                                        <label for="category">Image</label>
                                                        <input type="file" class="form-control" name="image">
                                                    {{-- <img src="{{URL::asset('storage/admin/school/school.png')}}" height="30px" width="30px"> --}}
                                                    </div>
                                               
                                                   
                                                </div>
                                           
                             <div class="row">
                                    <div class="col-md-6">
                                    <input type="submit" value="Save" class="btn btn-success">
                                    </div>
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