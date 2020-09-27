<?php

//buat chart
//1. copy script php query
//2. copy script HTML
//3. copy script jquery

//=======================================
//1.PHP QUERY --> t_boxops --> PENDING

$t_boxops_all_pending_jmlcont20 = "";
$t_boxops_all_pending_jmlcont40 = "";
$t_boxops_all_pending_jmlconttotal = "";
$t_boxops_all_pending_jmlcont20_arr = array();
$t_boxops_all_pending_jmlcont40_arr =array();
$t_boxops_all_pending_jmlconttotal_arr =array();

$t_boxops_divbran_date_arr = array();
$bulanTop ="";
$tahun="";

foreach ($t_boxops_all_pending as $key => $val) {
    
    $t_boxops_all_pending_jmlcont20  .= "".$val['jmlcont20'].",";
    $t_boxops_all_pending_jmlcont20_arr[] = $val['jmlcont20'];

    $t_boxops_all_pending_jmlcont40  .= "".$val['jmlcont40'].",";
    $t_boxops_all_pending_jmlcont40_arr[] = $val['jmlcont40'];

    $t_boxops_all_pending_jmlconttotal  .= "".$val['jmlconttotal'].",";
    $t_boxops_all_pending_jmlconttotal_arr[] = $val['jmlconttotal'];

}

$t_boxops_all_pending_jmlcont20  = rtrim($t_boxops_all_pending_jmlcont20, ",");
$t_boxops_all_pending_jmlcont40  = rtrim($t_boxops_all_pending_jmlcont40, ",");
$t_boxops_all_pending_jmlconttotal  = rtrim($t_boxops_all_pending_jmlconttotal, ",");

// END OF 1.PHP QUERY  t_boxops - PENDING
//=======================================


//=======================================
//1.PHP QUERY --> t_boxops --> APPROVED

$t_boxops_all_approved_jmlcont20 = "";
$t_boxops_all_approved_jmlcont40 = "";
$t_boxops_all_approved_jmlconttotal = "";
$t_boxops_all_approved_jmlcont20_arr = array();
$t_boxops_all_approved_jmlcont40_arr =array();
$t_boxops_all_approved_jmlconttotal_arr =array();

foreach ($t_boxops_all_approved as $key => $val) {

    $t_boxops_all_approved_jmlcont20  .= "".$val['jmlcont20'].",";
    $t_boxops_all_approved_jmlcont20_arr[] = $val['jmlcont20'];

    $t_boxops_all_approved_jmlcont40  .= "".$val['jmlcont40'].",";
    $t_boxops_all_approved_jmlcont40_arr[] = $val['jmlcont40'];


    $t_boxops_all_approved_jmlconttotal  .= "".$val['jmlconttotal'].",";
    $t_boxops_all_approved_jmlconttotal_arr[] = $val['jmlconttotal'];

}

$t_boxops_all_approved_jmlcont20  = rtrim($t_boxops_all_approved_jmlcont20, ",");
$t_boxops_all_approved_jmlcont40  = rtrim($t_boxops_all_approved_jmlcont40, ",");
$t_boxops_all_approved_jmlconttotal  = rtrim($t_boxops_all_approved_jmlconttotal, ",");

// END OF 1.PHP QUERY  t_boxops APPROVED
//=======================================



//=======================================
//1.PHP QUERY --> t_boxops --> ACTIVE

$t_boxops_active_jmlcont20 = "";
$t_boxops_active_jmlcont40 = "";

$t_boxops_active_jmlcont20_arr = array();
$t_boxops_active_jmlcont40_arr =array();

foreach ($t_boxops_active as $key => $valA) {

    $t_boxops_active_jmlcont20  .= "".$valA['jmlcont20'].",";
    $t_boxops_active_jmlcont20_arr[] = $valA['jmlcont20'];

    $t_boxops_active_jmlcont40  .= "".$valA['jmlcont40'].",";
    $t_boxops_active_jmlcont40_arr[] = $valA['jmlcont40'];


}

// END OF 1.PHP QUERY  t_boxops ACTIVE
//=======================================


//=======================================
//1.PHP QUERY --> t_boxops --> COMPLETE

$t_boxops_complete_jmlcont20 = "";
$t_boxops_complete_jmlcont40 = "";

$t_boxops_complete_jmlcont20_arr = array();
$t_boxops_complete_jmlcont40_arr =array();

foreach ($t_boxops_complete as $key => $valA) {

    $t_boxops_complete_jmlcont20  .= "".$valA['jmlcont20'].",";
    $t_boxops_complete_jmlcont20_arr[] = $valA['jmlcont20'];

    $t_boxops_complete_jmlcont40  .= "".$valA['jmlcont40'].",";
    $t_boxops_complete_jmlcont40_arr[] = $valA['jmlcont40'];


}

// END OF 1.PHP QUERY  t_boxops COMPLETE
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


    $t_boxops_divbran_jmlcont20aprv = "";
    $t_boxops_divbran_jmlcont20aprv_arr = array();
    $t_boxops_divbran_jmlcont40aprv = "";
    $t_boxops_divbran_jmlcont40aprv_arr =array();
    $t_boxops_divbran_jmlconttotalaprv = "";
    $t_boxops_divbran_jmlconttotalaprv_arr =array();


    

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
    $t_boxops_divbran_jmlconttotal_gtnptk = "";

    $t_boxops_divbran_jmlconttotalaprv_gtnsrg = "";
    $t_boxops_divbran_jmlconttotalaprv_gtnbdj = "";
    $t_boxops_divbran_jmlconttotalaprv_gtnbtm = "";
    $t_boxops_divbran_jmlconttotalaprv_gtnlam = "";
    $t_boxops_divbran_jmlconttotalaprv_gpildps = "";
    $t_boxops_divbran_jmlconttotalaprv_gtnplm = "";
    $t_boxops_divbran_jmlconttotalaprv_gtnpnk = "";
    $t_boxops_divbran_jmlconttotalaprv_gtnmes = "";
    $t_boxops_divbran_jmlconttotalaprv_gpilbpn = "";
    $t_boxops_divbran_jmlconttotalaprv_gpilsby = "";
    $t_boxops_divbran_jmlconttotalaprv_gtnmac = "";
    $t_boxops_divbran_jmlconttotalaprv_gtnjkt = "";
    $t_boxops_divbran_jmlconttotalaprv_gtnptk = "";

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
    $t_boxops_divbran_jmlconttotal_gtnptk_arr = array();

    $t_boxops_divbran_jmlconttotalaprv_gtnsrg_arr = array();
    $t_boxops_divbran_jmlconttotalaprv_gtnbdj_arr = array();
    $t_boxops_divbran_jmlconttotalaprv_gtnbtm_arr = array();
    $t_boxops_divbran_jmlconttotalaprv_gtnlam_arr = array();
    $t_boxops_divbran_jmlconttotalaprv_gpildps_arr = array();
    $t_boxops_divbran_jmlconttotalaprv_gtnplm_arr = array();
    $t_boxops_divbran_jmlconttotalaprv_gtnpnk_arr = array();
    $t_boxops_divbran_jmlconttotalaprv_gtnmes_arr = array();
    $t_boxops_divbran_jmlconttotalaprv_gpilbpn_arr = array();
    $t_boxops_divbran_jmlconttotalaprv_gpilsby_arr = array();
    $t_boxops_divbran_jmlconttotalaprv_gtnmac_arr = array();
    $t_boxops_divbran_jmlconttotalaprv_gtnjkt_arr = array();
    $t_boxops_divbran_jmlconttotalaprv_gtnptk_arr = array();
    
    




    foreach ($t_boxops_divbran as $key => $val) {
       // print_r( $val);


        if ($val['divbran'] == "GTN-SRG") {
            $t_boxops_divbran_jmlconttotal_gtnsrg .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnsrg_arr[] = $val['jmlconttotal'];
            $t_boxops_divbran_jmlconttotalaprv_gtnsrg .= "".$val['jmlconttotalaprv'].",";
            $t_boxops_divbran_jmlconttotalaprv_gtnsrg_arr[] = $val['jmlconttotalaprv'];
           
        }elseif ($val['divbran'] == "GTN-BDJ") {
            $t_boxops_divbran_jmlconttotal_gtnbdj .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnbdj_arr[] = $val['jmlconttotal'];      
            $t_boxops_divbran_jmlconttotalaprv_gtnbdj .= "".$val['jmlconttotalaprv'].",";
            $t_boxops_divbran_jmlconttotalaprv_gtnbdj_arr[] = $val['jmlconttotalaprv'];

        }elseif ($val['divbran'] == "GTN-BTH") {
            $t_boxops_divbran_jmlconttotal_gtnbtm .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnbtm_arr[] = $val['jmlconttotal'];
            $t_boxops_divbran_jmlconttotalaprv_gtnbtm .= "".$val['jmlconttotalaprv'].",";
            $t_boxops_divbran_jmlconttotalaprv_gtnbtm_arr[] = $val['jmlconttotalaprv'];

        }elseif ($val['divbran'] == "GTN-LAM") {
            $t_boxops_divbran_jmlconttotal_gtnlam .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnlam_arr[] = $val['jmlconttotal'];
            $t_boxops_divbran_jmlconttotalaprv_gtnlam .= "".$val['jmlconttotalaprv'].",";
            $t_boxops_divbran_jmlconttotalaprv_gtnlam_arr[] = $val['jmlconttotalaprv'];

        }elseif ($val['divbran'] == "GPIL-DPS") {
            $t_boxops_divbran_jmlconttotal_gpildps .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gpildps_arr[] = $val['jmlconttotal'];
            $t_boxops_divbran_jmlconttotalaprv_gpildps .= "".$val['jmlconttotalaprv'].",";
            $t_boxops_divbran_jmlconttotalaprv_gpildps_arr[] = $val['jmlconttotalaprv'];

        }elseif ($val['divbran'] == "GTN-PLM") {
            $t_boxops_divbran_jmlconttotal_gtnplm .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnplm_arr[] = $val['jmlconttotal'];
            $t_boxops_divbran_jmlconttotalaprv_gtnplm .= "".$val['jmlconttotalaprv'].",";
            $t_boxops_divbran_jmlconttotalaprv_gtnplm_arr[] = $val['jmlconttotalaprv'];

        }elseif ($val['divbran'] == "GTN-PNK") {
            $t_boxops_divbran_jmlconttotal_gtnptk .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnptk_arr[] = $val['jmlconttotal'];
            $t_boxops_divbran_jmlconttotalaprv_gtnptk .= "".$val['jmlconttotalaprv'].",";
            $t_boxops_divbran_jmlconttotalaprv_gtnptk_arr[] = $val['jmlconttotalaprv'];

        }elseif ($val['divbran'] == "GTN-MES") {
            $t_boxops_divbran_jmlconttotal_gtnmes .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnmes_arr[] = $val['jmlconttotal'];
            $t_boxops_divbran_jmlconttotalaprv_gtnmes .= "".$val['jmlconttotalaprv'].",";
            $t_boxops_divbran_jmlconttotalaprv_gtnmes_arr[] = $val['jmlconttotalaprv'];

        }elseif ($val['divbran'] == "GPIL-BPN") {
            $t_boxops_divbran_jmlconttotal_gpilbpn .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gpilbpn_arr[] = $val['jmlconttotal'];
            $t_boxops_divbran_jmlconttotalaprv_gpilbpn .= "".$val['jmlconttotalaprv'].",";
            $t_boxops_divbran_jmlconttotalaprv_gpilbpn_arr[] = $val['jmlconttotalaprv'];

        }elseif ($val['divbran'] == "GPIL-SUB") {
            $t_boxops_divbran_jmlconttotal_gpilsby .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gpilsby_arr[] = $val['jmlconttotal'];
            $t_boxops_divbran_jmlconttotalaprv_gpilsby .= "".$val['jmlconttotalaprv'].",";
            $t_boxops_divbran_jmlconttotalaprv_gpilsby_arr[] = $val['jmlconttotalaprv'];

        }elseif ($val['divbran'] == "GTN-MAC") {
            $t_boxops_divbran_jmlconttotal_gtnmac .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnmac_arr[] = $val['jmlconttotal'];
            $t_boxops_divbran_jmlconttotalaprv_gtnmac .= "".$val['jmlconttotalaprv'].",";
            $t_boxops_divbran_jmlconttotalaprv_gtnmac_arr[] = $val['jmlconttotalaprv'];

        }elseif ($val['divbran'] == "GTN-JKT") {
            $t_boxops_divbran_jmlconttotal_gtnjkt .= "".$val['jmlconttotal'].",";
            $t_boxops_divbran_jmlconttotal_gtnjkt_arr[] = $val['jmlconttotal'];
            $t_boxops_divbran_jmlconttotalaprv_gtnjkt .= "".$val['jmlconttotalaprv'].",";
            $t_boxops_divbran_jmlconttotalaprv_gtnjkt_arr[] = $val['jmlconttotalaprv'];

        }






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

        $t_boxops_divbran_jmlcont20  .= "".$val['jmlcont20'].",";
        $t_boxops_divbran_jmlcont20_arr[] = $val['jmlcont20'];
    
        $t_boxops_divbran_jmlcont40  .= "".$val['jmlcont40'].",";
        $t_boxops_divbran_jmlcont40_arr[] = $val['jmlcont40'];
    
    
        $t_boxops_divbran_jmlconttotal  .= "".$val['jmlconttotal'].",";
        $t_boxops_divbran_jmlconttotal_arr[] = $val['jmlconttotal'];





        $t_boxops_divbran_jmlcont20aprv  .= "".$val['jmlcont20aprv'].",";
        $t_boxops_divbran_jmlcont20aprv_arr[] = $val['jmlcont20aprv'];
        $t_boxops_divbran_jmlcont40aprv  .= "".$val['jmlcont40aprv'].",";
        $t_boxops_divbran_jmlcont40aprv_arr[] = $val['jmlcont40aprv'];
        $t_boxops_divbran_jmlconttotalaprv  .= "".$val['jmlconttotalaprv'].",";
        $t_boxops_divbran_jmlconttotalaprv_arr[] = $val['jmlconttotalaprv'];

        

        $bulanTop = $bulan;
        $tahun = $val['tahun'];
        $t_boxops_divbran_date = "'".$bulan." - ";
        $t_boxops_divbran_date .= $val['tahun']."',";

        $t_boxops_divbran_date_arr[] = $t_boxops_divbran_date;

        $t_boxops_divbran_division = "'".$val['divbran']."',";
        $t_boxops_divbran_division_arr[] =$t_boxops_divbran_division;


        
    }
    
    // untuk Bagian HORIZONTAL nya UNTUK YAL SALES PEROMANCE PER DIV BRANs//
    // [30, 50, 20, 39, 96, 47, 110,]
    $t_boxops_divbran_date_has = rtrim(implode(" ",array_unique($t_boxops_divbran_date_arr)), ",");
    $t_boxops_divbran_division_has = rtrim(implode(" ",array_unique($t_boxops_divbran_division_arr)), ",");
    // echo $t_boxops_divbran_date_has;
    //end of untuk garis HORIZONTAL // 


    // untuk Bagian HORIZONTAL nya/ -- UNTUK YANG CURRENT MONTH/
     $t_boxops_divbran_division_has = rtrim(implode(" ",array_unique($t_boxops_divbran_division_arr)), ",");
    //end of untuk garis HORIZONTAL // 
 //echo $t_boxops_divbran_division_has;

    //ini untuk bagian VERTICAL nya



$t_boxops_divbran_jmlcont20  = rtrim($t_boxops_divbran_jmlcont20, ",");
$t_boxops_divbran_jmlcont40  = rtrim($t_boxops_divbran_jmlcont40, ",");
$t_boxops_divbran_jmlconttotal  = rtrim($t_boxops_divbran_jmlconttotal, ",");
$t_boxops_divbran_jmlcont20aprv  = rtrim($t_boxops_divbran_jmlcont20aprv, ",");
$t_boxops_divbran_jmlcont40aprv  = rtrim($t_boxops_divbran_jmlcont40aprv, ",");
$t_boxops_divbran_jmlconttotalaprv  = rtrim($t_boxops_divbran_jmlconttotalaprv, ",");  
    //END OF ini untuk bagian VERTICAL nya

    //=======================================
    //END OF 1.PHP QUERY -->  $t_boxops_divbran   --> UNTUK STACKED BAR
    //=======================================



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
                <h3><?php echo number_format(array_sum($t_boxops_all_pending_jmlconttotal_arr),0) ?>&nbsp;Boxes</h3>
                <h6>Container 20' : <?php echo number_format(array_sum($t_boxops_all_pending_jmlcont20_arr),0) ?></h6>
                <h6>Container 40' : <?php echo number_format(array_sum($t_boxops_all_pending_jmlcont40_arr),0) ?></h6>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              
                 <a href="#"  data-toggle="modal" 
                  data-requestnom="<?php echo "Pending"; ?>" 
                  data-target="#modal_pending" class="small-box-footer" class="small-box-footer">Pending  &nbsp;  <i class="fas fa-arrow-circle-right"></i>
                  </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo number_format(array_sum($t_boxops_all_approved_jmlconttotal_arr) - (array_sum($t_boxops_active_jmlcont20_arr) + array_sum($t_boxops_active_jmlcont40_arr)) - (array_sum($t_boxops_complete_jmlcont20_arr) + array_sum($t_boxops_complete_jmlcont40_arr)),0) ?>&nbsp;Boxes</h3>
                <h6>Container 20' : <?php echo number_format(array_sum($t_boxops_all_approved_jmlcont20_arr) - array_sum($t_boxops_active_jmlcont20_arr) - array_sum($t_boxops_complete_jmlcont20_arr),0) ?></h6>
                <h6>Container 40' : <?php echo number_format(array_sum($t_boxops_all_approved_jmlcont40_arr) - array_sum($t_boxops_active_jmlcont40_arr) - array_sum($t_boxops_complete_jmlcont40_arr),0) ?></h6>
              </div>
              <div class="icon">
                <i class="ion ion-checkmark-round"></i>
              </div>
                  <a href="#"  data-toggle="modal" 
                  data-requestnom="<?php echo "Approved"; ?>" 
                  data-target="#modal_approved" class="small-box-footer" class="small-box-footer">Approved  &nbsp;  <i class="fas fa-arrow-circle-right"></i>
                  </a>
            </div>
          </div>
          <!-- ./col -->



          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo number_format(array_sum($t_boxops_active_jmlcont20_arr) + array_sum($t_boxops_active_jmlcont40_arr),0) ?>&nbsp;Boxes</h3>
                <h6>Container 20' : <?php echo number_format(array_sum($t_boxops_active_jmlcont20_arr),0) ?></h6>
                <h6>Container 40' : <?php echo number_format(array_sum($t_boxops_active_jmlcont40_arr),0) ?></h6>
              </div>
              <div class="icon">
                <i class="ion ion-arrow-swap"></i>
              </div>
              <a href="#"  data-toggle="modal" 
                  data-requestnom="<?php echo "Active"; ?>" 
                  data-target="#modal_active" class="small-box-footer" class="small-box-footer">Active  &nbsp;  <i class="fas fa-arrow-circle-right"></i></a>

            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo number_format(array_sum($t_boxops_complete_jmlcont20_arr) + array_sum($t_boxops_complete_jmlcont40_arr),0) ?>&nbsp;Boxes</h3>
                <h6>Container 20' : <?php echo number_format(array_sum($t_boxops_complete_jmlcont20_arr),0) ?></h6>
                <h6>Container 40' : <?php echo number_format(array_sum($t_boxops_complete_jmlcont40_arr),0) ?></h6>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#"  data-toggle="modal" 
                  data-requestnom="<?php echo "Complete"; ?>" 
                  data-target="#modal_complete" class="small-box-footer" class="small-box-footer">Complete  &nbsp;  <i class="fas fa-arrow-circle-right"></i></a>
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
                          <strong>Total Boxes Approved per Branches</strong>
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
                          <h5 class="description-header"><?php echo number_format(array_sum($t_boxops_divbran_jmlcont20aprv_arr),0) ?></h5>
                          <span class="description-text">TOTAL CONTAINER 20'</span>
                          </div>
                          <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                          <span class="description-percentage text-danger"><i class="fas fa-caret-left"></i> 0%</span>
                          <h5 class="description-header"><?php echo number_format(array_sum($t_boxops_divbran_jmlcont40aprv_arr),0) ?></h5>
                          <span class="description-text">TOTAL CONTAINER 40'</span>
                          </div>
                          <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                          <span class="description-percentage text-warning"><i class="fas fa-caret-up"></i> 0%</span>
                          <h5 class="description-header"><?php echo number_format(array_sum($t_boxops_divbran_jmlconttotalaprv_arr),0) ?></h5>
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





        
    </div><!-- /.container-fluid -->
</section>

<!-- ============ MODAL PENDING =============== -->
<div class="modal fade" id="modal_pending">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">List Of Pending Request</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <div class="modal-body">
                <table id="nothing" class="table table-sm table-hover table-bordered">
                    <thead class="bg-info"> 
                        <tr> 
                            <th>#</th>
                            <th>Branch / Domestics</th>
                            <th>Request No</th>
                            <th>Request Date</th>
                            <th>Container 20'</th>
                            <th>Container 40'</th>
                            <th>Total Boxes</th>
                     
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $no = 1;
                       // print_r($row->result());
                        foreach($t_boxops_all_pending_detail->result() as $key => $data) {
                          $divbran = $data->divbran;
                          ?>

                        <tr> 
                            <td style="width:5%;"><?=$no?></td>
                            <td><?=$data->divbran?></td>
                            <td><a href="<?=site_url('reqcontainer/edit/')?><?php echo str_replace("/","@",$data->requestno) ?>"><?=$data->requestno?></a></td>
                            <td><?=$data->requestdate?></td>
                            <td><?=$data->jmlcont20?></td>
                            <td><?=$data->jmlcont40?></td>
                            <td><?=$data->jmlconttotal?></td>
                        </tr>
                        <?php 
                        $no++;
                        } 
                    ?>
                    </tbody>
                </table>
              </div>
              <div class="modal-footer">
              
              <!--   <button type="button" class="btn btn-primary " onclick="EntryFeeder('update')"><i class="fa fa-file-alt"></i></button> -->
                <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">OK</button>
              </div>
         </div>
       </div>
</div>
<!-- ============ END OF MODAL PENDING =============== -->







<!-- ============ MODAL APPROVED =============== -->
<div class="modal fade" id="modal_approved">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">List Of Approval</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <div class="modal-body">
                <table id="nothing" class="table table-sm table-hover table-bordered">
                    <thead class="bg-info"> 
                        <tr> 
                            <th>#</th>
                           <th>Branch / Domestics</th> 
                           <!--  <th>Request No</th> -->
                            <th>Do Number</th>
                            <th>Do Date</th>
                            <th>Container 20'</th>
                            <th>Container 40'</th>
                            <th>Total Boxes</th>
                     
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $no = 1;
                       // print_r($row->result());
                        foreach($t_boxops_all_approved_detail->result() as $key => $data) {
                         // $divbran = $data->divbran;
                          ?>

                        <tr> 
                            <td style="width:5%;"><?=$no?></td>
                            <td><?=$this->fungsi->cari_donumber_dari_dofeeder($data->donumberfeeder)->divbran?></td> 

                             <!-- <td><a href="<?=site_url('reqcontainer/edit/')?><?php echo str_replace("/","@",$data->requestno) ?>"><?=$data->requestno?></a></td>  -->
                            <td><a href="<?=site_url('assignfeeder/asgnfeeder/')?><?php echo str_replace("/","@",$this->fungsi->cari_donumber_dari_dofeeder($data->donumberfeeder)->donumber) ?>"><?=$data->donumberfeeder?></a></td>
                            <td><?=$this->fungsi->cari_donumber_dari_dofeeder($data->donumberfeeder)->dodate?></td> 
                            <td><?=$data->jmlcont20?></td>
                            <td><?=$data->jmlcont40?></td>
                            <td><?=$data->jmlconttotal?></td>
                        </tr>
                        <?php 
                        $no++;
                        } 
                    ?>
                    </tbody>
                </table>
              </div>
              <div class="modal-footer">
              
              <!--   <button type="button" class="btn btn-primary " onclick="EntryFeeder('update')"><i class="fa fa-file-alt"></i></button> -->
                <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">OK</button>
              </div>
         </div>
       </div>
</div>
<!-- ============ END OF MODAL APPROVED =============== -->






<!-- ============ MODAL ACTIVE =============== -->
<div class="modal fade" id="modal_active">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">List Of Active</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <div class="modal-body">
                <table id="nothing" class="table table-sm table-hover table-bordered">
                    <thead class="bg-info"> 
                        <tr> 
                            <th>#</th>
                           <th>Branch/Domestic</th> 
                            <th>Do Number</th>
                            <th>Do Date</th>
                            <th>Cont. 20'</th>
                            <th>Cont. 40'</th>
                            <th>Total Boxes</th>
                            <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $no = 1;
                       // print_r($row->result());
                        foreach($t_boxops_active_detail->result() as $key => $data) {
                         // $divbran = $data->divbran;
                          ?>

                        <tr> 
                            <td style="width:5%;"><?=$no?></td>
                            <td><?php echo $this->fungsi->cari_donumber_dari_dofeeder($data->donumber)->divbran ;?></td> 

                            <!-- <td><a href="<?=site_url('reqcontainer/edit/')?><?php echo str_replace("/","@",$data->requestno) ?>"><?=$data->requestno?></a></td> -->
                            <td><a href="<?=site_url('assignfeeder/asgnfeeder/')?><?php echo str_replace("/","@",$this->fungsi->cari_donumber_dari_dofeeder($data->donumber)->donumber) ?>"><?=$data->donumber?></a></td>
                            <td><?=$this->fungsi->cari_donumber_dari_dofeeder($data->donumber)->dodate?></td> 
                            <td><?=$data->jmlcont20?></td>
                            <td><?=$data->jmlcont40?></td>
                            <td><?=$data->jmlconttotal?></td>

                            <td><a href="<?=site_url('containerno/caridaridashboard/')?><?php echo str_replace("/","@",$data->donumber) ?>"><?php echo "Containers"; ?></a></td>
                        </tr>
                        <?php 
                        $no++;
                        } 
                    ?>
                    </tbody>
                </table>
              </div>
              <div class="modal-footer">
              
              <!--   <button type="button" class="btn btn-primary " onclick="EntryFeeder('update')"><i class="fa fa-file-alt"></i></button> -->
                <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">OK</button>
              </div>
         </div>
       </div>
</div>
<!-- ============ END OF MODAL ACTIVE =============== -->






<!-- ============ MODAL COMPLETE =============== -->
<div class="modal fade" id="modal_complete">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">List Of Complete</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <div class="modal-body">
                <table id="noSearch" class="table table-sm table-hover table-bordered">
                    <thead class="bg-info"> 
                        <tr> 
                            <th>#</th>
                            <th>Branch / Domestics</th> 
                            <th>Do Number</th>
                            <th>Do Date</th>
                            <th>Container 20'</th>
                            <th>Container 40'</th>
                            <th>Total Boxes</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $no = 1;
                       // print_r($row->result());
                        foreach($t_boxops_complete_detail->result() as $key => $data) {
                         // $divbran = $data->divbran;
                          ?>

                        <tr> 
                            <td ><?=$no?></td>
                            <td><?=$this->fungsi->cari_donumber_dari_dofeeder($data->donumber)->divbran?></td> 

                          
                            <td><a href="<?=site_url('assignfeeder/asgnfeeder/')?><?php echo str_replace("/","@",$this->fungsi->cari_donumber_dari_dofeeder($data->donumber)->donumber) ?>"><?=$data->donumber?></a></td>
                            <td><?=$this->fungsi->cari_donumber_dari_dofeeder($data->donumber)->dodate?></td> 
                            <td><?=$data->jmlcont20?></td>
                            <td><?=$data->jmlcont40?></td>
                            <td><?=$data->jmlconttotal?></td>
                            <td><a href="<?=site_url('containerno/caridaridashboard/')?><?php echo str_replace("/","@",$data->donumber) ?>"><?php echo "Containers"; ?></a></td>
                        </tr>
                        <?php 
                        $no++;
                        } 
                    ?>
                    </tbody>
                </table>
              </div>
              <div class="modal-footer">
              
              <!--   <button type="button" class="btn btn-primary " onclick="EntryFeeder('update')"><i class="fa fa-file-alt"></i></button> -->
                <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">OK</button>
              </div>
         </div>
       </div>
</div>
<!-- ============ END OF MODAL COMPLETE =============== -->








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

//SEA FCL//

      //=====================================================================
       //3.COPY SCRIPT JQUERY bar -  -- BARCHART 1 - SEAFCL EXPORT - IMPORT
      //===========================================================================
       //-------------
        //- BAR CHART -
        //-------------
        var areaChartData1 = {
          labels  : [<?php echo $t_boxops_divbran_division_has  ?>],
            datasets: [
                {
                label               : 'CONTAINER APPROVED',
                backgroundColor     : '#D7DF01', borderColor         : '#D7DF01',  
                pointRadius         : true,
                pointColor          : '#D7DF01', pointStrokeColor    : '#D7DF01',
                pointHighlightFill  : '#fff', pointHighlightStroke   : '#D7DF01',
                data                : [<?php echo   $t_boxops_divbran_jmlconttotalaprv  ?>]
               
                },
                {
                label               : 'CONTAINER REQUEST',
                backgroundColor     : '#045A8D', borderColor         : '#045A8D', 
                pointRadius          : true,
                pointColor          : '#045A8D', pointStrokeColor    : '#045A8D',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#045A8D',
                data                : [<?php echo $t_boxops_divbran_jmlconttotal  ?>]
                },
              
              
            ]
            }






        var barChartCanvas1 = $('#stackedBarChart').get(0).getContext('2d')
        var barChartData1 = jQuery.extend(true, {}, areaChartData1)
        var temp0 = areaChartData1.datasets[0]
        var temp1 = areaChartData1.datasets[1]
        barChartData1.datasets[0] = temp1
        barChartData1.datasets[1] = temp0

        var barChartOptions = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
        }

        var barChart = new Chart(barChartCanvas1, {
        type: 'bar', 
        data: barChartData1,
        options: barChartOptions
        })



      //==================================================
       //3. END OF COPY SCRIPT JQUERY bar - t_komfreight-bar -- BARCHART SEAFCL
      //====================================================








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
            <?php echo array_sum($t_boxops_divbran_jmlcont40aprv_arr) ?>,
            <?php echo array_sum($t_boxops_divbran_jmlcont20aprv_arr) ?>,
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
                <?php echo array_sum($t_boxops_divbran_jmlconttotalaprv_gtnsrg_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotalaprv_gtnbdj_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotalaprv_gtnbtm_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotalaprv_gpildps_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotalaprv_gtnplm_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotalaprv_gtnlam_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotalaprv_gtnpnk_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotalaprv_gpilbpn_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotalaprv_gpilsby_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotalaprv_gtnmac_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotalaprv_gtnmes_arr) ?>,
                <?php echo array_sum($t_boxops_divbran_jmlconttotalaprv_gtnjkt_arr) ?>
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
 





</script>