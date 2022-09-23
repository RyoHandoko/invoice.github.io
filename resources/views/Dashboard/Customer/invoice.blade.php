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
                        <a href="{{url('pelanggan')}}" class="btn btn-primary mb-2"><i class="fa-solid fa-arrow-left"></i> Back</a>
                        <h4 class="card-title">Riwayat Belanja Customer : {{$user->nama}}</h4>
                        @if(session()->has('scs'))
                        <div class="alert alert-success" role="alert">
                            Success Delete Invoice
                        </div>
                        @endif
                        <h5 class="card-subtitle">List Invoice :</h5>
                    </div>
                    <div class="ms-auto">
                    </div>
                </div>
                <!-- title -->
                <div class="table-responsive">
                    <table class="table mb-0 table-hover align-middle text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">No.</th>
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">Total Belanja</th>
                                <th class="border-top-0">Tanggal Belanja</th>
                                <th class="border-top-0">Aksi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($inv as $key => $cs)
                            <tr>
                                <td>{{$inv->firstItem() + $key }}.</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <h4 class="m-b-0 font-16">{{$cs->invoice}}</h4>
                                    </div>
                                </td>
                                <td>{{Str::rupiah($cs->total_harga)}}</td>
                                <td>{{$cs->tanggal}}</td>
                                <td>
                                    <!-- <a href="{{url('nota/'.$cs->id)}}"><i class="fa-solid fa-pen-to-square"></i></a> -->
                                    <form action="{{url('deleteinv/'.$cs->id)}}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-bg-transparent text-danger"><i class="fa-solid fa-trash-can"></i> Hapus</button>
                                    </form>
                                    <a href="{{url('print/'.$cs->id)}}" target="_blank" class="text-success"><i class="fa-solid fa-file-invoice-dollar"></i> Print</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $inv->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection