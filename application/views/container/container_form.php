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
$effectivedate= "";
$expiredate= "";
$disabled= "";


if (!empty($row->contgroup)) {
    $contgroup= $row->contgroup;
    $disabled = "readonly";
}

if (!empty($row->rent20)) {
    $rent20 = $row->rent20;
}

if (!empty($row->rent40)) {
    $rent40 = $row->rent40;
}

if (!empty($row->freetime20)) {
    $freetime20 = $row->freetime20;
}

if (!empty($row->freetime40)) {
    $freetime40 = $row->freetime40;
}

if (!empty($row->tare20)) {
    $tare20 = $row->tare20;
}

if (!empty($row->tare40)) {
    $tare40 = $row->tare40;
}

if (!empty($row->payload20)) {
    $payload20 = $row->payload20;
}

if (!empty($row->payload40)) {
    $payload40 = $row->payload40;
}

if (!empty($row->remarks)) {
    $remarks = $row->remarks;
}

if (!empty($row->effectivedate)) {
    $effectivedate = $row->effectivedate;
}

if (!empty($row->expiredate)) {
    $expiredate = $row->expiredate;
}

 ?>

<script type="text/javascript">
    function cekUserid() {
      // alert('haha');
            var id = $("#contgroup").val();
            $.post("<?=site_url('container/cekuser')?>",
              {
                contgroup: id
              },
              function(data, status){
                if (data > 0) {
                    $("#err").html("User ID telah digunakan");
                    $("#submitBtn").attr("disabled", "disabled").button('refresh');
                    $("#contgroup").focus();
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
                        Container Rate Entry
                        <small>&nbsp;</small>
                      </h3>
                  </div>
                  <div class="col-6">
                     <div class="float-sm-right">
                        
                        <?php 
                            if($page == "add"){
                            $url = 'container/create';
                        ?>
                            <button type="button" id="submitBtn" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>

                        <?php  
                            }elseif ($page == "edit") {
                            $url = 'container/process/'.$contgroup;
                            $urlDel = 'container/del/'.$contgroup;
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
                        
                        <a href="<?=site_url('container')?>" class="btn btn-warning btn-flat text-white">
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
                  <div class="col-8 col-sm-7 form-group row">
                    <label class="col-sm-3 col-form-label not-bold">Group Rate</label>
                    <div class="col-sm-8">
                      <input type="text" name="contgroup" id="contgroup" onchange="cekUserid(id)" class="form-control form-control-sm" placeholder="Group Rate" required value="<?php echo $contgroup ?>" <?php echo $disabled; ?>>
                      <small id="err" class="text-danger"></small>
                    </div>
                  </div>
                </div>
                <div class="row upp">
                  <div class="col-8 col-sm-7 form-group row">
                    <label class="col-sm-3 col-form-label not-bold">Effective Date</label>
                    <div class="col-sm-8">
                      <div class="input-group date" id="effectivedate" data-target-input="nearest">
                        <input class="form-control form-control-sm datetimepicker-input" data-target="#effectivedate" name="effectivedate" id="effectivedateVal" data-toggle="datetimepicker" value="<?php echo $effectivedate ?>" autocomplete="off">
                        <div class="input-group-text" data-target="#effectivedate" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row upp">
                  <div class="col-8 col-sm-7 form-group row">
                    <label class="col-sm-3 col-form-label not-bold">Expire Date</label>
                    <div class="col-sm-8">
                      <div class="input-group date" id="expiredate" data-target-input="nearest">
                        <input class="form-control form-control-sm datetimepicker-input" data-target="#expiredate" id="expiredateVal" name="expiredate" data-toggle="datetimepicker" value="<?php echo $expiredate ?>" autocomplete="off">
                        <div class="input-group-text" data-target="#expiredate" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-8 col-sm-7 form-group row">
                    <label class="col-sm-3 col-form-label not-bold" style="vertical-align: text-bottom"></label>
                    <div class="col-sm-4" align="center">
                      <label>Container 20'</label>
                    </div>
                    <div class="col-sm-4" align="center">
                      <label>Container 40'</label>
                    </div>
                  </div>
                </div>
                <div class="row upp">
                  <div class="col-8 col-sm-7 form-group row">
                    <label class="col-sm-3 col-form-label not-bold">Daily Rental</label>
                    <div class="col-sm-4">
                      <input type="text" name="rent20" id="rent20" class="form-control form-control-sm" placeholder="Daily Rental 20" required value="<?php echo $rent20 ?>">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="rent40" id="rent40" class="form-control form-control-sm" placeholder="Daily Rental 40" required value="<?php echo $rent40 ?>">
                    </div>
                  </div>
                </div>

                <div class="row upp">
                  <div class="col-8 col-sm-7 form-group row">
                    <label class="col-sm-3 col-form-label not-bold">Free Time</label>
                    <div class="col-sm-2">
                      <input type="text" name="freetime20" id="freetime20" class="form-control form-control-sm" placeholder="Free Time 20" required value="<?php echo $freetime20 ?>">
                    </div>
                    <div class="col-sm-2"><small class="text-info">Days</small></div>
                    <div class="col-sm-2">
                      <input type="text" name="freetime40" id="freetime40" class="form-control form-control-sm" placeholder="Free Time 40" required value="<?php echo $freetime40 ?>">
                    </div>
                    <div class="col-sm-2"><small class="text-info">Days</small></div>
                  </div>
                </div>

                <div class="row upp">
                  <div class="col-8 col-sm-7 form-group row">
                    <label class="col-sm-3 col-form-label not-bold">Tare Weight</label>
                    <div class="col-sm-2">
                      <input type="text" name="tare20" id="tare20" class="form-control form-control-sm" placeholder="Tare Weight 20" required value="<?php echo $tare20 ?>">
                    </div>
                    <div class="col-sm-2"><small class="text-info">Kgs</small></div>
                    <div class="col-sm-2">
                      <input type="text" name="tare40" id="tare40" class="form-control form-control-sm" placeholder="Tare Weight 40" required value="<?php echo $tare40 ?>">
                    </div>
                    <div class="col-sm-2"><small class="text-info">Kgs</small></div>
                  </div>
                </div>

                <div class="row upp">
                  <div class="col-8 col-md-7 form-group row">
                    <label class="col-sm-3 col-form-label not-bold">Payload Weight</label>
                    <div class="col-sm-2">
                      <input type="text" name="payload20" id="payload20" class="form-control form-control-sm" placeholder="Payload Weight 20" required value="<?php echo $payload20 ?>">
                    </div>
                    <div class="col-sm-2"><small class="text-info">Kgs</small></div>
                    <div class="col-sm-2">
                      <input type="text" name="payload40" id="payload40" class="form-control form-control-sm" placeholder="Payload Weight 40" required value="<?php echo $payload40 ?>">
                    </div>
                    <div class="col-sm-2"><small class="text-info">Kgs</small></div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-8 col-md-7 form-group row">
                    <label class="col-sm-3 col-form-label not-bold">Remarks</label>
                    <div class="col-sm-8">
                      <textarea name="remarks" id="remarks" class="form-control form-control-sm"><?php echo $remarks ?></textarea>
                    </div>
                  </div>
                </div>
                <!-- <div class="row upp">
                  <div class="col-8 col-md-6 form-group row">
                    <label class="col-sm-3 col-form-label not-bold">Contract Status *</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio1" checked>
                      <label class="form-check-label">Active</label>
                    </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="radio1">
                      <label class="form-check-label">Not Active</label>
                    </div>
                  </div>
                </div> -->
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
            
            var contgroup = $("#contgroup").val();
            var rent20 = $("#rent20").val();
            var rent40 = $("#rent40").val();
            var freetime20 = $("#freetime20").val();
            var freetime40 = $("#freetime40").val();
            var tare20 = $("#tare20").val();
            var tare40 = $("#tare40").val();
            var payload20 = $("#payload20").val();
            var payload40 = $("#payload40").val();
            var remarks = $("#remarks").val();
            var effectivedate = $("#effectivedateVal").val();
            var expiredate = $("#expiredateVal").val();

            if (contgroup == "") {
                alert("group rate can't Null");
                $("#contgroup").focus();
            }else if(effectivedate == ""){
                alert("effective date can't Null");
                $("#effectivedate").focus();
            }else if(expiredate == ""){
                alert("expire date can't Null");
                $("#expiredate").focus();
            }else if(rent20 == ""){
                alert("rent20 can't Null");
                $("#rent20").focus();
            }else if(rent40 == ""){
                alert("rent40 can't Null");
                $("#rent40").focus();
            }else if(freetime20 == ""){
                alert("freetime20 can't Null");
                $("#freetime20").focus();
            }else if(freetime40 == ""){
                alert("freetime40 can't Null");
                $("#freetime40").focus();
            }else if(tare20 == ""){
                alert("tare20 can't Null");
                $("#tare20").focus();
            }else if(tare40 == ""){
                alert("tare40 can't Null");
                $("#tare40").focus();
            }else if(payload20 == ""){
                alert("payload20 can't Null");
                $("#payload20").focus();
            }else if(payload40 == ""){
                alert("payload20 can't Null");
                $("#payload40").focus();
            }else if(remarks == ""){
                alert("remarks can't Null");
                $("#remarks").focus();
            }else{
                $('#modalSubmit').modal('show');
            }

        });

        $("#updateBtn").click(function(){        
            
            var user_id = $("#user_id").val();
            var username = $("#username").val();
            var password = $("#password").val();
            var name = $("#name").val();
            var divbran = $("#divbran").val();
            var level = $("#level").val();

            if (user_id == "") {
                alert("User ID can't Null");
                $("#user_id").focus();
            }else if(username == ""){
                alert("username can't Null");
                $("#username").focus();
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

    $('#effectivedate').datetimepicker({
        format: 'L',
        <?php 
          if ($effectivedate != "") {
        ?>
        date:'<?php echo date("m/d/Y", strtotime($effectivedate)); ?>',
        <?php
          }
        ?>
        
    });

    $('#expiredate').datetimepicker({
        format: 'L',
        <?php 
          if ($effectivedate != "") {
        ?>
        date:'<?php echo date("m/d/Y", strtotime($expiredate)); ?>',
        <?php
          }
        ?>
        
    });
    </script>
