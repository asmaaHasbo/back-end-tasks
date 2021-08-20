<?php

session_start();

if (isset($_POST['submit'])) {
   // print_r($_POST);
    echo '<pre>';
    print_r($_FILES['img']);
    echo '</pre'>

    $userInputName = $_POST['imgName'];
    $imgInfo=$_FILES['img'];
    $imgName = $imgInfo['name'];
    $imgTmpName = $imgInfo['tmp_name'];
    $imgErrors = $imgInfo['error'];
    $imgSize = $imgInfo['size'];

    $imgExtension = pathinfo($imgName , PATHINFO_EXTENSION);
 
 // validation on name input 

    $error=[];
    if (empty( $userInputName)) {
        $error[]='image name is requried';
    }
    elseif (strlen( $userInputName)<4 || strlen( $userInputName)>50 ) {
        $error[]='image name must be between [8-50]';
    }

 // validation on image

    if ($imgErrors>0) {
        $error[]='there is an error while uploading file ';
    }
    elseif (!in_array($imgExtension , ['png' , 'jpg' , 'gif' , 'jpeg'])) {
        $error[]='must be image ';
    }
    elseif ($imgSize > $imgSize/1024*1024) {
        $error[]=' img Size must be less than 1MB ';
    }

 // if there no errors

    if (empty($error)) {  

    //$imgWithoutExten=pathinfo($imgName , PATHINFO_FILENAME);
   
    $imgExtension = pathinfo($imgName , PATHINFO_EXTENSION);
   
    $uniqeName = "$userInputName-".uniqid().".$imgExtension";
    
    move_uploaded_file($imgTmpName , "uploaded-image/ $uniqeName" );

    header("location:index.php");
    }

 // if there is an error

    else{
        session_start();
        $_SESSION['errors']=$error;
       header("location:index.php");
    }
}
else{
    header("location:index.php");
}
?>