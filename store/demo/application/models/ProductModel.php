<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProductModel extends CI_Model {
public function add_product_model($product_image)
{
		$data['pro_title'] = $this->input->post('pro_title',true);
		$data['pro_desc'] = $this->input->post('pro_desc',true);
		$data['pro_cat'] = $this->input->post('pro_cat',true);
		$data['pro_sub_cat'] = $this->input->post('pro_sub_cat',true);
		$data['pro_brand'] = $this->input->post('pro_brand',true);
		$data['pro_price'] = $this->input->post('pro_price',true);
		$data['pro_quantity'] = $this->input->post('pro_quantity',true);
		$data['pro_availability'] = $this->input->post('pro_availability',true);
		$data['pro_status'] = $this->input->post('pro_status',true);
		$data['pro_image'] = $product_image;
		$data['top_product'] = $this->input->post('top_product',true);
        $this->db->insert('tbl_product',$data);	
	}
	public function get_all_product_limit(){
		$data = $this->db->select('*') 
			->from('tbl_product')
			->where('pro_brand','Featured' )
			->order_by('pro_id','desc')
			->get()
			->result();
			return $data;
	}
	public function get_all_top_product(){
		$data = $this->db->select('*')
			->from('tbl_product')
			->order_by('pro_id','desc')
			->where('top_product','1')
			->limit("4")
			->get()
			->result();
			return $data;
	}
	public function get_slider()
	{
		$data = $this->db->select('*')
			->from('slider')->order_by('id','desc')->get()->result();
			return $data;
}
	public function get_all_category(){
		$data = $this->db->select('*')
			->from('tbl_category')
			->order_by('category_id','desc')
			->get()
			->result();
			return $data;
	}
	public function get_all_sub_category(){
		$data = $this->db->select('*')
			->from('tbl_sub_category')
			->order_by('sub_cat_id','desc')
			->get()
			->result();
			return $data;
	}
	public function get_all_brand(){
		$data = $this->db->select('*')
			->from('tbl_brand')
			->order_by('brand_id','desc')
			->get()
			->result();
			return $data;
	}
	public function get_all_product(){
		$data = $this->db->select('*')
			->from('tbl_product')
			->order_by('pro_id','desc')
			->get()
			->result();
			return $data;
	}
	public function edit_product_model($product_id){
		$data = $this->db->select('*')
			->from('tbl_product')
			->order_by('pro_id','desc')
			->where('pro_id',$product_id)
			->get()
			->row();
			return $data;
	}
	public function update_product_model($product_image,$product_image1,$product_image2){
		$product_id = $this->input->post('pro_id',true);
		$data['pro_title'] = $this->input->post('pro_title',true);
		$data['pro_desc'] = $this->input->post('pro_desc',true);
		$data['pro_cat'] = $this->input->post('pro_cat',true);
		$data['pro_sub_cat'] = $this->input->post('pro_sub_cat',true);
		$data['pro_brand'] = $this->input->post('pro_brand',true);
		$data['colour'] = $this->input->post('colour',true);
		$data['pro_quantity'] = $this->input->post('pro_quantity',true);
		$data['pro_availability'] = $this->input->post('pro_availability',true);
		$data['pro_status'] = $this->input->post('status',true);
		$data['pro_image'] = $product_image;
		$data['top_product'] = $this->input->post('top_product',true);
		$this->db->where('pro_id',$product_id);
		$this->db->update('tbl_product',$data);
		
	}
	public function delete_product_model($product_id){
		$product_image = $this->edit_product_model($product_id);
		unlink($product_image->pro_image);
		$this->db->where('pro_id', $product_id);
		$this->db->delete('tbl_product');
	}
	public function sub_category_fetch($t)
	{
		$query=$this->db->query("select * from tbl_sub_category where category_sub_id='$t'");
	return $query->result();
	}
	public function saverecords($data)
	{
		$this->db->insert('tbl_product', $data);
	}
	public function insertvariation($data)
	{
		$this->db->insert('variation', $data);
	}
	public function add_product_detail($data)
	{
		$this->db->insert('tbl_product', $data);
	}
	
	

}
