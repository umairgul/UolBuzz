<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Department;

class DepartmentController extends Controller
{
    public function index(){
        $departments = DB::table('departments')
            ->orderBy('department_name', 'asc')
            ->get();

        return view('departments.allDepartments')->with('departments', $departments);
    }

    public function show($id){
        $department_notices = DB::table('notices')
            ->join('users', 'notices.user_id', '=', 'users.id')
            ->join('departments', 'users.dpt_id', '=', 'departments.id')
            ->select('notices.*', 'users.name', 'departments.department_name')
            ->orderBy('notices.id','desc')
            ->where('departments.id','=',$id)
            ->simplepaginate(20);
//        echo $department;
        return view('departments.singleDepartmentNotices')->with('singleDepartment', $department_notices);
    }
}
