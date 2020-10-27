@extends('layouts.layout')
@section('title', 'Transactions')
@section('header', 'Transactions')
@section('content')
    <div class="content2">
        <div class="transaction-menu">
            <div class="unclaimed">
                <div class="menu">
                    <a href="/transactions/unclaimed"><h1>Unclaimed<br>Transactions</h1></a>
                </div>
            </div>
            <div class="claimed">
                <div class="menu">
                    <a href="/transactions/claimed"><h1>Claimed<br>Transactions</h1></a>
                </div>
            </div>
            <div class="claimed">
                <div class="menu">
                    <a href="/transactions/report"><h1>Daily<br>Report</h1></a>
                </div>
            </div>
        </div>
    </div>
@endsection
