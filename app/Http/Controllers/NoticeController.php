<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notice;
use Illuminate\Support\Facades\DB;
//use Illuminate\Pagination\Paginator;
//use Illuminate\Pagination\LengthAwarePaginator;

class NoticeController extends Controller
{

    public function index(){

//        $notices = DB::select('select notices.id,notices.title,notices.body,notices.created_at,notices.updated_at,
//        users.name,departments.department_name
//        FROM notices
//        INNER JOIN users ON notices.user_id = users.id
//        INNER JOIN departments on users.dpt_id = departments.id
//        ORDER BY users.id DESC
//        LIMIT 20');

        $notices = DB::table('notices')
            ->join('users', 'notices.user_id', '=', 'users.id')
            ->join('departments', 'users.dpt_id', '=', 'departments.id')
            ->select('notices.*', 'users.name', 'departments.department_name')
            ->orderBy('notices.updated_at','desc')
            ->simplepaginate(50);

//        $result = new Paginator($notices,2,1,[]);

        return view('main')->with('allNotices', $notices);
    }
}
