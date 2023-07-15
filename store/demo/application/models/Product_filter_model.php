<?php

class Product_filter_model extends CI_Model
{
 function fetch_filter_type($type)
 {
  $this->db->distinct();
  $this->db->select($type);
  $this->db->from('tbl_product');
  $this->db->where('pro_status', '2');
  return $this->db->get();
 }
function make_query($minimum_price, $maximum_price,  $ram, $storage)
 {
  $query = "
  SELECT * FROM tbl_product 
  WHERE pro_status = '2' 
  ";
if(isset($minimum_price, $maximum_price) && !empty($minimum_price) &&  !empty($maximum_price))
  {
   $query .= "
    AND pro_price BETWEEN '".$minimum_price."' AND '".$maximum_price."'
   ";
  }
if(isset($ram))
  {
   $ram_filter = implode("','", $ram);
   $query .= "
    AND ram IN('".$ram_filter."')
   ";
  }

  if(isset($storage))
  {
   $storage_filter = implode("','", $storage);
   $query .= "
    AND variation IN('".$storage_filter."')
   ";
  }
  return $query;
 }

 function count_all($minimum_price, $maximum_price, $ram, $storage)
 {
  $query = $this->make_query($minimum_price, $maximum_price, $ram, $storage);
  $data = $this->db->query($query);
  return $data->num_rows();
 }

 function fetch_data($limit, $start, $minimum_price, $maximum_price,  $ram, $storage)
 {
  $query = $this->make_query($minimum_price, $maximum_price,  $ram, $storage);

  $query .= ' LIMIT '.$start.', ' . $limit;

  $data = $this->db->query($query);

  $output = '';
  if($data->num_rows() > 0)
  {
   foreach($data->result_array() as $row)
   {
    $output .= '
    <div class="col-sm-4 col-lg-3 col-md-3">
     <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:450px;">
      <img src="'.base_url().'images/'. $row['pro_image'] .'" alt="" class="img-responsive" >
      <p align="center"><strong><a href="#">'. $row['pro_title'] .'</a></strong></p>
      <h4 style="text-align:center;" class="text-danger" >'. $row['pro_price'] .'</h4>
      <p>Camera : '. $row['pro_condition'].' MP<br />
     RAM : '. $row['ram'] .' GB<br />
      Storage : '. $row['variation'] .' GB </p>
     </div>
    </div>
    ';
   }
  }
  else
  {
   $output = '<h3>No Data Found</h3>';
  }
  return $output;
 }
}

?>
