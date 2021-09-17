<?php 
if(isset($_POST['submit']))
{

    if(isset($_FILES['image'])){

       
        $errors= array();
        $file_name = $_FILES['image']['name']; echo $file_name;exit;
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
        
        $extensions= array("jpeg","jpg","png");
        
        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }
        
        if($file_size > 2097152){
           $errors[]='File size must be exactly 2 MB';
        }
        
        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"image/logo/".$file_name);
           echo "Success";
        }else{
           print_r($errors);
        }
     }
	
}
?>
<form method="post" enctype="multipart/form-data">
<table class="table table-bordered table-striped table-hover">
	<h1>Update Logo</h1><hr>
	<tr style="height:40">
		
		<td><input type="file" name="image" class="form-control"required/></td>
	</tr>
	
	<tr>
		<td colspan="2" align="center">
			<input type="submit" class="btn btn-primary" value="Update logo" name="update"required/>
		</td>
	</tr>
</table> 
</form>