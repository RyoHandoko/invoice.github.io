@extends('layouts.main')
@section('content')
<div class="row">
    <!-- column -->
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <!-- title -->
                <div class="d-md-flex">
                    <div>
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Buat Akun Pelanggan
                        </button>
                        <h4 class="card-title">Daftar Pelanggan</h4>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                <h5 class="text-dark"> GAGAL membuat pelanggan -</h5>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(session()->has('scs'))
                        <div class="alert alert-success" role="alert">
                            Success Membuat Pelanggan
                        </div>
                        @endif
                    </div>
                    <div class="ms-auto">
                        <div class="dl">
                            <form action="{{url('pelanggan')}}" method="GET">
                                <input class="form-control" name="search" value="{{request('search')}}" placeholder="Cari Customer...">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- title -->
                <div class="table-responsive">
                    <table class="table mb-0 table-hover align-middle text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">Alamat</th>
                                <th class="border-top-0">No Telp</th>
                                <th class="border-top-0">Lihat Invoice</th>
                                <th class="border-top-0">Tambah Nota</th>
                                <th>Akun</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($plg as $key => $cs)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <h4 class="m-b-0 font-16">{{$plg->firstItem() + $key }}.</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$cs->nama}}</td>
                                <td>{{$cs->alamat}}</td>
                                <td>{{$cs->nohp}}</td>
                                <td>
                                    <a href="{{url('invoice/'.$cs->id)}}"><i class="fa-solid fa-file"></i> Lihat</a>
                                </td>
                                <td>
                                    <form method="POST" action="{{url('addcustomer/'.$cs->id)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-bg-transparent text-primary"><i class="fa-solid fa-plus"></i> Buat</button>
                                    </form>

                                </td>
                                <td>
                                    <a href="#"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{url('dltpelanggan/'.$cs->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-bg-transparent text-danger"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $plg->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('pelanggan')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 mt-2">
                        <label for="formFile" class="form-label">Nama</label>
                        <input type="text" id="formFile" placeholder="Nama Customer" value="{{old('nama')}}" class="form-control" name="nama" required autocomplete="name" autofocus oninvalid="this.setCustomValidity('Nama Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                    </div>
                    <div class=" mb-3">
                        <label for="formFile" class="form-label">Alamat</label>
                        <input type="text" id="formFile" placeholder="Alamat Customer" value="{{old('alamat')}}" class="form-control" name="alamat" required autocomplete="name" autofocus oninvalid="this.setCustomValidity('Alamat Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">No Telp</label>
                        <input type="text" id="formFile" placeholder="No Handphone" class="form-control" value="{{old('nohp')}}" name="nohp" required autocomplete="name" autofocus oninvalid="this.setCustomValidity('No Telp Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                        @error('nohp')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
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