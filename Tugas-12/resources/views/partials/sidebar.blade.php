<div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          @auth
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
          @endauth

          @guest
          <a href="#" class="d-block">Guest</a>
          @endguest
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="/books" class="nav-link">
                  <i class="nav-icon fas fa-book-open"></i>
                  <p>Books</p>
                </a>
              </li>
          @auth              
              <li class="nav-item">
                <a href="/category" class="nav-link">
                  <i class="nav-icon fas fa-list-alt"></i>
                  <p>Category</p>
                </a>
              </li>
          @endauth

          @auth      
              <li class="nav-item"  >
              <a class="nav-link bg-danger" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                  </form>
              </li>
          @endauth

          @guest
              <li class="nav-item bg-green">
            <a href="/login" class="nav-link">
              <p>Login</p>
            </a>
          </li>
          @endguest
      </nav>
      <!-- /.sidebar-menu -->
    </div>