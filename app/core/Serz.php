<?php 
class Serz implements JsonSerializable {
	
	public function jsonSerialize() {
        $class = get_class($this);
        $json = array();
        $properties = get_class_vars($class);
        $keys = array_keys($properties);
        $plength = count($keys);
        for($i=0;$i<$plength;$i++){
            $method =  "get".$keys[$i];
            if(method_exists ($this,$method)){
                $json[$keys[$i]] = $this->$method();
            }
        }
		return $json;
    }
}