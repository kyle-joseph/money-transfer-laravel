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
use App\ServiceFee;

class SendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function saveToDb(){
        $date = $this->generateDateTime();
        $expiryDate = $this->expiryDate();
        $sendrecId = $this->generateSendRecId();
        $control = $this->generateControlNum();
        $charge = $this->genereteFee();
        $sender = new Sender();
        $recipient = new Recipient();
        $transaction = new Transaction();
        $senderAddress = new SenderAddress();
        $recipientAddress = new RecipientAddress();
        $srt = new SenderRecipientTransaction();

        $sender->senderId = $sendrecId;
        $sender->senderFirstName = request('sfname');
        $sender->senderLastName = request('slname');
        $sender->senderNumber = request('snumber');

        $recipient->recipientId = $sendrecId;
        $recipient->recipientFirstName = request('rfname');
        $recipient->recipientLastName = request('rlname');
        $recipient->recipientNumber = request('rnumber');

        $senderAddress->senderId = $sendrecId;
        $senderAddress->barangay = request('sbrgy');
        $senderAddress->cityMun = request('scity');
        $senderAddress->province = request('sprov');

        $recipientAddress->recipientId = $sendrecId;
        $recipientAddress->barangay = request('rbrgy');
        $recipientAddress->cityMun = request('rcity');
        $recipientAddress->province = request('rprov');

        $transaction->controlNumber = $control;
        $transaction->amount = (int)request('amount');
        $transaction->serviceFee = $charge;
        $transaction->sendDate = $date;
        $transaction->expiryDate = $expiryDate;
        $transaction->status = 'unclaimed';

        $srt->senderId = $sendrecId;
        $srt->recipientId = $sendrecId;
        $srt->controlNumber = $control;

        $sender->save();
        $recipient->save();
        $senderAddress->save();
        $recipientAddress->save();
        $transaction->save();
        $srt->save();

        return redirect('/send');
    }
    public function generateDateTime(){
        $date = date('Y-m-d H:i:s');
        return $date;
    }
    public function expiryDate(){
        $date=date_create(date("Y-m-d")); 
        date_add($date, date_interval_create_from_date_string("30 days")); 
        return $date;
    }
    public function generateSendRecId(){
        $date = date('Ymd');
        $randNum = rand(1000, 9999);
        $id = $date."".strval($randNum);
        $id = (int)$id;
        
        $sender = Sender::firstWhere('senderId', $id);
        if($sender == $id){
            $this->generateSendRecId();
        }

        return $id;
    }

    public function generateControlNum(){
        $date = date('Ym');
        $ctrl = "MTS-";
        $num = rand(10000, 99999);
        $ctrlNum = $ctrl."".$date."".strval($num);

        $transaction = Transaction::firstWhere('controlNumber', $ctrlNum);
        if($transaction == $ctrlNum){
            $this->generateControlNum();
        }

        return $ctrlNum;
    }

    public function genereteFee(){
        $charge = 0;
        $amount = (int)request('amount');
        $fees = ServiceFee::all();
        foreach($fees as $fee){
            if($amount >= $fee->min && $amount <= $fee->max){
                $charge = $fee->charge;
            }
        }

        return $charge;
    }
}
