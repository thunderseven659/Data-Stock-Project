@extends('layout.main_layout')
@section('nav_bar')
<li class="nav-item mr-5">
    <a href="{{route('insertData')}}" class="nav-link" href="#">Insert<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item mr-5">
    <a href="{{route('updateDelete')}}" class="nav-link" href="#">Update/Delete</a>
</li>
<li class="nav-item mr-5">
    <a href="{{route('read')}}" class="nav-link" href="#">Read</a>
</li>
@endsection
@section('nav_bar_right')
<li class="nav-item active mr-5">
    <a href="{{route('verification')}}" class="nav-link" href="#">Verification</a>
</li>

@endsection
@section('body')

@endsection
