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

$feedercode= "";
$feedername= "";
$contgroup= "";

$origin= "";
$dest= "";

$disabled = "";

if (!empty($row->feedercode)) {
  $feedercode= $row->feedercode;
  $disabled = "readonly";
}

if (!empty($row->feedername)) {
  $feedername= $row->feedername;
}


if (!empty($row->contgroup)) {
  $contgroup= $row->contgroup;
}



$requestno= "";
$divbran= "";
$requestdate= "";
$picrequest= "";
$remarks= "";



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
            $.post("<?=site_url('feeder/cekfeeder')?>",
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
                          Feeder Operator Entry
                        <small>&nbsp;</small>
                      </h3>
                  </div>
                  <div class="col-6">
                     <div class="float-sm-right">

                        <?php
                            if($page == "add"){
                            $url = 'feeder/create';
                        ?>
                            <button type="button" id="submitBtn" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>

                            <!-- <button type="button" class="table-add btn btn-info btn-flat">
                                <i class="fa fa-plus"></i> ADD
                            </button> -->

                        <?php
                            }elseif ($page == "edit") {
                            $url = 'feeder/process/'.str_replace("/","@",$feedercode);
                            $urledit = 'feeder/edit/'.str_replace("/","@",$feedercode);
                            // echo $urledit;
                            $urlDel = 'feeder/del/'.str_replace("/","@",$feedercode);
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

                        <a href="<?=site_url('feeder')?>" class="btn btn-warning btn-flat text-white">
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
                      <label class="col-sm-4 col-form-label not-bold">Feeder Vendor Code</label>
                      <div class="col-sm-5">
                        <input type="text" name="feedercode" id="feedercode" class="form-control form-control-sm" placeholder="Feeder Code" required value="<?php echo $feedercode ?>" <?php echo $disabled ?>>
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-4 col-form-label not-bold">Feeder Vendor Name</label>
                      <div class="col-sm-5">
                        <input type="text" name="feedername" id="feedername" class="form-control form-control-sm" placeholder="Feeder Name" required value="<?php echo $feedername ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-4 col-form-label not-bold">Group Rate</label>
                      <div class="col-sm-5">
                        <select name="contgroup" id="contgroup" class="form-control form-control-sm">
                          <?php 
                            foreach ($contRow as $key => $value) {
                              $contgroupOps = $value->contgroup;
                          ?>
                              <option value="<?php echo $contgroupOps ?>" 
                                <?php echo $contgroup == $contgroupOps ? 'selected' : ''; ?>>
                                <?php echo $contgroupOps ?>
                                  
                                </option>
                          <?php
                            }
                           ?>
                        </select>
                      </div>
                    </div>
                  </div>










                  <div class="row">
                    <!-- Editable table -->
                      <div class="card col-sm-12">
                        <div class="card-body">
                          <div id="table" class="table-editable">
                            <table class="table table-bordered table-responsive-sm table-sm text-center">
                              <thead >
                                  <tr>
                                    <th class="arial-kiri" style="height: 23px;" colspan="7">Tariff Details</th>
                                    <th  colspan="3"> <span class="table-add float-right  "><a href="#!" class="btn btn-primary btn-flat"><i class="fas fa-plus"> Add Details</i></a></span></th>
                                  </tr>
                                </thead>


                                <thead class="bg-info"> 
                                  <tr> 
                                      <th rowspan="2">Origin &nbsp;</th>
                                      <th rowspan="2">Destination</th>
                                      <th colspan="3" class="auto-style">Container 20'</th>
                                      <th colspan="3" class="auto-style">Container 40'</th>
                                      <th rowspan="2" colspan="2">Action</th>
                                  </tr>
                                  <tr> 
                                      <th class="auto-style">Empty Repo</th>
                                      <th class="auto-style">Free Use </th>
                                      <th class="auto-style">Domestic Laden </th>
                                      <th class="auto-style">Empty Repo</th>
                                      <th class="auto-style">Free Use </th>
                                      <th class="auto-style">Domestic Laden </th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php 
                                    $no = 0;
                                    foreach ($detailRow as $key => $val) {
                                      //echo $val['origin'];
                               ?>
                                        <tr>
                                          <td>
                                            <input type="hidden" id="lingrid<?php echo $no ?>" name="lingrid" value="<?php echo $val['lingrid'] ?>">

                                            <select class="origin form-control form-control-sm border" name="origin[]" id="origin<?php echo $no ?>" onchange="ubahBorder(this)">
                                                <?php 
                                                  foreach ($PortRow as $key => $value) {
                                                    $originOps = $value->portcode;
                                                ?>
                                                    <option value="<?php echo $originOps ?>" 
                                                      <?php echo $val['origin'] == $originOps ? 'selected' : ''; ?>>
                                                      <?php echo $originOps ?>
                                                        
                                                      </option>
                                                <?php
                                                  }
                                                ?>
                                              </select>
                                          
                                          </td>
                                          <td>
                                            <select class="dest form-control form-control-sm border" name="dest[]" id="dest<?php echo $no ?>" onchange="ubahBorder(this)">
                                                <?php 
                                                  foreach ($PortRow as $key => $value) {
                                                    $destOps = $value->portcode;
                                                ?>
                                                    <option value="<?php echo $destOps ?>" 
                                                      <?php echo $val['dest'] == $destOps ? 'selected' : ''; ?>>
                                                      <?php echo $destOps ?>
                                                        
                                                      </option>
                                                <?php
                                                  }
                                                ?>
                                              </select>
                                          
                                          </td>
                                          <td>
                                            <input type="number" name="emptyrepo20[]" value="<?php echo $val['emptyrepo20'] ?>" id="emptyrepo20<?php echo $no ?>" class="emptyrepo20 form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
                                          </td>

                                          <td>
                                            <input type="number" name="freeuse20[]" value="<?php echo $val['freeuse20'] ?>" id="freeuse20<?php echo $no ?>" class="freeuse20 form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
                                          </td>

                                          <td>
                                            <input type="number" name="domesticladen20[]" value="<?php echo $val['domesticladen20'] ?>" id="domesticladen20<?php echo $no ?>" class="domesticladen20 form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
                                          </td>


                                          <td>
                                            <input type="number" name="emptyrepo40[]" value="<?php echo $val['emptyrepo40'] ?>" id="emptyrepo40<?php echo $no ?>" class="emptyrepo40 form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
                                          </td>

                                          <td>
                                            <input type="number" name="freeuse40[]" value="<?php echo $val['freeuse40'] ?>" id="freeuse40<?php echo $no ?>" class="freeuse40 form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
                                          </td>

                                          <td>
                                            <input type="number" name="domesticladen40[]" value="<?php echo $val['domesticladen40'] ?>" id="domesticladen40<?php echo $no ?>" class="domesticladen40 form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
                                          </td>

                                          <td>
                                            <button type="button" class="btn btn-primary btn-rounded btn-sm my-0" onclick="updateData(<?php echo $no ?>, 'update')"><i class="fa fa-file-alt"></i></button>         
                                          </td>
                                          <td>
                                            <button type="button" class="btn btn-danger btn-rounded btn-sm my-0" onclick="updateData(<?php echo $no ?>, 'hapus')"><i class="fa fa-trash"></i></button>
                                          </td>
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
    $("#submitBtn").click(function(){

      var contqty = document.getElementsByClassName("contqty");
      for(var i=0; i<contqty.length; i++) {
          if(contqty[i].value == ""){
            alert("contqty tidak boleh kosong");
            contqty[i].focus();
            return;
          }
      }

      var origin = document.getElementsByClassName("origin");
      for(var i=0; i<origin.length; i++) {
          if(origin[i].value == ""){
            alert("origin tidak boleh kosong");
            origin[i].focus();
            return;
          }
      }

      var contsize = document.getElementsByClassName("contsize");
      for(var i=0; i<contsize.length; i++) {
          if(contsize[i].value == ""){
            alert("contsize tidak boleh kosong");
            contsize[i].focus();
            return;
          }
      }

      var conttype = document.getElementsByClassName("conttype");
      for(var i=0; i<conttype.length; i++) {
          if(conttype[i].value == ""){
            alert("conttype tidak boleh kosong");
            conttype[i].focus();
            return;
          }
      }

      var contgrade = document.getElementsByClassName("contgrade");
      for(var i=0; i<contgrade.length; i++) {
          if(contgrade[i].value == ""){
            alert("contgrade tidak boleh kosong");
            contgrade[i].focus();
            return;
          }
      }

      var notes = document.getElementsByClassName("notes");
      for(var i=0; i<notes.length; i++) {
          if(notes[i].value == ""){
            notes[i].value = "-";
          }
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
        var feedercode = $('#feedercode').val();
        var lingrid = $('#lingrid'+id).val();


        var origin = $('#origin'+id).val();
        var dest = $('#dest'+id).val();
        var emptyrepo20 = $('#emptyrepo20'+id).val();
        var freeuse20 = $('#freeuse20'+id).val();
        var domesticladen20 = $('#domesticladen20'+id).val();

        var emptyrepo40 = $('#emptyrepo40'+id).val();
        var freeuse40 = $('#freeuse40'+id).val();
        var domesticladen40 = $('#domesticladen40'+id).val();

        var contsize = $('#contsize'+id).val();
        var conttype = $('#conttype'+id).val();
        var contgrade = $('#contgrade'+id).val();
        var checkboxReal = $('#checkboxReal'+id).val();
        var notes = $('#notes'+id).val();
        if (type == "add") {

         //  alert('ini add detail ya..');
            $.post("<?=site_url('feeder/adddetail')?>",
              {
                feedercode : feedercode,
                lingrid : lingrid,
                origin : origin,
                dest : dest,
                emptyrepo20 : emptyrepo20,
                freeuse20 : freeuse20,
                domesticladen20 : domesticladen20,

                emptyrepo40 : emptyrepo40,
                freeuse40 : freeuse40,
                domesticladen40 : domesticladen40,

                
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
         // alert('ini delete detail..');
          var r = confirm("Do you want to delete this data?");
          if (r == true) {
                
            $.post("<?=site_url('feeder/hapusdetail')?>",
              {

                lingrid : lingrid,
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
            // alert('ini edit detail..');
            $.post("<?=site_url('feeder/updatedetail')?>",
              {
                feedercode : feedercode,
                lingrid : lingrid,
                origin : origin,
                dest : dest,
                emptyrepo20 : emptyrepo20,
                freeuse20 : freeuse20,
                domesticladen20 : domesticladen20,

                emptyrepo40 : emptyrepo40,
                freeuse40 : freeuse40,
                domesticladen40 : domesticladen40,

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

    const $tableID = $('#table');
    const $BTN = $('#export-btn');
    const $EXPORT = $('#export');

    
    var rowNum = <?php echo $no-1 ?>;
    $('.table-add').on('click', 'i', () => {
      rowNum++;

    const newTr = `
    <tr>
      <td class="pt-3-half">
        <input type="hidden" name="tarrifnumber" value="`+rowNum+`"   class="tarrifnumber form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
        <select class="origin form-control form-control-sm border" name="origin[]" id="origin`+rowNum+`" onchange="ubahBorder(this)">
          <?php 
            foreach ($PortRow as $key => $value) {
              $originOps = $value->portcode;
              ?>
                <option value="<?php echo $originOps ?>"><?php echo $originOps?></option>
              <?php
            }
           ?>
        </select>
      </td>
      <td class="pt-3-half">
        <select class="dest form-control form-control-sm border" name="dest[]" id="dest`+rowNum+`" onchange="ubahBorder(this)">
            <?php 
              foreach ($PortRow as $key => $value) {
                $destOps = $value->portcode;
                ?>
                  <option value="<?php echo $destOps ?>"><?php echo $destOps?></option>
                <?php
              }
            ?>
          </select>
      </td>

      

      <td class="pt-3-half">
        <input type="text" name="emptyrepo20[]" value="" id="emptyrepo20`+rowNum+`" class="emptyrepo20 form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
      </td>
      <td class="pt-3-half">
        <input type="text" name="freeuse20[]" value="" id="freeuse20`+rowNum+`" class="freeuse20 form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
      </td>
      <td class="pt-3-half">
        <input type="text" name="domesticladen20[]" value="" id="domesticladen20`+rowNum+`" class="domesticladen20 form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
      </td>



      <td class="pt-3-half">
        <input type="text" name="emptyrepo40[]" value="" id="emptyrepo40`+rowNum+`" class="emptyrepo40 form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
      </td>
      <td class="pt-3-half">
        <input type="text" name="freeuse40[]" value="" id="freeuse40`+rowNum+`" class="freeuse40 form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
      </td>
      <td class="pt-3-half">
        <input type="text" name="domesticladen40[]" value="" id="domesticladen40`+rowNum+`" class="domesticladen40 form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
      </td>

      <td> 
      <button type="button" class="btn btn-primary btn-rounded btn-sm my-0" onclick="updateData(`+rowNum+`, 'add')"><i class="fa fa-file-alt"></i></button>
      </td> 
      <td> 
        <span class="table-remove"><button type="button"class="btn btn-danger btn-rounded btn-sm my-0"><i class="fa fa-trash"></i></button></span>
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
