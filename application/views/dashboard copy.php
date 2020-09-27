<?php

//buat chart
//1. copy script php query
//2. copy script HTML
//3. copy script jquery

//=======================================
//1.PHP QUERY --> t_boxops --> UNTUK CHART UTAMA

$t_boxops_date = "";
$bulan="";
$tahun ="";
$t_boxops_date_arr  = array();
$t_boxops_divbran_date_arr = array();

// $t_boxops_salesqty = "";
// $t_boxops_salesqty_arr = array();

$t_boxops_jmlcont20 = "";
$t_boxops_jmlcont40 = "";
$t_boxops_jmlconttotal = "";
$t_boxops_jmlcont20_arr = array();
$t_boxops_jmlcont40_arr =array();
$t_boxops_jmlconttotal_arr =array();



foreach ($t_boxops as $key => $val) {
    
   // echo $val['bulan'];
    if ($val['bulan'] == '1') {
        $bulan = "Jan";
    } elseif ($val['bulan'] == '2') {
        $bulan = "Feb";
    } elseif ($val['bulan'] == '3') {
        $bulan = "Mar";
    } elseif ($val['bulan'] == '4') {
        $bulan = "Apr";
    } elseif ($val['bulan'] == '5') {
        $bulan = "May";
    } elseif ($val['bulan'] == '6') {
        $bulan = "Jun";
    } elseif ($val['bulan'] == '7') {
        $bulan = "Jul";
    } elseif ($val['bulan'] == '8') {
        $bulan = "Aug";
    } elseif ($val['bulan'] == '9') {
        $bulan = "Sep";
    } elseif ($val['bulan'] == '10') {
        $bulan = "Oct";
    } elseif ($val['bulan'] == '11') {
        $bulan = "Nov";
    } elseif ($val['bulan'] == '12') {
        $bulan = "Dec";
    }else
    {
        $bulan = $val['bulan'];
    }
    $t_boxops_date .= "'".$bulan." ";
    $t_boxops_date .= "',";
    $tahun = $val['tahun'];

        
    // $t_boxops_salesqty .= "".$val['qty'].",";
    // $t_boxops_salesqty_arr[] = $val['qty'];

    $t_boxops_jmlcont20  .= "".$val['jmlcont20'].",";
    $t_boxops_jmlcont20_arr[] = $val['jmlcont20'];

    $t_boxops_jmlcont40  .= "".$val['jmlcont40'].",";
    $t_boxops_jmlcont40_arr[] = $val['jmlcont40'];


    $t_boxops_jmlconttotal  .= "".$val['jmlconttotal'].",";
    $t_boxops_jmlconttotal_arr[] = $val['jmlconttotal'];

    $t_boxops_date = "'".$bulan." - ";
    $t_boxops_date .= $val['tahun']."',";

    $t_boxops_date_arr[] = $t_boxops_date;



}
// [30, 50, 20, 39, 96, 47, 110,]
$bulanTop = $bulan;
$t_boxops_date = rtrim($t_boxops_date, ",");
$t_boxops_date_has = rtrim(implode(" ",array_unique($t_boxops_date_arr)), ",");
  
//$t_boxops_salesqty = rtrim($t_boxops_salesqty, ",");

$t_boxops_jmlcont20  = rtrim($t_boxops_jmlcont20, ",");
$t_boxops_jmlcont40  = rtrim($t_boxops_jmlcont40, ",");
$t_boxops_jmlconttotal  = rtrim($t_boxops_jmlconttotal, ",");


// END OF 1.PHP QUERY  t_boxops
//=======================================





    //=======================================
    //1.PHP QUERY --> $t_boxops_divbran --> UNTUK STACKED BAR
    //=======================================

    $t_boxops_divbran_division = "";
    $t_boxops_divbran_division_arr = array();
    

    $t_boxops_divbran_jmlcont20 = "";
    $t_boxops_divbran_jmlcont20_arr = array();
    $t_boxops_divbran_jmlcont40 = "";
    $t_boxops_divbran_jmlcont40_arr =array();
    $t_boxops_divbran_jmlconttotal = "";
    $t_boxops_divbran_jmlconttotal_arr =array();


    $t_boxops_divbran_jmlconttotal_gtnsrg = "";
    $t_boxops_divbran_jmlconttotal_gtnbdj = "";
    $t_boxops_divbran_jmlconttotal_gtnbtm = "";
    $t_boxops_divbran_jmlconttotal_gtnlam = "";
    $t_boxops_divbran_jmlconttotal_gpildps = "";
    $t_boxops_divbran_jmlconttotal_gtnplm = "";
    $t_boxops_divbran_jmlconttotal_gtnpnk = "";
    $t_boxops_divbran_jmlconttotal_gtnmes = "";
    $t_boxops_divbran_jmlconttotal_gpilbpn = "";
    $t_boxops_divbran_jmlconttotal_gpilsby = "";
    $t_boxops_divbran_jmlconttotal_gtnmac = "";
    $t_boxops_divbran_jmlconttotal_gtnjkt = "";


    $t_boxops_divbran_jmlconttotal_gtnsrg_arr = array();
    $t_boxops_divbran_jmlconttotal_gtnbdj_arr = array();
    $t_boxops_divbran_jmlconttotal_gtnbtm_arr = array();
    $t_boxops_divbran_jmlconttotal_gtnlam_arr = array();
    $t_boxops_divbran_jmlconttotal_gpildps_arr = array();
    $t_boxops_divbran_jmlconttotal_gtnplm_arr = array();
    $t_boxops_divbran_jmlconttotal_gtnpnk_arr = array();
    $t_boxops_divbran_jmlconttotal_gtnmes_arr = array();
    $t_boxops_divbran_jmlconttotal_gpilbpn_arr = array();
    $t_boxops_divbran_jmlconttotal_gpilsby_arr = array();
    $t_boxops_divbran_jmlconttotal_gtnmac_arr = array();
    $t_boxops_divbran_jmlconttotal_gtnjkt_arr = array();



    




    foreach ($t_boxops_divbran as $key => $val) {
       // print_r( $val);


        if ($val['divbran'] == "GTN-SRG") {
            $t_boxops_divbran_jmlconttotal_gtnsrg .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnsrg_arr[] = $val['jmlconttotal'];
           
        }elseif ($val['divbran'] == "GTN-BDJ") {
            $t_boxops_divbran_jmlconttotal_gtnbdj .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnbdj_arr[] = $val['jmlconttotal'];      

        }elseif ($val['divbran'] == "GTN-BTH") {
            $t_boxops_divbran_jmlconttotal_gtnbtm .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnbtm_arr[] = $val['jmlconttotal'];

        }elseif ($val['divbran'] == "GTN-LAM") {
            $t_boxops_divbran_jmlconttotal_gtnlam .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnlam_arr[] = $val['jmlconttotal'];

        }elseif ($val['divbran'] == "GPIL-DPS") {
            $t_boxops_divbran_jmlconttotal_gpildps .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gpildps_arr[] = $val['jmlconttotal'];

        }elseif ($val['divbran'] == "GTN-PLM") {
            $t_boxops_divbran_jmlconttotal_gtnplm .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnplm_arr[] = $val['jmlconttotal'];

        }elseif ($val['divbran'] == "GTN-PNK") {
            $t_boxops_divbran_jmlconttotal_gtnptk .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnptk_arr[] = $val['jmlconttotal'];

        }elseif ($val['divbran'] == "GTN-MES") {
            $t_boxops_divbran_jmlconttotal_gtnmes .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnmes_arr[] = $val['jmlconttotal'];

        }elseif ($val['divbran'] == "GPIL-BPN") {
            $t_boxops_divbran_jmlconttotal_gpilbpn .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gpilbpn_arr[] = $val['jmlconttotal'];

        }elseif ($val['divbran'] == "GPIL-SUB") {
            $t_boxops_divbran_jmlconttotal_gpilsby .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gpilsby_arr[] = $val['jmlconttotal'];

        }elseif ($val['divbran'] == "GTN-MAC") {
            $t_boxops_divbran_jmlconttotal_gtnmac .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnmac_arr[] = $val['jmlconttotal'];

        }elseif ($val['divbran'] == "GTN-JKT") {
            $t_boxops_divbran_jmlconttotal_gtnjkt .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnjkt_arr[] = $val['jmlconttotal'];

        }


        $t_boxops_divbran_jmlconttotal .= "".$val['jmlconttotal'].",";
        $t_boxops_divbran_jmlconttotal_arr[] = $val['jmlconttotal'];
  



        if ($val['bulan'] == '1') {
            $bulan = "Jan";
        } elseif ($val['bulan'] == '2') {
            $bulan = "Feb";
        } elseif ($val['bulan'] == '3') {
            $bulan = "Mar";
        } elseif ($val['bulan'] == '4') {
            $bulan = "Apr";
        } elseif ($val['bulan'] == '5') {
            $bulan = "May";
        } elseif ($val['bulan'] == '6') {
            $bulan = "Jun";
        } elseif ($val['bulan'] == '7') {
            $bulan = "Jul";
        } elseif ($val['bulan'] == '8') {
            $bulan = "Aug";
        } elseif ($val['bulan'] == '9') {
            $bulan = "Sep";
        } elseif ($val['bulan'] == '10') {
            $bulan = "Oct";
        } elseif ($val['bulan'] == '11') {
            $bulan = "Nov";
        } elseif ($val['bulan'] == '12') {
            $bulan = "Dec";
        }else
        {
            $bulan = $val['bulan'];
        }

        $t_boxops_divbran_date = "'".$bulan." - ";
        $t_boxops_divbran_date .= $val['tahun']."',";

        $t_boxops_divbran_date_arr[] = $t_boxops_divbran_date;

        $t_boxops_divbran_division = "'".$val['divbran']."',";
        $t_boxops_divbran_division_arr[] =$t_boxops_divbran_division;


        
    }
    
    // untuk Bagian HORIZONTAL nya UNTUK YAL SALES PEROMANCE PER DIV BRANs//
    // [30, 50, 20, 39, 96, 47, 110,]
    $t_boxops_divbran_date_has = rtrim(implode(" ",array_unique($t_boxops_divbran_date_arr)), ",");
    // echo $t_boxops_divbran_date_has;
    //end of untuk garis HORIZONTAL // 


    // untuk Bagian HORIZONTAL nya/ -- UNTUK YANG CURRENT MONTH/
     $t_boxops_divbran_division_has = rtrim(implode(" ",array_unique($t_boxops_divbran_division_arr)), ",");
    //end of untuk garis HORIZONTAL // 
 //echo $t_boxops_divbran_division_has;

    //ini untuk bagian VERTICAL nya
    $t_boxops_divbran_jmlconttotal = rtrim($t_boxops_divbran_jmlconttotal, ",");
    //END OF ini untuk bagian VERTICAL nya

    //=======================================
    //END OF 1.PHP QUERY -->  $t_boxops_divbran   --> UNTUK STACKED BAR
    //=======================================







    //=======================================
    //1.PHP QUERY --> $t_boxops_movement--> UNTUK PIE
    //=======================================

    $t_boxops_movement_jmlcont = "";
    $t_boxops_movement_jmlcont_arr = array();
    $t_boxops_movement_movestatus = "";
    $t_boxops_movement_movestatus_arr = array();

    $t_boxops_movement_jmlcont_in = "";
    $t_boxops_movement_jmlcont_in_arr = array();
    $t_boxops_movement_jmlcont_out = "";
    $t_boxops_movement_jmlcont_out_arr = array();
    $t_boxops_movement_jmlcont_arrival = "";
    $t_boxops_movement_jmlcont_arrival_arr = array();
    $t_boxops_movement_jmlcont_sailing = "";
    $t_boxops_movement_jmlcont_sailing_arr = array();


    foreach ($t_boxops_movement as $key => $val) {
       // print_r( $val);


        if ($val['movestatus'] == "IN") {
            $t_boxops_movement_jmlcont_in .= "".$val['jmlcont'].",";
            $t_boxops_movement_jmlcont_in_arr[] = $val['jmlcont'];
           
        }elseif ($val['movestatus'] == "ARRIVAL") {
            $t_boxops_movement_jmlcont_out .= "".$val['jmlcont'].",";
            $t_boxops_movement_jmlcont_out_arr[] = $val['jmlcont'];

        }elseif ($val['movestatus'] == "OUT") {
            $t_boxops_movement_jmlcont_arrival .= "".$val['jmlcont'].",";
            $t_boxops_movement_jmlcont_arrival_arr[] = $val['jmlcont'];

        }elseif ($val['movestatus'] == "SAILING") {
            $t_boxops_movement_jmlcont_sailing .= "".$val['jmlcont'].",";
            $t_boxops_movement_jmlcont_sailing_arr[] = $val['jmlcont'];
        }

        $t_boxops_movement_jmlcont .= "".$val['jmlcont'].",";
        $t_boxops_movement_jmlcont_arr[] = $val['jmlcont'];
  
  
    }
    


    // untuk Bagian HORIZONTAL nya/ -- UNTUK YANG CURRENT MONTH/
    //ini untuk bagian VERTICAL nya
    $t_boxops_movement_jmlcont = rtrim($t_boxops_movement_jmlcont, ",");
    //END OF ini untuk bagian VERTICAL nya








    //=======================================
    //1.PHP QUERY --> $t_boxops_feeder--> UNTUK PIE
    //=======================================

    $t_boxops_feeder_jmlcont = "";
    $t_boxops_feeder_jmlcont_arr = array();
    $t_boxops_feeder_movestatus = "";
    $t_boxops_feeder_movestatus_arr = array();

    $t_boxops_feeder_jmlcont_ctp = "";
    $t_boxops_feeder_jmlcont_ctp_arr = array();
    $t_boxops_feeder_jmlcont_icon = "";
    $t_boxops_feeder_jmlcont_icon_arr = array();
    $t_boxops_feeder_jmlcont_spil = "";
    $t_boxops_feeder_jmlcont_spil_arr = array();
    $t_boxops_feeder_jmlcont_samudera = "";
    $t_boxops_feeder_jmlcont_samudera_arr = array();
    $t_boxops_feeder_jmlcont_meratus= "";
    $t_boxops_feeder_jmlcont_meratus_arr = array();
    $t_boxops_feeder_jmlcont_other = "";
    $t_boxops_feeder_jmlcont_other_arr = array();


    foreach ($t_boxops_feeder as $key => $val) {
       // print_r( $val);


        if ($val['feedercode'] == "CTP") {
             $t_boxops_feeder_jmlcont_ctp .= "".$val['jmlcont'].",";
             $t_boxops_feeder_jmlcont_ctp_arr[] = $val['jmlcont'];
           
        }elseif ($val['feedercode'] == "ICONLINE") {
            $t_boxops_feeder_jmlcont_icon .= "".$val['jmlcont'].",";
            $t_boxops_feeder_jmlcont_icon_arr[] = $val['jmlcont'];

        }elseif ($val['feedercode'] == "SPIL") {
            $t_boxops_feeder_jmlcont_spil .= "".$val['jmlcont'].",";
            $t_boxops_feeder_jmlcont_spil_arr[] = $val['jmlcont'];

        }elseif ($val['feedercode'] == "PPNP(SAMUDERA)") {
           $t_boxops_feeder_jmlcont_samudera .= "".$val['jmlcont'].",";
           $t_boxops_feeder_jmlcont_samudera_arr[] = $val['jmlcont'];
        }elseif ($val['feedercode'] == "MERATUS") {
            $t_boxops_feeder_jmlcont_meratus .= "".$val['jmlcont'].",";
            $t_boxops_feeder_jmlcont_meratus_arr[] = $val['jmlcont'];
        } else {
            $t_boxops_feeder_jmlcont_other .= "".$val['jmlcont'].",";
            $t_boxops_feeder_jmlcont_other_arr[] = $val['jmlcont'];
        }

        $t_boxops_feeder_jmlcont .= "".$val['jmlcont'].",";
        $t_boxops_feeder_jmlcont_arr[] = $val['jmlcont'];
  
  
    }
    


    // untuk Bagian HORIZONTAL nya/ -- UNTUK YANG CURRENT MONTH/
    //ini untuk bagian VERTICAL nya
    $t_boxops_feeder_jmlcont = rtrim($t_boxops_feeder_jmlcont, ",");
    //END OF ini untuk bagian VERTICAL nya




?>
<style type='text/css'>
  .my-legend .legend-title {
    text-align: left;
    margin-bottom: 8px;
    font-weight: bold;
    font-size: 90%;
    }
  .my-legend .legend-scale ul {
    margin: 0;
    padding: 0;
    float: left;
    list-style: none;
    font-size: 85%;
    color: #fff;
    }
  .my-legend .legend-scale ul li {
    display: block;
    float: left;
    width: 50px;
    margin-bottom: 6px;
    text-align: center;
    font-size: 85%;
    color: #fff;
    list-style: none;
    }
  .my-legend ul.legend-labels li span {
    display: block;
    float: left;
    height: 15px;
    width: 50px;
    color: #fff;
    }
  .my-legend .legend-source {
    font-size: 70%;
    color: #999;
    clear: both;
    }
  .my-legend a {
    color: #777;
    }
</style>

<section class="content-header">
      <div class="container-fluid">


            <!-- Small boxes (Stat box) -->
            <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo number_format(array_sum($t_boxops_jmlcont20_arr),0) ?></h3>

                <p>Boxes</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">Total Container Request 20'</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo number_format(array_sum($t_boxops_jmlcont40_arr),0) ?></h3>

                <p>Boxes</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">Total Container Request 40'</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo number_format(array_sum($t_boxops_jmlconttotal_arr),0) ?></h3>

                <p>Boxes</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">Total Boxes Request</a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>SPIL</h3>

                <p>1062 Boxes</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Top Feeder</a>
            </div>
          </div>
          <!-- ./col -->
        </div>




        <div class="row">  <!-- BUAT WOR DULU JANGAN LUPPAA -->
            <!-- =========MAIN CHART ==================  -->
            <!-- 2 . COPY HTML CHART (BAR, GARIS DLL)======================== -->
            <!-- =========MAIN CHART ==================  -->
            <section class="col-lg-12 connectedSortable">
            <div class="card">
                  <div class="card-header">
                      <h5 class="card-title">Monthly Recap Container Request Report </h5>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <div class="btn-group">
                          <button type="button" class="btn btn-tool" data-card-widget="remove">
                              <i class="fas fa-times"></i>
                          </button>

                        </div>
                      </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                      <div class="row">
                      <div class="col-md-8">
                          <p class="text-center">
                          <strong>Period: Jan - <?php echo $bulanTop  ."  ".  $tahun ; ?> </strong>
                          </p>
                          <div class="d-flex">
                    <p class="d-flex flex-column">
                      <!-- <span class="text-bold text-lg">820</span> -->
                      <span><b>Number Of Boxes</b></span>
                    </p>
            
                  </div>
                  <div class="chart">
                          <!-- Sales Chart Canvas -->
                          <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                          <!-- /.chart-responsive -->
            </div>

                      
                      <!-- /.col -->
                      <div class="col-md-3">
                          <p class="text-center">
                          <strong>Total Boxes Composition By Branches</strong>
                          </p>

                          <!--============Donut Chart ================-->

                          <div class="tab-content p-0">
                          <!-- Morris chart - Sales -->
                          <div class="chart tab-pane active" id="revenue-chart"
                              style="position: relative; height: 250px;">
                             <!--  <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>     --> 
                              <canvas id="sales-chart-canvasbranch" height="300" style="height: 300px;"></canvas>                   
                          </div>
                          </div>
                          <!-- End of Donut Chart -->
                      
                          

                      </div>
                      <div class="col-md-1">
                          <p class="text-center">
                          <strong></strong>
                          </p>
                          
                          <!--Legend -->

                          <div class="tab-content p-0">
                        
                          <div class='my-legend'>
                              <div class='legend-title'><br> <br></div>
                              <div class='legend-scale'>
                              <ul class='legend-labels'>
                                  <li><span style='background:#f39c12;'>SRG</span></li>
                                  <li><span style='background:#08AA4E;'>BDJ</span></li>
                                  <li><span style='background:#3ADF00;'>BTH</span></li>
                                  <li><span style='background:#7259DE;'>DPS</span></li>
                                  <li><span style='background:#886A08;'>PLG</span></li>
                                  <li><span style='background:#CBD6F8;'>LAM</span></li>
                                  <li><span style='background:#01A9DB;'>PNK</span></li>
                                  <li><span style='background:#D7DF01;'>BPN</span></li>
                                  <li><span style='background:#1B13F1;'>SUB</span></li>
                                  <li><span style='background:#ADFB07;'>MAC</span></li>
                                  <li><span style='background:#2D69A9;'>MES</span></li>
                                  <li><span style='background:#14AAA0;'>JKT</span></li>
                                <!-- <li><span style='background:#3ADF00;'>KAIs</span></li> -->
                              </ul>
                             
                          </div>

                      </div>
                          <!-- End of Donut Chart -->
                      
                          

                      </div>
                      </div>
                        <!-- /.col -->
                      
                      </div>
                      <!-- /.row -->
                  </div>
                  <!-- ./card-body -->
                  <div class="card-footer">
                      <div class="row">
                      <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                          <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 0%</span>
                          <h5 class="description-header"><?php echo number_format(array_sum($t_boxops_jmlcont20_arr),0) ?></h5>
                          <span class="description-text">TOTAL CONTAINER 20'</span>
                          </div>
                          <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                          <span class="description-percentage text-danger"><i class="fas fa-caret-left"></i> 0%</span>
                          <h5 class="description-header"><?php echo number_format(array_sum($t_boxops_jmlcont40_arr),0) ?></h5>
                          <span class="description-text">TOTAL CONTAINER 40'</span>
                          </div>
                          <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                          <span class="description-percentage text-warning"><i class="fas fa-caret-up"></i> 0%</span>
                          <h5 class="description-header"><?php echo number_format(array_sum($t_boxops_jmlconttotal_arr),0) ?></h5>
                          <span class="description-text">TOTAL BOXES</span>
                          </div>
                          <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 col-6">
                           <div class="description-block border-right">    
                             <canvas id="donutChart"  style="width: 75px; height: 75px; max-height: 100%; max-width: 100%;"></canvas>
                          </div>
                          <!-- /.card-body -->
                          <!-- /.description-block -->
                      </div>
                      <!-- /.row -->
                  </div>
                  <!-- /.card-footer -->
                  </div>
            </section>
          
          </div>  

          <div class="row">
            <section class="col-lg-6 connectedSortable">
                 <!-- KIRI 4 -->
                 <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Container Movement  <b>(Total Boxes) </b></h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="chart">   
                            <p class="d-flex flex-column">
                            <!-- <span class="text-bold text-lg">820</span> -->
                            <strong>Period: Jan - <?php echo $bulanTop  ."  ".  $tahun ; ?> </strong>
                          </p>


                          <canvas id="piemovement" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 300%;"></canvas>
                        </div>
                      </div> <!-- /.card-body -->



                      <div class="card-footer">
                            <div class="row"> <!-- /.row yang ke 2 -->
                                <div class="col-sm-12 col-12">
                                  <div class="description-block border-right">
                                      <span class="description-percentage text-danger"><i class="fas fa-caret-left"></i> 0%</span>
                                      <h1 class="description-header"><?php echo number_format(array_sum($t_boxops_movement_jmlcont_arr),0) ?></h1>
                                      <span class="description-text">Total BOXES</span>
                                  </div> <!-- /.description-block -->
                                </div>   <!-- /.col -->
                              </div>  <!-- /.row yang ke 2 -->
                          </div>  <!-- /.card-footer -->         
                     </div>  <!-- class="card"> -->
                   <!-- END OF KIRI 4 -->


               </section>



            <!-- KANAN -->
            <section class="col-lg-6 connectedSortable">
                 <!-- KIRI 4 -->
                 <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Feeder Operator  <b>(Total Boxes) </b></h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                          </button>
                          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                        </div>
                      </div>
                      <div class="card-body">
                        <div class="chart">   
                            <p class="d-flex flex-column">
                            <!-- <span class="text-bold text-lg">820</span> -->
                            <strong>Period: Jan - <?php echo $bulanTop  ."  ".  $tahun ; ?> </strong>
                          </p>


                          <canvas id="piefeeder" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 300%;"></canvas>
                        </div>
                      </div> <!-- /.card-body -->



                      <div class="card-footer">
                            <div class="row"> <!-- /.row yang ke 2 -->
                                <div class="col-sm-12 col-12">
                                  <div class="description-block border-right">
                                      <span class="description-percentage text-danger"><i class="fas fa-caret-left"></i> 0%</span>
                                      <h1 class="description-header"><?php echo number_format(array_sum($t_boxops_movement_jmlcont_arr),0) ?></h1>
                                      <span class="description-text">Total BOXES</span>
                                  </div> <!-- /.description-block -->
                                </div>   <!-- /.col -->
                              </div>  <!-- /.row yang ke 2 -->
                          </div>  <!-- /.card-footer -->         
                     </div>  <!-- class="card"> -->
                   <!-- END OF KIRI 4 -->


               </section>
            <!-- END OF KANAN -->
          </div>



















        
      </div><!-- /.container-fluid --></section>





<script type="text/javascript">
     var mode      = 'index';
      var intersect = true;
      var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
          };
   //==================================================
       //3.COPY SCRIPT JQUERY bar - t_boxops-bar -- STACKEDBAR BARCHART
      //====================================================
      var areaChartData = {
            labels  : [<?php echo $t_boxops_date_has ?>],
            datasets: [
               
                {
                label               : "Container 20'",
                backgroundColor     : '#E47E43', borderColor         : '#E47E43', 
                pointRadius          : true,
                pointColor          : '#E47E43', pointStrokeColor    : '#E47E43',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#E47E43',
                data                : [<?php echo   $t_boxops_jmlcont20  ?>]
                },
                {
                label               :  "Container 40'",
                backgroundColor     : '#045A8D', borderColor         : '#045A8D',  
                pointRadius         : true,
                pointColor          : '#045A8D', pointStrokeColor    : '#045A8D',
                pointHighlightFill  : '#fff', pointHighlightStroke   : '#045A8D',
                data                : [<?php echo $t_boxops_jmlcont40  ?>]
                },
             
                
            ]
            }

            var barChartData = jQuery.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            datasetFill             : false
            }

            var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = jQuery.extend(true, {}, barChartData)

            var stackedBarChartOptions = {
            responsive              : true,
            maintainAspectRatio     : false,
            scales: {
                xAxes: [{
                stacked: true,
                }],
                yAxes: [{
                stacked: true
                }]
            }
            }

            var stackedBarChart = new Chart(stackedBarChartCanvas, {
            type: 'bar', 
            data: stackedBarChartData,
            options: stackedBarChartOptions
            
            })




//stacked bar branch



 //==================================================
        //3.  SCRIPT JQUERY DONUT CHART --- Gross profit Kecil
        //====================================================
        //donut chart 2
        var pieChartCanvas = $('#donutChart').get(0).getContext('2d')
        var pieData        = {
        labels: [
            "Total Container 40'", 
            "Total Container 20'"
        ],
        datasets: [
          {
            data: [
            <?php echo array_sum($t_boxops_jmlcont40_arr) ?>,
            <?php echo array_sum($t_boxops_jmlcont20_arr) ?>,
            ],
            backgroundColor : ['#045A8D', '#f39c12'],
          }
        ]
        }
        var pieOptions = {
        legend: {
          display: false
        },
        maintainAspectRatio : false,
        responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
        type: 'doughnut',
        data: pieData,
        options: pieOptions      
        });
        //==================================================
        //3. END OF SCRIPT JQUERY DONUT CHART --- Gross profit Kecil
        //====================================================










  //==================================================
        //3. COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART
        //====================================================
        var pieChartCanvas = $('#sales-chart-canvasbranch').get(0).getContext('2d')
        var pieData        = {
          labels: [
                    'GTN-SRG',
                    'GTN-BDJ',
                    'GTN-BTH',
                    'GPIL-DPS',
                    'GTN-PLG', 
                    'GTN-LAM', 
                    'GTN-PNK',          
                    'GPIL-BPN', 
                    'GPIL-SBY',
                    'GTN-MAC',
                    'GTN-MED', 
                    'GTN-JKT', 
          ],
          datasets: [
            {
              data: [
                <?php echo array_sum($t_boxops_divbran_jmlconttotal_gtnsrg_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotal_gtnbdj_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotal_gtnbtm_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotal_gpildps_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotal_gtnplm_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotal_gtnlam_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotal_gtnpnk_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotal_gpilbpn_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotal_gpilsby_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotal_gtnmac_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotal_gtnmes_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotal_gtnjkt_arr) ?>
              ],
              backgroundColor : ['#f39c12', '#08AA4E', '#3ADF00' ,'#7259DE' ,'#886A08',  '#CBD6F8', '#01A9DB' , '#D7DF01', '#1B13F1' , '#ADFB07' ,'#2D69A9','#14AAA0' ,'#ee320a'],
            
            // backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }
          ]
        }
        var pieOptions = {
                legend: {
                display: false
                },
                maintainAspectRatio : false,
                responsive : true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            var pieChart = new Chart(pieChartCanvas, {
                type: 'doughnut',
                data: pieData,
                options: pieOptions      
            });
        //==================================================
        //3. END OF COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART BRANCH //stacked bar branch
        //====================================================
 



  //MOVEMENT
                
        //==================================================
        //3. COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART
        //====================================================
        var pieChartCanvas = $('#piemovement').get(0).getContext('2d')
        var pieData        = {
            labels: [

                'IN DEPO',
                'DEPO OUT',
                'SAILING',
                'ARRIVED',  
            ],
            datasets: [
            {
                data: [

                    <?php echo array_sum($t_boxops_movement_jmlcont_in_arr) ?>,
                    <?php echo array_sum($t_boxops_movement_jmlcont_out_arr) ?>,
                    <?php echo array_sum($t_boxops_movement_jmlcont_sailing_arr) ?>,
                    <?php echo array_sum($t_boxops_movement_jmlcont_arrival_arr) ?>,
                 
                ],
             
               backgroundColor : ['#f56954', '#045A8D', '#00a65a', '#f39c12']
            }
            ]
        }
        var pieOptions = {
            legend: {
            display: true
            },
            maintainAspectRatio : false,
            responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions      
        });


        //==================================================
        //3. END OF COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART BRANCH //stacked bar branch
        //=====

        //END OF   //MOVEMENT




  //FEEDER
        //==================================================
        //3. COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART
        //====================================================
        var pieChartCanvas = $('#piefeeder').get(0).getContext('2d')
        var pieData        = {
            labels: [

                'CTP',
                'ICONLINE',
                'SPIL',
                'PPNP(SAMUDERA)',  
                'MERATUS',  
                'OTHERS',  
            ],
            datasets: [
            {
                data: [

                    <?php echo array_sum($t_boxops_feeder_jmlcont_ctp_arr) ?>,
                    <?php echo array_sum($t_boxops_feeder_jmlcont_icon_arr) ?>,
                    <?php echo array_sum($t_boxops_feeder_jmlcont_spil_arr) ?>,
                    <?php echo array_sum($t_boxops_feeder_jmlcont_samudera_arr) ?>,
                    <?php echo array_sum($t_boxops_feeder_jmlcont_meratus_arr) ?>,
                    <?php echo array_sum($t_boxops_feeder_jmlcont_other_arr) ?>,
                ],
             
           
               backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#045A8D', '#d2d6de'],
            }
            ]
        }
        var pieOptions = {
            legend: {
            display: true
            },
            maintainAspectRatio : false,
            responsive : true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions      
        });


        //==================================================
        //3. END OF COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART BRANCH //stacked bar branch
        //=====

        //END OF   //FEEDER



</script>