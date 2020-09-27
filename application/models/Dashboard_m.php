<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_m extends CI_Model {


    public function t_boxops_branches($div)
	{
		$query = $this->db->query(' SELECT divbran,
                tahun,
                bulan,
                sum(jmlcont20) as jmlcont20,
                sum(jmlcont40) as jmlcont40,
                sum(jmlconttotal)  as jmlconttotal
                FROM
                v_jumlah_container
                WHERE divbran  = "'.$div.'"  
                AND reqstatus = 0 
                GROUP BY bulan, tahun, divbran');
      	return $query->result_array();
    }
    

    public function t_boxops_branches_pending_detail($div)
	{
		$query = $this->db->query(' SELECT divbran, requestno, requestdate,
                            sum(jmlcont20) as jmlcont20,
                            sum(jmlcont40) as jmlcont40,
                            sum(jmlconttotal)  as jmlconttotal
                            FROM
                            v_jumlah_container_dashboard
                            WHERE divbran  = "'.$div.'"   and reqstatus = 0 
                            GROUP BY divbran, requestno' );
         // print_r($this->db->last_query()); 
          return $query;
         
    }


    public function t_boxops_branches_approved($div)
	{
        $query = $this->db->query('  SELECT  X.divbran,
                            sum(X.jmlcont20) as jmlcont20,
                            sum(X.jmlcont40) as jmlcont40,
                            sum(X.jmlconttotal)  as jmlconttotal
                            FROM
                (SELECT
                                tx_req_container.divbran,
                                tx_req_container.donumber,
                                tx_req_container.dodate,
                                sum(( CASE WHEN( `tx_req_container_feeder`.`contsize` = 20) THEN `tx_req_container_feeder`.`contqty` END)) AS `jmlcont20` ,
                                        sum(( CASE WHEN( `tx_req_container_feeder`.`contsize` = 40) THEN `tx_req_container_feeder`.`contqty` END)) AS `jmlcont40` , 
                                sum( `tx_req_container_feeder`.`contqty`) AS jmlconttotal
                                FROM
                                tx_req_container
                                JOIN tx_req_container_feeder
                                ON tx_req_container.requestno = tx_req_container_feeder.requestno
                                WHERE divbran  = "'.$div.'"  
                                GROUP BY tx_req_container.divbran

                union
                SELECT
                                tx_req_container.divbran,
                                tx_req_container.donumber,
                                tx_req_container.dodate,
                                sum(( CASE WHEN( `tx_req_container_feeder`.`contsize` = 20) THEN `tx_req_container_feeder`.`contqty` END)) AS `jmlcont20` ,
                                        sum(( CASE WHEN( `tx_req_container_feeder`.`contsize` = 40) THEN `tx_req_container_feeder`.`contqty` END)) AS `jmlcont40` , 
                                sum( `tx_req_container_feeder`.`contqty`) AS jmlconttotal
                                FROM
                                tx_req_container
                                JOIN tx_req_container_feeder
                                ON tx_req_container.requestno = tx_req_container_feeder.requestno
                                WHERE divbran  = "GTN-JKT" and tx_req_container.donumber IN 
                (SELECT tx_req_container.donumber
                                FROM tx_req_container
                                JOIN tx_req_container_feeder
                                ON tx_req_container.requestno = tx_req_container_feeder.requestno
                WHERE divbran  = "'.$div.'"   )
                                GROUP BY tx_req_container.divbran) as X 
        ');

             // print_r($this->db->last_query()); 
          return $query->result_array();
          
    }
    

    public function t_boxops_branches_approved_detail($div)
	{
		$query = $this->db->query(' SELECT
        x_approval.donumberfeeder,
        tx_req_container.donumber,
        tx_req_container.dodate,
        tx_req_container.divbran,
        sum(x_approval.jml20approve) AS jmlcont20,
        sum(x_approval.jml40approve) AS jmlcont40,
        sum(jml20approve + jml40approve) AS jmlconttotal
        FROM
        x_approval
        JOIN y_container_feedersendiri
        ON x_approval.donumberfeeder = y_container_feedersendiri.donumberfeeder 
        JOIN tx_req_container
        ON y_container_feedersendiri.requestno = tx_req_container.requestno
        where tx_req_container.divbran = "'.$div.'" 
        GROUP BY
        x_approval.donumberfeeder,
        tx_req_container.divbran

        union
        SELECT
        x_approval.donumberfeeder,
        tx_req_container.donumber,
        tx_req_container.dodate,
        tx_req_container.divbran,
        sum(x_approval.jml20approve) AS jmlcont20,
        sum(x_approval.jml40approve) AS jmlcont40,
        sum(jml20approve + jml40approve) AS jmlconttotal
        FROM
        x_approval
        JOIN y_container_feedersendiri
        ON x_approval.donumberfeeder = y_container_feedersendiri.donumberfeeder 
        JOIN tx_req_container
        ON y_container_feedersendiri.requestno = tx_req_container.requestno
        where tx_req_container.divbran = "GTN-JKT"  and   tx_req_container.donumber in (
            SELECT tx_req_container.donumber
            FROM tx_req_container
            JOIN tx_req_container_feeder
            ON tx_req_container.requestno = tx_req_container_feeder.requestno
        WHERE divbran  = "'.$div.'"  
            )
        GROUP BY
        x_approval.donumberfeeder,
        tx_req_container.divbran
        
        
        
                ');

              //  print_r($this->db->last_query()); 
          return $query;
          
    }

  

    public function t_boxops_all_pending()
	{
		$query = $this->db->query(' SELECT divbran,
                tahun,
                bulan,
                sum(jmlcont20) as jmlcont20,
                sum(jmlcont40) as jmlcont40,
                sum(jmlconttotal)  as jmlconttotal
                FROM
                v_jumlah_container
                WHERE reqstatus = 0 
                GROUP BY bulan, tahun, divbran');
      	return $query->result_array();
    }
    
    public function t_boxops_all_pending_fordomestic()
	{
		$query = $this->db->query(' SELECT divbran,
                sum(jmlcont20) as jmlcont20,
                sum(jmlcont40) as jmlcont40,
                sum(jmlconttotal)  as jmlconttotal
                FROM
                v_jumlah_container
                WHERE reqstatus = 0 
                GROUP BY divbran');
      	return $query;
    }


    public function t_boxops_all_pending_detail()
	{
		$query = $this->db->query(' SELECT divbran, requestno, requestdate,
                sum(jmlcont20) as jmlcont20,
                sum(jmlcont40) as jmlcont40,
                sum(jmlconttotal)  as jmlconttotal
                FROM
                v_jumlah_container_dashboard
                WHERE reqstatus = 0 
                GROUP BY divbran, requestno');
      	return $query;
    }




    public function t_boxops_all_approved()
	{
        $query = $this->db->query('   SELECT
        
        sum(( CASE WHEN( `tx_req_container_feeder`.`contsize` = 20) THEN `tx_req_container_feeder`.`contqty` END)) AS `jmlcont20` ,
        sum(( CASE WHEN( `tx_req_container_feeder`.`contsize` = 40) THEN `tx_req_container_feeder`.`contqty` END)) AS `jmlcont40` , 
        sum( `tx_req_container_feeder`.`contqty`) AS jmlconttotal 
        FROM tx_req_container JOIN tx_req_container_feeder ON tx_req_container.requestno = tx_req_container_feeder.requestno
        ');
           

      	return $query->result_array();
    }



    public function t_boxops_all_approved_detail()
	{
		$query = $this->db->query(' SELECT 
                    donumberfeeder,
                    jml20approve as jmlcont20,
                    jml40approve as jmlcont40,
                    (jml20approve + jml40approve) as jmlconttotal
         from x_approval' );
      	return $query;
    }


    


	public function t_boxops()
	{
		$query = $this->db->query(' SELECT
                            tahun,
                            bulan,
                            sum(jmlcont20) as jmlcont20,
                            sum(jmlcont40) as jmlcont40,
                            sum(jmlconttotal)  as jmlconttotal
                            FROM
                            v_jumlah_container
                            GROUP BY bulan, tahun');
      	return $query->result_array();
    }
    




    public function t_boxops_divbran()
	{
		$query = $this->db->query(' SELECT
                            tahun,
                            bulan,
                            divbran,
                            sum(jmlcont20) as jmlcont20,
                            sum(jmlcont40) as jmlcont40,
                            sum(jmlconttotal)  as jmlconttotal,
                            sum(jmlcont20aprv) as jmlcont20aprv,
                            sum(jmlcont40aprv) as jmlcont40aprv,
                            sum(jmlconttotalaprv)  as jmlconttotalaprv
                            FROM
                            v_jumlah_container
                            GROUP BY bulan, tahun, divbran');

        return $query->result_array();
    }

    public function t_boxops_divbran_noperiod()
	{
		$query = $this->db->query(' SELECT

                            divbran,
                            tahun,
                            bulan,
                            sum(jmlcont20) as jmlcont20,
                            sum(jmlcont40) as jmlcont40,
                            sum(jmlconttotal)  as jmlconttotal,
                            sum(jmlcont20aprv) as jmlcont20aprv,
                            sum(jmlcont40aprv) as jmlcont40aprv,
                            sum(jmlconttotalaprv)  as jmlconttotalaprv
                            FROM
                            v_jumlah_container
                            GROUP BY  divbran');

        return $query->result_array();
    }


    public function t_boxops_divbran_div($div)
	{
		$query = $this->db->query(' SELECT
                            tahun,
                            bulan,
                            divbran,
                            sum(jmlcont20) as jmlcont20,
                            sum(jmlcont40) as jmlcont40,
                            sum(jmlconttotal)  as jmlconttotal,
                            sum(jmlcont20aprv) as jmlcont20aprv,
                            sum(jmlcont40aprv) as jmlcont40aprv,
                            sum(jmlconttotalaprv)  as jmlconttotalaprv
                            FROM
                            v_jumlah_container
                            WHERE divbran  = "'.$div.'"  
                            GROUP BY bulan, tahun, divbran');

        return $query->result_array();
    }

    
    public function t_boxops_movement()
	{
		$query = $this->db->query('  SELECT
                    count(containerno) as jmlcont,
                    movestatus,
                    movedate
                    FROM
                    tx_mov_container
                    group by movestatus
                    ');

        return $query->result_array();
    }


        
    public function t_boxops_active()
	{
		$query = $this->db->query('  SELECT 
                sum(( CASE WHEN( `v_container_activedo`.`contsize` = 20) THEN 1 END)) AS `jmlcont20` , 
                sum(( CASE WHEN( `v_container_activedo`.`contsize` = 40) THEN 1 END)) AS `jmlcont40` 
                FROM v_container_activedo
                    ');

        return $query->result_array();
    }



    public function t_boxops_active_detail()
	{
		$query = $this->db->query(' SELECT 
                    donumber,
                    jmlcont20,
                    jmlcont40,
                    (jmlcont20 + jmlcont40) as jmlconttotal
                    from a_total_activedo' );
      	return $query;
    }





    public function t_boxops_active_branch($div)
	{
		$query = $this->db->query('  SELECT 
                sum(( CASE WHEN( `v_container_activedobranch`.`contsize` = 20) THEN 1 END)) AS `jmlcont20` , 
                sum(( CASE WHEN( `v_container_activedobranch`.`contsize` = 40) THEN 1 END)) AS `jmlcont40` 
                FROM v_container_activedobranch
                WHERE divbran = "'.$div.'"  
                    ');

        return $query->result_array();
    }



    public function t_boxops_active_branch_detail($div)
	{
		$query = $this->db->query(' SELECT
            a_total_activedo.donumber as donumberfeeder ,
            tx_req_container.donumber ,
            tx_req_container.dodate,
            tx_req_container.divbran,
            sum(a_total_activedo.jmlcont20) as jmlcont20,
            sum(a_total_activedo.jmlcont40) as  jmlcont40
            FROM
            a_total_activedo
            JOIN y_container_feedersendiri
            ON a_total_activedo.donumber = y_container_feedersendiri.donumberfeeder 
            JOIN tx_req_container
            ON y_container_feedersendiri.requestno = tx_req_container.requestno
            WHERE  tx_req_container.divbran = "'.$div.'"  
            group by a_total_activedo.donumber, tx_req_container.divbran' );
          return $query;
        //  print_r($this->db->last_query()); 
    }




    public function t_boxops_active_domestic($div)
	{
		$query = $this->db->query('  SELECT 
                sum(( CASE WHEN( `v_container_activedodomestic`.`contsize` = 20) THEN 1 END)) AS `jmlcont20` , 
                sum(( CASE WHEN( `v_container_activedodomestic`.`contsize` = 40) THEN 1 END)) AS `jmlcont40` 
                FROM v_container_activedodomestic
                WHERE divbran = "'.$div.'"  
                    ');

        return $query->result_array();
    }
    
    
    public function t_boxops_complete()
	{
		$query = $this->db->query('  SELECT 
                sum(( CASE WHEN( `v_container_complete`.`contsize` = 20) THEN 1 END)) AS `jmlcont20` , 
                sum(( CASE WHEN( `v_container_complete`.`contsize` = 40) THEN 1 END)) AS `jmlcont40` 
                FROM v_container_complete
                    ');

        return $query->result_array();
    }



    public function t_boxops_complete_detail()
	{
		$query = $this->db->query(' SELECT 
                    donumber,
                    jmlcont20,
                    jmlcont40,
                    (jmlcont20 + jmlcont40) as jmlconttotal
                    from a_total_complete' );
      	return $query;
    }




    public function t_boxops_complete_branch($div)
	{
		$query = $this->db->query('  SELECT 
                sum(( CASE WHEN( `v_container_completebranch`.`contsize` = 20) THEN 1 END)) AS `jmlcont20` , 
                sum(( CASE WHEN( `v_container_completebranch`.`contsize` = 40) THEN 1 END)) AS `jmlcont40` 
                FROM v_container_completebranch
                WHERE divbran = "'.$div.'"  
                    ');

        return $query->result_array();
    }



    public function t_boxops_complete_branch_detail($div)
	{
		$query = $this->db->query(' SELECT
        a_total_complete.donumber as donumberfeeder ,
        tx_req_container.donumber ,
        tx_req_container.dodate,
        tx_req_container.divbran,
        sum(a_total_complete.jmlcont20) as jmlcont20,
        sum(a_total_complete.jmlcont40) as  jmlcont40
        FROM
        a_total_complete
        JOIN y_container_feedersendiri
        ON a_total_complete.donumber = y_container_feedersendiri.donumberfeeder 
        JOIN tx_req_container
        ON y_container_feedersendiri.requestno = tx_req_container.requestno
        WHERE  tx_req_container.divbran = "'.$div.'"  
        group by a_total_complete.donumber, tx_req_container.divbran
        ');

      	return $query;
    }




    public function t_boxops_complete_domestic($div)
	{
		$query = $this->db->query('  SELECT 
                sum(( CASE WHEN( `v_container_completedomestic`.`contsize` = 20) THEN 1 END)) AS `jmlcont20` , 
                sum(( CASE WHEN( `v_container_completedomestic`.`contsize` = 40) THEN 1 END)) AS `jmlcont40` 
                FROM v_container_completedomestic
                WHERE divbran = "'.$div.'"  
                    ');

        return $query->result_array();
    }







    public function t_boxops_feeder()
	{
		$query = $this->db->query('  SELECT
                    count(containerno) as jmlcont,
                    feedercode
                    FROM
                    tx_mov_container
                    group by feedercode
                    ');

        return $query->result_array();
    }


	public function t_komfreight_bar()
	{
		$query = $this->db->query('select 
                    bulan, tahun, moda,
                    SUM(qty) AS qty, 
                    SUM(jmlshipment) AS jmlshipment,
                    ROUND(SUM(revenue/1000000),2)  AS revenue, 
                    ROUND(SUM(cost/1000000),2)  AS cost, 
                    ROUND(SUM(grossprofit/1000000),2) AS grossprofit
                    from t_komfreight 
                    WHERE division <> "GPIL-HO" and  tahun > "2010"
					GROUP BY  bulan, tahun, moda');
      	return $query->result_array();
	}

    public function t_komfreight_divbran()
	{
		$query = $this->db->query('select 
                    bulan, tahun, division,
                    SUM(qty) AS qty, 
                    SUM(jmlshipment) AS jmlshipment,
                    ROUND(SUM(revenue/1000000),2)  AS revenue, 
                    ROUND(SUM(cost/1000000),2)  AS cost, 
                    ROUND(SUM(grossprofit/1000000),2) AS grossprofit
                    from t_komfreight 
                    WHERE division <> "GPIL-HO" and tahun > "2010"
                    GROUP BY division, bulan, tahun
                    order by bulan , tahun, division asc');
      	return $query->result_array();
    }
    
    public function t_komfreight_bestbranch()
	{
		$query = $this->db->query('select  
        division,
        SUM(qty) AS qty, 
        SUM(jmlshipment) AS jmlshipment,
        ROUND(SUM(revenue/1000000),2)  AS revenue, 
        ROUND(SUM(cost/1000000),2)  AS cost, 
        ROUND(SUM(grossprofit/1000000),2) AS grossprofit
        from t_komfreight
        WHERE division <> "GPIL-HO" and tahun ="2020"
        GROUP BY division
        order by revenue desc 
        limit 0,1');
      	return $query->result_array();
    }
    

    

	public function call_div()
	{
        $query = $this->db->query('select division 
            from t_komfreight 
            WHERE division <> "GPIL-HO" 
            GROUP BY division ASC');
      	return $query->result_array();
	}

    public function call_moda()
    {
        $query = $this->db->query('select moda from t_komfreight 
                    WHERE division <> "GPIL-HO" 
                    GROUP BY moda
                    order by moda ASC');
        return $query->result_array();
    }



}