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

        $data = [
            'message' => 'Get all students',
            'data' => $students,
        ];

        #mengubah data user dari array menjadi json dengan code data 200
        return response()->json($data, 200);
    }

    public function store(Request $request){
        #menggunakan model student
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        $students = Student::create($input);

        $data = [
            'message' => 'Students is created Successfully',
            'data' => $students,
        ];

        #mengubah data user dari array menjadi json dengan code data 201
        return response()->json($data, 201);
    }

    public function update(Request $request, Student $student, $id){
        #menggunakan model student
        $input = [
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'jurusan' => $request->jurusan,
        ];

        // $students = $student->update($input);
        $students = $student->where('id', '=', "$id")->update($input);

        $data = [
            'message' => 'Students is Updated',
            'data' => $students,
        ];

        #mengubah data user dari array menjadi json dengan code data 202
        return response()->json($data, 202);
    }

    public function destroy(Student $student, $id){
        // $students = $student->update($input);
        $students = $student->where('id', '=', "$id")->delete($id);

        $data = [
            'message' => 'Students is Deleted',
            'data' => $students,
        ];

        #mengubah data user dari array menjadi json dengan code data 202
        return response()->json($data, 203);
    }


}
