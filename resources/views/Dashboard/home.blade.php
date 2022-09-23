@extends('layouts.main')
@section('content')
<div class="row">
    <!-- column -->
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- title -->
                <div class="d-md-flex">
                    <div>
                        <h4 class="card-title">Daftar Invoice</h4>
                        <h5 class="card-subtitle"></h5>
                    </div>
                    <div class="ms-auto">
                        <div class="dl">
                            <form action="{{url('home')}}" method="GET">
                                <input class="form-control" name="search" value="{{request('search')}}" list="datalistOptions" id="exampleDataList" placeholder="Cari Invoice...">
                            </form>
                        </div>
                    </div>
                </div>
                <!-- title -->
                <div class="table-responsive">
                    <table class="table mb-0 table-hover align-middle text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">NO</th>
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">Invoice</th>
                                <th class="border-top-0">Alamat</th>
                                <th class="border-top-0">No Telp</th>
                                <th class="border-top-0">Tanggal Order</th>
                                <th class="border-top-0">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($invoice as $key => $inv)
                            <tr>
                                <td>
                                    <div class=" d-flex align-items-center">
                                        <div class="">
                                            <h4 class="m-b-0 font-16">{{$invoice->firstItem() + $key }}.</h4>
                                        </div>
                                    </div>
                                </td>
                                <td> {{$inv->user->nama}}</td>
                                <td>
                                    <h5>
                                        <a href="{{url('print/'.$inv->id)}}" target="_blank">
                                            {{$inv->invoice}}
                                        </a>
                                    </h5>
                                </td>
                                <td>{{$inv->user->alamat}}</td>
                                <td>{{$inv->user->nohp}}</td>
                                <td>{{$inv->tanggal}}</td>
                                <td>
                                    <h5 class="m-b-0">{{Str::rupiah($inv->total_harga)}}</h5>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-center mt-3">
                        {{ $invoice->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection