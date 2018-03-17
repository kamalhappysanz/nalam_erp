<?php

Class Stocksmodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();

  }


  function add_stocks($purchase_date,$item_name,$item_units,$item_price,$total_price,$comments,$user_id)
   {

    $daliy_insert="INSERT INTO purchase_history(purchase_date,item_name,item_units,item_price,total_price,comments,created_by,created_at,updated_at,updated_by) VALUES('$purchase_date','$item_name','$item_units','$item_price','$total_price','$comments','$user_id',NOW(),NOW(),'$user_id')";
    $res_ga=$this->db->query($daliy_insert);

        if ($res_ga){
          echo "success";
          } else {
            echo "failed";
          }
         }


         function list_of_purchase(){
           $sql="SELECT * FROM purchase_history order by id desc";
           $result=$this->db->query($sql);
           return $res=$result->result();
         }

     function update_purchase_id($id,$item_name,$item_price,$item_units,$total_price,$comments,$user_id){
       $update="UPDATE purchase_history SET item_name='$item_name',item_units='$item_units',item_price='$item_price',total_price='$total_price',updated_at=NOW(),updated_by='$user_id' where id='$id'";
        $result=$this->db->query($update);
        if($result){
          echo "Updated";
        }else{
              echo "failed";
        }
     }












}
