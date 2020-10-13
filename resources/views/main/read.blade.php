@extends('layout.main_layout')
@section('nav_bar')
    <li class="nav-item mr-5">
        <a href="{{ route('insertData') }}" class="nav-link" href="#">Insert<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item mr-5">
        <a href="{{ route('updateDelete') }}" class="nav-link" href="#">Update/Delete</a>
    </li>
    <li class="nav-item active mr-5">
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
@if(Session::has('success'))
<div class="alert alert-success">
    {{Session::get('success')}}
</div>
@endif
@if(Session::has('error'))
<div class="alert alert-danger">
    {{Session::get('error')}}
</div>
@endif
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center" style="height: 90vh">

            <div class="col-xl-4" id="table1">
                <table class="table" id="tableLeft">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($table as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>{{ $item->price }}</td>
                                <td>{{ $item->stock }}</td>
                                <td><button onclick="addtoCart({{ $item->id }},'{{ $item->name }}','{{ $item->description }}',{{ $item->price }})">add</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-xl-2">

            </div>
            <div class="col-xl-4" id="table1">
            <form action={{route('InsertTransaction')}} id=form_checkout method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table" id="tableRight">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Stock</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="tableBodyRight">

                        </tbody>
                    </table>
                    <div class="form-group mt-5">
                        <label>Nama Penerima :</label>
                        <input type="text" class="form-control  @error('nama_penerima') is-invalid @enderror" name="nama_penerima">
                        @error('nama_penerima')
                        <span class="invalid-feedback" role="alert">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-info btn-block ">Checkout</button>
                </form>

            </div>

        </div>

    </div>


@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#tableLeft').DataTable();

        });
        var x = [];

        function addtoCart(id, name, description, price) {
            var kosong = '<tr><td>' + id + '</td><td>' + name + '</td><td>' + description + '</td><td>' + price +
                '</td><td> <input type="text" class="form-control" name="stock[]"></td> <td><button onclick="deleteRow(this,'+id+')">remove</button></td></tr>';

            let z = x.length;
            x.push(id);
            x = x.filter((value, index, self) => {
                return self.indexOf(value) === index;
            });
            let y = x.length;
            if (z < y) {

                document.getElementById("tableBodyRight").innerHTML += kosong;
                var checkout='<input name="id[]" type="hidden" value='+id+'>';
                document.getElementById("form_checkout").innerHTML += checkout;
            }
        }

        function deleteRow(r,id) {

            var index = x.indexOf(id);
        if (index >= 0) {
         x.splice( index, 1 );
            }
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("tableRight").deleteRow(i);
        }

    </script>
@endsection
