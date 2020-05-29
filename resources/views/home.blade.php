@extends('frontend.templates.default')

@section('content')
<div class="row">
    <h1>Buku yang sedang dipinjam</h1>
    @foreach ($book as $b)
        
    
    <div class="col sm12 m12">
        <div class="card horizontal hoverable">
            {{-- <div class="card-image"> --}}
              <img src="{{ $b->getCover() }}" height="400px" >
            {{-- </div> --}}
            <div class="card-stacked">
              <div class="card-content">
                  
                    <h4 class="red-text accent-2">{{ Str::limit($b->title,20) }}</h4>
                 <blockquote>
                <p>{{ $b->description  }}</p>
              </blockquote>
              <p>
                  <i class="material-icons">person</i> : {{ $b->author->name }}
              </p>
              <p>
                  
              </p>
              </div>
              
              
            </div>
          </div>
    </div>
    @endforeach
</div>

@endsection
