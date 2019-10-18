<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use App\Student;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $student=Student::latest()->get();
      return view('admin.student.index',compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $school=School::latest()->get();
        // dd($school);
        return view('admin.student.create',compact('school'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'school_name'=>'required',
            'id_number'=>'required',
            'effective_date'=>'required|after:3/13/2014',
            'name'=>'required',
            'thar'=>'required',
            'section'=>'required',
            'class'=>'required',
            'roll_no'=>'required',
            'nepali_date'=>'required',
            'english_date'=>'required|after:3/13/1990',
            'admission_date'=>'required|after:3/13/2014',
            'age'=>'required',
            'sex'=>'required',
            'student_type'=>'required',
            'religion'=>'required',
            'mother_tongue' =>'required',
            'caste_detail'=>'required',
            'cast'=>'required',
            'father_name'=>'required',
            'mother_name'=>'required',
            'grandfather_name'=>'required',
            'guardian_name'=>'required',
            'zone'=>'required',
            'village'=>'required',
            'district'=>'required',
            'ward'=>'required',
            'tempaddress'=>'required',
            'contactnumber'=>'required',
            'remarks'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('image');
             $slug = str_slug($request->name);
             if (isset($image))
             {
     //            make unique name for image
                 $currentDate = Carbon::now()->toDateString();
                 $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
     //            check category dir is exists
                 if (!Storage::disk('public')->exists('/uploads/student/thumbnails'))
                 {
                     Storage::disk('public')->makeDirectory('/uploads/student/thumbnails');
                 }
                 if (!Storage::disk('public')->exists('/uploads/student/normal'))
                 {
                     Storage::disk('public')->makeDirectory('/uploads/student/normal');
                 }
     //            resize image for category and upload
                 $postImageThumb = Image::make($image)->resize(500,500)->stream();
                 Storage::disk('public')->put('uploads/student/thumbnails/'.$imagename,$postImageThumb);
                 $postImageNormal = Image::make($image)->stream();
                 Storage::disk('public')->put('uploads/student/normal/'.$imagename,$postImageNormal);
     
                 
     
             } else {
                 $imagename = "school.png";
             }
             $student = new Student();
             $student->id_number=$request->id_number;
             $student->effective_from=$request->effective_date;
             $student->name=$request->name;
             $student->thar=$request->thar;
             $student->section_id=$request->section;
             $student->class_id=$request->class;
             $student->school_id=$request->school_name;
             $student->roll_no=$request->roll_no;
             $student->admission_date=$request->admission_date;
             $student->nepali_date=$request->nepali_date;
             $student->english_date=$request->english_date;
             $student->age=$request->age;
             $student->sex=$request->sex;
             $student->student_type=$request->student_type;
             $student->religion=$request->religion;
             $student->mother_tongue=$request->mother_tongue;
             $student->cast=$request->cast;
             $student->caste_detail=$request->caste_detail;
             $student->father_name=$request->father_name;
             $student->mother_name=$request->mother_name;
             $student->grandfather_name=$request->grandfather_name;
             $student->guradian_name=$request->guardian_name;
             $student->zone=$request->zone;
             $student->village_town=$request->village;
             $student->district=$request->district;
             $student->ward=$request->ward;
             $student->temporary_address=$request->tempaddress;
             $student->contact_number=$request->contactnumber;
             $student->remarks=$request->remarks;
             $student->image=$imagename;
             $student->save();
             Toastr::success("New Student  ".$request->input('name')." Has Been Created");
              return redirect()->route('student.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
