@extends('admin.templates.default')
@section('content')
    
    <div class="card">
        <div class="card-header">
            <h3 class="box-title">Data Buku</h3>
            <a href="{{ route('admin.book.create') }}" class="btn btn-primary">Tambah Buku</a>
        </div>
        <div class="card-body">
            @if (session('success'))
           <div class="alert alert-success">
                {{ session('success') }}
        </div>
               
           @endif
           @if (session('update'))
           <div class="alert alert-info">
                {{ session('update') }}
        </div>
               
           @endif
           @if (session('delete'))
           <div class="alert alert-danger">
                {{ session('delete') }}
        </div>
               
           @endif

            <table id="dataTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        
                        <th>Title</th>
                        <th>Penulis</th>
                        <th>Description</th>
                        <th>Cover</th>
                        <th>Action</th>
                        
                         
                    </tr>
                </thead>
                {{-- <tbody>
                    <tr>
                        <td>coba</td>
                        <td>aman</td>
                    </tr>
                </tbody> --}}
                
                
                        </table>
        </div>
        
    </div>
    <form  action=" " method="POST" id="deleteForm">
        @csrf
        @method("DELETE")
        <input type="submit" value="Hapus" style="display:none">
    
    </form>
@endsection
@push('scripts')
<script>

    $(function() {
        $('#dataTable').DataTable({
            processing : true,
            serverSide : true,
            ajax : '{{ route('admin.book.data') }}',
                columns: [
                    {data: 'title'},
                    {data: 'author'},
                    {data: 'description'},
                    {data: 'cover'},
                    {data: 'action'}
                    

                ]
        });
    });
</script>
    
@endpush