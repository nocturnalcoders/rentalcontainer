<?php 
$containerno= "";
$size= "";
$type ="";
$boxowner="";
$location = "";
$depo="";
$status="0";

$disabled = "";

if (!empty($row->containerno)) {
    $containerno= $row->containerno;
    $disabled = "readonly";
}

if (!empty($row->size)) {
    $size= $row->size;
}

if (!empty($row->statusactive)) {
  $status= $row->statusactive;
}

if (!empty($row->type)) {
  $type= $row->type;
}
if (!empty($row->boxowner)) {
  $boxowner= $row->boxowner;
}

if (!empty($row->location)) {
  $location= $row->location;
}
if (!empty($row->depocode)) {
  $depo= $row->depocode;
}


 ?>

<script type="text/javascript">
    function cekcontainerno() {
            var id = $("#containerno").val();
            // alert(id);
            $.post("<?=site_url('containerno/cekcontainerno')?>",
              {
                containerno: id
              },
              function(data, status){
                 // alert(data);
                if (data > 0) {
                    $("#err").html("Container No Already Exist");
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
                        Container  Entry
                        <small>&nbsp;</small>
                      </h3>
                  </div>
                  <div class="col-6">
                     <div class="float-sm-right">
                        
                        <?php 
                            if($page == "add"){
                            $url = 'containerno/create';
                        ?>
                            <button type="button" id="submitBtn" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>

                        <?php  
                            }elseif ($page == "edit") {
                            $url = 'containerno/process/'.$containerno;
                            $urlDel = 'containerno/del/'.$containerno;
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
                        
                        <a href="<?=site_url('containerno')?>" class="btn btn-warning btn-flat text-white">
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
                      <label class="col-sm-4 col-form-label not-bold">Container No</label>
                      <div class="col-sm-5">
                        <input type="text" name="containerno" id="containerno" onchange="cekcontainerno(id)" class="form-control form-control-sm" placeholder="Containerno #" required value="<?php echo $containerno ?>" <?php echo $disabled; ?>>
                        <small id="err" class="text-danger"></small>
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-4 col-form-label not-bold">Size</label>
                      <div class="col-sm-5">
                      <select class="contsize form-control form-control-sm border" name="size" id="size" >
                                      <option value="20" <?php echo $size == "20" ? 'selected' : '' ?>>20</option>
                                      <option value="40" <?php echo $size == "40" ? 'selected' : '' ?>>40</option>
                                    </select>
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-4 col-form-label not-bold">Type</label>
                      <div class="col-sm-5">




                      <select name="type" id="type" class="type form-control form-control-sm">
                          <?php 
                            foreach ($typeRow as $key => $value) {
                              $typeOps =  $value->conttype;
                          ?>
                              <option value="<?php echo $typeOps ?>" 
                                <?php echo $type == $typeOps ? 'selected' : ''; ?>>
                                <?php echo $typeOps ?>
                                  
                                </option>
                          <?php
                            }
                           ?>
                        </select>




                      </div>
                    </div>
                  </div>

                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-4 col-form-label not-bold">Box Owner</label>
                      <div class="col-sm-5">

                      <select name="boxowner" id="boxowner" class="type form-control form-control-sm">
                          <?php 
                            foreach ($BoxownerRow as $key => $value) {
                              $boxownerOps =  $value->boxowner;
                          ?>
                              <option value="<?php echo $boxownerOps ?>" 
                                <?php echo $boxowner == $boxownerOps ? 'selected' : ''; ?>>
                                <?php echo $boxownerOps ?>
                                  
                                </option>
                          <?php
                            }
                           ?>
                        </select>


                        </div>
                    </div>
                  </div>


                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-4 col-form-label not-bold">Location</label>
                      <div class="col-sm-5">


                      <select name="location" id="location" class="type form-control form-control-sm">
                          <?php 
                            foreach ($PortRow as $key => $value) {
                              $portcodeOps =  $value->portcode;
                          ?>
                              <option value="<?php echo $portcodeOps ?>" 
                                <?php echo $location == $portcodeOps ? 'selected' : ''; ?>>
                                <?php echo $portcodeOps ?>
                                  
                                </option>
                          <?php
                            }
                           ?>
                        </select>

                        </div>
                    </div>
                  </div>


                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-4 col-form-label not-bold">Depo</label>
                      <div class="col-sm-5">



                      <select name="depo" id="depo" class="type form-control form-control-sm">
                          <?php 
                            foreach ($DepoRow as $key => $value) {
                              $DepoOps =  $value->depocode;
                          ?>
                              <option value="<?php echo $DepoOps ?>" 
                                <?php echo $depo == $DepoOps ? 'selected' : ''; ?>>
                                <?php echo $DepoOps ?>
                                  
                                </option>
                          <?php
                            }
                           ?>
                        </select>


                        </div>
                    </div>
                  </div>




                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-4 col-form-label not-bold">Status Active</label>
                      <div class="col-sm-5">



                      <select class="status form-control form-control-sm border" name="status" id="status" >
                               <option value="0" <?php echo $status == "0" ? 'selected' : '' ?>>Active</option>
                               <option value="1" <?php echo $status == "1" ? 'selected' : '' ?>>Not Active</option>
                      </select>
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
            var containernoname = $("#containernoname").val();
            var password = $("#password").val();
            var name = $("#name").val();
            var divbran = $("#divbran").val();
            var level = $("#level").val();

            if (containerno == "") {
                alert("containerno ID can't Null");
                $("#containerno").focus();
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
    </script>
