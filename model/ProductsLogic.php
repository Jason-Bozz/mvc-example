<?php

require_once "model/DataHandler.php";


class ProductsLogic
{
  public function __construct()
  {
    $this->DataHandler = new Datahandler("localhost", "mysql", "stardunk_levels", "jay", "password");
  }

  public function __destruct()
  {
  }
  public function createProduct($product_type_code, $supplier_id, $product_name, $product_price, $product_thumbnail, $other_product_details)
  {

    // try {
      // $target_dir = "view/assets/image/";
      // $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      // $uploadOk = 1;
      // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      // // Check if image file is a actual image or fake image
      // if (isset($_POST["submit"])) {
      //   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
      //   if ($check !== false) {
      //     echo "File is an image - " . $check["mime"] . ".";
      //     $uploadOk = 1;
      //   } else {
      //     echo "File is not an image.";
      //     $uploadOk = 0;
      //   }
      // }
      // // Check if file already exists
      // if (file_exists($target_file)) {
      //   echo "Sorry, file already exists.";
      //   $uploadOk = 0;
      // }

      // // Check file size
      // if ($_FILES["fileToUpload"]["size"] > 500000) {
      //   echo "Sorry, your file is too large.";
      //   $uploadOk = 0;
      // }

      // // Allow certain file formats
      // if (
      //   $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
      //   && $imageFileType != "gif"
      // ) {
      //   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      //   $uploadOk = 0;
      // }

      // // Check if $uploadOk is set to 0 by an error
      // if ($uploadOk == 0) {
      //   echo "Sorry, your file was not uploaded.";
      //   // if everything is ok, try to upload file
      // } else {
      //   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      //     $sql = "INSERT INTO `products`(`product_id`, `product_type_code`, `supplier_id`, `product_name`, `product_price`, `product_thumbnail`, `other_product_details`) VALUES (NULL, '{$product_type_code}', '{$supplier_id}', '{$product_name}', '{$product_price}', '{$_FILES["fileToUpload"]["name"]}', '{$other_product_details}')";
      //     echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
      //   } else {
      //     echo "Sorry, there was an error uploading your file.";
      //   }
      // }
      // $sql = "INSERT INTO `products`(`product_id`, `product_type_code`, `supplier_id`, `product_name`, `product_price`, `product_thumbnail`, `other_product_details`) VALUES (NULL, '{$product_type_code}', '{$supplier_id}', '{$product_name}', '{$product_price}', '{$_FILES["fileToUpload"]["name"]}', '{$other_product_details}')";
      $sql = "INSERT INTO `products`(`product_id`, `product_type_code`, `supplier_id`, `product_name`, `product_price`, `other_product_details`) VALUES (NULL, '{$product_type_code}', '{$supplier_id}', '{$product_name}', '{$product_price}', '{$other_product_details}')";
      $results = $this->DataHandler->createData($sql);
      return $results;
    // } catch (Exception $e) {
    //   throw $e;
    // }
  }

  public function readProducts($product_id)
  {
    try {


      $sql = "SELECT * FROM products WHERE `product_id`='{$product_id}'";
      $results = $this->DataHandler->readData($sql);
      return $results;
    } catch (Exception $e) {
      throw $e;
    }
  }
  public function readallProducts($page = 1)
  {
    try {

      $items_per_page = 5;
      $position = ($page - 1) * $items_per_page;

      //$sql = 'SELECT * FROM products';
      $sql = 'SELECT `product_id`,`product_type_code`,`supplier_id`,`product_name`, Replace(Replace(Concat("€ ", Format (`product_price`, 2)), ",", ""), ".", ",") AS `product_price`,`other_product_details`,`product_thumbnail`FROM products LIMIT ' . $position . ', ' . $items_per_page; //LIMIT $position, $items_per_page
      //$sql = "SELECT * FROM products LIMIT ".$position.",".$items_per_page;
      //var_dump($sql);
      $results = $this->DataHandler->readsData($sql);

      $sql = 'SELECT count(*) FROM products';
      $aantalpaginas = $this->DataHandler->countPages($sql, $items_per_page);
      //$result2 = $mannyresults / $items_per_page;
      // var_dump($aantalpaginas);
      $array = [$results, $aantalpaginas];
      return $array;

      //return $results;

    } catch (Exception $e) {
      throw $e;
    }
  }

  public function updateProduct($product_id, $product_type_code, $supplier_id, $product_name, $product_price, $other_product_details)
  {

    try {
      $target_dir = "view/assets/image/";
      $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
      // Check if image file is a actual image or fake image
      if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
          echo "File is an image - " . $check["mime"] . ".";
          $uploadOk = 1;
        } else {
          echo "File is not an image.";
          $uploadOk = 0;
        }
      }
      // Check if file already exists
      if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
      }

      // Check file size
      if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
      }

      // Allow certain file formats
      if (
        $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif"
      ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
      }

      // Check if $uploadOk is set to 0 by an error
      if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
      } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
          echo "Sorry, there was an error uploading your file.";
        }
      }
      $sql = "UPDATE `products` SET `product_id`='{$product_id}', `product_type_code`='{$product_type_code}', `supplier_id`='{$supplier_id}', `product_name`='{$product_name}', `product_price`='{$product_price}', `product_thumbnail`='{$_FILES["fileToUpload"]["name"]}', `other_product_details`='{$other_product_details}' WHERE `product_id`='{$product_id}'";
      $results = $this->DataHandler->updateData($sql);
      return $results;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function deleteProduct($product_id)
  {
    try {

      $sql = "DELETE FROM `products` WHERE `product_id`='{$product_id}'";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function SearchProduct($search)
  {
    try {

      $sql = "SELECT * FROM `products` WHERE `product_name` LIKE '%{$search}%' OR `product_price` LIKE '%{$search}%' OR `other_product_details` LIKE '%{$search}%'";
      $results = $this->DataHandler->readsData($sql);
      return $results;
    } catch (Exception $e) {
      throw $e;
    }
  }
}
