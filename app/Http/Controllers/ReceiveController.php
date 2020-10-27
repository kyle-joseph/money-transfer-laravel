<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipient;
use App\Sender;
use App\RecipientAddress;
use App\SenderAddress;
use App\SenderRecipientTransaction;
use App\Transaction;
use App\User;
use App\ClaimedTrans;

class ReceiveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function search(){
        $trans = SenderRecipientTransaction::where('controlNumber', request('ctrlNum'))->first();
        $sender = null;
        $recipient = null;
        $sAddress = null;
        $rAddress = null;
        $transaction = null;
        if($trans){
            $sender = Sender::where('senderId', $trans->senderId)->get();
            $recipient = Recipient::where('recipientId', $trans->recipientId)->get();
            $sAddress = SenderAddress::where('senderId', $trans->senderId)->get();
            $rAddress = recipientAddress::where('recipientId', $trans->recipientId)->get();
            $transaction = Transaction::where('controlNumber', $trans->controlNumber)->get();
            $date = date('Y-m-d');
            $exp = $transaction[0]->expiryDate;
            $status = $transaction[0]->status;
            if($status == 'claimed'){
                $msg = "Transaction Claimed";
                return redirect('/receive')->with('msg', $msg);
            }
            if($date > $exp){
                $msg = "Transaction Overdue";
                return redirect('/receive')->with('msg', $msg);
            }
            else{
                $found = 'Found';
                return redirect('/receive')->with('data', compact('sender', 'recipient', 'sAddress', 'rAddress', 'transaction'));
            }
        }
        else{
            $msg = "Transaction Not Found";
            return redirect('/receive')->with('msg', $msg);
        }
    }
    public function claim($ctrl){
        $ctrl = $ctrl;
        $transaction = Transaction::where('controlNumber', $ctrl)->get();
        $transaction[0]->status = 'claimed';
        $transaction[0]->save();
        $stat = $transaction[0]->status;
        $claimed = new ClaimedTrans();
        $claimed->controlNumber = $ctrl;
        $claimed->dateClaimed = date('Y-m-d');
        $claimed->save();
        $msg = "Claim Successful";
        return redirect('/receive')->with('msg', $msg);
    }
    public function sample(){
        return view('pages.sample');
    }

}
