@extends('layouts.main')
@section('content')
<div class="col-lg-6 col-md-6 col-12 ">
    <div class="card">
        <div class="card-body">
            <form action="{{url('staffedit/'.$edit->id)}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="PATCH">
                <div class="col-lg-10 mb-4">
                    <label for="formFile" class="form-label text-dark text-bold">
                        <strong>Nama</strong>
                    </label>
                    <input type="text" id="formFile" name="name" value="{{$edit->name}}" placeholder=".." class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-10 mb-4">
                    <label for="formFile" class="form-label text-dark text-bold">
                        <strong>Email</strong>
                    </label>
                    <input type="email" id="formFile" name="email" value="{{$edit->email}}" placeholder=".." class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-10 mb-4">
                    <label for="formFile" class="form-label text-dark text-bold">
                        <strong>No HP</strong>
                    </label>
                    <input type="text" id="formFile" name="phone" value="{{$edit->phone}}" placeholder=".." class="form-control @error('phone') is-invalid @enderror">
                    @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-10 mb-4">
                    <label for="formFile" class="form-label text-dark text-bold">
                        <p class="text-secondary"><strong class="text-dark">Password</strong> </br>
                            INGAT! Minimal password terdiri dari 6 karakter </p>
                    </label>
                    <input type="password" id="formFile" placeholder="******" name="password" class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-10 mb-4">
                    <label for="formFile" class="form-label text-dark text-bold">
                        <strong>Password</strong>
                    </label>
                    <input type="password" id="formFile" placeholder="******" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                    @error('password_confirmation')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-10 text-end">
                    <button type="submit" class="btn btn-success text-white ">save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection