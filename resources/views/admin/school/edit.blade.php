{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@push('css')

@endpush
@section('content_header')
    <h1>Edit School</h1>
@stop

@section('content')
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap">
            <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Edit School</h3>
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
                            <form action="{{ route('school.update',$school->id)}}" enctype="multipart/form-data" method="POST">
                                 <input type="hidden" name="_token" value="{{csrf_token()}}">
                             <div class="form-group">
                                 <label for="category">School Name</label>
                                <input type="text" class="form-control"name="school_name" id="school_name" value="{{$school->name}}">
                             </div>
                            
                         </div>
                         <div class="col-md-6">
                              
                                 <div class="form-group">
                                     <label for="category">Address</label>
                                    <input type="text" class="form-control"name="address" id="address" value="{{$school->address}}">
                                 </div>
                            
                                      
                                
                             </div>
                            <div class="col-md-6">

                            <div class="form-group">
                            <label for="category">Phone NO</label>
                            <input type="text" class="form-control"name="phone" id="phone" value="{{$school->phone}}">
                            </div>


                            </div>
                                 <div class="col-md-6">
                                       
                                         <div class="form-group">
                                             <label for="category">Email</label>
                                            <input type="text" class="form-control"name="email" id="email" value="{{$school->email}}">
                                         </div>
                                    
                                     </div>
                                     <div class="col-md-6">
                                           
                                             <div class="form-group">
                                                 <label for="category">Principal</label>
                                                <input type="text" class="form-control"name="principal" id="principal" value="{{$school->principal}}">
                                             </div>
                                        
                                            
                                         </div>
                                         <div class="col-md-6">
                                              
                                                 <div class="form-group">
                                                     <label for="category">Owner</label>
                                                    <input type="text" class="form-control"name="owner" id="owner" value="{{$school->owner}}">
                                                 </div>
                                            
                                                
                                             </div>
                                             <div class="col-md-6">
                                           
                                                    <div class="form-group">
                                                        <label for="category">Image</label>
                                                        <input type="file" name="image" class="form-control">
                                                        <img src="{{URL::asset('storage/uploads/school/thumbnails/'.$school->image)}}" class="img-circle thumbnail" alt="" width="20%">
                                                    </div>
                                               
                                                   
                                                </div>
                                                <div class="col-md-6">
                                                     
                                                     
                                                   
                                                       
                                                    </div>
                                           
                             <div class="row">
                                    <div class="col-md-6">
                                    <input type="submit" value="Update" class="btn btn-success">
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