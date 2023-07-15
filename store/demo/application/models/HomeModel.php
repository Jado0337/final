<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomeModel extends CI_Model {
	// public function get_product_by_id($product_id){
	// 	$data = $this->db->select('*')
	// 			->from("tbl_product")
	// 			->where("pro_id",$product_id)
	// 			->join('tbl_brand','tbl_brand.brand_id=tbl_product.pro_brand')
	// 			->get()
	// 			->row();
	// 			return $data;
	// }

    public function get_product_by_id($product_id){
		$this->db->select('*');
	    $this->db->from('tbl_product');
		 $this->db->where('pro_id',$product_id);
	    $query = $this->db->get();
	    return $query->row();
	}
	public function get_sub_id($product_id){
		$this->db->select('pro_sub_cat');
	    $this->db->from('tbl_product');
		 $this->db->where('pro_id',$product_id);
	    $query = $this->db->get();
	    return $query->row();
	}
	public function get_total_product_by_brand($brand_id){
		$data = $this->db->select('count(pro_brand) as total')
			->from('tbl_product')
			->where('pro_brand',$brand_id)
			->get()
			->result();
			return $data;
	}
	public function post_brand_by_id($brand_id){
		$data = $this->db->select('*')
			->from('tbl_product')
			->where('pro_brand',$brand_id)
			->get()
			->result();
			return $data;
	}
	public function post_sub_cat_by_id($sub_cat_id,$limit,$start){
		$data = $this->db->select('*')
			->from('tbl_product')
			->where('pro_sub_cat',$sub_cat_id)
			->limit($limit,$start)
			->get()
			->result();
			return $data;
	}
	public function post_cat_by_id($cat_id){
		$data = $this->db->select('*')
			->from('tbl_sub_category')
			->where('category_sub_id',$cat_id)
			->get()
			->result();
			return $data;
	}
	public function countRow(){	
	  $query = $this->db->query("SELECT COUNT(pro_id) as count FROM tbl_product");
	  if($query->num_rows() >0 ){
	    $row =  $query->row();
	    $data =  $row->count; 
	 		return $data;
		}
	}
	public function get_all_product_pagination($perpage,$offset){
		if($offset==NULL){
			$offset=0;
		}
		$data = $this->db->select('*')
			->from('tbl_product')
			->where('pro_status',1)
			->limit($perpage,$offset)
			->get()
			->result();
			return $data;
	}
	public function show_product_price_range($min_range,$max_range,$id){
		$data = $this->db->select('*')
			->from('tbl_product')
			->where('pro_sub_cat',$id)
			->where("pro_price BETWEEN '".$min_range."' AND '".$max_range."'")
			->get()
			->result();
		return $data;
	}
	public function get_mobile_six(){
		$data = $this->db->select('*')
			->from('tbl_product')
			->where('pro_cat','71')
			->order_by('rand()')
			->limit(4)
			->get()
			->result();
		return $data;
	}
	public function get_laptop_six(){
		$data = $this->db->select('*')
			->from('tbl_product')
			->where('pro_cat','72')
			->order_by('rand()')
			->limit(4)
			->get()
			->result();
		return $data;
	}
	public function get_tablet_six(){
		$data = $this->db->select('*')
			->from('tbl_product')
			->where('pro_cat','74')
			->order_by('rand()')
			->limit(4)
			->get()
			->result();
		return $data;
	}
	public function get_watch_six(){
		$data = $this->db->select('*')
			->from('tbl_product')
			->where('pro_cat','75')
			->limit(4)
			->get()
			->result();
		return $data;
	}
	public function get_recommended_three(){
		$data = $this->db->select('*')
			->from('tbl_product')
			->order_by('rand()')
			->limit(4)
			->get()
			->result();
		return $data;
	}
	public function get_count($id) {
        $data = $this->db->select('*')
			->from('tbl_product')
			->where('pro_sub_cat',$id)
			->get()
			->result();
			return $data;
    }
    public function get_variant($id)
    {
        $data = $this->db->select('*')
			->from('variation')
			->where('product_id',$id)
			->get()
			->result();
			return $data;
    }
    public function colour($product_id){
		
			$query = $this->db->query("SELECT DISTINCT colour FROM tbl_product where pro_sub_cat='$product_id'");
$result = $query->result_array();
return $result;
	}
	public function ram($product_id){
		
			$query = $this->db->query("SELECT DISTINCT ram FROM tbl_product where pro_sub_cat='$product_id'");
$result = $query->result_array();
return $result;
	}
	public function processor($product_id){
		
			$query = $this->db->query("SELECT DISTINCT processor FROM tbl_product where pro_sub_cat='$product_id'");
$result = $query->result_array();
return $result;
	}
	public function variation($product_id){
		
			$query = $this->db->query("SELECT DISTINCT variation FROM tbl_product where pro_sub_cat='$product_id'");
$result = $query->result_array();
return $result;
	}
	public function year($product_id){
		
			$query = $this->db->query("SELECT DISTINCT year FROM tbl_product where pro_sub_cat='$product_id'");
$result = $query->result_array();
return $result;
	}
	public function show_product_filter($min_range,$max_range,$type){
		$data = $this->db->select('*')
			->from('tbl_product')
			->where('pro_sub_cat',$min_range)
			->where($type,$max_range)
			->get()
			->result();
		return $data;
	}
	public function fetch_networks($t,$id)
	{
		$query=$this->db->query("select * from variation where product_id='$id' AND model='$t' ");
	return $query->result();
	}
	public function fetch_model($model,$id)
	{
	$query=$this->db->query("select * from variation where product_id='$id' AND model='$model' ");
	return $query->result();
	}
	public function fetch_processor($t,$id,$y)
	{
	$query=$this->db->query("select * from variation where product_id='$id' AND model='$t' AND year='$y'");
	return $query->result();
}
public function fetch_ram($t,$id,$y,$p)
	{
	$query=$this->db->query("select * from variation where product_id='$id' AND model='$t'  AND year='$y' AND processor='$p'");
	return $query->result();
}
	public function fetch_price($id,$v,$c,$s)
	{
	$query=$this->db->query("select $c from variation where product_id='$id' AND model='$v'  AND network='$s'");
	return $query->row();
}
public function fetch_laptop_price($id,$v,$c,$p,$r,$y)
	{
	$query=$this->db->query("select $c from variation where product_id='$id' AND model='$v'  AND year='$y' AND processor='$p' AND ram='$r' ");
	return $query->row();
}


	
}