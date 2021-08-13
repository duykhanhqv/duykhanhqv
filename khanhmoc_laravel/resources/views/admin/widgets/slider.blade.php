<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">

    <li class="nav-item">
      <a class="nav-link" href="{{route('s.admin')}}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">@lang('Dashboard')</span>
      </a>
    </li>
    @if($role_product->inRole('product'))
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#manage_product" aria-expanded="false"
        aria-controls="manage_product">
        <i class="menu-icon typcn typcn-document-add"></i>
        <span class="menu-title">@lang('Product')</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="manage_product">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('products.index')}}"> @lang('List product') </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('products.create')}}"> @lang('Add new product') </a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#manage_category" aria-expanded="false"
        aria-controls="manage_category">
        <i class="menu-icon typcn typcn-document-add"></i>
        <span class="menu-title">@lang('Category')</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="manage_category">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('categorys.index')}}"> @lang('List category')</a> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('categorys.create')}}">@lang(' Add new category') </a>
          </li>
        </ul>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#manage_department" aria-expanded="false"
        aria-controls="manage_department">
        <i class="menu-icon typcn typcn-document-add"></i>
        <span class="menu-title">@lang('Department')</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="manage_department">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('departments.index')}}"> @lang('List department')</a> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('departments.create')}}"> @lang('Add new department')</a> </a>
          </li>
        </ul>
      </div>
    </li>
    @endif
    @if ($role_admin->inRole('order'))
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#manage_order" aria-expanded="false"
        aria-controls="manage_order">
        <i class="menu-icon typcn typcn-document-add"></i>
        <span class="menu-title">@lang('Manager order')</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="manage_order">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{route('orders.index')}}"> @lang('List Order')</a> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('orders.new')}}"> @lang('Order new')</a> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('orders.delivering')}}"> @lang('Order delivering')</a> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('orders.delived')}}"> @lang('Order divlived')</a> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('orders.cancel')}}"> @lang('Order cancel')</a> </a>
          </li>
        </ul>
      </div>
    </li>
    @endif
    @if ($role_admin->inRole('admin'))
    <li class="nav-item">
      <a class="nav-link" href="{{route('s.role')}}">
        <i class="menu-icon typcn typcn-document-text"></i>
        <span class="menu-title">@lang('Roles and User')</span>
      </a>
    </li>
    @endif
  </ul>
</nav>