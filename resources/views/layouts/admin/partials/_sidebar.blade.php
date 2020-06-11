<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{ asset('dist/img/AdminLTELogo.png') }}"
           alt="Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            @if(Storage::disk('public')->exists('users/'. Auth::user()->image))
                <img src="{{Storage::url('users/'.Auth::user()->image)}}" alt="{{Auth::user()->name}}" class="img-circle elevation-2" alt="User Image">
            @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->pseudo }}</a>
          <a href="#" class="d-block">{{ Auth::user()->last_name . " " . Auth::user()->first_name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ _('Tableau de bord') }}
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ Request::is('admin/roles*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/roles*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-trash-0"></i>
                        <p>
                            {{ _('Rôles') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.create') }}" class="nav-link {{ Request::is('admin/roles/create') ? 'active' : '' }}">
                                <p>Ajouter un rôle</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.roles.index') }}" class="nav-link {{ Request::is('admin/roles') ? 'active' : '' }}">
                                <p>Gérer les rôles</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ Request::is('admin/users*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-trash-0"></i>
                        <p>
                            {{ _('Utilisateurs') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.users.create') }}" class="nav-link {{ Request::is('admin/users/create') ? 'active' : '' }}">
                                <p>Ajouter un utilisateur</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ Request::is('admin/users') ? 'active' : '' }}">
                                <p>Gérer des utilisateurs</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ Request::is('admin/sectors*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/sectors*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-trash-0"></i>
                        <p>
                            {{ _('Filières') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.sectors.create') }}" class="nav-link {{ Request::is('admin/sectors/create') ? 'active' : '' }}">
                                <p>Ajouter une filière</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.sectors.index') }}" class="nav-link {{ Request::is('admin/sectors') ? 'active' : '' }}">
                                <p>Gérer les filières</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview {{ Request::is('admin/projects*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ Request::is('admin/projects*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-trash-0"></i>
                        <p>
                            {{ _('Projets') }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.projects.create') }}" class="nav-link {{ Request::is('admin/projects/create') ? 'active' : '' }}">
                                <p>Ajouter un projet</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.projects.index') }}" class="nav-link {{ Request::is('admin/projects') ? 'active' : '' }}">
                                <p>Gérer les projets</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
