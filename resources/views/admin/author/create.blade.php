@extends('admin.templates.default')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah data penulis</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.author.store') }}" method="POST">
            @csrf
        <div class="form-group">
        <label for="">Input Nama</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="masukkan nama" style="width: 30%;">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
            <div class="form-group mt-2">
        <button type="submit" class="btn btn-primary">Tambah</button>
    </div>
    </div>
</form>
    </div>
</div>
    
@endsection