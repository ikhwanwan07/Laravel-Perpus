@extends('admin.templates.default')
@section('content')
    
    <div class="card">
        <div class="card-header">
            <h3 class="box-title">Data Buku pinjaman</h3>
            
        </div>
        <div class="card-body">
          
            <div class="card-body">
                @if (session('success'))
                <div class="alert alert-success">
                     {{ session('success') }}
             </div>
             @endif
            <table id="dataTable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Judul</th>
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
    <form  action=" " method="POST" id="returnForm">
        @csrf
        @method("PUT")
        <input type="submit" value="Pengebalian" style="display:none">
    
    </form>
    
@endsection
@push('scripts')
<script>

    $(function() {
        $('#dataTable').DataTable({
            processing : true,
            serverSide : true,
            ajax : '{{ route('admin.borrowed.data') }}',
                columns: [
                    {data :'DT_RowIndex', orderable: false ,searchable:false},
                    {data: 'user'},
                    {data: 'book_title'},
                    {data: 'action'}
                    
                    

                ]
        });
    });
</script>
    
@endpush