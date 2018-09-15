<?php

namespace App\Http\Controllers;

use App\Bikash;
use App\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /*public function add_balance(Request $request)
    {
        $validated = $this->validate( $request, [
            'amount' => 'required|integer|min:100|max:2000',
            't_id' => 'required|string',
        ]);

        $user = auth()->user();

        $balance = new Payment;
        $balance->user_id = $user->id;
        $balance->amount = $request->input('amount');
        $balance->t_id = $request->input('t_id');

        $balance->save();

        return redirect()->route('profile.show', ['profile' => $user->profile->id])->with('success', 'Your Balance Has Been Recharged Successfully');
    }*/

    public function add_balance(Request $request)
    {
        $validated = $this->validate( $request, [
            'amount' => 'required|integer|min:100|max:2000',
            't_id' => 'required|string',
        ]);

        $user = auth()->user();

        $balance = Bikash::where('amount', $request->input('amount'))->where('t_id', $request->input('t_id'))->first();
        if(empty($balance)) {
            return redirect()->back()->withErrors('Transaction Id and Amount Did Not Match.');
        }

        if($balance->is_recharged == 1) {
            return redirect()->back()->withErrors('Already Recharged With This Transaction Id.');
        }

        $balance->is_recharged = 1;
        $balance->save();
        $user->profile->balance +=  $request->input('amount');
        $user->profile->save();

        return redirect()->route('profile.show', ['profile' => $user->profile->id])->with('success', 'Your Balance Has Been Recharged Successfully');
    }

    public function withdraw(Request $request) {
        $validated = $this->validate( $request, [
            'withdrawal_amount' => 'required|integer|min:500|max:5000',
        ]);

        $user = auth()->user();
        if($request->input('withdrawal_amount') <= $user->profile->balance) {
            $user->profile->balance -=  $request->input('withdrawal_amount');
            $user->profile->save();

            return redirect()->route('profile.show', ['profile' => $user->profile->id])->with('success', 'Withdrawal Request Successful, We Will Review Your Request Within 2 Business Days.');
        } else {
            return redirect()->back()->withErrors( 'Withdrawal Request Failed, Please Input Valid Amount.');
        }
    }
}
