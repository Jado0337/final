<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("HomeModel");
		$this->load->model('product_filter_model');
		$this->load->library('pagination');
	}

	public function index(){
		$this->homepage();
	}
	public function productpage(){
		$data =array();
		$data['slider'] = $this->load->view('front/advertise_top','',true);
		$data['recommended'] = "";
// Start pagination
		$config['base_url'] = base_url().'/Home/productpage/';
		$config['total_rows'] = $this->db->count_all("tbl_product");
		$config['per_page'] = 6;
		$config["full_tag_open"] = '<ul class="pagination">';
		$config["full_tag_close"] = '</ul>';	
		$config["first_link"] = "&laquo;";
		$config["first_tag_open"] = "<li>";
		$config["first_tag_close"] = "</li>";
		$config["last_link"] = "&raquo;";
		$config["last_tag_open"] = "<li>";
		$config["last_tag_close"] = "</li>";
		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '<li>';
		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '<li>';
		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);
		$data['post_by_brand_id'] = $this->load->HomeModel->get_all_product_pagination($config['per_page'],$this->uri->segment(1));

// End pagination
		//$data['post_by_brand_id'] = $this->load->ProductModel->get_all_product();
		$data['feature'] = $this->load->view('front/product_list',$data,true);
		$data['category_brand'] = $this->load->view('front/category','',true);
		$this->load->view('front/index',$data);
	}
	public function homepage(){
		$data =array();
		$data['slider'] = $this->load->view('front/slider','',true);
		$data['banner'] = $this->load->view('front/banner','',true);
		$data['recommended'] = "";
		$data['mobile'] = $this->HomeModel->get_mobile_six();
		$data['laptop'] = $this->HomeModel->get_laptop_six();
		$data['tablet'] = $this->HomeModel->get_tablet_six();
		$data['watch'] = $this->HomeModel->get_watch_six();
		$data['feature'] = $this->load->view('front/feature','',true);
		$data['category_brand'] = "";
		$this->load->view('front/index',$data);
	}
	public function product_details($product_id){
		$data =array();
		$data['slider'] =$this->load->view('front/advertise_top','',true);
		$data['recommended'] = $this->load->view('front/recommended','',true);
		$data['product_info'] = $this->HomeModel->get_product_by_id($product_id);
		$data['variant'] = $this->HomeModel->get_variant($product_id);
		$data['feature'] = $this->load->view('front/product_details',$data,true);
		$data['category_brand'] = "";
		$this->load->view('front/index',$data);
	}
	public function show_post_by_brand_id($brand_id){
		
		$data['slider'] = $this->load->view('front/advertise_top','',true);
		$data['recommended'] = "";
		$data['category_brand'] = $this->load->view('front/category','',true);
		$data['post_by_brand_id'] = $this->HomeModel->post_brand_by_id($brand_id);
		$data['feature'] = $this->load->view('front/product_list',$data,true);
		$this->load->view('front/index',$data);
	}
	public function show_post_by_sub_cat_id($sub_cat_id){
		$config["base_url"] = base_url() . "show-post-by-sub-cat-id/$sub_cat_id";
        $config["total_rows"] = count($this->HomeModel->get_count($sub_cat_id));
        $config["per_page"] = 9;
        $config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';	
			$config['first_link'] = '&laquo; First';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close'] = '</li>';
			$config['last_link'] = 'Last &raquo';
			$config['last_tag_open'] = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['next_link'] = 'Next';
			$config['next_tag_open'] = '<li>';
			$config['next_tag_close'] = '<li>';
			$config['prev_link'] = 'Prev';
			$config['prev_tag_open'] = '<li>';
			$config['prev_tag_close'] = '<li>';
			$config['cur_tag_open'] = '<li class="active"><a href="#">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);
		$data =array();
		$data['id']=$sub_cat_id;
		$data["links"] = $this->pagination->create_links();
		$data['slider'] = $this->load->view('front/advertise_top','',true);
		$data['recommended'] = "";
		$data['colour'] = $this->HomeModel->colour($sub_cat_id);
		$data['ram'] = $this->HomeModel->ram($sub_cat_id);
		$data['processor'] = $this->HomeModel->processor($sub_cat_id);
		$data['variation'] = $this->HomeModel->variation($sub_cat_id);
		$data['year'] = $this->HomeModel->year($sub_cat_id);
		$data['category_brand'] = $this->load->view('front/category',$data,true);
		$data['post_by_brand_id'] = $this->HomeModel->post_sub_cat_by_id($sub_cat_id,$config["per_page"],$this->uri->segment(3));

		$data['feature'] = $this->load->view('front/product_list',$data,true);
		 
		$this->load->view('front/index',$data);
	}
	public function show_post_by_cat_id($cat_id){
		$data['slider'] = $this->load->view('front/advertise_top','',true);
		$data['recommended'] = "";
		$data['category_brand'] = "";
		$data['post_by_cat_id'] = $this->HomeModel->post_cat_by_id($cat_id);
		$data['feature'] = $this->load->view('front/category_list',$data,true);
		$this->load->view('front/index',$data);
	}

	public function _404_page(){
		//$data['main_content'] = $this->load->view('front/404','',true);
		$this->load->view('front/404');
	}
	public function show_product_by_price_range()
	{
		$min_range = $this->input->post('amount1');
		$max_range = $this->input->post('amount2');
		$id=$this->input->post('id');
		$data['slider'] = $this->load->view('front/advertise_top','',true);
		$data['recommended'] = "";
		$data['category_brand'] = "";
		$data['post_by_brand_id'] = $this->HomeModel->show_product_price_range($min_range,$max_range,$id);
		$data['feature'] = $this->load->view('front/filter_list',$data,true);
		$this->load->view('front/index',$data);
		}
	public function show_product_by_filter(){
		$data = array();
		$min_range = $this->input->post('amount1');
		$max_range = $this->input->post('pro_cat');
		$type = $this->input->post('type');
		$data['id']=$min_range;
		$data['slider'] = $this->load->view('front/advertise_top','',true);
		$data['recommended'] = "";
		$data['colour'] = $this->HomeModel->colour($min_range);
		$data['ram'] = $this->HomeModel->ram($min_range);
		$data['processor'] = $this->HomeModel->processor($min_range);
		$data['variation'] = $this->HomeModel->variation($min_range);
		$data['year'] = $this->HomeModel->year($min_range);
		$data['category_brand'] = $this->load->view('front/category',$data,true);
		$data['post_by_brand_id'] = $this->HomeModel->show_product_filter($min_range,$max_range,$type);
		$data['feature'] = $this->load->view('front/filter_list',$data,true);
		$this->load->view('front/index',$data);

	}
	public function fetch_networks()
	{
	$t=$this->input->post('variation');
	$id=$this->input->post('id');
	$sub=$this->HomeModel->fetch_networks($t,$id);
	echo json_encode($sub);
}
public function fetch_model()
	{
	$model=$this->input->post('variation');
	$id=$this->input->post('id');
	$sub=$this->HomeModel->fetch_model($model,$id);
	echo json_encode($sub);
}
public function fetch_processor()
	{
	$t=$this->input->post('variation');
	$y=$this->input->post('year');
	$id=$this->input->post('id');
	$sub=$this->HomeModel->fetch_processor($t,$id,$y);
	echo json_encode($sub);
}
public function fetch_ram()
	{
	$t=$this->input->post('variation');
	$y=$this->input->post('year');
	$p=$this->input->post('prs');
	$id=$this->input->post('id');
	$sub=$this->HomeModel->fetch_ram($t,$id,$y,$p);
	echo json_encode($sub);
}
public function fetch_laptop_price()
{
    $c=$this->input->post('condition');
	$y=$this->input->post('year');
	$p=$this->input->post('prs');
	$r=$this->input->post('ram');
	$v=$this->input->post('variation');
	$id=$this->input->post('id');
	$sub=$this->HomeModel->fetch_laptop_price($id,$v,$c,$p,$r,$y);
    echo json_encode($sub);
}
public function fetch_price()
	{
    $c=$this->input->post('condition');
	$s=$this->input->post('sub');
	$v=$this->input->post('variation');
	$id=$this->input->post('id');
	$sub=$this->HomeModel->fetch_price($id,$v,$c,$s);
    echo json_encode($sub);
}
	public function contact_page(){
		$data =array();
		$data['slider'] = "";
		$data['recommended'] = "";
		$data['main_content'] = $this->load->view('front/contact_page','',true);
		$data['category_brand'] = "";
		$this->load->view('front/index',$data);
	}
	public function insert_contact_info(){
			$this->form_validation->set_rules('contact_email', 'Email', 'required|valid_email');
		if($this->form_validation->run()){
		$this->ContactModel->insert_contact_data();
		$this->session->set_flashdata("flash_msg","<h3 class='alert alert-success text-center'>Message Send Successfully.</h3>");
           redirect('contact');
       }else{
       		$this->contact_page();
       }
	}

}
