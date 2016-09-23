<?php

class Db_object{

//Main Query
	public static function db_query($sql){
		global $database;
		$query_array=$database->query($sql);
		$the_object_array=array();
		while($res=$database->fetch_assoc($query_array)){
			$the_object_array[]=static::auto_instantiate($res);
		}
		return $the_object_array;
	}

	//Main query 2
	public static function auto_instantiate($user_array){
		$called_class=get_called_class();  //can use static keyword also
		$the_object=new $called_class;
		foreach ($user_array as $property => $value) {
			if(property_exists($the_object, $property))
				$the_object->$property=$value;
		}
		return $the_object;
	}

	//Get all entries
	public static function get_all(){
		return static::db_query("SELECT * FROM ".static::$tb_name);
	}

	//Get entry by id
	public static function get_item_by_id($id){
		global $database;
		$id=$database->escape_string($id);
		$res=static::db_query("SELECT * FROM ".static::$tb_name." WHERE `id`={$id} LIMIT 1");
		return empty($res)? null : array_shift($res);
	}

	//Check if entry/item exists or no

	public function save(){
		return isset($this->id)? $this->update_item() : $this->create_item();
	}

	//Get abstract object properties

	public function get_properties(){
		global $database;
		$properties_array=array();
		foreach (static::$tb_fields as $field) {
			if(property_exists($this, $field))
				$properties_array[$field]=$database->escape_string($this->$field);
		}
		return $properties_array;
	}


	//Create a user

	public function create_item(){
		global $database;

		$properties=$this->get_properties();

		$sql="INSERT INTO " .static::$tb_name."(". implode(",",array_keys($properties)) .")";
		$sql.=" VALUES ('". implode("','",array_values($properties)) ."')";
		return $database->query($sql);
	}

	public function update_item(){
		global $database;
		$properties=$this->get_properties();
		$properties_pair=array();

		foreach ($properties as $property => $value) {
			$properties_pair[]="{$property}='{$value}'";
		}

		$sql="UPDATE ". static::$tb_name ." SET ";
		$sql.=implode(",",$properties_pair);
		$sql.=" WHERE id=".$this->id;
		return $database->query($sql);
	}

	public function delete_item($id){
		global $database;
		$sql="DELETE FROM ". static::$tb_name ." WHERE id=".$id;
		return $database->query($sql);
	}

}

?>