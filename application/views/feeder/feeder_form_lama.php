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

if (!empty($row->feedername)) {
  $feedername= $row->feedername;
}




if (!empty($row->contgroup)) {
    $contgroup= $row->contgroup;
}

if (!empty($row->level)) {
    $level= $row->level;
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
<?php 
    if($page == "add"){
    $url = 'feeder/create';
    $urledit = 'feeder/edit/'.$feedercode;
    }elseif ($page == "edit") {
      $url = 'feeder/process/'.$feedercode;
      $urlDel = 'feeder/del/'.$feedercode;
      $urledit = 'feeder/edit/'.$feedercode;
    }
 ?>
<section class="content" style="margin-top: 10px;">
  <form action="<?=site_url($url)?>" method="post" id="myForm">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <div class="row">
                  <div class="col-6">
                      <h3>
                        Feeder Entry
                        <small>&nbsp;</small>
                      </h3>
                  </div>
                  <div class="col-6">
                     <div class="float-sm-right">
                        
                        <?php 
                            if($page == "add"){
                        ?>
                            <button type="button" id="submitBtn" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>

                        <?php  
                            }elseif ($page == "edit") {
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
                
                  <div class="row">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-4 col-form-label not-bold">Feeder Vendor Code</label>
                      <div class="col-sm-5">
                        <input type="text" name="feedercode" id="feedercode" onchange="cekfeederid(id)" class="form-control form-control-sm" placeholder="Feeder Code" required value="<?php echo $feedercode ?>" <?php echo $disabled; ?>>
                        <small id="err" class="text-danger"></small>
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
               
            </div>
          </div>
        </div>
      </div>
        <!-- /.col-->


<!---1. ini tabel detilnya ---->
        <div class="row">
                    <!-- Editable table -->
                      <div class="card col-sm-12">
                      <div class="card-body">
                          <div id="table" class="table-editable">
                            <table class="table table-bordered table-responsive-sm table-sm text-center">
                            <thead >
                                <tr>
                                   <th class="arial-kiri" style="height: 23px;" colspan="8">Tariff Details</th>
                                  <th > <span class="table-add float-right  "><a href="#!" class="btn btn-primary btn-flat"><i class="fas fa-plus"> Add Details</i></a></span></th>
                                </tr>
                              </thead>
                              <thead class="bg-info"> 
                                <tr> 
                                    <th rowspan="2">Origin</th>
                                    <th rowspan="2">Destination</th>
                                    <th colspan="3" class="auto-style">Container 20'</th>
                                    <th colspan="3" class="auto-style">Container 40'</th>
                                    <th rowspan="2">Action</th>
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
                            


                               <?php if ($page == 'add')  {   
                                 $no = 0; 
                                 echo "add yaa"; ?>
                              <tbody>
                                <tr>
                                  <td class="pt-3-half">
                                    <input type="number" name="contqty[]" value="" id="contqty" class="contqty form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
                                    <select name="origin[]" id="origin" class="form-control form-control-sm">
                                      <option value="">- All --</option>
                                        <?php 
                                          foreach ($PortRow as $key => $value) {
                                            $originOps = $value->portcode;
                                        ?>
                                            <option value="<?php echo $originOps ?>" 
                                              <?php echo $origin == $originOps ? 'selected' : ''; ?>>
                                              <?php echo $originOps ?>
                                                
                                              </option>
                                        <?php
                                          }
                                        ?>
                                      </select>
                                 
                                  </td>
                                  <td class="pt-3-half">
                                    <select class="contsize form-control form-control-sm border" name="contsize[]" id="contsize" onchange="ubahBorder(this)">
                                      <option value="20">20</option>
                                      <option value="40">40</option>
                                    </select>

                                    <select name="dest[]" id="dest" class="form-control form-control-sm">
                                      <option value="">- All --</option>
                                        <?php 
                                          foreach ($PortRow as $key => $value) {
                                            $destOps = $value->portcode;
                                        ?>
                                            <option value="<?php echo $destOps ?>" 
                                              <?php echo $dest == $destOps ? 'selected' : ''; ?>>
                                              <?php echo $destOps ?>
                                                
                                              </option>
                                        <?php
                                          }
                                        ?>
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
                                      <option value="B">B</option>
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
                                      <?php } else { echo "edit yaa"; ?>

                              <tbody>
                                <?php 
                                    $no = 0;
                                    foreach ($contRowDetail as $key => $val) { //<--- ini berarti di controlernya pake result_array : 	$contRowDetail = $contQueryDetail->result_array();
                              
                                      if (!empty($val['origin'] )) {
                                        $origin= $val['origin'] ;
                                      } 
                                      if (!empty($val['dest'] )) {
                                        $dest= $val['dest'] ;
                                      } 
                                  
                              
                               ?>
                                        <tr>
                                          <td class="pt-3-half">  
                                            <input type="hidden" id="lingrid<?php echo $no ?>" name="lingrid" value="<?php echo $val['lingrid'] ?>">
                                            <input type="number" name="contqty[]" value="<?php echo $val['origin'] ?>" id="contqty<?php echo $no ?>" class="contqty form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
                                     
                                            <select name="origin[]" id="origin<?php echo $no ?>" class="form-control form-control-sm">
                                              <option value="">- All --</option>
                                                <?php 
                                                  foreach ($PortRow as $key => $value) {
                                                    $originOps = $value->portcode;
                                                ?>
                                                    <option value="<?php echo $originOps ?>" 
                                                      <?php echo $origin == $originOps ? 'selected' : ''; ?>>
                                                      <?php echo $originOps ?>
                                                        
                                                      </option>
                                                <?php
                                                  }
                                                ?>
                                              </select>
                                              
                                          </td>
                                          <td class="pt-3-half">
                                            <select class="contsize form-control form-control-sm border" name="contsize[]" id="contsize<?php echo $no ?>" onchange="ubahBorder(this)">
                                              <option value="20" <?php echo $val['dest'] == "20" ? 'selected' : '' ?>>20</option>
                                              <option value="40" <?php echo $val['dest'] == "40" ? 'selected' : '' ?>>40</option>
                                            </select>
                                           
                                            <select name="dest[]" id="dest<?php echo $no ?>" class="form-control form-control-sm">
                                              <option value="">- All --</option>
                                                <?php 
                                                  foreach ($PortRow as $key => $value) {
                                                    $destOps = $value->portcode;
                                                ?>
                                                    <option value="<?php echo $destOps ?>" 
                                                      <?php echo $dest == $destOps ? 'selected' : ''; ?>>
                                                      <?php echo $destOps ?>
                                                        
                                                      </option>
                                                <?php
                                                  }
                                                ?>
                                              </select>

                                          </td>
                                          <td class="pt-3-half">
                                            <select class="conttype form-control form-control-sm border" name="conttype[]" id="conttype<?php echo $no ?>" onchange="ubahBorder(this)">

                                            </select>
                                          </td>
                                          <td class="pt-3-half">
                                            <select class="contgrade form-control form-control-sm border" name="contgrade[]" id="contgrade<?php echo $no ?>" onchange="ubahBorder(this)">
                                              <option value="A" <?php echo $val['dest'] == "A" ? 'selected' : '' ?>>A</option>
                                              <option value="B" <?php echo $val['dest'] == "B" ? 'selected' : '' ?>>B</option>
                                              <option value="C" <?php echo $val['dest'] == "C" ? 'selected' : '' ?>>C</option>
                                              <option value="D" <?php echo $val['dest'] == "D" ? 'selected' : '' ?>>D</option>
                                            </select>
                                          </td>
                                          <td class="pt-3-half">
                                            <div class="form-check">
                                              <input type="hidden" name="contheavyReal[]" value="<?php echo $val['dest'] ?>" id="checkboxReal<?php echo $no ?>">
                                              <input name="contheavy[]" value="0" name="contheavy" type="checkbox" class="form-check-input form-control-sm " id="exampleCheck1" onchange="ubahCheck(this, <?php echo $no ?>)" <?php echo $val['dest'] == "1" ? 'checked' : '' ?>>
                                              <label class="form-check-label" for="exampleCheck1"></label>
                                            </div>
                                          </td>
                                          <td class="pt-3-half">
                                            <input type="text" name="notes[]" value="-" id="notes<?php echo $no ?>" class="notes form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
                                          </td>
                                          <td>
                                            <button type="button" class="btn btn-primary btn-rounded btn-sm my-0" onclick="updateData(<?php echo $no ?>, 'update')"><i class="fa fa-file-alt"></i></button>
                                            <button type="button" class="btn btn-danger btn-rounded btn-sm my-0" onclick="updateData(<?php echo $no ?>, 'hapus')"><i class="fa fa-trash"></i></button>
                                          </td>
                                        </tr>
                               <?php
                                    $no++;
                                    }
                                 ?>
                              </tbody>
                              <?php }  ?>

                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- Editable table -->
                  </div>



            </form>   <!-- HARUS SATU FORM -->
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
            
            var feedercode = $("#feedercode").val();
            var feedername = $("#feedername").val();


            if (feedercode == "") {
                alert("feeder ID can't Null");
                $("#feedercode").focus();
            }else if(feedername == ""){
                alert("feedername can't Null");
                $("#feedername").focus();
            }else{
                $('#modalSubmit').modal('show');
                // $("#myForm").submit();
            }

        });

        $("#updateBtn").click(function(){        
            
            var feedercode = $("#feedercode").val();
            var feedername = $("#feedername").val();
       

            if (feedercode == "") {
                alert("feeder ID can't Null");
                $("#feedercode").focus();
            }else if(feedername == ""){
                alert("feedername can't Null");
                $("#feedername").focus();
         
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









    
    function updateData(id, type){
     
        var feedercode = $('#feedercode').val();
        var requestno = $('#requestno').val();
        var lingrid = $('#lingrid'+id).val();

        var contqty = $('#contqty'+id).val();
        var origin = $('#origin'+id).val();
        var dest = $('#dest'+id).val();

        var contsize = $('#contsize'+id).val();
        var conttype = $('#conttype'+id).val();
        var contgrade = $('#contgrade'+id).val();
        var checkboxReal = $('#checkboxReal'+id).val();
        var notes = $('#notes'+id).val();
        if (type == "add") {
          alert('add detail baruu ya');
            $.post("<?=site_url('feeder/adddetail')?>",
              {
                feedercode : feedercode,
                lingrid : lingrid,

                contqty : contqty,
                origin : origin,
                dest : dest,


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
                
            $.post("<?=site_url('feeder/hapusdetail')?>",
              {
                requestno : requestno,
                lingrid : lingrid,

                contqty : contqty,
                origin : origin,
                dest : dest,

                contsize : contsize,
                conttype : conttype,
                contgrade : contgrade,
                contheavy : checkboxReal,
                notes : notes
              },
              function(data, status){
                console.log(data);
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

          alert('editt detail ya');
            $.post("<?=site_url('feeder/updatedetail')?>",
              {
                requestno : requestno,
                lingrid : lingrid,

                contqty : contqty,
                origin : origin,
                dest : dest,

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













    //====================================
    //2. jquery add table detilnya 
    //====================================

    const $tableID = $('#table');
    const $BTN = $('#export-btn');
    const $EXPORT = $('#export');

    
    var rowNum = 0;
    $('.table-add').on('click', 'i', () => {
      

      /* CHECK WAKTU KLIK ADD DETAILS */

      /* var contqty = document.getElementsByClassName("contqty");
  
      for(var i=0; i<contqty.length; i++) {
          if(contqty[i].value == ""){
            alert("contqty tidak boleh kosong ini yaaa");
            contqty[i].focus();
            return;
          }
      } */

      var origin = document.getElementsByClassName("origin");
      for(var i=0; i<origin.length; i++) {
          if(origin[i].value == ""){
            alert("Origin tidak boleh kosong");
            origin[i].focus();
            return;
          }
      }

      var dest = document.getElementsByClassName("dest");
      for(var i=0; i<dest.length; i++) {
          if(dest[i].value == ""){
            alert("Destination tidak boleh kosong");
            dest[i].focus();
            return;
          }
      }

      rowNum++;
alert(rowNum);
    const newTr = `
    <tr>
                                          <td class="pt-3-half">  
                                          <?php echo "ini coba add"; ?>
                                        
                                            <input type="hidden" id="feedercode<?php echo $no ?>" name="feedercode" value="<?php echo $feedercode ?>">
                                            <input type="number" name="contqty[]" value="" id="contqty`+rowNum+`" class="contqty form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
                                            <select name="origin[]" id="origin`+rowNum+`"  class="form-control form-control-sm">
                                              <option value="">- All --</option>
                                                <?php 
                                                  foreach ($PortRow as $key => $value) {
                                                    $originOps = $value->portcode;
                                                ?>
                                                    <option value="<?php echo $originOps ?>" 
                                                      <?php echo $origin == $originOps ? 'selected' : ''; ?>>
                                                      <?php echo $originOps ?>
                                                        
                                                      </option>
                                                <?php
                                                  }
                                                ?>
                                              </select>

                                          </td>
                                          <td class="pt-3-half">
                                            <select class="contsize form-control form-control-sm border" name="contsize[]" id="contsize`+rowNum+`" onchange="ubahBorder(this)">
                                              <option value="20">20</option>
                                              <option value="40" >40</option>
                                            </select>

                                            <select name="dest[]" id="dest`+rowNum+`"  class="form-control form-control-sm">
                                              <option value="">- All --</option>
                                                <?php 
                                                  foreach ($PortRow as $key => $value) {
                                                    $destOps = $value->portcode;
                                                ?>
                                                    <option value="<?php echo $destOps ?>" 
                                                      <?php echo $dest == $destOps ? 'selected' : ''; ?>>
                                                      <?php echo $destOps ?>
                                                        
                                                      </option>
                                                <?php
                                                  }
                                                ?>
                                              </select>

                                          </td>
                                          <td class="pt-3-half">
                                            <select class="conttype form-control form-control-sm border" name="conttype[]" id="conttype`+rowNum+`" onchange="ubahBorder(this)">

                                            </select>
                                          </td>
                                          <td class="pt-3-half">
                                            <select class="contgrade form-control form-control-sm border" name="contgrade[]" id="contgrade`+rowNum+`" onchange="ubahBorder(this)">
                                              <option value="A" >A</option>
                                              <option value="B" >>B</option>
                                              <option value="C">C</option>
                                              <option value="D" >D</option>
                                            </select>
                                          </td>
                                          <td class="pt-3-half">
                                            <div class="form-check">
                                              <input type="hidden" name="contheavyReal[]" value="`+rowNum+`" id="checkboxReal`+rowNum+`">
                                              <input name="contheavy[]" value="0" name="contheavy" type="checkbox" class="form-check-input form-control-sm " id="exampleCheck1" onchange="ubahCheck(this, `+rowNum+`)" >
                                              <label class="form-check-label" for="exampleCheck1"></label>
                                            </div>
                                          </td>
                                          <td class="pt-3-half">
                                            <input type="text" name="notes[]" value="-" id="notes`+rowNum+`" class="notes form-control form-control-sm border" style="width: 100%; box-sizing: border-box;" onchange="ubahBorder(this)">
                                          </td>
                                          <td>
                                            <button type="button" class="btn btn-primary btn-rounded btn-sm my-0" onclick="updateData(`+rowNum+`, 'add')"><i class="fa fa-file-alt"></i></button>
                                            <button type="button" class="btn btn-danger btn-rounded btn-sm my-0" onclick="updateData(`+rowNum+`, 'hapus')"><i class="fa fa-trash"></i></button>
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




     //END of 2. jquery add table detilnya 






    </script>
