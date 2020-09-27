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

$contgroup= "";
$rent20= "";
$rent40= "";
$freetime20= "";
$freetime40= "";
$tare20= "";
$tare40 = "";
$payload20= "";
$payload40= "";
$remarks= "";
$effectivedatefrom= "";
$effectivedateto= "";
$expiredatefrom= "";
$expiredateto= "";
$disabled= "";


if (!empty($search['contgroup'])) {
    $contgroup= $search['contgroup'];
    $disabled = "readonly";
}

if (!empty($search['rent20'])) {
    $rent20 = $search['rent20'];
}

if (!empty($search['rent40'])) {
    $rent40 = $search['rent40'];
}

if (!empty($search['freetime20'])) {
    $freetime20 = $search['freetime20'];
}

if (!empty($search['freetime40'])) {
    $freetime40 = $search['freetime40'];
}

if (!empty($search['tare20'])) {
    $tare20 = $search['tare20'];
}

if (!empty($search['tare40'])) {
    $tare40 = $search['tare40'];
}

if (!empty($search['payload20'])) {
    $payload20 = $search['payload20'];
}

if (!empty($search['payload40'])) {
    $payload40 = $search['payload40'];
}

if (!empty($search['remarks'])) {
    $remarks = $search['remarks'];
}

if (!empty($search['effectivedatefrom'])) {
    $effectivedatefrom = $search['effectivedatefrom'];
}
if (!empty($search['effectivedateto'])) {
    $effectivedateto = $search['effectivedateto'];
}

if (!empty($search['expiredatefrom'])) {
    $expiredatefrom = $search['expiredatefrom'];
}
if (!empty($search['expiredateto'])) {
    $expiredateto = $search['expiredateto'];
}

 ?>
<style type="text/css">
.auto-style {
	text-align: center;
}
</style>




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
                      Container Rate
                    </h3>
                  </div>
                  <div class="col-6">
                    <div class="float-sm-right">
                    <a href="<?=site_url('container/add')?>" class="btn btn-info btn-flat">
                      <i class="fa fa-plus"></i> Create New
                    </a>
                </div>
                  </div>
                </div>

                <div class="callout callout-info bott">
                  <form action="<?=site_url('container/cari')?>" method="post">
                    <div class="row">
                      <div class="col-8 col-md-12 form-group row">
                        <label class="col-sm-2 col-form-label not-bold">Group Rate</label>
                        <div class="col-sm-5">
                          <input type="text" name="contgroup" class="form-control form-control-sm" placeholder="Group Rate" value="<?php echo $contgroup ?>">
                        </div>
                      </div>
                      <div class="col-md-1"></div>
                    </div>
                    <div class="row upp">
                      <div class="col-8 col-md-12 form-group row">
                        <label class="col-sm-2 col-form-label not-bold">Effective Date From</label>
                        <div class="col-sm-2">
                          <div class="input-group date" id="effectivedatefrom" data-target-input="nearest">
                            <input class="form-control form-control-sm datetimepicker-input" data-target="#effectivedatefrom" name="effectivedatefrom" id="effectivedateValfrom" data-toggle="datetimepicker" value="<?php echo $effectivedatefrom ?>" autocomplete="off">
                            <div class="input-group-text" data-target="#effectivedatefrom" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                        <!-- <span>To</span> -->
                        <div class="col-sm-1" align="center">To</div>
                        <div class="col-sm-2">
                          <div class="input-group date" id="effectivedateto" data-target-input="nearest">
                            <input class="form-control form-control-sm datetimepicker-input" data-target="#effectivedateto" name="effectivedateto" id="effectivedateValto" data-toggle="datetimepicker" value="<?php echo $effectivedateto ?>" autocomplete="off">
                            <div class="input-group-text" data-target="#effectivedateto" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row upp">
                      <div class="col-8 col-md-12 form-group row">
                        <label class="col-sm-2 col-form-label not-bold">Expired Date From</label>
                        <div class="col-sm-2">
                          <div class="input-group date" id="expiredatefrom" data-target-input="nearest">
                            <input class="form-control form-control-sm datetimepicker-input" data-target="#expiredatefrom" name="expiredatefrom" id="expiredateValfrom" data-toggle="datetimepicker" value="<?php echo $expiredatefrom ?>" autocomplete="off">
                            <div class="input-group-text" data-target="#expiredatefrom" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                        <div class="col-sm-1" align="center">To</div>
                        <div class="col-sm-2">
                          <div class="input-group date" id="expiredateto" data-target-input="nearest">
                            <input class="form-control form-control-sm datetimepicker-input" data-target="#expiredateto" name="expiredateto" id="expiredateValto" data-toggle="datetimepicker" value="<?php echo $expiredateto ?>" autocomplete="off">
                            <div class="input-group-text" data-target="#expiredateto" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row bott">
                      <div class="col-7 col-md-4">
                        <button class="btn btn-success btn-flat" id="car">
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
                            <th rowspan="2" class="auto-style" >Group Rate</th>
                            <th colspan="2" class="auto-style">Container 20'</th>
                            <th colspan="2" class="auto-style">Container 40'</th>
                            <th rowspan="2" class="auto-style">Effective Date</th>
                            <th rowspan="2" class="auto-style">Expired Date</th>
                            <th rowspan="2" class="auto-style">Remarks</th>
                        </tr>
                        <tr> 
                            <th class="auto-style">Daily Rental</th>
                            <th class="auto-style">FreeTime </th>
                            <th class="auto-style">Daily Rental</th>
                            <th class="auto-style">FreeTime</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($row->result() as $key => $data) {
                          $contgroup = $data->contgroup;
                          ?>
                        <tr> 
                            <td><?=$no?></td>
                            <td><a href="<?=site_url('container/edit/')?><?php echo $contgroup ?>"><?=$data->contgroup?></a></td>
                            <td><?=$data->rent20?></td>
                            <td><?=$data->freetime20?>  Days</td>
                            <td><?=$data->rent40?></td>
                            <td><?=$data->freetime40?>  Days</td>
                            <td><?=$data->effectivedate?></td>
                            <td><?=$data->expiredate?></td>
                            <td><?=$data->remarks?></td>
                            <!-- <td>satu</td> -->
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

<script type="text/javascript">
  $('#effectivedatefrom').datetimepicker({
      format:'L',
      <?php 
        if ($effectivedatefrom != "") {
      ?>
      date:'<?php echo date("m/d/Y", strtotime($effectivedatefrom)); ?>',
      <?php
        }
      ?>
  });

  $('#effectivedateto').datetimepicker({
      format: 'L',
      <?php 
        if ($effectivedateto != "") {
      ?>
      date:'<?php echo date("m/d/Y", strtotime($effectivedateto)); ?>',
      <?php
        }
      ?>
  });

  $('#expiredatefrom').datetimepicker({
      format: 'L',
      <?php 
        if ($expiredatefrom != "") {
      ?>
      date:'<?php echo date("m/d/Y", strtotime($expiredatefrom)); ?>',
      <?php
        }
      ?>
  });

  $('#expiredateto').datetimepicker({
      format: 'L',
      <?php 
        if ($expiredateto != "") {
      ?>
      date:'<?php echo date("m/d/Y", strtotime($expiredateto)); ?>',
      <?php
        }
      ?>
  });
</script>