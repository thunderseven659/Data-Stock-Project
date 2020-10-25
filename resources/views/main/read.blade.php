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
        <a href="{{ route('verification') }}" class="nav-link" href="#">Verification</a>
    </li>

@endsection
@section('body')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="row d-flex justify-content-center align-items-center" style="height: 90vh">

            <div class="col-xl-4 m-5" id="table1">
                <div class="card bg-light" style="width: 40rem">
                    <h4 class="card-title border-bottom" style="text-align: center">
                        Item list
                    </h4>
                    <div class="card-body">
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
                                        <td>
                                            <button id="btn_add"
                                                onclick="addRow({{ $item->id }},'{{ $item->name }}','{{ $item->description }}',{{ $item->price }})">add</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-2">

            </div>
            <div class="col-xl-4" id="table1">
                <div class="card bg-light" style="width: 40rem">
                    <h4 class="card-title border-bottom" style="text-align: center">
                        Checkout List
                    </h4>
                    <div class="card-body">
                        <form action={{ route('InsertTransaction') }} id="form_checkout" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div id="hidden">

                            </div>
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
                                <input type="text" class="form-control  @error('nama_penerima') is-invalid @enderror"
                                    name="nama_penerima">
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

        </div>

    </div>


@endsection
@section('script')
    <script>
        var table_right;
        var x = [];
        $(document).ready(function() {
            $('#tableLeft').DataTable();
            table_right = $('#tableRight').DataTable();

        });
        function addRow(id, name, description, price) {
            let z = x.length;
            x.push(id);
            x = x.filter((value, index, self) => {
                return self.indexOf(value) === index;
            });

            let y = x.length;


            if (z < y) {

                table_right.row.add([
                    id,
                    name,
                    description,
                    price,
                    '<input type="text" class="form-control" name="stock[]">',
                    '<input type="button" id="#row-'+id+'" value="remove" onclick="deleteRow(this)">'
                ]).draw();
                 var checkout = '<input name="id[]" type="hidden" value=' + id + '>';
                 console.log();
                document.getElementById("hidden").innerHTML += checkout;
            }
        }

        function deleteRow(r) {
                table_right.row(r.parentNode.parentNode).remove().draw();
                x.pop();
        }

    </script>
@endsection
