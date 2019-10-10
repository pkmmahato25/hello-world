{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')
@push('css')

@endpush
@section('content_header')
    <h1>Add Student</h1>
@stop

@section('content')
    <div class="box-body">
        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap">
            <div class="row">
                <div class="col-xs-12">
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Add Student</h3>
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
                            <form action="{{ route('student.store')}}" enctype="multipart/form-data" method="POST">
                                 <input type="hidden" name="_token" value="{{csrf_token()}}">
                             <div class="form-group">
                                 <label for="category">School Name</label>
                                 <select class="form-control m-bot15" name="school_name">
                                      <option value="">Select School</option>
                                       @foreach($school as $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                       @endForeach
                                       
                                     </select>
                               
                             </div>
                            
                         </div>
                         <div class="col-md-6">
                              
                                 <div class="form-group">
                                     <label for="category">ID number</label>
                                    <input type="text" class="form-control"name="id_number" id="id_number" value="">
                                 </div>
                            
                                      
                                
                             </div>
                            <div class="col-md-6">

                            <div class="form-group">
                            <label for="category">Effective Date(DD/MM/YYYY)</label>
                            <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                            <input type="text" class="form-control pull-right" name="effective_date" id="datepicker" value="" >
                        </div>
                            </div>


                            </div>
                                 <div class="col-md-6">
                                       
                                         <div class="form-group">
                                             <label for="category">Name</label>
                                            <input type="text" class="form-control"name="stuname" id="stuname" value="">
                                         </div>
                                    
                                     </div>
                                     <div class="col-md-6">
                                           
                                             <div class="form-group">
                                                 <label for="category">Thar</label>
                                                <input type="text" class="form-control"name="thar" id="thar" value="">
                                             </div>
                                        
                                            
                                         </div>
                                         <div class="col-md-6">
                                              
                                                 <div class="form-group">
                                                     <label for="category">Section</label>
                                                    <input type="text" class="form-control"name="section" id="section" value="">
                                                 </div>
                                            
                                                
                                             </div>
                                             <div class="col-md-6">
                                              
                                                    <div class="form-group">
                                                        <label for="category">Class</label>
                                                       <input type="text" class="form-control"name="class" id="class" value="">
                                                    </div>
                                               
                                                   
                                                </div>
                                                <div class="col-md-6">
                                              
                                                        <div class="form-group">
                                                            <label for="category">Roll No</label>
                                                           <input type="text" class="form-control"name="roll_no" id="roll_no" value="">
                                                        </div>
                                                   
                                                       
                                                    </div>
                                                    <div class="col-md-6">
                                              
                                                            <div class="form-group">
                                                                <label for="category">Admission Date</label>
                                                               <input type="text" class="form-control"name="admission_date" id="admission_date" value="">
                                                            </div>
                                                       
                                                           
                                                        </div>
                                                        <div class="col-md-6">
                                              
                                                                <div class="form-group">
                                                                    <label for="category">Nepali Date</label>
                                                                   <input type="text" class="form-control"name="nepali_date" id="nepali_date" value="">
                                                                </div>
                                                           
                                                               
                                                            </div>
                                                            <div class="col-md-6">
                                              
                                                                    <div class="form-group">
                                                                        <label for="category">Nepali Date</label>
                                                                       <input type="text" class="form-control"name="english_date" id="english_date" value="">
                                                                    </div>
                                                               
                                                                   
                                                                </div>
                                                        <div class="col-md-6">
                                        
                                                                <div class="form-group">
                                                                    <label for="category">Age</label>
                                                                    <input type="text" class="form-control"name="age" id="age" value="">
                                                                </div>
                                                            
                                                                
                                                            </div>
                                                            <div class="col-md-6">
                                        
                                                                    <div class="form-group">
                                                                        <label for="category">Sex</label>
                                                                        <input type="text" class="form-control"name="sex" id="sex" value="">
                                                                    </div>
                                                                
                                                                    
                                                                </div>
                                                                <div class="col-md-6">
                                        
                                                                        <div class="form-group">
                                                                            <label for="category">Student Type</label>
                                                                            <input type="text" class="form-control"name="student_type" id="student_type" value="">
                                                                        </div>
                                                                    
                                                                        
                                                                    </div>
                                                                    <div class="col-md-6">
                                        
                                                                <div class="form-group">
                                                                    <label for="category">Religion</label>
                                                                    <input type="text" class="form-control"name="religion" id="religion" value="">
                                                                </div>
                                                            
                                                                
                                                                  </div>
                                                                <div class="col-md-6">
                                
                                                                        <div class="form-group">
                                                                            <label for="category">Mother Tongue</label>
                                                                            <input type="text" class="form-control"name="mother_tongue" id="mother_tongue" value="">
                                                                        </div>
                                                                    
                                                                        
                                                                    </div>
                                                                    <div class="col-md-6">
                                
                                                                            <div class="form-group">
                                                                                <label for="category">Caste Detail</label>
                                                                                <input type="text" class="form-control"name="caste_detail" id="caste_detail" value="">
                                                                            </div>
                                                                        
                                                                            
                                                                        </div>
                                                                        <div class="col-md-6">
                                
                                                                                <div class="form-group">
                                                                                    <label for="category">Father Name</label>
                                                                                    <input type="text" class="form-control"name="father_name" id="father_name" value="">
                                                                                </div>
                                                                            
                                                                                
                                                                            </div>
                                                                            <div class="col-md-6">
                                
                                                                                    <div class="form-group">
                                                                                        <label for="category">Mother Name</label>
                                                                                        <input type="text" class="form-control"name="mother_name" id="mother_name" value="">
                                                                                    </div>
                                                                                
                                                                                    
                                                                                </div>
                                                                                <div class="col-md-6">
                                
                                                                                        <div class="form-group">
                                                                                            <label for="category">GrandFather Name</label>
                                                                                            <input type="text" class="form-control"name="grandfather_name" id="grandfather_name" value="">
                                                                                        </div>
                                                                                    
                                                                                        
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                
                                                                                            <div class="form-group">
                                                                                                <label for="category">Guardian Name</label>
                                                                                                <input type="text" class="form-control"name="guardian_name" id="guardian_name" value="">
                                                                                            </div>
                                                                                        
                                                                                            
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                
                                                                                                <div class="form-group">
                                                                                                    <label for="category">Guardian Name</label>
                                                                                                    <input type="text" class="form-control"name="guardian_name" id="guardian_name" value="">
                                                                                                </div>
                                                                                                                                                                                           
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                
                                                                                                <div class="form-group">
                                                                                                    <label for="category">Zone</label>
                                                                                                    <input type="text" class="form-control"name="zone" id="zone" value="">
                                                                                                </div>
                                                                                                                                                                                           
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                
                                                                                                <div class="form-group">
                                                                                                    <label for="category">Village Town</label>
                                                                                                    <input type="text" class="form-control"name="village" id="village" value="">
                                                                                                </div>
                                                                                                                                                                                           
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                
                                                                                                <div class="form-group">
                                                                                                    <label for="category">District</label>
                                                                                                    <input type="text" class="form-control"name="district" id="district" value="">
                                                                                                </div>
                                                                                                                                                                                           
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                
                                                                                                <div class="form-group">
                                                                                                    <label for="category">Ward</label>
                                                                                                    <input type="text" class="form-control"name="ward" id="ward" value="">
                                                                                                </div>
                                                                                                                                                                                           
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                
                                                                                                <div class="form-group">
                                                                                                    <label for="category">Temporary Address</label>
                                                                                                    <input type="text" class="form-control"name="tempaddress" id="tempaddress" value="">
                                                                                                </div>
                                                                                                                                                                                           
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                
                                                                                                <div class="form-group">
                                                                                                    <label for="category">Contact Number</label>
                                                                                                    <input type="text" class="form-control"name="contactnumber" id="contactnumber" value="">
                                                                                                </div>
                                                                                                                                                                                           
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                
                                                                                                <div class="form-group">
                                                                                                    <label for="category">Remarks</label>
                                                                                                    <input type="text" class="form-control"name="Remarks" id="Remarks" value="">
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