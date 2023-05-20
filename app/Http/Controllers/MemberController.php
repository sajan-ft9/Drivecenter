<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Payment;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function all(Request $request){
        if($request->search){
            $members = Member::where('userid', 'LIKE', '%'.$request->search. '%')
            ->orWhere('name', 'LIKE', '%'.$request->search. '%')
            ->orWhere('phone', 'LIKE', '%'.$request->search. '%')
            ->get();
            $page = 0;
            return view('members.all', compact('members','page'));
        }else{
            $members = Member::latest()->paginate(10);
            return view('members.all', compact('members'));
        }
    }

    public function create(){
        return view('members.create');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'min:1000000000', 'numeric'],
            'address' => ['required', 'max:255'],
            'vehicle' => ['required'],
            // 'paid_amount' => ['required','numeric','min:0'],
            'image' => ['image', 'mimes:png,jpg,jpeg', 'max:4096']
        ]);
        
        if(!isset($request->image)){
            $formFields['image'] = "/storage/images/default.png";
        }else{
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('images', $imageName, 'public');
            $formFields['image'] = '/storage/images/'.$imageName;
        }
        $formFields['userid'] = substr($request->vehicle,0,1).'-'.$this->generateUniqueCode();

        Member::create($formFields);

        

        return redirect('/members')->with('message', 'Member added successfully!');
    }

    public function generateUniqueCode()
    {

        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersNumber = strlen($characters);

        $code = '';

        while (strlen($code) < 6) {
            $position = rand(0, $charactersNumber - 1);
            $character = $characters[$position];
            $code = $code.$character;
        }

        if (Member::where('userid', $code)->exists()) {
            $this->generateUniqueCode();
        }

        return $code;

    }

    public function details(Member $member){
        $payments = $member->payments;
        $total_paid = 0;
        foreach($payments as $payment){
            $total_paid += $payment->amount;
        }
        return view('members.detail', compact('member','total_paid','payments'));
    }

    public function edit(Member $member){
        return view('members.edit', ['member'=>$member]);
    }

    public function update(Request $request, Member $member){
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'phone' => ['required', 'min:1000000000', 'numeric'],
            'address' => ['required', 'max:255'],
            'image' => ['image', 'mimes:png,jpg,jpeg', 'max:2048']
        ]);
        

        if(!isset($request->image)){
            $member->update($formFields);
            // $formFields['image'] = "/storage/images/default.png";
        }else{
            $imageName = time().'.'.$request->image->extension();
            $request->image->storeAs('images', $imageName, 'public');
            $formFields['image'] = '/storage/images/'.$imageName;
            $member->update($formFields);
        }


        return redirect('/members/'.$member->id)->with('message', 'Updated successfully!');
    }

}
