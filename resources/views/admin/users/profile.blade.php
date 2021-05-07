@extends('layouts.admin-layout')

@section("title', 'Laravel - User's Profile")

@section('main-header')
    <h4>{{ strtoupper('Dashboard Panel') }}</h4>
@endsection

@section('main-content')
<div class="row">
    <img src="#">
    <div class="col-sm-2 col-md-2 col-lg-2">
        Name <br>
        Email <br>
        Role <br> 
        Status <br> 
    </div>

    <div class="col-sm-10 col-md-10 col-lg-10">
        : Fathur Walkers
        : fathurwalkers44@gmail.com 
        : Administrator 
        : Active 
    </div>

</div>
@endsection