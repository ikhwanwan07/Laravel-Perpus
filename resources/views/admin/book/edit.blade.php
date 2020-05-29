@extends('admin.templates.default')
@section('content')

<style>
.form-control {
    width: 50%
}

</style>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Edit data Buku</h3>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.book.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group">
                <label for="">Penulis</label> <br>
                <select name="author_id" id="" class="form-control select2  @error('author_id') is-invalid @enderror" value="{{ $book->author_id }}">
                    @foreach ($penulis as $p)
                    <option value="{{ $p->id }}"
                        @if ($p->id == $book->author_id)
                        selected
                            
                        @endif
                        
                        >{{ $p->name }}</option>
                        
                    @endforeach
                </select>
                @error('author_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
        <div class="form-group">
        <label for="">Judul</label>
        <input type="text" name="title" class="form-control mb-2  @error('title') is-invalid @enderror" value="{{$book->title}}" placeholder="masukkan nama" >
        @error('title')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>
        <div class="form-group">
            <label for="">Deskripsi</label>
            <textarea name="description" id="" cols="30" rows="10" class="form-control  @error('description') is-invalid @enderror"  >{{ $book->description ?? old('description')}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
            
                <div class="form-group">
                    <label for="">Sampul</label>
                    <input type="file" name="cover" class="form-control mb-2  @error('cover') is-invalid @enderror" value="{{$book->cover }}"placeholder="masukkan Cover" >
                    @error('cover')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="text" name="qty" class="form-control mb-2  @error('qty') is-invalid @enderror" value="{{ $book->qty }}"placeholder="masukkan jumlah" >
                        @error('qty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div> 
                    <button type="submit" class="btn btn-primary" >Update</button>
                </form>
    </div>
   
    </div>

    
@endsection
@push('select2css')
<link rel="stylesheet" href="{{asset('assets\plugins\select2\css\select2.min.css') }}">
    
@endpush
@push('scripts')
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
    $('.select2').select2();

</script>
    
@endpush
