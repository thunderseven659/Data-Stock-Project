@extends('layout.layout')
@section('nav_bar_right')

<li class="nav-item mr-5">
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
        Data Stock Executive - Introduction
        </div>
        <div class="card-body">
            <p>
                DataStock Executive adalah website yang bisa digunakan oleh penjual,
                wirausaha maupun seller dari online marketplace untuk menyimpan data stock,
                membantu pembukuan keuangan dan menyimpan data jasa pengantaran yang akan
                digunakan untuk mengantarkan barang yang anda jual.
            </p>

        </div>
      </div>
</div>

@endsection
