<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\User;

class FacultyController extends Controller
{
    public function index(){
        $faculty = DB::table('users')
            ->orderBy('name', 'asc')
            ->get();

        return view('faculty.allFaculty')->with('faculties', $faculty);
    }

    public function show($id){
//        $faculty_notices = DB::select('select notices.id,notices.title,notices.body,notices.created_at,notices.updated_at,
//        users.name,departments.department_name
//        FROM notices
//        INNER JOIN users ON notices.user_id = users.id
//        INNER JOIN departments on users.dpt_id = departments.id
//        WHERE users.username = ?',[$id]);

        $faculty_notices = DB::table('notices')
            ->join('users', 'notices.user_id', '=', 'users.id')
            ->join('departments', 'users.dpt_id', '=', 'departments.id')
            ->select('notices.*', 'users.name', 'departments.department_name')
            ->orderBy('notices.id','desc')
            ->where('users.username','=',$id)
            ->simplepaginate(20);

        return view('faculty.singleFacultyNotices')->with('singleFaculty', $faculty_notices);
    }

}
