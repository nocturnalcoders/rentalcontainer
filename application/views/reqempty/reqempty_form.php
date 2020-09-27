<?php

$requestno= "";
$divbran= "";
$portdest= "";
$requestdate= date("m/d/Y");
$picrequest= $this->fungsi->user_login()->name;
$boxowner="";


if (!empty($row->requestno)) {
    $requestno= $row->requestno;
}

if (!empty($row->divbran)) {
    $divbran= $row->divbran;
}

if (!empty($row->portdest)) {
  $portdest= $row->portdest;
}

if (!empty($row->requestdate)) {
    $requestdate= $row->requestdate;
}

if (!empty($row->picrequest)) {
    $picrequest= $row->picrequest;
}

if (!empty($row->boxowner)) {
  $boxowner= $row->boxowner;
}

if ($this->fungsi->user_login()->level == 2) { 

  $divbran =  $this->fungsi->user_login()->divbran;
 // $portdest =  $this->fungsi->user_login()->location;

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
    function cekrequestid() {
            var id = $("#requestno").val();
            $.post("<?=site_url('reqempty/cekrequest')?>",
              {
                requestid: id
              },
              function(data, status){
                // alert(data);
                if (data > 0) {
                    $("#err").html("requestno Already Exist");
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
                      Request Empty Container / FreeUse Entry 
                        <small>&nbsp;</small>
                      </h3>
                  </div>
                  <div class="col-6">
                     <div class="float-sm-right">

                        <?php
                            if($page == "add"){
                            $url = 'reqempty/create';
                        ?>
                            <button type="button" id="submitBtn" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>

                            <!-- <button type="button" class="table-add btn btn-info btn-flat">
                                <i class="fa fa-plus"></i> ADD
                            </button> -->

                        <?php
                            }elseif ($page == "edit") {
                            $url = 'reqempty/process/'.$requestno;
                            $urlDel = 'reqempty/del/'.$requestno;
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

                        <a href="<?=site_url('reqempty')?>" class="btn btn-warning btn-flat text-white">
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
                        <input type="text" name="requestno" id="requestno" class="form-control form-control-sm" placeholder="System Generated" required value="<?php echo $requestno ?>" onchange="cekrequestid()" disabled>
                        <small class="text-danger" id="err"></small>
                      </div>
                    </div>
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-4 col-form-label not-bold">Division/Branch</label>
                      <div class="col-sm-4">
                        <!-- <input type="text" name="divbran" id="divbran" class="form-control form-control-sm" placeholder="Division/Branch" required value="<?php echo $divbran ?>">
                         -->
                        <?php
                        if ($this->fungsi->user_login()->level == 2) {  
                          ?>
                            <input type="text" name="divbran" class="form-control form-control-sm" value="<?php echo $divbran ?>" readonly>
                          <?php
                            } else {  
                          ?>
                             <select name="divbran" id="divbran" class="form-control form-control-sm">

                          <?php 
                            foreach ($divbranRow as $key => $value) {
                              $divbranOps = $value->divbran;
                          ?>
                              <option value="<?php echo $divbranOps ?>" 
                                <?php echo $divbran == $divbranOps ? 'selected' : ''; ?>>
                                <?php echo $divbranOps ?>
                                  
                                </option>
                          <?php
                            }
                           ?>
                        </select>
                        <?php
                            } 
                          ?>
                      </div>
                    </div>

                  </div>

                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Request Date</label>
                      <div class="col-sm-5">
                        <div class="input-group date" id="requestdate" data-target-input="nearest">
                          <input class="form-control form-control-sm datetimepicker-input" data-target="#requestdate" name="requestdate" id="requestdateVal" data-toggle="datetimepicker" value="<?php echo $requestdate ?>" autocomplete="off">
                          <div class="input-group-text" data-target="#requestdate" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-4 col-form-label not-bold">Destination</label>
                      <div class="col-sm-4">
                            <select name="portdest" id="portdest" class="form-control form-control-sm">
                            <option value="">- Select -</option>
                            <?php 
                              foreach ($portdestRow as $key => $value) {
                                $portdestOps = $value->portcode;
                            ?>
                                <option value="<?php echo $portdestOps ?>" 
                                  <?php echo $portdest == $portdestOps ? 'selected' : ''; ?>>
                                  <?php echo $portdestOps ?>
                                    
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
                      <label class="col-sm-3 col-form-label not-bold">Box Owner</label>
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
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-4 col-form-label not-bold">PIC Request</label>
                      <div class="col-sm-4">
                        <input type="text" name="picrequest" id="picrequest" class="form-control form-control-sm" placeholder="PIC Request" required value="<?php echo $picrequest ?>">
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
                                   <th class="arial-kiri" style="height: 23px;" colspan="6">Container Details</th>
                                  <th > <span class="table-add float-right  "><a href="#!" class="btn btn-primary btn-flat"><i class="fas fa-plus"> Add Details</i></a></span></th>
                                </tr>
                              </thead>
                              <thead class="bg-info">
                                <tr>
                                  <th class="text-center" style="width:1%">QTY Request</th>
                                  <th class="text-center" style="width:1%">Size</th>
                                  <th class="text-center" style="width:1%">Type</th>
                                  <th class="text-center" style="width:1%">Grade</th>
                                  <th class="text-center" style="width:1%">HeavyDuty</th>
                                  <th class="text-center" style="width:1%">Notes</th>
                                  <th class="text-center" style="width:1%">Action</th>
                                </tr>
                               </thead>
                              <tbody>
                                <tr>
                                  <td class="pt-3-half">
                                    <input type="number" name="contqty[]" value="" id="contqty" class="contqty form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
                                  </td>
                                  <td class="pt-3-half">
                                    <select class="contsize form-control form-control-sm border" name="contsize[]" id="contsize" onchange="ubahBorder(this)">
                                      <option value="20">20</option>
                                      <option value="40">40</option>
                                    </select>
                                  </td>
                                  <td class="pt-3-half">
                                    <select class="conttype form-control form-control-sm border" name="conttype[]" id="conttype" onchange="ubahBorder(this)">
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
                                    <select class="contgrade form-control form-control-sm border" name="contgrade[]" id="contgrade" onchange="ubahBorder(this)">
                                      <option value="A">A</option>
                                      <option value="B" selected>B</option>
                                      <option value="C">C</option>
                                      <option value="D">D</option>
                                    </select>
                                  </td>
                                  <td class="pt-3-half">
                                    <div class="form-check">
                                      <input type="hidden" name="contheavyReal[]" value="0" id="checkboxReal0">
                                      <input name="contheavy[]" value="0" name="contheavy" type="checkbox" class="form-check-input form-control-sm " id="exampleCheck1" onchange="ubahCheck(this, 0)">
                                      <label class="form-check-label" for="exampleCheck1"></label>
                                    </div>
                                  </td>
                                  <td class="pt-3-half">
                                    <input type="text" name="notes[]" value="-" id="notes" class="notes form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
                                  </td>
                                  <td>
                                    <span class="table-remove"><button type="button"
                                        class="btn btn-danger btn-rounded btn-sm my-0"><i class="fa fa-trash"></i></button></span>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- Editable table -->
                  </div>

                  <div class="row">
                    <div class="col-8 col-md-12 form-group">
                      <label class="not-bold">Remarks</label>
                      <textarea name="remarks" class="form-control" rows="2" placeholder="Remarks ..."></textarea>
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
    $("#submitBtn").click(function(){

      var portdest = $("#portdest").val();
      if(portdest == ""){
                alert("Destination can't Null");
                $("#portdest").focus();
                return;
          }
      var contqty = document.getElementsByClassName("contqty");
      for(var i=0; i<contqty.length; i++) {
          if(contqty[i].value == ""){
            alert("Qty Container can't Null");
            contqty[i].focus();
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
            var divbran = $("#divbran").val();
            var portdest = $("#portdest").val();

            if (requestno == "") {
                alert("request ID can't Null");
                $("#requestno").focus();
            }else if(divbran == ""){
                alert("divbran can't Null");
                $("#divbran").focus();
              }else if(portdest == ""){
                alert("portdest can't Null");
                $("#portdest").focus();
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

    
    var rowNum = 0;
    $('.table-add').on('click', 'i', () => {
      var contqty = document.getElementsByClassName("contqty");
      for(var i=0; i<contqty.length; i++) {
          if(contqty[i].value == ""){
            alert("contqty tidak boleh kosong");
            contqty[i].focus();
            return;
          }
      }
      rowNum++;

    const newTr = `
    <tr>
      <td class="pt-3-half">
        <input type="number" name="contqty[]" value="" id="contqty" class="contqty form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
      </td>
      <td class="pt-3-half">
        <select class="contsize form-control form-control-sm border" name="contsize[]" id="contsize" onchange="ubahBorder(this)">
          <option value="20">20</option>
          <option value="40">40</option>
        </select>
      </td>
      <td class="pt-3-half">
        <select class="conttype form-control form-control-sm border" name="conttype[]" id="conttype" onchange="ubahBorder(this)">
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
        <select class="contgrade form-control form-control-sm border" name="contgrade[]" id="contgrade" onchange="ubahBorder(this)">
          <option value="A">A</option>
          <option value="B" selected>B</option>
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
        <input type="text" name="notes[]" value="-" id="notes" class="notes form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
      </td>
      <td>
        <span class="table-remove"><button type="button"
            class="btn btn-danger btn-rounded btn-sm my-0"><i class="fa fa-trash"></i></button></span>
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
