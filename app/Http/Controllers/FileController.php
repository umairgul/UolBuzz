<?php

namespace App\Http\Controllers;
use App\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index(){
        $faculty = DB::table('users')
            ->orderBy('name', 'asc')
            ->get();

        return view('files.allFaculty')->with('faculties', $faculty);
    }

    public function show($id){
        $faculty_files = DB::table('files')
            ->join('users', 'files.uploader_id', '=', 'users.id')
            ->select('files.*', 'users.name')
            ->orderBy('files.id','desc')
            ->where('users.username','=',$id)
            ->simplepaginate(20);

        return view('files.singleFacultyFiles')->with('facultyFiles', $faculty_files);
    }

}
