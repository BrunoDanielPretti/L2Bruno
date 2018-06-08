<?php
    $items = simplexml_load_file("../resources/items/01800-01899.xml"); //Abre el archivo
    //$items = simplexml_load_file("01800-01899.xml");
    $total_items = count($items->item); //cuenta la cantidad de items

    //echo "$total_items";
    //var_dump($items);
    echo "<table>\n";
    //echo "<tr><th>";

    for($i=0; $i<$total_items; $i++){
        
        foreach ($items->item[$i]->set as $key){
            if($key["name"] == "icon"){
                echo '<img src="../resources/iconjpg/';
                //------------
                $direccionIcono = explode(".", $key["val"] );
                echo $direccionIcono[1];
                //echo $key["val"];
                //------------
                echo '.jpg"';
                //echo '$key["val"].jpg"';
                echo ' data-file-width="32" data-file-height="20" width="20" height="20">';                
            }
        }
        

        echo $items->item[$i]["id"]."  ";
        echo $items->item[$i]['name']." - ";
        echo $items->item[$i]["type"]."<br>";
        
        /*
        foreach ($items->item[$i]->set as $key) {
            echo "   ".$key["name"].": ".$key["val"]."<br>";
        }
        */
        //echo $items->item[$i]->set["name"]["name"];
        
        echo "<br>";                
    }
?>

<img src="/c/images/f/f8/Item_1894.jpg" data-file-width="32" data-file-height="32" width="32" height="32">