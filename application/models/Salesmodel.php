<?php

Class Salesmodel extends CI_Model
{

  public function __construct()
  {
      parent::__construct();

  }


  function daily_sales_report($user_id,$product_id,$sales_date,$units,$price,$comments)
   {
     $counts=count($product_id);
        for($i=0;$i<$counts;$i++){
         $total = $units[$i] * $price[$i];
           $daliy_insert="INSERT INTO daily_sales_report(product_id,sales_date,units,price,total,user_id,created_by,created_at,updated_at,updated_by) VALUES('$product_id[$i]','$sales_date','$units[$i]','$price[$i]','$total','$user_id','$user_id',NOW(),NOW(),'$user_id')";
          $res_ga=$this->db->query($daliy_insert);
       }
       if ($res_ga){
               echo "success";
          } else {
            echo "failed";
          }
         }


         function date_wise_sales($sales_date){
            $select="SELECT pm.product_name,dsr.* FROM  daily_sales_report as dsr left join product_master as pm on pm.id=dsr.product_id Where dsr.sales_date='$sales_date'";

           $result=$this->db->query($select);
           return $res=$result->result();
         }

         function date_wise_sales_total($sales_date){
            $select="SELECT pm.product_name,sum(dsr.total) as total_price,sum(dsr.units) as total_units FROM  daily_sales_report as dsr left join product_master as pm on pm.id=dsr.product_id Where dsr.sales_date='$sales_date' group by dsr.product_id";
           $result=$this->db->query($select);
           return $res=$result->result();
         }
         function total_sales_of_day($sales_date){
            $select="SELECT sum(dsr.total) as total_sales FROM  daily_sales_report as dsr left join product_master as pm on pm.id=dsr.product_id Where dsr.sales_date='$sales_date'";
           $result=$this->db->query($select);
           return $res=$result->result();
         }



        function month_wise_sales($sales_month,$sales_year){
          $select="SELECT pm.product_name,dsr.* FROM  daily_sales_report as dsr left join product_master as pm on pm.id=dsr.product_id Where Month(dsr.sales_date)='$sales_month' and  YEAR(dsr.sales_date)='$sales_year'";
          $result=$this->db->query($select);
          return $res=$result->result();
        }

        function month_wise_sales_total($sales_month,$sales_year){
           $select="SELECT pm.product_name,sum(dsr.total) as total_price,sum(dsr.units) as total_units FROM  daily_sales_report as dsr left join product_master as pm on pm.id=dsr.product_id Where Month(dsr.sales_date)='$sales_month' and  YEAR(dsr.sales_date)='$sales_year' group by dsr.product_id";
          $result=$this->db->query($select);
          return $res=$result->result();
        }
        function total_sales_of_month($sales_month,$sales_year){
           $select="SELECT sum(dsr.total) as total_sales FROM  daily_sales_report as dsr left join product_master as pm on pm.id=dsr.product_id Where Month(dsr.sales_date)='$sales_month' and  YEAR(dsr.sales_date)='$sales_year'";
          $result=$this->db->query($select);
          return $res=$result->result();
        }










}
