@extends('layout.layout')
@section('nav_bar_right')

<li class="nav-item  mr-5">
    <a href="{{route('login')}}" class="nav-link" href="#">Login<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item active mr-5">
<a href="{{route('register')}}" class="nav-link" href="#">Register</a>
</li>

@endsection
@section('body')
<div class="body">
    <div class="background">


    </div>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh">
        <div class="card w-75">
            <div class="card-header">
            Register
            </div>
            <div class="card-body">
                <form action="{{route('insertRegister')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" required aria-describedby="emailHelp">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          {{ $message }}
                      </span>
                  @enderror
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                    <div class="form-group mb-5">
                        <label>Re-type Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                    @enderror
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                  </form>
            </div>
          </div>
    </div>

</div>
<div class="footer">

</div>
@endsection
