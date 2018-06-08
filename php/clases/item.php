<?php
    class L2_Item{
        public $id;
        public $name;
        public $type;
        public $icon;
        public $precio;

        public function __construct($pId=NULL, $pName=NULL, $pType=NULL, $pIcon=NULL, $pPrecio=NULL){
            if($pId != NULL){
                $this->id = $pId;
                $this->name = $pName;
                $this->type = $pType;
                $this->icon = $pIcon;
                $this->precio = $pPrecio;
            }
        }

        
    }
?>