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
$portdest= "";
$remarks= "";
$donumber= "";
$dodate= "";
$disabled = "";
$disabled2 = "";


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
if (!empty($row->portdest)) {
  $portdest= $row->portdest;
}

if (!empty($row->dodate)) {
    $dodate= $row->dodate;
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
                      <label class="col-sm-4 col-form-label not-bold">Destination</label>
                      <div class="col-sm-4">
                        <input type="text" name="portdest" id="portdest" class="form-control form-control-sm" placeholder="portdest" required value="<?php echo $portdest ?>" <?php echo $disabled ?>>
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
                                    <th class="arial-kiri" style="height: 23px;" colspan="6">Container Details</th>
                                  </tr>
                                </thead>
                                <thead class="bg-info">
                                <tr>
                                  <th class="text-center" style="width:1%">QTY Request</th>
                                  <th class="text-center" style="width:1%">QTY Approved</th>
                                  <th class="text-center" style="width:1%">Size</th>
                                  <th class="text-center" style="width:1%">Type</th>
                                  <th class="text-center" style="width:1%">Grade</th>
                                 <!--  <th class="text-center" style="width:1%">HeavyDuty</th>
                                  <th class="text-center" style="width:1%">Notes</th> -->
                                </tr>
                              </thead>
                              <tbody>
                                <?php 
                                    $no = 0;
                                    foreach ($detailRow as $key => $val) {
                               ?>
                                        <tr>
                                          <td class="pt-3-half">
                                            <input type="hidden" id="lingrid<?php echo $no ?>" name="lingrid[]" value="<?php echo $val['lingrid'] ?>">
                                            <input type="number" name="contqty[]" value="<?php echo $val['contqty'] ?>" id="contqty<?php echo $no ?>" class="contqty form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" <?php echo $disabled ?>>
                                          </td>
                                          <td class="pt-3-half">
                                            <input type="number" name="contqtyaprv[]" value="<?php echo $val['contqtyaprv'] ?>" id="contqtyaprv<?php echo $no ?>" class="contqtyaprv form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)" <?php echo $disabled2 ?>>
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
                                     <!--      <td class="pt-3-half">
                                            <?php if ($val['contheavy'] == "1"): ?>
                                              Yes
                                            <?php else: ?>
                                              No
                                            <?php endif ?>
                                          </td>
                                          <td class="pt-3-half">
                                            <?php echo $val['notes'] ?>
                                          </td> -->
                                        </tr>
                               <?php
                                    $no++;
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

                    <div class="row">
                      <div class="col-9">
                        <div class="row upp">
                          <div class="col-8 col-md-6 form-group row">
                            <label class="col-sm-4 col-form-label not-bold">DO Number</label>
                            <div class="col-sm-8">
                              <input type="text" name="donumber" id="donumber" class="form-control form-control-sm" placeholder="Do Number" required value="<?php echo $donumber ?>" <?php echo $disabled2 ?>>
                            </div>
                          </div>
                          <div class="col-4 col-md-6 form-group row">
                        
                     
                          <div class="float-sm-right">
                          <?php if ($donumber <> "") { ?>
                              <a href="<?=site_url('assignfeeder/asgnfeeder/')?><?php echo str_replace("/","@",$donumber) ?>" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Assign Feeder
                               </a>
                           <?php } ?>

                           <!--  <a href="<?=site_url('appvcontainer/edit/')?><?php echo str_replace("/","@",$requestno) ?>"><?php echo $requestno?></a>-->
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
                            echo "<h3>Status :  Pending</>";
                          }elseif($row->reqstatus == 1){
                            echo "<h3>Status Approved</>";
                          }elseif ($row->reqstatus == 9) {
                            echo "<h3>Status Rejected</>";
                          }
                         ?>
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
    $("#submitBtn").click(function(){

      var contqtyaprv = document.getElementsByClassName("contqtyaprv");
      var contqty = document.getElementsByClassName("contqty");
      
      var donumber = $("#donumber").val();
      var dodate = $("#dodateVal").val();
      for(var i=0; i<contqtyaprv.length; i++) {
        var contqtyaprv1 = 0;
        var contqty1 = 0;
        
          if(contqtyaprv[i].value == ""){
            alert("Quantity Approved can't be Empty !");
            contqtyaprv[i].focus();
            return;
          }
          var contqtyaprv1 =0;
          var contqty1 = 0
          contqtyaprv1 = contqtyaprv[i].value;
          contqty1 = contqty[i].value;

          if(Number(contqtyaprv1) > Number(contqty1)){
           // alert(contqtyaprv1);
          //  alert(contqty1);
            alert("Qty Approved Cannot be greater than QTY Reqeust !");
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

    const $tableID = $('#table');
    const $BTN = $('#export-btn');
    const $EXPORT = $('#export');

    
    var rowNum = <?php echo $no-1 ?>;
    $('.table-add').on('click', 'i', () => {
      rowNum++;

    const newTr = `
    <tr>
      <td class="pt-3-half">
        <input type="number" name="contqty[]" value="" id="contqty`+rowNum+`" class="contqty form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
      </td>
      <td class="pt-3-half">
        <select class="contsize form-control form-control-sm border" name="contsize[]" id="contsize`+rowNum+`" onchange="ubahBorder(this)">
          <option value="20">20</option>
          <option value="40">40</option>
        </select>
      </td>
      <td class="pt-3-half">
        <select class="conttype form-control form-control-sm border" name="conttype[]" id="conttype`+rowNum+`" onchange="ubahBorder(this)">
          <?php 
            foreach ($typeRow as $key => $value) {
              ?>
                <option value="<?php echo $value['conttype'] ?>"><?php echo $value['conttype'] ?></option>
              <?php
            }
           ?>
        </select>
      </td>
      <td class="pt-3-half">
        <select class="contgrade form-control form-control-sm border" name="contgrade[]" id="contgrade`+rowNum+`" onchange="ubahBorder(this)">
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
        </select>
      </td>
      <td class="pt-3-half">
        <div class="form-check">
          <input type="hidden" name="contheavyReal[]" value="0" id="checkboxReal`+rowNum+`">
          <input name="contheavy[]" value="0" name="contheavy" type="checkbox" class="form-check-input form-control-sm " id="exampleCheck1" onchange="ubahCheck(this, `+rowNum+`)">
          <label class="form-check-label" for="exampleCheck1"></label>
        </div>
      </td>
      <td class="pt-3-half">
        <input type="text" name="notes[]" value="-" id="notes`+rowNum+`" class="notes form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
      </td>
      <td>
      <button type="button" class="btn btn-primary btn-rounded btn-sm my-0" onclick="updateData(`+rowNum+`, 'add')"><i class="fa fa-upload"></i></button>
      </td>
    </tr>`;

     const $clone = $tableID.find('tbody tr').last().clone(true).removeClass('hide table-line');

     // if ($tableID.find('tbody tr').length === 0) {
     //
     //   $('tbody').append(newTr);
     // }
     $tableID.find('table').append(newTr);
    });

    $tableID.on('click', '.table-remove', function () {

     $(this).parents('tr').detach();
    });

    $tableID.on('click', '.table-up', function () {

     const $row = $(this).parents('tr');

     if ($row.index() === 0) {
       return;
     }

     $row.prev().before($row.get(0));
    });

    $tableID.on('click', '.table-down', function () {

     const $row = $(this).parents('tr');
     $row.next().after($row.get(0));
    });

    // A few jQuery helpers for exporting only
    jQuery.fn.pop = [].pop;
    jQuery.fn.shift = [].shift;

    $BTN.on('click', () => {

     const $rows = $tableID.find('tr:not(:hidden)');
     const headers = [];
     const data = [];

     // Get the headers (add special header logic here)
     $($rows.shift()).find('th:not(:empty)').each(function () {

       headers.push($(this).text().toLowerCase());
     });

     // Turn all existing rows into a loopable array
     $rows.each(function () {
       const $td = $(this).find('td');
       const h = {};

       // Use the headers from earlier to name our hash keys
       headers.forEach((header, i) => {

         h[header] = $td.eq(i).text();
       });

       data.push(h);
     });

     // Output the result
     $EXPORT.text(JSON.stringify(data));
    });
    </script>
