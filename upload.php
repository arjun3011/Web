
<?php
/*
if(isset($_POST['submit'])){
    $files = $_FILES['file'];
    print_r($file);
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $filenameSize = $_FILES['file']['size'];
    $filenameError = $_FILES['file']['error'];
    $filenameType = $_FILES['file']['type'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg','jpeg','png');
    if(in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 1000000){
                $fileNameNew = uniqid('',true).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName, $fileDestination);
                header("Location: front-page.php?upload success");
            }
            else{
                echo "your file is too BIG mf" ;
            }
        }
        else{
            echo "There was an error uploading";
        }
    } 
    else{
        echo "You cant upload of this type! (contact me asap)";
    }
}
*/







$name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$position= strpos($name, ".");

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);


if (isset($name)) {

$path= 'uploads/2021/07/';
if (empty($name))
{
echo "Please choose a file";
}
else if (!empty($name)){
if (($fileextension !== "jpg") && ($fileextension !== "jpeg") && ($fileextension !== "png") && ($fileextension !== "bmp"))
{
echo "The file extension must be .jpg, .jpeg, .png, or .bmp in order to be uploaded";
}


else if (($fileextension == "jpg") || ($fileextension == "jpeg") || ($fileextension == "png") || ($fileextension == "bmp"))
{
if (move_uploaded_file($tmp_name, $path.$name)) {
echo 'Uploaded!';
}
}
}
}





?>
<?php

if (($fileextension == "jpg") || ($fileextension == "jpeg") || ($fileextension == "png") || ($fileextension == "bmp")) {
echo "The image you uploaded is shown below<br><br>";
echo "<img src='$path" . "$name'>";
echo "<br><br>";

}

?>
