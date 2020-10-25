@extends('layout.main_layout')
@section('nav_bar')
    <li class="nav-item mr-5">
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
                                    <tr class="detail-barang">
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->stock }}</td>
                                        <td>
                                            <div id="code{{ $item->id }}">

                                            </div>
                                        </td>
                                        <td>
                                        <button id="btn_print" onclick="print('{{ $item->id }}','{{$item->name}}')">Print</button>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')
    <script>
        function makeCode() {
            var elText = document.getElementById("text");

            if (!elText.value) {
                alert("Input a text");
                elText.focus();
                return;
            }

            qrcode.makeCode(elText.value);
        }
        $(document).ready(function() {
            table_left = $('#tableLeft').DataTable();
            console.log(document.getElementsByClassName('detail-barang')[1].children[0].innerHTML);
            console.log(document.getElementsByClassName('detail-barang').length);
            var x = document.getElementsByClassName('detail-barang').length;
            for (var y = 0; y < x; y++) {
                var qrcode = new QRCode("code" + document.getElementsByClassName('detail-barang')[y].children[0]
                    .innerHTML, {
                        width: 100,
                        height: 100,
                    });
                qrcode.makeCode(document.getElementsByClassName('detail-barang')[y].children[0].innerHTML);
                var z = document.getElementById("code" + document.getElementsByClassName('detail-barang')[y]
                    .children[0].innerHTML);
                z.children[0].id = "canvas" + document.getElementsByClassName('detail-barang')[y].children[0]
                    .innerHTML;
            }
        });

        function print(idCanvas,name) {
            download('canvas'+idCanvas, name);
        }

        function download(canvas, filename) {
            /// create an "off-screen" anchor tag
            var lnk = document.createElement('a'),
                e;

            /// the key here is to set the download attribute of the a tag
            lnk.download = filename;

            /// convert canvas content to data-uri for link. When download
            /// attribute is set the content pointed to by link will be
            /// pushed as "download" in HTML5 capable browsers
            lnk.href = document.getElementById(canvas).toDataURL("image/png;base64");

            /// create a "fake" click-event to trigger the download
            if (document.createEvent) {
                e = document.createEvent("MouseEvents");
                e.initMouseEvent("click", true, true, window,
                    0, 0, 0, 0, 0, false, false, false,
                    false, 0, null);

                lnk.dispatchEvent(e);
            } else if (lnk.fireEvent) {
                lnk.fireEvent("onclick");
            }
        }

    </script>
@endsection
