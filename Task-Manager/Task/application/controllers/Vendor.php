<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	public function show_vendor_list(){
		$data['pro'] = $this->ProductModel->get_all_vendor();
		$this->load->view('admin/Vendor/vendor',$data);
	}
    public function add_vendor(){
      
        echo "saqib";
    }
}