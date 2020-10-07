@extends('main_layout')
@section('nav_bar')
<li class="nav-item mr-5">
<a href="{{route('insertData')}}" class="nav-link" href="#">Insert<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item mr-5">
    <a class="nav-link" href="#">Update/Delete</a>
</li>
<li class="nav-item mr-5">
    <a class="nav-link" href="#">Read</a>
</li>
@endsection
@section('nav_bar_right')
<li class="nav-item mr-5">
    <a class="btn btn-warning" href="#" role="button">Check out</a>
</li>
<li class="nav-item mr-5">
    <a class="nav-link" href="#">Verification</a>
</li>
<li class="nav-item">
    <button type="button" class="btn btn-light mr-5">Generate Report</button>
</li>
<li class="nav-item ">
    <button type="button" class="btn btn-danger">Logout</button>
</li>
@endsection
@section('body')
datastock adalah good game
@endsection
