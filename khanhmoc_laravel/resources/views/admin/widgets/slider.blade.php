<div class="page-sidebar">
    <a class="logo-box" href="index.html">
        <span>ecaps</span>
        <i class="icon-radio_button_unchecked" id="fixed-sidebar-toggle-button"></i>
        <i class="icon-close" id="sidebar-toggle-button-close"></i>
    </a>
    <div class="page-sidebar-inner">
        <div class="page-sidebar-menu">
            <ul class="accordion-menu">
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon icon-layers"></i><span>User</span><i class="accordion-icon fa fa-angle-left"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="">User name:{{Auth::user()->name}}</a></li>
                        <li><a href="{{route('s.changePassword')}}">Change password</a></li>
                    </ul>
                   
                    <a href=""></a>
                    
                </li>
                <li class="active-page">
                    <a href="index.html">
                        <i class="menu-icon icon-home4"></i><span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="email.html">
                        <i class="menu-icon icon-inbox"></i><span>Email</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon icon-layers"></i><span>Product</span><i class="accordion-icon fa fa-angle-left"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{route('products.index')}}">List Product</a></li>
                        <li><a href="{{route('products.create')}}">Add new Product</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)">
                        <i class="menu-icon icon-layers"></i><span>Category</span><i class="accordion-icon fa fa-angle-left"></i>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{route('categorys.index')}}">List category</a></li>
                        <li><a href="{{route('categorys.create')}}">Add new category</a></li>
                    </ul>
                </li>
                
            </ul>
        </div>
    </div>
</div><!-- /Page Sidebar -->
 