@extends('layouts.layout')
@section('title', 'Transactions')
@section('header', 'Claimed Transactions')
@section('content')
<div class="content2">
    <a href="/transactions"><input type="submit" value="Back"></a>
    <div class="trans-table">
        <table class="content-table">
            <thead>
                <tr>
                    <th>Control Number</th>
                    <th>Sender Name</th>
                    <th>Sender Address</th>
                    <th>Recipient Name</th>
                    <th>Recipient Address</th>
                    <th>Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @if(count($senders) > 0)
                    @foreach ($senders as $data)
                        <tr>
                            <td>{{$data->controlNumber}}</td>
                            <td>{{$data->senderFirstName}} {{$data->senderLastName}}</td>
                            <td>{{$data->sbarangay}}, {{$data->scityMun}}, {{$data->sprovince}}</td>
                            <td>{{$data->recipientFirstName}} {{$data->recipientLastName}}</td>
                            <td>{{$data->rbarangay}}, {{$data->rcityMun}}, {{$data->rprovince}}</td>
                            <td>{{$data->amount}}</td>
                            <td>{{$data->dateClaimed}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection