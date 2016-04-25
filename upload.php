<?php
include('session.php');
?>

<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>IIT Photoshare Site</title>
</head>
<body>
<!--<div class="main-header" id="banner">
    <h1 id="hawkstagram"><span>Hawks</span>tagram</h1>
    <div>
        <img src="search-icon-white.png" alt="search_icon" id="search">
        <button id="sign_in" >Sign In</button>
    </div>
</div>
s
<form action="connect.php" method="POST" enctype="multipart/form-data">
    <label for="image_ID">Select image to upload:</label>
    <input type="submit" name="image" id="imageToUpload" size="30"/>
</form> <br>
<form>
    <label >Name: <input type="text" name="fname" /></label>
</form>

<h2>Categories</h2>
<button type="button">Graduation</button>
<button type="button">Sports</button>
<button type="button">IPRO</button><br>
<button type="button">Events</button>
<button type="button">College Life</button>
<button type="button">Graduation</button><br>
<button type="button">Graduation</button>
<button type="button">Graduation</button>
<button type="button">Graduation</button><br><br>
<input type="submit" value="Submit"/>



<h1>Welcome <?php /*echo $login_session; */?></h1>
<h2><a href = "index.html">Sign Out</a></h2>-->



<?php
if(isset($_FILES['image'])){
$errors= array();
$file_name = $_FILES['image']['name'];
$file_size =$_FILES['image']['size'];
$file_tmp =$_FILES['image']['tmp_name'];
$file_type=$_FILES['image']['type'];
$file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

$expensions= array("jpeg","jpg","png");

if(in_array($file_ext,$expensions)=== false){
$errors[]="extension not allowed, please choose a JPEG or PNG file.";
}

if($file_size > 2097152){
$errors[]='File size must be excately 2 MB';
}

if(empty($errors)==true){
move_uploaded_file($file_tmp,"images/".$file_name);
echo "Success";
}else{
print_r($errors);
}
}
?>
<html>
<body>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="file" name="image" />
    <input type="submit"/>
</form>

</body>
</html>
</body>
</html>



