<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <!-- Status -->
                {{ Auth::user()->role->name }}
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="{{ request()->route()->getName() == 'home' ? 'active' : '' }}">
                <a href="{{ route('home') }}"><i class="fa fa-link"></i> <span>Home</span></a>
            </li>
            <li class="treeview {{ request()->route()->getName() == 'book.index' || request()->route()->getName() == 'book.pending' ? 'active' : '' }}">
                <a href="#"><i class="fa fa-book"></i> <span>Books</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="{{ request()->route()->getName() == 'book.index' ? 'active' : '' }}">
                        <a href="{{ route('book.index') }}">Book List</a></li>
                    @if (auth()->user()->role->name === 'admin')
                    <li class="{{ request()->route()->getName() == 'book.pending' ? 'active' : '' }}"><a
                            href="{{ route('book.pending') }}">Pending Approval Books</a></li>
                    @endif
                </ul>
            </li>
            @if (auth()->user()->role->name === 'admin')  
            <li class="{{ request()->route()->getName() == 'user' ? 'active' : '' }}">
              <a href="{{ route('user.index') }}"><i class="fa fa-link"></i> <span>User</span></a>
            </li>
            @endif
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
