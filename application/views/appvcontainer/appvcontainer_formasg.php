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

$releasenumber= "";
$divbran= "";
$releasedate= "";
$expiredate= "";
$dodate="";
$donumber= "";
$picrequest= "";
$feedercode = "";
$origin= "";
$destination= "";
$vesselcode = "";
$vesselname= "";
$voyage= "";
$etd= "";
$eta = "";
$berthdate= "";
$remarks= "";
$disabled="";


if (!empty($row->releasenumber)) {
    $releasenumber= $row->releasenumber;
    $disabled="readonly";
}

if (!empty($row->divbran)) {
    $divbran= $row->divbran;
}

if (!empty($row->donumber)) {
    $donumber= $row->donumber;
}

if (!empty($row->dodate)) {
    $dodate= $row->dodate;
}

if (!empty($row->releasedate)) {
    $releasedate= $row->releasedate;
}

if (!empty($row->expiredate)) {
    $expiredate= $row->expiredate;
}

if (!empty($row->picrequest)) {
    $picrequest= $row->picrequest;
}

if (!empty($row->feedercode)) {
    $feedercode= $row->feedercode;
}

if (!empty($row->origin)) {
    $origin= $row->origin;
}

if (!empty($row->destination)) {
    $destination= $row->destination;
}

if (!empty($row->vesselcode)) {
    $vesselcode= $row->vesselcode;
}

if (!empty($row->vesselname)) {
    $vesselname= $row->vesselname;
}

if (!empty($row->voyage)) {
    $voyage= $row->voyage;
}

if (!empty($row->etd)) {
    $etd= $row->etd;
}

if (!empty($row->eta)) {
    $eta= $row->eta;
}

if (!empty($row->berthdate)) {
    $berthdate= $row->berthdate;
}

if (!empty($row->remarks)) {
    $remarks= $row->remarks;
}
print_r($post);
$urutan_post = $post['urutan'];
$id_ref_post = $post['id_ref'];
$notable_post = $post['notable'];
$releasenumber_post = $post['releasenumber'];

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
            var id = $("#releasenumber").val();
            $.post("<?=site_url('assignfeeder/cekrequest')?>",
              {
                requestid: id
              },
              function(data, status){
                // alert(data);
                if (data > 0) {
                    $("#err").html("releasenumber Already Exist");
                    $("#submitBtn").attr("disabled", "disabled").button('refresh');
                    $("#releasenumber").focus();
                }else{
                    $("#err").html("");
                    $("#submitBtn").removeAttr("disabled").button('refresh');
                }
              })
        }

    function pilihDo(donumber){
      $.post("<?=site_url('assignfeeder/pilihdo')?>",
        {
          donumber: donumber
        },
        function(data, status){
          var res = data.split("+==+");
          $("#donumber").val(res[1]);
          $("#dodate").val(res[2]);
          $("#dodateVal").html(res[2]);
          $("#divbran").val(res[3]);
          $("#divbranVal").html(res[3]);
          $("#picrequest").val(res[4]);
          $("#picrequestVal").html(res[4]);
          $("#bodyTable").html(res[5]);
          $('#modalDo').modal('toggle');
        })
    }

    function pilihFeed(feednumber){
      $.post("<?=site_url('assignfeeder/pilihfeed')?>",
        {
          feednumber: feednumber
        },
        function(data, status){
          var res = data.split("+==+");
          console.log(res);
          $("#feedercode_modal").val(res[0]);
          $("#vesselcode_modal").val(res[1]);
          $("#vesselname_modal").val(res[2]);
          $("#voyage_modal").val(res[3]);
          $("#etdVal_modal").val(res[4]);
          $("#etaVal_modal").val(res[5]);
          $("#berthdateVal_modal").val(res[6]);
          $("#remarks_modal").val(res[7]);
          $("#origin_modal").val(res[8]);
          $("#destination_modal").val(res[9]);
          $('#modalFeeder').modal('toggle');
        })
    }

    function searchFeed(){
      var feedercode = $("#feedercodeSearch").val();
      var deptport = $("#deptportSearch").val();
      var destport = $("#destportSearch").val();
      var etdfrom = $("#etdfromVal").val();
      var etdto = $("#etdtoVal").val();
      $.post("<?=site_url('assignfeeder/searchfeed')?>",
        {
          feedercode: feedercode,
          deptport: deptport,
          destport: destport,
          etdfrom: etdfrom,
          etdto: etdto
        },
        function(data, status){
          var res = data.split("+==+");
          $("#bodyTableFeeder").html(data);
          // $('#modalDo').modal('toggle');
        })
    }

    function cekMax(max, nilai) {
      var nilainya = $(nilai).val();
      if(nilainya > max){
        $(nilai).val('');
        alert('Tidak boleh lebih dari qty request');
        $(nilai).focus();
      }
    }

    function updateDo(id, nilai, nilaiasli, no, type) {
      var contqtyasg = $('#contqtyasg'+no).val();
      if (contqtyasg > nilai) {
        alert('Tidak boleh lebih dari qty request');
        $('#contqtyasg'+no).val(nilaiasli);
        $('#contqtyasg'+no).focus();
        return;
      }
      $.post("<?=site_url('assignfeeder/updatedetail')?>",
        {
          lingrid: id,
          contqtyasg: contqtyasg
        },
        function(data, status){
          var res = data.split("+==+");
          if (res[0] == 'sukses') {
            toastr.success(res[1]);
          }else if(res[0] == 'non'){
            toastr.info(res[1]);
          }else{
            toastr.warning('error');
            console.log(data);
          }
        })
    }

    function printDo(releasenumber) {
      $('#modalPrint').modal('show');
      var ifr = document.getElementsByName('iframe')[0];
      ifr.src = ifr.src;
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
                         Assign Feeder Entry
                        <small>&nbsp;</small>
                      </h3>
                  </div>
                  <div class="col-6">
                    <div class="float-sm-right">
                      <button type="button" onclick="submitBtn()" class="btn btn-success btn-flat">
                          <i class="fa fa-paper-plane"></i> Save
                      </button>
                    </div>
                  </div>
              </div>

              <!-- /. tools -->
            </div>
            <!-- /.card-header -->

            <div class="card-body pad">


                  <div class="row">                    
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">DO Number</label>
                      <div class="col-sm-5">
                        <input class="form-control form-control-sm" name="donumber" id="donumber_modal" value="<?php echo $donumber ?>">
                      </div>
                    </div>
                    <input type="hidden" name="releasenumber" id="releasenumber_modal" class="form-control form-control-sm" placeholder="Reff Number" required value="<?php echo $requestno_auto ?>" onchange="cekrequestid()" <?php echo $disabled ?>>
                   
                  </div>


                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Expired Date</label>
                      <div class="col-sm-5">
                        <div class="input-group date" id="expiredate" data-target-input="nearest">
                          <input class="form-control form-control-sm datetimepicker-input" data-target="#expiredate" name="expiredate" id="expiredateVal_modal" data-toggle="datetimepicker" value="<?php echo $expiredate ?>" autocomplete="off" <?php echo $disabled ?>>
                          <div class="input-group-text" data-target="#expiredate" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="releasedate" id="releasedateVal_modal" data-toggle="datetimepicker" value="<?php echo date('Y-m-d') ?>" >
                  </div>

                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold"></label>
                      <div class="col-sm-5">
                        <div class="input-group">
                         
                        </div>
                      </div>
                    </div>
                  </div>




                  <input type="hidden" name="picrequest" id="picrequest_modal" required value="<?php echo $picrequest ?>">
                    <input type="hidden" name="dodate" id="dodate_modal" required value="<?php echo date("Y-m-d") ?>" readonly>                 

            <div class="row">

             <div class="col-12">
               <div class="card card-outline card-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                              <h4>
                                 Feeder Details
                              </h4>
                            </div>
                            <div class="col-6">
                              <div class="float-sm-right">
                              <button type="button" class="btn btn-primary" id="findFeeder">Find Schedule</button>
                              </div>
                            </div>
                        </div>
                      </div>
                 </div>
              </div> <!-- /.col -->




              <div class="col-md-6">
                    <div class="callout callout-info bott">
                
                        <div class="row">
                          <div class="col-12 col-md-12 form-group row">
                            <label class="col-sm-4 col-form-label not-bold">Feeder Vendor</label>
                            <div class="col-sm-7">
                               <!--  <input type="text" name="feedercode" id="feedercode" class="form-control form-control-sm" placeholder="feedercode" required value="<?php echo $feedercode ?>" >
 -->                               
                             <select name="feedercode" id="feedercode_modal" class="form-control form-control-sm">
                                <?php 
                                  foreach ($feedRow as $key => $value) {
                                    $feedercodeOps = $value->feedercode;
                                    ?>
                                    <option value="<?php echo $feedercodeOps ?>" 
                                      <?php echo $feedercode == $feedercodeOps ? 'selected' : ''; ?>>
                                      <?php echo $feedercodeOps ?>
                                        
                                      </option>
                                <?php
                                  }
                                ?>
                              </select>
                            </div>
                          </div>
                        </div>

                        <div class="row upp"> 
                          <div class="col-12 col-md-12 form-group row">
                            <label class="col-sm-4 col-form-label not-bold">Origin</label>
                              <div class="col-sm-7">
                              <input type="text" name="origin" id="origin_modal" class="form-control form-control-sm" placeholder="origin" required value="<?php echo $origin ?>" >
                              </div>
                          </div>
                        </div>

                        <div class="row upp"> 
                          <div class="col-12 col-md-12 form-group row">
                            <label class="col-sm-4 col-form-label not-bold">Destination</label>
                              <div class="col-sm-7">
                              <input type="text" name="destination" id="destination_modal" class="form-control form-control-sm" placeholder="destination" required value="<?php echo $destination ?>" >
                              </div>
                          </div>
                        </div>

                        <div class="row upp"> 
                          <div class="col-12 col-md-12 form-group row">
                            <label class="col-sm-4 col-form-label not-bold">Vessel Name</label>
                              <div class="col-sm-7">
                              <input type="text" name="vesselname" id="vesselname_modal" class="form-control form-control-sm" placeholder="vesselname" required value="<?php echo $vesselname ?>" >
                              </div>
                          </div>
                        </div>

                        <div class="row upp"> 
                          <div class="col-12 col-md-12 form-group row">
                            <label class="col-sm-4 col-form-label not-bold">Voyage</label>
                              <div class="col-sm-7">
                              <input type="text" name="voyage" id="voyage_modal" class="form-control form-control-sm" placeholder="voyage" required value="<?php echo $voyage ?>" >
                              </div>
                          </div>
                        </div>

                    </div>
               </div> <!-- /.col -->


               <div class="col-md-6">
                    <div class="callout callout-info bott">
                
                        <div class="row">
                          <div class="col-12 col-md-12 form-group row">
                            <label class="col-sm-4 col-form-label not-bold">ETD</label>
                            <div class="col-sm-7">
                              <div class="input-group date" id="etd" data-target-input="nearest">
                                <input class="form-control form-control-sm datetimepicker-input" data-target="#etd" name="etd" id="etdVal_modal" data-toggle="datetimepicker" value="<?php echo $etd ?>" autocomplete="off" >
                                <div class="input-group-text" data-target="#etd" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row upp"> 
                          <div class="col-12 col-md-12 form-group row">
                            <label class="col-sm-4 col-form-label not-bold">ETA</label>
                              <div class="col-sm-7">
                              <div class="input-group date" id="eta" data-target-input="nearest">
                                <input class="form-control form-control-sm datetimepicker-input" data-target="#eta" name="eta" id="etaVal_modal" data-toggle="datetimepicker" value="<?php echo $eta ?>" autocomplete="off" >
                                <div class="input-group-text" data-target="#eta" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                              </div>
                              </div>
                          </div>
                        </div>

                        <div class="row upp"> 
                          <div class="col-12 col-md-12 form-group row">
                            <label class="col-sm-4 col-form-label not-bold">Berthing Date</label>
                              <div class="col-sm-7">
                              <div class="input-group date" id="berthdate_modal" data-target-input="nearest">
                                <input class="form-control form-control-sm datetimepicker-input" data-target="#berthdate" name="berthdate" id="berthdateVal" data-toggle="datetimepicker" value="<?php echo $berthdate ?>" autocomplete="off" >
                                <div class="input-group-text" data-target="#berthdate" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                              </div>
                              </div>
                          </div>
                        </div>

                        <div class="row upp"> 
                          <div class="col-12 col-md-12 form-group row">
                            <label class="col-sm-4 col-form-label not-bold">Remarks</label>
                              <div class="col-sm-7">
                              <textarea name="remarks" id="remarks_modal" class="form-control form-control-sm"><?php echo $remarks ?></textarea>
                              </div>
                          </div>
                        </div>

                    </div>
               </div> <!-- /.col -->
            </div>   
        </div>
            </div>

          </div>
        </div>
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

    <div class="modal fade" id="modalPrint">
      <div class="modal-dialog" style="max-width: 90%;">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">BoxOps System</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body" style="height: 100%">
            <iframe name="iframe" src="<?=site_url('assignfeeder/printdo/'.$releasenumber)?>" style="width: 100%;height: 500px;"></iframe>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <!-- <button type="button" class="btn btn-primary" onclick="formSubmit()">Save</button> -->
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
            <a href="<?=site_url('hapus')?>" class="btn btn-danger">Delete</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalDo">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title"> DO LIST</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table id="doTable" class="table table-sm table-hover table-bordered">
              <thead class="bg-info"> 
                  <tr> 
                      <th>#</th>
                      <th>Do Number</th>
                      <th>Do Date</th>
                      <th>Division / Branch</th>
                  </tr>
              </thead>
              <tbody>
                  <?php 
                  $no = 1;
                  foreach($approvedQueryRow as $key => $data) {
                    ?>
                  <tr> 
                      <td style="width:5%;"><?=$no?></td>
                      <td style="width:5%;">
                        <span onclick="pilihDo('<?=$data->donumber?>')" class="text-primary" style="cursor: pointer;">
                          <?=$data->donumber?>                            
                        </span></td>
                      <td style="width:5%;"><?=$data->dodate?></td>
                      <td style="width:5%;"><?=$data->divbran?></td>
                  </tr>
                  <?php 
                  $no++;
                  } 
                  ?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
            <!-- <button type="button" class="btn btn-primary" onclick="formSubmit()">Save</button> -->
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="modalFeeder">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Feeder Schedule</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-12">
                <div class="row">
                  <div class="col-8 col-md-4 form-group row">
                    <label class="col-sm-6 col-form-label not-bold">Feeder Vendor</label>
                    <div class="col-sm-6">
                      <!-- <input type="text" name="feedercodeSearch" id="feedercodeSearch" class="form-control form-control-sm" placeholder="feedercodeSearch"> -->
                      <select name="feedercodeSearch" id="feedercodeSearch" class="form-control form-control-sm">
                      <option value="">- All -</option>
                                <?php 
                                  foreach ($feedRow as $key => $value) {
                                    $feedercodeOps = $value->feedercode;
                                    ?>
                                    <option value="<?php echo $feedercodeOps ?>" 
                                      <?php echo $feedercode == $feedercodeOps ? 'selected' : ''; ?>>
                                      <?php echo $feedercodeOps ?>
                                        
                                      </option>
                                <?php
                                  }
                                ?>
                              </select>
                   
                   
                    </div>
                  </div>
                  <div class="col-8 col-md-4 form-group row">
                    <label class="col-sm-4 col-form-label not-bold">Origin</label>
                    <div class="col-sm-6">
                      <input type="text" name="deptportSearch" id="deptportSearch" class="form-control form-control-sm" placeholder="Origin">
                    </div>
                  </div>
                  <div class="col-8 col-md-4 form-group row">
                    <label class="col-sm-4 col-form-label not-bold">Destination</label>
                    <div class="col-sm-6">
                      <input type="text" name="destportSearch" id="destportSearch" class="form-control form-control-sm" placeholder="Destination">
                    </div>
                  </div>

                  
                </div>
                <div class="row upp">
                  <div class="col-8 col-md-4 form-group row">
                    <label class="col-sm-6 col-form-label not-bold">ETD From</label>
                    <div class="col-sm-6">
                      <div class="input-group date" id="etdfrom" data-target-input="nearest">
                        <input class="form-control form-control-sm datetimepicker-input" data-target="#etdfrom" name="etdfrom" id="etdfromVal" data-toggle="datetimepicker" value="" autocomplete="off" >
                        <div class="input-group-text" data-target="#etdfrom" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-8 col-md-4 form-group row">
                    <label class="col-sm-4 col-form-label not-bold">To</label>
                    <div class="col-sm-6">
                      <div class="input-group date" id="etdto" data-target-input="nearest">
                        <input class="form-control form-control-sm datetimepicker-input" data-target="#etdto" name="etdto" id="etdtoVal" data-toggle="datetimepicker" value="" autocomplete="off" >
                        <div class="input-group-text" data-target="#etdto" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>

                  <div class="col-8 col-md-4 form-group row">
                    <label class="col-sm-7 col-form-label not-bold"></label>
                    <div class="col-sm-5">
                    <button type="button" class="btn btn-primary btn" onclick="searchFeed()">Search</button>
                    </div>
                  </div>

                </div>
              </div>
              
            </div>
            <div class="row">
              <div class="col-12">
                <table id="noSearch" class="table table-sm table-hover table-bordered">
                  <thead class="bg-info"> 
                      <tr> 
                          <th>#</th>
                          <th>Feeder Vendor</th>
                          <th>Origin</th>
                          <th>Destination</th>
                          <th>ETD</th>
                          <th>Vessel Name</th>
                          <th>Voyage</th>
                          <th>Remarks</th>
                      </tr>
                  </thead>
                  <tbody id="bodyTableFeeder">
                      <?php 
                      $no = 1;
                      foreach($feedSearch as $key => $data) {
                        ?>
                      <tr> 
                          <td style="width:5%;"><?=$no?></td>
                          <td style="width:5%;">
                            <span onclick="pilihFeed(<?=$data->lingrid?>)" class="text-primary" style="cursor: pointer;">
                              <?=$data->feedercode?>                            
                            </span></td>
                          <td style="width:5%;"><?=$data->deptport?></td>
                          <td style="width:5%;"><?=$data->destport?></td>
                          <td style="width:5%;"><?=$data->etd?></td>
                          <td style="width:5%;"><?=$data->vesselname?></td>
                          <td style="width:5%;"><?=$data->voyage?></td>
                          <td style="width:5%;"><?=$data->servicecode?></td>

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
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Cancel</button>
           
          </div>
        </div>
      </div>
    </div>

    <script>
    $('#doTable').DataTable();
    $("#doCall").click(function(){
      $('#modalDo').modal('show');
    });
    $("#findFeeder").click(function(){
      $('#modalFeeder').modal('show');
    });

    function submitBtn() {
      var releasenumber = $("#releasenumber_modal").val();
      var releasedate = $("#releasedateVal_modal").val();
      var expiredate = $("#expiredateVal_modal").val();
      var donumber = $("#donumber_modal").val();
      var dodate = $("#dodate_modal").val();
      alert(dodate);
      
      var feedercode = $("#feedercode_modal").val();
      var vesselcode = $("#vesselcode_modal").val();
      var vesselname = $("#vesselname_modal").val();
      var voyage = $("#voyage_modal").val();
      var etd = $("#etdVal_modal").val();
      var eta = $("#etaVal_modal").val();
      var berthdate = $("#berthdateVal_modal").val();
      var remarks = $("#remarks_modal").val();
      var destination = $("#destination_modal").val();

      if (releasenumber == "") {
        alert('releasenumber tidak boleh kosong');
        $("#releasenumber_modal").focus();
        return;
      }
      if (releasedate == "") {
        alert('releasedate tidak boleh kosong');
        $("#releasedateVal_modal").focus();
        return;
      }

      if (expiredate == "") {
        alert('expiredate tidak boleh kosong');
        $("#expiredateVal_modal").focus();
        return;
      }
      if (donumber == "") {
        alert('donumber tidak boleh kosong');
        $("#donumber_modal").focus();
        return;
      }

      if (feedercode == "") {
        alert('feedercode tidak boleh kosong');
        $("#feedercode_modal").focus();
        return;
      }
     /*  if (vesselcode == "") {
        alert('vesselcode tidak boleh kosong');
        $("#vesselcode").focus();
        return;
      } */
      if (vesselname == "") {
        alert('vesselname tidak boleh kosong');
        $("#vesselname_modal").focus();
        return;
      }
      if (voyage == "") {
        alert('voyage tidak boleh kosong');
        $("#voyage_modal").focus();
        return;
      }
      if (etd == "") {
        alert('etd tidak boleh kosong');
        $("#etdVal_modal").focus();
        return;
      }
      if (eta == "") {
        alert('eta tidak boleh kosong');
        $("#etaVal_modal").focus();
        return;
      }
      if (berthdate == "") {
        alert('berthdate tidak boleh kosong');
        $("#berthdateVal_modal").focus();
        return;
      }

      $("#id_ref_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(<?php echo $id_ref_post ?>);
      $("#releasenumber_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(releasenumber);
      $("#cntdonumber_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").html(donumber);
      $("#releasedate_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(releasedate);
      $("#expiredate_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(expiredate);
      $("#donumber_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(donumber);
      $("#dodate_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(dodate);
      $("#feedercode_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(feedercode);
      $("#vesselcode_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(vesselcode);
      // $("#vesselid_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(vesselid);
      $("#voyage_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(voyage);
      $("#etd_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(etd);
      $("#eta_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(eta);
      $("#berthdate_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(berthdate);
      $("#remarks_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(remarks);
      $("#divbran_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(divbran);
      $("#picrequest_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(picrequest);
      // $("#itmtransportation_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(itmtransportation);
      $("#origin_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(origin);
      $("#destination_<?php echo $notable_post ?>_<?php echo $urutan_post ?>").val(destination);

      $("#modalAsg").modal("toggle");
    }
    $(document).ready(function(){
        

        $("#updateBtn").click(function(){

            var releasenumber = $("#releasenumber").val();
            var requestname = $("#requestname").val();
            var password = $("#password").val();
            var name = $("#name").val();
            var divbran = $("#divbran").val();
            var level = $("#level").val();

            if (releasenumber == "") {
                alert("request ID can't Null");
                $("#releasenumber").focus();
            }else if(requestname == ""){
                alert("requestname can't Null");
                $("#requestname").focus();
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

    $('#releasedate').datetimepicker({
        format: 'L',
        <?php
          if ($releasedate != "") {
        ?>
        date:'<?php echo date("m/d/Y", strtotime($releasedate)); ?>',
        <?php
          }
        ?>
    });



    $('#expiredate').datetimepicker({
        format: 'L',
        <?php
          if ($expiredate != "") {
        ?>
        date:'<?php echo date("m/d/Y", strtotime($expiredate)); ?>',
        <?php
          }
        ?>
    });

    $('#etd').datetimepicker({
        format: 'L',
        <?php
          if ($etd != "") {
        ?>
        date:'<?php echo date("m/d/Y", strtotime($etd)); ?>',
        <?php
          }
        ?>
    });

    $('#eta').datetimepicker({
        format: 'L',
        <?php
          if ($eta != "") {
        ?>
        date:'<?php echo date("m/d/Y", strtotime($eta)); ?>',
        <?php
          }
        ?>
    });

    $('#berthdate').datetimepicker({
        format: 'L',
        <?php
          if ($berthdate != "") {
        ?>
        date:'<?php echo date("m/d/Y", strtotime($berthdate)); ?>',
        <?php
          }
        ?>
    });

    $('#etdfrom').datetimepicker({
        format: 'L'
    });

    $('#etdto').datetimepicker({
        format: 'L'
    });

    
    </script>
