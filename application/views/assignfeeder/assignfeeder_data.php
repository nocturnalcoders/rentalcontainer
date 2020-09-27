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
$picrequest= "";
$portdest= "";
$requestdatefrom= "";
$requestdateto = "";
$reqstatus = "";

$releasenumber= "";
$divbran= "";
$releasedatefrom= "";
$releasedateto= "";
$donumber="";
$dodate="";
$picrequest= "";
$feedercode = "";
$vesselcode = "";
$vesselname= "";
$voyage= "";
$etd= "";
$eta = "";
$berthdate= "";
$remarks= "";


if (!empty($search['releasenumber'])) {
    $releasenumber= $search['releasenumber'];
}

if (!empty($search['divbran'])) {
    $divbran= $search['divbran'];
}

if (!empty($search['requestdatefrom'])) {
    $requestdatefrom= $search['requestdatefrom'];
}

if (!empty($search['requestdateto'])) {
    $requestdateto= $search['requestdateto'];
}

if (!empty($search['donumber'])) {
    $donumber= $search['donumber'];
}

if (!empty($search['dodate'])) {
    $dodate= $search['dodate'];
}

if (!empty($search['picrequest'])) {
    $picrequest= $search['picrequest'];
}

if (!empty($search['portdest'])) {
  $portdest= $search['portdest'];
}



if (!empty($search['feedercode'])) {
    $feedercode= $search['feedercode'];
}

if (!empty($search['vesselcode'])) {
    $vesselcode= $search['vesselcode'];
}

if (!empty($search['vesselname'])) {
    $vesselname= $search['vesselname'];
}

if (!empty($search['voyage'])) {
    $voyage= $search['voyage'];
}

if (!empty($search['etd'])) {
    $etd= $search['etd'];
}

if (!empty($search['eta'])) {
    $eta= $search['eta'];
}

if (!empty($search['berthdate'])) {
    $berthdate= $search['berthdate'];
}

if (!empty($search['remarks'])) {
    $remarks= $search['remarks'];
}

if (!empty($search['reqstatus'])) {
  $reqstatus= $search['reqstatus'];
          
  if ($reqstatus == '0') {
    $reqstatus = '2' ;
}
}

 ?>


    <!-- Main content -->
    <section class="content" style="margin-top: 10px;">
      <!-- <div class="container-fluid"> -->
        <div class="row">
          <div class="col-12">
            <div class="card card-outline card-info">
              <div class="card-header">
                <div class="row">
                  <div class="col-6">
                    <h3>
                      Assign Feeder
                    </h3>
                  </div>
                  <div class="col-6">
                    <!-- div class="float-sm-right">
                      <a href="<?=site_url('assignfeeder/add')?>" class="btn btn-info btn-flat">
                        <i class="fa fa-plus"></i> Create New
                     </a>
                   </div> -->
                </div>
                </div>




              
                <form action="<?=site_url('assignfeeder/cari')?>" method="post">
                  <div class="row">
                  <div class="col-md-7">
                        <div class="callout callout-info bott">

                        <div class="row upp">
                           <div class="col-12 col-md-12 form-group row">
                           <label class="col-sm-5 col-form-label not-bold"> </label>
                            <div class="col-sm-5">
                           
                            </div>
                          </div>
                        </div>   
                        <div class="row upp">
                           <div class="col-12 col-md-12 form-group row">
                           <label class="col-sm-5 col-form-label not-bold"> </label>
                            <div class="col-sm-5">
                           
                            </div>
                          </div>
                        </div>   

                        <div class="row upp">
                          <div class="col-12 col-md-12 form-group row">
                            <label class="col-sm-4 col-form-label not-bold">DO Number</label>
                            <div class="col-sm-7">
                               <!--  <input type="text" name="requestno" class="form-control form-control-sm" placeholder="Request No" value="<?php echo $requestno ?>"> -->
                               <input type="text" name="donumber" class="form-control form-control-sm" placeholder="DO Number" value="<?php echo $donumber ?>">
                            </div>
                          </div>
                        </div>

                        <div class="row upp">
                          <div class="col-12 col-md-12 form-group row">
                            <label class="col-sm-4 col-form-label not-bold">DO Date From</label>
                            <div class="col-sm-3">
                              <div class="input-group date" id="requestdatefrom" data-target-input="nearest">
                                <input class="form-control form-control-sm datetimepicker-input" data-target="#requestdatefrom" name="requestdatefrom" id="requestdateValfrom" data-toggle="datetimepicker" value="<?php echo $requestdatefrom ?>" autocomplete="off">
                                <div class="input-group-text" data-target="#requestdatefrom" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                            <label class="col-sm-1 col-form-label not-bold">To</label>
                            <div class="col-sm-3">
                            <div class="input-group date" id="requestdateto" data-target-input="nearest">
                                <input class="form-control form-control-sm datetimepicker-input" data-target="#requestdateto" name="requestdateto" id="requestdateValto" data-toggle="datetimepicker" value="<?php echo $requestdateto ?>" autocomplete="off">
                                <div class="input-group-text" data-target="#requestdateto" data-toggle="datetimepicker"><i class="fa fa-calendar"></i></div>
                              </div>
                            </div>
                          </div>
                        </div>

                     
                        <div class="row upp">
                           <div class="col-12 col-md-12 form-group row">
                           <label class="col-sm-5 col-form-label not-bold"> </label>
                            <div class="col-sm-5">
                           
                            </div>
                          </div>
                        </div>   
                         
  
                        <div class="row upp">
                           <div class="col-12 col-md-12 form-group row">
                           <label class="col-sm-5 col-form-label not-bold"> </label>
                            <div class="col-sm-5">
                           
                            </div>
                          </div>
                        </div>   


                        <div class="row upp">
                        <div class="col-7 col-md-4">
                          <button class="btn btn-success btn-flat">
                            <i class="fa fa-search"></i> Search
                          </button>
                        </div>
                      </div>
                  
                    </div>
                  </div> <!-- /.col -->



                  <div class="col-md-5">
                  <div class="callout callout-info bott">     

                         <div class="row upp">
                           <div class="col-12 col-md-12 form-group row">
                           <label class="col-sm-5 col-form-label not-bold"> </label>
                            <div class="col-sm-5">
                           
                            </div>
                          </div>
                        </div>   

                        
                      <div class="row upp">
                          <div class="col-12 col-md-12 form-group row">
                            <label class="col-sm-5 col-form-label not-bold">Division / Branch</label>
                            <div class="col-sm-5">
                            <!--   <input type="text" name="divbran" class="form-control form-control-sm" placeholder="Division / Branch" value="<?php echo $divbran ?>">
                            -->
                            
                              <select name="divbran" id="divbran" class="form-control form-control-sm">
                              <option value="">- All -</option>
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
                            
                            
                            </div>
                          </div>
                          </div>


                          <div class="row upp">
                          <div class="col-12 col-md-12 form-group row">
                            <label class="col-sm-5 col-form-label not-bold">Destination</label>
                            <div class="col-sm-5">
                                <select name="portdest" id="portdest" class="form-control form-control-sm">
                                    <option value="">- All -</option>
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
                           <div class="col-12 col-md-12 form-group row">
                           <label class="col-sm-5 col-form-label not-bold"> </label>
                            <div class="col-sm-5">
                           <!--  <input type="text" name="donumber" class="form-control form-control-sm" placeholder="DO Number" value="<?php echo $donumber ?>"> -->
                            </div>
                          </div>
                        </div>   



                        <div class="row upp">
                           <div class="col-12 col-md-12 form-group row">
                           <label class="col-sm-5 col-form-label not-bold"> </label>
                            <div class="col-sm-5">
                           
                            </div>
                          </div>
                        </div>   

                        <div class="row upp">
                           <div class="col-12 col-md-12 form-group row">
                           <label class="col-sm-5 col-form-label not-bold"> </label>
                            <div class="col-sm-5">
                           
                            </div>
                          </div>
                        </div>   

                        <div class="row upp">
                           <div class="col-12 col-md-12 form-group row">
                           <label class="col-sm-5 col-form-label not-bold"> </label>
                            <div class="col-sm-5">
                           
                            </div>
                          </div>
                        </div>   

                        <div class="row upp">
                           <div class="col-12 col-md-12 form-group row">
                           <label class="col-sm-5 col-form-label not-bold"> </label>
                            <div class="col-sm-5">
                           
                            </div>
                          </div>
                        </div>   
                  
                    </div>
                    
                  </div> <!-- /.col -->        
                                      
                  </div>
                </form> 

                </div>
              
              
              
              
              
              
              
               <!-- /.card-header -->


               <div class="card-body upp">
                <table id="noSearch" class="table table-sm table-hover table-bordered">
                    <thead class="bg-info"> 
                        <tr> 
                            <th>#</th>
                            <th>Request Number</th>
                            <th>DO Number</th>
                            <th>DO Date</th>
                            <th>DO Expired Date</th>
                            <th>Destination</th>
                            <th>Status</th>
                            <th></th>
<!--                             <th>Division/Branches</th>
                            <th>Container Detail Request</th>
                            <th>DO Number</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($row->result() as $key => $data) {
                         // $requestno = $data->requestno;
                          ?>
                        <tr> 
                            <td style="width:5%;"><?=$no?></td>
                            <td><?=$data->requestno?></td>
                            <td><a href="<?=site_url('assignfeeder/asgnfeeder/')?><?php echo str_replace("/","@",$data->donumber) ?>"><?=$data->donumber?></a></td>                          
                            <td><?=$data->dodate?></td>
                            <td><?=$data->doexpiredate?></td>
                            <td><?=$data->portdest?></td>
                            <td> <?php
                             if($data->reqstatus == 1) {
                                echo "Approved";
                              } else {
                                echo "Active";
                              }
                              ?>
                            </td>
                            <td>
                            
                            
                            <!-- <table id="noSearch" class="table table-sm table-hover table-bordered">
                                    <thead class="bg-success"> 
                                        <tr> 
                                            <th>Request No</th> 
                                            <th>Quantity</th>
                                            <th>Size</th>
                                            <th>Type</th>
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
                                           
                                             // foreach($this->fungsi->cari_detail_container_request($data->requestno)['detailRowF'] as $keyF) 
                                           //   {
                                               // echo $keyF['requestno']. '<br>';    
                                            //    $requestnoF  = $keyF['requestno']  ;                  
                                            ?>

                                        <tr> 
                                           <td><?=$keyF['requestno']?></td> 
                                            <td><?=$keyF['contqty']?></td>
                                            <td><?=$keyF['contsize']?></td>
                                            <td><?=$keyF['conttype']?></td>
                                        </tr>
                                        <?php                                 
                                        //} 
                                        ?>
                                    </tbody>
                              </table> -->
                            
                            
                            </td>
                           
                             
                        </tr>
                        <?php 
                        $no++;
                        } 
                        ?>
                    </tbody>
                </table>
              </div> <!-- /.card-body -->      
            </div>  <!-- /.card -->          
          </div><!-- /.col -->
        </div> <!-- /.row -->
      <!-- </div> -->
    </section><!-- /.content -->
<script type="text/javascript">
  $('#requestdatefrom').datetimepicker({
      format: 'L',
      <?php 
        if ($requestdatefrom != "") {
      ?>
      date:'<?php echo date("m/d/Y", strtotime($requestdatefrom)); ?>',
      <?php
        }
      ?>
  });

  $('#requestdateto').datetimepicker({
      format: 'L',
      <?php 
        if ($requestdateto != "") {
      ?>
      date:'<?php echo date("m/d/Y", strtotime($requestdateto)); ?>',
      <?php
        }
      ?>
  });
</script>
