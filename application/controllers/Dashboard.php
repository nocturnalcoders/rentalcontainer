<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
	    parent::__construct();
		$this->load->helper('url_helper');
		$this->load->model('dashboard_m');
	}

	public function index()
	{
		check_not_login();

		if ($this->fungsi->user_login()->level == 1) 
		{ 
			$div = $this->fungsi->user_login()->divbran ;
			$data['t_boxops_branches'] = $this->dashboard_m->t_boxops_branches($div);
			$data['t_boxops_branches_pending_detail'] = $this->dashboard_m->t_boxops_branches_pending_detail($div);
			
			$data['t_boxops_branches_approved'] = $this->dashboard_m->t_boxops_branches_approved($div);
			$data['t_boxops_branches_approved_detail'] = $this->dashboard_m->t_boxops_branches_approved_detail($div);
			
			$data['t_boxops_active_branch'] = $this->dashboard_m->t_boxops_active_branch($div);
			$data['t_boxops_active_branch_detail'] = $this->dashboard_m->t_boxops_active_branch_detail($div);
			
			$data['t_boxops_complete_branch'] = $this->dashboard_m->t_boxops_complete_branch($div);
			$data['t_boxops_complete_branch_detail'] = $this->dashboard_m->t_boxops_complete_branch_detail($div);
			

			$data['t_boxops_divbran'] = $this->dashboard_m->t_boxops_divbran_div($div);
		
			$this->template->load('template','dashboard_branches',$data);
		}
		else if ($this->fungsi->user_login()->level == 2) { 
			$div = $this->fungsi->user_login()->divbran ;
			$data['t_boxops_branches'] = $this->dashboard_m->t_boxops_branches($div);
			$data['t_boxops_branches_pending_detail'] = $this->dashboard_m->t_boxops_branches_pending_detail($div);


			$data['t_boxops_branches_approved'] = $this->dashboard_m->t_boxops_branches_approved($div);
			$data['t_boxops_branches_approved_detail'] = $this->dashboard_m->t_boxops_branches_approved_detail($div);

			$data['t_boxops_all_pending_fordomestic'] = $this->dashboard_m->t_boxops_all_pending_fordomestic();
			$data['t_boxops_active_domestic'] = $this->dashboard_m->t_boxops_active_domestic($div);
			$data['t_boxops_active_branch_detail'] = $this->dashboard_m->t_boxops_active_branch_detail($div);

			$data['t_boxops_complete_domestic'] = $this->dashboard_m->t_boxops_complete_domestic($div);
			$data['t_boxops_complete_branch_detail'] = $this->dashboard_m->t_boxops_complete_branch_detail($div);
			$data['t_boxops_divbran'] = $this->dashboard_m->t_boxops_divbran_div($div);

			
			$this->template->load('template','dashboard_domestic',$data);
		}
		else 
		{
			$data['t_boxops_all_pending'] = $this->dashboard_m->t_boxops_all_pending();
			$data['t_boxops_all_pending_detail'] = $this->dashboard_m->t_boxops_all_pending_detail();
			$data['t_boxops_all_approved_detail'] = $this->dashboard_m->t_boxops_all_approved_detail();
			$data['t_boxops_active_detail'] = $this->dashboard_m->t_boxops_active_detail();
			$data['t_boxops_complete_detail'] = $this->dashboard_m->t_boxops_complete_detail();

			

			$data['t_boxops_all_approved'] = $this->dashboard_m->t_boxops_all_approved();
			$data['t_boxops_active'] = $this->dashboard_m->t_boxops_active();
			$data['t_boxops_complete'] = $this->dashboard_m->t_boxops_complete();
			
			
			$data['t_boxops_divbran'] = $this->dashboard_m->t_boxops_divbran_noperiod();
			$data['t_boxops_movement'] = $this->dashboard_m->t_boxops_movement();
			$data['t_boxops_feeder'] = $this->dashboard_m->t_boxops_feeder();
			

			
			
			$this->template->load('template','dashboard',$data);
		}
	}
}
