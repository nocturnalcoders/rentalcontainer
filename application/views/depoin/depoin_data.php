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

$lingrid = "";
$feedercode= "";
$deptport= "";
$destport= "";
$vesselcode = "";
$vesselname= "";
$voyage= "";
$etdfrom= "";
$etdto= "";
$etafrom = "";
$etato = "";
$berthdatefrom= "";
$berthdateto= "";
$servicecode= "";
$disabled = "";

$containerno = "";
$contsize = "";
$conttype = "";
$feedercode = "";
$vesselname = "";
$voyage = "";
$movestatus = "";
$movedate = "";
$remarks = "";


if (!empty($search['lingrid'])) {
    $lingrid= $search['lingrid'];
    $disabled = "readonly";
}

if (!empty($search['feedercode'])) {
    $feedercode= $search['feedercode'];
}

if (!empty($search['deptport'])) {
    $deptport= $search['deptport'];
}

if (!empty($search['destport'])) {
    $destport= $search['destport'];
}

if (!empty($search['vesselcode'])) {
    $vesselcode= $search['vesselcode'];
}

if (!empty($search['vesselname'])) {
    $vesselname= $search['vesselname'];
}

if (!empty($search['voyage'])) {
    $voyage= $search['voyage'];
}

if (!empty($search['etdfrom'])) {
    $etdfrom= $search['etdfrom'];
}

if (!empty($search['etdto'])) {
    $etdto= $search['etdto'];
}

if (!empty($search['etafrom'])) {
    $etafrom= $search['etafrom'];
}

if (!empty($search['etato'])) {
    $etato= $search['etato'];
}

if (!empty($search['berthdatefrom'])) {
    $berthdatefrom= $search['berthdatefrom'];
}

if (!empty($search['berthdateto'])) {
    $berthdateto= $search['berthdateto'];
}

if (!empty($search['servicecode'])) {
    $servicecode= $search['servicecode'];
}

if (!empty($search['containerno'])) {
    $containerno = $search['containerno'];
}
if (!empty($search['contsize'])) {
    $contsize = $search['contsize'];
}
if (!empty($search['conttype'])) {
    $conttype = $search['conttype'];
}
if (!empty($search['feedercode'])) {
    $feedercode = $search['feedercode'];
}
if (!empty($search['vesselname'])) {
    $vesselname = $search['vesselname'];
}
if (!empty($search['voyage'])) {
    $voyage = $search['voyage'];
}
if (!empty($search['movestatus'])) {
    $movestatus = $search['movestatus'];
}
if (!empty($search['movedate'])) {
    $movedate = $search['movedate'];
}
if (!empty($search['remarks'])) {
    $remarks = $search['remarks'];
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
                  <?php
                   if ($page != "") {
                      $TitleContainerMovement = "Container Movement";
                      $page == "depoout";
                      if($page == "depoin"){
                        $TitleContainerMovement = "Depo In";
                        } elseif ($page == "depoout"){
                          $TitleContainerMovement = "Depo Out";
                        }elseif ($page == "sailing"){
                          $TitleContainerMovement = "Sailing";
                        }elseif ($page == "arrival"){
                          $TitleContainerMovement = "Arrival";
                        }elseif ($page == "export"){
                          $TitleContainerMovement = "Export";
                        }


                      }
                      else {
                        $TitleContainerMovement = "Container Movement";
                        $page == "depoout";
                      }
                  ?>
                    <h3>
                      <?php echo $TitleContainerMovement; ?>
                    </h3>
                  </div>
                  <div class="col-6">
                    <div class="float-sm-right">
                    <!-- <a href="<?=site_url('depoin/add')?>" class="btn btn-info btn-flat">
                      <i class="fa fa-plus"></i> Create New
                    </a> -->
                  </div>
                  <div class="float-sm-right">
                   &nbsp;&nbsp;
                  </div>
                  <div class="float-sm-right">
                    <a href="<?=site_url('depoin/upload/')?><?php echo $page ?>" class="btn btn-primary btn-flat">
                      <i class="fa fa-upload"></i> Upload Excel Data
                    </a>
                  </div>
                </div>
                </div>




              <form action="<?=site_url('depoin/cari/')?><?php echo $page ?>" method="post">
              <div class="row">
              <div class="col-md-6">
                    <div class="callout callout-info bott">
                
                    <div class="row">
                      <div class="col-12 col-md-12 form-group row">
                        <label class="col-sm-3 col-form-label not-bold">Feeder Operator</label>
                        <div class="col-sm-9">
                          <select name="feedercode" id="feedercode" class="form-control form-control-sm">
                          <option value="">- All -</option>
                            <?php 
                              foreach ($feedRow as $key => $value) {
                                $feedOps = $value->feedercode;
                            ?>
                                <option value="<?php echo $feedOps ?>" 
                                  <?php echo $feedercode == $feedOps ? 'selected' : ''; ?>>
                                  <?php echo $feedOps ?>
                                </option>
                            <?php
                              }
                             ?>
                          </select>
                        </div>
                      </div>
                    </div>


                    <div class="row upp">
                      <div class="col-12 col-md-12 form-group row">
                        <label class="col-sm-3 col-form-label not-bold">Container No</label>
                        <div class="col-sm-9">
                          <input type="text" name="containerno" class="form-control form-control-sm" placeholder="Container No" value="<?php echo $containerno ?>">
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
               
                </div>
               </div> <!-- /.col -->    
                                  
        </div>
            </form> 


                </div>
              <!-- /.card-header -->
              <div class="card-body upp">
                <table id="noSearch" class="table table-sm table-hover table-bordered">
                    <thead class="bg-info"> 
                        <tr> 
                            <th>#</th>
                            <th>Container No</th>
                            <th>Size</th>
                            <th>Type</th>
                            <th>DO Number</th>
                            <th>Feeder</th>
                            <th>Vessel</th>
                            <th>Voy</th>
                            <th>Status</th>
                            <th>Status Date</th>
                            <th>Location</th>
                            <th>Depo</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($row->result() as $key => $data) {
                          $containerno = $data->containerno;
                          ?>
                        <tr> 
                            <td style="width:5%;"><?=$no?></td>
                            <td><a href="<?=site_url('depoin/edit/')?><?php echo $containerno ?>"><?=$data->containerno?></a></td>
                            <td><?=$data->contsize?></td>
                            <td><?=$data->conttype?></td>
                            <td><?=$data->donumber?></td>
                            <td><?=$data->feedercode?></td>
                            <td><?=$data->vesselname?></td>
                            <td><?=$data->voyage?></td>
                            <td><?=$data->movestatus?></td>
                            <td><?=$data->movedate?></td>
                            <td><?=$data->location?></td>
                            <td><?=$data->depo?></td>
                            <td><?=$data->remarks?></td>
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
<script type="text/javascript">
  $('#etafrom').datetimepicker({
      format: 'L',
      <?php 
        if ($etafrom != "") {
      ?>
      date:'<?php echo date("m/d/Y", strtotime($etafrom)); ?>',
      <?php
        }
      ?>
  });

  $('#etato').datetimepicker({
      format: 'L',
      <?php 
        if ($etato != "") {
      ?>
      date:'<?php echo date("m/d/Y", strtotime($etato)); ?>',
      <?php
        }
      ?>
  });
  $('#etdfrom').datetimepicker({
      format: 'L',
      <?php 
        if ($etdfrom != "") {
      ?>
      date:'<?php echo date("m/d/Y", strtotime($etdfrom)); ?>',
      <?php
        }
      ?>
  });

  $('#etdto').datetimepicker({
      format: 'L',
      <?php 
        if ($etdto != "") {
      ?>
      date:'<?php echo date("m/d/Y", strtotime($etdto)); ?>',
      <?php
        }
      ?>
  });
  $('#berthdatefrom').datetimepicker({
      format: 'L',
      <?php 
        if ($berthdatefrom != "") {
      ?>
      date:'<?php echo date("m/d/Y", strtotime($berthdatefrom)); ?>',
      <?php
        }
      ?>
  });

  $('#berthdateto').datetimepicker({
      format: 'L',
      <?php 
        if ($berthdateto != "") {
      ?>
      date:'<?php echo date("m/d/Y", strtotime($berthdateto)); ?>',
      <?php
        }
      ?>
  });
</script>
