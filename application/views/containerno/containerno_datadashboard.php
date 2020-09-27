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


$containerno="";
$donumber= $search;

if (!empty($search['containerno'])) {
    $containerno= $search['containerno'];
}

if (!empty($search['donumber'])) {
  $donumber= $search['donumber'];
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
                      Containers List - <a href="#"><?=$donumber?></a> 
                    </h3>
                  </div>
                  <div class="col-6">
                    <div class="float-sm-right">
               
                </div>
                  </div>
                </div>

              

                </div>
              <!-- /.card-header -->
              <div class="card-body upp">
                <table id="noSearch" class="table table-sm table-hover table-bordered">
                    <thead class="bg-info"> 
                        <tr> 
                            <th>#</th>
                            <th>Container No</th>
                            <th>Size</th>
                            <th>Type</th>
                            <th>DO Number</th>
                            <th>Box Owner</th>
                            <th>Location</th>
                            <th>Depo Name</th>
                            <th>Status</th>
                            <th>Depo Out Date</th>
                            <th>Sailing Date</th>
                            <th>Arrival Date</th>
                            <th>In Depo Date</th>
                            <th>Export Date</th>
                            <th>Days Usage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $no = 1;
                        foreach($row->result() as $key => $data) {
                          $containerno = $data->containerno;
                          ?>
                        <tr> 
                            <td style="width:5%;"><?=$no?></td>
                            <td><a href="#"><?=$data->containerno?></a></td>
                            <td><?=$data->size?></td>
                            <td><?=$data->type?></td>
         
                            <td><a href="#"><?=$data->donumber?></a></td>
                            <td><?=$data->boxowner?></td>
                            <td><?=$data->location?></td>
                            <td><?=$data->depocode?></td>
                            <td><?=$data->status?></td>
                            <td><?=$data->statusoutdate?></td>
                            <td><?=$data->statussailingdate?></td>
                            <td><?=$data->statusarrivaldate?></td>
                            <td><?=$data->statusindate?></td>
                            <td><?=$data->statusexportdate?></td>
                            <td><?php if (isset($data->selisih)) {
                                    echo $data->selisih .' '.'Days'; 
                             } else { echo '0 Days'; }
                            ?></td>
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

