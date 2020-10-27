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


class TransactionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function unclaimed(){
        $sender = Sender::select('sender_recipient_transactions.controlNumber', 'senders.senderFirstName', 'senders.senderLastName', 'sender_addresses.barangay as sbarangay', 'sender_addresses.cityMun as scityMun', 'sender_addresses.province as sprovince',
        'recipients.recipientFirstName', 'recipients.recipientLastName', 'recipient_addresses.barangay as rbarangay', 'recipient_addresses.cityMun as rcityMun', 'recipient_addresses.province as rprovince', 
        'transactions.amount', 'transactions.status')
        ->leftJoin('sender_addresses', 'senders.senderId', '=', 'sender_addresses.senderId')
        ->leftJoin('recipients', 'senders.senderId', '=', 'recipients.recipientId')
        ->leftJoin('recipient_addresses', 'recipients.recipientId', '=', 'recipient_addresses.recipientId')
        ->leftJoin('sender_recipient_transactions', 'senders.senderId', '=', 'sender_recipient_transactions.senderId')
        ->leftJoin('transactions', 'sender_recipient_transactions.controlNumber', '=', 'transactions.controlNumber')
        ->where('status', 'unclaimed')->get();
        // return $sender;
        return view('transactions.unclaimed')->with('senders', $sender);
    }
    public function claimed(){
        // $sender = Sender::select('sender_recipient_transactions.controlNumber', 'senders.senderFirstName', 'senders.senderLastName', 'sender_addresses.barangay as sbarangay', 'sender_addresses.cityMun as scityMun', 'sender_addresses.province as sprovince',
        // 'recipients.recipientFirstName', 'recipients.recipientLastName', 'recipient_addresses.barangay as rbarangay', 'recipient_addresses.cityMun as rcityMun', 'recipient_addresses.province as rprovince', 
        // 'transactions.amount', 'transactions.status')
        // ->leftJoin('sender_addresses', 'senders.senderId', '=', 'sender_addresses.senderId')
        // ->leftJoin('recipients', 'senders.senderId', '=', 'recipients.recipientId')
        // ->leftJoin('recipient_addresses', 'recipients.recipientId', '=', 'recipient_addresses.recipientId')
        // ->leftJoin('sender_recipient_transactions', 'senders.senderId', '=', 'sender_recipient_transactions.senderId')
        // ->leftJoin('transactions', 'sender_recipient_transactions.controlNumber', '=', 'transactions.controlNumber')
        // ->where('status', 'claimed')->get();
        $sender = Sender::select('sender_recipient_transactions.controlNumber', 'senders.senderFirstName', 'senders.senderLastName', 'sender_addresses.barangay as sbarangay', 'sender_addresses.cityMun as scityMun', 'sender_addresses.province as sprovince',
        'recipients.recipientFirstName', 'recipients.recipientLastName', 'recipient_addresses.barangay as rbarangay', 'recipient_addresses.cityMun as rcityMun', 'recipient_addresses.province as rprovince', 
        'transactions.amount', 'transactions.status', 'claimed_trans.dateClaimed')
        ->leftJoin('sender_addresses', 'senders.senderId', '=', 'sender_addresses.senderId')
        ->leftJoin('recipients', 'senders.senderId', '=', 'recipients.recipientId')
        ->leftJoin('recipient_addresses', 'recipients.recipientId', '=', 'recipient_addresses.recipientId')
        ->leftJoin('sender_recipient_transactions', 'senders.senderId', '=', 'sender_recipient_transactions.senderId')
        ->leftJoin('transactions', 'sender_recipient_transactions.controlNumber', '=', 'transactions.controlNumber')
        ->leftJoin('claimed_trans', 'sender_recipient_transactions.controlNumber', '=', 'claimed_trans.controlNumber')
        ->where('status', 'claimed')->get();
        
        return view('transactions.claimed')->with('senders', $sender);
    }
    public function edit(){
        $srt = SenderRecipientTransaction::where('controlNumber', request('ctrlNum'))->get();
        $senderId = $srt[0]->senderId;
        $recipientId = $srt[0]->recipientId;
        $sender = Sender::where('senderId', $senderId)->get();
        $recipient = Recipient::where('recipientId', $recipientId)->get();
        $sAddress = SenderAddress::where('senderId', $senderId)->get();
        $rAddress = RecipientAddress::where('recipientId', $recipientId)->get();
        $data = array(
            'currentId' => $senderId,
            'senderFirstName' => $sender[0]->senderFirstName,
            'senderLastName' => $sender[0]->senderLastName,
            'senderNumber' => $sender[0]->senderNumber,
            'sbarangay' => $sAddress[0]->barangay,
            'scityMun' => $sAddress[0]->cityMun,
            'sprovince' => $sAddress[0]->province,
            'recipientFirstName' => $recipient[0]->recipientFirstName,
            'recipientLastName' => $recipient[0]->recipientLastName,
            'recipientNumber' => $recipient[0]->recipientNumber,
            'rbarangay' => $rAddress[0]->barangay,
            'rcityMun' => $rAddress[0]->cityMun,
            'rprovince' => $rAddress[0]->province,
        );
        // return $data;
        return view('transactions.edit')->with('data', $data);
    }
    public function editSave(){
        Sender::where('senderId', request('currentId'))
        ->update([
            'senderFirstName' => request('sfname'),
            'senderLastName' => request('slname'),
            'senderNumber' => request('snumber'),
        ]);
        SenderAddress::where('senderId', request('currentId'))
        ->update([
            'barangay' => request('sbrgy'),
            'cityMun' => request('scity'),
            'province' => request('sprov'),
        ]);
        Recipient::where('recipientId', request('currentId'))
        ->update([
            'recipientFirstName' => request('rfname'),
            'recipientLastName' => request('rlname'),
            'recipientNumber' => request('rnumber'),
        ]);
        RecipientAddress::where('recipientId', request('currentId'))
        ->update([
            'barangay' => request('rbrgy'),
            'cityMun' => request('rcity'),
            'province' => request('rprov'),
        ]);
        // $recipient = Recipient::where('recipientId', $recipientId)->get();
        // $sAddress = SenderAddress::where('senderId', $senderId)->get();
        // $rAddress = RecipientAddress::where('recipientId', $recipientId)->get();

        return redirect('/transactions/unclaimed');
    }
    public function report(){
        return view('transactions.report');
    }
}
