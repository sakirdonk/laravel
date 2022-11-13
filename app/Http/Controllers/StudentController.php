<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //method index - get all resource
    public function index(){
        #menggunakan model student
        $students = Student::all();

        if($students){
            $data = [
                'message' => 'Get all students',
                'data' => $students,
            ];
                
            #mengubah data user dari array menjadi json dengan code data 200
            return response()->json($data, 200);
        }
        else{
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }
        
    }

    public function store(Request $request){
        #menggunakan model student
        $jurusan_default = 'Informatika';
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan ?? $jurusan_default,
        ];

        $students = Student::create($input);

        if($students){
            $data = [
                'message' => 'Students is created Successfully',
                'data' => $students,
            ];

            #mengubah data user dari array menjadi json dengan code data 201
            return response()->json($data, 201);
        }
        else{
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }
    }

    // MY OWN CODE
    // public function update(Request $request, Student $student, $id){
    //     #menggunakan model student
    //     $input = [
    //         'nama' => $request->nama,
    //         'nim' => $request->nim,
    //         'email' => $request->email,
    //         'jurusan' => $request->jurusan,
    //     ];

    //     // $students = $student->update($input);
    //     $students = $student->where('id', '=', "$id")->update($input);

    //     $data = [
    //         'message' => 'Students is Updated',
    //         'data' => $students,
    //     ];

    //     #mengubah data user dari array menjadi json dengan code data 202
    //     return response()->json($data, 202);
    // }

    // CODE FROM LECTURER
    public function update(Request $request, $id){
        $student = Student::find($id);

        if ($student){
        $input = [
            'nama' => $request->nama ?? $student->nama,
            'nim' => $request->nim ?? $student->nim,
            'email' => $request->email ?? $student->email,
            'jurusan' => $request->jurusan ?? $student->jurusan,
        ];

        $student->update($input);
        
        $data = [
            'message' => 'Students is Updated',
            'data' => $student,
        ];

        return response()->json($data, 200);
        }
        else{
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }
    }

    public function destroy(Student $student, $id){
        // $students = $student->where('id', '=', "$id")->delete($id);
        $student = Student::find($id);        
        $student->delete($id);

        if ($student){

            $data = [
                'message' => 'Students is Deleted'
            ];

            #mengubah data user dari array menjadi json dengan code data 202
            return response()->json($data, 200);
        }
        else{
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }
    }

    public function show($id){
        $students = Student::find($id); //::find is to get only one id detail, different with ::all() to get all data

        if ($students){
            $data = [
                'message' => 'Get detail student succeed',
                'data' => $students,
            ];

            #mengubah data user dari array menjadi json dengan code data 200
            return response()->json($data, 200);
        }
        else{
            $data = [
                'message' => 'Student not found'
            ];

            return response()->json($data, 404);
        }
    }
}
