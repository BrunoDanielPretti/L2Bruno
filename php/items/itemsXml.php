<?php
//------------------- Sobre Archivos -----------------//
    function Item_TraerTodos(){
        $items = array();

        $path = "resources/items/";
        $dir = opendir($path);        
        while ($current = readdir($dir)){
            if( $current != "." && $current != "..") {
                if(is_dir($path.$current)) {
                    showFiles($path.$current.'/');
                }
                else {
                    $items[] = simplexml_load_file("resources/items/$current");
                }
            }
        }
        return $items;
    }    

    function Item_AbrirArchivoPorId($pId){
        $path = "resources/items/";
        $dir = opendir($path);
        $files = array();
        while ($current = readdir($dir)){
            if( $current != "." && $current != "..") {
                if(is_dir($path.$current)) {
                    showFiles($path.$current.'/');
                }
                else {
                    $files[] = $current;
                }
            }
        }    
        for($i=0; $i<count( $files ); $i++){
            $numeros = explode("-", $files[$i] );            
            $numeros2 = explode(".", $numeros[1]);           
            if($pId >= $numeros[0] && $pId <= $numeros2[0]){
                $archivoAbrir = $files[$i];
                $items = simplexml_load_file("resources/items/$archivoAbrir");
                //echo $archivoAbrir."<br>";
                //var_dump($items);
                return $items;                
            }           
        }
        return NULL;
    }

//------------------- Sobre Items --------------------//   
    function Item_TraerPorID($pId){
        $items = Item_AbrirArchivoPorId($pId);        
        
        foreach ($items as $key) {
            if($key["id"] == $pId){                    
                return $key;
            }            
        }
        
        return NULL;
    }

    function Item_DibujarIcono($pItem){
        foreach ($pItem->set as $key){
            if($key["name"] == "icon"){
                echo '<img src="resources/iconjpg/';
                $direccionIcono = explode(".", $key["val"] );
                echo $direccionIcono[1];
                echo '.jpg"';
                echo ' data-file-width="32" data-file-height="20" width="20" height="20">';                             
            }
        }
    }
//-------------------  MOSTRAR -----------------------------//
    function Item_MostrarPorItem($pItem){
        if($pItem != NULL){        
            Item_DibujarIcono($pItem);
            echo $pItem["id"]." ";
            echo " ".$pItem['name'];
            //echo " - ".$pItem["type"];
            echo "<br>";
        }else{
            echo "No Encontrado";
        }
    }

    function Item_MostrarPorId($pId){
        $miItem = Item_TraerPorID($pId);
        Item_MostrarPorItem($miItem);        
    }

    function Item_MostrarTodos(){
        $listaItems = Item_TraerTodos();
        foreach ($listaItems as $pagina) {
            foreach ($pagina as $key) {
                Item_MostrarPorItem($key);
            }
           
        }
    }











//----------------------- OTROS  --------------------------//
    function Items_MostrarFicherosXML(){
        $path = "resources/items/";
        $dir = opendir($path);
        $files = array();
        while ($current = readdir($dir)){
            if( $current != "." && $current != "..") {
                if(is_dir($path.$current)) {
                    showFiles($path.$current.'/');
                }
                else {
                    $files[] = $current;
                }
            }
        }
        echo '<h2>'.$path.'</h2>';
        echo '<ul>';
        for($i=0; $i<count( $files ); $i++){
            echo '<li>'.$files[$i]."</li>";
        }
        echo '</ul>';
    }

    function Prueba(){
        echo "esta es la funcion de prueba<br>";
        $pId = 38400;

        $path = "resources/items/";
        $dir = opendir($path);
        $files = array();
        while ($current = readdir($dir)){
            if( $current != "." && $current != "..") {
                if(is_dir($path.$current)) {
                    showFiles($path.$current.'/');
                }
                else {
                    $files[] = $current;
                }
            }
        }    
        for($i=0; $i<count( $files ); $i++){
            $numeros = explode("-", $files[$i] );
            //echo $numeros[0]." ";
            $numeros2 = explode(".", $numeros[1]);
            //echo $numeros2[0];
            //echo $files[$i];
            if($pId >= $numeros[0] && $pId <= $numeros2[0]){
                echo $files[$i];
            }
            //echo "<br>";
        }        
    }
//---------------------- FIN --------------------------------

?>