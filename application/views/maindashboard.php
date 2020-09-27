<?php

//buat chart
//1. copy script php query
//2. copy script HTML
//3. copy script jquery

//=======================================
//1.PHP QUERY --> t_komfreight --> UNTUK CHART UTAMA
$t_komfreight_date = "";
$t_komfreight_salesqty = "";
$t_komfreight_salesjmlshipment = "";
$t_komfreight_salesqty_arr = array();
$t_komfreight_salesjmlshipment_arr = array();
$t_komfreight_salesrevenue = "";
$t_komfreight_salescost = "";
$t_komfreight_salesgp = "";
$t_komfreight_salesrevenue_arr = array();
$t_komfreight_salescost_arr = array();
$t_komfreight_salesgp_arr = array();

foreach ($t_komfreight as $key => $val) {
    
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
	$t_komfreight_date .= "'".$bulan." ";
    $t_komfreight_date .= "',";
    $tahun = $val['tahun'];


    $t_komfreight_salesqty .= "".$val['qty'].",";
    $t_komfreight_salesqty_arr[] = $val['qty'];

    $t_komfreight_salesjmlshipment .= "".$val['jmlshipment'].",";
    $t_komfreight_salesjmlshipment_arr[] = $val['jmlshipment'];

    $t_komfreight_salesrevenue .= "".$val['revenue'].",";
    $t_komfreight_salesrevenue_arr[] = $val['revenue'];

    $t_komfreight_salescost .= "".$val['cost'].",";
    $t_komfreight_salescost_arr[] = $val['cost'];

    $t_komfreight_salesgp .= "".$val['grossprofit'].",";
    $t_komfreight_salesgp_arr[] = $val['grossprofit'];

}
// [30, 50, 20, 39, 96, 47, 110,]
$bulanTop = $bulan;
$t_komfreight_date = rtrim($t_komfreight_date, ",");
$t_komfreight_salesqty = rtrim($t_komfreight_salesqty, ",");
$t_komfreight_salesjmlshipment = rtrim($t_komfreight_salesjmlshipment, ",");
$t_komfreight_salesrevenue = rtrim($t_komfreight_salesrevenue, ",");
//echo $t_komfreight_salesrevenue;
//print_r($t_komfreight_salesrevenue);
$t_komfreight_salescost = rtrim($t_komfreight_salescost, ",");
$t_komfreight_salesgp = rtrim($t_komfreight_salesgp, ",");
// END OF 1.PHP QUERY  t_komfreight
//=======================================



//=======================================
//1.PHP QUERY --> t_komfreight_bar --> UNTUK DONUT CHART
$t_komfreight_bar_salesrevenue = "";
$t_komfreight_bar_salescost = "";
$t_komfreight_bar_salesgp = "";
$t_komfreight_bar_date_arr = array();
$t_komfreight_bar_salesrevenue_arr = array();
$t_komfreight_bar_salescost_arr = array();
$t_komfreight_bar_salesgp_arr = array();

$t_komfreight_bar_salesrevenue_seafcl = "";
$t_komfreight_bar_salesrevenue_air = "";
$t_komfreight_bar_salesrevenue_cbr = "";
$t_komfreight_bar_salesrevenue_locsrv = "";
$t_komfreight_bar_salesrevenue_sealcl = "";
$t_komfreight_bar_salesrevenue_shp = "";
$t_komfreight_bar_salesrevenue_whs = "";
$t_komfreight_bar_salesrevenue_trc = "";
$t_komfreight_bar_salesrevenue_exp = "";
$t_komfreight_bar_salesrevenue_kai = "";
$t_komfreight_bar_salesrevenue_spcpjt = "";

$t_komfreight_bar_salesrevenue_seafcl_arr = array();
$t_komfreight_bar_salesrevenue_air_arr = array();
$t_komfreight_bar_salesrevenue_cbr_arr = array();
$t_komfreight_bar_salesrevenue_locsrv_arr = array();
$t_komfreight_bar_salesrevenue_sealcl_arr = array();
$t_komfreight_bar_salesrevenue_shp_arr = array();
$t_komfreight_bar_salesrevenue_whs_arr = array();
$t_komfreight_bar_salesrevenue_trc_arr = array();
$t_komfreight_bar_salesrevenue_exp_arr = array();
$t_komfreight_bar_salesrevenue_kai_arr = array();
$t_komfreight_bar_salesrevenue_spcpjt_arr = array();

$t_komfreight_bar_salesgp_seafcl = "";
$t_komfreight_bar_salesgp_seafcl_arr = array();
$t_komfreight_bar_salesgp_air = "";
$t_komfreight_bar_salesgp_air_arr = array();
$t_komfreight_bar_salesgp_cbr = "";
$t_komfreight_bar_salesgp_cbr_arr = array();
$t_komfreight_bar_salesgp_locsrv = "";
$t_komfreight_bar_salesgp_locsrv_arr = array();
$t_komfreight_bar_salesgp_sealcl = "";
$t_komfreight_bar_salesgp_sealcl_arr = array();
$t_komfreight_bar_salesgp_shp = "";
$t_komfreight_bar_salesgp_shp_arr = array();
$t_komfreight_bar_salesgp_whs = "";
$t_komfreight_bar_salesgp_whs_arr = array();
$t_komfreight_bar_salesgp_trc = "";
$t_komfreight_bar_salesgp_trc_arr = array();
$t_komfreight_bar_salesgp_exp = "";
$t_komfreight_bar_salesgp_exp_arr = array();
$t_komfreight_bar_salesgp_spcpjt = "";
$t_komfreight_bar_salesgp_spcpjt_arr = array();
$t_komfreight_bar_salesgp_kai = "";
$t_komfreight_bar_salesgp_kai_arr = array();

foreach ($t_komfreight_bar as $key => $val) {
        
	if ($val['moda'] == "SEAFCL") {
        $t_komfreight_bar_salesrevenue_seafcl .= "".$val['revenue'].",";
        $t_komfreight_bar_salesrevenue_seafcl_arr[] = $val['revenue'];
        $t_komfreight_bar_salesgp_seafcl .= "".$val['grossprofit'].",";
        $t_komfreight_bar_salesgp_seafcl_arr[] = $val['grossprofit'];
	}elseif ($val['moda'] == "AIR") {
        $t_komfreight_bar_salesrevenue_air .= "".$val['revenue'].",";
        $t_komfreight_bar_salesrevenue_air_arr[] = $val['revenue'];
        $t_komfreight_bar_salesgp_air .= "".$val['grossprofit'].",";
        $t_komfreight_bar_salesgp_air_arr[] = $val['grossprofit'];
	}elseif ($val['moda'] == "CBR") {
        $t_komfreight_bar_salesrevenue_cbr .= "".$val['revenue'].",";
        $t_komfreight_bar_salesrevenue_cbr_arr[] = $val['revenue'];
        $t_komfreight_bar_salesgp_cbr .= "".$val['grossprofit'].",";
        $t_komfreight_bar_salesgp_cbr_arr[] = $val['grossprofit'];
	}elseif ($val['moda'] == "LOCSRV") {
        $t_komfreight_bar_salesrevenue_locsrv .= "".$val['revenue'].",";
        $t_komfreight_bar_salesrevenue_locsrv_arr[] = $val['revenue'];
        $t_komfreight_bar_salesgp_locsrv .= "".$val['grossprofit'].",";
        $t_komfreight_bar_salesgp_locsrv_arr[] = $val['grossprofit'];
	}elseif ($val['moda'] == "SEALCL") {
        $t_komfreight_bar_salesrevenue_sealcl .= "".$val['revenue'].",";
        $t_komfreight_bar_salesrevenue_sealcl_arr[] = $val['revenue'];
        $t_komfreight_bar_salesgp_sealcl .= "".$val['grossprofit'].",";
        $t_komfreight_bar_salesgp_sealcl_arr[] = $val['grossprofit'];
	}elseif ($val['moda'] == "SHP") {
        $t_komfreight_bar_salesrevenue_shp .= "".$val['revenue'].",";
        $t_komfreight_bar_salesrevenue_shp_arr[] = $val['revenue'];
        $t_komfreight_bar_salesgp_shp .= "".$val['grossprofit'].",";
        $t_komfreight_bar_salesgp_shp_arr[] = $val['grossprofit'];
	}elseif ($val['moda'] == "WHS") {
        $t_komfreight_bar_salesrevenue_whs .= "".$val['revenue'].",";
        $t_komfreight_bar_salesrevenue_whs_arr[] = $val['revenue'];
        $t_komfreight_bar_salesgp_whs .= "".$val['grossprofit'].",";
        $t_komfreight_bar_salesgp_whs_arr[] = $val['grossprofit'];
	}elseif ($val['moda'] == "TRC") {
        $t_komfreight_bar_salesrevenue_trc .= "".$val['revenue'].",";
        $t_komfreight_bar_salesrevenue_trc_arr[] = $val['revenue'];
        $t_komfreight_bar_salesgp_trc .= "".$val['grossprofit'].",";
        $t_komfreight_bar_salesgp_trc_arr[] = $val['grossprofit'];
    }elseif ($val['moda'] == "EXP") {
        $t_komfreight_bar_salesrevenue_exp .= "".$val['revenue'].",";
        $t_komfreight_bar_salesrevenue_exp_arr[] = $val['revenue'];
        $t_komfreight_bar_salesgp_exp .= "".$val['grossprofit'].",";
        $t_komfreight_bar_salesgp_exp_arr[] = $val['grossprofit'];
    }elseif ($val['moda'] == "SPCPJT") {
        $t_komfreight_bar_salesrevenue_spcpjt .= "".$val['revenue'].",";
        $t_komfreight_bar_salesrevenue_spcpjt_arr[] = $val['revenue'];
        $t_komfreight_bar_salesgp_spcpjt .= "".$val['grossprofit'].",";
        $t_komfreight_bar_salesgp_spcpjt_arr[] = $val['grossprofit'];
    }elseif ($val['moda'] == "KAI") {
        $t_komfreight_bar_salesrevenue_kai .= "".$val['revenue'].",";
        $t_komfreight_bar_salesrevenue_kai_arr[] = $val['revenue'];
        $t_komfreight_bar_salesgp_kai .= "".$val['grossprofit'].",";
        $t_komfreight_bar_salesgp_kai_arr[] = $val['grossprofit'];
	}else{
            
	}


	  $t_komfreight_bar_date = "'".$val['bulan']." - ";
    $t_komfreight_bar_date .= $val['tahun']."',";

    $t_komfreight_bar_date_arr[] = $t_komfreight_bar_date;

}
// [30, 50, 20, 39, 96, 47, 110,]
$t_komfreight_bar_date_has = rtrim(implode(" ",array_unique($t_komfreight_bar_date_arr)), ",");
// echo $t_komfreight_bar_date_has;

$t_komfreight_bar_salesrevenue_seafcl = rtrim($t_komfreight_bar_salesrevenue_seafcl, ",");
$t_komfreight_bar_salesrevenue_air = rtrim($t_komfreight_bar_salesrevenue_air, ",");
$t_komfreight_bar_salesrevenue_cbr = rtrim($t_komfreight_bar_salesrevenue_cbr, ",");
$t_komfreight_bar_salesrevenue_locsrv = rtrim($t_komfreight_bar_salesrevenue_locsrv, ",");
$t_komfreight_bar_salesrevenue_sealcl = rtrim($t_komfreight_bar_salesrevenue_sealcl, ",");
$t_komfreight_bar_salesrevenue_shp = rtrim($t_komfreight_bar_salesrevenue_shp, ",");



$t_komfreight_bar_salesgp_seafcl = rtrim($t_komfreight_bar_salesgp_seafcl, ",");
$t_komfreight_bar_salesgp_air = rtrim($t_komfreight_bar_salesgp_air, ",");
$t_komfreight_bar_salesgp_cbr = rtrim($t_komfreight_bar_salesgp_cbr, ",");
$t_komfreight_bar_salesgp_locsrv = rtrim($t_komfreight_bar_salesgp_locsrv, ",");
$t_komfreight_bar_salesgp_sealcl = rtrim($t_komfreight_bar_salesgp_sealcl, ",");
$t_komfreight_bar_salesgp_shp = rtrim($t_komfreight_bar_salesgp_shp, ",");

$t_komfreight_bar_salesgp_whs = rtrim($t_komfreight_bar_salesgp_whs, ",");
$t_komfreight_bar_salesgp_trc = rtrim($t_komfreight_bar_salesgp_trc, ",");
$t_komfreight_bar_salesgp_exp = rtrim($t_komfreight_bar_salesgp_exp, ",");
$t_komfreight_bar_salesgp_spcpjt = rtrim($t_komfreight_bar_salesgp_spcpjt, ",");
$t_komfreight_bar_salesgp_kai = rtrim($t_komfreight_bar_salesgp_kai, ",");

// echo $t_komfreight_bar_date;
// end t_komfreight_bar
// END OF 1.PHP QUERY  t_komfreight
//=======================================




//BEST BRANCHES

$t_komfreight_bestbranch_division ="";
$t_komfreight_bestbranch_salesrevenue ="";
$t_komfreight_bestbranch_salesgp ="";
foreach ($t_komfreight_bestbranch as $key => $val) {
  $t_komfreight_bestbranch_division =$val['division'] ;
  $t_komfreight_bestbranch_salesrevenue =$val['revenue'];
  $t_komfreight_bestbranch_salesgp=$val['grossprofit'];
}



//END OF BEST BRANCHES



   
    //=======================================
    //1.PHP QUERY --> $t_komfreight_divbran --> UNTUK STACKED BAR
    //=======================================

    $t_komfreight_divbran_division = "";
    $t_komfreight_divbran_division_arr = array();
    $t_komfreight_divbran_salesrevenue = "";
    $t_komfreight_divbran_salescost = "";
    $t_komfreight_divbran_salesgp = "";
    $t_komfreight_divbran_date_arr = array();
    $t_komfreight_divbran_salesrevenue_arr = array();
    $t_komfreight_divbran_salescost_arr = array();
    $t_komfreight_divbran_salesgp_arr = array();

    $t_komfreight_divbran_salesrevenue_gpilog = "";
    $t_komfreight_divbran_salesrevenue_gml = "";
    $t_komfreight_divbran_salesrevenue_glh = "";
    $t_komfreight_divbran_salesrevenue_gtnsrg = "";
    $t_komfreight_divbran_salesrevenue_gpimsrg = "";
    $t_komfreight_divbran_salesrevenue_gtnbdj = "";
    $t_komfreight_divbran_salesrevenue_gtnbtm = "";
    $t_komfreight_divbran_salesrevenue_gtnlam = "";
    $t_komfreight_divbran_salesrevenue_gpildps = "";
    $t_komfreight_divbran_salesrevenue_gtnplm = "";
    $t_komfreight_divbran_salesrevenue_ptk = "";
    $t_komfreight_divbran_salesrevenue_mds = "";
    $t_komfreight_divbran_salesrevenue_gpilbpn = "";
    $t_komfreight_divbran_salesrevenue_gpiljkt = "";
    $t_komfreight_divbran_salesrevenue_gpilsby = "";
    $t_komfreight_divbran_salesrevenue_gpilho = "";
    $t_komfreight_divbran_salesrevenue_gpil = "";
    $t_komfreight_divbran_salesrevenue_gtnmac = "";
    $t_komfreight_divbran_salesrevenue_gtnjkt = "";

    $t_komfreight_divbran_salesrevenue_gpilog_arr = array();
    $t_komfreight_divbran_salesrevenue_gml_arr = array();
    $t_komfreight_divbran_salesrevenue_glh_arr = array();
    $t_komfreight_divbran_salesrevenue_gtnsrg_arr = array();
    $t_komfreight_divbran_salesrevenue_gpimsrg_arr = array();
    $t_komfreight_divbran_salesrevenue_gtnbdj_arr = array();
    $t_komfreight_divbran_salesrevenue_gtnbtm_arr = array();
    $t_komfreight_divbran_salesrevenue_gtnlam_arr = array();
    $t_komfreight_divbran_salesrevenue_gpildps_arr = array();
    $t_komfreight_divbran_salesrevenue_gtnplm_arr = array();
    $t_komfreight_divbran_salesrevenue_ptk_arr = array();
    $t_komfreight_divbran_salesrevenue_mds_arr = array();
    $t_komfreight_divbran_salesrevenue_gpilbpn_arr = array();
    
    $t_komfreight_divbran_salesrevenue_gpil_arr = array();
    $t_komfreight_divbran_salesrevenue_gpiljkt_arr = array();
    $t_komfreight_divbran_salesrevenue_gpilsby_arr = array();
    $t_komfreight_divbran_salesrevenue_gpilho_arr = array();
    $t_komfreight_divbran_salesrevenue_gtnmac_arr = array();
    $t_komfreight_divbran_salesrevenue_gtnjkt_arr = array();



    




    $t_komfreight_divbran_salesgp_gpilog = "";
    $t_komfreight_divbran_salesgp_gml = "";
    $t_komfreight_divbran_salesgp_glh = "";
    $t_komfreight_divbran_salesgp_gtnsrg = "";
    $t_komfreight_divbran_salesgp_gpimsrg = "";
    $t_komfreight_divbran_salesgp_gtnbdj = "";
    $t_komfreight_divbran_salesgp_gtnbtm = "";
    $t_komfreight_divbran_salesgp_gtnlam = "";
    $t_komfreight_divbran_salesgp_gpildps = "";
    $t_komfreight_divbran_salesgp_gtnplm = "";
    $t_komfreight_divbran_salesgp_ptk = "";
    $t_komfreight_divbran_salesgp_mds = "";
    $t_komfreight_divbran_salesgp_gpilbpn = "";
    $t_komfreight_divbran_salesgp_gpiljkt = "";
    $t_komfreight_divbran_salesgp_gpilsby = "";
    $t_komfreight_divbran_salesgp_gpilho = "";
    $t_komfreight_divbran_salesgp_gpil = "";
    $t_komfreight_divbran_salesgp_gtnmac = "";
    $t_komfreight_divbran_salesgp_gtnjkt = "";

    $t_komfreight_divbran_salesgp_gpilog_arr = array();
    $t_komfreight_divbran_salesgp_gml_arr = array();
    $t_komfreight_divbran_salesgp_glh_arr = array();
    $t_komfreight_divbran_salesgp_gtnsrg_arr = array();
    $t_komfreight_divbran_salesgp_gpimsrg_arr = array();
    $t_komfreight_divbran_salesgp_gtnbdj_arr = array();
    $t_komfreight_divbran_salesgp_gtnbtm_arr = array();
    $t_komfreight_divbran_salesgp_gtnlam_arr = array();
    $t_komfreight_divbran_salesgp_gpildps_arr = array();
    $t_komfreight_divbran_salesgp_gtnplm_arr = array();
    $t_komfreight_divbran_salesgp_ptk_arr = array();
    $t_komfreight_divbran_salesgp_mds_arr = array();
    $t_komfreight_divbran_salesgp_gpilbpn_arr = array();
    
    $t_komfreight_divbran_salesgp_gpil_arr = array();
    $t_komfreight_divbran_salesgp_gpiljkt_arr = array();
    $t_komfreight_divbran_salesgp_gpilsby_arr = array();
    $t_komfreight_divbran_salesgp_gpilho_arr = array();
    $t_komfreight_divbran_salesgp_gtnmac_arr = array();
    $t_komfreight_divbran_salesgp_gtnjkt_arr = array();


    foreach ($t_komfreight_divbran as $key => $val) {
       // print_r( $val);

        

        if ($val['division'] == "GPI-LOG") {
            $t_komfreight_divbran_salesrevenue_gpilog .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_gpilog_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_gpilog .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_gpilog_arr[] = $val['grossprofit'];
        }elseif ($val['division'] == "GML") {
            $t_komfreight_divbran_salesrevenue_gml .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_gml_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_gml .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_gml_arr[] = $val['grossprofit'];
        }elseif ($val['division'] == "GLH") {
            $t_komfreight_divbran_salesrevenue_glh .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_glh_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_glh .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_glh_arr[] = $val['grossprofit'];
        }elseif ($val['division'] == "GTN-SRG") {
            $t_komfreight_divbran_salesrevenue_gtnsrg .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_gtnsrg_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_gtnsrg .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_gtnsrg_arr[] = $val['grossprofit'];
        }elseif ($val['division'] == "GPIM-SRG") {
            $t_komfreight_divbran_salesrevenue_gpimsrg .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_gpimsrg_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_gpimsrg .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_gpimsrg_arr[] = $val['grossprofit'];
        }elseif ($val['division'] == "GTN-BDJ") {
            $t_komfreight_divbran_salesrevenue_gtnbdj .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_gtnbdj_arr[] = $val['revenue'];      
            $t_komfreight_divbran_salesgp_gtnbdj .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_gtnbdj_arr[] = $val['grossprofit']; 
        }elseif ($val['division'] == "GTN-BTM") {
            $t_komfreight_divbran_salesrevenue_gtnbtm .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_gtnbtm_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_gtnbtm .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_gtnbtm_arr[] = $val['grossprofit'];
        }elseif ($val['division'] == "GTN-LAM") {
            $t_komfreight_divbran_salesrevenue_gtnlam .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_gtnlam_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_gtnlam .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_gtnlam_arr[] = $val['grossprofit'];
        }elseif ($val['division'] == "GPIL-DPS") {
            $t_komfreight_divbran_salesrevenue_gpildps .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_gpildps_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_gpildps .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_gpildps_arr[] = $val['grossprofit'];
        }elseif ($val['division'] == "GTN-PLM") {
            $t_komfreight_divbran_salesrevenue_gtnplm .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_gtnplm_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_gtnplm .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_gtnplm_arr[] = $val['grossprofit'];
        }elseif ($val['division'] == "PTK") {
            $t_komfreight_divbran_salesrevenue_ptk .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_ptk_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_ptk .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_ptk_arr[] = $val['grossprofit'];
        }elseif ($val['division'] == "MDS") {
            $t_komfreight_divbran_salesrevenue_mds .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_mds_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_mds .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_mds_arr[] = $val['grossprofit'];
        }elseif ($val['division'] == "GPIL-BPN") {
            $t_komfreight_divbran_salesrevenue_gpilbpn .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_gpilbpn_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_gpilbpn .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_gpilbpn_arr[] = $val['grossprofit'];
        }elseif ($val['division'] == "GPIL") {
            $t_komfreight_divbran_salesrevenue_gpiljkt .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_gpiljkt_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_gpiljkt .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_gpiljkt_arr[] = $val['grossprofit'];
        }elseif ($val['division'] == "GPIL-SBY") {
            $t_komfreight_divbran_salesrevenue_gpilsby .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_gpilsby_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_gpilsby .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_gpilsby_arr[] = $val['grossprofit'];
      /*   }elseif ($val['division'] == "GPIL-HO") {
            $t_komfreight_divbran_salesrevenue_gpilho .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_gpilho_arr[] = $val['revenue']; */
        }elseif ($val['division'] == "GPIL") {
            $t_komfreight_divbran_salesrevenue_gpil .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_gpil_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_gpil .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_gpil_arr[] = $val['grossprofit'];
        }elseif ($val['division'] == "GTN-MAC") {
            $t_komfreight_divbran_salesrevenue_gtnmac .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_gtnmac_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_gtnmac .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_gtnmac_arr[] = $val['grossprofit'];
        }elseif ($val['division'] == "GTN-JKT") {
            $t_komfreight_divbran_salesrevenue_gtnjkt .= "".$val['revenue'].",";
            $t_komfreight_divbran_salesrevenue_gtnjkt_arr[] = $val['revenue'];
            $t_komfreight_divbran_salesgp_gtnjkt .= "".$val['grossprofit'].",";
            $t_komfreight_divbran_salesgp_gtnjkt_arr[] = $val['grossprofit'];
        }else{
        
        } 


        $t_komfreight_divbran_salesrevenue .= "".$val['revenue'].",";
        $t_komfreight_divbran_salescost .= "".$val['cost'].",";
        $t_komfreight_divbran_salesrevenue_arr[] = $val['revenue'];
        $t_komfreight_divbran_salescost_arr[] = $val['cost'];



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

        $t_komfreight_divbran_date = "'".$bulan." - ";
        $t_komfreight_divbran_date .= $val['tahun']."',";

        $t_komfreight_divbran_date_arr[] = $t_komfreight_divbran_date;

        $t_komfreight_divbran_division = "'".$val['division']."',";
        $t_komfreight_divbran_division_arr[] =$t_komfreight_divbran_division;


        
    }
    
    // untuk Bagian HORIZONTAL nya UNTUK YAL SALES PEROMANCE PER DIV BRANs//
    // [30, 50, 20, 39, 96, 47, 110,]
    $t_komfreight_divbran_date_has = rtrim(implode(" ",array_unique($t_komfreight_divbran_date_arr)), ",");
    // echo $t_komfreight_divbran_date_has;
    //end of untuk garis HORIZONTAL // 


    // untuk Bagian HORIZONTAL nya/ -- UNTUK YANG CURRENT MONTH/
     $t_komfreight_divbran_division_has = rtrim(implode(" ",array_unique($t_komfreight_divbran_division_arr)), ",");
    //end of untuk garis HORIZONTAL // 
 //echo $t_komfreight_divbran_division_has;

    //ini untuk bagian VERTICAL nya
    $t_komfreight_divbran_salesrevenue = rtrim($t_komfreight_divbran_salesrevenue, ",");
    //END OF ini untuk bagian VERTICAL nya

    //=======================================
    //END OF 1.PHP QUERY -->  $t_komfreight_divbran   --> UNTUK STACKED BAR
    //=======================================



   
    //=======================================
    //1.PHP QUERY --> $t_komfreight_currentmonth --> UNTUK  BAR CHART
    //=======================================

    $t_komfreight_currentmonth_division = "";
    $t_komfreight_currentmonth_division_arr = array();
    $t_komfreight_currentmonth_salesrevenue_lm = "";
    $t_komfreight_currentmonth_salescost_lm = "";
    $t_komfreight_currentmonth_salesgp_lm = "";
    $t_komfreight_currentmonth_salesrevenue_cm = "";
    $t_komfreight_currentmonth_salescost_cm = "";
    $t_komfreight_currentmonth_salesgp_cm = "";

   
    $t_komfreight_currentmonth_salesrevenue_lm_arr = array();
    $t_komfreight_currentmonth_salescost_lm_arr = array();
    $t_komfreight_currentmonth_salesgp_lm_arr = array();
    $t_komfreight_currentmonth_salesrevenue_cm_arr = array();
    $t_komfreight_currentmonth_salescost_cm_arr = array();
    $t_komfreight_currentmonth_salesgp_cm_arr = array();

    $t_komfreight_currentmonth_date_arr = array();

    foreach ($t_komfreight_currentmonth as $key => $val) {
       // print_r( $val);

       
        $t_komfreight_currentmonth_salesrevenue_lm .= "".$val['revenue_lm'].",";
        $t_komfreight_currentmonth_salescost_lm .= "".$val['cost_lm'].",";
        $t_komfreight_currentmonth_salesgp_lm .= "".$val['grossprofit_lm'].",";
        $t_komfreight_currentmonth_salesrevenue_lm_arr[] = $val['revenue_lm'];
        $t_komfreight_currentmonth_salescost_lm_arr[] = $val['cost_lm'];
        $t_komfreight_currentmonth_salesgp_lm_arr[] = $val['grossprofit_lm'];
        

        $t_komfreight_currentmonth_salesrevenue_cm .= "".$val['revenue_cm'].",";
        $t_komfreight_currentmonth_salescost_cm .= "".$val['cost_cm'].",";
        $t_komfreight_currentmonth_salesgp_cm .= "".$val['grossprofit_cm'].",";
        $t_komfreight_currentmonth_salesrevenue_cm_arr[] = $val['revenue_cm'];
        $t_komfreight_currentmonth_salescost_cm_arr[] = $val['cost_cm'];
        $t_komfreight_currentmonth_salesgp_cm_arr[] = $val['grossprofit_cm'];

        $t_komfreight_currentmonth_division = "'".$val['division']."',";
        $t_komfreight_currentmonth_division_arr[] =$t_komfreight_currentmonth_division;


        
    }
    


    // untuk Bagian HORIZONTAL nya/ -- UNTUK YANG CURRENT MONTH/
     $t_komfreight_currentmonth_division_has = rtrim(implode(" ",array_unique($t_komfreight_currentmonth_division_arr)), ",");
    //end of untuk garis HORIZONTAL // 
 //echo $t_komfreight_currentmonth_division_has;


    //=======================================
    //END OF 1.PHP QUERY -->  $t_komfreight_currentmonth   --> UNTUK STACKED BAR
    //=======================================


//=======================================
//1.PHP QUERY --> t_komfreight_divbran_moda() --> UNTUK STACKED BAR DIV BRANC PERFOMANCES  by MODA
$t_komfreight_divbran_moda_division = "";
$t_komfreight_divbran_moda_division_arr = array();
$t_komfreight_divbran_moda_salesrevenue = "";
$t_komfreight_divbran_moda_salescost = "";
$t_komfreight_divbran_moda_salesgp = "";
$t_komfreight_divbran_moda_date_arr = array();
$t_komfreight_divbran_moda_salesrevenue_arr = array();
$t_komfreight_divbran_moda_salescost_arr = array();
$t_komfreight_divbran_moda_salesgp_arr = array();

$t_komfreight_divbran_moda_salesrevenue_seafcl = "";
$t_komfreight_divbran_moda_salesrevenue_air = "";
$t_komfreight_divbran_moda_salesrevenue_cbr = "";
$t_komfreight_divbran_moda_salesrevenue_locsrv = "";
$t_komfreight_divbran_moda_salesrevenue_sealcl = "";
$t_komfreight_divbran_moda_salesrevenue_shp = "";
$t_komfreight_divbran_moda_salesrevenue_whs = "";
$t_komfreight_divbran_moda_salesrevenue_trc = "";
$t_komfreight_divbran_moda_salesrevenue_exp = "";
$t_komfreight_divbran_moda_salesrevenue_kai = "";
$t_komfreight_divbran_moda_salesrevenue_spcpjt = "";

$t_komfreight_divbran_moda_salesrevenue_seafcl_arr = array();
$t_komfreight_divbran_moda_salesrevenue_air_arr = array();
$t_komfreight_divbran_moda_salesrevenue_cbr_arr = array();
$t_komfreight_divbran_moda_salesrevenue_locsrv_arr = array();
$t_komfreight_divbran_moda_salesrevenue_sealcl_arr = array();
$t_komfreight_divbran_moda_salesrevenue_shp_arr = array();
$t_komfreight_divbran_moda_salesrevenue_whs_arr = array();
$t_komfreight_divbran_moda_salesrevenue_trc_arr = array();
$t_komfreight_divbran_moda_salesrevenue_exp_arr = array();
$t_komfreight_divbran_moda_salesrevenue_kai_arr = array();
$t_komfreight_divbran_moda_salesrevenue_spcpjt_arr = array();

$t_komfreight_divbran_moda_salesgp_seafcl = "";
$t_komfreight_divbran_moda_salesgp_seafcl_arr = array();
$t_komfreight_divbran_moda_salesgp_air = "";
$t_komfreight_divbran_moda_salesgp_air_arr = array();
$t_komfreight_divbran_moda_salesgp_cbr = "";
$t_komfreight_divbran_moda_salesgp_cbd_arr = array();
$t_komfreight_divbran_moda_salesgp_locsrv = "";
$t_komfreight_divbran_moda_salesgp_locsrv_arr = array();
$t_komfreight_divbran_moda_salesgp_sealcl = "";
$t_komfreight_divbran_moda_salesgp_sealcl_arr = array();
$t_komfreight_divbran_moda_salesgp_shp = "";
$t_komfreight_divbran_moda_salesgp_shp_arr = array();
$t_komfreight_divbran_moda_salesgp_whs = "";
$t_komfreight_divbran_moda_salesgp_whs_arr = array();
$t_komfreight_divbran_moda_salesgp_trc = "";
$t_komfreight_divbran_moda_salesgp_trc_arr = array();
$t_komfreight_divbran_moda_salesgp_exp = "";
$t_komfreight_divbran_moda_salesgp_exp_arr = array();
$t_komfreight_divbran_moda_salesgp_spcpjt = "";
$t_komfreight_divbran_moda_salesgp_spcpjt_arr = array();
$t_komfreight_divbran_moda_salesgp_kai = "";
$t_komfreight_divbran_moda_salesgp_kai_arr = array();
 
$div_arr = array();
// foreach ($call_div as $keycall => $valcall) { 
      // echo $valcall['division'];
      // echo "<br>";
    foreach ($t_komfreight_divbran_moda as $key => $val) {
          // if ($valcall['division'] == $val['division']){

            if ($val['moda'] == "SEAFCL") {
                    $t_komfreight_divbran_moda_salesrevenue_seafcl .= "".$val['revenue'].",";
                    $t_komfreight_divbran_moda_salesrevenue_seafcl_arr[] = $val['revenue'];
                    $t_komfreight_divbran_moda_salesgp_seafcl .= "".$val['grossprofit'].",";
                    $t_komfreight_divbran_moda_salesgp_seafcl_arr[] = $val['grossprofit'];
              }elseif ($val['moda'] == "AIR") {
                    $t_komfreight_divbran_moda_salesrevenue_air .= "".$val['revenue'].",";
                    $t_komfreight_divbran_moda_salesrevenue_air_arr[] = $val['revenue'];
                    $t_komfreight_divbran_moda_salesgp_air .= "".$val['grossprofit'].",";
                    $t_komfreight_divbran_moda_salesgp_air_arr[] = $val['grossprofit'];
              }elseif ($val['moda'] == "CBR") {
                    $t_komfreight_divbran_moda_salesrevenue_cbr .= "".$val['revenue'].",";
                    $t_komfreight_divbran_moda_salesrevenue_cbr_arr[] = $val['revenue'];
                    $t_komfreight_divbran_moda_salesgp_cbr .= "".$val['grossprofit'].",";
                    $t_komfreight_divbran_moda_salesgp_cbd_arr[] = $val['grossprofit'];
              }elseif ($val['moda'] == "LOCSRV") {
                    $t_komfreight_divbran_moda_salesrevenue_locsrv .= "".$val['revenue'].",";
                    $t_komfreight_divbran_moda_salesrevenue_locsrv_arr[] = $val['revenue'];
                    $t_komfreight_divbran_moda_salesgp_locsrv .= "".$val['grossprofit'].",";
                    $t_komfreight_divbran_moda_salesgp_locsrv_arr[] = $val['grossprofit'];
              }elseif ($val['moda'] == "SEALCL") {
                    $t_komfreight_divbran_moda_salesrevenue_sealcl .= "".$val['revenue'].",";
                    $t_komfreight_divbran_moda_salesrevenue_sealcl_arr[] = $val['revenue'];
                    $t_komfreight_divbran_moda_salesgp_sealcl .= "".$val['grossprofit'].",";
                    $t_komfreight_divbran_moda_salesgp_sealcl_arr[] = $val['grossprofit'];
              }elseif ($val['moda'] == "SHP") {
                    $t_komfreight_divbran_moda_salesrevenue_shp .= "".$val['revenue'].",";
                    $t_komfreight_divbran_moda_salesrevenue_shp_arr[] = $val['revenue'];
                    $t_komfreight_divbran_moda_salesgp_shp .= "".$val['grossprofit'].",";
                    $t_komfreight_divbran_moda_salesgp_shp_arr[] = $val['grossprofit'];
              }elseif ($val['moda'] == "WHS") {
                    $t_komfreight_divbran_moda_salesrevenue_whs .= "".$val['revenue'].",";
                    $t_komfreight_divbran_moda_salesrevenue_whs_arr[] = $val['revenue'];
                    $t_komfreight_divbran_moda_salesgp_whs .= "".$val['grossprofit'].",";
                    $t_komfreight_divbran_moda_salesgp_whs_arr[] = $val['grossprofit'];
              }elseif ($val['moda'] == "TRC") {
                    $t_komfreight_divbran_moda_salesrevenue_trc .= "".$val['revenue'].",";
                    $t_komfreight_divbran_moda_salesrevenue_trc_arr[] = $val['revenue'];
                    $t_komfreight_divbran_moda_salesgp_trc .= "".$val['grossprofit'].",";
                    $t_komfreight_divbran_moda_salesgp_trc_arr[] = $val['grossprofit'];
              }elseif ($val['moda'] == "EXP") {
                    $t_komfreight_divbran_moda_salesrevenue_exp .= "".$val['revenue'].",";
                    $t_komfreight_divbran_moda_salesrevenue_exp_arr[] = $val['revenue'];
                    $t_komfreight_divbran_moda_salesgp_exp .= "".$val['grossprofit'].",";
                    $t_komfreight_divbran_moda_salesgp_exp_arr[] = $val['grossprofit'];
              }elseif ($val['moda'] == "SPCPJT") {
                    $t_komfreight_divbran_moda_salesrevenue_spcpjt .= "".$val['revenue'].",";
                    $t_komfreight_divbran_moda_salesrevenue_spcpjt_arr[] = $val['revenue'];
                    $t_komfreight_divbran_moda_salesgp_spcpjt .= "".$val['grossprofit'].",";
                    $t_komfreight_divbran_moda_salesgp_spcpjt_arr[] = $val['grossprofit'];
              }elseif ($val['moda'] == "KAI") {
                    $t_komfreight_divbran_moda_salesrevenue_kai .= "".$val['revenue'].",";
                    $t_komfreight_divbran_moda_salesrevenue_kai_arr[] = $val['revenue'];
                    $t_komfreight_divbran_moda_salesgp_kai .= "".$val['grossprofit'].",";
                    $t_komfreight_divbran_moda_salesgp_kai_arr[] = $val['grossprofit'];
              }else{
                        
              }


                // $t_komfreight_divbran_moda_date = "'".$val['bulan']." - ";
                // $t_komfreight_divbran_moda_date .= $val['tahun']."',";

                // $t_komfreight_divbran_moda_date_arr[] = $t_komfreight_divbran_moda_date;

                $t_komfreight_divbran_moda_division = "'".$val['division']."',";
                $t_komfreight_divbran_moda_division_arr[] = $t_komfreight_divbran_moda_division;
          
          // }
    }
// } 

// [30, 50, 20, 39, 96, 47, 110,]
$t_komfreight_divbran_moda_date_has = rtrim(implode(" ",array_unique($t_komfreight_divbran_moda_date_arr)), ",");
// echo $t_komfreight_divbran_moda_date_has;

 // untuk Bagian HORIZONTAL nya/ -- UNTUK YANG CURRENT MONTH/
 $t_komfreight_divbran_moda_division_has = rtrim(implode(" ",array_unique($t_komfreight_divbran_moda_division_arr)), ",");
 //end of untuk garis HORIZONTAL // 

$t_komfreight_divbran_moda_salesrevenue_seafcl = rtrim($t_komfreight_divbran_moda_salesrevenue_seafcl, ",");
$t_komfreight_divbran_moda_salesrevenue_air = rtrim($t_komfreight_divbran_moda_salesrevenue_air, ",");
$t_komfreight_divbran_moda_salesrevenue_cbr = rtrim($t_komfreight_divbran_moda_salesrevenue_cbr, ",");
$t_komfreight_divbran_moda_salesrevenue_locsrv = rtrim($t_komfreight_divbran_moda_salesrevenue_locsrv, ",");
$t_komfreight_divbran_moda_salesrevenue_sealcl = rtrim($t_komfreight_divbran_moda_salesrevenue_sealcl, ",");
$t_komfreight_divbran_moda_salesrevenue_shp = rtrim($t_komfreight_divbran_moda_salesrevenue_shp, ",");


$t_komfreight_divbran_moda_salesrevenue_whs = rtrim($t_komfreight_divbran_moda_salesrevenue_whs, ",");
$t_komfreight_divbran_moda_salesrevenue_trc = rtrim($t_komfreight_divbran_moda_salesrevenue_trc, ",");
$t_komfreight_divbran_moda_salesrevenue_exp = rtrim($t_komfreight_divbran_moda_salesrevenue_exp, ",");
$t_komfreight_divbran_moda_salesrevenue_kai = rtrim($t_komfreight_divbran_moda_salesrevenue_kai, ",");
$t_komfreight_divbran_moda_salesrevenue_spcpjt =rtrim($t_komfreight_divbran_moda_salesrevenue_spcpjt, ",");

// END OF 1.PHP QUERY  t_komfreight_divbran_moda UNTTUK STACKED BAR DIV BRANC PERFOMANCES  by MODA
//=============================================================


// $div_bran_moda = array();
// foreach ($call_div as $keydiv => $valdiv) {
$div_moda = array();
$terdata = array();
    foreach ($t_komfreight_divbran_moda as $key => $value) {
        
        foreach ($call_moda as $modakey => $modavalue) {
            if ($value['moda'] == $modavalue['moda']) {
                $terdata[] = $value['division']." ** ". $modavalue['moda'];
                $div_moda[] =
                    array(
                        'division' => $value['division'],
                        'moda' => $modavalue['moda'],
                        'revenue' => $value['revenue'], 
                        'cost' => $value['cost'],
                        'grossprofit' => $value['grossprofit']
                    );
            }

        }

    }

    // $div_bran_moda[] = $div_moda;
        // print_r($div_moda);
        // echo "<br>===============<br>";

    foreach ($t_komfreight_divbran_moda as $key => $value) {

        foreach ($call_moda as $modakey => $modavalue) {

            $sama = $value['division']." ** ". $modavalue['moda'];
            if (in_array($sama, $terdata)) {
                # code...
            }else{
                if ($value['moda'] == $modavalue['moda']) {

                }else{
                    $div_moda[] = 
                        array(
                            'division' => $value['division'],
                            'moda' => $modavalue['moda'],
                            'revenue' => 0, 
                            'cost' => 0,
                            'grossprofit' => 0
                        );
                }  
            }
            $terdata[] = $value['division']." ** ". $modavalue['moda'];
            
        }

    }

    $div_bran_moda = array();
    foreach ($call_div as $value) {
        foreach ($div_moda as $key2 => $value2) {
            if ($value['division'] == $value2['division']) {
                $div_bran_moda[] = $value2;
            }
        }
    }

    $SEAFCL_revenue = "";
    $SEALCL_revenue = "";
    $AIR_revenue = "";
    $SHP_revenue = "";
    $CBR_revenue = "";
    $LOCSRV_revenue = "";
    $WHS_revenue = "";
    $TRC_revenue = "";
    $EXP_revenue = "";
    $PROJECT_revenue = "";

    $SEAFCL_grossprofit = "";
    $SEALCL_grossprofit = "";
    $AIR_grossprofit = "";
    $SHP_grossprofit = "";
    $CBR_grossprofit = "";
    $LOCSRV_grossprofit = "";
    $WHS_grossprofit = "";
    $TRC_grossprofit = "";
    $EXP_grossprofit = "";
    $PROJECT_grossprofit = "";
    foreach ($div_bran_moda as $key => $value) {
            if ($value['moda'] == 'SEAFCL') {
                 $SEAFCL_revenue .= $value['revenue'].",";
                 $SEAFCL_grossprofit .= $value['grossprofit'].",";
            }

            if ($value['moda'] == 'SEALCL') {
                 $SEALCL_revenue .= $value['revenue'].",";
                 $SEALCL_grossprofit .= $value['grossprofit'].",";
            }

            if ($value['moda'] == 'AIR') {
                 $AIR_revenue .= $value['revenue'].",";
                 $AIR_grossprofit .= $value['grossprofit'].",";
            }

            if ($value['moda'] == 'SHP') {
                 $SHP_revenue .= $value['revenue'].",";
                 $SHP_grossprofit .= $value['grossprofit'].",";
            }

            if ($value['moda'] == 'CBR') {
                 $CBR_revenue .= $value['revenue'].",";
                 $CBR_grossprofit .= $value['grossprofit'].",";
            }

            if ($value['moda'] == 'LOCSRV') {
                 $LOCSRV_revenue .= $value['revenue'].",";
                 $LOCSRV_grossprofit .= $value['grossprofit'].",";
            }

            if ($value['moda'] == 'WHS') {
                 $WHS_revenue .= $value['revenue'].",";
                 $WHS_grossprofit .= $value['grossprofit'].",";
            }

            if ($value['moda'] == 'TRC') {
                 $TRC_revenue .= $value['revenue'].",";
                 $TRC_grossprofit .= $value['grossprofit'].",";
            }

            if ($value['moda'] == 'EXP') {
                 $EXP_revenue .= $value['revenue'].",";
                 $EXP_grossprofit .= $value['grossprofit'].",";
            }

            if ($value['moda'] == 'PROJECT') {
                 $PROJECT_revenue .= $value['revenue'].",";
                 $PROJECT_grossprofit .= $value['grossprofit'].",";
            }
    }

  
    


    //SEA FCL

        
    //=======================================
    //1.PHP QUERY --> $t_komfreight_seafcl --> UNTUK PIE CHART SEA FCL
    //=======================================

    $t_komfreight_seafcl_division = "";
    $t_komfreight_seafcl_division_arr = array();
    $t_komfreight_seafcl_qty = "";
    $t_komfreight_seafcl_jmlshipment = "";
    $t_komfreight_seafcl_salesrevenue = "";
    $t_komfreight_seafcl_salescost = "";
    $t_komfreight_seafcl_salesgp = "";
    $t_komfreight_seafcl_qty_arr = array();
    $t_komfreight_seafcl_jmlshipment_arr = array();
    $t_komfreight_seafcl_date_arr = array();
    $t_komfreight_seafcl_salesrevenue_arr = array();
    $t_komfreight_seafcl_salescost_arr = array();
    $t_komfreight_seafcl_salesgp_arr = array();

    $t_komfreight_seafcl_salesrevenue_gpilog = "";
    $t_komfreight_seafcl_salesrevenue_gml = "";
    $t_komfreight_seafcl_salesrevenue_glh = "";
    $t_komfreight_seafcl_salesrevenue_gtnsrg = "";
    $t_komfreight_seafcl_salesrevenue_gpimsrg = "";
    $t_komfreight_seafcl_salesrevenue_gtnbdj = "";
    $t_komfreight_seafcl_salesrevenue_gtnbtm = "";
    $t_komfreight_seafcl_salesrevenue_gtnlam = "";
    $t_komfreight_seafcl_salesrevenue_gpildps = "";
    $t_komfreight_seafcl_salesrevenue_gtnplm = "";
    $t_komfreight_seafcl_salesrevenue_ptk = "";
    $t_komfreight_seafcl_salesrevenue_mds = "";
    $t_komfreight_seafcl_salesrevenue_gpilbpn = "";
    $t_komfreight_seafcl_salesrevenue_gpiljkt = "";
    $t_komfreight_seafcl_salesrevenue_gpilsby = "";
    $t_komfreight_seafcl_salesrevenue_gpilho = "";
    $t_komfreight_seafcl_salesrevenue_gpil = "";
    $t_komfreight_seafcl_salesrevenue_gtnmac = "";
    $t_komfreight_seafcl_salesrevenue_gtnjkt = "";

    $t_komfreight_seafcl_salesrevenue_gpilog_arr = array();
    $t_komfreight_seafcl_salesrevenue_gml_arr = array();
    $t_komfreight_seafcl_salesrevenue_glh_arr = array();
    $t_komfreight_seafcl_salesrevenue_gtnsrg_arr = array();
    $t_komfreight_seafcl_salesrevenue_gpimsrg_arr = array();
    $t_komfreight_seafcl_salesrevenue_gtnbdj_arr = array();
    $t_komfreight_seafcl_salesrevenue_gtnbtm_arr = array();
    $t_komfreight_seafcl_salesrevenue_gtnlam_arr = array();
    $t_komfreight_seafcl_salesrevenue_gpildps_arr = array();
    $t_komfreight_seafcl_salesrevenue_gtnplm_arr = array();
    $t_komfreight_seafcl_salesrevenue_ptk_arr = array();
    $t_komfreight_seafcl_salesrevenue_mds_arr = array();
    $t_komfreight_seafcl_salesrevenue_gpilbpn_arr = array();
    
    $t_komfreight_seafcl_salesrevenue_gpil_arr = array();
    $t_komfreight_seafcl_salesrevenue_gpiljkt_arr = array();
    $t_komfreight_seafcl_salesrevenue_gpilsby_arr = array();
    $t_komfreight_seafcl_salesrevenue_gpilho_arr = array();
    $t_komfreight_seafcl_salesrevenue_gtnmac_arr = array();
    $t_komfreight_seafcl_salesrevenue_gtnjkt_arr = array();


    $t_komfreight_seafcl_qty_gpilog = "";
    $t_komfreight_seafcl_qty_gml = "";
    $t_komfreight_seafcl_qty_glh = "";
    $t_komfreight_seafcl_qty_gtnsrg = "";
    $t_komfreight_seafcl_qty_gpimsrg = "";
    $t_komfreight_seafcl_qty_gtnbdj = "";
    $t_komfreight_seafcl_qty_gtnbtm = "";
    $t_komfreight_seafcl_qty_gtnlam = "";
    $t_komfreight_seafcl_qty_gpildps = "";
    $t_komfreight_seafcl_qty_gtnplm = "";
    $t_komfreight_seafcl_qty_ptk = "";
    $t_komfreight_seafcl_qty_mds = "";
    $t_komfreight_seafcl_qty_gpilbpn = "";
    $t_komfreight_seafcl_qty_gpiljkt = "";
    $t_komfreight_seafcl_qty_gpilsby = "";
    $t_komfreight_seafcl_qty_gpilho = "";
    $t_komfreight_seafcl_qty_gpil = "";
    $t_komfreight_seafcl_qty_gtnmac = "";
    $t_komfreight_seafcl_qty_gtnjkt = "";

    $t_komfreight_seafcl_qty_gpilog_arr = array();
    $t_komfreight_seafcl_qty_gml_arr = array();
    $t_komfreight_seafcl_qty_glh_arr = array();
    $t_komfreight_seafcl_qty_gtnsrg_arr = array();
    $t_komfreight_seafcl_qty_gpimsrg_arr = array();
    $t_komfreight_seafcl_qty_gtnbdj_arr = array();
    $t_komfreight_seafcl_qty_gtnbtm_arr = array();
    $t_komfreight_seafcl_qty_gtnlam_arr = array();
    $t_komfreight_seafcl_qty_gpildps_arr = array();
    $t_komfreight_seafcl_qty_gtnplm_arr = array();
    $t_komfreight_seafcl_qty_ptk_arr = array();
    $t_komfreight_seafcl_qty_mds_arr = array();
    $t_komfreight_seafcl_qty_gpilbpn_arr = array();
    
    $t_komfreight_seafcl_qty_gpil_arr = array();
    $t_komfreight_seafcl_qty_gpiljkt_arr = array();
    $t_komfreight_seafcl_qty_gpilsby_arr = array();
    $t_komfreight_seafcl_qty_gpilho_arr = array();
    $t_komfreight_seafcl_qty_gtnmac_arr = array();
    $t_komfreight_seafcl_qty_gtnjkt_arr = array();

    foreach ($t_komfreight_seafcl as $key => $val) {
       // print_r( $val);

        

        if ($val['division'] == "GPI-LOG") {
            $t_komfreight_seafcl_qty_gpilog .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_gpilog_arr[] = $val['qty'];
        }elseif ($val['division'] == "GML") {
            $t_komfreight_seafcl_qty_gml .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_gml_arr[] = $val['qty'];
        }elseif ($val['division'] == "GLH") {
            $t_komfreight_seafcl_qty_glh .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_glh_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-SRG") {
            $t_komfreight_seafcl_qty_gtnsrg .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_gtnsrg_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIM-SRG") {
            $t_komfreight_seafcl_qty_gpimsrg .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_gpimsrg_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-BDJ") {
            $t_komfreight_seafcl_qty_gtnbdj .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_gtnbdj_arr[] = $val['qty'];       
        }elseif ($val['division'] == "GTN-BTM") {
            $t_komfreight_seafcl_qty_gtnbtm .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_gtnbtm_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-LAM") {
            $t_komfreight_seafcl_qty_gtnlam .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_gtnlam_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIL-DPS") {
            $t_komfreight_seafcl_qty_gpildps .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_gpildps_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-PLM") {
            $t_komfreight_seafcl_qty_gtnplm .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_gtnplm_arr[] = $val['qty'];
        }elseif ($val['division'] == "PTK") {
            $t_komfreight_seafcl_qty_ptk .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_ptk_arr[] = $val['qty'];
        }elseif ($val['division'] == "MDS") {
            $t_komfreight_seafcl_qty_mds .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_mds_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIL-BPN") {
            $t_komfreight_seafcl_qty_gpilbpn .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_gpilbpn_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIL") {
            $t_komfreight_seafcl_qty_gpiljkt .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_gpiljkt_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIL-SBY") {
            $t_komfreight_seafcl_qty_gpilsby .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_gpilsby_arr[] = $val['qty'];
      /*   }elseif ($val['division'] == "GPIL-HO") {
            $t_komfreight_seafcl_qty_gpilho .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_gpilho_arr[] = $val['qty']; */
        }elseif ($val['division'] == "GPIL") {
            $t_komfreight_seafcl_qty_gpil .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_gpil_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-MAC") {
            $t_komfreight_seafcl_qty_gtnmac .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_gtnmac_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-JKT") {
            $t_komfreight_seafcl_qty_gtnjkt .= "".$val['qty'].",";
            $t_komfreight_seafcl_qty_gtnjkt_arr[] = $val['qty'];
        }else{
        
        } 


        $t_komfreight_seafcl_qty .= "".$val['qty'].",";
        $t_komfreight_seafcl_salescost .= "".$val['cost'].",";
        $t_komfreight_seafcl_qty_arr[] = $val['qty'];
        $t_komfreight_seafcl_salescost_arr[] = $val['cost'];



        $t_komfreight_seafcl_division = "'".$val['division']."',";
        $t_komfreight_seafcl_division_arr[] =$t_komfreight_seafcl_division;


        
    }
    
    // untuk Bagian HORIZONTAL nya UNTUK YAL SALES PEROMANCE PER DIV BRANs//
    // [30, 50, 20, 39, 96, 47, 110,]
    $t_komfreight_seafcl_date_has = rtrim(implode(" ",array_unique($t_komfreight_seafcl_date_arr)), ",");
     $t_komfreight_seafcl_division_has = rtrim(implode(" ",array_unique($t_komfreight_seafcl_division_arr)), ",");
    $t_komfreight_seafcl_salesrevenue = rtrim($t_komfreight_seafcl_salesrevenue, ",");
    $t_komfreight_seafcl_qty = rtrim($t_komfreight_seafcl_qty, ",");
    //END OF ini untuk bagian VERTICAL nya

    //=======================================
    //END OF 1.PHP QUERY --> t_komfreight_seafcl --> UNTUK PIE CHART SEA FCL
    //=======================================

    //END OF SEA FCL




  




    
    //SEA LCL

        
    //=======================================
    //1.PHP QUERY --> $t_komfreight_seafcl --> UNTUK PIE CHART SEA lcl
    //=======================================

    $t_komfreight_sealcl_division = "";
    $t_komfreight_sealcl_division_arr = array();
    $t_komfreight_sealcl_qty = "";
    $t_komfreight_sealcl_jmlshipment = "";
    $t_komfreight_sealcl_salesrevenue = "";
    $t_komfreight_sealcl_salescost = "";
    $t_komfreight_sealcl_salesgp = "";
    $t_komfreight_sealcl_qty_arr = array();
    $t_komfreight_sealcl_jmlshipment_arr = array();
    $t_komfreight_sealcl_date_arr = array();
    $t_komfreight_sealcl_salesrevenue_arr = array();
    $t_komfreight_sealcl_salescost_arr = array();
    $t_komfreight_sealcl_salesgp_arr = array();

    $t_komfreight_sealcl_salesrevenue_gpilog = "";
    $t_komfreight_sealcl_salesrevenue_gml = "";
    $t_komfreight_sealcl_salesrevenue_glh = "";
    $t_komfreight_sealcl_salesrevenue_gtnsrg = "";
    $t_komfreight_sealcl_salesrevenue_gpimsrg = "";
    $t_komfreight_sealcl_salesrevenue_gtnbdj = "";
    $t_komfreight_sealcl_salesrevenue_gtnbtm = "";
    $t_komfreight_sealcl_salesrevenue_gtnlam = "";
    $t_komfreight_sealcl_salesrevenue_gpildps = "";
    $t_komfreight_sealcl_salesrevenue_gtnplm = "";
    $t_komfreight_sealcl_salesrevenue_ptk = "";
    $t_komfreight_sealcl_salesrevenue_mds = "";
    $t_komfreight_sealcl_salesrevenue_gpilbpn = "";
    $t_komfreight_sealcl_salesrevenue_gpiljkt = "";
    $t_komfreight_sealcl_salesrevenue_gpilsby = "";
    $t_komfreight_sealcl_salesrevenue_gpilho = "";
    $t_komfreight_sealcl_salesrevenue_gpil = "";
    $t_komfreight_sealcl_salesrevenue_gtnmac = "";
    $t_komfreight_sealcl_salesrevenue_gtnjkt = "";

    $t_komfreight_sealcl_salesrevenue_gpilog_arr = array();
    $t_komfreight_sealcl_salesrevenue_gml_arr = array();
    $t_komfreight_sealcl_salesrevenue_glh_arr = array();
    $t_komfreight_sealcl_salesrevenue_gtnsrg_arr = array();
    $t_komfreight_sealcl_salesrevenue_gpimsrg_arr = array();
    $t_komfreight_sealcl_salesrevenue_gtnbdj_arr = array();
    $t_komfreight_sealcl_salesrevenue_gtnbtm_arr = array();
    $t_komfreight_sealcl_salesrevenue_gtnlam_arr = array();
    $t_komfreight_sealcl_salesrevenue_gpildps_arr = array();
    $t_komfreight_sealcl_salesrevenue_gtnplm_arr = array();
    $t_komfreight_sealcl_salesrevenue_ptk_arr = array();
    $t_komfreight_sealcl_salesrevenue_mds_arr = array();
    $t_komfreight_sealcl_salesrevenue_gpilbpn_arr = array();
    
    $t_komfreight_sealcl_salesrevenue_gpil_arr = array();
    $t_komfreight_sealcl_salesrevenue_gpiljkt_arr = array();
    $t_komfreight_sealcl_salesrevenue_gpilsby_arr = array();
    $t_komfreight_sealcl_salesrevenue_gpilho_arr = array();
    $t_komfreight_sealcl_salesrevenue_gtnmac_arr = array();
    $t_komfreight_sealcl_salesrevenue_gtnjkt_arr = array();


    $t_komfreight_sealcl_qty_gpilog = "";
    $t_komfreight_sealcl_qty_gml = "";
    $t_komfreight_sealcl_qty_glh = "";
    $t_komfreight_sealcl_qty_gtnsrg = "";
    $t_komfreight_sealcl_qty_gpimsrg = "";
    $t_komfreight_sealcl_qty_gtnbdj = "";
    $t_komfreight_sealcl_qty_gtnbtm = "";
    $t_komfreight_sealcl_qty_gtnlam = "";
    $t_komfreight_sealcl_qty_gpildps = "";
    $t_komfreight_sealcl_qty_gtnplm = "";
    $t_komfreight_sealcl_qty_ptk = "";
    $t_komfreight_sealcl_qty_mds = "";
    $t_komfreight_sealcl_qty_gpilbpn = "";
    $t_komfreight_sealcl_qty_gpiljkt = "";
    $t_komfreight_sealcl_qty_gpilsby = "";
    $t_komfreight_sealcl_qty_gpilho = "";
    $t_komfreight_sealcl_qty_gpil = "";
    $t_komfreight_sealcl_qty_gtnmac = "";
    $t_komfreight_sealcl_qty_gtnjkt = "";

    $t_komfreight_sealcl_qty_gpilog_arr = array();
    $t_komfreight_sealcl_qty_gml_arr = array();
    $t_komfreight_sealcl_qty_glh_arr = array();
    $t_komfreight_sealcl_qty_gtnsrg_arr = array();
    $t_komfreight_sealcl_qty_gpimsrg_arr = array();
    $t_komfreight_sealcl_qty_gtnbdj_arr = array();
    $t_komfreight_sealcl_qty_gtnbtm_arr = array();
    $t_komfreight_sealcl_qty_gtnlam_arr = array();
    $t_komfreight_sealcl_qty_gpildps_arr = array();
    $t_komfreight_sealcl_qty_gtnplm_arr = array();
    $t_komfreight_sealcl_qty_ptk_arr = array();
    $t_komfreight_sealcl_qty_mds_arr = array();
    $t_komfreight_sealcl_qty_gpilbpn_arr = array();
    
    $t_komfreight_sealcl_qty_gpil_arr = array();
    $t_komfreight_sealcl_qty_gpiljkt_arr = array();
    $t_komfreight_sealcl_qty_gpilsby_arr = array();
    $t_komfreight_sealcl_qty_gpilho_arr = array();
    $t_komfreight_sealcl_qty_gtnmac_arr = array();
    $t_komfreight_sealcl_qty_gtnjkt_arr = array();

    foreach ($t_komfreight_sealcl as $key => $val) {
       // print_r( $val);

        

        if ($val['division'] == "GPI-LOG") {
            $t_komfreight_sealcl_qty_gpilog .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_gpilog_arr[] = $val['qty'];
        }elseif ($val['division'] == "GML") {
            $t_komfreight_sealcl_qty_gml .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_gml_arr[] = $val['qty'];
        }elseif ($val['division'] == "GLH") {
            $t_komfreight_sealcl_qty_glh .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_glh_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-SRG") {
            $t_komfreight_sealcl_qty_gtnsrg .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_gtnsrg_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIM-SRG") {
            $t_komfreight_sealcl_qty_gpimsrg .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_gpimsrg_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-BDJ") {
            $t_komfreight_sealcl_qty_gtnbdj .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_gtnbdj_arr[] = $val['qty'];       
        }elseif ($val['division'] == "GTN-BTM") {
            $t_komfreight_sealcl_qty_gtnbtm .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_gtnbtm_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-LAM") {
            $t_komfreight_sealcl_qty_gtnlam .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_gtnlam_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIL-DPS") {
            $t_komfreight_sealcl_qty_gpildps .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_gpildps_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-PLM") {
            $t_komfreight_sealcl_qty_gtnplm .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_gtnplm_arr[] = $val['qty'];
        }elseif ($val['division'] == "PTK") {
            $t_komfreight_sealcl_qty_ptk .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_ptk_arr[] = $val['qty'];
        }elseif ($val['division'] == "MDS") {
            $t_komfreight_sealcl_qty_mds .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_mds_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIL-BPN") {
            $t_komfreight_sealcl_qty_gpilbpn .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_gpilbpn_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIL") {
            $t_komfreight_sealcl_qty_gpiljkt .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_gpiljkt_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIL-SBY") {
            $t_komfreight_sealcl_qty_gpilsby .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_gpilsby_arr[] = $val['qty'];
      /*   }elseif ($val['division'] == "GPIL-HO") {
            $t_komfreight_sealcl_qty_gpilho .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_gpilho_arr[] = $val['qty']; */
        }elseif ($val['division'] == "GPIL") {
            $t_komfreight_sealcl_qty_gpil .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_gpil_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-MAC") {
            $t_komfreight_sealcl_qty_gtnmac .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_gtnmac_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-JKT") {
            $t_komfreight_sealcl_qty_gtnjkt .= "".$val['qty'].",";
            $t_komfreight_sealcl_qty_gtnjkt_arr[] = $val['qty'];
        }else{
        
        } 


        $t_komfreight_sealcl_qty .= "".$val['qty'].",";
        $t_komfreight_sealcl_salescost .= "".$val['cost'].",";
        $t_komfreight_sealcl_qty_arr[] = $val['qty'];
        $t_komfreight_sealcl_salescost_arr[] = $val['cost'];



        $t_komfreight_sealcl_division = "'".$val['division']."',";
        $t_komfreight_sealcl_division_arr[] =$t_komfreight_sealcl_division;


        
    }
    
    // untuk Bagian HORIZONTAL nya UNTUK YAL SALES PEROMANCE PER DIV BRANs//
    // [30, 50, 20, 39, 96, 47, 110,]
    $t_komfreight_sealcl_date_has = rtrim(implode(" ",array_unique($t_komfreight_sealcl_date_arr)), ",");
     $t_komfreight_sealcl_division_has = rtrim(implode(" ",array_unique($t_komfreight_sealcl_division_arr)), ",");
    $t_komfreight_sealcl_salesrevenue = rtrim($t_komfreight_sealcl_salesrevenue, ",");
    $t_komfreight_sealcl_qty = rtrim($t_komfreight_sealcl_qty, ",");
    //END OF ini untuk bagian VERTICAL nya

    //=======================================
    //END OF 1.PHP QUERY --> t_komfreight_sealcl --> UNTUK PIE CHART SEA LCL
    //=======================================

    //END OF SEA LCL













    
    //SHP

        
    //=======================================
    //1.PHP QUERY --> $t_komfreight_shp --> UNTUK PIE CHART SHP
    //=======================================

    $t_komfreight_shp_division = "";
    $t_komfreight_shp_division_arr = array();
    $t_komfreight_shp_qty = "";
    $t_komfreight_shp_jmlshipment = "";
    $t_komfreight_shp_salesrevenue = "";
    $t_komfreight_shp_salescost = "";
    $t_komfreight_shp_salesgp = "";
    $t_komfreight_shp_qty_arr = array();
    $t_komfreight_shp_jmlshipment_arr = array();
    $t_komfreight_shp_date_arr = array();
    $t_komfreight_shp_salesrevenue_arr = array();
    $t_komfreight_shp_salescost_arr = array();
    $t_komfreight_shp_salesgp_arr = array();

    $t_komfreight_shp_salesrevenue_gpilog = "";
    $t_komfreight_shp_salesrevenue_gml = "";
    $t_komfreight_shp_salesrevenue_glh = "";
    $t_komfreight_shp_salesrevenue_gtnsrg = "";
    $t_komfreight_shp_salesrevenue_gpimsrg = "";
    $t_komfreight_shp_salesrevenue_gtnbdj = "";
    $t_komfreight_shp_salesrevenue_gtnbtm = "";
    $t_komfreight_shp_salesrevenue_gtnlam = "";
    $t_komfreight_shp_salesrevenue_gpildps = "";
    $t_komfreight_shp_salesrevenue_gtnplm = "";
    $t_komfreight_shp_salesrevenue_ptk = "";
    $t_komfreight_shp_salesrevenue_mds = "";
    $t_komfreight_shp_salesrevenue_gpilbpn = "";
    $t_komfreight_shp_salesrevenue_gpiljkt = "";
    $t_komfreight_shp_salesrevenue_gpilsby = "";
    $t_komfreight_shp_salesrevenue_gpilho = "";
    $t_komfreight_shp_salesrevenue_gpil = "";
    $t_komfreight_shp_salesrevenue_gtnmac = "";
    $t_komfreight_shp_salesrevenue_gtnjkt = "";

    $t_komfreight_shp_salesrevenue_gpilog_arr = array();
    $t_komfreight_shp_salesrevenue_gml_arr = array();
    $t_komfreight_shp_salesrevenue_glh_arr = array();
    $t_komfreight_shp_salesrevenue_gtnsrg_arr = array();
    $t_komfreight_shp_salesrevenue_gpimsrg_arr = array();
    $t_komfreight_shp_salesrevenue_gtnbdj_arr = array();
    $t_komfreight_shp_salesrevenue_gtnbtm_arr = array();
    $t_komfreight_shp_salesrevenue_gtnlam_arr = array();
    $t_komfreight_shp_salesrevenue_gpildps_arr = array();
    $t_komfreight_shp_salesrevenue_gtnplm_arr = array();
    $t_komfreight_shp_salesrevenue_ptk_arr = array();
    $t_komfreight_shp_salesrevenue_mds_arr = array();
    $t_komfreight_shp_salesrevenue_gpilbpn_arr = array();
    
    $t_komfreight_shp_salesrevenue_gpil_arr = array();
    $t_komfreight_shp_salesrevenue_gpiljkt_arr = array();
    $t_komfreight_shp_salesrevenue_gpilsby_arr = array();
    $t_komfreight_shp_salesrevenue_gpilho_arr = array();
    $t_komfreight_shp_salesrevenue_gtnmac_arr = array();
    $t_komfreight_shp_salesrevenue_gtnjkt_arr = array();


    $t_komfreight_shp_qty_gpilog = "";
    $t_komfreight_shp_qty_gml = "";
    $t_komfreight_shp_qty_glh = "";
    $t_komfreight_shp_qty_gtnsrg = "";
    $t_komfreight_shp_qty_gpimsrg = "";
    $t_komfreight_shp_qty_gtnbdj = "";
    $t_komfreight_shp_qty_gtnbtm = "";
    $t_komfreight_shp_qty_gtnlam = "";
    $t_komfreight_shp_qty_gpildps = "";
    $t_komfreight_shp_qty_gtnplm = "";
    $t_komfreight_shp_qty_ptk = "";
    $t_komfreight_shp_qty_mds = "";
    $t_komfreight_shp_qty_gpilbpn = "";
    $t_komfreight_shp_qty_gpiljkt = "";
    $t_komfreight_shp_qty_gpilsby = "";
    $t_komfreight_shp_qty_gpilho = "";
    $t_komfreight_shp_qty_gpil = "";
    $t_komfreight_shp_qty_gtnmac = "";
    $t_komfreight_shp_qty_gtnjkt = "";

    $t_komfreight_shp_qty_gpilog_arr = array();
    $t_komfreight_shp_qty_gml_arr = array();
    $t_komfreight_shp_qty_glh_arr = array();
    $t_komfreight_shp_qty_gtnsrg_arr = array();
    $t_komfreight_shp_qty_gpimsrg_arr = array();
    $t_komfreight_shp_qty_gtnbdj_arr = array();
    $t_komfreight_shp_qty_gtnbtm_arr = array();
    $t_komfreight_shp_qty_gtnlam_arr = array();
    $t_komfreight_shp_qty_gpildps_arr = array();
    $t_komfreight_shp_qty_gtnplm_arr = array();
    $t_komfreight_shp_qty_ptk_arr = array();
    $t_komfreight_shp_qty_mds_arr = array();
    $t_komfreight_shp_qty_gpilbpn_arr = array();
    
    $t_komfreight_shp_qty_gpil_arr = array();
    $t_komfreight_shp_qty_gpiljkt_arr = array();
    $t_komfreight_shp_qty_gpilsby_arr = array();
    $t_komfreight_shp_qty_gpilho_arr = array();
    $t_komfreight_shp_qty_gtnmac_arr = array();
    $t_komfreight_shp_qty_gtnjkt_arr = array();

    foreach ($t_komfreight_shp as $key => $val) {
       // print_r( $val);

        

        if ($val['division'] == "GPI-LOG") {
            $t_komfreight_shp_qty_gpilog .= "".$val['qty'].",";
            $t_komfreight_shp_qty_gpilog_arr[] = $val['qty'];
        }elseif ($val['division'] == "GML") {
            $t_komfreight_shp_qty_gml .= "".$val['qty'].",";
            $t_komfreight_shp_qty_gml_arr[] = $val['qty'];
        }elseif ($val['division'] == "GLH") {
            $t_komfreight_shp_qty_glh .= "".$val['qty'].",";
            $t_komfreight_shp_qty_glh_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-SRG") {
            $t_komfreight_shp_qty_gtnsrg .= "".$val['qty'].",";
            $t_komfreight_shp_qty_gtnsrg_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIM-SRG") {
            $t_komfreight_shp_qty_gpimsrg .= "".$val['qty'].",";
            $t_komfreight_shp_qty_gpimsrg_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-BDJ") {
            $t_komfreight_shp_qty_gtnbdj .= "".$val['qty'].",";
            $t_komfreight_shp_qty_gtnbdj_arr[] = $val['qty'];       
        }elseif ($val['division'] == "GTN-BTM") {
            $t_komfreight_shp_qty_gtnbtm .= "".$val['qty'].",";
            $t_komfreight_shp_qty_gtnbtm_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-LAM") {
            $t_komfreight_shp_qty_gtnlam .= "".$val['qty'].",";
            $t_komfreight_shp_qty_gtnlam_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIL-DPS") {
            $t_komfreight_shp_qty_gpildps .= "".$val['qty'].",";
            $t_komfreight_shp_qty_gpildps_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-PLM") {
            $t_komfreight_shp_qty_gtnplm .= "".$val['qty'].",";
            $t_komfreight_shp_qty_gtnplm_arr[] = $val['qty'];
        }elseif ($val['division'] == "PTK") {
            $t_komfreight_shp_qty_ptk .= "".$val['qty'].",";
            $t_komfreight_shp_qty_ptk_arr[] = $val['qty'];
        }elseif ($val['division'] == "MDS") {
            $t_komfreight_shp_qty_mds .= "".$val['qty'].",";
            $t_komfreight_shp_qty_mds_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIL-BPN") {
            $t_komfreight_shp_qty_gpilbpn .= "".$val['qty'].",";
            $t_komfreight_shp_qty_gpilbpn_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIL") {
            $t_komfreight_shp_qty_gpiljkt .= "".$val['qty'].",";
            $t_komfreight_shp_qty_gpiljkt_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIL-SBY") {
            $t_komfreight_shp_qty_gpilsby .= "".$val['qty'].",";
            $t_komfreight_shp_qty_gpilsby_arr[] = $val['qty'];
      /*   }elseif ($val['division'] == "GPIL-HO") {
            $t_komfreight_shp_qty_gpilho .= "".$val['qty'].",";
            $t_komfreight_shp_qty_gpilho_arr[] = $val['qty']; */
        }elseif ($val['division'] == "GPIL") {
            $t_komfreight_shp_qty_gpil .= "".$val['qty'].",";
            $t_komfreight_shp_qty_gpil_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-MAC") {
            $t_komfreight_shp_qty_gtnmac .= "".$val['qty'].",";
            $t_komfreight_shp_qty_gtnmac_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-JKT") {
            $t_komfreight_shp_qty_gtnjkt .= "".$val['qty'].",";
            $t_komfreight_shp_qty_gtnjkt_arr[] = $val['qty'];
        }else{
        
        } 


        $t_komfreight_shp_qty .= "".$val['qty'].",";
        $t_komfreight_shp_salescost .= "".$val['cost'].",";
        $t_komfreight_shp_qty_arr[] = $val['qty'];
        $t_komfreight_shp_salescost_arr[] = $val['cost'];



        $t_komfreight_shp_division = "'".$val['division']."',";
        $t_komfreight_shp_division_arr[] =$t_komfreight_shp_division;


        
    }
    
    // untuk Bagian HORIZONTAL nya UNTUK YAL SALES PEROMANCE PER DIV BRANs//
    // [30, 50, 20, 39, 96, 47, 110,]
    $t_komfreight_shp_date_has = rtrim(implode(" ",array_unique($t_komfreight_shp_date_arr)), ",");
     $t_komfreight_shp_division_has = rtrim(implode(" ",array_unique($t_komfreight_shp_division_arr)), ",");
    $t_komfreight_shp_salesrevenue = rtrim($t_komfreight_shp_salesrevenue, ",");
    $t_komfreight_shp_qty = rtrim($t_komfreight_shp_qty, ",");
    //END OF ini untuk bagian VERTICAL nya

    //=======================================
    //END OF 1.PHP QUERY --> t_komfreight_shp --> UNTUK PIE CHART SHP
    //=======================================

    //END OF SHP









    
    
    //air

        
    //=======================================
    //1.PHP QUERY --> $t_komfreight_air --> UNTUK PIE CHART air
    //=======================================

    $t_komfreight_air_division = "";
    $t_komfreight_air_division_arr = array();
    $t_komfreight_air_qty = "";
    $t_komfreight_air_jmlshipment = "";
    $t_komfreight_air_salesrevenue = "";
    $t_komfreight_air_salescost = "";
    $t_komfreight_air_salesgp = "";
    $t_komfreight_air_qty_arr = array();
    $t_komfreight_air_jmlshipment_arr = array();
    $t_komfreight_air_date_arr = array();
    $t_komfreight_air_salesrevenue_arr = array();
    $t_komfreight_air_salescost_arr = array();
    $t_komfreight_air_salesgp_arr = array();

    $t_komfreight_air_salesrevenue_gpilog = "";
    $t_komfreight_air_salesrevenue_gml = "";
    $t_komfreight_air_salesrevenue_glh = "";
    $t_komfreight_air_salesrevenue_gtnsrg = "";
    $t_komfreight_air_salesrevenue_gpimsrg = "";
    $t_komfreight_air_salesrevenue_gtnbdj = "";
    $t_komfreight_air_salesrevenue_gtnbtm = "";
    $t_komfreight_air_salesrevenue_gtnlam = "";
    $t_komfreight_air_salesrevenue_gpildps = "";
    $t_komfreight_air_salesrevenue_gtnplm = "";
    $t_komfreight_air_salesrevenue_ptk = "";
    $t_komfreight_air_salesrevenue_mds = "";
    $t_komfreight_air_salesrevenue_gpilbpn = "";
    $t_komfreight_air_salesrevenue_gpiljkt = "";
    $t_komfreight_air_salesrevenue_gpilsby = "";
    $t_komfreight_air_salesrevenue_gpilho = "";
    $t_komfreight_air_salesrevenue_gpil = "";
    $t_komfreight_air_salesrevenue_gtnmac = "";
    $t_komfreight_air_salesrevenue_gtnjkt = "";

    $t_komfreight_air_salesrevenue_gpilog_arr = array();
    $t_komfreight_air_salesrevenue_gml_arr = array();
    $t_komfreight_air_salesrevenue_glh_arr = array();
    $t_komfreight_air_salesrevenue_gtnsrg_arr = array();
    $t_komfreight_air_salesrevenue_gpimsrg_arr = array();
    $t_komfreight_air_salesrevenue_gtnbdj_arr = array();
    $t_komfreight_air_salesrevenue_gtnbtm_arr = array();
    $t_komfreight_air_salesrevenue_gtnlam_arr = array();
    $t_komfreight_air_salesrevenue_gpildps_arr = array();
    $t_komfreight_air_salesrevenue_gtnplm_arr = array();
    $t_komfreight_air_salesrevenue_ptk_arr = array();
    $t_komfreight_air_salesrevenue_mds_arr = array();
    $t_komfreight_air_salesrevenue_gpilbpn_arr = array();
    
    $t_komfreight_air_salesrevenue_gpil_arr = array();
    $t_komfreight_air_salesrevenue_gpiljkt_arr = array();
    $t_komfreight_air_salesrevenue_gpilsby_arr = array();
    $t_komfreight_air_salesrevenue_gpilho_arr = array();
    $t_komfreight_air_salesrevenue_gtnmac_arr = array();
    $t_komfreight_air_salesrevenue_gtnjkt_arr = array();


    $t_komfreight_air_qty_gpilog = "";
    $t_komfreight_air_qty_gml = "";
    $t_komfreight_air_qty_glh = "";
    $t_komfreight_air_qty_gtnsrg = "";
    $t_komfreight_air_qty_gpimsrg = "";
    $t_komfreight_air_qty_gtnbdj = "";
    $t_komfreight_air_qty_gtnbtm = "";
    $t_komfreight_air_qty_gtnlam = "";
    $t_komfreight_air_qty_gpildps = "";
    $t_komfreight_air_qty_gtnplm = "";
    $t_komfreight_air_qty_ptk = "";
    $t_komfreight_air_qty_mds = "";
    $t_komfreight_air_qty_gpilbpn = "";
    $t_komfreight_air_qty_gpiljkt = "";
    $t_komfreight_air_qty_gpilsby = "";
    $t_komfreight_air_qty_gpilho = "";
    $t_komfreight_air_qty_gpil = "";
    $t_komfreight_air_qty_gtnmac = "";
    $t_komfreight_air_qty_gtnjkt = "";

    $t_komfreight_air_qty_gpilog_arr = array();
    $t_komfreight_air_qty_gml_arr = array();
    $t_komfreight_air_qty_glh_arr = array();
    $t_komfreight_air_qty_gtnsrg_arr = array();
    $t_komfreight_air_qty_gpimsrg_arr = array();
    $t_komfreight_air_qty_gtnbdj_arr = array();
    $t_komfreight_air_qty_gtnbtm_arr = array();
    $t_komfreight_air_qty_gtnlam_arr = array();
    $t_komfreight_air_qty_gpildps_arr = array();
    $t_komfreight_air_qty_gtnplm_arr = array();
    $t_komfreight_air_qty_ptk_arr = array();
    $t_komfreight_air_qty_mds_arr = array();
    $t_komfreight_air_qty_gpilbpn_arr = array();
    
    $t_komfreight_air_qty_gpil_arr = array();
    $t_komfreight_air_qty_gpiljkt_arr = array();
    $t_komfreight_air_qty_gpilsby_arr = array();
    $t_komfreight_air_qty_gpilho_arr = array();
    $t_komfreight_air_qty_gtnmac_arr = array();
    $t_komfreight_air_qty_gtnjkt_arr = array();

    foreach ($t_komfreight_air as $key => $val) {
       // print_r( $val);

        

        if ($val['division'] == "GPI-LOG") {
            $t_komfreight_air_qty_gpilog .= "".$val['qty'].",";
            $t_komfreight_air_qty_gpilog_arr[] = $val['qty'];
        }elseif ($val['division'] == "GML") {
            $t_komfreight_air_qty_gml .= "".$val['qty'].",";
            $t_komfreight_air_qty_gml_arr[] = $val['qty'];
        }elseif ($val['division'] == "GLH") {
            $t_komfreight_air_qty_glh .= "".$val['qty'].",";
            $t_komfreight_air_qty_glh_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-SRG") {
            $t_komfreight_air_qty_gtnsrg .= "".$val['qty'].",";
            $t_komfreight_air_qty_gtnsrg_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIM-SRG") {
            $t_komfreight_air_qty_gpimsrg .= "".$val['qty'].",";
            $t_komfreight_air_qty_gpimsrg_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-BDJ") {
            $t_komfreight_air_qty_gtnbdj .= "".$val['qty'].",";
            $t_komfreight_air_qty_gtnbdj_arr[] = $val['qty'];       
        }elseif ($val['division'] == "GTN-BTM") {
            $t_komfreight_air_qty_gtnbtm .= "".$val['qty'].",";
            $t_komfreight_air_qty_gtnbtm_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-LAM") {
            $t_komfreight_air_qty_gtnlam .= "".$val['qty'].",";
            $t_komfreight_air_qty_gtnlam_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIL-DPS") {
            $t_komfreight_air_qty_gpildps .= "".$val['qty'].",";
            $t_komfreight_air_qty_gpildps_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-PLM") {
            $t_komfreight_air_qty_gtnplm .= "".$val['qty'].",";
            $t_komfreight_air_qty_gtnplm_arr[] = $val['qty'];
        }elseif ($val['division'] == "PTK") {
            $t_komfreight_air_qty_ptk .= "".$val['qty'].",";
            $t_komfreight_air_qty_ptk_arr[] = $val['qty'];
        }elseif ($val['division'] == "MDS") {
            $t_komfreight_air_qty_mds .= "".$val['qty'].",";
            $t_komfreight_air_qty_mds_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIL-BPN") {
            $t_komfreight_air_qty_gpilbpn .= "".$val['qty'].",";
            $t_komfreight_air_qty_gpilbpn_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIL") {
            $t_komfreight_air_qty_gpiljkt .= "".$val['qty'].",";
            $t_komfreight_air_qty_gpiljkt_arr[] = $val['qty'];
        }elseif ($val['division'] == "GPIL-SBY") {
            $t_komfreight_air_qty_gpilsby .= "".$val['qty'].",";
            $t_komfreight_air_qty_gpilsby_arr[] = $val['qty'];
      /*   }elseif ($val['division'] == "GPIL-HO") {
            $t_komfreight_air_qty_gpilho .= "".$val['qty'].",";
            $t_komfreight_air_qty_gpilho_arr[] = $val['qty']; */
        }elseif ($val['division'] == "GPIL") {
            $t_komfreight_air_qty_gpil .= "".$val['qty'].",";
            $t_komfreight_air_qty_gpil_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-MAC") {
            $t_komfreight_air_qty_gtnmac .= "".$val['qty'].",";
            $t_komfreight_air_qty_gtnmac_arr[] = $val['qty'];
        }elseif ($val['division'] == "GTN-JKT") {
            $t_komfreight_air_qty_gtnjkt .= "".$val['qty'].",";
            $t_komfreight_air_qty_gtnjkt_arr[] = $val['qty'];
        }else{
        
        } 


        $t_komfreight_air_qty .= "".$val['qty'].",";
        $t_komfreight_air_salescost .= "".$val['cost'].",";
        $t_komfreight_air_qty_arr[] = $val['qty'];
        $t_komfreight_air_salescost_arr[] = $val['cost'];



        $t_komfreight_air_division = "'".$val['division']."',";
        $t_komfreight_air_division_arr[] =$t_komfreight_air_division;


        
    }
    
    // untuk Bagian HORIZONTAL nya UNTUK YAL SALES PEROMANCE PER DIV BRANs//
    // [30, 50, 20, 39, 96, 47, 110,]
    $t_komfreight_air_date_has = rtrim(implode(" ",array_unique($t_komfreight_air_date_arr)), ",");
     $t_komfreight_air_division_has = rtrim(implode(" ",array_unique($t_komfreight_air_division_arr)), ",");
    $t_komfreight_air_salesrevenue = rtrim($t_komfreight_air_salesrevenue, ",");
    $t_komfreight_air_qty = rtrim($t_komfreight_air_qty, ",");
    //END OF ini untuk bagian VERTICAL nya

    //=======================================
    //END OF 1.PHP QUERY --> t_komfreight_air --> UNTUK PIE CHART air
    //=======================================

    //END OF AIR

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

</style>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Main Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Main Dashboard </li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
</section>


<!-- Main content -->
   

<section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
         <!-- Small boxes (Stat box) -->
         <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                <h3><?php echo number_format(array_sum($t_komfreight_salesgp_arr),0)   ?></h3>
                   <p>In Million IDR</p>
                </div>
                <div class="icon">
                <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Total GP -  YTD<i ></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                <h3><?php echo  $t_komfreight_bestbranch_division;  ?></h3>
                   <p> <?php echo number_format($t_komfreight_bestbranch_salesgp,0)   ?> <b>(In Million IDR)</b></p>
                </div>
                <div class="icon">
                <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">Best GP Perfomances <i></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                
                <h3><?php echo number_format(array_sum($t_komfreight_currentmonth_salesgp_lm_arr),0)  ?></h3>

                <p><b>(In Million IDR)</b></p>
                </div>
                <div class="icon">
                <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">GP - Last Month<i ></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                <h3><?php echo number_format(array_sum($t_komfreight_currentmonth_salesrevenue_cm_arr),0)  ?></h3>
                <p><b>(In Million IDR)</b></p>
                </div>
                <div class="icon">
                <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">GP - Current Month <i></i></a>
              </div>
            </div>
            <!-- ./col -->
          </div>
         <!-- HEAD BOX-->



         
        <div class="row">  <!-- BUAT WOR DULU JANGAN LUPPAA -->
            <!-- =========MAIN CHART ==================  -->
            <!-- 2 . COPY HTML CHART (BAR, GARIS DLL)======================== -->
            <!-- =========MAIN CHART ==================  -->
            <section class="col-lg-12 connectedSortable">
            <div class="card">
                  <div class="card-header">
                      <h5 class="card-title">Monthly Recap Report <b>(in Million IDR)</b></h5>

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
                      <span><b>In Million IDR</b></span>
                    </p>
            
                  </div>
                          <div class="chart">
                          <!-- Sales Chart Canvas -->
                          <canvas id="t_salesChart" height="180" style="height: 180px;"></canvas>
                          </div>
                          <!-- /.chart-responsive -->
                      </div>

                      
                      <!-- /.col -->
                      <div class="col-md-3">
                          <p class="text-center">
                          <strong>GP Composition by Service Moda</strong>
                          </p>

                          <!--============Donut Chart ================-->

                          <div class="tab-content p-0">
                          <!-- Morris chart - Sales -->
                          <div class="chart tab-pane active" id="revenue-chart"
                              style="position: relative; height: 250px;">
                              <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>                     
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
                                  <li><span style='background:#f56954;'>SEAFCL</span></li>
                                  <li><span style='background:#045A8D;'>SEALCL</span></li>
                                  <li><span style='background:#00a65a;'>AIR</span></li>
                                  <li><span style='background:#f39c12;'>SHP</span></li>
                                  <li><span style='background:#00c0ef;'>CBR</span></li>
                                  <li><span style='background:#3ADF00;'>LOCSRV</span></li>
                                  <li><span style='background:#7259DE;'>WHS</span></li>
                                  <li><span style='background:#886A08;'>TRC</span></li>
                                  <li><span style='background:#01A9DB;'>EXP</span></li>
                                <!--   <li><span style='background:#D7DF01;'>PROJECT</span></li> -->
                                <!-- <li><span style='background:#3ADF00;'>KAIs</span></li> -->s
                              </ul>
                              <div class='legend-source'>Source: <a href="#link to source">KomFreight</a></div>
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
                          <h5 class="description-header"><?php echo number_format(array_sum($t_komfreight_salesrevenue_arr),2) ?></h5>
                          <span class="description-text">TOTAL REVENUE</span>
                          </div>
                          <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                          <span class="description-percentage text-danger"><i class="fas fa-caret-left"></i> 0%</span>
                          <h5 class="description-header"><?php echo number_format(array_sum($t_komfreight_salescost_arr),2) ?></h5>
                          <span class="description-text">TOTAL COST</span>
                          </div>
                          <!-- /.description-block -->
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-3 col-6">
                          <div class="description-block border-right">
                          <span class="description-percentage text-warning"><i class="fas fa-caret-up"></i> 0%</span>
                          <h5 class="description-header"><?php echo number_format(array_sum($t_komfreight_salesgp_arr),2) ?></h5>
                          <span class="description-text">TOTAL GP</span>
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
        

          <div class="row">  <!-- BUAT WOR DULU JANGAN LUPPAA -->
           <!-- ============2 . COPY HTML STACKED BAR CHART ======================== -->
           <!--========== STACKED BAR CHART ================ -->
            <section class="col-lg-12 connectedSortable">
              <div class="card">
                  <div class="card-header">
                      <h5 class="card-title">Gross Profit Perfomance by Divison / Branches <b>(in Million IDR)</b></h5>

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
                          <strong>GP Period: Jan - <?php echo $bulanTop  ."  ".  $tahun ; ?> </strong>
                          </p>
                          <div class="d-flex">
                    <p class="d-flex flex-column">
                      <!-- <span class="text-bold text-lg">820</span> -->
                      <span><b>In Million IDR</b></span>
                    </p>
            
                  </div>
                      <div class="chart">
                          <!-- Sales Chart Canvas -->
                          <canvas id="stackedBarChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                          </div>
                          <!-- /.chart-responsive -->
                      </div>

                      
                      <!-- /.col -->
                      <div class="col-md-4">
                          <p class="text-center">
                          <strong>GP Composition by Division/Branches</strong>
                          </p>

                          <!--============Donut Chart ================-->

                          <div class="tab-content p-0">
                          <!-- Morris chart - Sales -->
                          <div class="chart tab-pane active" id="revenue-chart"
                              style="position: relative; height: 300px;">
                              <canvas id="sales-chart-canvasbranch" height="300" style="height: 300px;"></canvas>                     
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

            </section>
          
          </div>  
           <!-- ============2 . COPY HTML STACKED BAR CHART ======================== -->
           <!--========== END OF STACKED BAR CHART ================ -->
        




          <!-- ===  KIRI KANAN KE 1 === -->
          <div class="row">  <!-- BUAT ROW UNTUK KIRI KANAN  DULU JANGAN LUPPAA -->  
 
            <!-- ===========Kiri ==============================-->
            <section class="col-lg-6 connectedSortable">

              <!--  KIRI - 1 Current Month -->
              <!-- start 2 . COPY HTML  BAR CHART PER DIVBRA -->
              <!-- <div class="card ">
                <div class="card-header">
                  <h3 class="card-title">Current Month - Division / Branches Sales Perfomance </h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">
                  <p class="d-flex flex-column">
                
                      <span><b>In Million IDR    -  Sales Perfomance Period  : <?php echo   $bulan.' - '. $tahun ; ?></b></span>
                    </p>
                    <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                </div> -->
                <!-- end  2. COPY HTML  BAR CHART PER DIVBRA -->
                <!-- ======================================== -->
                <!--  END KIRI - 1 Current Month -->



                <!-- KIRI 2  Division / Branches Sales Perfomanc -->
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Division / Branches Sales Perfomance </h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">   
                      <p class="text-center">
                              <strong>Sales Period: Jan - <?php echo $bulan ."  ".  $tahun ; ?> </strong>
                              </p>
                          <p class="d-flex flex-column">
                          <!-- <span class="text-bold text-lg">820</span> -->
                          <span><b>In Million IDR  </b></span>
                        </p>
                

                        <canvas id="stackedBarChart4" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                   <!-- END OF KIRI 2  Division / Branches Sales Perfomanc -->


                     <!-- KIRI 3 -->
                  <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Sales Perfomance by Service Moda </h3>

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
                            <span><b>In Million IDR    : Year <?php echo $tahun ; ?></b></span>
                          </p>


                          <canvas id="stackedBarChart2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                      </div>
                      <!-- /.card-body -->
                    </div>
            <!-- END OF KIRI 3 -->



                 <!-- KIRI 4 -->
                 <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Lifting Perfomance - SEA FCL (in TEUS)</h3>

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


                          <canvas id="piechartfcl" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 300%;"></canvas>
                        </div>
                      </div> <!-- /.card-body -->



                      <div class="card-footer">
                            <div class="row"> <!-- /.row yang ke 2 -->
                                <div class="col-sm-12 col-12">
                                  <div class="description-block border-right">
                                      <span class="description-percentage text-danger"><i class="fas fa-caret-left"></i> 0%</span>
                                      <h1 class="description-header"><?php echo number_format(array_sum($t_komfreight_seafcl_qty_arr),0) ?></h1>
                                      <span class="description-text">Total Qty SEA FCL (TEUS)</span>
                                  </div> <!-- /.description-block -->
                                </div>   <!-- /.col -->
                              </div>  <!-- /.row yang ke 2 -->
                          </div>  <!-- /.card-footer -->         
                        </div>  <!-- class="card"> -->
            <!-- END OF KIRI 4 -->



                 <!-- KIRI 5 -->
                 <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Lifting Perfomance - SHIPPING (in TEUS)</h3>

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


                          <canvas id="piechartshp" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 300%;"></canvas>
                        </div>
                      </div> <!-- /.card-body -->



                      <div class="card-footer">
                            <div class="row"> <!-- /.row yang ke 2 -->
                                <div class="col-sm-12 col-12">
                                  <div class="description-block border-right">
                                      <span class="description-percentage text-danger"><i class="fas fa-caret-left"></i> 0%</span>
                                      <h1 class="description-header"><?php echo number_format(array_sum($t_komfreight_shp_qty_arr),0) ?></h1>
                                      <span class="description-text">Total Qty SHIPPING (TEUS)</span>
                                  </div> <!-- /.description-block -->
                                </div>   <!-- /.col -->
                              </div>  <!-- /.row yang ke 2 -->
                          </div>  <!-- /.card-footer -->         
                        </div>  <!-- class="card"> -->
                 <!-- END OF KIRI 5 -->

            </section>
            <!-- =========== END OF Kiri ==============================-->



            <!------ ====== START Kanan =============-->
            <section class="col-lg-6 connectedSortable">
              
               <!-- Kanan 1 -->
              <!-- ===========  BAR CHART PER DIVBRAN GROSS PROFIT================-->
              <!-- ============2 . COPY HTML  BAR CHART PER DIVBRAN GROSS PROFIT======================== -->
                  <!-- <div class="card">
                  <div class="card-header">
                      <h3 class="card-title">Current Month - Gross Profit Perfomance</h3>

                      <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                      </div>
                  </div>
                  <div class="card-body">
                      <div class="chart">
                      <p class="d-flex flex-column">
                        
                          <span><b>In Million IDR    -   Gross Profit Perfomance Period  : <?php echo   $bulan.' - '. $tahun ; ?></b></span>
                      </p>
                      <canvas id="barChartgp" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                  </div>
              </div> -->
                  <!-- =========== END OF  BAR CHART PER DIVBRA GROSS PROFITN================-->
              <!-- ============END OF 2 . COPY HTML  BAR CHART PER DIVBRAN= GROSS PROFIT======================= -->
               <!-- END OF Kanan 1 -->





              <!-- Kanan 2 -->
              <div class="card ">
                <div class="card-header">
                  <h3 class="card-title">Division / Branches GP Perfomance </h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart">   
                  <p class="text-center">
                          <strong>Gross Profit Period: Jan - <?php echo $bulan ."  ".  $tahun ; ?> </strong>
                          </p>
                      <p class="d-flex flex-column">
                      <!-- <span class="text-bold text-lg">820</span> -->
                      <span><b>In Million IDR  </b></span>
                    </p>
            

                    <canvas id="stackedBarChart5" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
               <!-- END OF Kanan 2 -->




              <!-- KANAN 3 -->
               <div class="card ">
              <div class="card-header">
                <h3 class="card-title">Gross Profit Perfomance By Service Moda </h3>

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
                    <span><b>In Million IDR    : Year <?php echo $tahun ; ?></b></span>
                  </p>

                  <canvas id="stackedBarChart3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- END OF KANAN 3 -->



            <!-- KANAN 4 -->
            <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Lifting Perfomance - SEA LCL (in CBM)</h3>

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


                          <canvas id="piechartlcl" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 300%;"></canvas>
                        </div>
                      </div> <!-- /.card-body -->



                      <div class="card-footer">
                            <div class="row"> <!-- /.row yang ke 2 -->
                                <div class="col-sm-12 col-12">
                                  <div class="description-block border-right">
                                      <span class="description-percentage text-danger"><i class="fas fa-caret-left"></i> 0%</span>
                                      <h1 class="description-header"><?php echo number_format(array_sum($t_komfreight_sealcl_qty_arr),0) ?></h1>
                                      <span class="description-text">Total Qty SEA LCL (CBM)</span>
                                  </div> <!-- /.description-block -->
                                </div>   <!-- /.col -->
                              </div>  <!-- /.row yang ke 2 -->
                          </div>  <!-- /.card-footer -->         
                        </div>  <!-- class="card"> -->
            <!-- END OF KANAN 4 -->



            
            <!-- KANAN 5 -->
            <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">Lifting Perfomance - AIR (in Tonnage)</h3>

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


                          <canvas id="piechartair" style="min-height: 350px; height: 350px; max-height: 350px; max-width: 300%;"></canvas>
                        </div>
                      </div> <!-- /.card-body -->



                      <div class="card-footer">
                            <div class="row"> <!-- /.row yang ke 2 -->
                                <div class="col-sm-12 col-12">
                                  <div class="description-block border-right">
                                      <span class="description-percentage text-danger"><i class="fas fa-caret-left"></i> 0%</span>
                                      <h1 class="description-header"><?php echo number_format(array_sum($t_komfreight_air_qty_arr),0) ?></h1>
                                      <span class="description-text">Total Qty AIR (TON)</span>
                                  </div> <!-- /.description-block -->
                                </div>   <!-- /.col -->
                              </div>  <!-- /.row yang ke 2 -->
                          </div>  <!-- /.card-footer -->         
                        </div>  <!-- class="card"> -->
            <!-- END OF KANAN 4 -->
            </section>
            <!-- =========== END OF KANAN ==============================-->
            
            </div>   <!-- END -- OF ROW UNTUK KIRI KANAN  DULU JANGAN LUPPAA -->  
            <!-- ===  END OF KIRI KANAN KE 1 === -->










    </div><!-- /.container-fluid -->
  </section>
    <!-- /.content -->
















<script type="text/javascript">

      var mode      = 'index';
      var intersect = true;
      var ticksStyle = {
            fontColor: '#495057',
            fontStyle: 'bold'
          };
     //===============================================
       //3.  COPY SCRIPT JQUERY bar - t_salesChart -- MAIN CHART
      //===============================================
        var t_salesChartMonthly = document.getElementById('t_salesChart').getContext('2d');

        var t_salesChartData = {
            labels  : [<?php echo 	$t_komfreight_date  ?>],
            datasets: [
            {
                type                : 'line',
                label               : 'Revenue',
                backgroundColor     : '',
                borderColor         : '',
                pointRadius          : true,
                pointBorderColor    : 'blue',
                pointBackgroundColor: 'blue',
                pointColor          : 'blue',
                data                : [<?php echo $t_komfreight_salesrevenue ?>] // [30, 50, 20, 39, 96, 47, 110]
            },
            {
                label               : 'Cost',
                backgroundColor     : '#3c8dbc',
                borderColor         : '',
                pointRadius         : true,
                pointBorderColor    : 'red',
                pointBackgroundColor: 'red',
                pointColor          : 'red',
                pointStrokeColor    : '#3c8dbc',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: 'rgba(220,220,220,1)',
                data                : [<?php echo $t_komfreight_salescost ?>] //[30, 50, 20, 39, 96, 47, 110]
            },
            {
                label               : 'Gross Profit',
                backgroundColor     : '#B2D4EE',
                borderColor         : '',
                pointRadius         : true,
                pointBorderColor    : '#f39c12',
                pointBackgroundColor: '#f39c12',
                pointColor          : 'yellow',
                pointStrokeColor    : 'yellow',
                pointHighlightFill  : '#fff',
                pointHighlightStroke: '#f56954',
                data                : [<?php echo $t_komfreight_salesgp?>] //[30, 50, 20, 39, 96, 47, 110]
            }
            ]
        }

        var t_salesChartOptions = {
            maintainAspectRatio : false,
            responsive : true,
            legend: {
            display: false
            },
            scales: {
            xAxes: [{
                gridLines : {
                display : false,
                }
            }],
            yAxes: [{
                gridLines : {
                display : false,
                }
            }]
            }
        }

        var t_salesChart = new Chart(t_salesChartMonthly, { 
            type: 'line', 
            data: t_salesChartData, 
            options: t_salesChartOptions
            }
        )
        //==================================================
        //3. END OF COPY SCRIPT JQUERY bar - t_salesChart -- MAIN CHART
        //====================================================


        //==================================================
        //3. COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART
        //====================================================
        var pieChartCanvas = $('#sales-chart-canvas').get(0).getContext('2d')
        var pieData        = {
            labels: [
                'SEA FREIGHT - FCL', 
                'SEA FREIGHT - LCL', 
                'AIR FREIGHT',
                'SHIPPING',
                'CUSTOM BROKER', 
                'LOCAL SERVICE', 
                'WAREHOUSE', 
                'TRUCKING', 
                'EXPRESS', 
                'SPECIAL PROJECT', 
                'KAI', 
            ],
            datasets: [
            {
                data: [
                    <?php echo array_sum($t_komfreight_bar_salesgp_seafcl_arr) ?>,
                    <?php echo array_sum($t_komfreight_bar_salesgp_sealcl_arr) ?>,
                    <?php echo array_sum($t_komfreight_bar_salesgp_air_arr) ?>,
                    <?php echo array_sum($t_komfreight_bar_salesgp_shp_arr) ?>,
                    <?php echo array_sum($t_komfreight_bar_salesgp_cbr_arr) ?>,
                    <?php echo array_sum($t_komfreight_bar_salesgp_locsrv_arr) ?>,
                    <?php echo array_sum($t_komfreight_bar_salesgp_whs_arr) ?>,
                    <?php echo array_sum($t_komfreight_bar_salesgp_trc_arr) ?>,
                    <?php echo array_sum($t_komfreight_bar_salesgp_exp_arr) ?>,
                    <?php echo array_sum($t_komfreight_bar_salesgp_spcpjt_arr) ?>,
                    <?php echo array_sum($t_komfreight_bar_salesgp_kai_arr) ?>,
                    
                ],
                backgroundColor : ['#f56954', '#045A8D', '#00a65a', '#f39c12' ,'#00c0ef', '#3ADF00' , '#7259DE','#886A08','#01A9DB','#D7DF01', '#3ADF00',],
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
        //3. END OF COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART
        //====================================================




        //==================================================
        //3.  SCRIPT JQUERY DONUT CHART --- Gross profit Kecil
        //====================================================
        //donut chart 2
        var pieChartCanvas = $('#donutChart').get(0).getContext('2d')
        var pieData        = {
        labels: [
            'Total Revenue', 
            'Total Cost',
            'Sales GP', 
        ],
        datasets: [
          {
            data: [
            <?php echo array_sum($t_komfreight_salesrevenue_arr) ?>,
            <?php echo array_sum($t_komfreight_salescost_arr) ?>,
            <?php echo array_sum($t_komfreight_salesgp_arr) ?>,
            ],
            backgroundColor : ['#00a65a','#f56954','#f39c12'],
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
       //3.COPY SCRIPT JQUERY bar - t_komfreight-bar -- STACKEDBAR BARCHART
      //====================================================
        var areaChartData = {
            labels  : [<?php echo $t_komfreight_divbran_date_has ?>],
            datasets: [
               
                /* {
                label               : 'GPILOG',
                backgroundColor     : '#f56954', borderColor         : '#f56954', 
                pointRadius          : true,
                pointColor          : '#f56954', pointStrokeColor    : '#f56954',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#f56954',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_gpilog  ?>]
                },
                {
                label               : 'GML',
                backgroundColor     : '#045A8D', borderColor         : '#045A8D',  
                pointRadius         : true,
                pointColor          : '#045A8D', pointStrokeColor    : '#045A8D',
                pointHighlightFill  : '#fff', pointHighlightStroke   : '#045A8D',
                data                : [<?php echo $t_komfreight_divbran_salesgp_gml  ?>]
                },
                {
                label               : 'GLH',
                backgroundColor     : '#00a65a', borderColor         : '#00a65a',
                pointRadius         : true,
                pointColor          : '#00a65a', pointStrokeColor    : '#00a65a',
                pointHighlightFill  : '#fff', pointHighlightStroke   : '#00a65a',             
                data                : [<?php echo $t_komfreight_divbran_salesgp_glh  ?>]
                },
                 {
                label               : 'GPIM-SRG',
                backgroundColor     : '#00c0ef', borderColor         : '#00c0ef', 
                pointRadius          : true,
                pointColor          : '#00c0ef', pointStrokeColor    : '#00c0ef',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#00c0ef',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_gpimsrg  ?>]
                },
                 */
                {
                label               : 'GTN-SRG',
                backgroundColor     : '#f39c12', borderColor         : '#f39c12', 
                pointRadius          : true,
                pointColor          : '#f39c12', pointStrokeColor    : '#f39c12',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#f39c12',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_gtnsrg  ?>]
                },
                {
                label               : 'GTN-BDJ',
                backgroundColor     : '#08AA4E', borderColor         : '#08AA4E', 
                pointRadius          : true,
                pointColor          : '#08AA4E', pointStrokeColor    : '#08AA4E',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#08AA4E',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_gtnbdj  ?>]
                },
                {
                label               : 'GTN-BATAM',
                backgroundColor     : '#3ADF00', borderColor         : '#3ADF00', 
                pointRadius          : true,
                pointColor          : '#3ADF00', pointStrokeColor    : '#3ADF00',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#3ADF00',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_gtnbtm  ?>]
                },
                {
                label               : 'GPIL-DPS',
                backgroundColor     : '#7259DE', borderColor         : '#7259DE', 
                pointRadius          : true,
                pointColor          : '#7259DE', pointStrokeColor    : '#7259DE',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#7259DE',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_gpildps  ?>]
                },
                {
                label               : 'GTN-PLG',
                backgroundColor     : '#886A08', borderColor         : '#886A08', 
                pointRadius          : true,
                pointColor          : '#886A08', pointStrokeColor    : '#886A08',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#886A08',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_gtnbtm  ?>]
                },
                {
                label               : 'GTN-LAM',
                backgroundColor     : '#CBD6F8', borderColor         : '#CBD6F8', 
                pointRadius          : true,
                pointColor          : '#CBD6F8', pointStrokeColor    : '#CBD6F8',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#CBD6F8',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_gtnlam  ?>]
                }, 
                {
                label               : 'PNK',
                backgroundColor     : '#01A9DB', borderColor         : '#01A9DB', 
                pointRadius          : true,
                pointColor          : '#01A9DB', pointStrokeColor    : '#01A9DB',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#01A9DB',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_ptk  ?>]
                },
                { 
                label               : 'GPIL-BPN',
                backgroundColor     : '#D7DF01', borderColor         : '#D7DF01', 
                pointRadius          : true,
                pointColor          : '#D7DF01', pointStrokeColor    : '#D7DF01',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#D7DF01',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_gpilbpn  ?>]
                },
                {
                label               : 'GPIL-SUB',
                backgroundColor     : '#1B13F1', borderColor         : '#1B13F1', 
                pointRadius          : true,
                pointColor          : '#1B13F1', pointStrokeColor    : '#1B13F1',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#1B13F1',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_gpilsby  ?>]
                },
            /*     {
                label               : 'GPIL-HO',
                backgroundColor     : '#E47E43', borderColor         : '#E47E43', 
                pointRadius          : true,
                pointColor          : '#E47E43', pointStrokeColor    : '#E47E43',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#E47E43',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_gpilho  ?>]
                }, */
             /*    {
                label               : 'GPIL',
                backgroundColor     : '#E47E43', borderColor         : '#E47E43', 
                pointRadius          : true,
                pointColor          : '#E47E43', pointStrokeColor    : '#E47E43',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#E47E43',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_gpil  ?>]
                },  */
                {
                label               : 'GTN-MAC',
                backgroundColor     : '#ADFB07', borderColor         : '#ADFB07', 
                pointRadius          : true,
                pointColor          : '#ADFB07', pointStrokeColor    : '#ADFB07',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#ADFB07',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_gtnmac  ?>]
                },
                {
                label               : 'GTN-MEDAN',
                backgroundColor     : '#2D69A9', borderColor         : '#2D69A9', 
                pointRadius          : true,
                pointColor          : '#2D69A9', pointStrokeColor    : '#2D69A9',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#2D69A9',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_mds  ?>]
                },
              /*   {
                label               : 'GPIL-JKT',
                backgroundColor     : '#14AAA0', borderColor         : '#14AAA0', 
                pointRadius          : true,
                pointColor          : '#14AAA0', pointStrokeColor    : '#14AAA0',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#14AAA0',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_gpiljkt  ?>]
                }, */
                {
                label               : 'GTN-JKT',
                backgroundColor     : '#ee320a', borderColor         : '#ee320a', 
                pointRadius          : true,
                pointColor          : '#ee320a', pointStrokeColor    : '#ee320a',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#ee320a',
                data                : [<?php echo   $t_komfreight_divbran_salesgp_gtnjkt  ?>]
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
        //3. COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART
        //====================================================
        var pieChartCanvas = $('#sales-chart-canvasbranch').get(0).getContext('2d')
        var pieData        = {
            labels: [
            //   'GPILOG', 
            //     'GML', 
            //     'GLH',
            //  'GPIM-SRG', 
                'GTN-SRG',
                'GTN-BDJ',
                'GTN-BATAM',
                'GPIL-DPS',
                'GTN-PLG', 
                'GTN-LAM', 
                'GTN-PNK',          
                'GPIL-BPN', 
                'GPIL-SBY',
                // 'GPIL-HO',
                'GTN-MAC',
                'GTN-MEDAN', 
                'GPIL-JKT', 
                'GTN-JKT', 
            ],
            datasets: [
            {
                data: [
                     //echo array_sum($t_komfreight_divbran_salesgp_gpilog_arr) 
                     //echo array_sum($t_komfreight_divbran_salesgp_gml_arr)      
                   // echo array_sum($t_komfreight_divbran_salesgp_glh_arr) 
                    <?php echo array_sum($t_komfreight_divbran_salesgp_gtnsrg_arr) ?>,
                     // echo array_sum($t_komfreight_divbran_salesgp_gpimsrg_arr) 
                    <?php echo array_sum($t_komfreight_divbran_salesgp_gtnbdj_arr) ?>,
                    <?php echo array_sum($t_komfreight_divbran_salesgp_gtnbtm_arr) ?>,
                    <?php echo array_sum($t_komfreight_divbran_salesgp_gpildps_arr) ?>,
                    <?php echo array_sum($t_komfreight_divbran_salesgp_gtnplm_arr) ?>,
                    <?php echo array_sum($t_komfreight_divbran_salesgp_gtnlam_arr) ?>,
                    <?php echo array_sum($t_komfreight_divbran_salesgp_ptk_arr) ?>,
                    <?php echo array_sum($t_komfreight_divbran_salesgp_gpilbpn_arr) ?>,
                    <?php echo array_sum($t_komfreight_divbran_salesgp_gpilsby_arr) ?>,
                  // echo array_sum($t_komfreight_divbran_salesgp_gpilho_arr)
                    <?php echo array_sum($t_komfreight_divbran_salesgp_gtnmac_arr) ?>,
                    <?php echo array_sum($t_komfreight_divbran_salesgp_mds_arr) ?>,
                    <?php echo array_sum($t_komfreight_divbran_salesgp_gpiljkt_arr) ?>,
                    <?php echo array_sum($t_komfreight_divbran_salesgp_gtnjkt_arr) ?>
                ],
                backgroundColor : ['#f39c12', '#08AA4E', '#3ADF00' ,'#7259DE' ,'#886A08',  '#CBD6F8', '#01A9DB' , '#D7DF01', '#1B13F1' , '#ADFB07' ,'#2D69A9','#14AAA0' ,'#ee320a'],
         
                //backgroundColor : ['#f56954', '#045A8D', '#00a65a', '#f39c12','#00c0ef', '#08AA4E', '#3ADF00' ,'#7259DE' ,'#886A08',  '#CBD6F8', '#01A9DB' , '#D7DF01', '#1B13F1', '#E47E43' , '#ADFB07' ,'#2D69A9','#14AAA0' ,'#ee320a'],
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



      //==================================================
       //3. END OF COPY SCRIPT JQUERY bar - t_komfreight-bar -- STACKEDBAR BARCHART
      //====================================================


//end of stacked bar branch

/* 

      //==================================================
       //3.COPY SCRIPT JQUERY bar - t_komfreight_currentmonth_division -- BARCHART - CURRENT MONTH
      //====================================================
       //-------------
        //- BAR CHART -
        //-------------

        var areaChartData1 = {
            labels  : [<?php echo  $t_komfreight_currentmonth_division_has ?>],
            datasets: [
                {
                label               : 'LAST MONTH',
                backgroundColor     : '#045A8D', borderColor         : '#045A8D', 
                pointRadius          : true,
                pointColor          : '#045A8D', pointStrokeColor    : '#045A8D',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#045A8D',
                data                : [<?php echo   $t_komfreight_currentmonth_salesrevenue_lm  ?>]
                },
                {
                label               : 'CURRENT MONTH',
                backgroundColor     : '#f56954', borderColor         : '#f56954',  
                pointRadius         : true,
                pointColor          : '#f56954', pointStrokeColor    : '#f56954',
                pointHighlightFill  : '#fff', pointHighlightStroke   : '#f56954',
                data                : [<?php echo $t_komfreight_currentmonth_salesrevenue_cm  ?>]
                },
               
              
              
            ]
            }


        var barChartCanvas1 = $('#barChart').get(0).getContext('2d')
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
       //3. END OF COPY SCRIPT JQUERY bar - t_komfreight-bar -- BARCHART
      //====================================================

      //==================================================
       //3.COPY SCRIPT JQUERY bar - t_komfreight_currentmonth_division -- BARCHART - GROSSPROFIT
      //====================================================
       //-------------
        //- BAR CHART -
        //-------------

        var areaChartData1gp = {
            labels  : [<?php echo  $t_komfreight_currentmonth_division_has ?>],
            datasets: [
                {
                label               : 'LAST MONTH',
                backgroundColor     : '#09CC1D', borderColor         : '#09CC1D',  
                pointRadius         : true,
                pointColor          : '#09CC1D', pointStrokeColor    : '#09CC1D',
                pointHighlightFill  : '#fff', pointHighlightStroke   : '#09CC1D',
                data                : [<?php echo $t_komfreight_currentmonth_salesgp_lm  ?>]
                },
                {
                label               : 'CURRENT MONTH',
                backgroundColor     : '#f39c12', borderColor         : '#f39c12', 
                pointRadius          : true,
                pointColor          : '#f39c12', pointStrokeColor    : '#f39c12',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#f39c12',
                data                : [<?php echo   $t_komfreight_currentmonth_salesgp_cm  ?>]
                },

            ]
            }


        var barChartCanvas1 = $('#barChartgp').get(0).getContext('2d')
        var barChartData1gp = jQuery.extend(true, {}, areaChartData1gp)
        var temp0 = areaChartData1gp.datasets[0]
        var temp1 = areaChartData1gp.datasets[1]
        barChartData1gp.datasets[0] = temp1
        barChartData1gp.datasets[1] = temp0

        var barChartOptionsgp = {
        responsive              : true,
        maintainAspectRatio     : false,
        datasetFill             : false
        }

        var barChartgp = new Chart(barChartCanvas1, {
        type: 'bar', 
        data: barChartData1gp,
        options: barChartOptionsgp
        })
 */
      //==================================================
       //3. END OF COPY SCRIPT JQUERY bar - t_komfreight-bar -- BARCHART BARCHART - GROSSPROFIT
      //====================================================



      //==================================================
       //3.COPY SCRIPT JQUERY bar - t_komfreight-bar -- STACKEDBAR MODA SERVICE BARCHART
      //====================================================
      var areaChartData = {
            labels  : [<?php echo $t_komfreight_divbran_date_has ?>],
            datasets: [
              {
                label               : 'SEAFCL',
                backgroundColor     : '#f56954', borderColor         : '#f56954', 
                pointRadius          : true,
                pointColor          : '#f56954', pointStrokeColor    : '#f56954',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#f56954',
                data                : [<?php echo   $t_komfreight_bar_salesrevenue_seafcl  ?>]
                },
                {
                label               : 'SEALCL',
                backgroundColor     : '#045A8D', borderColor         : '#045A8D',  
                pointRadius         : true,
                pointColor          : '#045A8D', pointStrokeColor    : '#045A8D',
                pointHighlightFill  : '#fff', pointHighlightStroke   : '#045A8D',
                data                : [<?php echo $t_komfreight_bar_salesrevenue_sealcl  ?>]
                },
                {
                label               : 'AIR',
                backgroundColor     : '#00a65a', borderColor         : '#00a65a',
                pointRadius         : true,
                pointColor          : '#00a65a', pointStrokeColor    : '#00a65a',
                pointHighlightFill  : '#fff', pointHighlightStroke   : '#00a65a',             
                data                : [<?php echo $t_komfreight_bar_salesrevenue_air  ?>]
                },
                {
                label               : 'SHP',
                backgroundColor     : '#f39c12', borderColor         : '#f39c12', 
                pointRadius          : true,
                pointColor          : '#f39c12', pointStrokeColor    : '#f39c12',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#f39c12',
                data                : [<?php echo   $t_komfreight_bar_salesrevenue_shp  ?>]
                },
                {
                label               : 'CBR',
                backgroundColor     : '#00c0ef', borderColor         : '#00c0ef', 
                pointRadius          : true,
                pointColor          : '#00c0ef', pointStrokeColor    : '#00c0ef',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#00c0ef',
                data                : [<?php echo   $t_komfreight_bar_salesrevenue_cbr  ?>]
                },
                {
                label               : 'LOCSRV',
                backgroundColor     : '#3ADF00', borderColor         : '#3ADF00', 
                pointRadius          : true,
                pointColor          : '#3ADF00', pointStrokeColor    : '#3ADF00',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#3ADF00',
                data                : [<?php echo   $t_komfreight_bar_salesrevenue_locsrv  ?>]
                },
                {
                label               : 'WHS',
                backgroundColor     : '#7259DE', borderColor         : '#7259DE', 
                pointRadius          : true,
                pointColor          : '#7259DE', pointStrokeColor    : '#7259DE',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#7259DE',
                data                : [<?php echo   $t_komfreight_bar_salesrevenue_whs  ?>]
                },
                {
                label               : 'TRC',
                backgroundColor     : '#886A08', borderColor         : '#886A08', 
                pointRadius          : true,
                pointColor          : '#886A08', pointStrokeColor    : '#886A08',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#886A08',
                data                : [<?php echo   $t_komfreight_bar_salesrevenue_trc  ?>]
                },
             {
                label               : 'EXP',
                backgroundColor     : '#CBD6F8', borderColor         : '#CBD6F8', 
                pointRadius          : true,
                pointColor          : '#CBD6F8', pointStrokeColor    : '#CBD6F8',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#CBD6F8',
                data                : [<?php echo   $t_komfreight_bar_salesrevenue_exp  ?>]
                }, 
            /*     { 
                label               : 'PROJECT',
                backgroundColor     : '#D7DF01', borderColor         : '#D7DF01', 
                pointRadius          : true,
                pointColor          : '#D7DF01', pointStrokeColor    : '#D7DF01',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#D7DF01',
                data                : [<?php echo   $t_komfreight_bar_salesrevenue_spcpjt  ?>]
                }, */
               
              
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

            var stackedBarChartCanvas = $('#stackedBarChart2').get(0).getContext('2d')
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
      //==================================================
       //3. END OF COPY SCRIPT JQUERY bar - t_komfreight-bar -- STACKEDBAR MODA SERVICE BARCHART
      //====================================================




      //==================================================
       //3.COPY SCRIPT JQUERY bar - t_komfreight-bar -- STACKEDBAR GROSS PROFIT MODA SERVICE BARCHART
      //====================================================
      var areaChartData = {
            labels  : [<?php echo $t_komfreight_divbran_date_has ?>],
            datasets: [
              {
                label               : 'SEAFCL',
                backgroundColor     : '#f56954', borderColor         : '#f56954', 
                pointRadius          : true,
                pointColor          : '#f56954', pointStrokeColor    : '#f56954',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#f56954',
                data                : [<?php echo   $t_komfreight_bar_salesgp_seafcl  ?>]
                },
                {
                label               : 'SEALCL',
                backgroundColor     : '#045A8D', borderColor         : '#045A8D',  
                pointRadius         : true,
                pointColor          : '#045A8D', pointStrokeColor    : '#045A8D',
                pointHighlightFill  : '#fff', pointHighlightStroke   : '#045A8D',
                data                : [<?php echo $t_komfreight_bar_salesgp_sealcl  ?>]
                },
                {
                label               : 'AIR',
                backgroundColor     : '#00a65a', borderColor         : '#00a65a',
                pointRadius         : true,
                pointColor          : '#00a65a', pointStrokeColor    : '#00a65a',
                pointHighlightFill  : '#fff', pointHighlightStroke   : '#00a65a',             
                data                : [<?php echo $t_komfreight_bar_salesgp_air  ?>]
                },
                {
                label               : 'SHP',
                backgroundColor     : '#f39c12', borderColor         : '#f39c12', 
                pointRadius          : true,
                pointColor          : '#f39c12', pointStrokeColor    : '#f39c12',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#f39c12',
                data                : [<?php echo   $t_komfreight_bar_salesgp_shp  ?>]
                },
                {
                label               : 'CBR',
                backgroundColor     : '#00c0ef', borderColor         : '#00c0ef', 
                pointRadius          : true,
                pointColor          : '#00c0ef', pointStrokeColor    : '#00c0ef',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#00c0ef',
                data                : [<?php echo   $t_komfreight_bar_salesgp_cbr  ?>]
                },
                {
                label               : 'LOCSRV',
                backgroundColor     : '#3ADF00', borderColor         : '#3ADF00', 
                pointRadius          : true,
                pointColor          : '#3ADF00', pointStrokeColor    : '#3ADF00',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#3ADF00',
                data                : [<?php echo   $t_komfreight_bar_salesgp_locsrv  ?>]
                },
                {
                label               : 'WHS',
                backgroundColor     : '#7259DE', borderColor         : '#7259DE', 
                pointRadius          : true,
                pointColor          : '#7259DE', pointStrokeColor    : '#7259DE',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#7259DE',
                data                : [<?php echo   $t_komfreight_bar_salesgp_whs  ?>]
                },
                {
                label               : 'TRC',
                backgroundColor     : '#886A08', borderColor         : '#886A08', 
                pointRadius          : true,
                pointColor          : '#886A08', pointStrokeColor    : '#886A08',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#886A08',
                data                : [<?php echo   $t_komfreight_bar_salesgp_trc  ?>]
                },
             {
                label               : 'EXP',
                backgroundColor     : '#CBD6F8', borderColor         : '#CBD6F8', 
                pointRadius          : true,
                pointColor          : '#CBD6F8', pointStrokeColor    : '#CBD6F8',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#CBD6F8',
                data                : [<?php echo   $t_komfreight_bar_salesgp_exp  ?>]
                }, 
               /*  { 
                label               : 'PROJECT',
                backgroundColor     : '#D7DF01', borderColor         : '#D7DF01', 
                pointRadius          : true,
                pointColor          : '#D7DF01', pointStrokeColor    : '#D7DF01',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#D7DF01',
                data                : [<?php echo   $t_komfreight_bar_salesgp_spcpjt  ?>]
                }, */
               
              
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

            var stackedBarChartCanvas = $('#stackedBarChart3').get(0).getContext('2d')
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
      //==================================================
       //3. END OF COPY SCRIPT JQUERY bar - t_komfreight-bar -- STACKEDBAR GROSS PROFIT  MODA SERVICE BARCHART
      //====================================================



        

      //==================================================
       //3.COPY SCRIPT JQUERY bar - t_komfreight-bar -- STACKEDBAR G BRANCH DIVISION SALES BY  MOD
      //====================================================

      var areaChartData = {
            labels  : [<?php foreach ($call_div as $key => $value) {
                if ($value['division'] =='MDS') 
                  {
                    echo "'GTN-MEDAN',";
                  }
                  else 
                  { 
                  echo "'".$value['division']."',";
                }
            } ?>],
            datasets: [
              {
                label               : 'SEAFCL',
                backgroundColor     : '#f56954', borderColor         : '#f56954', 
                pointRadius          : true,
                pointColor          : '#f56954', pointStrokeColor    : '#f56954',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#f56954',
                data                : [<?php echo $SEAFCL_revenue; ?>]
                },
                {
                label               : 'SEALCL',
                backgroundColor     : '#045A8D', borderColor         : '#045A8D',  
                pointRadius         : true,
                pointColor          : '#045A8D', pointStrokeColor    : '#045A8D',
                pointHighlightFill  : '#fff', pointHighlightStroke   : '#045A8D',
                data                : [<?php echo $SEALCL_revenue; ?>]
                },
                {
                label               : 'AIR',
                backgroundColor     : '#00a65a', borderColor         : '#00a65a',
                pointRadius         : true,
                pointColor          : '#00a65a', pointStrokeColor    : '#00a65a',
                pointHighlightFill  : '#fff', pointHighlightStroke   : '#00a65a',             
                data                : [<?php echo $AIR_revenue; ?>]
                },
                {
                label               : 'SHP',
                backgroundColor     : '#f39c12', borderColor         : '#f39c12', 
                pointRadius          : true,
                pointColor          : '#f39c12', pointStrokeColor    : '#f39c12',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#f39c12',
                data                : [<?php echo $SHP_revenue; ?>]
                },
                {
                label               : 'CBR',
                backgroundColor     : '#00c0ef', borderColor         : '#00c0ef', 
                pointRadius          : true,
                pointColor          : '#00c0ef', pointStrokeColor    : '#00c0ef',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#00c0ef',
                data                : [<?php echo $CBR_revenue; ?>]
                },
                {
                label               : 'LOCSRV',
                backgroundColor     : '#3ADF00', borderColor         : '#3ADF00', 
                pointRadius          : true,
                pointColor          : '#3ADF00', pointStrokeColor    : '#3ADF00',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#3ADF00',
                data                : [<?php echo $LOCSRV_revenue; ?>]
                },
                {
                label               : 'WHS',
                backgroundColor     : '#7259DE', borderColor         : '#7259DE', 
                pointRadius          : true,
                pointColor          : '#7259DE', pointStrokeColor    : '#7259DE',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#7259DE',
                data                : [<?php echo $WHS_revenue; ?>]
                },
                {
                label               : 'TRC',
                backgroundColor     : '#886A08', borderColor         : '#886A08', 
                pointRadius          : true,
                pointColor          : '#886A08', pointStrokeColor    : '#886A08',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#886A08',
                data                : [<?php echo $TRC_revenue; ?>]
                },
                {
                label               : 'EXP',
                backgroundColor     : '#CBD6F8', borderColor         : '#CBD6F8', 
                pointRadius          : true,
                pointColor          : '#CBD6F8', pointStrokeColor    : '#CBD6F8',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#CBD6F8',
                data                : [<?php echo $EXP_revenue; ?>]
                }, 
              /*   { 
                label               : 'PROJECT',
                backgroundColor     : '#D7DF01', borderColor         : '#D7DF01', 
                pointRadius          : true,
                pointColor          : '#D7DF01', pointStrokeColor    : '#D7DF01',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#D7DF01',
                data                : [<?php echo $PROJECT_revenue; ?>]
                }, */
               
              
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

            var stackedBarChartCanvas = $('#stackedBarChart4').get(0).getContext('2d')
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
      //==================================================
       //3. END OF COPY SCRIPT JQUERY bar - t_komfreight-bar -- STACKEDBAR BRANCH DIVISION SALES BY  MODA      
        //====================================================



        

      //==================================================
       //3.COPY SCRIPT JQUERY bar - t_komfreight-bar -- STACKEDBAR GROSS PROFIT BRANCH DIVISION SALES BY  MOD
      //====================================================
      var areaChartData = {
            labels  : [<?php foreach ($call_div as $key => $value) {
                   if ($value['division'] =='MDS') 
                   {
                     echo "'GTN-MEDAN',";
                   }
                   else 
                   { 
                   echo "'".$value['division']."',";
                 }
            } ?>],
            datasets: [
              {
                label               : 'SEAFCL',
                backgroundColor     : '#f56954', borderColor         : '#f56954', 
                pointRadius          : true,
                pointColor          : '#f56954', pointStrokeColor    : '#f56954',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#f56954',
                data                : [<?php echo $SEAFCL_grossprofit; ?>]
                },
                {
                label               : 'SEALCL',
                backgroundColor     : '#045A8D', borderColor         : '#045A8D',  
                pointRadius         : true,
                pointColor          : '#045A8D', pointStrokeColor    : '#045A8D',
                pointHighlightFill  : '#fff', pointHighlightStroke   : '#045A8D',
                data                : [<?php echo $SEALCL_grossprofit; ?>]
                },
                {
                label               : 'AIR',
                backgroundColor     : '#00a65a', borderColor         : '#00a65a',
                pointRadius         : true,
                pointColor          : '#00a65a', pointStrokeColor    : '#00a65a',
                pointHighlightFill  : '#fff', pointHighlightStroke   : '#00a65a',             
                data                : [<?php echo $AIR_grossprofit; ?>]
                },
                {
                label               : 'SHP',
                backgroundColor     : '#f39c12', borderColor         : '#f39c12', 
                pointRadius          : true,
                pointColor          : '#f39c12', pointStrokeColor    : '#f39c12',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#f39c12',
                data                : [<?php echo $SHP_grossprofit; ?>]
                },
                {
                label               : 'CBR',
                backgroundColor     : '#00c0ef', borderColor         : '#00c0ef', 
                pointRadius          : true,
                pointColor          : '#00c0ef', pointStrokeColor    : '#00c0ef',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#00c0ef',
                data                : [<?php echo $CBR_grossprofit; ?>]
                },
                {
                label               : 'LOCSRV',
                backgroundColor     : '#3ADF00', borderColor         : '#3ADF00', 
                pointRadius          : true,
                pointColor          : '#3ADF00', pointStrokeColor    : '#3ADF00',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#3ADF00',
                data                : [<?php echo $LOCSRV_grossprofit; ?>]
                },
                {
                label               : 'WHS',
                backgroundColor     : '#7259DE', borderColor         : '#7259DE', 
                pointRadius          : true,
                pointColor          : '#7259DE', pointStrokeColor    : '#7259DE',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#7259DE',
                data                : [<?php echo $WHS_grossprofit; ?>]
                },
                {
                label               : 'TRC',
                backgroundColor     : '#886A08', borderColor         : '#886A08', 
                pointRadius          : true,
                pointColor          : '#886A08', pointStrokeColor    : '#886A08',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#886A08',
                data                : [<?php echo $TRC_grossprofit; ?>]
                },
             {
                label               : 'EXP',
                backgroundColor     : '#CBD6F8', borderColor         : '#CBD6F8', 
                pointRadius          : true,
                pointColor          : '#CBD6F8', pointStrokeColor    : '#CBD6F8',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#CBD6F8',
                data                : [<?php echo $EXP_grossprofit; ?>]
                }, 
             /*    { 
                label               : 'PROJECT',
                backgroundColor     : '#D7DF01', borderColor         : '#D7DF01', 
                pointRadius          : true,
                pointColor          : '#D7DF01', pointStrokeColor    : '#D7DF01',  
                pointHighlightFill  : '#fff',  pointHighlightStroke  : '#D7DF01',
                data                : [<?php echo $PROJECT_grossprofit; ?>]
                }, */
               
              
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

            var stackedBarChartCanvas = $('#stackedBarChart5').get(0).getContext('2d')
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
      //==================================================
       //3. END OF COPY SCRIPT JQUERY bar - t_komfreight-bar -- STACKEDBAR GROSS PROFIT BRANCH DIVISION SALES BY  MODA      
        //====================================================

        
        //SEA FCL

                
        //==================================================
        //3. COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART
        //====================================================
        var pieChartCanvas = $('#piechartfcl').get(0).getContext('2d')
        var pieData        = {
            labels: [
            //   'GPILOG', 
            //     'GML', 
            //     'GLH',
            //  'GPIM-SRG', 
                'GTN-SRG',
                'GTN-BDJ',
                'GTN-BATAM',
                'GPIL-DPS',
                'GTN-PLG', 
                'GTN-LAM', 
                'GTN-PNK',          
                'GPIL-BPN', 
                'GPIL-SBY',
                // 'GPIL-HO',
                'GTN-MAC',
                'GTN-MEDAN', 
                'GPIL-JKT', 
                'GTN-JKT', 
            ],
            datasets: [
            {
                data: [
                    //echo array_sum($t_komfreight_seafcl_qty_gpilog_arr) 
                    // echo array_sum($t_komfreight_seafcl_qty_gml_arr)       
                    //echo array_sum($t_komfreight_seafcl_qty_glh_arr) 
                   // echo array_sum($t_komfreight_seafcl_qty_gpimsrg_arr) 
                    <?php echo array_sum($t_komfreight_seafcl_qty_gtnsrg_arr) ?>,
                    <?php echo array_sum($t_komfreight_seafcl_qty_gtnbdj_arr) ?>,
                    <?php echo array_sum($t_komfreight_seafcl_qty_gtnbtm_arr) ?>,
                    <?php echo array_sum($t_komfreight_seafcl_qty_gpildps_arr) ?>,
                    <?php echo array_sum($t_komfreight_seafcl_qty_gtnplm_arr) ?>,
                    <?php echo array_sum($t_komfreight_seafcl_qty_gtnlam_arr) ?>,
                    <?php echo array_sum($t_komfreight_seafcl_qty_ptk_arr) ?>,
                    <?php echo array_sum($t_komfreight_seafcl_qty_gpilbpn_arr) ?>,
                    <?php echo array_sum($t_komfreight_seafcl_qty_gpilsby_arr) ?>,
                     //echo array_sum($t_komfreight_seafcl_qty_gpilho_arr) 
                    <?php echo array_sum($t_komfreight_seafcl_qty_gtnmac_arr) ?>,
                    <?php echo array_sum($t_komfreight_seafcl_qty_mds_arr) ?>,
                    <?php echo array_sum($t_komfreight_seafcl_qty_gpiljkt_arr) ?>,
                    <?php echo array_sum($t_komfreight_seafcl_qty_gtnjkt_arr) ?>
                ],
                backgroundColor : ['#f39c12', '#08AA4E', '#3ADF00' ,'#7259DE' ,'#886A08',  '#CBD6F8', '#01A9DB' , '#D7DF01', '#1B13F1' , '#ADFB07' ,'#2D69A9','#14AAA0' ,'#ee320a'],
         
              //  backgroundColor : ['#f56954', '#045A8D', '#00a65a', '#f39c12','#00c0ef', '#08AA4E', '#3ADF00' ,'#7259DE' ,'#886A08',  '#CBD6F8', '#01A9DB' , '#D7DF01', '#1B13F1', '#E47E43' , '#ADFB07' ,'#2D69A9','#14AAA0' ,'#ee320a'],
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
            type: 'doughnut',
            data: pieData,
            options: pieOptions      
        });


        //==================================================
        //3. END OF COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART BRANCH //stacked bar branch
        //=====

        //END OF SEAFCL





        //SEA LCL

                
        //==================================================
        //3. COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART
        //====================================================
        var pieChartCanvas = $('#piechartlcl').get(0).getContext('2d')
        var pieData        = {
            labels: [
          //   'GPILOG', 
            //     'GML', 
            //     'GLH',
            //  'GPIM-SRG', 
                'GTN-SRG',
                'GTN-BDJ',
                'GTN-BATAM',
                'GPIL-DPS',
                'GTN-PLG', 
                'GTN-LAM', 
                'GTN-PNK',          
                'GPIL-BPN', 
                'GPIL-SBY',
                // 'GPIL-HO',
                'GTN-MAC',
                'GTN-MEDAN', 
                'GPIL-JKT', 
                'GTN-JKT', 
            ],
            datasets: [
            {
                data: [
                    // echo array_sum($t_komfreight_sealcl_qty_gpilog_arr) 
                    // echo array_sum($t_komfreight_sealcl_qty_gml_arr)      
                   //echo array_sum($t_komfreight_sealcl_qty_glh_arr) 
                   //echo array_sum($t_komfreight_sealcl_qty_gpimsrg_arr)
                    <?php echo array_sum($t_komfreight_sealcl_qty_gtnsrg_arr) ?>,
                    <?php echo array_sum($t_komfreight_sealcl_qty_gtnbdj_arr) ?>,
                    <?php echo array_sum($t_komfreight_sealcl_qty_gtnbtm_arr) ?>,
                    <?php echo array_sum($t_komfreight_sealcl_qty_gpildps_arr) ?>,
                    <?php echo array_sum($t_komfreight_sealcl_qty_gtnplm_arr) ?>,
                    <?php echo array_sum($t_komfreight_sealcl_qty_gtnlam_arr) ?>,
                    <?php echo array_sum($t_komfreight_sealcl_qty_ptk_arr) ?>,
                    <?php echo array_sum($t_komfreight_sealcl_qty_gpilbpn_arr) ?>,
                    <?php echo array_sum($t_komfreight_sealcl_qty_gpilsby_arr) ?>,
                    //echo array_sum($t_komfreight_sealcl_qty_gpilho_arr) 
                    <?php echo array_sum($t_komfreight_sealcl_qty_gtnmac_arr) ?>,
                    <?php echo array_sum($t_komfreight_sealcl_qty_mds_arr) ?>,
                    <?php echo array_sum($t_komfreight_sealcl_qty_gpiljkt_arr) ?>,
                    <?php echo array_sum($t_komfreight_sealcl_qty_gtnjkt_arr) ?>
                ],

                backgroundColor : ['#f39c12', '#08AA4E', '#3ADF00' ,'#7259DE' ,'#886A08',  '#CBD6F8', '#01A9DB' , '#D7DF01', '#1B13F1' , '#ADFB07' ,'#2D69A9','#14AAA0' ,'#ee320a'],
         
              // backgroundColor : ['#f56954', '#045A8D', '#00a65a', '#f39c12','#00c0ef', '#08AA4E', '#3ADF00' ,'#7259DE' ,'#886A08',  '#CBD6F8', '#01A9DB' , '#D7DF01', '#1B13F1', '#E47E43' , '#ADFB07' ,'#2D69A9','#14AAA0' ,'#ee320a'],
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
            type: 'doughnut',
            data: pieData,
            options: pieOptions      
        });


        //==================================================
        //3. END OF COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART BRANCH //stacked bar branch
        //=====

        //END OF SEALCL







        //SHIPIING

                
        //==================================================
        //3. COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART
        //====================================================
        var pieChartCanvas = $('#piechartshp').get(0).getContext('2d')
        var pieData        = {
            labels: [
             //   'GPILOG', 
            //     'GML', 
            //     'GLH',
            //  'GPIM-SRG', 
            'GTN-SRG',
                'GTN-BDJ',
                'GTN-BATAM',
                'GPIL-DPS',
                'GTN-PLG', 
                'GTN-LAM', 
                'GTN-PNK',          
                'GPIL-BPN', 
                'GPIL-SBY',
                // 'GPIL-HO',
                'GTN-MAC',
                'GTN-MEDAN', 
                'GPIL-JKT', 
                'GTN-JKT', 
            ],
            datasets: [
            {
                data: [
                    //echo array_sum($t_komfreight_shp_qty_gpilog_arr) 
                     //echo array_sum($t_komfreight_shp_qty_gml_arr)     
                     //echo array_sum($t_komfreight_shp_qty_glh_arr) 
                      // echo array_sum($t_komfreight_shp_qty_gpimsrg_arr)
                    <?php echo array_sum($t_komfreight_shp_qty_gtnsrg_arr) ?>,
                  
                    <?php echo array_sum($t_komfreight_shp_qty_gtnbdj_arr) ?>,
                    <?php echo array_sum($t_komfreight_shp_qty_gtnbtm_arr) ?>,
                    <?php echo array_sum($t_komfreight_shp_qty_gpildps_arr) ?>,
                    <?php echo array_sum($t_komfreight_shp_qty_gtnplm_arr) ?>,
                    <?php echo array_sum($t_komfreight_shp_qty_gtnlam_arr) ?>,
                    <?php echo array_sum($t_komfreight_shp_qty_ptk_arr) ?>,
                    <?php echo array_sum($t_komfreight_shp_qty_gpilbpn_arr) ?>,
                    <?php echo array_sum($t_komfreight_shp_qty_gpilsby_arr) ?>,
                    //echo array_sum($t_komfreight_shp_qty_gpilho_arr) 
                    <?php echo array_sum($t_komfreight_shp_qty_gtnmac_arr) ?>,
                    <?php echo array_sum($t_komfreight_shp_qty_mds_arr) ?>,
                    <?php echo array_sum($t_komfreight_shp_qty_gpiljkt_arr) ?>,
                    <?php echo array_sum($t_komfreight_shp_qty_gtnjkt_arr) ?>
                ],
               
                backgroundColor : ['#f39c12', '#08AA4E', '#3ADF00' ,'#7259DE' ,'#886A08',  '#CBD6F8', '#01A9DB' , '#D7DF01', '#1B13F1' , '#ADFB07' ,'#2D69A9','#14AAA0' ,'#ee320a'],
         
                 // backgroundColor : ['#f56954', '#045A8D', '#00a65a', '#f39c12','#00c0ef', '#08AA4E', '#3ADF00' ,'#7259DE' ,'#886A08',  '#CBD6F8', '#01A9DB' , '#D7DF01', '#1B13F1', '#E47E43' , '#ADFB07' ,'#2D69A9','#14AAA0' ,'#ee320a'],

               
              
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
            type: 'doughnut',
            data: pieData,
            options: pieOptions      
        });


        //==================================================
        //3. END OF COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART BRANCH //stacked bar branch
        //=====

        //END OF SHIPPING





        //AIR

                
        //==================================================
        //3. COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART
        //====================================================
        var pieChartCanvas = $('#piechartair').get(0).getContext('2d')
        var pieData        = {
            labels: [
            //   'GPILOG', 
            //     'GML', 
            //     'GLH',
            //  'GPIM-SRG', 
            'GTN-SRG',
                'GTN-BDJ',
                'GTN-BATAM',
                'GPIL-DPS',
                'GTN-PLG', 
                'GTN-LAM', 
                'GTN-PNK',          
                'GPIL-BPN', 
                'GPIL-SBY',
                // 'GPIL-HO',
                'GTN-MAC',
                'GTN-MEDAN', 
                'GPIL-JKT', 
                'GTN-JKT', 
            ],
            datasets: [
            {
                data: [
                    //echo array_sum($t_komfreight_air_qty_gpilog_arr) 
                    // echo array_sum($t_komfreight_air_qty_gml_arr)       
                    // echo array_sum($t_komfreight_air_qty_glh_arr) 
                    //echo array_sum($t_komfreight_air_qty_gpimsrg_arr) 
                    <?php echo array_sum($t_komfreight_air_qty_gtnsrg_arr) ?>,
                   
                    <?php echo array_sum($t_komfreight_air_qty_gtnbdj_arr) ?>,
                    <?php echo array_sum($t_komfreight_air_qty_gtnbtm_arr) ?>,
                    <?php echo array_sum($t_komfreight_air_qty_gpildps_arr) ?>,
                    <?php echo array_sum($t_komfreight_air_qty_gtnplm_arr) ?>,
                    <?php echo array_sum($t_komfreight_air_qty_gtnlam_arr) ?>,
                    <?php echo array_sum($t_komfreight_air_qty_ptk_arr) ?>,
                    <?php echo array_sum($t_komfreight_air_qty_gpilbpn_arr) ?>,
                    <?php echo array_sum($t_komfreight_air_qty_gpilsby_arr) ?>,
                    //echo array_sum($t_komfreight_air_qty_gpilho_arr) 
                    <?php echo array_sum($t_komfreight_air_qty_gtnmac_arr) ?>,
                    <?php echo array_sum($t_komfreight_air_qty_mds_arr) ?>,
                    <?php echo array_sum($t_komfreight_air_qty_gpiljkt_arr) ?>,
                    <?php echo array_sum($t_komfreight_air_qty_gtnjkt_arr) ?>
                ],
                
           
                backgroundColor : ['#f39c12', '#08AA4E', '#3ADF00' ,'#7259DE' ,'#886A08',  '#CBD6F8', '#01A9DB' , '#D7DF01', '#1B13F1' , '#ADFB07' ,'#2D69A9','#14AAA0' ,'#ee320a'],
         
             // backgroundColor : ['#f56954', '#045A8D', '#00a65a', '#f39c12','#00c0ef', '#08AA4E', '#3ADF00' ,'#7259DE' ,'#886A08',  '#CBD6F8', '#01A9DB' , '#D7DF01', '#1B13F1', '#E47E43' , '#ADFB07' ,'#2D69A9','#14AAA0' ,'#ee320a'],

           
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
            type: 'doughnut',
            data: pieData,
            options: pieOptions      
        });


        //==================================================
        //3. END OF COPY SCRIPT JQUERY DONUT CHART - t_salesChart -- DONUT CHART BRANCH //stacked bar branch
        //=====

        //END OF AIR

    </script>
