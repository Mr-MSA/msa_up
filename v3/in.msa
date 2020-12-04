<!DOCTYPE html>
<html>
<head>
	<title>Upload File</title>
	<link rel="shortcut icon" href="https://tools.mr-msa.xyz/File/icon.png" type="image/x-icon">
    <style type="text/css" >
	    body
	    {
	        background-color:black;
	    }
	    a , .img_link
	    {
	        text-decoration:none;
	        color:#498;
	        font-size:13pt;
	    }
	    #me
	    {
	        color:red;
	        font-size:20pt;
	    }
	    #me2
	    {
	        color:blue;
	        font-size:20pt;
	    }
	    #me3
	    {
	     	color:green;
	        font-size:16pt;   
	    }
	    #su
	    {
	        color:green;
	        background-color:black;
	    }
	    #text
	    {
	        color: #008000;
	        font-family: Arial;
	        font-size: 8pt;
	        font-weight: bold;
	        border: 2px solid #008000;
	        background-color: #000;
	    }
    </style>
</head>
<body>
    <p id="me"><b>Rules : <br> 1- Authorized types: jpg , png <br> 2- Allowed size: 1MG </b></p>
    <center>
      <form action="" method="post" enctype="multipart/form-data">
    	<p id="me2" ><b>Select Yor File :  </b></p>
    	<input id="text" type="file" name="up" accept="image/*" />
    	<input id="su" type="submit" name="send" value="Upload">
    </form>
    </center>
</body>
</html>

<?php
function PASS($text)
{
    $random_text = $text.rand(100 * 100,true);
    $hash=crc32(md5($random_text));
    $msa=666;
    $low=($hash * $msa) + 29 ;
    $h=(($low + $low) * $msa) - $hash ;
    function pass2($n){
        $a = $n - 10 ;
        $at = $a - 7 ;
        $end = ($at / 2) - 100 ;
        $start = ((($end * 324 ) / 2 ) + 234 ) - 500 ;
        $ending = ((($start + 10) / 2 ) / 1000) / 409 ;
        return $ending ;
    }
    $H = pass2($h);
    return 'uploads/' . $H ;
}
$error =['error_type' => '<p style="color:red;" >Error : Authorized types: jpg , png</p>','error_size' => '<p style="color:red;" >Error : Allowed size: 1MG</p>'] ;
$yes = '<p style="color:green;font-size:13pt;">Your file has been uploaded successfully.</p>' ;
$set = array( '1' => '', '2'=>'','3'=> '','4' => '');
if (isset($_POST['send'])) {
    
	if ($_FILES['up']['error'] == 0 ) {
	    
    $set['1'] = 'true';
    
	}
}

if($set['1'] == 'true'){
    
    $type_name = explode('.',$_FILES['up']['name']) ;
    
     if($_FILES['up']['type'] == 'image/png'){ 
         
        $set['2'] = 'true' ;
        
    }else if ($_FILES['up']['type'] == 'image/jpeg'){
        
    	$set['2'] = 'true' ;
    	
    }else{
    	echo $error['0'] ;
    }
 }
    if ($set['2'] == 'true'){
        if (isset($_FILES['up']['name'])){
            
           if(end($type_name)  == 'png'){
            
          $set['3'] = 'true';

         }else if (end($type_name)  == 'jpg') {
             
          $set['3'] = 'true';

         }else {
             
          echo $error['error_type'] ;
          
         } 
       }
    }
    
    if ($set['3'] == 'true'){
        
       if ($_FILES['up']['size'] <= 1000000 ){
           
        $set['4'] = 'true';

       }else{
           echo $error['1'];
       }
       
    }
    
    if ($set['4'] == 'true'){
        
        $name = $_FILES['up']['name'] ;
        $name_hash =  PASS($name) ;
        $type = '.' . end($type_name)  ;
        move_uploaded_file($_FILES['up']['tmp_name'],$name_hash . $type );
        $IMG_URL =  $name_hash . $type ;
        echo '<br><p id="me3" >Image Link : /' . $IMG_URL . "</p>" ;
        echo $yes ;
        unset($_FILES['up']);
        
    }

?>
