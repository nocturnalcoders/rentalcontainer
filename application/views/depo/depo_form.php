<?php 

$depocode= "";
$deponame= "";
$location= "";

$lifton20 = "";
$liftoff20 = "";
$lifton40 = "";
$liftoff40 = "";

$disabled = "";


if (!empty($row->depocode)) {
  $depocode= $row->depocode;
  $disabled = "readonly";
}

if (!empty($row->deponame)) {
  $deponame= $row->deponame;
}

if (!empty($row->location)) {
  $location= $row->location;
}


if (!empty($row->lifton20)) {
  $lifton20= $row->lifton20;
}

if (!empty($row->liftoff20)) {
  $liftoff20= $row->liftoff20;
}

if (!empty($row->lifton40)) {
  $lifton40= $row->lifton40;
}

if (!empty($row->liftoff40)) {
  $liftoff40= $row->liftoff40;
}



 ?>

<script type="text/javascript">
  function cekdepoid() {
            var id = $("#depocode").val();
            $.post("<?=site_url('depo/cekdepo')?>",
              {
                depoid: id
              },
              function(data, status){
                // alert(data);
                if (data > 0) {
                    $("#err").html("Depo Code Already Exist");
                    $("#submitBtn").attr("disabled", "disabled").button('refresh');
                    $("#depocode").focus();
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
                        Depo Entry
                        <small>&nbsp;</small>
                      </h3>
                  </div>
                  <div class="col-6">
                     <div class="float-sm-right">
                        
                        <?php 
                            if($page == "add"){
                            $url = 'depo/create';
                        ?>
                            <button type="button" id="submitBtn" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>

                        <?php  
                            }elseif ($page == "edit") {
                            $url = 'depo/process/'.$depocode;
                            $urlDel = 'depo/del/'.$depocode;
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
                        
                        <a href="<?=site_url('depo')?>" class="btn btn-warning btn-flat text-white">
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
                    <label class="col-sm-3 col-form-label not-bold">Depo Code</label>
                    <div class="col-sm-8">
                         <input type="text" name="depocode" id="depocode" onchange="cekdepoid(id)" class="form-control form-control-sm" placeholder="Depo Code" required value="<?php echo $depocode ?>" <?php echo $disabled; ?>>
                        <small id="err" class="text-danger"></small>
                    </div>
                  </div>
                </div>
                <div class="row upp">
                  <div class="col-8 col-sm-7 form-group row">
                    <label class="col-sm-3 col-form-label not-bold">Depo Name</label>
                    <div class="col-sm-8">
                          <input type="text" name="deponame" id="deponame" class="form-control form-control-sm" placeholder="Depo Name" required value="<?php echo $deponame ?>">
                    </div>
                  </div>
                </div>
                <div class="row upp">
                  <div class="col-8 col-sm-7 form-group row">
                    <label class="col-sm-3 col-form-label not-bold">Location</label>
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
                    <label class="col-sm-3 col-form-label not-bold">LIFT ON</label>
                    <div class="col-sm-4">
                      <input type="text" name="lifton20" id="lifton20" class="form-control form-control-sm" placeholder="Lift ON 20" required value="<?php echo $lifton20 ?>">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="lifton40" id="lifton40" class="form-control form-control-sm" placeholder="Lift ON 40" required value="<?php echo $lifton40 ?>">
                    </div>
                  </div>
                </div>

                <div class="row upp">
                  <div class="col-8 col-sm-7 form-group row">
                    <label class="col-sm-3 col-form-label not-bold">LIFT OFF</label>
                    <div class="col-sm-4">
                      <input type="text" name="liftoff20" id="liftoff20" class="form-control form-control-sm" placeholder="Lift OFF 20" required value="<?php echo $liftoff20 ?>">
                    </div>
                    <div class="col-sm-4">
                      <input type="text" name="liftoff40" id="liftoff40" class="form-control form-control-sm" placeholder="Lift OFF 40" required value="<?php echo $liftoff20 ?>">
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

                </form>
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
      
            var depocode = $("#depocode").val();
            var deponame = $("#deponame").val();
            var location = $("#location").val();
            var lifton20 = $("#lifton20").val();
            var liftoff20 = $("#liftoff20").val();
            var lifton40 = $("#lifton40").val();
            var liftoff40 = $("#liftoff40").val();
         
            if (depocode == "") {
                alert("Depo Code can't Null");
                $("#depocode").focus();
            }else if(deponame == ""){
                alert("Depo Name can't Null");
                $("#deponame").focus();
            }else if(location == ""){
                alert("location can't Null");
                $("#location").focus();
            }else if(lifton20 == ""){
                alert("lifton20 can't Null");
                $("#lifton20").focus();
            }else if(liftoff20 == ""){
                alert("liftoff20 can't Null");
                $("#liftoff20").focus();
            }else if(lifton40 == ""){
                alert("lifton40 can't Null");
                $("#lifton40").focus();
            }else if(liftoff40 == ""){
                alert("liftoff40 can't Null");
                $("#liftoff40").focus();
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




    </script>
