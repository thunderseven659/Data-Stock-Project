@extends('layout')
@section('body')
 <div class="body">
        <div class="background">


        </div>
        <div class="title">Login</div>
        <form action="{{route('main')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="FullForm">
                <div class="Form">
                    <div class="username">
                        <label for="username"><b>Username :</b></label>
                        <input type="text" placeholder="Enter username" name="username" required>
                    </div>
                    <div class="password">
                        <label for="password"><b>Password :</b></label>
                        <input type="password" placeholder="Enter password" name="password" required>
                    </div>
                </div>
                <div class="Button">
                    <div class="Remember">
                        <label>
                            <input type="checkbox" checked="checked" name="remember"> Remember Me!
                        </label>
                    </div>
                    <div class="Login">
                        <button type="submit">Login</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="footer">

    </div>
@endsection
