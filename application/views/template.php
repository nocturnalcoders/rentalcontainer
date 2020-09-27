<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BoxOps | Operator</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">   <!-- Tell the browser to be responsive to screen width -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/fontawesome-free/css/all.min.css"> <!-- Font Awesome -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url()?>assets/dist/css/adminlte.min.css">  <!-- overlayScrollbars -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/mystyle.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?=base_url()?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script> <!-- JQuery  -->
  <script src="<?=base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
  <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> <!-- Bootstrap 4 -->
  <script src="<?=base_url()?>assets/dist/js/adminlte.min.js"></script> <!-- AdminLTE App -->


<!-- AdminLTE for demo purposes -->
<!-- <script src="<?=base_url()?>assets/dist/js/demo.js"></script> -->

<!-- jquery pindah ke atas -->
<!-- jQuery -->
<!-- <script src="<?=base_url()?>assets/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>$.widget.bridge('uibutton', $.ui.button)</script>
<!-- <script src="<?=base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> --><!-- Bootstrap 4 -->
<script src="<?=base_url()?>assets/plugins/chart.js/Chart.min.js"></script><!-- ChartJS -->
<script src="<?=base_url()?>assets/plugins/sparklines/sparkline.js"></script> <!-- Sparkline -->
<!-- <script src="<?=base_url()?>assets/plugins/jqvmap/jquery.vmap.min.js"></script> --> <!-- JQVMap -->
<!-- <script src="<?=base_url()?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"> --></script>
<!-- <script src="<?=base_url()?>assets/plugins/jquery-knob/jquery.knob.min.js"> --></script><!-- jQuery Knob Chart -->
<script src="<?=base_url()?>assets/plugins/moment/moment.min.js"></script><!-- daterangepicker -->
<script src="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?=base_url()?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script><!-- Tempusdominus Bootstrap 4 -->
<!-- <script src="<?=base_url()?>assets/plugins/summernote/summernote-bs4.min.js"></script> --><!-- Summernote -->
<script src="<?=base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script><!-- overlayScrollbars -->
<script src="<?=base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- <script src="<?=base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script> -->
<!-- <script src="<?=base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->
<script src="<?=base_url()?>assets/plugins/toastr/toastr.min.js"></script>
<script src="<?=base_url()?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?=base_url()?>assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
</head>


<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">



  <!-- INI AKHIR TOOLBAR / NAVBAR PALING ATAS .. HOME DAN SEARCH dan NOTIFICATION-->
  
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url()?>" class="nav-link">Home</a>
      </li>
    </ul>



  
  </nav>
  <!-- /.navbar -->

<!-- INI AKHIR TOOLBAR / NAVBAR PALING ATAS .. HOME DAN SEARCH dan NOTIFICATION-->







  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=base_url()?>" class="brand-link">
      <img src="<?=base_url()?>assets/dist/img/logogpi.png"
           alt="BoxOps"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">BoxOps</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=base_url()?>assets/dist/img/useravatar.png" class="img-circle elevation-3" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"> <?=ucfirst($this->fungsi->user_login()->name)?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
     
            
              <li class="nav-item has-treeview">
                <a href="<?=site_url('dashboard')?>" class="nav-link">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                   
                  </p>
                </a>
              </li>

           <?php  
                if ($this->fungsi->user_login()->level > 2) { 
           ?>
              <li class="nav-item has-treeview menu-close">
                <a href="#" class="nav-link"><p> CONTAINERS </p></a>
                <ul class="nav nav-treeview">
                  
                  
                  <li class="nav-item">
                    <a href="<?=site_url('containerno')?>" class="nav-link">
                    <i class="nav-icon fas fa-boxes"></i>
                      <p>Container</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=site_url('container')?>" class="nav-link">
                    <i class="nav-icon fas fa-money-bill"></i>
                      <p>Container Rental Rate</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=site_url('depo')?>" class="nav-link">
                    <i class="nav-icon fas fa-warehouse"></i>
                      <p>Container Depo</p>
                    </a>
                  </li>
                 </ul>
             </li>
             

             <li class="nav-item has-treeview menu-close">
                <a href="#" class="nav-link"><p> FEEDERS </p></a>
                <ul class="nav nav-treeview">
                  
                <li class="nav-item">
                    <a href="<?=site_url('feeder')?>" class="nav-link">
                    <i class="nav-icon fas fa-ship"></i>
                      <p>Feeder Operator</p>
                    </a>
                  </li>
                
                  <li class="nav-item">
                     <a href="<?=site_url('feederschedule')?>" class="nav-link">
                    <i class="nav-icon fas fa-calendar-alt"></i>
                      <p>Feeder Schedule</p>
                    </a>
                  </li>

                 </ul>
             </li>

           <?php  
               } 
               if ($this->fungsi->user_login()->level == 9) {   
           ?>   
              <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-th-list"></i>
                      <p>
                        REQUEST CONTAINER
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                          <a href="<?=site_url('reqcontainer')?>" class="nav-link">
                          <i class="far fa-circle"></i>
                            <p>Request Repo - Branches</p>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a href="<?=site_url('reqempty')?>" class="nav-link">
                            <i class="far fa-circle"></i>
                            <p>Request Empty -Domestics</p>
                          </a>
                      </li>
                    </ul>
               </li>
            <?php  
               } 
            ?>   


                <?php  
                   if ($this->fungsi->user_login()->level == 1) { 
                 ?>
                  <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-th-list"></i>
                      <p>
                        REQUEST CONTAINER
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                  
                      <li class="nav-item">
                        <a href="<?=site_url('reqcontainer')?>" class="nav-link">
                        <i class="far fa-circle"></i>
                          <p>Request Repo - Branches</p>
                          </a>
                      </li>
                    </ul>
                 </li>
                  <?php  
                  } 
                ?>   



                <?php  
                   if ($this->fungsi->user_login()->level == 2) { 
                 ?>
                  <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                      <i class="nav-icon fas fa-th-list"></i>
                      <p>
                        REQUEST CONTAINER
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                    
                      <li class="nav-item">
                        <a href="<?=site_url('reqempty')?>" class="nav-link">
                          <i class="far fa-circle"></i>
                          <p>Request Empty -Domestics</p>
                        </a>
                      </li>
                    </ul>
                 </li>
                  <?php  
                  } 
                ?>   


           

                <?php  
                   if ($this->fungsi->user_login()->level == 9) { 
                 ?>    
                <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-th-list"></i>
                  <p>
                     APPROVAL CONTAINER
                  </p>
                </a>
                  <li class="nav-item">
                    <a href="<?=site_url('appvcontainer')?>" class="nav-link">
                    <i class="nav-icon fas fa-handshake"></i>
                      <p>Approval Container Request</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=site_url('assignfeeder')?>" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>Search and Assign Feeder</p>
                    </a>
                  </li>


                    <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link"><p> CONTAINERS MOVEMENT </p></a>
                <ul class="nav nav-treeview">
                  
            
                  <li class="nav-item">
                   <a href="<?=site_url('depoin/depoout')?>" class="nav-link">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                      <p>Depo Out</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=site_url('depoin/sailing')?>" class="nav-link">
                    <i class="nav-icon fas fa-arrows-alt"></i>
                       <p>Sailing</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=site_url('depoin/arrival')?>" class="nav-link">
                    <i class="nav-icon fas fa-arrows-alt"></i>
                       <p>Arrival</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?=site_url('depoin/depoin')?>" class="nav-link">
                    <i class="nav-icon fas fa-sign-in-alt"></i>
                       <p>Depo In</p>
                    </a>
                  </li>

                  <li class="nav-item">
                  <a href="<?=site_url('depoin/export')?>" class="nav-link">
                    <i class="nav-icon fas fa-sign-in-alt"></i>
                       <p>Export</p>
                    </a>
                  </li>

                 </ul>
             </li>

                  <?php  
                      }
                      if ($this->fungsi->user_login()->level == 1) { 
                    ?>




            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link"><p> CONTAINERS MOVEMENT </p></a>
                <ul class="nav nav-treeview">
                  
            

                  <li class="nav-item">
                    <a href="<?=site_url('depoin/depoin')?>" class="nav-link">
                    <i class="nav-icon fas fa-sign-in-alt"></i>
                       <p>Depo In</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="<?=site_url('depoin/export')?>" class="nav-link">
                    <i class="nav-icon fas fa-sign-in-alt"></i>
                       <p>Export</p>
                    </a>
                  </li>

                 </ul>
             </li>

             <?php  
                      }
                     
                    ?>


        



             <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link"><p> REPORTING </p></a>
                <ul class="nav nav-treeview">
                  
                <li class="nav-item">
                <a href="<?=site_url('reportrequest')?>" class="nav-link">
                    <i class="nav-icon fas fa-chart-line"></i>
                       <p>Recap Containers Request</p>
                    </a>
                  </li>
                  <li class="nav-item">
                   <!-- <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-chart-line"></i>
                       <p>Recap Container Stock</p>
                    </a> -->
                  </li>

                 </ul>
             </li>







             <?php  if($this->fungsi->user_login()->name == 'Ryan K' || $this->fungsi->user_login()->name == 'rizky'  ) { ?> 
            <li class="nav-item has-treeview menu-open">
                <a href="#" class="nav-link"><p> SETTING </p></a>
                <ul class="nav nav-treeview">
                  
                <li class="nav-item">
                  <a href="<?=site_url('user')?>" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                      User Maintenance
                      
                    </p>
                  </a>
                </li>

                 </ul>
             </li>


          <?php }?>
       

          <li class="nav-header">   </li>
          <li class="nav-item">     </li>

          <li class="nav-item">
            <a href="<?=site_url('auth/logout')?>" class="nav-link">
            <i class="fas fa-sign-out-alt nav-icon"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

          <li class="nav-header">   </li>
          <li class="nav-item">     </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
        <?php echo $contents ?>
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2020</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<script>
  $(document).ready(function() {
      $('#table1').DataTable()
      $('#nothing').DataTable({
        "paging": false,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": false,
        "autoWidth": false,
        "responsive": false,

      })

      $('#noSearch').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "pageLength": 50
      })

      $('#scrollData').DataTable({
        "scrollX":'100%',
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": false,

      })
  })
  

</script>


</body>
</html>
