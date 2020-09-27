<?php 

$lingrid = "";
$feedercode= "";
$deptport= "";
$destport= "";
$vesselcode = "";
$vesselname= "";
$voyage= "";
$etd= "";
$eta = "";
$berthdate= "";
$servicecode= "";
$disabled = "";


if (!empty($row->lingrid)) {
    $lingrid= $row->lingrid;
    $disabled = "readonly";
}

if (!empty($row->feedercode)) {
    $feedercode= $row->feedercode;
}

if (!empty($row->deptport)) {
    $deptport= $row->deptport;
}

if (!empty($row->destport)) {
    $destport= $row->destport;
}

if (!empty($row->vesselcode)) {
    $vesselcode= $row->vesselcode;
}

if (!empty($row->vesselname)) {
    $vesselname= $row->vesselname;
}

if (!empty($row->voyage)) {
    $voyage= $row->voyage;
}

if (!empty($row->etd)) {
    $etd= $row->etd;
}

if (!empty($row->eta)) {
    $eta= $row->eta;
}

if (!empty($row->berthdate)) {
    $berthdate= $row->berthdate;
}

if (!empty($row->servicecode)) {
    $servicecode= $row->servicecode;
}

 ?>

<script type="text/javascript">
    function cekfeederid() {
            var id = $("#feedercode").val();
            $.post("<?=site_url('feeder/cekfeeder')?>",
              {
                feederid: id
              },
              function(data, status){
                // alert(data);
                if (data > 0) {
                    $("#err").html("Feeder Code Already Exist");
                    $("#submitBtn").attr("disabled", "disabled").button('refresh');
                    $("#feedercode").focus();
                }else{
                    $("#err").html("");
                    $("#submitBtn").removeAttr("disabled").button('refresh');
                }
              })
        }
</script>
<section class="content" style="margin-top: 10px;">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <div class="row">
                  <div class="col-6">
                      <h3>
                        Feeder Schedule Entry
                        <small>&nbsp;</small>
                      </h3>
                  </div>
                  <div class="col-6">
                     <div class="float-sm-right">
                        
                        <?php 
                            if($page == "add"){
                            $url = 'feederschedule/create';
                        ?>
                            <button type="button" id="submitBtn" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>

                        <?php  
                            }elseif ($page == "edit") {
                            $url = 'feederschedule/process/'.$feedercode;
                            $urlDel = 'feederschedule/del/'.$lingrid;
                        ?>
                            <button type="button" id="updateBtn" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Update
                            </button>
                            <button type="button" id="deleteBtn" class="btn btn-danger btn-flat">
                                <i class="fa fa-trash"></i> Delete
                            </button>                         
                        <?php 
                            }
                         ?>
                        
                        <a href="<?=site_url('feederschedule')?>" class="btn btn-warning btn-flat text-white">
                           <i class="fa fa-undo"></i> Back
                        </a>
                    </div> 
                  </div>
              </div>
                
              <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            
            <div class="card-body pad">
                <form action="<?=site_url($url)?>" method="post" id="myForm">
                  <div class="row">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Feeder Vendor</label>
                      <div class="col-sm-5">
                        <select name="feedercode" id="feedercode" class="form-control form-control-sm">
                          <?php 
                            foreach ($feedRow as $key => $value) {
                              $feedercodeOps = $value->feedercode;
                          ?>
                              <option value="<?php echo $feedercodeOps ?>" 
                                <?php echo $feedercode == $feedercodeOps ? 'selected' : ''; ?>>
                                <?php echo $feedercodeOps ?>
                                  
                                </option>
                          <?php
                            }
                           ?>
                        </select>
                        <input type="hidden" name="lingrid" value="<?php echo $lingrid ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Origin</label>
                      <div class="col-sm-5">
                        <input type="text" name="deptport" id="deptport" class="form-control form-control-sm" placeholder="Origin" required value="<?php echo $deptport ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Destination</label>
                      <div class="col-sm-5">
                        <input type="text" name="destport" id="destport" class="form-control form-control-sm" placeholder="Destination" required value="<?php echo $destport ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Vessel Code</label>
                      <div class="col-sm-5">
                        <input type="text" name="vesselcode" id="vesselcode" class="form-control form-control-sm" placeholder="Vessel Code" required value="<?php echo $vesselcode ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Vessel Name</label>
                      <div class="col-sm-5">
                        <input type="text" name="vesselname" id="vesselname" class="form-control form-control-sm" placeholder="Vessel Name" required value="<?php echo $vesselname ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Voyage</label>
                      <div class="col-sm-5">
                        <input type="text" name="voyage" id="voyage" class="form-control form-control-sm" placeholder="Voyage" required value="<?php echo $voyage ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">ETD</label>
                      <div class="col-sm-5">
                        <div class="input-group date" id="etd" data-target-input="nearest">
                          <input class="form-control form-control-sm datetimepicker-input" data-target="#etd" name="etd" id="etdVal" data-toggle="datetimepicker" value="<?php echo $etd ?>" autocomplete="off">
                          <div class="input-group-text" data-target="#etd" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">ETA</label>
                      <div class="col-sm-5">
                        <div class="input-group date" id="eta" data-target-input="nearest">
                          <input class="form-control form-control-sm datetimepicker-input" data-target="#eta" name="eta" id="etaVal" data-toggle="datetimepicker" value="<?php echo $eta ?>" autocomplete="off">
                          <div class="input-group-text" data-target="#eta" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Berthing Date</label>
                      <div class="col-sm-5">
                        <div class="input-group date" id="berthdate" data-target-input="nearest">
                          <input class="form-control form-control-sm datetimepicker-input" data-target="#berthdate" name="berthdate" id="berthdateVal" data-toggle="datetimepicker" value="<?php echo $berthdate ?>" autocomplete="off">
                          <div class="input-group-text" data-target="#berthdate" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Remarks</label>
                      <div class="col-sm-5">
                        <textarea name="servicecode" id="servicecode" class="form-control form-control-sm"><?php echo $servicecode ?></textarea>
                      </div>
                    </div>
                  </div>
                </form>
            </div>
          </div>
        </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>

    <div class="modal fade" id="modalSubmit">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">BoxOps System</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Do you want to save this data?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" onclick="formSubmit()">Save</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalUpdate">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">BoxOps System</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Do you want to update this data?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" onclick="formSubmit()">Save</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalDelete">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">BoxOps System</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Do you want to delete this data?</p>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <a href="<?=site_url($urlDel)?>" class="btn btn-danger">Delete</a>
          </div>
        </div>
      </div>
    </div>

    <script>
    $(document).ready(function(){
        $("#submitBtn").click(function(){        
            
            var lingrid = $("#lingrid").val();
            var feedercode = $("#feedercode").val();
            var deptport = $("#deptport").val();
            var destport = $("#destport").val();
            var vesselcode = $("#vesselcode").val();
            var vesselname = $("#vesselname").val();
            var voyage = $("#voyage").val();
            var etd = $("#etdVal").val();
            var eta = $("#etaVal").val();
            var berthdate = $("#berthdateVal").val();
            var servicecode = $("#servicecode").val();

            if (feedercode == "") {
                alert("Feeder Vendor can't Null");
                $("#feedercode").focus();
            }else if(deptport == ""){
                alert("deptport can't Null");
                $("#deptport").focus();
            }else if(destport == ""){
                alert("destport can't Null");
                $("#destport").focus();
            }else if(vesselcode == ""){
                alert("vesselcode can't Null");
                $("#vesselcode").focus();
            }else if(vesselname == ""){
                alert("vesselname can't Null");
                $("#vesselname").focus();
            }else if(voyage == ""){
                alert("voyage can't Null");
                $("#voyage").focus();
            }else if(etd == ""){
                alert("etd can't Null");
                $("#etd").focus();
            }else if(eta == ""){
                alert("eta can't Null");
                $("#eta").focus();
            }else if(berthdate == ""){
                alert("berthdate can't Null");
                $("#berthdate").focus();
            }else if(servicecode == ""){
                alert("servicecode can't Null");
                $("#servicecode").focus();
            }else{
                $('#modalSubmit').modal('show');
                // $("#myForm").submit();
            }

        });

        $("#updateBtn").click(function(){        
            
            var feedercode = $("#feedercode").val();
            var feedername = $("#feedername").val();
            var password = $("#password").val();
            var name = $("#name").val();
            var divbran = $("#divbran").val();
            var level = $("#level").val();

            if (feedercode == "") {
                alert("feeder ID can't Null");
                $("#feedercode").focus();
            }else if(feedername == ""){
                alert("feedername can't Null");
                $("#feedername").focus();
            }else if(password == ""){
                alert("password can't Null");
                $("#password").focus();
            }else if(name == ""){
                alert("name can't Null");
                $("#name").focus();
            }else if(divbran == ""){
                alert("divbran can't Null");
                $("#divbran").focus();
            }else if(level == ""){
                alert("level can't Null");
                $("#level").focus();
            }else{
                $('#modalUpdate').modal('show');
                // $("#myForm").submit();
            }
            
        });

        $("#deleteBtn").click(function(){   
          $('#modalDelete').modal('show');
        });

    });

    function formSubmit() {
      $("#myForm").submit();
    }

    $('#etd').datetimepicker({
        format: 'L',
        <?php 
          if ($etd != "") {
        ?>
        date:'<?php echo date("m/d/Y", strtotime($etd)); ?>',
        <?php
          }
        ?>       
    });

    $('#eta').datetimepicker({
        format: 'L',
        <?php 
          if ($eta != "") {
        ?>
        date:'<?php echo date("m/d/Y", strtotime($eta)); ?>',
        <?php
          }
        ?>
    });

    $('#berthdate').datetimepicker({
        format: 'L',
        <?php 
          if ($berthdate != "") {
        ?>
        date:'<?php echo date("m/d/Y", strtotime($berthdate)); ?>',
        <?php
          }
        ?>
    });
    </script>
