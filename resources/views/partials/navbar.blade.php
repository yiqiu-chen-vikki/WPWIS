<nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>
         
        </form>
        <ul class="navbar-nav navbar-right">
        
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <div class="d-sm-none d-lg-inline-block">Hi,  @if(Auth::check())
      {{ Auth::user()->name}}
 @else
    Guest
@endif
</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              
              <a href="{{route('profile')}}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
          
             
            </div>
          </li>
        </ul>
      </nav>