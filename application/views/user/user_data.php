<script type="text/javascript">
  <?php
    $alert = $this->session->flashdata('success'); 
    if(!empty($alert)){
      ?>
      toastr.success('<?php echo $alert ?>')
      <?php
    }

    $alertDel = $this->session->flashdata('delete'); 
    if(!empty($alertDel)){
      ?>
      toastr.error('<?php echo $alertDel ?>')
      <?php
    }
   ?>
   // $('.toastrDefaultSuccess').click(function() {
   //    toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
   //  });
</script>
<?php 

$user_id= "";
$username= "";
$name= "";
$divbran= "";
$location= "";


if (!empty($search['user_id'])) {
    $user_id= $search['user_id'];
}

if (!empty($search['username'])) {
    $username= $search['username'];
}

if (!empty($search['name'])) {
    $name= $search['name'];
}

if (!empty($search['divbran'])) {
    $divbran= $search['divbran'];
}

 ?>


    <!-- Main content -->
    <section class="content" style="margin-top: 10px;">
      <!-- <div class="container-fluid"> -->
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <div class="row">
                  <div class="col-6">
                    <h3>
                      Users
                    </h3>
                  </div>
                  <div class="col-6">
                    <div class="float-sm-right">
                    <a href="<?=site_url('user/add')?>" class="btn btn-info btn-flat">
                      <i class="fa fa-plus"></i> Create New
                    </a>
                </div>
                  </div>
                </div>

                <div class="callout callout-info bott">
                  <form action="<?=site_url('user/cari')?>" method="post">
                    <div class="row">
                      <div class="col-8 col-md-4 form-group row">
                        <label class="col-sm-4 col-form-label not-bold">User ID *</label>
                        <div class="col-sm-8">
                          <input type="text" name="user_id" class="form-control form-control-sm" placeholder="User ID" value="<?php echo $user_id ?>">
                        </div>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-8 col-md-4 form-group row">
                        <label class="col-sm-4 col-form-label not-bold">Username *</label>
                        <div class="col-sm-8">
                          <input type="text" name="username" class="form-control form-control-sm" placeholder="Username" value="<?php echo $username ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row upp">
                      <div class="col-8 col-md-4 form-group row">
                        <label class="col-sm-4 col-form-label not-bold">Name *</label>
                        <div class="col-sm-8">
                          <input type="text" name="name" class="form-control form-control-sm" placeholder="name" value="<?php echo $name ?>">
                        </div>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-8 col-md-4 form-group row">
                        <label class="col-sm-4 col-form-label not-bold">Divbran *</label>
                        <div class="col-sm-8">
                          <input type="text" name="divbran" class="form-control form-control-sm" placeholder="divbran" value="<?php echo $divbran ?>">
                        </div>
                      </div>
                    </div>
                    <div class="row bott">
                      <div class="col-7 col-md-4">
                        <button class="btn btn-success btn-flat">
                          <i class="fa fa-search"></i> Search
                        </button>
                      </div>
                    </div>
                  </form>
                </div>

                </div>
              <!-- /.card-header -->
              <div class="card-body upp">
                <table id="noSearch" class="table table-sm table-hover table-bordered">
                    <thead class="bg-info"> 
                        <tr> 
                            <th>#</th>
                            <th>UserId</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Name</th>
                            <th>Divbran</th>
                            <th>Location</th>
                            <th>Level</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($row->result() as $key => $data) {
                          $userid = $data->user_id;
                          ?>
                        <tr> 
                            <td style="width:5%;"><?=$no?></td>
                            <td><a href="<?=site_url('user/edit/')?><?php echo $userid ?>"><?=$data->user_id?></a></td>
                            <td><?=$data->username?></td>
                            <td><?=$data->password?></td>
                            <td><?=$data->name?></td>
                            <td><?=$data->divbran?></td>
                            <td><?=$data->location?></td>
                            <td><?=$data->level?></td>
                        </tr>
                        <?php 
                        $no++;
                        } 
                        ?>
                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div><!-- /.col -->
        </div> <!-- /.row -->
      <!-- </div> -->
    </section><!-- /.content -->

