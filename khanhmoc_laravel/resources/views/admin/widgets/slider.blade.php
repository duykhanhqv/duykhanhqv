<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      
      <li class="nav-item">
        <a class="nav-link" href="{{route('s.admin')}}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
      <li class="nav-product">
        <a class="nav-link" data-toggle="collapse" href="#manager_product" aria-expanded="false" aria-controls="manager_product">
          <i class="menu-icon typcn typcn-document-add"></i>
          <span class="menu-title">Product</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="manager_product">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('products.index')}}"> List product </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('products.create')}}"> Add new product </a>
            </li>
          </ul>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#manage_product" aria-expanded="false" aria-controls="manage_product">
          <i class="menu-icon typcn typcn-document-add"></i>
          <span class="menu-title">Product</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="manage_product">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('products.index')}}"> List product </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('products.create')}}"> Add new product </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#manage_category" aria-expanded="false" aria-controls="manage_category">
          <i class="menu-icon typcn typcn-document-add"></i>
          <span class="menu-title">Category</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="manage_category">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('categorys.index')}}"> List category</a> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('categorys.create')}}"> Add new category </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#manage_department" aria-expanded="false" aria-controls="manage_department">
          <i class="menu-icon typcn typcn-document-add"></i>
          <span class="menu-title">Department</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="manage_department">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('departments.index')}}"> List department</a> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('departments.create')}}"> Add new department</a> </a>
            </li>
          </ul>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#manage_order" aria-expanded="false" aria-controls="manage_order">
          <i class="menu-icon typcn typcn-document-add"></i>
          <span class="menu-title">Manager order</span>
          <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="manage_order">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item">
              <a class="nav-link" href="{{route('orders.index')}}"> List Order</a> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('orders.new')}}"> Order new</a> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('orders.delivering')}}"> Order delivering</a> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('orders.delived')}}"> Order divlived</a> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('orders.cancel')}}"> Order cancel</a> </a>
            </li>
          </ul>
        </div>
      </li>
      <?php 
      ?>
      
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('s.role')}}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Roles</span>
        </a>
      </li> --}}
      @if ($role->inRole('admin'))
      <li class="nav-item">
        <a class="nav-link" href="{{route('s.role')}}">
          <i class="menu-icon typcn typcn-document-text"></i>
          <span class="menu-title">Roles</span>
        </a>
      </li>
      @endif
    </ul>
  </nav>