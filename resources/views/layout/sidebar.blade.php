
@if (session()->get("user-data") !== null)
    

  <!-- Main Sidebar Container -->
  <aside id="main" class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link d-none flex-row-reverse">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">لوحة التحكم</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex flex-row-reverse justify-content-center">
          <div class="image">
            <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
              <a href="#" class="d-block">{{session()->get('user-data')->name}}</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="d-none form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
              <!-- لوحة التحكم -->
            <li class="nav-item">
              <a href="/dashboard" data-url="dashboard" class="nav-link active d-flex flex-row-reverse align-items-center d-flex flex-row-reverse align-items-center">
              <i class="nav-icon mx-2 fas fa-tachometer-alt"></i>
                <p>
                  لوحة التحكم
                </p>
              </a>
            </li>
              <!-- إدارة السيارات -->
            <li class="nav-item">
              <a href="#"  data-url="car" class="nav-link d-flex flex-row-reverse align-items-center d-flex flex-row-reverse align-items-center">
                <i class="nav-icon fas fa-car"></i>
                <p>
                  إدارة السيارات
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/new-car" class="nav-link  d-flex flex-row-reverse align-items-center">
                    <i class="far fa-circle nav-icon"></i>
                    <p>إضافة سيارة</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/cars" class="nav-link d-flex flex-row-reverse align-items-center">
                    <i class="far fa-circle nav-icon"></i>
                    <p>بحث فى السيارات</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/new-car-import" class="nav-link d-flex flex-row-reverse align-items-center">
                    <i class="far fa-circle nav-icon"></i>
                    <p>رفع ملف إكسيل</p>
                  </a>
                </li>
              
              </ul>
            </li>
              <!-- عرض أسعار -->
            <li class="nav-item d-none">
              <a href="#" class="nav-link d-flex flex-row-reverse align-items-center d-flex flex-row-reverse align-items-center">
                  <i class="nav-icon mx-2 fas fa-money-bill"></i>
                  <p>
                  عرض أسعار
                  </p>
              </a>
            </li>
              <!-- إدارة الموظفين -->
              <li class="nav-item">
              <a href="#"  data-url="user" class="nav-link d-flex flex-row-reverse align-items-center d-flex flex-row-reverse align-items-center">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  إدارة المستخدمين
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/new-user" class="nav-link  d-flex flex-row-reverse align-items-center">
                    <i class="far fa-circle nav-icon"></i>
                    <p>إضافة مستخدم</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/users" class="nav-link d-flex flex-row-reverse align-items-center">
                    <i class="far fa-circle nav-icon"></i>
                    <p>بحث فى المستخدمين</p>
                  </a>
                </li>
              
              </ul>
            </li>
              <!-- تغيير كلمة السر -->
              <li class="nav-item">
                <a href="/change-password"  data-url="change-password" class="nav-link d-flex flex-row-reverse align-items-center d-flex flex-row-reverse align-items-center">
                    <i class="nav-icon mx-2 fas fa-key"></i>
                    <p>
                    تغيير كلمة السر
                    </p>
                </a>
              </li>
              <!--  -->
              <!-- تسجيل الخروج -->
            <li class="nav-item">
              <a href="/logout" class="nav-link d-flex flex-row-reverse align-items-center d-flex flex-row-reverse align-items-center">
                  <i class="nav-icon mx-2 fas fa-lock"></i>
                  <p>
                  تسجيل الخروج
                  </p>
              </a>
            </li>
            <!--  -->
            
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>

@endif
