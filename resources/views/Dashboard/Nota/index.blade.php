@extends('layouts.main')
@section('content')
<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <h6 class="text-danger">
                    <strong>
                        INVOICE sudah terbuat, dan otomatis tersimpan.
                    </strong>
                </h6>

                <form method="POST" action="{{url('nota/'.$invc->id)}}" enctype="multipart/form-data">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="_method" value="PATCH">
                        <div class="col-lg-4">
                            <label for="formFile" class="form-label">Product</label>
                            <select class="form-select" aria-label="Default select example" name="produk" required autofocus oninvalid="this.setCustomValidity('Pilih Produk Dahulu')" oninput="setCustomValidity('')">
                                <option value="">--Pilih Product--</option>
                                @foreach ($prd as $prd)
                                <option value="{{$prd->id}}">{{$prd->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4">
                            <label for="formFile" class="form-label text-bold">Jumlah</label>
                            <input type="text" id="formFile" name="jumlah" placeholder=".." class="form-control" required autofocus oninvalid="this.setCustomValidity('Jumlah Produk Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                            @error('jumlah')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-sm btn-primary mt-4">Tambah</button>
                        </div>
                    </div>
                </form>

                <div class="table-responsive col-9 mt-4">
                    <table class="table mb-0 table-hover align-middle text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">Kuantitas</th>
                                <th class="border-top-0">Harga</th>
                                <th class="border-top-0">Total Harga</th>
                                <th class="border-top-0 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invD as $inv)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <a href="">
                                                <h4 class="m-b-0 font-16">{{$inv->product->name}}</h4>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-dark">{{$inv->qty}}</td>
                                <td class="text-dark">{{Str::rupiah($inv->product->price)}}</td>
                                <td class="text-dark">{{Str::rupiah($inv->total)}}</td>
                                <td>
                                    <form action="{{url('notadelete/'.$inv->id)}}" method="POST" class="text-center">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="text-danger btn btn-bg-transparent"><i class="fa-solid fa-trash-can"></i> Delete </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <table class="table mb-0 table-hover align-middle text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">Total Belanja</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th class="text-end text-dark">{{Str::rupiah($invc->total_harga)}}</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="col-lg-9 text-end">
                    <a href="{{url('print/'.$invc->id)}}">
                        <button class="text-end btn btn-success mt-2">Print</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection