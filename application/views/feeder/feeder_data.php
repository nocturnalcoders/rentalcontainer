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

$feedercode= "";
$feedername= "";
$contgroup= "";


if (!empty($search['feedercode'])) {
    $feedercode= $search['feedercode'];
}

if (!empty($search['feedername'])) {
    $feedername= $search['feedername'];
}


if (!empty($search['contgroup'])) {
    $contgroup= $search['contgroup'];
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
                      Feeder Operator
                    </h3>
                  </div>
                  <div class="col-6">
                    <div class="float-sm-right">
                    <a href="<?=site_url('feeder/add')?>" class="btn btn-info btn-flat">
                      <i class="fa fa-plus"></i> Create New
                    </a>
                </div>
                  </div>
                </div>

                <div class="callout callout-info bott">
                  <form action="<?=site_url('feeder/cari')?>" method="post">
                    <div class="row">
                      <div class="col-7 col-md-4 form-group row">
                        <label class="col-sm-6 col-form-label not-bold">Feeder Operator Code</label>
                        <div class="col-sm-6">
                          <input type="text" name="feedercode" class="form-control form-control-sm" placeholder="Feeder Code" value="<?php echo $feedercode ?>">
                        </div>
                      </div>
                      <div class="col-md-1"></div>
                      <div class="col-8 col-md-4 form-group row">
                        <label class="col-sm-4 col-form-label not-bold ">Group Rate</label>
                        <div class="col-sm-8">
                          <select name="contgroup" id="contgroup" class="form-control form-control-sm">
                          <option value="">- All --</option>
                            <?php 
                              foreach ($contRow as $key => $value) {
                                $contgroupOps = $value->contgroup;
                            ?>
                                <option value="<?php echo $contgroupOps ?>" 
                                  <?php echo $contgroup == $contgroupOps ? 'selected' : ''; ?>>
                                  <?php echo $contgroupOps ?>
                                    
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
                        <label class="col-sm-6 col-form-label not-bold" >Feeder Vendor Name</label>
                        <div class="col-sm-6">
                          <input type="text" name="feedername" class="form-control form-control-sm" placeholder="Feeder Name" value="<?php echo $feedername ?>">
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
                            <th>#</th>
                            <th>Feeder Vendor Code</th>
                            <th>Feeder Vendor Name</th>
                            <th>Group Rate</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($row->result() as $key => $data) {
                          $feedercode = $data->feedercode;
                          ?>
                        <tr> 
                            <td style="width:5%;"><?=$no?></td>
                            <td><a href="<?=site_url('feeder/edit/')?><?php echo $feedercode ?>"><?=$data->feedercode?></a></td>
                            <td><?=$data->feedername?></td>
                            <td><?=$data->contgroup?></td>
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

