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
                      Feeders Schedule
                    </h3>
                  </div>
                  <div class="col-6">
                    <div class="float-sm-right">
                    <a href="<?=site_url('feederschedule/add')?>" class="btn btn-info btn-flat">
                      <i class="fa fa-plus"></i> Create New
                    </a>
                  </div>
                  <div class="float-sm-right">
                   &nbsp;&nbsp;
                  </div>
                  <div class="float-sm-right">
                    <a href="#" class="btn btn-primary btn-flat">
                      <i class="fa fa-upload"></i> Upload Excel Data
                    </a>
                  </div>
                </div>
                </div>




              <form action="<?=site_url('feederschedule/cari')?>" method="post">
              <div class="row">
              <div class="col-md-6">
                    <div class="callout callout-info bott">
                
                    <div class="row">
                      <div class="col-12 col-md-12 form-group row">
                        <label class="col-sm-3 col-form-label not-bold">Feeder Vendor</label>
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
                         <label class="col-sm-3 col-form-label not-bold">ETD From</label>
                        <div class="col-sm-4">
                          <div class="input-group date" id="etdfrom" data-target-input="nearest">
                            <input class="form-control form-control-sm datetimepicker-input" data-target="#etdfrom" name="etdfrom" id="etdValfrom" data-toggle="datetimepicker" value="<?php echo $etdfrom ?>" autocomplete="off">
                            <div class="input-group-text" data-target="#etdfrom" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                        <label class="col-sm-1 col-form-label not-bold">To</label>
                        <div class="col-sm-4">
                          <div class="input-group date" id="etdto" data-target-input="nearest">
                             <input class="form-control form-control-sm datetimepicker-input" data-target="#etdto" name="etdto" id="etdValto" data-toggle="datetimepicker" value="<?php echo $etdto ?>" autocomplete="off">
                            <div class="input-group-text" data-target="#etdto" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row upp">
                       <div class="col-12 col-md-12 form-group row">
                         <label class="col-sm-3 col-form-label not-bold">ETA From</label>
                        <div class="col-sm-4">
                          <div class="input-group date" id="etafrom" data-target-input="nearest">
                            <input class="form-control form-control-sm datetimepicker-input" data-target="#etafrom" name="etafrom" id="etaValfrom" data-toggle="datetimepicker" value="<?php echo $etafrom ?>" autocomplete="off">
                            <div class="input-group-text" data-target="#etafrom" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                        <label class="col-sm-1 col-form-label not-bold">To</label>
                        <div class="col-sm-4">
                          <div class="input-group date" id="etato" data-target-input="nearest">
                             <input class="form-control form-control-sm datetimepicker-input" data-target="#etato" name="etato" id="etaValto" data-toggle="datetimepicker" value="<?php echo $etato ?>" autocomplete="off">
                            <div class="input-group-text" data-target="#etato" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    

                    <div class="row upp">
                       <div class="col-12 col-md-12 form-group row">
                         <label class="col-sm-3 col-form-label not-bold">Berthing Date</label>
                        <div class="col-sm-4">
                          <div class="input-group date" id="berthdatefrom" data-target-input="nearest">
                            <input class="form-control form-control-sm datetimepicker-input" data-target="#berthdatefrom" name="berthdatefrom" id="berthdateValfrom" data-toggle="datetimepicker" value="<?php echo $berthdatefrom ?>" autocomplete="off">
                            <div class="input-group-text" data-target="#berthdatefrom" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                        <label class="col-sm-1 col-form-label not-bold">To</label>
                        <div class="col-sm-4">
                          <div class="input-group date" id="berthdateto" data-target-input="nearest">
                             <input class="form-control form-control-sm datetimepicker-input" data-target="#berthdateto" name="berthdateto" id="berthdateValto" data-toggle="datetimepicker" value="<?php echo $berthdateto ?>" autocomplete="off">
                            <div class="input-group-text" data-target="#berthdateto" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                          </div>
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



               <div class="col-md-6">
              <div class="callout callout-info bott">     
                  <div class="row upp">
                      <div class="col-12 col-md-12 form-group row">
                        <label class="col-sm-3 col-form-label not-bold" ></label>
                        <div class="col-sm-9">
                          
                        </div>
                      </div>
                    </div>   
                  <div class="row upp">
                      <div class="col-12 col-md-12 form-group row">
                        <label class="col-sm-3 col-form-label not-bold">Origin</label>
                        <div class="col-sm-9">
                          <input type="text" name="deptport" class="form-control form-control-sm" placeholder="Origin" value="<?php echo $deptport ?>">
                        </div>
                      </div>
                      </div>


                      <div class="row upp">
                      <div class="col-12 col-md-12 form-group row">
                        <label class="col-sm-3 col-form-label not-bold">Destination</label>
                        <div class="col-sm-9">
                          <input type="text" name="destport" class="form-control form-control-sm" placeholder="Destination" value="<?php echo $destport ?>">
                        </div>
                      </div>
                      </div>              




                    <div class="row upp">
                        <div class="col-12 col-md-12 form-group row">
                        <label class="col-sm-3 col-form-label not-bold">Vessel Code</label>
                        <div class="col-sm-9">
                          <input type="text" name="vesselcode" class="form-control form-control-sm" placeholder="Vessel Code" value="<?php echo $vesselcode ?>">
                        </div>
                      </div>
                    </div>
                    
                    <div class="row upp">
                      <div class="col-12 col-md-12 form-group row">
                        <label class="col-sm-3 col-form-label not-bold">Vessel Name</label>
                        <div class="col-sm-9">
                          <input type="text" name="vesselname" class="form-control form-control-sm" placeholder="Vessel Name" value="<?php echo $vesselname ?>">
                        </div>
                      </div>
                      </div>

                      <div class="row upp">
                        <div class="col-12 col-md-12 form-group row">
                          <label class="col-sm-3 col-form-label not-bold">Voyage</label>
                          <div class="col-sm-9">
                            <input type="text" name="voyage" class="form-control form-control-sm" placeholder="Voyage" value="<?php echo $voyage ?>">
                          </div>
                        </div>
                    </div>

                    <div class="row upp">
                      <div class="col-12 col-md-12 form-group row">
                        <label class="col-sm-3 col-form-label not-bold"></label>
                        <div class="col-sm-9">
                     
                        </div>
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
                            <th>Feeder Vendor</th>
                            <th>Origin</th>
                            <th>Destination</th>
                            <th>Vessel Code</th>
                            <th>Vessel Name</th>
                            <th>Voyage</th>
                            <th>ETD</th>
                            <th>ETA</th>
                            <th>Berthing Date</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($row->result() as $key => $data) {
                          $lingrid = $data->lingrid;
                          ?>
                        <tr> 
                            <td style="width:5%;"><?=$no?></td>
                            <td><a href="<?=site_url('feederschedule/edit/')?><?php echo $lingrid ?>"><?=$data->feedercode?></a></td>
                            <td><?=$data->deptport?></td>
                            <td><?=$data->destport?></td>
                            <td><?=$data->vesselcode?></td>
                            <td><?=$data->vesselname?></td>
                            <td><?=$data->voyage?></td>
                            <td><?=$data->etd?></td>
                            <td><?=$data->eta?></td>
                            <td><?=$data->berthdate?></td>
                            <td><?=$data->servicecode?></td>
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
