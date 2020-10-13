@extends('layout.main_layout')
@section('nav_bar')
    <li class="nav-item active mr-5">
        <a href="{{ route('insertData') }}" class="nav-link" href="#">Insert<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item mr-5">
        <a href="{{ route('updateDelete') }}" class="nav-link" href="#">Update/Delete</a>
    </li>
    <li class="nav-item mr-5">
        <a href="{{ route('read') }}" class="nav-link" href="#">Read</a>
    </li>
@endsection
@section('nav_bar_right')
    <li class="nav-item mr-5">
        <a class="btn btn-light" href="#" role="button">Check out</a>
    </li>
    <li class="nav-item mr-5">
        <a href="{{ route('verification') }}" class="nav-link" href="#">Verification</a>
    </li>
@endsection
@section('body')
    @if(Session::has('Success'))
    <div class="alert alert-success">
        {{Session::get('Success')}}
    </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="d-flex justify-content-center align-items-center " style="min-height: 90vh">
        <div class="card w-75">
            <div class="card-header">
                Insert
            </div>
            <div class="card-body">
                <form action="{{ route('insertBarang') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Item name :</label>
                        <input type="text" class="form-control  @error('item_name') is-invalid @enderror" name="item_name">
                        @error('item_name')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Description :</label>
                        <input type="text" class="form-control  @error('description') is-invalid @enderror"
                            name="description">
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Price :</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                            <input type="text" class="form-control  @error('price') is-invalid @enderror" name="price">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Stock :</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control  @error('stock') is-invalid @enderror" name="stock">
                            @error('stock')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Image :</label>
                        <input type="file" class="form-control-file  @error('image') is-invalid @enderror" name="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-5">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
