<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = array("Kucing", "Ayam", "Ikan");

    public function index(){
        echo "Menampilkan Data Animals:\n";
        foreach($this->animals as $animals){
            echo "- ".$animals."\n";
        };
    }

    public function store(Request $request){
        array_push($this->animals, $request->nama);
        echo "Menambahkan Data Animals \n";
        echo "Menampilkan Data Animals:\n";
        foreach($this->animals as $animals){
            echo "- ".$animals."\n";
        };
    }

    public function update(Request $request, $id){
        echo "Mengubah Data Animals id $id\n";
        $this->animals[$id] = $request->nama;
        echo "Menampilkan Data Animals:\n";
        foreach($this->animals as $animals){
            echo "- ".$animals."\n";
        };
    }

    public function destroy($id){
        echo "Menghapus Data Animals id $id\n";
        array_splice($this->animals,$id,1);
        echo "Menampilkan Data Animals:\n";
        foreach($this->animals as $animals){
            echo "- ".$animals."\n";
        };
    }
}