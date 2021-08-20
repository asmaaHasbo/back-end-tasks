<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>Document</title>
</head>
<body> <br> <br>
<div class=" form-control m-auto  w-50 h-50  "> <br>
    <h2 class="text-secondary text-center"> Images Drive </h2>
    <form action="handel-index.php" method="POST" enctype="multipart/form-data"> <br>
        
        <input type="text" name="imgName" class="form-control" id="" placeholder="Enter image name..."> <br>
        
        <input type="file" name="img"   id=""> <br> <br>

        <div class="text-danger" >
            <?php
                session_start();

                if (!empty($_SESSION['errors'])) {

                    foreach ($_SESSION['errors'] as $key => $value) {
                       echo "error[ $key ] : $value <br>";
                       unset($_SESSION['errors']);
                    }
                }
            ?>
        </div> <br>
        
        <button class="btn btn-success" type="submit" name="submit"> upload</button> 
         
    </form> <br>
</div>
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>

<!-- downloading images -->

<div> 
    <br>
     <h3 class=" ml-5" style="text-decoration:underline; color:darkblue">The Stored Images:-</h3>
     <br>
<?php

$files = scandir("uploaded-image",SCANDIR_SORT_NONE);
for ($i=2; $i < count($files); $i++) { 
   ?> 
   <i class="fas fa-file-image ml-3 text-secandory" style="font-size: 25px;"></i> 
   <a href="uploaded-image/<?php echo $files[$i]?>" > <?php echo $files[$i] ?></a> 
   <br>
   <br> 
   <?php
}  
?>
</div>