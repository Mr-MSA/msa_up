<!DOCTYPE html>
<html>
<head>
	<title>Upload File</title>
	<link rel="shortcut icon" href="icon.png" type="image/x-icon">
	<style>
	    body
	    {
	        background-color:black;
	    }
	    #me
	    {
	        color:red;
	        font-size:30pt;
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
    <center>
    <p id="me"><b>Authorized types: jpg , png <br> Allowed size: 1MG </b></p>
      <form action="index.php" method="post" enctype="multipart/form-data">
    	<p id="me2" ><b>Select Yor File :  </b></p>
    	<input id="text" type="file" name="up" accept="image/*" />
    	<input id="su" type="submit" name="send" value="Upload">
    </form>
    </center>
</body>
</html>

<?php

$error = array ('<p id="me3">Authorized types: jpg , png','Allowed size: 1MG</p> ') ;
$yes = '<p id="me3" >Your file has been uploaded successfully.</p>' ;
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
        $set['2'] = 'false' ;
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
          $set['3'] = 'false' ;
          echo $error['0'] ;
          
         } 
       }
    }
    
    if ($set['3'] == 'true'){
        
       if ($_FILES['up']['size'] < 1000000 ){
           
        $set['4'] = 'true';

       }else{
           $set['4'] = 'false' ;
           echo $error['1'];
       }
       
    }
    
    if ($set['4'] == 'true'){
        $name_hash = rand() ;
        move_uploaded_file($_FILES['up']['tmp_name'],'upload/'.$name_hash.'.jpg');
        unset($_FILES['up']);
        header('location:index.php?message=uploaded');
    }
    
    
    if (isset($_GET['message'])){
        
        if ($_GET['message'] == 'uploaded'){
            echo $yes ;
        }
    }
?>

