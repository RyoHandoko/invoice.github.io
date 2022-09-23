@extends('layouts.main')
@section('content')
<div class="row">
    <!-- column -->
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <!-- title -->
                <div class="col-lg-12">
                    <div>
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Buat Produk
                        </button>
                        <h4 class="card-title">Tabel Produk</h4>
                        @if(session()->has('delete'))
                        <div class="alert alert-success" role="alert">
                            Arsip Deleted successfully.
                        </div>
                        @endif
                    </div>
                </div>
                <!-- title -->
                <div class="table-responsive">
                    <table class="table mb-0 table-hover align-middle text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">Price</th>
                                <th class="border-top-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $prd)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <h4 class="m-b-0 font-16">1.</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>
                                        {{$prd->name}}
                                    </h5>
                                </td>
                                <td>
                                    <h5>
                                        Rp. {{$prd->price}}
                                    </h5>
                                </td>
                                <td>
                                    <a href="{{url('deleteproduct/'.$prd->id)}}"><i class="fa-solid fa-trash-can"></i></a>
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

<!-- Modal Create -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form method="POST" action="{{url('addproduct')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3 mt-2">
                        <label for="formFile" class="form-label">Nama</label>
                        <input type="text" id="formFile" placeholder=".." class="form-control" name="name" required autocomplete="name" autofocus oninvalid="this.setCustomValidity('Nama produk Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">price</label>
                        <input type="text" id="formFile" placeholder=".." class="form-control" name="price" required autocomplete="name" autofocus oninvalid="this.setCustomValidity('harga produk Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection