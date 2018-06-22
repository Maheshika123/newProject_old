<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

	<?php 
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "savoury";
	
	$con =new mysqli($host,$user,$pass,$db);
	if($con->connect_error){
		die("Connection faild ".$con->connect_error);
	}
?>
<?php
// define variables and set to empty values

$boolean = TRUE;
$catnameErr = "";




if(isset($_POST["catname"])){$catname = test_input($_POST["catname"]);}
if(isset($_POST["catdes"])){$catdes = test_input($_POST["catdes"]);}
//if(isset($_POST["image"])){$image = test_input($_POST["image"]);}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
  if (empty($_POST["catname"])) {
    $catnameErr = "Category Name is required";
  } else{
    
    // check if name only contains letters and whitespace
		if(!preg_match("/^[a-zA-Z ]*$/",$catname)) {
			$catname = "";
			$catnameErr = "*Only letters and white space allowed";
		}else{
			$catname = test_input($_POST["catname"]);
		}
	
  }
  
   if (empty($_POST["catdes"])) {
    $catdes = "";
  } else {
    $catdes = test_input($_POST["catdes"]);
  }
  
	/*if(empty($_FILES['image'])){
        $imageErr = "";
    }else{
        move_uploaded_file($_FILES['image']['tmp_name'], "img/".$_FILES['image']['name']);
            $image = "img/{$_FILES['image']['name']}";
    }*/
    
  

	
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class ="text-center"style="color: white; ">Add Category </h1>
		<p style="color: red;"><span class="error">* required field.</span></p>
	

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 



		<tr>  
		  <td> Category Name: <br><br></td>
		  <td><input type="text" name="catname" <span class="error"><a style="color:red; font-size:73%">*<?php echo $catnameErr;?> </span><br><br></td>
		</tr>

		<tr>  
		  <td>Category Description: <br><br><br></td>
		  <td><textarea name="catdes" rows="5" cols="40"> </textarea><br><br></td>
		</tr>
		  

		<!--
		<tr>
			<td>Image: </td>
			<td> <input  type="file" name="image" onchange="previewFile()" />
			<img src="" height="50"  id="itemimage"alt="Image preview..."><br><br></td>
		</tr>
		-->
		  
		<tr>
		  <td> </td>
		  <td><input type="submit" name="submit" value="Submit" style ="color:black;" class="pure-button pure-button-primary"></td> 
		</tr>



	
		</form>
	</div>
</div>



<!--
<script type="text/javascript">
            function previewFile(){
                var preview = document.querySelector('#itemimage'); //selects the query named img
                var file    = document.querySelector('input[type=file]').files[0]; //sames as here
                var reader  = new FileReader();

                reader.onloadend = function () {
                    preview.src = reader.result;
                }

                if (file) {
                    reader.readAsDataURL(file); //reads the data as a URL
                } else {
                    preview.src = "";
                }
            }

            previewFile(); 
        
        </script>
-->

<?php
	
if (isset($_POST["submit"])){	
	
	
	if((!empty($catname))&&(isset($_POST["catdes"])) //&&(isset($_POST["catdes"]))
		){
		
		// Perform Database Query
	$sql = "INSERT INTO category(cat_name, cat_description)
	
	VALUES ('$catname', '$catdes') ";
		
	// User Returned Database
	mysqli_query($con,$sql);
			
	
		echo "Your registation was added succeessfully ";
	
	}
	
	// Close Connection
		
}	


?>		

		