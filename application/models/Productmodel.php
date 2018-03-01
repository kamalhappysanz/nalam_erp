<?php

Class Productmodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();

  }


  function check_product_name($product_name)
   {
     $check_email="SELECT * FROM product_master WHERE product_name='$product_name'";
     $res=$this->db->query($check_email);
     if($res->num_rows()==0){
       echo "true";
     }else{
     echo "false";
    }

    }

    function check_product_short_code($product_short_code)
     {
       $check_email="SELECT * FROM product_master WHERE product_short_code='$product_short_code'";
       $res=$this->db->query($check_email);
       if($res->num_rows()==0){
         echo "true";
       }else{
       echo "false";
      }

      }


      function check_product_name_exist($product_name,$id)
       {
         $check_email="SELECT * FROM product_master WHERE product_name='$product_name' AND id!='$id'";
         $res=$this->db->query($check_email);
         if($res->num_rows()==0){
           echo "true";
         }else{
         echo "false";
        }

        }

        function check_product_short_exist($product_short_code,$id)
         {
           $check_email="SELECT * FROM product_master WHERE product_short_code='$product_short_code' AND id!='$id'";
           $res=$this->db->query($check_email);
           if($res->num_rows()==0){
             echo "true";
           }else{
           echo "false";
          }

          }


      function create_product($product_name,$product_short_code,$base_price,$status,$user_id)
       {
         $create="INSERT INTO product_master (product_name,product_short_code,base_price,status,created_by,created_at) VALUES('$product_name','$product_short_code','$base_price','$status','$user_id',NOW())";
         $res=$this->db->query($create);
         if($res){
           echo "success";
         }else{
            echo "failed";
         }

        }

        function list_of_products(){
           $sql="SELECT * FROM product_master order by id desc";
          $result=$this->db->query($sql);
           return $res=$result->result();
        }

        function list_of_products_active(){
           $sql="SELECT * FROM product_master Where status='Active' order by id desc";
          $result=$this->db->query($sql);
           return $res=$result->result();
        }
        function get_product_id($product_id){
           $sql="SELECT * FROM product_master Where id='$product_id'";
           $result=$this->db->query($sql);
           return $res=$result->result();
        }
        function save_product($product_name,$product_short_code,$base_price,$status,$user_id,$product_id)         {
           $create="UPDATE product_master SET product_name='$product_name',product_short_code='$product_short_code',base_price='$base_price',status='$status',created_by='$user_id',created_at=NOW() Where id='$product_id'";
           $res=$this->db->query($create);
           if($res){
             echo "success";
           }else{
              echo "failed";
           }

          }

          function get_price_for_product($id){
           $sql="SELECT * FROM product_master Where id='$id'";
            $result=$this->db->query($sql);
            $res=$result->result();
            if($result->num_rows()==0){
              echo "0";
            }else{
                foreach($res as $rows){}
                echo $rows->base_price;
           }
          }




}
