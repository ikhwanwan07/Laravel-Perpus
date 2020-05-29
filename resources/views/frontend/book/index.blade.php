@extends('frontend.templates.default')
@section('content')
<div class="container">
    <h2>Koleksi Buku</h2>
 <blockquote>   <p class="flow-text">Koleksi buku yang bisa kamu pinjam dan baca</p></blockquote>
<div class="row">
    @foreach ($book as $b)
    
    <div class="col sm12 m6">
      <div class="card horizontal hoverable">
          <div class="card-image">
            <img src="{{ $b->getCover() }}" height="200px" >
          </div>
          <div class="card-stacked">
            <div class="card-content">
                <a href="{{ route('book.show',$b) }}">
                  <h6>{{ Str::limit($b->title,20) }}</h6>
                </a>
              <p>{{ Str::limit($b->description,50)  }}</p>
            </div>
            <div class="card-action">
              <form action="{{ route('book.borrow', $b) }}" method="POST">
                @csrf
                <input type="submit" class="btn red accent-1 right waves-effect waves-light" value="Pinjam Buku">
              
              </form>
            </div>
          </div>
        </div>
  </div>
        
    @endforeach
</div>
{{ $book->links('vendor.pagination.materialize') }}
@endsection
@push('script')
@if (session('toast'))

<script>

  M.toast({html: '{{ session('toast') }}' })
</script>
@endif
    
@endpush

