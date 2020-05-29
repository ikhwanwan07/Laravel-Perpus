@extends('admin.templates.default')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit data penulis</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.author.update', $author) }}" method="POST">
            @csrf
            @method("PUT")
        <div class="form-group">
        <label for="">Input Nama</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{  $author->name}}" placeholder="masukkan nama" style="width: 30%;">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        <div class="form-group">
            <button type="submit" class="btn btn-primary mt-2">Tambah</button>
        </div>
    </div>
</form>
    </div>
</div>
    
@endsection