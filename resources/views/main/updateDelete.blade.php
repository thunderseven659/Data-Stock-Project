@extends('layout.main_layout')
@section('nav_bar')
    <li class="nav-item mr-5">
        <a href="{{ route('insertData') }}" class="nav-link" href="#">Insert<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item active mr-5">
        <a href="{{ route('updateDelete') }}" class="nav-link" href="#">Update/Delete</a>
    </li>
    <li class="nav-item mr-5">
        <a href="{{ route('read') }}" class="nav-link" href="#">Read</a>
    </li>
@endsection
@section('nav_bar_right')

    <li class="nav-item mr-5">
        <a href="{{ route('verification') }}" class="nav-link" href="#">Verification</a>
    </li>

@endsection
@section('body')
    <div class="container-fluid">
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
        <div class="row d-flex justify-content-center align-items-center" style="height: 90vh">
            <div class="col-xl-4" id="table1">
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
                                            <button id="btn_update"
                                                onclick="updateRow({{ $item->id }},'{{ $item->name }}','{{ $item->description }}',{{ $item->price }},{{ $item->stock }},'{{$item->image}}')">update</button>
                                        </td>
                                        <td>
                                        <form action='{{route('deleteBarang',['id'=>$item->id])}}' id=form_delete method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" id="btn_delete" onclick="return confirm('Are you sure want to delete?')">delete</button>
                                            </form>
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
                <div class="card bg-light m-5" style="width: 40rem">
                    <div class="card-body">
                        <form action='' id="form_update" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div id="update">
                                <div class="form-group">
                                    <label>ID :</label>
                                    <label id="label_id"></label>
                                </div>
                                <div class="form-group">
                                    <label>Item name :</label>
                                    <input type="text" class="form-control  @error('item_name') is-invalid @enderror"
                                        name="item_name" id="item_name" value="">
                                    @error('item_name')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Description :</label>
                                    <input type="text" class="form-control  @error('description') is-invalid @enderror"
                                        name="description" id="description" value="">
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
                                        <input type="text" class="form-control  @error('price') is-invalid @enderror"
                                            name="price" id="price" value="">
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
                                        <input type="text" class="form-control  @error('stock') is-invalid @enderror"
                                            name="stock" id="stock" value="">
                                        @error('stock')
                                        <span class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="container-img" id="img_pict">

                                </div>
                                <div id="image_preview">
                                    <img id="image1"src="{{ asset('/asset/no_image.png') }}" style="height:10vh;">
                                </div>
                                <div class="form-group">
                                    <label>Image :</label>
                                    <input type="file" class="form-control-file  @error('image') is-invalid @enderror"
                                        name="image">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-block ">Update</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            table_left=$('#tableLeft').DataTable();
        });

        function updateRow(id, name, description, price, stock, img) {
            document.getElementById("form_update").action = "/updateDelete/update/"+id+"/";
            document.getElementById("label_id").innerHTML = id;
            document.getElementById("item_name").value = name;
            document.getElementById("description").value = description;
            document.getElementById("price").value = price;
            document.getElementById("stock").value = stock;
            document.getElementById("image1").src='/storage/'+img;
        }
        function deleteRow(r)
        {
            table_left.row(r.parentNode.parentNode).remove().draw();
            var id = r.parentNode.parentNode.childNodes[1].innerHTML;
            //delete by id
        }
    </script>
@endsection
