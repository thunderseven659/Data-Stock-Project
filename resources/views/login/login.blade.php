@extends('layout.layout')
@section('nav_bar_right')

<li class="nav-item active mr-5">
    <a href="{{route('login')}}" class="nav-link" href="#">Login<span class="sr-only">(current)</span></a>
</li>
<li class="nav-item mr-5">
<a href="{{route('register')}}" class="nav-link" href="#">Register</a>
</li>

@endsection
@section('body')

 <div class="container d-flex justify-content-center align-items-center" style="min-height: 90vh">
    <div class="card w-75">
        <div class="card-header">
          Login
        </div>
        <div class="card-body">
            <form action="{{route('main')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-5">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group form-check mb-5">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Remember me!</label>
                </div>
                <button type="submit" class="btn btn-primary w-100 mb-5">Submit</button>
              </form>
              <div class="error text-center">

                @if (Session::has("error"))
                <div class="alert alert-danger" role="alert">
                    {{Session::get("error")}}
                  </div>

                @endif
            </div>
        </div>
      </div>
</div>

@endsection
