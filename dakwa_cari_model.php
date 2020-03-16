<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dakwa_cari_model extends CI_Model {

	function __construct(){
		parent::__construct();
	}
	
function cari(){
		$login_caw = $this->session->userdata('idcaw');
		$txtcari=$this->input->post('carian');
		$flag = $this->input->post('search_list');
		$role = $this->session->userdata('level');
		
		$query = false;
		$pc = false;
		//echo $flag;exit;
		//echo $txtcari;exit;
		//echo $login_caw;EXIT;
		
		
		
		if ($flag=='1'):
			$query = "SELECT a.ID,a.FK1_JCLI_ITREFNO,a.TAHUN as TAHUN_SARAAN,a.PROCESS_DT,a.SLOT,a.CASE_STATUS_ID,a.APPRV_DT,a.CURR_AMT,a.TAXPAYER_IND,a.CC_CATEGORY_ID,
					 c.NEW_IC_NO,c.IT_GRP_CD,c.NAMA,
					 d.NAMA AS BRANCH_NAME,
					 e.DESCRIPTION,
					 f.NAME_M as kategori,f.SEKSYEN,
					 g.NAMA_MAJIKAN
					FROM case_summon a
					LEFT JOIN taxpayer_case b ON b.CASE_SUMMON_ID = a.ID
					LEFT JOIN taxpayer c ON b.TAXPAYER_ID = c.ID 
					LEFT JOIN branch d ON a.BRANCH_ID = d.ID
					LEFT JOIN case_status e ON a.CASE_STATUS_ID = e.ID
					LEFT JOIN cc_category f ON a.CC_CATEGORY_ID = f.ID
					LEFT JOIN employer g ON a.ID = g.CASE_SUMMON_ID 
					WHERE a.SLOT = 2
					AND a.FK1_JCLI_ITREFNO = '$txtcari' 
					AND a.BRANCH_ID = '$login_caw'";
																
		elseif ($flag == '2'):
					$query = "SELECT a.ID,a.FK1_JCLI_ITREFNO,a.TAHUN as TAHUN_SARAAN,a.PROCESS_DT,a.SLOT,a.CASE_STATUS_ID,a.APPRV_DT,a.CURR_AMT,a.TAXPAYER_IND,a.CC_CATEGORY_ID,
							 c.NEW_IC_NO,c.IT_GRP_CD,c.NAMA,
							 d.NAMA AS BRANCH_NAME,
							 e.DESCRIPTION,
							 f.NAME_M as kategori,f.SEKSYEN,
							 g.NAMA_MAJIKAN
							FROM case_summon a
							LEFT JOIN taxpayer_case b ON b.CASE_SUMMON_ID = a.ID
							LEFT JOIN taxpayer c ON b.TAXPAYER_ID = c.ID 
							LEFT JOIN branch d ON a.BRANCH_ID = d.ID
							LEFT JOIN case_status e ON a.CASE_STATUS_ID = e.ID
							LEFT JOIN cc_category f ON a.CC_CATEGORY_ID = f.ID
							LEFT JOIN employer g ON a.ID = g.CASE_SUMMON_ID 
							WHERE a.SLOT = 2
							AND c.NEW_IC_NO = '$txtcari'
							AND a.BRANCH_ID = '$login_caw' ";
					
				elseif ($flag == '3'):
						$query = "SELECT a.ID,a.FK1_JCLI_ITREFNO,a.TAHUN as TAHUN_SARAAN,a.PROCESS_DT,a.SLOT,a.CASE_STATUS_ID,a.APPRV_DT,a.CURR_AMT,a.TAXPAYER_IND,a.CC_CATEGORY_ID,
								 c.NEW_IC_NO,c.IT_GRP_CD,c.NAMA,
								 d.NAMA AS BRANCH_NAME,
								 e.DESCRIPTION,
								 f.NAME_M as kategori,f.SEKSYEN,
								 g.NAMA_MAJIKAN
								FROM case_summon a
								LEFT JOIN taxpayer_case b ON b.CASE_SUMMON_ID = a.ID
								LEFT JOIN taxpayer c ON b.TAXPAYER_ID = c.ID 
								LEFT JOIN branch d ON a.BRANCH_ID = d.ID
								LEFT JOIN case_status e ON a.CASE_STATUS_ID = e.ID
								LEFT JOIN cc_category f ON a.CC_CATEGORY_ID = f.ID
								LEFT JOIN employer g ON a.ID = g.CASE_SUMMON_ID 
								WHERE a.SLOT = 2
								AND c.POLICE_ARMY_NO = '$txtcari'
								AND a.BRANCH_ID = '$login_caw' ";
					
					elseif ($flag == '4'):
							$query = "SELECT a.ID,a.FK1_JCLI_ITREFNO,a.TAHUN as TAHUN_SARAAN,a.PROCESS_DT,a.SLOT,a.CASE_STATUS_ID,a.APPRV_DT,a.CURR_AMT,a.TAXPAYER_IND,a.CC_CATEGORY_ID,
									 c.NEW_IC_NO,c.IT_GRP_CD,c.NAMA,
									 d.NAMA AS BRANCH_NAME,
									 e.DESCRIPTION,
									 f.NAME_M as kategori,f.SEKSYEN,
									 g.NAMA_MAJIKAN
									FROM case_summon a
									LEFT JOIN taxpayer_case b ON b.CASE_SUMMON_ID = a.ID
									LEFT JOIN taxpayer c ON b.TAXPAYER_ID = c.ID 
									LEFT JOIN branch d ON a.BRANCH_ID = d.ID
									LEFT JOIN case_status e ON a.CASE_STATUS_ID = e.ID
									LEFT JOIN cc_category f ON a.CC_CATEGORY_ID = f.ID
									LEFT JOIN employer g ON a.ID = g.CASE_SUMMON_ID 
									WHERE a.SLOT = 2
									AND c.PASPOT_NO  = '$txtcari'
									AND a.BRANCH_ID = '$login_caw' ";
					
						elseif ($flag == '5'):
								$stat_ind = $this->input->post('status_list');
								$query = "SELECT a.ID,a.FK1_JCLI_ITREFNO,a.TAHUN as TAHUN_SARAAN,a.PROCESS_DT,a.SLOT,a.CASE_STATUS_ID,a.APPRV_DT,a.CURR_AMT,a.TAXPAYER_IND,a.CC_CATEGORY_ID,
										 c.NEW_IC_NO,c.IT_GRP_CD,c.NAMA,
										 d.NAMA AS BRANCH_NAME,
										 e.DESCRIPTION,
										 f.NAME_M as kategori,f.SEKSYEN,
										 g.NAMA_MAJIKAN
										FROM case_summon a
										LEFT JOIN taxpayer_case b ON b.CASE_SUMMON_ID = a.ID
										LEFT JOIN taxpayer c ON b.TAXPAYER_ID = c.ID 
										LEFT JOIN branch d ON a.BRANCH_ID = d.ID
										LEFT JOIN case_status e ON a.CASE_STATUS_ID = e.ID
										LEFT JOIN cc_category f ON a.CC_CATEGORY_ID = f.ID
										LEFT JOIN employer g ON a.ID = g.CASE_SUMMON_ID 
										WHERE a.SLOT = 2
										AND a.CASE_STATUS_ID = '$stat_ind'
										AND a.BRANCH_ID = '$login_caw'";
										
		//echo '<pre>';print_r($query);exit;		
		endif;					
 
	
		if ($query):
		$res = $this->db->query($query);
		
			foreach ($res->result() as $row):
			
			if($role==2 || $role==3 || $role==8 || $role==9 || $role==10 || $role==14 || $role==13)://tentu status penyedia atau pelulus
				$status = 1;
			else:
				$status = 2;
			endif;
			
					$cc_cat = $row->CC_CATEGORY_ID;
					$flag = $row->SLOT;
					$nonc =array('OG','SG','D','F','J','TP');
					//echo $cc_cat;exit;
							
					if($row->TAXPAYER_IND == 'E'):
						$nc_typ = 20; 
						elseif(in_array($row-> IT_GRP_CD ,$nonc,TRUE)):
							//if($row->IT_GRP_CD == 'OG' || 'SG' || 'D' || 'F' || 'J' || 'TP'):
								$nc_typ = 22;
						else:
								$nc_typ = 21;
					endif;
			
			
			$query ="SELECT CTRL as link_myurl 
					 FROM case_template
					 WHERE USER_IND = $status
					 AND FK1_JCLI_TYP = 5
					 AND NC_TYP = $nc_typ
					 AND IND_CO = $flag
					 AND CASE_STATUS_ID = '".$row->CASE_STATUS_ID."' ";
			//echo $query;EXIT;		 
					
				$res1 = $this->db->query($query);
					foreach($res1->result() as $row1):
						$myurl = "<a href='".site_url().$row1->link_myurl.$row->ID."'>".$row->FK1_JCLI_ITREFNO."</a>";;					
					if($row->CASE_STATUS_ID == 6):
						$myurl = $row->FK1_JCLI_ITREFNO;
					elseif($row->CASE_STATUS_ID == 7):
						$myurl = $row->FK1_JCLI_ITREFNO;
					elseif($row->CASE_STATUS_ID == 8):
						$myurl = $row->FK1_JCLI_ITREFNO;
					endif;
					endforeach;
				
				
				$cd = $row->IT_GRP_CD;
				$namamajikan = $row->NAMA_MAJIKAN;
				$namataxpayer = $row->NAMA ;
				
					if($row->TAXPAYER_IND == 'E'):
						$ind = 'E';
						$nama = $namamajikan ; 
					else:
						$ind = $cd;
						$nama = $namataxpayer ;
					endif;
					//echo $nama;exit;
				
				    
					
					
				$pc[] = array (
				'ID_CS'      => $row->ID,
				'KATEGORI'   => $row->SEKSYEN,
				'J_FAIL'     => $ind,
				'PROCESS_DT' => $row->PROCESS_DT,
				'REF_NO'   	 => $myurl,
				'TAHUN'   	 => $row->TAHUN_SARAAN,
				'NAMA'       => $nama,
				'CAW'        => $row->BRANCH_NAME,
				'STATUS_S'   => $row->DESCRIPTION,
				'CASE_STATUS'=> $row->CASE_STATUS_ID
				
				);
				
			endforeach;
				//echo '<pre>';print_r($pc);exit;
				
		endif;	
		
				return $pc;
				
		
		
	}
	
	
/*

	function cari($flag,$stat_ind,$txtcari,$data_count=0,$cpage=0,$perpage=10){
		
		$login_caw = $this->session->userdata('idcaw');
		//$txtcari=$this->input->post('carian');
		//$flag = $this->input->post('search_list');
		$role = $this->session->userdata('level');

		$query = false;
		
		$mytable='<table class="table table-hover">
                    <tr>
                      <th>Seksyen</th>
                      <th>Jenis Fail</th>
                      <th>Tarikh Lulus DP</th>
                      <th>No. Rujukan</th>
					  <th>Tahun Taksiran</th>
					  <th>Nama</th>
					  <th>Cawangan</th>
					  <th>Status</th>
                    </tr>
				';

		if ($flag=='1'):
		
			$query = "SELECT a.ID,a.FK1_JCLI_ITREFNO,a.TAHUN as TAHUN_SARAAN,a.PROCESS_DT,a.SLOT,a.CASE_STATUS_ID,a.APPRV_DT,a.CURR_AMT,a.TAXPAYER_IND,a.CC_CATEGORY_ID,
					 c.NEW_IC_NO,c.IT_GRP_CD,c.NAMA,
					 d.NAMA AS BRANCH_NAME,
					 e.DESCRIPTION,
					 f.NAME_M as kategori,f.SEKSYEN,
					 g.NAMA_MAJIKAN
					FROM case_summon a
					LEFT JOIN taxpayer_case b ON b.CASE_SUMMON_ID = a.ID
					LEFT JOIN taxpayer c ON b.TAXPAYER_ID = c.ID 
					LEFT JOIN branch d ON a.BRANCH_ID = d.ID
					LEFT JOIN case_status e ON a.CASE_STATUS_ID = e.ID
					LEFT JOIN cc_category f ON a.CC_CATEGORY_ID = f.ID
					LEFT JOIN employer g ON a.ID = g.CASE_SUMMON_ID 
					WHERE a.SLOT = 2
					AND a.FK1_JCLI_ITREFNO = '$txtcari' 
					AND a.BRANCH_ID = '$login_caw'";
					
		elseif ($flag == '2'):
					$query = "SELECT a.ID,a.FK1_JCLI_ITREFNO,a.TAHUN as TAHUN_SARAAN,a.PROCESS_DT,a.SLOT,a.CASE_STATUS_ID,a.APPRV_DT,a.CURR_AMT,a.TAXPAYER_IND,a.CC_CATEGORY_ID,
							 c.NEW_IC_NO,c.IT_GRP_CD,c.NAMA,
							 d.NAMA AS BRANCH_NAME,
							 e.DESCRIPTION,
							 f.NAME_M as kategori,f.SEKSYEN,
							 g.NAMA_MAJIKAN
							FROM case_summon a
							LEFT JOIN taxpayer_case b ON b.CASE_SUMMON_ID = a.ID
							LEFT JOIN taxpayer c ON b.TAXPAYER_ID = c.ID 
							LEFT JOIN branch d ON a.BRANCH_ID = d.ID
							LEFT JOIN case_status e ON a.CASE_STATUS_ID = e.ID
							LEFT JOIN cc_category f ON a.CC_CATEGORY_ID = f.ID
							LEFT JOIN employer g ON a.ID = g.CASE_SUMMON_ID 
							WHERE a.SLOT = 2
							AND c.NEW_IC_NO = '$txtcari'
							AND a.BRANCH_ID = '$login_caw' ";
					
				elseif ($flag == '3'):
						$query = "SELECT a.ID,a.FK1_JCLI_ITREFNO,a.TAHUN as TAHUN_SARAAN,a.PROCESS_DT,a.SLOT,a.CASE_STATUS_ID,a.APPRV_DT,a.CURR_AMT,a.TAXPAYER_IND,a.CC_CATEGORY_ID,
								 c.NEW_IC_NO,c.IT_GRP_CD,c.NAMA,
								 d.NAMA AS BRANCH_NAME,
								 e.DESCRIPTION,
								 f.NAME_M as kategori,f.SEKSYEN,
								 g.NAMA_MAJIKAN
								FROM case_summon a
								LEFT JOIN taxpayer_case b ON b.CASE_SUMMON_ID = a.ID
								LEFT JOIN taxpayer c ON b.TAXPAYER_ID = c.ID 
								LEFT JOIN branch d ON a.BRANCH_ID = d.ID
								LEFT JOIN case_status e ON a.CASE_STATUS_ID = e.ID
								LEFT JOIN cc_category f ON a.CC_CATEGORY_ID = f.ID
								LEFT JOIN employer g ON a.ID = g.CASE_SUMMON_ID 
								WHERE a.SLOT = 2
								AND c.POLICE_ARMY_NO = '$txtcari'
								AND a.BRANCH_ID = '$login_caw' ";
					
					elseif ($flag == '4'):
							$query = "SELECT a.ID,a.FK1_JCLI_ITREFNO,a.TAHUN as TAHUN_SARAAN,a.PROCESS_DT,a.SLOT,a.CASE_STATUS_ID,a.APPRV_DT,a.CURR_AMT,a.TAXPAYER_IND,a.CC_CATEGORY_ID,
									 c.NEW_IC_NO,c.IT_GRP_CD,c.NAMA,
									 d.NAMA AS BRANCH_NAME,
									 e.DESCRIPTION,
									 f.NAME_M as kategori,f.SEKSYEN,
									 g.NAMA_MAJIKAN
									FROM case_summon a
									LEFT JOIN taxpayer_case b ON b.CASE_SUMMON_ID = a.ID
									LEFT JOIN taxpayer c ON b.TAXPAYER_ID = c.ID 
									LEFT JOIN branch d ON a.BRANCH_ID = d.ID
									LEFT JOIN case_status e ON a.CASE_STATUS_ID = e.ID
									LEFT JOIN cc_category f ON a.CC_CATEGORY_ID = f.ID
									LEFT JOIN employer g ON a.ID = g.CASE_SUMMON_ID 
									WHERE a.SLOT = 2
									AND c.PASPOT_NO  = '$txtcari'
									AND a.BRANCH_ID = '$login_caw' ";
					
						elseif ($flag == '5'):
								$limit="LIMIT ".($cpage*$perpage)." $perpage";
								$query = "SELECT a.ID,a.FK1_JCLI_ITREFNO,a.TAHUN as TAHUN_SARAAN,a.PROCESS_DT,a.SLOT,a.CASE_STATUS_ID,a.APPRV_DT,a.CURR_AMT,a.TAXPAYER_IND,a.CC_CATEGORY_ID,
										 c.NEW_IC_NO,c.IT_GRP_CD,c.NAMA,
										 d.NAMA AS BRANCH_NAME,
										 e.DESCRIPTION,
										 f.NAME_M as kategori,f.SEKSYEN,
										 g.NAMA_MAJIKAN
										FROM case_summon a
										LEFT JOIN taxpayer_case b ON b.CASE_SUMMON_ID = a.ID
										LEFT JOIN taxpayer c ON b.TAXPAYER_ID = c.ID 
										LEFT JOIN branch d ON a.BRANCH_ID = d.ID
										LEFT JOIN case_status e ON a.CASE_STATUS_ID = e.ID
										LEFT JOIN cc_category f ON a.CC_CATEGORY_ID = f.ID
										LEFT JOIN employer g ON a.ID = g.CASE_SUMMON_ID 
										WHERE a.SLOT = 2
										AND a.CASE_STATUS_ID = '$stat_ind'
										AND a.BRANCH_ID = '$login_caw'
										$limit";
										
		endif;					
 
		if ($query):
			$res = $this->db->query($query);
		
			foreach ($res->result() as $row):
			
				if($role==2 || $role==3 || $role==8 || $role==9 || $role==10 || $role==14 || $role==13)://tentu status penyedia atau pelulus
					$status = 1;
				else:
					$status = 2;
				endif;
			
									
					$cc_cat = $row->CC_CATEGORY_ID;
					$flag = $row->SLOT;
					$nonc =array('OG','SG','D','F','J','TP');
					//echo $cc_cat;exit;
							
					if($row->TAXPAYER_IND == 'E'):
						$nc_typ = 20; 
						elseif(in_array($row-> IT_GRP_CD ,$nonc,TRUE)):
							//if($row->IT_GRP_CD == 'OG' || 'SG' || 'D' || 'F' || 'J' || 'TP'):
								$nc_typ = 22;
						else:
								$nc_typ = 21;
					endif;
			
			$query ="SELECT CTRL as link_myurl 
					 FROM case_template
					 WHERE USER_IND = $status
					 AND FK1_JCLI_TYP = 5
					 AND NC_TYP = $nc_typ
					 AND IND_CO = $flag
					 AND CASE_STATUS_ID = '".$row->CASE_STATUS_ID."' ";
				//echo $query;exit;	
				$res1 = $this->db->query($query);

				if(in_array($row->CASE_STATUS_ID,array(5,6,7,8))):
					$myurl = $row->FK1_JCLI_ITREFNO;
				endif;
				$row1=$res1->row_array();
				
				$myurl = "<a href='".site_url().$row1['link_myurl'].$row->ID."'>".$row->FK1_JCLI_ITREFNO."</a>";;		
				if(in_array($row->CASE_STATUS_ID,array(6,7,8))):
					$myurl = $row->FK1_JCLI_ITREFNO;
				elseif($row->CASE_STATUS_ID == 3 && $this->session->userdata('level')==3):
					$myurl = $row->FK1_JCLI_ITREFNO;
				elseif($row->CASE_STATUS_ID == 4 && $this->session->userdata('level')==6):
					$myurl = $row->FK1_JCLI_ITREFNO;
				endif;

				$cd = $row->IT_GRP_CD;
				$namamajikan = $row->NAMA_MAJIKAN;
				$namataxpayer = $row->NAMA ;
				
					if($row->TAXPAYER_IND == 'E'):
						$ind = 'E';
						$nama = $namamajikan ; 
					else:
						$ind = $cd;
						$nama = $namataxpayer ;
					endif;
					
				$tarikh=str_ireplace("-","",$row->APPRV_DT);
				$tarikh = $tarikh > 0 ? strtotime($row->APPRV_DT) : '';
				
				$mytable.="<tr><td>".$row->SEKSYEN."</td><td>".$ind."</td><td>".$tarikh."</td><td>".$myurl."</td><td>".$row->TAHUN_SARAAN."</td><td>".$nama."</td><td>".$row->BRANCH_NAME."</td><td>".$row->DESCRIPTION."</td></tr>";
			endforeach;
		endif;	
		
		$mytable.="</table>";
		
		//$mytable.="bil data = ".$this->get_data_count($stat_ind,$login_caw);
		if($data_count==0):
			$data_count=$this->get_data_count($stat_ind,$login_caw);
		endif;
		
		$mytable.=$this->pagination($data_count,$perpage,$cpage);
		
		echo $mytable;
	}
	
	function get_data_count($stat_ind,$login_caw){
		$query = "SELECT COUNT(ID) AS bil_data
										FROM case_summon
										WHERE SLOT = 2
										AND CASE_STATUS_ID = '$stat_ind'
										AND BRANCH_ID = '$login_caw'";
		$res = $this->db->query($query);
		$row = $res->row_array();
		
		return $row['bil_data'];
	}
	function pagination($bil,$perpage,$cpage){
		$jumpage = ceil($bil/$perpage);
		
		$page='';
		
		$kiri = ($cpage -5 > 0) ? ($cpage-5) : 0;
		//$kanan = $cpage+5;
		
		$bil_paginate=$kiri+11;
		
		if($jumpage>1):
			$page = '<div class="box-footer clearfix"><ul class="pagination pagination-sm no-margin pull-right">';
			
			if($kiri >0):
				$page .="<li><a href='#' onClick='dapat_cari($bil,". ($kiri-1) .",$perpage)'><<</a></li>";
			endif;
			
			for($i=$kiri; $i<$bil_paginate;$i++):
				if($i==$cpage):
					$page .="<li><a style='background-color:white'>". ($i+1) ."</a></li>";
				else:
					$page .="<li><a href='#' onClick='dapat_cari($bil,$i,$perpage)'>". ($i+1) ."</a></li>";
				endif;
			endfor;
			if($i<$jumpage):
				$page .="<li><a href='#' onClick='dapat_cari($bil,$i,$perpage)'>>></a></li>";
			endif;
			
			$page .="</ul></div>";
		endif;
		
		return $page;
	} */
}


/* End of file cubaan_model.php */
/* Location: ./application/models/cubaan_model.php */