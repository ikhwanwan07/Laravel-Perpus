 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      
           
      <span class="brand-text font-weight-light">Perpus</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ route('admin.author.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Penulis
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('admin.book.index') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Buku
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.borrow.index') }}" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Data Pinjaman
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('admin.borrow.history') }}" class="nav-link">
              <i class="nav-icon fas fa-history"></i>
              <p>
                Histori Pinjaman
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
              User
                
              </p>
            </a>
          </li>
        
        
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->