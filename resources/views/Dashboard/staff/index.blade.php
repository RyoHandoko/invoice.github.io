@extends('layouts.main')
@section('content')
<div class="row">
    <!-- column -->
    <div class="col-10">
        <div class="card">
            <div class="card-body">
                <!-- title -->
                <div class="col-lg-12">
                    <div>
                        @role('admin')
                        <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Buat Akun Staff
                        </button>
                        @endrole
                        @if(session()->has('upt'))
                        <div class="alert alert-success" role="alert">
                            Success Edit Akun.
                        </div>
                        @endif

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                <h5 class="text-dark"> Create Staff FAILED</h5>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(session()->has('scs'))
                        <div class="alert alert-success" role="alert">
                            Success Buat Akun
                        </div>
                        @endif
                        @if(session()->has('dlt'))
                        <div class="alert alert-success" role="alert">
                            Success Hapus Akun
                        </div>
                        @endif
                        <h4 class="card-title">Daftar Staff</h4>
                    </div>
                </div>
                <!-- title -->
                <div class="table-responsive">
                    <table class="table mb-0 table-hover align-middle text-nowrap">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Nama</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">No Handphone</th>
                                <th class="text-center"> Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($user as $us)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="">
                                            <h4 class="m-b-0 font-16">{{$i++}}.</h4>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>
                                        {{$us->name}}
                                    </h5>
                                </td>
                                <td>
                                    <h5>
                                        {{$us->email}}
                                    </h5>
                                </td>
                                <td>
                                    <h5>{{$us->phone}}</h5>
                                </td>
                                <td class="text-center">
                                    @role('admin')
                                    <a href="{{url('staffedit/'.$us->id)}}"><i class="fa-solid fa-pen-to-square"></i> Edit </a>
                                    <a href="{{url('stdelete/'.$us->id)}}" class="text-danger"> <i class="fa-solid fa-trash-can"></i> Hapus</a>
                                    @endrole
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
            <form method="POST" action="{{url('staff')}}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3 mt-2">
                        <label for="formFile" class="form-label">Nama</label>
                        <input type="text" id="formFile" placeholder="Nama Lengkap" class="form-control" name="name" value="{{old('name')}}" required autofocus autocomplete="name" autofocus oninvalid="this.setCustomValidity('Nama Tidak Boleh Kosong')" oninput="setCustomValidity('')">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Email</label>
                        <input type="email" id="formFile" placeholder="contoh@gmail.com" class="form-control" name="email" value="{{old('email')}}">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">No Handphone</label>
                        <input type="text" id="formFile" placeholder="+62.." class="form-control" name="phone" value="{{old('phone')}}">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Password</label>
                        <input type="password" id="formFile" placeholder=".." class="form-control" name="password" value="{{old('password')}}">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Confirm Password</label>
                        <input type="password" id="formFile" placeholder=".." class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}">
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