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
                <form method="post" enctype="multipart/form-data">
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
                    @csrf
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
                '</td><td> <input type="text" class="form-control" name="stock"></td> <td><button onclick="deleteRow(this)">remove</button></td></tr>';

            let z = x.length;
            x.push(id);
            x = x.filter((value, index, self) => {
                return self.indexOf(value) === index;
            });
            let y = x.length;
            if (z < y) {
                document.getElementById("tableBodyRight").innerHTML += kosong;
            }
        }

        function deleteRow(r) {
            var i = r.parentNode.parentNode.rowIndex;
            document.getElementById("tableRight").deleteRow(i);
        }

    </script>
@endsection
