@extends('frontend.templates.default')
@section('content')
<div class="container ">
    <h4>Detail Buku </h4>
<div class="row justify-content-center">
    <div class="col sm12 m12">
      <div class="card horizontal hoverable">
          {{-- <div class="card-image"> --}}
            <img src="{{ $book->getCover() }}" height="400px" >
          {{-- </div> --}}
          <div class="card-stacked">
            <div class="card-content">
                
                  <h4 class="red-text accent-2">{{ Str::limit($book->title,20) }}</h4>
               <blockquote>
              <p>{{ $book->description  }}</p>
            </blockquote>
            <p>
                <i class="material-icons">person</i> : {{ $book->author->name }}
            </p>
            <p>
                <i class="material-icons">book</i> : {{ $book->qty }}
            </p>
            </div>
            <div class="card-action">
              <form action="{{ route('book.borrow', $book) }}" method="POST">
                @csrf
                <input type="submit" class="btn red accent-1 right waves-effect waves-light" value="Pinjam Buku">
              
              </form>
            </div>
            
          </div>
        </div>
  </div>
        
    
</div>
<h5>Buku lainnya dari penulis {{ $book->author->name }} ...</h5>
<div class="row">
    
    @foreach ($book->author->books->shuffle()->take(5) as $book)
    
    <div class="col sm12 m6">
      <div class="card horizontal hoverable">
          <div class="card-image">
            <img src="{{ $book->getCover() }}" height="200px" >
          </div>
          <div class="card-stacked">
            <div class="card-content">
                <a href="{{ route('book.show',$book) }}">
                  <h6>{{ Str::limit($book->title,20) }}</h6>
                </a>
              <p>{{ Str::limit($book->description,50)  }}</p>
            </div>
            <div class="card-action">
              <form action="{{ route('book.borrow', $book) }}" method="POST">
                @csrf
                <input type="submit" class="btn green accent-1 right waves-effect waves-light" value="Pinjam Buku">
              
              </form>
            </div>
          </div>
        </div>
  </div>
        
    @endforeach
</div>
</div>

@endsection
@push('script')
@if (session('toast'))

<script>

  M.toast({html: '{{ session('toast') }}' })
</script>
@endif
    
@endpush
