<?php

$tujuanfiledownload = "";
$fileupload = "";

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
<section class="content" style="margin-top: 10px;">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-outline card-info">
        <div class="card-header">
          <div class="row">
              <div class="col-6">
                  <h3>
                  <?php
                   if ($page != "") {
                      $TitleContainerMovement = "Upload File - Container Movement Status";
                      if($page == "depoin"){
                        $TitleContainerMovement = "Upload File - Depo In";
                        } elseif ($page == "depoout"){
                          $TitleContainerMovement = "Upload File - Depo Out";
                        }elseif ($page == "sailing"){
                          $TitleContainerMovement = "Upload File - Sailing";
                        }elseif ($page == "arrival"){
                          $TitleContainerMovement = "Upload File - Arrival";
                        }elseif ($page == "export"){
                          $TitleContainerMovement = "Upload File - Export";
                        }
                      }
                      else {
                        $TitleContainerMovement = "Upload File - Container Movement Status";
                      }

                      echo $TitleContainerMovement;
                  ?>

                      
                    <small>&nbsp;</small>
                  </h3>
              </div>
              <div class="col-6">
                 <div class="float-sm-right">
                    <?php $url = 'depoin/preview/'; ?>
                    <?php if (isset($_POST['preview'])): ?>
                    <?php if ($result == "sukses"): ?>
                      <?php
                        $datasama = "";
                     /*    foreach ($containerno as $key => $value) {
                          if ($value > 1 ) {
                            $datasama = $key."<br>";
                          }
                        }
                        foreach ($movestatus as $key => $value) {
                          if ($value > 1 ) {
                            $datasama = $key."<br>";
                          }
                        }
                        foreach ($movedate as $key => $value) {
                          if ($value > 1 ) {
                            $datasama = $key."<br>";
                          }
                        } */
                       ?>
                      <?php 
                        // if ($datasama == "" AND (count($containernoDB) < 1 || count($movestatusDB) < 1 || count($movedateDB) < 1)): 
                        if ($datasama == ""):
                      ?>
                       
                       <?php 
        if ($resulttombol == "sukses") { 
         // echo $resulttombol ;
          ?>
                        <button type="button" id="submitBtn" class="btn btn-success btn-flat">
                          <i class="fa fa-paper-plane"></i> Save
                        </button>


        <?php } endif ?>
                    <?php endif ?>
                    <?php endif ?>
                    <?php
                    if ($page != '') {
                     // $tujuankembali = site_url('depoin');
                      $tujuankembali = site_url('depoin/depoout');
                      if($page == "depoin"){
                        $tujuankembali = site_url('depoin/depoin');
                        } elseif ($page == "depoout"){
                          $tujuankembali = site_url('depoin/depoout');
                        }elseif ($page == "sailing"){
                          $tujuankembali = site_url('depoin/sailing');
                        }elseif ($page == "arrival"){
                          $tujuankembali = site_url('depoin/arrival');
                        }elseif ($page == "export"){
                          $tujuankembali = site_url('depoin/export');
                        }
                      }
                      else {
                        //$tujuankembali = site_url('depoin');
                        $tujuankembali = site_url('depoin/depoout');
                      }
                    
                    ?>
                    
                      <a href="<?php echo $tujuankembali;?>" class="btn btn-warning btn-flat text-white">
                       <i class="fa fa-undo"></i> Back
                    </a>
                </div> 
              </div>
          </div>
            
          <!-- /. tools -->
        </div>
        <!-- /.card-header -->
        
        <div class="card-body pad">
          <form method="post" action="<?php echo base_url("depoin/preview/"); ?><?php echo $page ?>" enctype="multipart/form-data">
            <div class="col-8 col-md-6 form-group row">
              <label for="file">File:</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Excel</span>
                </div>
                <div class="custom-file">
                  <input type="file" name="file" class="custom-file-input" id="inputGroupFile01"
                    aria-describedby="inputGroupFileAddon01" required>
                  <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                </div>
              </div>
            </div>
            <button type="submit" name="preview" class="btn btn-success">Preview</button>
           <?php
            if ($page != '') {
                      $tujuanfiledownload = base_url("excel/sample/sample_upload_container.xlsx");
                      
                      if($page == "depoin"){
                        $tujuanfiledownload = base_url("excel/sample/Sample_Depo_in.xlsx");
                         $fileupload = "Depo - IN";
                        } elseif ($page == "depoout"){
                          $tujuanfiledownload = base_url("excel/sample/Sample_Depo_out.xlsx");
                          $fileupload = "Depo - OUT";
                        }elseif ($page == "sailing"){
                          $tujuanfiledownload = base_url("excel/sample/Sample_Depo_sailing.xlsx");
                          $fileupload = "Sailing";
                        }elseif ($page == "arrival"){
                          $tujuanfiledownload = base_url("excel/sample/Sample_Depo_arrival.xlsx");
                          $fileupload = "Arrival";
                        }elseif ($page == "export"){
                          $tujuanfiledownload = base_url("excel/sample/Sample_Depo_export.xlsx");
                          $fileupload = "Export";
                        
                        }
                        
                      }
                      else {
                        $tujuanfiledownload = base_url("excel/sample/sample_upload_container.xlsx");
                      }

                    ?>
            <span><a href="<?php echo $tujuanfiledownload; ?>" target="_blank">Download sample File Upload : &nbsp <?php echo $fileupload;  ?></a></span>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body upp">
    <?php if (isset($_POST['preview'])): ?>
    <?php if ($result == "sukses"): ?>
      <?php if ($datasama != ""): ?>
        <span class="text-danger">
          Berikut data double yang telah ditemukan : <br>
          <?php echo $datasama ?>
        </span>
      <?php endif ?>
      <?php if (count($containernoDB) > 1): ?>
        <br>
        <span class="text-danger">
          Berikut data containerno yang telah ditemukan : <br>
          <?php 
            foreach ($containernoDB as $key => $value) {
              echo $value."<br>";
            }
           ?>
        </span>
      <?php endif ?>
      <?php if (count($doexcelDB) > 0): ?>
        <br>
        <span class="text-danger">
          Berikut DO Number yang tidak ditemukan : <br>
          <?php 
        
            foreach ($doexcelDB as $key1 => $value1) {
              echo $value1."<br>";
            }
           ?>
        </span>
      <?php endif ?>
     
    <form method="post" action="<?php echo base_url("depoin/createupload/"); ?><?php echo $page ?>" id="myForm">
      <table class="table table-sm table-hover table-bordered">
        <thead class="bg-info"> 
            <tr> 
                <th>#</th>
                <th>containerno</th>
                <th>contsize</th>
                <th>conttype</th>
                <th>donumber</th>
                <th>feedercode</th>
                <th>vesselname</th>
                <th>voyage</th>
                <th>movestatus</th>
                <th>movedate</th>
                <th>movetime</th>
                <th>location</th>
                <th>depo</th>
                <th>destination</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            for ($i=2; $i <= count($sheet); $i++) { 
              $containerno = $sheet[$i]['A'];
            ?>
            <tr> 
                <td style="width:5%;"><?=$no?></td>
                <td>
                  <input type="hidden" name="containerno[]" value="<?=$sheet[$i]['A']?>">
                  <?=$sheet[$i]['A']?>
                </td>
                <td>
                  <input type="hidden" name="contsize[]" value="<?=$sheet[$i]['B']?>">
                  <?=$sheet[$i]['B']?>
                </td>
                <td>
                  <input type="hidden" name="conttype[]" value="<?=$sheet[$i]['C']?>">
                  <?=$sheet[$i]['C']?>
                </td>
                <td>
                  <input type="hidden" name="donumber[]" value="<?=$sheet[$i]['D']?>">
                  <?=$sheet[$i]['D']?>
                </td>
                <td>
                  <input type="hidden" name="feedercode[]" value="<?=$sheet[$i]['E']?>">
                  <?=$sheet[$i]['E']?>
                </td>
                <td>
                  <input type="hidden" name="vesselname[]" value="<?=$sheet[$i]['F']?>">
                  <?=$sheet[$i]['F']?>
                </td>
                <td>
                  <input type="hidden" name="voyage[]" value="<?=$sheet[$i]['G']?>">
                  <?=$sheet[$i]['G']?>
                </td>
                <td>
                  <input type="hidden" name="movestatus[]" value="<?=$sheet[$i]['H']?>">
                  <?=$sheet[$i]['H']?>
                </td>
                <td>
                  <input type="hidden" name="movedate[]" value="<?=$sheet[$i]['I']?>">
                  <?=$sheet[$i]['I']?>
                </td>
                <td>
                  <input type="hidden" name="movetime[]" value="<?=$sheet[$i]['J']?>">
                  <?=$sheet[$i]['J']?>
                </td>
                <td>
                  <input type="hidden" name="location[]" value="<?=$sheet[$i]['K']?>">
                  <?=$sheet[$i]['K']?>
                </td>
                <td>
                  <input type="hidden" name="depo[]" value="<?=$sheet[$i]['L']?>">
                  <?=$sheet[$i]['L']?>
                </td>
                <td>
                  <input type="hidden" name="destination[]" value="<?=$sheet[$i]['M']?>">
                  <?=$sheet[$i]['M']?>
                </td>
                <td>
                  <input type="hidden" name="remarks[]" value="<?=$sheet[$i]['N']?>">
                  <?=$sheet[$i]['N']?>
                </td>
            </tr>
            <?php 
            $no++;
            } 
            ?>
        </tbody>
      </table>
    </form>
    <?php endif ?>
    <?php endif ?>
  </div>
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
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
$(document).ready(function(){
    $("#submitBtn").click(function(){        
        
        var lingrid = $("#lingrid").val();
        var feedercode = $("#feedercode").val();
        var deptport = $("#deptport").val();
        var destport = $("#destport").val();
        var vesselcode = $("#vesselcode").val();
        var vesselname = $("#vesselname").val();
        var voyage = $("#voyage").val();
        var etd = $("#etdVal").val();
        var eta = $("#etaVal").val();
        var berthdate = $("#berthdateVal").val();
        var servicecode = $("#servicecode").val();

        if (feedercode == "") {
            alert("Feeder Vendor can't Null");
            $("#feedercode").focus();
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
        }else if(eta == ""){
            alert("eta can't Null");
            $("#eta").focus();
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
        
        var feedercode = $("#feedercode").val();
        var feedername = $("#feedername").val();
        var password = $("#password").val();
        var name = $("#name").val();
        var divbran = $("#divbran").val();
        var level = $("#level").val();

        if (feedercode == "") {
            alert("feeder ID can't Null");
            $("#feedercode").focus();
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

// $('#etd').datetimepicker({
//     format: 'L',
//     <?php 
//       if ($etd != "") {
//     ?>
//     date:'<?php //echo date("m/d/Y", strtotime($etd)); ?>',
//     <?php
//       }
//     ?>       
// });

// $('#eta').datetimepicker({
//     format: 'L',
//     <?php 
//       if ($eta != "") {
//     ?>
//     date:'<?php //echo date("m/d/Y", strtotime($eta)); ?>',
//     <?php
//       }
//     ?>
// });

// $('#berthdate').datetimepicker({
//     format: 'L',
//     <?php 
//       if ($berthdate != "") {
//     ?>
//     date:'<?php //echo date("m/d/Y", strtotime($berthdate)); ?>',
//     <?php
//       }
//     ?>
// });
</script>
