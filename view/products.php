<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/assets/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css">
    <link href="view/assets/yourcustom.js">
    <title>Document</title>
</head>

<body>
    <?php
    require 'header.php';
    ?>

<div class="search">
    <form action="index.php?op=search" method="POST">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit" name ="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
    
        <br><a href="index.php?op=create">Create</a> 

        <br>

        <a href="index.php?op=shopping">shopping</a> 

        <br>  

        <?= $html ?>

        
        <?php 
        // var_dump($page);
        for($i = 1; $i <= $pages; $i++) {
         echo "<a href=\"index.php?op=products&page={$i}\">{$i}</a>";
        }
        ?>

<div id="demo">
<p>Let AJAX change this text.</p>
<button type="button" onclick="loadDoc('index.php?op=create')">Change Content</button>
</div>
        
    </div>
</div>
    <?php
    require 'footer.php';
    ?>
</body>
</html>