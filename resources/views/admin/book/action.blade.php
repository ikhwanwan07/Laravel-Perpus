<a href="{{ route('admin.book.edit', $model) }}" class="btn btn-warning">Edit</a>
<button href="{{ route('admin.book.destroy', $model) }}"  id="delete" class="btn btn-danger">Hapus</button>


<script>
$('button#delete').on('click', function(e){
    e.preventDefault();

    var href = $(this).attr('href');

    document.getElementById('deleteForm').action = href;
    document.getElementById('deleteForm').submit();
});

</script> 