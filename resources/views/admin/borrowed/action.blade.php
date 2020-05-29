<button href="{{ route('admin.borrow.return',$model) }}"  id="return" class="btn btn-info">Pengembalian</button>

<script>
    $('button#return').on('click', function(e){
        e.preventDefault();
    
        var href = $(this).attr('href');
    
        document.getElementById('returnForm').action = href;
        document.getElementById('returnForm').submit();
    });
    
    </script> 

