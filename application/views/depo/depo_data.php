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

$depocode= "";
$deponame= "";
$location= "";


if (!empty($search['depocode'])) {
    $depocode= $search['depocode'];
}

if (!empty($search['deponame'])) {
    $deponame= $search['deponame'];
}


if (!empty($search['location'])) {
    $location= $search['location'];
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
                      Depo
                    </h3>
                  </div>
                  <div class="col-6">
                    <div class="float-sm-right">
                    <a href="<?=site_url('depo/add')?>" class="btn btn-info btn-flat">
                      <i class="fa fa-plus"></i> Create New
                    </a>
                </div>
                  </div>
                </div>

                <div class="callout callout-info bott">
                  <form action="<?=site_url('depo/cari')?>" method="post">
                    <div class="row">
                      <div class="col-7 col-md-4 form-group row">
                        <label class="col-sm-6 col-form-label not-bold">Depo Code</label>
                        <div class="col-sm-6">
                          <input type="text" name="depocode" id="depocode" class="form-control form-control-sm" placeholder="Depo Code" value="<?php echo $depocode ?>">
                        </div>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-8 col-md-4 form-group row">
                        <label class="col-sm-4 col-form-label not-bold ">Location</label>
                        <div class="col-sm-8">
                          <select name="location" id="location" class="form-control form-control-sm">
                          <option value="">- All --</option>
                            <?php 
                              foreach ($PortRow as $key => $value) {
                                $locationOps = $value->portcode;
                            ?>
                                <option value="<?php echo $locationOps ?>" 
                                  <?php echo $location == $locationOps ? 'selected' : ''; ?>>
                                  <?php echo $locationOps ?>
                                    
                                  </option>
                            <?php
                              }
                             ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row upp">
                      <div class="col-8 col-md-4 form-group row">
                        <label class="col-sm-6 col-form-label not-bold" >Depo Name</label>
                        <div class="col-sm-6">
                          <input type="text" name="deponame" id="deponame" class="form-control form-control-sm" placeholder="Depo Name" value="<?php echo $deponame ?>">
                        </div>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-8 col-md-4 form-group row">
                        
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
                            <th rowspan="2">#</th>
                            <th rowspan="2">Depo Code</th>
                            <th rowspan="2">Depo Name</th>
                            <th rowspan="2">Location</th>
                            <th colspan="2" class="auto-style">Container 20'</th>
                            <th colspan="2" class="auto-style">Container 40'</th>
                        </tr>
                        <tr> 
                            <th class="auto-style">Lift ON</th>
                            <th class="auto-style">Lift OFF </th>
                            <th class="auto-style">Lift ON</th>
                            <th class="auto-style">Lift OFF </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($row->result() as $key => $data) {
                          $depocode = $data->depocode;
                          ?>
                        <tr> 
                            <td style="width:5%;"><?=$no?></td>
                            <td><a href="<?=site_url('depo/edit/')?><?php echo $depocode ?>"><?=$data->depocode?></a></td>
                            <td><?=$data->deponame?></td>
                            <td><?=$data->location?></td>
                            <td><?=$data->lifton20?></td>
                            <td><?=$data->liftoff20?></td>
                            <td><?=$data->lifton40?></td>
                            <td><?=$data->liftoff40?></td>
                        </tr>
                        <?php 
                        $no++;
                        } 
                        ?>
                    </tbody>
                </table>
              </div> <!-- /.card-body -->             
            </div>  <!-- /.card -->          
          </div><!-- /.col -->
        </div> <!-- /.row -->
      <!-- </div> -->
    </section><!-- /.content -->

