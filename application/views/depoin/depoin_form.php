<?php

$containerno = "";
$contsize = "";
$conttype = "";
$donumber = "";
$feedercode = "";
$vesselname = "";
$voyage = "";
$movestatus = "";
$movedate = "";
$location = "";
$depo = "";
$remarks = "";
$disabled = "";

if (!empty($row->containerno)) {
    $containerno= $row->containerno;
    $disabled = "readonly";
}

if (!empty($row->contsize)) {
    $contsize = $row->contsize;
}

if (!empty($row->conttype)) {
    $conttype = $row->conttype;
}

if (!empty($row->donumber)) {
  $donumber = $row->donumber;
}

if (!empty($row->feedercode)) {
    $feedercode = $row->feedercode;
}

if (!empty($row->vesselname)) {
    $vesselname = $row->vesselname;
}

if (!empty($row->voyage)) {
    $voyage = $row->voyage;
}

if (!empty($row->movestatus)) {
    $movestatus = $row->movestatus;
}

if (!empty($row->movedate)) {
    $movedate = $row->movedate;
}

if (!empty($row->location)) {
  $location = $row->location;
}

if (!empty($row->depo)) {
  $depo = $row->depo;
}

if (!empty($row->remarks)) {
    $remarks = $row->remarks;
}

 ?>

<script type="text/javascript">
    function cekfeederid() {
            var id = $("#containerno").val();
            $.post("<?=site_url('feeder/cekfeeder')?>",
              {
                feederid: id
              },
              function(data, status){
                // alert(data);
                if (data > 0) {
                    $("#err").html("Feeder Code Already Exist");
                    $("#submitBtn").attr("disabled", "disabled").button('refresh');
                    $("#containerno").focus();
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
                         Container Movement - Entry
                        <small>&nbsp;</small>
                      </h3>
                  </div>
                  <div class="col-6">
                     <div class="float-sm-right">
                        
                        <?php 
                            if($page == "add"){
                            $url = 'depoin/create';
                        ?>
                            <button type="button" id="submitBtn" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>

                        <?php  
                            }elseif ($page == "edit") {
                            $url = 'depoin/process/'.$containerno;
                            $urlDel = 'depoin/del/'.$containerno;
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
                        
                           <a href="<?php echo site_url('depoin');?>" class="btn btn-warning btn-flat text-white">
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
                      <label class="col-sm-3 col-form-label not-bold">containerno</label>
                      <div class="col-sm-5">
                        <input type="text" name="containerno" id="containerno" class="form-control form-control-sm" placeholder="containerno" required value="<?php echo $containerno ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">contsize</label>
                      <div class="col-sm-5">
                        <input type="text" name="contsize" id="contsize" class="form-control form-control-sm" placeholder="contsize" required value="<?php echo $contsize ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">conttype</label>
                      <div class="col-sm-5">
                        <input type="text" name="conttype" id="conttype" class="form-control form-control-sm" placeholder="conttype" required value="<?php echo $conttype ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">DO Number</label>
                      <div class="col-sm-5">
                        <input type="text" name="donumber" id="donumber" class="form-control form-control-sm" placeholder="DO Number" required value="<?php echo $donumber ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">feedercode</label>
                      <div class="col-sm-5">
                        <input type="text" name="feedercode" id="feedercode" class="form-control form-control-sm" placeholder="feedercode" required value="<?php echo $feedercode ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">vesselname</label>
                      <div class="col-sm-5">
                        <input type="text" name="vesselname" id="vesselname" class="form-control form-control-sm" placeholder="vesselname" required value="<?php echo $vesselname ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">voyage</label>
                      <div class="col-sm-5">
                        <input type="text" name="voyage" id="voyage" class="form-control form-control-sm" placeholder="voyage" required value="<?php echo $voyage ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">movestatus</label>
                      <div class="col-sm-5">
                        <input type="text" name="movestatus" id="movestatus" class="form-control form-control-sm" placeholder="movestatus" required value="<?php echo $movestatus ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">movedate</label>
                      <div class="col-sm-5">
                        <div class="input-group date" id="movedate" data-target-input="nearest">
                          <input class="form-control form-control-sm datetimepicker-input" data-target="#movedate" name="movedate" id="movedateVal" data-toggle="datetimepicker" value="<?php echo $movedate ?>" autocomplete="off">
                          <div class="input-group-text" data-target="#movedate" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Location</label>
                      <div class="col-sm-5">
                        <input type="text" name="location" id="location" class="form-control form-control-sm" placeholder="Location" required value="<?php echo $location ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Depo</label>
                      <div class="col-sm-5">
                        <input type="text" name="depo" id="depo" class="form-control form-control-sm" placeholder="Depo" required value="<?php echo $depo ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Status</label>
                      <div class="col-sm-5">
                        <textarea name="remarks" id="remarks" class="form-control form-control-sm"><?php echo $remarks ?></textarea>
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
            
            var containerno = $("#containerno").val();
            var containerno = $("#containerno").val();
            var deptport = $("#deptport").val();
            var destport = $("#destport").val();
            var vesselcode = $("#vesselcode").val();
            var vesselname = $("#vesselname").val();
            var voyage = $("#voyage").val();
            var etd = $("#etdVal").val();
            var movedate = $("#movedateVal").val();
            var berthdate = $("#berthdateVal").val();
            var servicecode = $("#servicecode").val();

            if (containerno == "") {
                alert("Feeder Vendor can't Null");
                $("#containerno").focus();
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
            }else if(movedate == ""){
                alert("movedate can't Null");
                $("#movedate").focus();
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
            
            var containerno = $("#containerno").val();
            var feedername = $("#feedername").val();
            var password = $("#password").val();
            var name = $("#name").val();
            var divbran = $("#divbran").val();
            var level = $("#level").val();

            if (containerno == "") {
                alert("feeder ID can't Null");
                $("#containerno").focus();
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

    $('#movedate').datetimepicker({
        format: 'L',
        <?php 
          if ($movedate != "") {
        ?>
        date:'<?php echo date("m/d/Y", strtotime($movedate)); ?>',
        <?php
          }
        ?>
    });

    </script>
