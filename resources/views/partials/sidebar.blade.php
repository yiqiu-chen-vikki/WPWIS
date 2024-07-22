      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">WPWIS</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">WP</a>
          </div>
          <ul class="sidebar-menu">
           <li class="menu-header">Dashboard</li>
            <li class="dropdown {{request()->routeIs('home')? 'active':''}}">
              <a href="{{route('home')}}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
             
            </li>
            <li class="dropdown {{request()->is('suppliers/*')|| request()->is('suppliers')?'active':''}}">
              <a href="{{route('supplier.index')}}" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Suppliers</span></a>
              <ul class="dropdown-menu">
                <li class="{{request()->routeIs('supplier.create')? 'active':''}}" ><a class="nav-link" href="{{route('supplier.create')}}">Add Supplier</a></li>
                <li class="{{request()->routeIs('supplier.index')? 'active':''}}"><a class="nav-link" href="{{route('supplier.index')}}">All Suppliers</a></li>
              </ul>
            </li>
            <li class="dropdown {{request()->is('worker/*')|| request()->is('worker')?'active':''}}">
              <a href="{{route('worker.index')}}"class="nav-link has-dropdown"><i class="fas fa-shopping-cart"></i><span>Worker</span></a>
              <ul class="dropdown-menu">
                <li class="{{request()->routeIs('worker.create')? 'active':''}}" ><a class="nav-link" href="{{route('worker.create')}}">Add Worker</a></li>
                <li class="{{request()->routeIs('worker.index')? 'active':''}}"><a class="nav-link" href="{{route('worker.index')}}">All Worker</a></li>
              </ul>
            </li>
            <li class="dropdown {{request()->is('customers/*')|| request()->is('customers')?'active':''}}">
              <a href="{{route('customer.index')}}" class="nav-link has-dropdown"><i class="fas fa-user"></i><span>Customers</span></a>
              <ul class="dropdown-menu">
                <li class="{{request()->routeIs('customer.create')? 'active':''}}" ><a class="nav-link" href="{{route('customer.create')}}">Add Customer</a></li>
                <li class="{{request()->routeIs('customer.index')? 'active':''}}"><a class="nav-link" href="{{route('customer.index')}}">All Customers</a></li>
              </ul>
            </li>
            <li class="dropdown {{request()->is('category/*')|| request()->is('category')?'active':''}}">
              <a href="{{route('category.index')}}" class="nav-link has-dropdown"><i class="fas fa-beer"></i><span>Category</span></a>
              <ul class="dropdown-menu">
                <li class="{{request()->routeIs('category.create')? 'active':''}}" ><a class="nav-link" href="{{route('category.create')}}">Add Category</a></li>
                <li class="{{request()->routeIs('category.index')? 'active':''}}"><a class="nav-link" href="{{route('category.index')}}">All Category</a></li>
              </ul>
            </li>
            <li class="dropdown {{request()->is('unit/*')|| request()->is('unit')?'active':''}}">
              <a href="{{route('unit.index')}}"class="nav-link has-dropdown"><i class="fas fa-shopping-cart"></i><span>Unit</span></a>
              <ul class="dropdown-menu">
                <li class="{{request()->routeIs('unit.create')? 'active':''}}" ><a class="nav-link" href="{{route('unit.create')}}">Add Unit</a></li>
                <li class="{{request()->routeIs('unit.index')? 'active':''}}"><a class="nav-link" href="{{route('unit.index')}}">All Unit</a></li>
              </ul>
            </li>
            <li class="dropdown {{request()->is('material/*')|| request()->is('material')?'active':''}}">
              <a href="{{route('material.index')}}" class="nav-link has-dropdown"><i class="fas fa-shopping-cart"></i><span>Material</span></a>
              <ul class="dropdown-menu">
                <li class="{{request()->routeIs('material.create')? 'active':''}}" ><a class="nav-link" href="{{route('material.create')}}">Add Material</a></li>
                <li class="{{request()->routeIs('material.index')? 'active':''}}"><a class="nav-link" href="{{route('material.index')}}">All Material</a></li>
              </ul>
            </li>
            <li class="dropdown {{request()->is('purchase/*')|| request()->is('purchase')?'active':''}}">
              <a href="{{route('purchase.index')}}" class="nav-link has-dropdown"><i class="fas fa-clipboard"></i><span>Purchase</span></a>
              <ul class="dropdown-menu">
                <li class="{{request()->routeIs('purchase.create')? 'active':''}}" ><a class="nav-link" href="{{route('purchase.create')}}">Add Purchase</a></li>
                <li class="{{request()->routeIs('purchase.index')? 'active':''}}"><a class="nav-link" href="{{route('purchase.index')}}">All Purchase</a></li>
                <li class="{{request()->routeIs('purchase.pending')? 'active':''}}"><a class="nav-link" href="{{route('purchase.pending')}}">Approval Purchase</a></li>
              </ul>
            </li>
            <li class="dropdown {{request()->is('product/*')|| request()->is('product')?'active':''}}">
              <a href="{{route('product.index')}}" class="nav-link has-dropdown"><i class="fas fa-shopping-cart"></i><span>Product</span></a>
              <ul class="dropdown-menu">
                <li class="{{request()->routeIs('product.create')? 'active':''}}" ><a class="nav-link" href="{{route('product.create')}}">Add Product</a></li>
                <li class="{{request()->routeIs('product.index')? 'active':''}}"><a class="nav-link" href="{{route('product.index')}}">All Product</a></li>
              </ul>
            </li>
           
         
            <li class="dropdown {{request()->is('invoice/*')|| request()->is('invoice')?'active':''}}">
              <a href="{{route('invoice.all')}}" class="nav-link has-dropdown"><i class="fas fa-clipboard"></i><span>Invoice</span></a>
              <ul class="dropdown-menu">
                <li class="{{request()->routeIs('invoice.all')? 'active':''}}"><a class="nav-link" href="{{route('invoice.all')}}">All Invoice</a></li>
                <li class="{{request()->routeIs('invoice.pending.list')? 'active':''}}"><a class="nav-link" href="{{ route('invoice.pending.list') }}">Approval Invoice</a></li>
              </ul>
            </li>
           
           
            <li class="dropdown {{request()->is('production/*')|| request()->is('production')?'active':''}}">
              <a href="{{route('production.index')}}" class="nav-link has-dropdown"><i class="fas fa-clipboard"></i><span>Production</span></a>
              <ul class="dropdown-menu">
                <li class="{{request()->routeIs('production.create')? 'active':''}}" ><a class="nav-link" href="{{route('production.create')}}">Add Production</a></li>
                <li class="{{request()->routeIs('production.index')? 'active':''}}"><a class="nav-link" href="{{route('production.index')}}">All Production</a></li>
                <li class="{{request()->routeIs('production.pending')? 'active':''}}"><a class="nav-link" href="{{route('production.pending')}}">Complete Production</a></li>
              </ul>
            </li>
            <li class="dropdown  {{request()->is('stock/*')|| request()->is('stock')?'active':''}}">
            <a href="{{route('product.report')}}" class="nav-link has-dropdown"> <i class="fas fa-clipboard"></i><span> Stock</span></a>
              <ul class="dropdown-menu">
                <li class="{{request()->routeIs('product.report')? 'active':''}}"><a class="nav-link" href="{{route('product.report')}}">Product Stock Report</a></li>
                <li class="{{request()->routeIs('material.report')? 'active':''}}"><a class="nav-link" href="{{route('material.report')}}">Material Stock Report</a></li>
              </ul>
            </li>
            <li class="menu-header">Log Out</li>
            <li>
              <a href="{{route('logout')}}" class="nav-link " onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="fas fa-fire"></i><span>Log Out</span>
             <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form> 
          
          
          
          </a>
             
            </li>
           
           
          </ul>
     </aside>
      </div>