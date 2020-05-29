@extends('admin.templates.default')
@section('content')
    
    <div class="card">
        <div class="card-header">
            <h3 class="box-title">Data Penulis</h3>
            <a href="{{ route('admin.author.create') }}" class="btn btn-primary">Tambah Penulis</a>

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
                        <th>Id</th>
                        <th>Name</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                
                
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
            ajax : '{{ route('admin.author.data') }}',
                columns: [
                    {data: 'DT_RowIndex',orderable : false,searchable:false},
                    {data: 'name'},
                    {data: 'action'}
                ]
        });
    });
</script>
    
@endpush