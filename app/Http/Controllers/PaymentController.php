<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function all(){
        $payments = Payment::all();
        $total = 0;
        foreach($payments as $payment){
            $total += $payment->amount;
        }
        return view('payments.all', compact('payments', 'total'));
    }

    public function add(Member $member){
        return view('payments.add', compact('member'));
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'amount' => ['required', 'min:0', 'numeric'],
            'member_id' => ['required'],
            'remarks' => ['required','min:5', 'max:255']
        ]);

        Payment::create($formFields);

        return redirect('/members/'.$request->member_id)->with('message', 'Rs. '.$request->amount.' has been paid.');
    }

    public function paylog(Member $member){
        $payments = $member->payments;
        $total_paid = 0;
        foreach($payments as $payment){
            $total_paid += $payment->amount;
        }

        return view('members.payment_log', compact('member','total_paid','payments'));
    }
}
