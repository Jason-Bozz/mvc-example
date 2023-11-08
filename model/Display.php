<?php

class Display {

    public function CreateTable($result, $actionMode=true){
        //        die(var_dump($actionMode));
        
                $tableheader = false;
                $html = "";
                $html .= "<table>";

                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    if($tableheader == false){
                        $html .= "<tr>";
                        foreach($row as $key=>$value){
                            $html .= "<th>{$key}</th>";
                        }
                        // if($checkbox){
                        //     $html .= "<th><input type='checkbox' checked='checked'></th>";
                        // }
                        if($actionMode){
                            $html .= "<th>Actions</th>";
                        }
                        $html .= "</tr>";
                        $tableheader = true;
                    }
                    // if($checkbox){
                    //     $html .= "<td>";
                    //     $html .= "<input type='checkbox' checked='checked'>";
                    //     $html .= "</td>";
                    // }
                    $html .= "<tr>";
                    foreach($row as $value){
                    $html .= "<td>{$value}</td>";
                    }
                    // foreach($row as $key => $value){
                    //     if($key == "product_price"){
                    //         $html .= "<td>" . "€" . str_replace('.', ',', $value) . "</td>";
                    //     }else {
                    //         $html .= "<td>{$value}</td>";
                    //     }
                    // }
                    if($actionMode){
                        $html .= "<td>";
                        // $html .= "<a href='index.php?op=read&id={$row['id']}'><i class='fa fa-eye'></i></a>";
                        // $html .= "<a href='index.php?op=update&id={$row['id']}'><i class='fa fa-edit'></i></a>";
                        // $html .= "<a href='index.php?op=delete&id={$row['id']}'><i class='fa fa-ban'></i></a>";
                        $html .= "<a href='index.php?op=read&product_id={$row['product_id']}'><i class='fa fa-eye'></i></a>";
                        $html .= "<a href='index.php?op=update&product_id={$row['product_id']}'><i class='fa fa-edit'></i></a>";
                        $html .= "<a href='index.php?op=delete&product_id={$row['product_id']}'><i class='fa fa-ban'></i></a>";
                        $html .= "</td>";
                    } 
                    $html .= "</tr>";
                }
                $html .= "</table>";
                return $html;
        
            }



public function createCard($array) {

    $result = $array->fetch(PDO::FETCH_ASSOC);



        // $html = "";
        // $html .= "<div class='card'>";
        // $html .= "<img src='img_avatar.png' alt='Avatar' style='width:100%'>";
        // $html .= "<div class='container'";
        // $html .= "<h4><b>{$result['name']}</b></h4>";
        // $html .= "<p>Phone: {$result['phone']}</p>"; 
        // $html .= "<p>Email: {$result['email']}</p>"; 
        // $html .= "<p>Location: {$result['location']}</p>"; 
        // $html .= "</div>";
        // $html .= "</div>";

        $html = "";
        $html .= "<div class='card'>";
        $html .= "<img src='view/assets/image/{$result['product_thumbnail']}' alt='Avatar' style='width:100%'>";
        $html .= "<div class='container'";
        $html .= "<h4><b>{$result['product_id']}</b></h4>";
        $html .= "<p>Product_type_code: {$result['product_type_code']}</p>";
        $html .= "<p>Supplier_id: {$result['supplier_id']}</p>"; 
        $html .= "<p>Product_name: {$result['product_name']}</p>"; 
        $html .= "<p>Product_price: €{$result['product_price']}</p>"; 
        $html .= "<p>Other_product_details: {$result['other_product_details']}</p>"; 
        $html .= "</div>";
        $html .= "</div>";

        return $html;
        
        }


}


?>  