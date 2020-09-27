<?php 

$user_id= "";
$username= "";
$password= "";
$name= "";
$divbran= "";
$location= "";
$level= "";
$disabled = "";


if (!empty($row->user_id)) {
    $user_id= $row->user_id;
    $disabled = "readonly";
}

if (!empty($row->username)) {
    $username= $row->username;
}

if (!empty($row->password)) {
    $password= $row->password;
}

if (!empty($row->name)) {
    $name= $row->name;
}

if (!empty($row->divbran)) {
    $divbran= $row->divbran;
}

if (!empty($row->location)) {
  $location= $row->location;
}

if (!empty($row->level)) {
    $level= $row->level;
}

 ?>

<script type="text/javascript">
    function cekUserid() {
            var id = $("#user_id").val();
            $.post("<?=site_url('user/cekuser')?>",
              {
                userid: id
              },
              function(data, status){
                // alert(data);
                if (data > 0) {
                    $("#err").html("User ID telah digunakan");
                    $("#submitBtn").attr("disabled", "disabled").button('refresh');
                    $("#user_id").focus();
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
                        User Entry
                        <small>&nbsp;</small>
                      </h3>
                  </div>
                  <div class="col-6">
                     <div class="float-sm-right">
                        
                        <?php 
                            if($page == "add"){
                            $url = 'user/create';
                        ?>
                            <button type="button" id="submitBtn" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>

                        <?php  
                            }elseif ($page == "edit") {
                            $url = 'user/process/'.$user_id;
                            $urlDel = 'user/del/'.$user_id;
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
                        
                        <a href="<?=site_url('user')?>" class="btn btn-warning btn-flat text-white">
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
                      <label class="col-sm-3 col-form-label not-bold">User ID *</label>
                      <div class="col-sm-5">
                        <input type="text" name="user_id" id="user_id" onchange="cekUserid(id)" class="form-control form-control-sm" placeholder="User ID" required value="<?php echo $user_id ?>" <?php echo $disabled; ?>>
                        <small id="err" class="text-danger"></small>
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Username *</label>
                      <div class="col-sm-5">
                        <input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="Username" required value="<?php echo $username ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Password *</label>
                      <div class="col-sm-5">
                        <input type="text" name="password" id="password" class="form-control form-control-sm" placeholder="Password" required value="<?php echo $password ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Name *</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" id="name" class="form-control form-control-sm" placeholder="Name" required value="<?php echo $name ?>">
                      </div>
                      <!-- <label class="col-sm-3 col-form-label not-bold">Divbran *</label>
                      <div class="col-sm-3">
                        <input type="text" name="divbran" id="divbran" class="form-control form-control-sm" placeholder="divbran" required value="<?php echo $divbran ?>">
                      </div> -->
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Divbran *</label>
                      <div class="col-sm-9">
                        <input type="text" name="divbran" id="divbran" class="form-control form-control-sm" placeholder="divbran" required value="<?php echo $divbran ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Location *</label>
                      <div class="col-sm-9">
                        <input type="text" name="location" id="location" class="form-control form-control-sm" placeholder="Location" required value="<?php echo $location ?>">
                      </div>
                    </div>
                  </div>

                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Level *</label>
                      <div class="col-sm-5">
                        <select name="level" id="level" class="form-control form-control-sm">
                            <option value="1" <?php echo $level == '1' ? 'selected' : '' ?>>User</option>
                            <option value="2" <?php echo $level == '2' ? 'selected' : '' ?>>Superuser</option>
                            <option value="9" <?php echo $level == '9' ? 'selected' : '' ?>>Admin</option>
                        </select>
                      </div>
                    </div>
                  </div>
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
            
            var user_id = $("#user_id").val();
            var username = $("#username").val();
            var password = $("#password").val();
            var name = $("#name").val();
            var divbran = $("#divbran").val();
            var location = $("#location").val();
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
            }else if(location == ""){
                alert("Location can't Null");
                $("#location").focus();
            }else if(level == ""){
                alert("level can't Null");
                $("#level").focus();
            }else{
                $('#modalSubmit').modal('show');
                // $("#myForm").submit();
            }

        });

        $("#updateBtn").click(function(){        
            
            var user_id = $("#user_id").val();
            var username = $("#username").val();
            var password = $("#password").val();
            var name = $("#name").val();
            var divbran = $("#divbran").val();
            var location = $("#location").val();
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
            }else if(location == ""){
                alert("location can't Null");
                $("#location").focus();
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
