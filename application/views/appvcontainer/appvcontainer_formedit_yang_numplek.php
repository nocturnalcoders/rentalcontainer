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

$requestno= "";
$divbran= "";
$requestdate= "";
$picrequest= "";
$remarks= "";
$donumber= "";
$dodate= "";
$disabled = "";
$disabled2 = "";
$reqstatus = "";


if (!empty($row->requestno)) {
    $requestno= $row->requestno;
    $disabled = "readonly";
}

if (!empty($row->divbran)) {
    $divbran= $row->divbran;
}

if (!empty($row->requestdate)) {
    $requestdate= $row->requestdate;
}

if (!empty($row->picrequest)) {
    $picrequest= $row->picrequest;
}

if (!empty($row->remarks)) {
    $remarks= $row->remarks;
}

if (!empty($row->donumber)) {
    $donumber= $row->donumber;
}

if (!empty($row->dodate)) {
    $dodate= $row->dodate;
}

if (!empty($row->reqstatus)) {
    $reqstatus= $row->reqstatus;
}

if ($row->reqstatus == 1) {
  //userlevel
  if ($this->session->userdata('level') != 9) {
    $disabled2 = "readonly";
  }
  
}


 ?>
<style type="text/css">
  .pt-3-half {
    padding-top: 1.4rem;
  }
	  .arial-kiri {
		  text-align: left;
		  font-family: Arial, Helvetica, sans-serif;
	  }
</style>

<script type="text/javascript">
    function cekfeederid() {
    var id = $("#requestno").val();
    $.post("<?=site_url('appvcontainer/cekfeeder')?>",
      {
        feederid: id
      },
      function(data, status){
        // alert(data);
        if (data > 0) {
            $("#err").html("Feeder Code Already Exist");
            $("#submitBtn").attr("disabled", "disabled").button('refresh');
            $("#requestno").focus();
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
                        Approval Container
                        <small>&nbsp;</small>
                      </h3>
                  </div>
                  <div class="col-6">
                     <div class="float-sm-right">

                        <?php
                            if($page == "add"){
                            $url = 'appvcontainer/create';
                        ?>

                            <!-- <button type="button" class="table-add btn btn-info btn-flat">
                                <i class="fa fa-plus"></i> ADD
                            </button> -->

                        <?php
                            }elseif ($page == "edit") {
                            $url = 'appvcontainer/process/'.str_replace("/","@",$requestno);
                            $urledit = 'appvcontainer/edit/'.str_replace("/","@",$requestno);
                            // echo $urledit;
                            $urlDel = 'appvcontainer/del/'.str_replace("/","@",$requestno);
                            if ($row->reqstatus != 1) {
                              echo '<button type="button" id="submitBtn" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Approval</button>';
                            }elseif ($this->session->userdata('level') == 9) {
                              echo '<button type="button" id="submitBtn" class="btn btn-success btn-flat"><i class="fa fa-paper-plane"></i> Approval</button>';
                            }

                        ?>

                            
                        <?php
                            }
                         ?>

                        <a href="<?=site_url('appvcontainer')?>" class="btn btn-warning btn-flat text-white">
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
                      <label class="col-sm-3 col-form-label not-bold">Request No</label>
                      <div class="col-sm-5">
                        <input type="text" name="requestno" id="requestno" class="form-control form-control-sm" placeholder="requestno" required value="<?php echo $requestno ?>" <?php echo $disabled ?>>
                      </div>
                    </div>
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-4 col-form-label not-bold">Division/Branch</label>
                      <div class="col-sm-4">
                        <input type="text" name="divbran" id="divbran" class="form-control form-control-sm" placeholder="divbran" required value="<?php echo $divbran ?>" <?php echo $disabled ?>>
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Request Date</label>
                      <div class="col-sm-5">
                        <input type="text" name="requestdate" id="requestdate" class="form-control form-control-sm" placeholder="requestdate" required value="<?php echo $requestdate ?>" <?php echo $disabled ?>>
                      </div>
                    </div>
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-4 col-form-label not-bold">Pic Request</label>
                      <div class="col-sm-4">
                        <input type="text" name="picrequest" id="picrequest" class="form-control form-control-sm" placeholder="picrequest" required value="<?php echo $picrequest ?>" <?php echo $disabled ?>>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <!-- Editable table -->
                      <div class="card col-sm-12">
                        <div class="card-body">
                          <div id="table" class="table-editable">
                            <table class="table table-bordered table-responsive-sm table-sm text-center">
                              <thead>
                                  <tr>
                                    <th class="arial-kiri" style="height: 23px;" colspan="7">Container Details</th>
                                  </tr>
                                </thead>
                                <thead class="bg-info">
                                <tr>
                                  <th class="text-center" style="width:1%">QTY Request</th>
                                  <th class="text-center" style="width:1%">QTY Approved</th>
                                  <th class="text-center" style="width:1%">Size</th>
                                  <th class="text-center" style="width:1%">Type</th>
                                  <th class="text-center" style="width:1%">Grade</th>
                                  <th class="text-center" style="width:1%">HeavyDuty</th>
                                  <th class="text-center" style="width:1%">Notes</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                if ($reqstatus != 1) {
                                  
                                    $no = 1;
                                    foreach ($detailRow as $key => $val) {
                               ?>
                                  <tr>
                                    <td class="pt-3-half">
                                      <input type="hidden" id="lingrid<?php echo $no ?>" name="lingrid[]" value="<?php echo $val['lingrid'] ?>">
                                      <input type="number" name="contqty[]" value="<?php echo $val['contqty'] ?>" id="contqty<?php echo $no ?>" class="contqty form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" <?php echo $disabled ?>>
                                    </td>
                                    <td class="pt-3-half">
                                      <table class="table table-bordered table-sm" id="tableNo<?php echo $no ?>">
                                        <tbody>
                                        <tr>
                                          <td>
                                            <input type="number" name="contqtyasg[]" id="contqtyasg_<?php echo $no ?>_1" class="form-control form-control-sm">
                                            <input type="hidden" id="id_ref_<?php echo $no ?>_1" value=""name="id_ref[]">
                                            <input type="hidden" id="requestnumber" value="<?php echo $requestno ?>" name="requestnumber[]">
                                            <input type="hidden" id="releasenumber_<?php echo $no ?>_1" value="" name="releasenumber[]">
                                            <input type="hidden" id="releasedate_<?php echo $no ?>_1" value="" name="releasedate[]">
                                            <input type="hidden" id="expiredate_<?php echo $no ?>_1" value="" name="expiredate[]">
                                            <input type="hidden" id="donumber_<?php echo $no ?>_1" value="" name="donumber[]">
                                            <input type="hidden" id="dodate_<?php echo $no ?>_1" value="" name="dodate[]">
                                            <input type="hidden" id="feedercode_<?php echo $no ?>_1" value="" name="feedercode[]">
                                            <input type="hidden" id="vesselcode_<?php echo $no ?>_1" value="" name="vesselcode[]"> 
                                            <!-- <input type="hidden" id="vesselid_<?php echo $no ?>_1" value="" name="vesselname[]"> -->
                                            <input type="hidden" id="voyage_<?php echo $no ?>_1" value="" name="voyage[]">
                                            <input type="hidden" id="etd_<?php echo $no ?>_1" value="" name="etd[]">
                                            <input type="hidden" id="eta_<?php echo $no ?>_1" value="" name="eta[]">
                                            <input type="hidden" id="berthdate_<?php echo $no ?>_1" value="" name="berthdate[]">
                                            <input type="hidden" id="remarks_<?php echo $no ?>_1" value="" name="remarks[]">
                                            <input type="hidden" id="divbran_<?php echo $no ?>_1" value="" name="divbran[]">
                                            <input type="hidden" id="picrequest_<?php echo $no ?>_1" value="" name="picrequest[]">
                                            <input type="hidden" id="itmtransportation_<?php echo $no ?>_1" value="" name="itmtransportation[]">
                                            <input type="hidden" id="origin_<?php echo $no ?>_1" value=""name="origin[]">
                                            <input type="hidden" id="destination_<?php echo $no ?>_1" value="" name="destination[]">
                                          </td>
                                          <td><span id="cntdonumber_<?php echo $no ?>_1">Do Number</span></td>
                                          <td><span class="text-primary" onclick="detailAsg(1, <?php echo $val['lingrid'] ?>, <?php echo $no ?>)" style="cursor: pointer;">Detail</span></td>
                                          <td><span class="text-success" onclick="addRow(1, <?php echo $val['lingrid'] ?>, <?php echo $no ?>)" style="cursor: pointer;">Add</span></td>
                                          <td></td>
                                        </tr>
                                        </tbody>
                                      </table>
                                    </td>
                                    <td class="pt-3-half">
                                      <input type="number" name="contsize[]" value="<?php echo $val['contsize'] ?>" id="contsize<?php echo $no ?>" class="contsize form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" <?php echo $disabled ?>>
                                    </td>
                                    <td class="pt-3-half">
                                      <input type="text" name="conttype[]" value="<?php echo $val['conttype'] ?>" id="conttype<?php echo $no ?>" class="conttype form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" <?php echo $disabled ?>>
                                    </td>
                                    <td class="pt-3-half">
                                      <input type="text" name="contgrade[]" value="<?php echo $val['contgrade'] ?>" id="contgrade<?php echo $no ?>" class="contgrade form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" <?php echo $disabled ?>>
                                    </td>
                                    <td class="pt-3-half">
                                      <?php if ($val['contheavy'] == "1"): ?>
                                        Yes
                                      <?php else: ?>
                                        No
                                      <?php endif ?>
                                    </td>
                                    <td class="pt-3-half">
                                      <?php echo $val['notes'] ?>
                                    </td>
                                  </tr>
                               <?php
                                    $no++;
                                    }
                                 ?>

                                 <?php 
                               }else{
                                    $no = 1;
                                    foreach ($detailRow as $key => $val) {
                               ?>
                                  <tr>
                                    <td class="pt-3-half">
                                      <input type="hidden" id="lingrid<?php echo $no ?>" name="lingrid[]" value="<?php echo $val['lingrid'] ?>">
                                      <input type="number" name="contqty[]" value="<?php echo $val['contqty'] ?>" id="contqty<?php echo $no ?>" class="contqty form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" <?php echo $disabled ?>>
                                    </td>
                                    <td class="pt-3-half">
                                      <table class="table table-bordered table-sm" id="tableNo<?php echo $no ?>">
                                        <tbody>
                                          <?php foreach ($detailRow2 as $key => $value) {
                                            ?>
                                            <tr>
                                              <td><?php echo $value['requestnumber'] ?></td>
                                              <td><?php echo $value['contqtyasg'] ?></td>
                                            </tr>
                                            <?php
                                          } ?>
                                          </tbody>
                            </table>
                                        
                               <?php
                                    $no++;
                                    }
                                  }
                                 ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- Editable table -->
                  </div>

                  <div class="row">
                    <div class="col-8 col-md-12 form-group">
                      <label class="not-bold">Remarks :  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</label>
                     <b> <i><?php echo $remarks ?></i> </b>
                      <br><br>
                      <input type="hidden" name="userid" id="whos" value="">
                    </div>
                  </div>

                    <!-- <div class="row">
                      <div class="col-9">
                        <div class="row upp">
                          <div class="col-8 col-md-6 form-group row">
                            <label class="col-sm-4 col-form-label not-bold">DO Number</label>
                            <div class="col-sm-8">
                              <input type="text" name="donumber" id="donumber" class="form-control form-control-sm" placeholder="Do Number" required value="<?php echo $donumber ?>" <?php echo $disabled2 ?>>
                            </div>
                          </div>
                        </div>
                        <div class="row upp">
                          <div class="col-8 col-md-6 form-group row">
                            <label class="col-sm-4 col-form-label not-bold">DO Date</label>
                            <div class="col-sm-8">
                              <div class="input-group date" id="dodate" data-target-input="nearest">
                                <input class="form-control form-control-sm datetimepicker-input" data-target="#dodate" name="dodate" id="dodateVal" data-toggle="datetimepicker" value="<?php echo $dodate ?>" autocomplete="off" <?php echo $disabled2 ?>>
                                <div class="input-group-text" data-target="#dodate" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div col-3>
                        <?php 
                          if ($row->reqstatus == 0) {
                            echo "<h3>Status Not Approved</>";
                          }elseif($row->reqstatus == 1){
                            echo "<h3>Status Approved</>";
                          }elseif ($row->reqstatus == 9) {
                            echo "<h3>Status Rejected</>";
                          }
                         ?>
                      </div>
                    </div> -->
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
            <h4 class="modal-title">USER AUTHORIZATION</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" align='center'>
            <p align="center">Please Insert your User and Password</p>
            <br>
            <div class="row upp">
              <div class="col-8 col-md-12 form-group row">
                <label class="col-sm-4 col-form-label not-bold">User ID</label>
                <div class="col-sm-8">
                  <input type="text" name="username" id="username" class="form-control form-control-sm" placeholder="User Name" required value="<?php echo $donumber ?>">
                </div>
              </div>
            </div>
            <div class="row upp">
            <div class="col-8 col-md-12 form-group row">
              <label class="col-sm-4 col-form-label not-bold">Password</label>
              <div class="col-sm-8">
                <input type="password" name="password" id="password" class="form-control form-control-sm" placeholder="Password" required value="<?php echo $donumber ?>">
              </div>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" onclick="formCek()">OK</button>
            </div>
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

    <div class="modal fade" id="modalAsg">
      <div class="modal-dialog" style="max-width: 90%;">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">BoxOps System</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" id="bodyAsg" style="height: 100%">
            <h3 align="center">Loading...!!!</h3>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
          </div>
        </div>
      </div>
    </div>

    <script>
    $("#submitBtn").click(function(){

      var contqtyaprv = document.getElementsByClassName("contqtyaprv");
      var donumber = $("#donumber").val();
      var dodate = $("#dodateVal").val();
      for(var i=0; i<contqtyaprv.length; i++) {
          if(contqtyaprv[i].value == ""){
            alert("Quantity Approved can't be Empty !");
            contqtyaprv[i].focus();
            return;
          }
      }

      if(donumber == ""){
        alert("DO Number can't be Empty !");
        $("#donumber").focus();
        return;
      }

      if(dodate == ""){
        alert("DO Date can't be Empty !");
        $("#dodateVal").focus();
        return;
      }

      $('#modalSubmit').modal('show');

    });
    $(document).ready(function(){
        

        $("#updateBtn").click(function(){

            var requestno = $("#requestno").val();
            var feedername = $("#feedername").val();
            var password = $("#password").val();
            var name = $("#name").val();
            var divbran = $("#divbran").val();
            var level = $("#level").val();

            if (requestno == "") {
                alert("feeder ID can't Null");
                $("#requestno").focus();
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

    function addRow(urutan, id_ref, notable) {
      var urutan = urutan + 1;
      var table = '<tr id="trid_'+urutan+'_'+notable+'"><td><input type="number" name="contqtyasg[]" id="contqtyasg_'+notable+'_'+urutan+'" class="form-control form-control-sm"><input type="hidden" id="requestnumber" value="<?php echo $requestno ?>" name="requestnumber[]"><input type="hidden" id="id_ref_'+notable+'_'+urutan+'" value=""name="id_ref[]"><input type="hidden" id="releasenumber_'+notable+'_'+urutan+'" value="" name="releasenumber[]"><input type="hidden" id="releasedate_'+notable+'_'+urutan+'" value="" name="releasedate[]"><input type="hidden" id="expiredate_'+notable+'_'+urutan+'" value="" name="expiredate[]"><input type="hidden" id="donumber_'+notable+'_'+urutan+'" value="" name="donumber[]"><input type="hidden" id="dodate_'+notable+'_'+urutan+'" value="" name="dodate[]"><input type="hidden" id="feedercode_'+notable+'_'+urutan+'" value="" name="feedercode[]"><input type="hidden" id="vesselcode_'+notable+'_'+urutan+'" value="" name="vesselcode[]"><!-- <input type="hidden" id="vesselid_'+notable+'_'+urutan+'" value="" name="vesselname[]"> --><input type="hidden" id="voyage_'+notable+'_'+urutan+'" value="" name="voyage[]"><input type="hidden" id="etd_'+notable+'_'+urutan+'" value="" name="etd[]"><input type="hidden" id="eta_'+notable+'_'+urutan+'" value="" name="eta[]"><input type="hidden" id="berthdate_'+notable+'_'+urutan+'" value="" name="berthdate[]"><input type="hidden" id="remarks_'+notable+'_'+urutan+'" value="" name="remarks[]"><input type="hidden" id="divbran_'+notable+'_'+urutan+'" value="" name="divbran[]"><input type="hidden" id="picrequest_'+notable+'_'+urutan+'" value="" name="picrequest[]"><input type="hidden" id="itmtransportation_'+notable+'_'+urutan+'" value="" name="itmtransportation[]"><input type="hidden" id="origin_'+notable+'_'+urutan+'" value=""name="origin[]"><input type="hidden" id="destination_'+notable+'_'+urutan+'" value="" name="destination[]"></td><td><span id="cntdonumber_'+notable+'_'+urutan+'">Do Number</span></td><td><span class="text-primary" onclick="detailAsg('+urutan+', '+id_ref+', '+notable+')" style="cursor: pointer;">Detail</span></td><td><span class="text-success" onclick="addRow('+urutan+', '+id_ref+', '+notable+')" style="cursor: pointer;">Add</span></td><td><span class="text-danger" onclick="delRow('+urutan+', '+id_ref+', '+notable+')" style="cursor: pointer;">Del</span></td></tr>';
      $('#tableNo'+notable+' tbody:last-child').append(table);
    }

    function delRow(urutan, id_ref, notable) {
      var urutan = urutan + 1;
      $('#trid_'+notable+'_'+notable+'').remove();
    }

    function formCek() {
      var username = $("#username").val();
      var password = $("#password").val();

      $.post("<?=site_url('appvcontainer/ceklogin')?>",
        {
          username : username,
          password : password,
        },
        function(data, status){
          var res = data.split("++");
          if (res[0] == 'ada') {
              $('.modal-body').html(res[1]);
              $('#whos').val(res[2]);
          }else{
              toastr.warning(res[1]);
              console.log(data);
          }
        });
    }

    function ubahBorder(obj){
      // $(this).addClass("border");
      $(obj).addClass("border-danger");
      // alert('haha');
    }

    function ubahCheck(obj, idnum){
      // $(this).addClass("border");
      if ($(obj).is( ':checked' )) {
        $("#checkboxReal"+idnum).val(1);
      }

      if (!$(obj).is( ':checked' )) {
        $("#checkboxReal"+idnum).val(0);
      }
      // alert('haha');
    }

    function updateData(id, type){
        var requestno = $('#requestno').val();
        var lingrid = $('#lingrid'+id).val();
        var contqty = $('#contqty'+id).val();
        var contsize = $('#contsize'+id).val();
        var conttype = $('#conttype'+id).val();
        var contgrade = $('#contgrade'+id).val();
        var checkboxReal = $('#checkboxReal'+id).val();
        var notes = $('#notes'+id).val();
        if (type == "add") {
            $.post("<?=site_url('appvcontainer/adddetail')?>",
              {
                requestno : requestno,
                lingrid : lingrid,
                contqty : contqty,
                contsize : contsize,
                conttype : conttype,
                contgrade : contgrade,
                contheavy : checkboxReal,
                notes : notes
              },
              function(data, status){
                var res = data.split("++");
                if (res[0] == 'sukses') {
                    toastr.success(res[1]);
                    window.location.href = '<?=site_url($urledit)?>';
                }else{
                    toastr.warning('error');
                    console.log(data);
                }
              });

        }else if(type == "hapus"){
          var r = confirm("Do you want to delete this data?");
          if (r == true) {
                
            $.post("<?=site_url('appvcontainer/hapusdetail')?>",
              {
                requestno : requestno,
                lingrid : lingrid,
                contqty : contqty,
                contsize : contsize,
                conttype : conttype,
                contgrade : contgrade,
                contheavy : checkboxReal,
                notes : notes
              },
              function(data, status){
                var res = data.split("++");
                if (res[0] == 'sukses') {
                    toastr.error(res[1]);
                    $(this).parents('tr').detach();
                    window.location.href = '<?=site_url($urledit)?>';
                }else{
                    toastr.warning('error');
                    console.log(data);
                }
              });

          } else {
            
          }
        }else{
            $.post("<?=site_url('appvcontainer/updatedetail')?>",
              {
                requestno : requestno,
                lingrid : lingrid,
                contqty : contqty,
                contsize : contsize,
                conttype : conttype,
                contgrade : contgrade,
                contheavy : checkboxReal,
                notes : notes
              },
              function(data, status){
                var res = data.split("++");
                if (res[0] == 'sukses') {
                    toastr.success(res[1]);
                }else if(res[0] == 'non'){
                    toastr.info(res[1]);
                }else{
                    toastr.warning('error');
                    console.log(data);
                }
              });
        }
    }

    $('#requestdate').datetimepicker({
        format: 'L',
        <?php
          if ($requestdate != "") {
        ?>
        date:'<?php echo date("m/d/Y", strtotime($requestdate)); ?>',
        <?php
          }
        ?>
    });

    $('#dodate').datetimepicker({
        format: 'L',
        <?php
          if ($dodate != "") {
        ?>
        date:'<?php echo date("m/d/Y", strtotime($dodate)); ?>',
        <?php
          }
        ?>
    });

    
    function detailAsg(no, id_ref, notable) {
      var releasenumber = $("#releasenumber_"+notable+"_"+no).val();
      $('#modalAsg').modal('show');
      $.post("<?=site_url('appvcontainer/cekasg')?>",
        {
          urutan : no,
          id_ref : id_ref,
          notable : notable,
          releasenumber : releasenumber
        },
        function(data, status){
          // alert(data);
          console.log(data);
          $("#bodyAsg").html(data);
        })
    }
    </script>
