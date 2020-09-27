@extends('layout')

@section('body')
<div class="body">
    <div class="background">


    </div>
    <div class="title">Register</div>
    <form action="welcome" method="POST">
        <div class="FullForm">
            <div class="Form">
                <div class="username">
                    <label for="username"><b>Username :</b></label>
                    <input type="text" placeholder="Enter username" name="username" required>
                </div>
                <div class="email">
                    <label for="email"><b>Email :</b></label>
                    <input type="text" placeholder="Enter valid Email" name="email" required>
                </div>
                <div class="password">
                    <label for="password"><b>Password :</b></label>
                    <input type="password" placeholder="Enter password" name="password" required>
                </div>
                <div class="re-password">
                    <label for="re-password"><b>re-type Password :</b></label>
                    <input type="password" placeholder="Enter password" name="re-password" required>
                </div>

            </div>
            <div class="Button">
                    <button type="submit">Register</button>
            </div>
        </div>
    </form>
</div>
<div class="footer">

</div>
@endsection
