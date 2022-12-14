<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use DB;

class StudentController extends Controller
{
    // view list all students
    public function list()
    {
        $studentShow = DB::table('students')->get();
        return view('student.student_all',compact('studentShow'));
    }

    //
    public function aboutStudent()
    {
        return view('student.student_about');
    }
    // student add 
    public function formAdd()
    {
        return view('student.student_add');
    }
    // student save
    public function formSave(Request $request)
    {
        $request->validate([
            'firstName'          => 'required|string|max:255',
            'lastName'            => 'required|string|max:255',
            'email'               => 'required|string|email',
            'registrationDate'    => 'required|string|max:255',
            'rollNo'              => 'required|string|max:255',
            'class'               => 'required|string|max:255',
            'gender'              => 'required|string|max:255',
            'mobileNumber'        => 'required|min:11|numeric',
            'parentsName'         => 'required|string|max:255',
            'parentsMobileNumber' => 'required|min:11|numeric',
            'dateOfBirth'         => 'required|string|max:255',
            'bloodGroup'          => 'required|string|max:255',
            'address'             => 'required|string|max:255',
            'upload'              => 'required|image',
        ]);
        
        $image = time().'.'.$request->upload->extension();  
        $request->upload->move(public_path('images'), $image);

        $student = new Student;
        $student->firstName           = $request->firstName;
        $student->lastName            = $request->lastName;
        $student->email               = $request->email;
        $student->registrationDate    = $request->registrationDate;
        $student->rollNo              = $request->rollNo;
        $student->class               = $request->class;
        $student->gender              = $request->gender;
        $student->mobileNumber        = $request->mobileNumber;
        $student->parentsName         = $request->parentsName;
        $student->parentsMobileNumber = $request->parentsMobileNumber;
        $student->dateOfBirth         = $request->dateOfBirth;
        $student->bloodGroup          = $request->bloodGroup;
        $student->address             = $request->address;
        $student->upload              = $image;
        $student->save();
       
        Toastr::success('Insert data has been successfully :)','Success');
        return redirect()->back();
    }
    // student edit
    public function studentEdit($id)
    {
        $student = DB::table('students')->where('id',$id)->get();
        return view('student.student_edit',compact('student'));
    }
    // student update to db
    public function studentUpdate( Request $request)
    {
        $id                  = $request->id;
        $firstName           = $request->firstName;
        $lastName            = $request->lastName;
        $email               = $request->email;
        $registrationDate    = $request->registrationDate;
        $rollNo              = $request->rollNo;
        $class               = $request->class;
        $gender              = $request->gender;
        $mobileNumber        = $request->mobileNumber;
        $parentsName         = $request->parentsName;
        $parentsMobileNumber = $request->parentsMobileNumber;
        $dateOfBirth         = $request->dateOfBirth;
        $bloodGroup          = $request->bloodGroup;
        $address             = $request->address;

       
        $old_image = Student::find($id);
        $image_name = $request->hidden_image;
        $image = $request->file('upload');

        if($image != '')
        {
            $image_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
      
        $update = [

            'id'                  => $id,
            'firstName'           => $firstName,
            'lastName'            => $lastName,
            'email'               => $email,
            'registrationDate'    => $registrationDate,
            'rollNo'              => $rollNo,
            'class'               => $class,
            'gender'              => $gender,
            'mobileNumber'        => $mobileNumber,
            'parentsName'         => $parentsName,
            'parentsMobileNumber' => $parentsMobileNumber,
            'dateOfBirth'         => $dateOfBirth,
            'bloodGroup'          => $bloodGroup,
            'address'             => $address,
            'upload'              => $image_name,
        ];

        Student::where('id',$request->id)->update($update);
        Toastr::success('Data updated successfully :)','Success');
        return redirect()->route('all/student/list');
    }
}
