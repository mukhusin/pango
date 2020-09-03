 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="img/logo.png" style="width: 70px; height: 60px;"  alt="Pango Logo" class="brand-image"
           style="opacity: .8">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/logo.png" style="width: 30px; height: 30px;" class="img-circle elevation-2" alt="User Image">
        </div>
       @auth
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->username}}</a>
        </div>
       @endauth
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
  
         @auth
             @if (Auth::user()->role == 'admin')
              <li class="nav-item">
                <a href="/lessors-page" class="nav-link  <?php if (isset($active)) { echo 'active'; } ?>" >
                  <i class="nav-icon fas fa-user-tie"></i>
                  <p>
                    Lessor
                  </p>
                </a>
              </li>
    
              <li class="nav-item">
                <a href="/property" class="nav-link">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                    Property
                  </p>
                </a>
              </li>  
             @endif
             @if (Auth::user()->role == 'lessor')
             <li class="nav-item">
               <a href="#" data-toggle="modal" data-target="#LessorPropertyModal" class="nav-link  <?php if (isset($active)) { echo 'active'; } ?>" >
                 <i class="nav-icon fas fa-store"></i>
                 <p>
                   Property
                 </p>
               </a>
             </li>
   
             <li class="nav-item">
               <a href="/lessee-page" class="nav-link">
                 <i class="nav-icon fas fa-users"></i>
                 <p>
                   Lessee
                 </p>
               </a>
             </li>  
             <li class="nav-item">
              <a href="/accountant-page" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Accountant
                </p>
              </a>
            </li>  
            @endif
         @endauth
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>