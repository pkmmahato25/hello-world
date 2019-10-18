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
                   
                    <div class="box-body">
                        <div class="col-md-12">
                            <form action="{{ route('student.store')}}" enctype="multipart/form-data" method="POST">
                                 <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Add Student</h3>
                                </div>
                                   
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="school_name">School Name</label>
                                                <select class="form-control m-bot15" name="school_name">
                                                     <option value="">Select School</option>
                                                      @foreach($school as $value)
                                                       <option value="{{$value->id}}">{{$value->name}}</option>
                                                      @endForeach
                                                    </select>
                                            </div>
                                        </div>
                                         
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="id_number">ID number</label>
                                                <input type="text" class="form-control"name="id_number" id="id_number" value="" autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="effective_date">Effective Date(DD/MM/YYYY)</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right" name="effective_date" id="datepicker" value="" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control"name="name" id="name" value="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="thar">Thar</label>
                                                <input type="text" class="form-control"name="thar" id="thar" value="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="section">Section</label>
                                                <input type="number" class="form-control"name="section" id="section" value="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="class">Class</label>
                                                <input type="number" class="form-control"name="class" id="class" value="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="roll_no">Roll No</label>
                                                <input type="number" class="form-control"name="roll_no" id="roll_no" value="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="admission_date">Admission Date</label>
                                                <input type="text" class="form-control"name="admission_date" id="admission_date" value="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    

                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Date of Birth</h3>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nepali_date">Nepali Date</label>
                                                <input type="text" class="form-control nepali-calendar"name="nepali_date" id="nepaliDate" autocomplete="off" placeholder="Select Date" autocomplete="off">
                                            </div>
                                        </div>
                                            
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="english_date">English Date </label>
                                                <input type="text" class="form-control"name="english_date" id="englishDate" value="" readonly autocomplete="off">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="age">Age</label>
                                                <input type="number" class="form-control"name="age" id="age" value="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Date of Birth</h3>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="sex">Sex</label>
                                                <select name="sex" id="sex" class="form-control">
                                                    <option value="">Select Gender</option>
                                                    @foreach(config('constant.GENDER_ENUM') as $value=>$gender)
                                                    <option value="{{$value}}" >{{$gender}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                            
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="student_type">Student Type</label>
                                                <select name="student_type" id="student_type" class="form-control">
                                                    <option value="">Select Student Type</option>
                                                    @foreach(str_replace('_', ' ',config('constant.Student_Type')) as $value=>$student_type)
                                                    <option value="{{$value}}" >{{$student_type}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="religion">Religion</label>
                                                <select name="religion" id="religion" class="form-control">
                                                    <option value="">Select Religion</option>
                                                    @foreach(config('constant.Religion') as $value=>$religion)
                                                    <option value="{{$value}}" >{{$religion}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="mother_tongue">Mother Tongue</label>
                                                <select name="mother_tongue" id="mother_tongue" class="form-control">
                                                    <option value="">Select Mother Toungue</option>
                                                    @foreach(config('constant.Language') as $value=>$language)
                                                    <option value="{{$value}}" >{{$language}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Cast Details</h3>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="caste_detail">Caste Detail</label>
                                                <input type="text" class="form-control"name="caste_detail" id="caste_detail" value="" autocomplete="off">
                                            </div>
                                        </div>
                                            
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Dalit
                                                    <input type="radio" value ='0' name="cast" class="flat-red" checked>
                                                </label> | 
                                                <label> Janjati
                                                    <input type="radio" value ='1'name="cast" class="flat-red">
                                                </label> | 
                                                <label>Other
                                                    <input type="radio" value ='2' name="cast" class="flat-red" >
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="image">Image</label>
                                                <input type="file" class="form-control" name="image">
                                            {{-- <img src="{{URL::asset('storage/admin/school/school.png')}}" height="30px" width="30px"> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Cast Details</h3>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="father_name">Father Name</label>
                                                <input type="text" class="form-control"name="father_name" id="father_name" value="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="mother_name">Mother Name</label>
                                                <input type="text" class="form-control"name="mother_name" id="mother_name" value="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="grandfather_name">GrandFather Name</label>
                                                <input type="text" class="form-control"name="grandfather_name" id="grandfather_name" value="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="guardian_name">Guardian Name</label>
                                                <input type="text" class="form-control"name="guardian_name" id="guardian_name" value="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Cast Details</h3>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="zone">Zone</label>
                                                <input type="text" class="form-control"name="zone" id="zone" value="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="village">Village Town</label>
                                                <input type="text" class="form-control"name="village" id="village" value="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="district">District</label>
                                                <input type="text" class="form-control"name="district" id="district" value="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="ward">Ward</label>
                                                <input type="text" class="form-control"name="ward" id="ward" value="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Cast Details</h3>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="tempaddress">Temporary Address</label>
                                                <input type="text" class="form-control"name="tempaddress" id="tempaddress" value="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="contactnumber">Contact Number</label>
                                                <input type="number" class="form-control"name="contactnumber" id="contactnumber" value="" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="remark">Remarks</label>
                                                <input type="text" class="form-control"name="remarks" id="remarks" value="" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
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
</div>        
        
   
       
@endsection



@push('js')

 
@endpush