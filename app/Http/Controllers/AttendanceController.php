<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Member;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function log(Member $member){
        $attendances = $member->attendances;

        return view('members.attendance_log', compact('member','attendances'));
    }

    public function add(Member $member){
        return view('members.make_attend', compact('member'));
    }

    public function store(Request $request,Member $member){
        // dd($request);
        $formFields = $request->validate([
            'member_id'=>['required'],
            'start_time'=>['required'],
            'end_time'=>['required'],
        ]);
        $formFields['status'] = 0;
        Attendance::create($formFields);

        return redirect('/members/'.$request->member_id)->with('message', 'Attendance done');
    }
}
