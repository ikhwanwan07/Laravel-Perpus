<a href="{{ route('admin.author.edit', $model) }}" class="btn btn-warning">Edit</a>
<button href="{{ route('admin.author.delete', $model) }}"  id="delete" class="btn btn-danger">Hapus</button>


<script>
$('button#delete').on('click', function(e){
    e.preventDefault();

    var href = $(this).attr('href');

    document.getElementById('deleteForm').action = href;
    document.getElementById('deleteForm').submit();
});

</script> 