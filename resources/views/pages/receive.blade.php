@extends('layouts.layout')
@section('title', 'Claim Money')
@section('header', 'Claim')
@section('content')

    <div class="content2">
        <div class="search card">
            <div class="search-content">
                <form name="searchForm" action="/claim" onsubmit="return searchValidate()" method="GET" onkeydown="return event.key != 'Enter';">
                    @csrf
                    <div class="search-form">
                        <div class="title">
                            <h2>Search Control Number</h2><br>
                        </div>
                        <div class="form center">
                            <input type="text" name="ctrlNum" autocomplete="off" placeholder=" ">
                            <label for="name" class="label-name">
                                <span class="content-name">Enter Control Number</span>
                            </label>
                        </div>
                    </div>
                    <div class="search-btn">
                        <input  type="submit" value="Search">
                    </div>
                    <div class="errorMsg">
                        @if(session()->has('msg'))
                            @if(session()->get('msg') != 'Claim Successful')
                                <h1 style="color:#CA0221;"><i class="fas fa-exclamation-triangle"></i> {{session()->get('msg')}}</h1>
                            @else
                                <h1 style="color:#34B62B;"><i class="fas fa-check-double"></i> {{session()->get('msg')}}</h1>
                            @endif
                        @endif
                    </div>
                </form>
            </div>
        </div>
        <div class="search-result">
            <div class="result">
                <div class="sender-result">
                    <div class="sender">
                        <div class="title">
                            <h1>Sender</h1>
                        </div><hr><br>
                        
                        <?php 
                            $data = null; 
                            $sender = null;
                            $recipient = null;
                            $sAddress = null;
                            $rAddress = null;
                            $transaction = null;
                        ?>
                        @if(session()->has('data'))
                            <?php 
                                $data = session()->get('data'); 
                                $sender = $data['sender'][0];
                                $recipient = $data['recipient'][0];
                                $sAddress = $data['sAddress'][0];
                                $rAddress = $data['rAddress'][0];
                                $transaction = $data['transaction'][0];
                            ?>
                             <ul>
                                <li>{{$sender->senderFirstName}} {{$sender->senderLastName}}</li>
                                <li>{{$sender->senderNumber}}</li>
                                <li>{{$sAddress->barangay}}, {{$sAddress->cityMun}}, {{$sAddress->province}}</li>
                                <li>Amount: Php {{$transaction->amount}}</li>
                                <li>Control Number: {{$transaction->controlNumber}}</li>
                            </ul>
                        @endif
                    </div>
                </div>
                <div class="recipient-result">
                    <div class="recipient">
                        <div class="title">
                            <h1>Recipient</h1>
                        </div>
                        <hr><br>
                        @if(session()->has('data'))
                            <ul>
                                <li>{{$recipient->recipientFirstName}} {{$recipient->recipientLastName}}</li>
                                <li>{{$recipient->recipientNumber}}</li>
                                <li>{{$rAddress->barangay}}, {{$rAddress->cityMun}}, {{$rAddress->province}}</li>
                            </ul>
                            <a href="/claim/{{$transaction->controlNumber}}"><input type="submit" value="Claim"></a>
                            <a href="/receive"><input type="submit" value="Cancel"></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
