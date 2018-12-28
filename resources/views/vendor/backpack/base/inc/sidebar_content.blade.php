<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item has-treeview">
      <a href="{{ backpack_url('dashboard') }}" class="nav-link">
        <i class="nav-icon fa fa-dashboard"></i>
        <p>
          {{ trans('backpack::base.dashboard') }}
        </p>
      </a>
    </li>
    <li class="nav-item has-treeview">
      <a href="{{ backpack_url('elfinder') }}" class="nav-link ">
        <i class="nav-icon fa fa-file-o"></i>
        <p>
          {{ trans('backpack::crud.file_manager') }}
        </p>
      </a>
    </li>
    <li class="nav-item has-treeview">
      <a href="{{backpack_url('page') }}" class="nav-link">
        <i class="nav-icon fa fa-files-o"></i>
        <p>
          Pages
        </p>
      </a>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fa fa-group"></i>
        <p>
          Users
          <i class="right fa fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ backpack_url('user') }}" class=" nav-link">
            <i class="fa fa-user nav-icon"></i>
            <p>Users</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ backpack_url('role') }}" class="nav-link">
            <i class="fa fa-group nav-icon"></i>
            <p>Roles</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ backpack_url('permission') }}" class="nav-link">
            <i class="fa fa-key nav-icon"></i>
            <p>Permissions</p>
          </a>
        </li>
      </ul>
    </li>
      <li class="nav-item has-treeview">
        <a href="{{ backpack_url('menu-item') }}" class="nav-link">
          <i class="nav-icon fa fa-list"></i>
          <p>Menu</p>
        </a>
      </li>
      <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-dashboard"></i>
          <p>News
          <i class="right fa fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ backpack_url('article') }}" class="nav-link">
            <i class="fa fa-newspaper-o nav-icon"></i>
            <p>Articles</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ backpack_url('category') }}" class="nav-link">
            <i class="fa fa-list nav-icon"></i>
            <p>Categories</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ backpack_url('tag') }}" class="nav-link">
            <i class="fa fa-tag nav-icon"></i>
            <p>Tags</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item">
      <a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/setting') }}" class="nav-link">
        <i class="nav-icon fa fa-cog"></i>
        <p>
          Settings
        </p>
      </a>
    </li>
  </ul>
</nav>
