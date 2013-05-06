<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Pagination extends CI_Pagination{

	function __construct($params = array())
    {
        // Call the Model constructor
        parent::__construct();
    }
	
	function create_paging($default='admin',$base_url,$total_rows,$per_page,$num_links,$uri_segment)
	{
		$config['base_url'] = $base_url;
		$config['total_rows'] = $total_rows;
		$config['per_page'] = $per_page;
		$config['num_links'] = ($num_links!=FALSE)?$num_links:'3';
		$config['uri_segment'] = $uri_segment;
		
		if($default=='admin')
		{
			$config['cur_tag_open'] = '<a class="number current" >';
			$config['cur_tag_close'] = '</a>';
		}
		
		if($default=='user')
		{
			$config['first_tag_open'] = '<span class="beginning" >';
			$config['first_link'] = '';
			$config['first_tag_close'] = '</span>';
			
			$config['prev_tag_open'] = '<span class="previous" >';
			$config['prev_link'] = '';
			$config['prev_tag_close'] = '</span>';
			
			$config['next_tag_open'] = '<span class="next" >';
			$config['next_link'] = '';
			$config['next_tag_close'] = '</span>';
			
			$config['last_tag_open'] = '<span class="end" >';
			$config['last_link'] = '';
			$config['last_tag_close'] = '</span>';
			
			$config['display_pages'] = FALSE;
		}
		
		$this->initialize($config);
		
		return $this->create_links();
	}
	
	
}
// END Pagination Class

/* End of file Pagination.php */
/* Location: ./application/libraries/MY_Pagination.php */