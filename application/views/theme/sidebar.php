<?php $active_page=$this->uri->segment(2) ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{base_url}" class="brand-link">
    <img src="{base_url}assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">AdminLTE 3</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{base_url}assets/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    </div>

    <div class="btn user-panel mt-3 pb-3 mb-3 d-flex bg-orange " >
      <div class="info">
        <a style="color:#fcfcfc;" href="{base_url}/welcome" class="d-block">Welcome to CodeIgniter!</a>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview <?= (($active_page=='')?'active':'');?>">
          <a href="{base_url}" class="nav-link <?= (($active_page=='')?'active':'');?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview <?= (($active_page=='chartjs' || $active_page=='chartflot' || $active_page=='chartinline'  )?'menu-open':'');?>">
          <a href="#" class="nav-link <?= (($active_page=='chartjs' || $active_page=='chartflot' || $active_page=='chartinline'  )?'active':'');?>">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Charts
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{base_url}sample/chartjs" class="nav-link <?= (($active_page=='chartjs')?'active':'');?>">
                <i class="far fa-circle nav-icon"></i>
                <p>ChartJS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{base_url}sample/chartflot" class="nav-link <?= (($active_page=='chartflot')?'active':'');?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Flot</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{base_url}sample/chartinline" class="nav-link <?= (($active_page=='chartinline')?'active':'');?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Inline</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{base_url}sample/modal" class="nav-link <?= (($active_page=='modal')?'active':'');?>">
            <i class="nav-icon fas fa-tree"></i>
            <p>
              Modals & Alerts
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview <?= (($active_page=='form_advanced' || $active_page=='form_general' || $active_page=='form_editor' || $active_page=='form_validation')?'menu-open':'');?>">
          <a href="#" class="nav-link <?= (($active_page=='form_advanced' || $active_page=='form_general' || $active_page=='form_editor' || $active_page=='form_validation')?'active':'');?>">
            <i class="nav-icon fas fa-edit"></i>
            <p>Forms<i class="fas fa-angle-left right"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{base_url}sample/form_general" class="nav-link <?= (($active_page=='form_general')?'active':'');?>">
                <i class="far fa-circle nav-icon"></i>
                <p>General Elements</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{base_url}sample/form_advanced" class="nav-link <?= (($active_page=='form_advanced')?'active':'');?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Advanced Elements</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{base_url}sample/form_editor" class="nav-link <?= (($active_page=='form_editor')?'active':'');?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Editors</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{base_url}sample/form_validation" class="nav-link <?= (($active_page=='form_validation')?'active':'');?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Validation</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item has-treeview <?= (($active_page=='simpletable' || $active_page=='datatable' || $active_page=='jsgrid')?'menu-open':'');?>">
          <a href="#" class="nav-link <?= (($active_page=='simpletable' || $active_page=='datatable' || $active_page=='jsgrid')?'active':'');?>">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Tables
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{base_url}sample/simpletable" class="nav-link <?= (($active_page=='simpletable')?'active':'');?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Simple Tables</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{base_url}sample/datatable" class="nav-link <?= (($active_page=='datatable')?'active':'');?>">
                <i class="far fa-circle nav-icon"></i>
                <p>DataTables</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{base_url}sample/jsgrid" class="nav-link <?= (($active_page=='jsgrid')?'active':'');?>">
                <i class="far fa-circle nav-icon"></i>
                <p>jsGrid</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">EXAMPLES</li>
        <li class="nav-item">
          <a href="{base_url}sample/fullcalendar" class="nav-link <?= (($active_page=='fullcalendar')?'active':'');?>">
            <i class="nav-icon far fa-calendar-alt"></i>
            <p>
              Calendar
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-header">MULTI LEVEL EXAMPLE</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-circle nav-icon"></i>
            <p>Level 1</p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-circle"></i>
            <p>
              Level 1
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Level 2</p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Level 2
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Level 3</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Level 3</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Level 3</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Level 2</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-circle nav-icon"></i>
            <p>Level 1</p>
          </a>
        </li>
        <li class="nav-header">LABELS</li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-danger"></i>
            <p class="text">Important</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-warning"></i>
            <p>Warning</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon far fa-circle text-info"></i>
            <p>Informational</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>