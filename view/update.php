<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/assets/style.css">
    <title>Document</title>
</head>
<body>
    <?php require 'header.php';?>

    <!-- <div class="main">

    <form action="index.php?op=update&id=<?=$html['id']?>" method="POST">
    <div>
        <label>Name:</label>
        <input type="text" name="name" value="<?=$html['name']?>">
    </div>

    <div>
        <label>Phone:</label>
        <input type="number" name="phone" value="<?=$html['phone']?>">
    </div>
    
    <div>
        <label>Email:</label>
        <input type="email" name="email" value="<?=$html['email']?>">
    </div>

    <div>
        <label>Address:</label>
        <input type="text" name="location" value="<?=$html['location']?>">
    </div>

    <div>
        <input type="reset">
        <input type="submit" name="submit" value="Submit">
    </div>
  </form>

 
</div> -->

<div class="main">

    <form action="index.php?op=update&product_id=<?=$html['product_id']?>" method="POST" enctype="multipart/form-data">
    <div>
        <label>Product_type_code:</label>
        <input type="number" name="product_type_code" value="<?=$html['product_type_code']?>">
    </div>

    <div>
        <label>Supplier_id:</label>
        <input type="number" name="supplier_id" value="<?=$html['supplier_id']?>">
    </div>
    
    <div>
        <label>Product_name:</label>
        <input type="text" name="product_name" value="<?=$html['product_name']?>">
    </div>

    <div>
        <label>Product_price:</label>
        <input type="decimal" name="product_price" value="<?=$html['product_price']?>">
    </div>

    <div>
        <label>Other_product_details:</label>
        <!-- <input type="text" name="other_product_details" value="<?=$html['other_product_details']?>"> -->
        <textarea id="mceDEMO" name="other_product_details" value="<?=$html['other_product_details']?>"></textarea>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.0.0/tinymce.min.js"
                    integrity="sha512-XQOOk3AOZDpVgRcau6q9Nx/1eL0ATVVQ+3FQMn3uhMqfIwphM9rY6twWuCo7M69rZPdowOwuYXXT+uOU91ktLw=="
                    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>    tinymce.init({
                selector: "#mceDEMO",
                plugins: "save",
                menubar: false,
                toolbar: "save | styleselect | bold italic | alignleft aligncenter alignright alignjustify"
}); 
</script>
</div>

    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">

    <div>
        <input type="reset">
        <input type="submit" name="submit" value="Submit">
    </div>
  </form>

  <!-- <form action="index.php?op=update&product_id=<?=$html['product_id']?>"method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image"name="submit">
</form>  -->

 
</div>
</div>




<?php require 'footer.php';?>
    
</body>
</html>