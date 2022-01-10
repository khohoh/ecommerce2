<div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo"><a href="{{ route('user.home') }}" class="simple-text logo-normal">
        Ecommerce
      </a></div>
    <div class="sidebar-wrapper">
      <ul class="nav">
        <li class="nav-item {{ Request::is('dashboard') ? 'active':'' }}">
          <a class="nav-link" href="{{ route('admin.index') }}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('categories') ? 'active':'' }}">
          <a class="nav-link" href="{{ route('admin.categories_index') }}">
            <i class="material-icons">person</i>
            <p>Categories</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('create_categories') ? 'active':'' }}">
          <a class="nav-link" href="{{ route('admin.create_categories') }}">
            <i class="material-icons">person</i>
            <p>Add Categories</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('products') ? 'active':'' }}">
          <a class="nav-link" href="{{ route('admin.products_index') }}">
            <i class="material-icons">person</i>
            <p>Products</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('create_products') ? 'active':'' }}">
          <a class="nav-link" href="{{ route('admin.create_products') }}">
            <i class="material-icons">person</i>
            <p>Add Products</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('admin_orders') ? 'active':'' }}">
          <a class="nav-link" href="{{ route('admin.orders') }}">
            <i class="material-icons">content_paste</i>
            <p>Orders</p>
          </a>
        </li>
        <li class="nav-item {{ Request::is('all_users') ? 'active':'' }}">
          <a class="nav-link" href="{{ route('admin.all_users') }}">
            <i class="material-icons">persons</i>
            <p>Users</p>
          </a>
        </li>
      </ul>
    </div>
  </div>