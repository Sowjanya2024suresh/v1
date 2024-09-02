<?php
header('Access-Control-Allow-Origin: *');
// Importing DBConfig.php file.
    include '../dbconnect.php';


    $sqlretaildata ="SELECT `id`, `retail_code`, `retail_name`, `authcode`, `website`, `category`, `logo_image`, `description`, `payment_gateway`,(SELECT COUNT(*) FROM retail_vendor_products WHERE retail_vendor_products.retail_code = retail_vendor.retail_code) AS count FROM `retail_vendor` WHERE `active`=1";
    $resretaildata= mysqli_query($con,$sqlretaildata);
    
    if($resretaildata)
    {
    	while($row = mysqli_fetch_array($resretaildata))
    	{
    		
             $retvendordata[] =array('id'=>$row[0],'retail_code'=>$row[1],'retail_name'=>$row[2],'authcode'=>$row[3],'website'=>$row[4],'category'=>$row[5],'logo_image'=>$row[6],'description'=>$row[7],'payment_gateway'=>$row[8],'count'=>$row[9]);
        }
        print_r(json_encode($retvendordata));	
    }

 
 
 


mysqli_close($con);
 
?>