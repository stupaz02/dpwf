<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
       <?php $currentUser = Auth::user() ?> 
        <div class="pull-left image">
          <img src="{{ $currentUser->gravatar() }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> {{ Auth::user()->name}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li>
          <a href="{{route('home')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        @if (check_user_permissions(request(),"Categories@index"))
          <li><a href="{{ route('categories.index')}}"><i class="fa fa-folder"></i> <span>Categories</span></a></li>
        @endif
        @if (Auth::user()->hasRole('admin'))
          <li><a href="{{ route('events.index')}}"><i class="fa fa-calendar" aria-hidden="true"></i> <span>Events</span></a></li>
        @endif
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pencil"></i>
            <span>Posts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('post.index')}}"><i class="fa fa-circle-o"></i> All Posts</a></li>
            <li><a href="{{ route('post.create')}}"><i class="fa fa-circle-o"></i> Add New</a></li>
          </ul>
        </li>

        @if (Auth::user()->hasRole('admin'))
        <li><a href="{{ route('events.index')}}"><i class="fa fa-sliders" aria-hidden="true"></i> <span>Slides</span></a></li>
      @endif

        @if (check_user_permissions(request(),"Users@index"))
          <li><a href="{{ route('users.index')}}"><i class="fa fa-users"></i> <span>Users</span></a></li>
        @endif
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>