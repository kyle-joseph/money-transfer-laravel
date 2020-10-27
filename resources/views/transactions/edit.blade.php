@extends('layouts.layout')
@section('title', 'Transactions')
@section('header', 'Unclaimed Transactions')
@section('content')
<div class="content2">
    <div class="edit">
        <div class="edit-form">
            <form action="/transactions/unclaimed/edit/" id="edit-form" onsubmit="return editValidation()" method="POST">
                @csrf
                @if($data)
                    <div class="title">
                        <h2>Edit Transaction</h2><br>
                        <p>Please enter the following details below<br>Please put 'N/A' if you don't want to enter a value</p>
                    </div><br><br>
                    <div class="title">
                        <h3>Sender Details</h3>
                    </div>
                    <div class="form center">
                    <input type="text" name="sfname" autocomplete="off" placeholder=" " value="{{$data['senderFirstName']}}">
                        <label for="name" class="label-name">
                            <span class="content-name">Firstname</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="slname" autocomplete="off" placeholder=" " value="{{$data['senderLastName']}}">
                        <label for="name" class="label-name">
                            <span class="content-name">Lastname</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="snumber" autocomplete="off" placeholder=" " value="{{$data['senderNumber']}}">
                        <label for="name" class="label-name">
                            <span class="content-name">Contact Number</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="sbrgy" autocomplete="off" placeholder=" " value="{{$data['sbarangay']}}">
                        <label for="name" class="label-name">
                            <span class="content-name">Barangay</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="scity" autocomplete="off" placeholder=" " value="{{$data['scityMun']}}">
                        <label for="name" class="label-name">
                            <span class="content-name">City/Municipality</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="sprov" autocomplete="off" placeholder=" " value="{{$data['sprovince']}}">
                        <label for="name" class="label-name">
                            <span class="content-name">Province</span>
                        </label>
                    </div><br>
                    <div class="title">
                        <h3>Recipient Details</h3>
                    </div>
                    <div class="form center">
                        <input type="text" name="rfname" autocomplete="off" placeholder=" " value="{{$data['recipientFirstName']}}">
                        <label for="name" class="label-name">
                            <span class="content-name">Firstname</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="rlname" autocomplete="off" placeholder=" " value="{{$data['recipientLastName']}}">
                        <label for="name" class="label-name">
                            <span class="content-name">Lastname</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="rnumber" autocomplete="off" placeholder=" " value="{{$data['recipientNumber']}}">
                        <label for="name" class="label-name">
                            <span class="content-name">Contact Number</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="rbrgy" autocomplete="off" placeholder=" " value="{{$data['rbarangay']}}">
                        <label for="name" class="label-name">
                            <span class="content-name">Barangay</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="rcity" autocomplete="off" placeholder=" " value="{{$data['rcityMun']}}">
                        <label for="name" class="label-name">
                            <span class="content-name">City/Municipality</span>
                        </label>
                    </div>
                    <div class="form center">
                        <input type="text" name="rprov" autocomplete="off" placeholder=" " value="{{$data['rprovince']}}">
                        <label for="name" class="label-name">
                            <span class="content-name">Province</span>
                        </label>
                    </div>
                <input type="text" name="currentId" value="{{$data['currentId']}}" style="display: none" >
                <a href="/transactions/unclaimed"><input type="button" value="Cancel"></a>
                <input type="submit" value="Save">
                </form>
                
            @endif
            
            {{-- <input type="submit" value="Save" onclick="event.preventDefault();
                                    document.getElementById('edit-form').submit();"> --}}
        </div>
    </div>
</div>
@endsection