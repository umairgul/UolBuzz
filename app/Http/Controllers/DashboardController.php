<?php

namespace App\Http\Controllers;
use App\Notice;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\File;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_user_id = Auth::id();

//        $current_user_notices = DB::select('SELECT notices.id,notices.title,notices.body,notices.created_at,notices.updated_at,
//        users.name,departments.department_name
//        FROM notices
//        INNER JOIN users ON notices.user_id = users.id
//        INNER JOIN departments on users.dpt_id = departments.id
//        WHERE user_id = ?',[$current_user_id]);

        $current_user_notices = DB::table('notices')
            ->join('users', 'notices.user_id', '=', 'users.id')
            ->join('departments', 'users.dpt_id', '=', '.departments.id')
            ->where('notices.user_id','=',$current_user_id)
            ->select('notices.*', 'users.name', 'departments.department_name')
            ->orderBy('notices.updated_at','desc')
            ->paginate(50);

        return view('dashboard.index')->with('notices', $current_user_notices);
    }

    public function addNotice(){
        return view('dashboard.addnotice');
    }

    public function storeNotice(Request $request){

        $this->validate($request,[
            'noticeTitle' => 'required|min:5|max:100',
            'noticeBody' => 'required|min:5',
        ]);

        $current_user_id = Auth::id();
        $current_user_name = Auth::user()->username;
        $notice = new Notice;

        $notice->title = $request->noticeTitle;
        $notice->body = $request->noticeBody;
        $notice->user_id = $current_user_id;
        $notice->user_name = $current_user_name;
        $notice->save();

//        $noticeId = $notice->id;

        return redirect()->route('dashboard.index');
    }

    public function editNotice($id){
        $notice = Notice::findorfail($id);

        return view('dashboard.editNotice')->with('noticeId',$notice);
    }

    public function updateNotice($id, Request $request){
//        $current_user_id = Auth::id();
//        $current_user_name = Auth::user()->username;

        $notice = Notice::findorfail($id);
        $notice->title = $request->noticeTitle;
        $notice->body = $request->noticeBody;

        $notice->save();

        return redirect()->route('dashboard.index');
    }

    public function showNotice($id){
        $notice = Notice::findorfail($id);

        return view('dashboard.showNotice')->with('singlenotice', $notice);
    }

    public function deleteNotice($id){
        $notice = Notice::findorfail($id);
        $notice->delete();

        return redirect()->route('dashboard.index');

    }

    public function delNotice($id){
        $notice = File::findorfail($id);
        $notice->delete();
    }

    public function uploadFile(Request $request){

        $this->validate($request,[
            'attachment' => 'mimes:doc,docx,pdf,ppt,pptx,xls,xlsx|max:5000',
        ]);

        $current_user_id = Auth::id();
        $current_user_name = Auth::user()->username;

        $attachment = $request->attachment;
        if($attachment){
            $newFileName = $attachment->getClientOriginalName();
//            $newFileExt = $attachment->getClientOriginalExtension();
            $storeFile = Storage::disk('uploads')->putFileAs('',$attachment,$newFileName);

            if($storeFile){
                $file = new File;
                $file->filename = $newFileName;
                $file->uploader_id = $current_user_id;
                $file->uploader_username = $current_user_name;

                $file->save();
            }else{
                return 'File info not saved in database';
            }

        }else{
            return 'Error while uploading File';
        }

        return redirect()->route('dashboard.index');
    }

    public function myFiles($id){
        $myfiles = DB::table('files')
        ->join('users','files.uploader_id','=','users.id')
        ->select('files.*','users.name')
        ->orderBy('files.id','desc')
        ->where('users.id','=',$id)
        ->simplepaginate(20);

        return view('dashboard.myFiles')->with('myfiles', $myfiles);
    }

    public function deleteFile($fileid){
        $file = File::findorfail($fileid);

        $file->delete();
        return redirect()->route('dashboard.myfiles');
    }

//    public function registerFacultyForm(){
//        return view('dashboard.addFaculty');
//    }
//
//    public function registerFaculty(Request $request){
//
//    }
//
//    public function registerDepartmentForm(){
//        return view('dashboard.addDepartment');
//    }
//
//    public function registerDepartment(Request $request){
//
//    }
}
