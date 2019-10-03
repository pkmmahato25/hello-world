<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\School;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\Storage;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd("das");
        $school=School::latest()->paginate(10);
        return view('admin.school.index',compact('school'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.school.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,School $school)
    {
        $this->validate($request,[
            'school_name'=>'required|min:4|max:25|unique:schools,name',
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'principal'=>'required',
            'owner'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('image');
             $slug = str_slug($request->school_name);
             if (isset($image))
             {
     //            make unique name for image
                 $currentDate = Carbon::now()->toDateString();
                 $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
     //            check category dir is exists
                 if (!Storage::disk('public')->exists('/uploads/school/thumbnails'))
                 {
                     Storage::disk('public')->makeDirectory('/uploads/school/thumbnails');
                 }
                 if (!Storage::disk('public')->exists('/uploads/school/normal'))
                 {
                     Storage::disk('public')->makeDirectory('/uploads/school/normal');
                 }
     //            resize image for category and upload
                 $postImageThumb = Image::make($image)->resize(500,500)->stream();
                 Storage::disk('public')->put('uploads/school/thumbnails/'.$imagename,$postImageThumb);
                 $postImageNormal = Image::make($image)->stream();
                 Storage::disk('public')->put('uploads/school/normal/'.$imagename,$postImageNormal);
     
                 
     
             } else {
                 $imagename = "school.png";
             }
        $school->name=$request->school_name;
        $school->address=$request->address;
        $school->phone=$request->phone;
        $school->email=$request->email;
        $school->principal=$request->principal;
        $school->owner=$request->owner;
        $school->image=$imagename;
        $school->slug=$slug;
        $school->save();
        Toastr::success("New School  ".$request->input('school_name')." Has Been Created");
         return redirect()->route('school.index'); 
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
        $school = School::find($id);
        return view('admin.school.edit',compact('school'));
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
       // dd($request->all());
        $this->validate($request,[
            'school_name'=>'required|min:4|max:25|unique:schools,name,'.$id,
            'address'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'principal'=>'required',
            'owner'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('image');
        $school=School::find($id);
        $slug = str_slug($request->school_name);
        if (isset($image))
        {
//            make unique name for image
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
//            check category dir is exists
            if (!Storage::disk('public')->exists('/uploads/school/thumbnails'))
            {
                Storage::disk('public')->makeDirectory('/uploads/school/thumbnails');
            }
            if (!Storage::disk('public')->exists('/uploads/school/normal'))
            {
                Storage::disk('public')->makeDirectory('/uploads/school/normal');
            }
//            resize image for category and upload
            $postImageThumb = Image::make($image)->resize(500,500)->stream();
            Storage::disk('public')->put('uploads/school/thumbnails/'.$imagename,$postImageThumb);
            $postImageNormal = Image::make($image)->stream();
            Storage::disk('public')->put('uploads/school/normal/'.$imagename,$postImageNormal);

            

        } else {
            $imagename = $school->image;
        }
        $school->name=$request->school_name;
        $school->address=$request->address;
        $school->phone=$request->phone;
        $school->email=$request->email;
        $school->principal=$request->principal;
        $school->owner=$request->owner;
        $school->image=$imagename;
        $school->save();
        Toastr::success("New School  ".$request->input('school_name')." Has Been Updated");
         return redirect()->route('school.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //  dd("ddd");
        $school = School::findOrFail($id);
        $school->delete();
        return redirect()->route('school.index'); 
    }

    
}
