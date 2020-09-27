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
$portdest ="";
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

$origin ="IDJKT";
$destination ="";


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

if (!empty($row->portdest)) {
  $portdest= $row->portdest;
}




$dodate1= str_replace('-', '/', $dodate);
$expiredate = date('Y-m-d',strtotime($dodate1 . "+21 days"));


if (!empty($row->expiredate)) {
  $expiredate= $row->expiredate;
}
//echo $expiredate;


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
          //--yang diatas ini header nya

          //yang dibawah ini detailnya
          $("#bodyTable").html(res[5]);  //----> ini kuncinya , datanya ada di controler assignfeeder/pilihdo
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
          $("#feedercode").val(res[0]);
          $("#vesselcode").val(res[1]);
          $("#vesselname").val(res[2]);
          $("#voyage").val(res[3]);
          $("#etdVal").val(res[4]);
          $("#etaVal").val(res[5]);
          $("#berthdateVal").val(res[6]);
          $("#remarks").val(res[7]);
          $("#origin").val(res[8]);
          $("#destination").val(res[9]);
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



    function EntryFeeder(type) {

    
       var lingridcondetailm = $('#lingridcondetailm').val();
       var requestnom = $('#requestnom').val();
       var donumberm = $('#donumberm').val();
       var dest = $('#dest').val();
       var qtyasal = $('#qtyasal').val();
       var contqtyasgm = $('#contqtyasgm').val();
       var contqtymodal = $('#contqtymodal').val();
       
/*   
       alert('qtyasal :'+qtyasal);
       alert('contqtyasgm :'+contqtyasgm);
       alert('contqtymodal :'+contqtymodal); */

       var contqtyisian = 0 ;
       qtyasal = parseInt(qtyasal);
       contqtyasgm = parseInt(contqtyasgm);
       contqtymodal = parseInt(contqtymodal);
       contqtyisian = parseInt(contqtyisian);

      if (isNaN(contqtymodal)) 
        { 
          alert("QTY Assign Can't be Null"); 
          $('#contqtymodal').focus();
          return false;
        }
        else if (isNaN(qtyasal) ) 
          { 
            alert("wrong input"); 
            return ;
          }
        else if (isNaN(contqtyasgm)) 
          { 
            contqtyasgm=0;
          }
       
        contqtyisian = contqtymodal +  contqtyasgm ;
        //alert('contqtyisian :'+contqtyisian);
      
      if (contqtyisian > qtyasal) {
          alert('QTY Assign cannot be more than TOTAL QTY !');
         $('#contqtymodal').focus();
          return ;
      } else { 
      
        $("#formfeeder").submit();
      }
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
                         Assign Feeder 
                        <small>&nbsp;</small>
                      </h3>
                  </div>
                  <div class="col-6">
                     <div class="float-sm-right">

                        <?php
                             $urlrefresh = 'assignfeeder/asgnfeeder/'.str_replace("/","@",$donumber);
                            if($page == "add"){
                            $url = 'assignfeeder/create';
                        ?>
                            <button type="button" id="submitBtn" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Save
                            </button>

                            <!-- <button type="button" class="table-add btn btn-info btn-flat">
                                <i class="fa fa-plus"></i> ADD
                            </button> -->

                        <?php
                            }elseif ($page == "edit") {
                            $url = 'assignfeeder/process/'.$releasenumber;
                            $urlDel = 'assignfeeder/del/'.$releasenumber;

                           if ($this->fungsi->user_login()->level == 9) { 
                        ?> 
                          <!--   <button type="button" onclick="printDo('<?php echo $releasenumber ?>')" class="btn btn-primary btn-flat">
                                <i class="fa fa-print"></i> Print
                            </button> -->

                           <!--  <button type="button" id="updateBtn" class="btn btn-success btn-flat">
                                <i class="fa fa-paper-plane"></i> Update
                            </button> -->
                            
                         <!--    <button type="button" id="deleteBtn" class="btn btn-danger btn-flat">
                                <i class="fa fa-trash"></i> Delete
                            </button> -->

                            <a href="<?=site_url('assignfeeder')?>" class="btn btn-warning btn-flat text-white">
                           <i class="fa fa-undo"></i> Back
        
                        <?php
                        }
                            }
                         ?>


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
                        <label class="col-sm-3 col-form-label not-bold">DO Number</label>
                        <div class="col-sm-5">
                          <div class="input-group">
                            <?php if ($page != "edit"): ?>
                              <input class="form-control form-control-sm" name="donumber" id="donumber" value="<?php echo $donumber ?>" autocomplete="off" readonly>
                              <div class="input-group-text" id="doCall" style="cursor: pointer;"><i class="fa fa-search"></i></div>
                            <?php else: ?>
                              <input class="form-control form-control-sm" name="donumber" id="donumber" value="<?php echo $donumber ?>" autocomplete="off" readonly>
                            <?php endif ?>    
                          </div>
                        </div>
                      </div>
                   
                      <div class="col-8 col-md-6 form-group row">
                       <!--  <label class="col-sm-3 col-form-label not-bold">Reff Number</label>
                        <div class="col-sm-5">
                          <input type="text" name="releasenumber" id="releasenumber" class="form-control form-control-sm" placeholder="Reff Number" required value="<?php echo $releasenumber ?>" onchange="cekrequestid()" <?php echo $disabled ?>>
                          <small class="text-danger" id="err"></small>
                        </div> -->
                      </div>


                  </div>


                  <div class="row upp">

                    <div class="col-8 col-md-6 form-group row">
                    <label class="col-sm-3 col-form-label not-bold">DO Date</label>
                    <div class="col-sm-5">
                       <div class="input-group date" id="dodate" data-target-input="nearest">
                          <input class="form-control form-control-sm datetimepicker-input" data-target="#dodate" name="dodate"  id="dodate"  value="<?php echo $dodate ?>" autocomplete="off" readonly>
                        </div>
                      </div> 
                    </div>
                    <div class="col-8 col-md-6 form-group row">
                    <label class="col-sm-3 col-form-label not-bold">Destination</label>
                      <div class="col-sm-5">
                        <div class="input-group date" id="portdest" data-target-input="nearest">
                        <input class="form-control form-control-sm" name="portdest" id="portdest" value="<?php echo $portdest ?>" autocomplete="off" readonly>
                        </div>
                      </div> 
                    </div>
                  </div> <!--row up-->

                  <div class="row upp">
                    <div class="col-8 col-md-6 form-group row">
                    <label class="col-sm-3 col-form-label not-bold">Expired Date</label>
                      <div class="col-sm-5">
                      <div class="input-group date" id="expiredate" data-target-input="nearest">
                          <input class="form-control form-control-sm datetimepicker-input" data-target="#expiredate" name="expiredate" id="expiredateVal" data-toggle="datetimepicker" value="<?php echo $expiredate; ?>" autocomplete="off" <?php echo $disabled ?>>
                          <div class="input-group-text" data-target="#expiredate" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                        </div>
                      </div>
                    </div>

                    <div class="col-8 col-md-6 form-group row">
                      <label class="col-sm-3 col-form-label not-bold">Division/Branch</label>
                      <div class="col-sm-5">
                      <input class="form-control form-control-sm" name="divbran" id="divbran" value="<?php echo $divbran ?>" autocomplete="off" readonly>
                      </div>
                    </div>
                  </div>




                  <input type="hidden" name="picrequest" id="picrequest" required value="<?php echo $dodate ?>">
                    <input type="hidden" name="dodate" id="dodate" required value="<?php echo $dodate ?>" readonly>  


                  <div class="row">
                    <!-- Editable table -->
                      <div class="card col-sm-12">
                      <div class="card-body">
                          <div id="table" class="table-editable">
                            <table class="table table-bordered table-responsive-sm table-sm text-center">
                            <thead >
                                <tr>
                                   <th class="arial-kiri" style="height: 23px;" colspan="7">Container Details</th>
                                </tr>
                              </thead>
                              <thead class="bg-info">
                                <tr>
                                  <th class="text-center">QTY</th>
                                  <th class="text-center">Size/Type</th>
                                  <th class="text-center" >Assign Feeder</th>
                                  
                                 <!--  <th class="text-center">Type</th> -->
                                
                                </tr>
                               </thead>
                              
                              <tbody id="bodyTable">
                                <?php if ($page == 'edit'): ?>
                                <?php 
                                $no =1;
                             
                                foreach ($detailRow as $key => $value) {
                                  $jumlahtotalqty=0;
                                //  echo"asdadsf";
                                
                                  
                                ?>
                                  <tr>
                                    <td><?php echo $value['contqtyaprv'] ?></td>
                                    <td><?php echo $value['contsize']. $value['conttype'] ?></td>
                                    <td>

                                    

                                      <div class="container">
                            
                                      <input type="hidden" name="lingridcondetail" value="<?php echo $value['lingrid']; ?>">
                                      <input type="hidden" name="requestno" value="<?php echo $value['requestno']; ?>">
                                      <input type="hidden" name="donumber" value="<?php echo $donumber; ?>">
                                      <input type="hidden" name="jumlahtotalqty[]"  id="jumlahtotalqty`+$no+`" value="<?php echo $jumlahtotalqty; ?>">



                                    
                                        <table class="table table-bordered table-responsive-sm table-sm text-center">
                                        <thead class="bg-success">
                                        
                                                <tr>
                                                    <td class="text-center">QTY Assign</td>
                                                    <td class="text-center">DO Number</td>
                                                    <td class="text-center">Feeder</td>
                                                    <td class="text-center">Destination</d>
                                                    <td class="text-center">Vessel</td>
                                                    <td class="text-center">Voy</td>
                                                    <td class="text-center">ETD</td>
                                                    <td class="text-center">ETA</td>
                                                    <td class="text-center">Remarks</td>
                                                    <th > <!-- KIRIM DATA KE MODAL -->
                                                    <?php
                                                    if ($this->fungsi->user_login()->level == 9) { 
                                                    ?> 
                                                        <div class="pull-right"><a class="btn btn-sm btn-warning" 
                                                            data-toggle="modal"
                                                            data-lingridcondetailm="<?php echo $value['lingrid']; ?>"
                                                            data-requestnom="<?php echo $value['requestno']; ?>"
                                                            data-donumberm="<?php echo $donumber; ?>"
                                                            data-dodate="<?php echo $dodate; ?>"
                                                            data-qtyasal="<?php echo $value['contqtyaprv']; ?>"
                                                            data-dest="<?php echo $portdest; ?>"
                                                            data-contsizem="<?php echo $value['contsize']; ?>"
                                                            data-conttypem="<?php echo $value['conttype']; ?>"
                                                            data-contqtyasg="<?php echo $this->fungsi->cari_jumlahqty_feeder($value['lingrid'])->jumlahcontqty; ?>"
                                                            data-target="#modal_add_new"> Add New</a>

                                                      <?php
                                                        }
                                                      ?> 
                                                      </div>       
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                              <?php 
                                                      //  print_r($this->fungsi->cari_detail_container_request($data->requestno));
                                                      /*  foreach($this->fungsi->cari_detail_container_request($data->requestno) as $keyF => $dataF) {
                                                          // echo "keyf".  $keyF ; 
                                                          foreach($dataF as $keyBapak => $valueAnak)
                                                          {
                                                            // echo $keyBapak;
                                                            foreach($valueAnak as $keyAnak => $valueCucu)
                                                            {                                       
                                                              if ($keyAnak == "requestno") {   echo  "requestno :" .$valueCucu;}
                                                              if ($keyAnak == "contqty") {   echo  "contqty :" .$valueCucu;}
                                                              if ($keyAnak == "contsize") {   echo  "contsize :" .$valueCucu;}
                                                              if ($keyAnak == "conttype") {   echo  "conttype :" .$valueCucu;}
                                                              if ($keyAnak == "contgrade") {   echo  "contgrade :" .$valueCucu;}                                                  
                                                            }
                                                          }
                                                        } */   // SCRIPT YANG PANJANG DIATAS INI .. BISA DIGANTIKAN DENGAN SCRIPT DIBAWAH INI
                                                                // foreach($this->fungsi->cari_detail_container_request($data->requestno)['detailRowF'] as $keyF) {
                                                                //  echo $keyF['requestno']. '<br>';
                                                                // }
                                                    $count = 0;
                                                    foreach($this->fungsi->cari_tx_req_container_feeder($value['lingrid'])['detailRowFeederF'] as $keyF)            
                                                    {
                                                      $jumlahtotalqty= $jumlahtotalqty + $keyF['contqty'];
                                                      $lingridcondetail  = $keyF['lingridcondetail']  ;   
                                                      $lingridfeederdetail  = $keyF['lingrid']  ;   
                                                                    
                                                  ?>

                                                  <tr> 
                                                  <!--  <td><?=$keyF['lingridcondetail']?></td> 
                                                  <td><?=$keyF['requestno']?></td>
                                                  <td><?=$keyF['donumber']?></td> -->

                                                  <td><?=$keyF['contqty']?></td>
                                                  <td><?=$keyF['donumberfeeder']?></td>
                                                  <td><?=$keyF['feedercode']?></td>
                                                  <td><?=$keyF['dest']?></td>
                                                  <td><?=$keyF['vesselname']?></td>
                                                  <td><?=$keyF['voyage']?></td>
                                                  <td><?=$keyF['etd']?></td>
                                                  <td><?=$keyF['eta']?></td>
                                                  <td><?=$keyF['notes']?></td>
                                                  <td> 
                                                      <?php
                                                      if ($this->fungsi->user_login()->level == 9) { 
                                                      ?> 
                                                      <button type="button" class="btn btn-danger btn-rounded btn-sm my-0" onclick="updateData(<?php echo $keyF['lingrid'] ?>, 'hapus')"><i class="fa fa-trash"></i></button>
                                                      <?php 
                                                       }
                                                      ?>
                                                  </td>
                                                  </tr>
                                                  <?php     
                                                    $count = $count + 1 ;                      
                                                  } 
                                                  if ($count == 0) {
                                                    //Cek apakah ada Request EMPTY dari GTNJKT
                                                   // echo " Tidak adaa";
                                                   $countdetail=0;
                                                    foreach($this->fungsi->cari_tx_req_container_gtnjkt($portdest,$value['contsize'],$value['conttype'],$value['lingrid'],$value['requestno'],$donumber, $dodate,$value['contqtyaprv'])['detailRowFGTNJKT'] as $keyFGTNJKT)  
                                                    {
                                                      $countdetail = $countdetail + 1 ;   
                                                    //  echo " Detail nyAda";

                                                    ?>
                                                    
                                                        <tr> 
                                                        <!--  <td><?=$keyFGTNJKT['lingridcondetail']?></td> 
                                                        <td><?=$keyFGTNJKT['requestno']?></td>
                                                        <td><?=$keyFGTNJKT['donumber']?></td> -->

                                                        <td><?=$keyFGTNJKT['contqty']?></td>
                                                        <td><?=$keyFGTNJKT['donumberfeeder']?></td>
                                                        <td><?=$keyFGTNJKT['feedercode']?></td>
                                                        <td><?=$keyFGTNJKT['dest']?></td>
                                                        <td><?=$keyFGTNJKT['vesselname']?></td>
                                                        <td><?=$keyFGTNJKT['voyage']?></td>
                                                        <td><?=$keyFGTNJKT['etd']?></td>
                                                        <td><?=$keyFGTNJKT['eta']?></td>
                                                        <td><?=$keyFGTNJKT['notes']?></td>
                                                        <td> 
                                                            <button type="button" class="btn btn-danger btn-rounded btn-sm my-0" onclick="updateData(<?php echo $keyFGTNJKT['lingrid'] ?>, 'hapus')"><i class="fa fa-trash"></i></button>
                                                        </td>
                                                        </tr>
                                                    <?php
                                                        
                                                    }
                                                   
                                                  }   
                                                  ?>

                                            </tbody>
                                        </table>                                       
                                      </div>



                                      <input type="hidden" name="contqtyasg" id="contqtyasg<?php echo $no?>" value="<?=$jumlahtotalqty?>" class="form-control form-control-sm">
                                    </td> 
                                   
  

                                     <!-- <td> <button type="button" class="btn btn-primary btn-rounded btn-sm my-0" onclick="updateDo(<?php echo $value['lingrid'] ?>, <?php echo $value['contqtyaprv'] ?>, <?php echo $value['contqtyasg'] == "" ? "0" : $value['contqtyasg'] ?>, <?php echo $no?>, 'update')"><i class="fa fa-file-alt"></i></button></td>-->                                  
                                    </tr>
                                <?php
                                $no++;
                                } ?>
                                <?php endif ?>
                              </tbody>
                            </table>
                          </div>
                        </div>
                      </div>
                      <!-- Editable table -->
                  </div>

              </div>
            </form>
            </div>

          </div>
        </div>
      </div>
    </section>








 
<!-- ============ MODAL ADD BARANG =============== -->


    <div class="modal fade" id="modal_add_new">
      <div class="modal-dialog modal-xl">
          <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Assign Feeder</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>


            <form class="form-horizontal" method="post" id ="formfeeder" action="<?=site_url('assignfeeder/asgnfeederdetail/')?><?php echo str_replace("/","@",$donumber) ?>">
              <div class="modal-body">
              <input id="lingridcondetailm" name="lingridcondetailm" type="hidden" class="form-control" value="<?=set_value('lingridcondetailm')?>" placeholder="lingridcondetailm">
              <input id="requestnom" name="requestnom" type="hidden" class="form-control" value="<?=set_value('requestnom')?>" placeholder="requestnom">
              <input id="donumberm" name="donumberm" type="hidden" class="form-control" value="<?=set_value('donumberm')?>" placeholder="donumberm">


                <div class="row">
               
                <div class="col-md-6">
                            <div class="callout callout-info bott">
                        
                                <div class="row">
                                  <div class="col-12 col-md-12 form-group row">
                                    <label class="col-sm-4 col-form-label not-bold">QTY Assign </label>
                                    <div class="col-sm-7">
                                      <div class="input-group date" id="contqtymodalm" data-target-input="nearest">
                                      <input type="number" name="contqtymodal" id="contqtymodal" class="form-control form-control-sm" placeholder="QTY Assign" value="" required >
                                      <input type="hidden" name="qtyasal" id="qtyasal" class="form-control form-control-sm" placeholder="QTY Assign" value="<?=set_value('qtyasal')?>"  >
                                      <input type="hidden" name="contqtyasgm" id="contqtyasgm" class="form-control form-control-sm" placeholder="QTY Assign" value="<?=set_value('contqtyasgm')?>"  >
                                      <input type="hidden" name="dodatem" id="dodatem" class="form-control form-control-sm" value="<?=set_value('dodatem')?>"  >
                                      <input type="hidden" name="contsizem" id="contsizem" class="form-control form-control-sm"  value="<?=set_value('contsizem')?>"  >
                                      <input type="hidden" name="conttypem" id="conttypem" class="form-control form-control-sm" value="<?=set_value('conttypem')?>"  >
                                      
                                      </div>
                                    </div>
                                  </div>
                                </div>




                                <div class="row">
                                  <div class="col-12 col-md-12 form-group row">
                                    <label class="col-sm-4 col-form-label not-bold">DO Number</label>
                                    <div class="col-sm-7">
                                      
                                      <input type="text" name="donumberfeederbaru" id="donumberfeederbaru" class="form-control form-control-sm" placeholder="DO Number Feeder" value="" required >
                                    
                                      
                                      
                                    </div>
                                  </div>
                                </div>





                            </div>
                    </div> <!-- /.col -->


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
                                        <!--  <input type="text" name="feedercode" id="feedercode" class="form-control form-control-sm" placeholder="feedercode" required value="<?php echo $feedercode ?>" > -->                               
                                      <select name="feedercode" id="feedercode" class="form-control form-control-sm">
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
                                       <input type="text" name="origin" id="origin" class="form-control form-control-sm" placeholder="origin" required value="<?php echo $origin ?>" > 
                                      <!-- 
                                       <select name="origin" id="origin" class="form-control form-control-sm">
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
                                         </select> -->
                                      
                                      </div>
                                  </div>
                                </div>

                                <div class="row upp"> 
                                  <div class="col-12 col-md-12 form-group row">
                                    <label class="col-sm-4 col-form-label not-bold">Destination</label>
                                      <div class="col-sm-7">

                                     <input id="dest" name="dest" type="text" class="form-control" value="<?=set_value('dest')?>" placeholder="dest">

                                      
                                      
                                      </div>
                                  </div>
                                </div>

                                <div class="row upp"> 
                                  <div class="col-12 col-md-12 form-group row">
                                    <label class="col-sm-4 col-form-label not-bold">Vessel Name</label>
                                      <div class="col-sm-7">
                                      <input type="text" name="vesselname" id="vesselname" class="form-control form-control-sm" placeholder="vesselname" required value="<?php echo $vesselname ?>" >
                                      </div>
                                  </div>
                                </div>

                                <div class="row upp"> 
                                  <div class="col-12 col-md-12 form-group row">
                                    <label class="col-sm-4 col-form-label not-bold">Voyage</label>
                                      <div class="col-sm-7">
                                      <input type="text" name="voyage" id="voyage" class="form-control form-control-sm" placeholder="voyage" required value="<?php echo $voyage ?>" >
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
                                        <input class="form-control form-control-sm datetimepicker-input" data-target="#etd" name="etd" id="etdVal" data-toggle="datetimepicker" value="<?php echo $etd ?>" autocomplete="off" required>
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
                                        <input class="form-control form-control-sm datetimepicker-input" data-target="#eta" name="eta" id="etaVal" data-toggle="datetimepicker" value="<?php echo $eta ?>" autocomplete="off" required>
                                        <div class="input-group-text" data-target="#eta" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                                      </div>
                                      </div>
                                  </div>
                                </div>

                                <div class="row upp"> 
                                  <div class="col-12 col-md-12 form-group row">
                                    <label class="col-sm-4 col-form-label not-bold">Berthing Date</label>
                                      <div class="col-sm-7">
                                      <div class="input-group date" id="berthdate" data-target-input="nearest">
                                        <input class="form-control form-control-sm datetimepicker-input" data-target="#berthdate" name="berthdate" id="berthdateVal" data-toggle="datetimepicker" value="<?php echo $berthdate ?>" autocomplete="off" required >
                                        <div class="input-group-text" data-target="#berthdate" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                                      </div>
                                      </div>
                                  </div>
                                </div>

                                <div class="row upp"> 
                                  <div class="col-12 col-md-12 form-group row">
                                    <label class="col-sm-4 col-form-label not-bold">Remarks</label>
                                      <div class="col-sm-7">
                                      <textarea name="remarks" id="remarks" class="form-control form-control-sm"></textarea>
                                      </div>
                                  </div>
                                </div>

                            </div>
                        </div> <!-- /.col -->
                      </div>   <!-- /.ROW -->



                </div>
              <div class="modal-footer justify-content-between">
                <button class="btn btn-default" data-dismiss="modal" aria-hidden="true">Cancel</button>
              <!--   <button type="button" class="btn btn-primary " onclick="EntryFeeder('update')"><i class="fa fa-file-alt"></i></button> -->
                <button class="btn btn-info" onclick="EntryFeeder('update')">Save</button>
              </div>
            </form>   
          </div>
        </div>
    </div>



















        <!--END MODAL ADD BARANG-->


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
            <a href="<?=site_url($urlDel)?>" class="btn btn-danger">Delete</a>
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

  

    <script>
    $('#doTable').DataTable();
    $("#doCall").click(function(){
      $('#modalDo').modal('show');
    });
    $("#findFeeder").click(function(){
      $('#modalFeeder').modal('show');
      //alert('FEEDER SCHEDULE');
    });
    $("#submitBtn").click(function(){

      var releasenumber = $("#releasenumber").val();
      var releasedate = $("#releasedateVal").val();
      var expiredate = $("#expiredateVal").val();
      var donumber = $("#donumber").val();
      
      var feedercode = $("#feedercode").val();
      var vesselcode = $("#vesselcode").val();
      var vesselname = $("#vesselname").val();
      var voyage = $("#voyage").val();
      var etd = $("#etdVal").val();
      var eta = $("#etaVal").val();
      var berthdate = $("#berthdateVal").val();

      if (releasenumber == "") {
        alert('releasenumber tidak boleh kosong');
        $("#releasenumber").focus();
        return;
      }
      if (releasedate == "") {
        alert('releasedate tidak boleh kosong');
        $("#releasedateVal").focus();
        return;
      }

      if (expiredate == "") {
        alert('expiredate tidak boleh kosong');
        $("#expiredateVal").focus();
        return;
      }
      if (donumber == "") {
        alert('donumber tidak boleh kosong');
        $("#donumber").focus();
        return;
      }

      var contqtyasg = document.getElementsByClassName("contqtyasg");
      for(var i=0; i<contqtyasg.length; i++) {
          if(contqtyasg[i].value == ""){
            alert("contqtyasg tidak boleh kosong");
            contqtyasg[i].focus();
            return;
          }
      }

      if (feedercode == "") {
        alert('feedercode tidak boleh kosong');
        $("#feedercode").focus();
        return;
      }
     /*  if (vesselcode == "") {
        alert('vesselcode tidak boleh kosong');
        $("#vesselcode").focus();
        return;
      } */
      if (vesselname == "") {
        alert('vesselname tidak boleh kosong');
        $("#vesselname").focus();
        return;
      }
      if (voyage == "") {
        alert('voyage tidak boleh kosong');
        $("#voyage").focus();
        return;
      }
      if (etd == "") {
        alert('etd tidak boleh kosong');
        $("#etdVal").focus();
        return;
      }
      if (eta == "") {
        alert('eta tidak boleh kosong');
        $("#etaVal").focus();
        return;
      }
      if (berthdate == "") {
        alert('berthdate tidak boleh kosong');
        $("#berthdateVal").focus();
        return;
      }

      $('#modalSubmit').modal('show');

    });
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


    function updateData(lingrid, type){
       //alert('haha');

        var lingrid = lingrid;
       // alert(lingrid);
      
        if(type == "hapus"){
          var r = confirm("Do you want to delete this data?");
          if (r == true) {
                
            $.post("<?=site_url('assignfeeder/hapusdetailasgnfeeder')?>",
              {
                lingrid : lingrid
              },
              function(data, status){
                var res = data.split("++");
                if (res[0] == 'sukses') {
                    toastr.error(res[1]);
                    $(this).parents('tr').detach();
                    window.location.href = '<?=site_url($urlrefresh)?>';

                }else{
                    toastr.warning('error');
                    console.log(data);
                }
              });

          } else {
            
          }
        }







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




    $('#modal_add_new').on('show.bs.modal', function(e, id) {
    var id =1;
    var lingridcondetailm = $(e.relatedTarget).data('lingridcondetailm');
    var requestnom = $(e.relatedTarget).data('requestnom');
    var donumberm = $(e.relatedTarget).data('donumberm');
    var dodatem = $(e.relatedTarget).data('dodate');
    var dest = $(e.relatedTarget).data('dest');
    var qtyasal = $(e.relatedTarget).data('qtyasal');
    var contqtyasg = $(e.relatedTarget).data('contqtyasg');
    var contsizem = $(e.relatedTarget).data('contsizem');
    var conttypem = $(e.relatedTarget).data('conttypem');


     /*alert(dodatem);
    alert(lingridcondetailm);
    alert(requestnom);
    alert(donumberm); */
   

    $('#lingridcondetailm').val(lingridcondetailm);
    $('#requestnom').val(requestnom);
    $('#donumberm').val(donumberm);
    $('#dest').val(dest);
    $('#qtyasal').val(qtyasal);
    $('#contqtyasgm').val(contqtyasg);
    $('#dodatem').val(dodatem);
    $('#contsizem').val(contsizem);
    $('#conttypem').val(conttypem);
  
   // $('#jumlahtotalqty').val(jumlahtotalqty);
    //$(e.currentTarget).find('input[name="user_id"]').val(userid);
});


    </script>
