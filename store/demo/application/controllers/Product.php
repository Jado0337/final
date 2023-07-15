<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* Product Controller
*/
class Product extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		if(!isset($this->session->userid) && ($this->session->userstatus !=1)){
			redirect('Login');
		}
		$data = array();
		$this->load->model("ProductModel");
	}
	public function add_product_form(){
		$data['all_cat'] = $this->ProductModel->get_all_category();
		$data['all_sub_cat'] = $this->ProductModel->get_all_sub_category();
		$data['main_content'] = $this->load->view('back/add_product',$data,true);
		$this->load->view('back/adminpanel',$data);
	}
	public function add_variation_form(){
		$data['all_cat'] = $this->ProductModel->get_all_category();
		$data['all_sub_cat'] = $this->ProductModel->get_all_sub_category();
		$data['main_content'] = $this->load->view('back/add_variation.php',$data,true);
		$this->load->view('back/adminpanel',$data);
	}
	public function add_phone_variation_form(){
		$data['all_cat'] = $this->ProductModel->get_all_category();
		$data['all_sub_cat'] = $this->ProductModel->get_all_sub_category();
		$data['main_content'] = $this->load->view('back/add_phone_variation.php',$data,true);
		$this->load->view('back/adminpanel',$data);
	}
	public function show_product_list(){
		$data['all_product'] = $this->ProductModel->get_all_product();
		$data['main_content'] = $this->load->view('back/product_list',$data,true);
		$this->load->view('back/adminpanel',$data);
	}
	public function insert_product(){
		$product_image= $this->upload_product_image();
		if($product_image==NULL){
			redirect("Product/add_product_form");
		}else{
    $image = $this->ProductModel->add_product_model($product_image);
	$this->session->set_flashdata("flsh_msg","<font class='success'>Product Added Successfully</font>");
		redirect('product-list');
		}
	}
public function insert_variation()
{
$query = $this->db->query("SELECT pro_id FROM tbl_product ORDER BY pro_id DESC LIMIT 1");
$id = $query->row()->pro_id;
$temp = count($this->input->post('model'));
for($i=0; $i<$temp; $i++){
$model=$this->input->post('model')[$i];
$ram=$this->input->post('ram')[$i];
$processor=$this->input->post('processor')[$i];
$year=$this->input->post('year')[$i];
$good =$this->input->post('good')[$i];
$vgood= $this->input->post('vgood')[$i];
$prist=$this->input->post('prist')[$i];
$data= array(
	'product_id'=>$id,
     'model'=>$model, 
     'ram'=>$ram,
     'processor'=>$processor,
     'year' =>$year, 
     'good'=>$good,
     'vgood'  =>$vgood,
     'pristine'=>$prist
     );
$image = $this->ProductModel->insertvariation($data);
}
$this->session->set_flashdata("flsh_msg","<font class='success'>Product Added Successfully</font>");
		redirect('add-product'); 
	} 
	public function insert_phone_variation()
{
	$query = $this->db->query("SELECT pro_id FROM tbl_product ORDER BY pro_id DESC LIMIT 1");
$id = $query->row()->pro_id;
$temp = count($this->input->post('model'));
for($i=0; $i<$temp; $i++){
	
$model=$this->input->post('model')[$i];
$network=$this->input->post('network')[$i];
$good =$this->input->post('good')[$i];
$vgood= $this->input->post('vgood')[$i];
$prist=$this->input->post('prist')[$i];
$data= array(
	'product_id'=>$id,
     'model'=>$model, 
     'network'=>$network,
     'good'=>$good,
     'vgood'  =>$vgood,
     'pristine'=>$prist
     );
$image = $this->ProductModel->insertvariation($data);
}
$this->session->set_flashdata("flsh_msg","<font class='success'>Product Added Successfully</font>");
		redirect('add-product'); 
	} 
	public function edit_product($product_id){
		$data['all_product'] = $this->ProductModel->edit_product_model($product_id);
		$data['all_cat'] = $this->ProductModel->get_all_category();
		$data['all_sub_cat'] = $this->ProductModel->get_all_sub_category();
		$data['all_brand'] = $this->ProductModel->get_all_brand();
		$data['main_content'] = $this->load->view('back/edit_product',$data,true);
		$this->load->view('back/adminpanel',$data);
		
	}
	public function importview()
	{ 
	$data['all_cat'] = $this->ProductModel->get_all_category();
		$data['all_sub_cat'] = $this->ProductModel->get_all_sub_category();
		$data['main_content'] = $this->load->view('back/bulk_products',$data,true);
		$this->load->view('back/adminpanel',$data);
}
	public function importdata()
	{ 
	$filename=$_FILES["pro_image"]["tmp_name"];
	$type=$_POST['ptype'];
	$stock=$_POST['stock'];
	$status=$_POST['status'];
	$pcats=$_POST['pro_cat'];
	$scats=$_POST['sub_cat'];
	$handle = fopen($filename, "r");
	if(!$handle)
	{
		echo "error";
	}
	else{
			
			while (($emapData = fgetcsv($handle, 10000, ",")) !== FALSE)
                     {
                            $data = array(
                                'pro_title' => $emapData[0],
                                'pro_desc' => $emapData[1],
                                'pro_price' => $emapData[2],
                                'colour' => $emapData[3],
                                'variation' => $emapData[4],
                                'network' => $emapData[5],
                                'pro_condition' => $emapData[6],
                                'pro_quantity' => $emapData[7],
                                'pro_image' => $emapData[8],
                                'top_product' => $emapData[9],
                                'ram' => $emapData[10],
                                'year' => $emapData[11],
                                'processor' => $emapData[12],
                                'pro_cat' => $pcats,
                                'pro_sub_cat' => $scats,
                                'pro_brand' => $type,
                                'pro_availability' =>$stock,
                                'pro_status' =>$status
                                );
                        
                        $insertId = $this->ProductModel->saverecords($data);
                     }
			echo "sucessfully import data !";
		}
			
	}
	private function upload_product_image()
	{
		$config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'png|gif|jpg|jpeg';
        $config['max_size']             = 1000;//kb
        $config['max_width']            = 1024;
        $config['max_height']           = 768;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('pro_image')){
        	$data = $this->upload->data();
        	 }else{
        	  $error =  $this->upload->display_errors();
        	$this->session->set_userdata('error_image',$error);
        	//redirect("Product/add_product_form");
        }
        
	}
	
	public function update_product(){
		//$this->PrductModel->update_product_model();
		if($_FILES['pro_image']['name']==""){
			$product_image= $this->input->post('old_pro_image',true);
		}
		else
		{
			$config['upload_path']= './uploads/';
        $config['allowed_types']= 'png|gif|jpg|jpeg';
        $config['max_size']= 10024;//kb
        $config['max_width'] = 6000;
        $config['max_height']= 6000;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('pro_image')){
        	$data = $this->upload->data();
        	$product_image = $_FILES['pro_image']['name'];
        	}else{
        	  $error =  $this->upload->display_errors();
        	$this->session->set_userdata('error_image',$error);
        	//redirect("Product/add_product_form");

        }
		}
	
		if($_FILES['pro_imageone']['name']==""){
			$product_image1= $this->input->post('old_pro_image1',true);
		}
		else
		{
		$config['upload_path']= './uploads/';
        $config['allowed_types']= 'png|gif|jpg|jpeg';
        $config['max_size']= 10024;//kb
        $config['max_width']= 6000;
        $config['max_height']= 6000;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('pro_imageone')){
        	$data = $this->upload->data();
        	$product_image1 = $_FILES['pro_imageone']['name'];
        	}else{
        	  $error =  $this->upload->display_errors();
        	$this->session->set_userdata('error_image',$error);
        	//redirect("Product/add_product_form");
        }
    }
		if($_FILES['pro_imagetwo']['name']==""){
			$product_image2= $this->input->post('old_pro_image2',true);
		}
		else{
			 $config['upload_path']= './uploads/';
        $config['allowed_types']= 'png|gif|jpg|jpeg';
        $config['max_size']= 10024;//kb
        $config['max_width']= 6000;
        $config['max_height']= 6000;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('pro_imagetwo')){
        	$data = $this->upload->data();
        	$product_image2 = $_FILES['pro_imagetwo']['name'];
        	  }else{
        	  $error =  $this->upload->display_errors();
        	$this->session->set_userdata('error_image',$error);
        	//redirect("Product/add_product_form");
        }

		}
		
			$product_id = $this->input->post('pro_id',true);
			$this->ProductModel->update_product_model($product_image,$product_image1,$product_image2);
			unlink($this->input->post('old_pro_image',true));
			$this->session->set_flashdata("update_pro_msg","Product Updated Successfully");
			redirect('edit-product/'.$product_id);
	}
	public function delete_product($product_id){
		$this->ProductModel->delete_product_model($product_id);
		$this->session->set_flashdata('product_delete','Product Deleted Successfully');
		redirect('product-list');
	}
	public function fetch_sub(){
	$t=$this->input->post('pro_cat');
	$sub=$this->ProductModel->sub_category_fetch($t);
	echo json_encode($sub);

}
public function add()
{
	$config['upload_path']= './uploads/';
        $config['allowed_types']= 'png|gif|jpg|jpeg';
        $config['max_size']= 10024;//kb
        $config['max_width'] = 6000;
        $config['max_height']= 6000;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('pro_image')){
        	$data = $this->upload->data();
        	}else{
        	  $error =  $this->upload->display_errors();
        	$this->session->set_userdata('error_image',$error);
        	//redirect("Product/add_product_form");
        }
	$config['upload_path']= './uploads/';
        $config['allowed_types']= 'png|gif|jpg|jpeg';
        $config['max_size']= 10024;//kb
        $config['max_width']= 6000;
        $config['max_height']= 6000;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('pro_imageone')){
        	$data = $this->upload->data();
        	}else{
        	  $error =  $this->upload->display_errors();
        	$this->session->set_userdata('error_image',$error);
        	//redirect("Product/add_product_form");
        }
        $config['upload_path']= './uploads/';
        $config['allowed_types']= 'png|gif|jpg|jpeg';
        $config['max_size']= 10024;//kb
        $config['max_width']= 6000;
        $config['max_height']= 6000;
        $this->load->library('upload', $config);
        if($this->upload->do_upload('pro_imagetwo')){
        	$data = $this->upload->data();
        	  }else{
        	  $error =  $this->upload->display_errors();
        	$this->session->set_userdata('error_image',$error);
        	//redirect("Product/add_product_form");
        }
        $pro_title = $this->input->post('pro_title',true);
		$pro_desc = $this->input->post('pro_desc',true);
		$pro_cat= $this->input->post('pro_cat',true);
		$pro_sub_cat = $this->input->post('sub_cat',true);
		$colour= $this->input->post('colour',true);
		$pro_brand = $this->input->post('ptype',true);
		$pro_quantity = $this->input->post('pro_quantity',true);
		$pro_availability = $this->input->post('pro_availability',true);
		$pro_status = $this->input->post('status',true);
		$pro_image = $_FILES['pro_image']['name'];
		$pro_imageone = $_FILES['pro_imageone']['name'];
		$pro_imagetwo = $_FILES['pro_imagetwo']['name'];
		$top_product = $this->input->post('top_product',true);
		$data=array(
			'pro_title' => $pro_title,
                                'pro_desc' => $pro_desc,
                                'colour' => $colour,
                                'pro_quantity' => $pro_quantity,
                                'pro_image' => $pro_image,
                                'pro_imageone' => $pro_imageone,
                                'pro_imagetwo' => $pro_imagetwo,
                                'top_product' => $top_product,
                                'pro_cat' => $pro_cat,
                                'pro_sub_cat' => $pro_sub_cat,
                                'pro_brand' => $pro_sub_cat,
                                'pro_availability' =>$pro_availability,
                                'pro_status' =>$pro_status
                            );
		$rec=$this->ProductModel->add_product_detail($data);
$this->session->set_flashdata("flsh_msg","<font class='success'>Product Added Successfully</font>");
if($pro_cat=='72')
{
	redirect('add_variation'); 
}
else
{
	redirect('add_phone_variation'); 
}
		
}
	
	
}

?>