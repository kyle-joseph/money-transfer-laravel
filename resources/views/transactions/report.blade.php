@extends('layouts.layout')
@section('title', 'Transactions')
@section('header', 'Daily Report')
@section('content')
<div class="content2">
    <a href="/transactions"><input type="submit" value="Back"></a>
    <div class="report">
        <h2>Daily Report as of {{date('Y-m-d')}}</h2>
        <div class="report-chart">
            {!! $chart->container() !!}
            {!! $chart->script() !!}    
        </div>
    </div>        
</div>
@endsection