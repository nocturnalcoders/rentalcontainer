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
$portdest= "";
$statusF= "";
$picrequest= "";
$requestdatefrom= "";
$requestdateto = "";
$reqstatus="";
$donumber="";


if (!empty($search['requestno'])) {
    $requestno= $search['requestno'];
}
if (!empty($search['statusF'])) {
  $statusF= $search['statusF'];

  if ($statusF == '0') {
    $statusF = '2' ;
    }
}
if (!empty($search['divbran'])) {
    $divbran= $search['divbran'];
}
if (!empty($search['portdest'])) {
  $portdest= $search['portdest'];
}

if (!empty($search['picrequest'])) {
    $picrequest= $search['picrequest'];
}

if (!empty($search['requestdatefrom'])) {
    $requestdatefrom = $search['requestdatefrom'];
}

if (!empty($search['requestdateto'])) {
    $requestdateto = $search['requestdateto'];
}

if (!empty($search['donumber'])) {
  $donumber = $search['donumber'];
}



if ($this->fungsi->user_login()->level == 2) { 

  $divbran =  $this->fungsi->user_login()->divbran;
  //$portdest =  $this->fungsi->user_login()->location;
  //$picrequest =  $this->fungsi->user_login()->name;
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
                  <div class="col-8">
                    <h3>
                    Request Empty Container / FreeUse - Domestics
                    </h3>
                  </div>
                  <div class="col-4">
                    <div class="float-sm-right">
                    <a href="<?=site_url('reqempty/add')?>" class="btn btn-info btn-flat">
                      <i class="fa fa-plus"></i> Create New
                    </a>
                </div>
                </div>
                </div>




              
           <form action="<?=site_url('reqempty/cari')?>" method="post">
              <div class="row">
              <div class="col-md-7">
                    <div class="callout callout-info bott">
                
                    <div class="row">
                      <div class="col-12 col-md-12 form-group row">
                        <label class="col-sm-4 col-form-label not-bold">Request No</label>
                        <div class="col-sm-7">
                             <input type="text" name="requestno" class="form-control form-control-sm" placeholder="Request No" value="<?php echo $requestno ?>">
                        </div>
                      </div>
                    </div>

                    <div class="row upp">
                       <div class="col-12 col-md-12 form-group row">
                         <label class="col-sm-4 col-form-label not-bold">Request Date From</label>
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
                        <label class="col-sm-3 col-form-label not-bold" ></label>
                        <div class="col-sm-9">
                          
                        </div>
                      </div>
                    </div>  
                    
                    
                  <div class="row upp">
                      <div class="col-12 col-md-12 form-group row">
                        <label class="col-sm-5 col-form-label not-bold">Division / Branch</label>
                        <div class="col-sm-5">
                        <!--   <input type="text" name="divbran" class="form-control form-control-sm" placeholder="Division / Branch" value="<?php echo $divbran ?>">
                         -->
                         <?php
                         if ($this->fungsi->user_login()->level == 2) {  
                          ?>
                           <input type="text" name="divbran" class="form-control form-control-sm" value="<?php echo $divbran ?>" readonly>
                         
                          <?php
                            } else {  
                          ?>
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
                        <?php
                            } ?>
                        
                        </div>
                      </div>
                      </div>

             
                      <div class="row upp">
                        <div class="col-12 col-md-12 form-group row">
                          <label class="col-sm-5 col-form-label not-bold">Destination</label>
                            <div class="col-sm-5">
                                <?php
                                  if ($this->fungsi->user_login()->level == 1) {  
                                    ?>
                                    <input type="text" name="portdest" class="form-control form-control-sm" value="<?php echo $portdest ?>" readonly>
                                  
                                    <?php
                                      } else {  
                                    ?>
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
                                  <?php
                                 } ?>
                            </div>
                        </div>
                      </div>     

                      <div class="row upp">
                        <div class="col-12 col-md-12 form-group row">
                          <label class="col-sm-5 col-form-label not-bold">Status</label>
                            <div class="col-sm-5">
                              <input type="hidden" name="picrequest" class="form-control form-control-sm" placeholder="PIC Request" value="<?php echo $statusF ?>">
                              <select name="statusF" id="statusF" class="form-control form-control-sm">
                              <option value='' <?php echo  $statusF == '' ? 'selected' : '' ?>>- All -</option> 
                                <option value='2' <?php echo  $statusF == '2' ? 'selected' : '' ?>>Pending</option>
                                <option value='1' <?php echo  $statusF == '1' ? 'selected' : '' ?>>Approved</option>
                              </select>
                            
                            </div>
                        </div>
                      </div> 
                      <div class="row upp">
                           <div class="col-12 col-md-12 form-group row">
                           <label class="col-sm-5 col-form-label not-bold"> DO Number</label>
                            <div class="col-sm-5">
                            <input type="text" name="donumber" class="form-control form-control-sm" placeholder="DO Number" value="<?php echo $donumber ?>">
                            </div>
                          </div>
                        </div>   

           
  
                </div>
                
               </div> <!-- /.col -->        
                                  
               </div>
            </form> 
          </div>  <!-- /.card-header -->


              <div class="card-body upp">
                <table id="noSearch" class="table table-sm table-hover table-bordered">
                    <thead class="bg-info"> 
                        <tr> 
                            <th>#</th>
                            <th>Request No</th>
                            <th>Request Date</th>
                            <th>Division/Branch</th>
                            <th>Destination</th>
                            <th>Container Detail Request</th>
                            <th>Box Owner</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                       // print_r($row->result());
                        foreach($row->result() as $key => $data) {
                          $requestno = $data->requestno;
                          ?>
                        <tr> 
                            <td style="width:5%;"><?=$no?></td>
                            <td><a href="<?=site_url('reqempty/edit/')?><?php echo str_replace("/","@",$requestno) ?>"><?=$data->requestno?></a></td>
                            <td><?=$data->requestdate?></td>
                            <td><?=$data->divbran?></td>
                            <td><?=$data->portdest?></td>
                            <td>
                                          
                         
                              <table id="noSearch" class="table table-sm table-hover table-bordered">
                                    <thead class="bg-success"> 
                                        <tr> 
                                            <!-- <th>Request No</th> -->
                                            <th>Quantity</th>
                                            <th>Size</th>
                                            <th>Type</th>
                                            <th>Grade</th>
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
                                           
                                              foreach($this->fungsi->cari_detail_container_request($data->requestno)['detailRowF'] as $keyF) 
                                              {
                                               // echo $keyF['requestno']. '<br>';    
                                                $requestnoF  = $keyF['requestno']  ;                  
                                            ?>

                                        <tr> 
                                            <!-- <td><?=$keyF['requestno']?></td> -->
                                            <td><?=$keyF['contqty']?></td>
                                            <td><?=$keyF['contsize']?></td>
                                            <td><?=$keyF['conttype']?></td>
                                            <td><?=$keyF['contgrade']?></td>
                                        </tr>
                                        <?php                                 
                                        } 
                                        ?>
                                    </tbody>
                              </table>
                            </td>
                            <td><?=$data->boxowner?></td>
                            <td><?php  if($data->reqstatus == 0) 
                                { echo "Pending" ; } 
                                else  { echo "Approved" ; 
                                        echo "<br>";
                                        echo  "DO# : " ;
                                ?>
                                <a href="<?=site_url('reqempty/edit/')?><?php echo str_replace("/","@",$requestno) ?>"><?=$data->donumber?></a>
                                <?php } ?>
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
