<?php

require_once 'model/ProductsLogic.php';
require_once 'model/Display.php';

class ProductsController {
    public function __construct() {
        $this->ProductsLogic = new ProductsLogic();
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            $op = isset($_GET['op']) ? $_GET['op'] : '';
            $page = isset($_GET['page']) ? $_GET['page'] : '1';

            switch ($op) {
                case 'create':
                   
                     $this->collectCreateProduct();
                
                    break;

                    case 'delete':
                   
                        $this->collectDeleteProduct($_REQUEST['product_id']);
                   
                       break;

                       case 'update':
                   
                        $this->collectUpdateProduct($_REQUEST['product_id']);
                   
                       break;

                       case 'read':
                   
                        $this->collectReadProduct($_REQUEST['product_id']);

                        break;

                        case 'search':
                   
                            $this->collectSearchProduct();
                   
                       break;

                       case 'shopping':
                   
                            $this->collectShoppingProduct();
                   
                       break;
                
                default:
                    # code...
                    $this->collectReadallProducts($page);
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

        public function collectReadProduct() {
            $product_id = isset($_REQUEST['product_id']) ? $_REQUEST['product_id'] : null;

            $res = $this->ProductsLogic->readProducts($product_id);
            $html = $this->Display->createCard($res);
            
            include 'view/read.php';
        }


        public function collectCreateProduct(){

            $product_type_code = isset($_REQUEST['product_type_code']) ? $_REQUEST['product_type_code'] : NULL;
            $supplier_id = isset($_REQUEST['supplier_id']) ? $_REQUEST['supplier_id'] : NULL;
            $product_name = isset($_REQUEST['product_name']) ? $_REQUEST['product_name'] : NULL;
            $product_price = isset($_REQUEST['product_price']) ? $_REQUEST['product_price'] : NULL;
            $product_thumbnail = isset($_REQUEST['product_thumbnail']) ? $_REQUEST['product_thumbnail'] : NULL;

            $other_product_details = isset($_REQUEST['other_product_details']) ? $_REQUEST['other_product_details'] : NULL;

            if(isset($_POST['submit'])) {
                $html = $this->ProductsLogic->createProduct($product_type_code, $supplier_id, $product_name, $product_price, $product_thumbnail, $other_product_details);

              $msg = $html;

            }

            include 'view/create.php';
        }
        
        public function collectReadallProducts($page){

            $res = $this->ProductsLogic->readallProducts($page);
            $html = $this->Display->createTable($res[0]);
            $pages = $res[1];
            // var_dump($pages);
            //$msg = "Showing page {$page} of all products";
            include 'view/products.php';
        }

    public function collectUpdateProduct(){
        $product_id = isset($_REQUEST['product_id']) ? $_REQUEST['product_id'] : $msg = "ho ho ho";

        $product_type_code = isset($_REQUEST['product_type_code']) ? $_REQUEST['product_type_code'] : NULL;
        $supplier_id = isset($_REQUEST['supplier_id']) ? $_REQUEST['supplier_id'] : NULL;
        $product_name = isset($_REQUEST['product_name']) ? $_REQUEST['product_name'] : NULL;
        $product_price = isset($_REQUEST['product_price']) ? $_REQUEST['product_price'] : NULL;
        $other_product_details = isset($_REQUEST['other_product_details']) ? $_REQUEST['other_product_details'] : NULL;

        if(isset($_POST['submit'])) {
        $html = $this->ProductsLogic->updateProduct($product_id, $product_type_code, $supplier_id, $product_name, $product_price, $other_product_details);

          $msg = $html;

          $html = $this->ProductsLogic->readProducts($product_id);
          $html = $this->Display->createCard($html);
          include 'view/read.php';

        }
        $html = $this->ProductsLogic->readProducts($product_id);
        $html = $html->fetch(PDO::FETCH_ASSOC);
        include 'view/update.php';
       
    }

    public function collectDeleteProduct() {
        $product_id = isset($_REQUEST['product_id']) ? $_REQUEST['product_id'] : $msg = "Ho ho ho";

        $products = $this->ProductsLogic->deleteProduct($product_id);
        include 'view/delete.php';
    }

    public function collectSearchProduct() {
        $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : $msg = " oh oh oh";

        if(isset($_POST['submit'])) {
            $html = $this->ProductsLogic->SearchProduct($search);
            $html = $this->Display->createTable($html);
            // var_dump($html);
    
    
            }
            include 'view/search.php';
        }

    public function collectShoppingProduct(){

            $product_name = isset($_REQUEST['product_name']) ? $_REQUEST['product_name'] : NULL;
            $product_price = isset($_REQUEST['product_price']) ? $_REQUEST['product_price'] : NULL;
            $other_product_details = isset($_REQUEST['other_product_details']) ? $_REQUEST['other_product_details'] : NULL;

            $html = $this->Display->createTable($res);

            include 'view/order.php';
        }

}





  