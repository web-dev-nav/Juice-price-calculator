<?php
function get_due_date($glass_rate, $order_date, $total_invest){
   $days =floor($total_invest / $glass_rate);
   $glasses = $days; 
   
   $duedate = DateTime::createFromFormat("d-m-Y", $order_date)->add(new DateInterval('P'.$days.'D'))->modify('-1 day');
   $cost = $glass_rate * $days; 
  
   if($cost <= $total_invest){
       $bal =  $total_invest % $cost;
        $response = array("glass"=>$glasses, "buyer_bal"=>$bal, "service_until"=>$duedate->format('d-m-Y'));
        return json_encode($response);
   }else{
        $response = array("error"=>"Budget must be grater than per glass rate!");
        return json_encode($response);
   }
}


if(isset($_POST['call'])){
 echo get_due_date($_POST['rate'], $_POST['date'], $_POST['amt']);   
}
