<?php

class Photo extends Db_object{

	public static $tb_name='photos';
	public static $tb_fields=array(
			'title','description','filename','type','size','date'
		);
	public $id;
	public $title;
	public $description;
	public $filename;
	public $type;
	public $size;
	public $date;
	public $tmp_path;
	public $image_errors_array=array();
	public $upload_directory="images";
	public $upload_errors_array=array(
		0 => 'There is no error, the file uploaded with success.',
		1 => 'The uploaded file exceeds the maximum upload size.',
		2 => 'The uploaded file exceeds the maximum upload size.',
		3 => 'The uploaded file was only partially uploaded.',
		4 => 'No file was uploaded.',
		6 => 'Missing a temporary folder.',
		7 => 'Failed to write file to disk.',
		8 => 'A PHP extension stopped the file upload.'
	);

	//Check if image was uploaded and set parameters
	public function set_file($file){
		if(empty($file) || !$file ||!is_array($file)){
			$this->image_errors_array[]='There was no uploaded file';
			return false;
		}
		elseif($file['error']!=0){
			$this->image_errors_array[]=$this->upload_errors_array[$file['error']];
			return false;
		}
		else{
			$this->filename=basename($file['name']);
			$this->tmp_path=$file['tmp_name'];
			$this->type=$file['type'];
			$this->size=$file['size'];
			return true;
		}
	}


	//Perform more image checks,set path and complete upload
	public function save(){
		if($this->id)
			$this->update_item();

		else{
			if(!empty($this->image_errors_array))
				return false;

			if(empty($this->filename) || empty($this->tmp_path)){
				$this->image_errors_array[]="The file was not available";
				return false;
			}

			$target_path=SITE_ROOT.DS.'admin'.DS.$this->upload_directory.DS.$this->filename;

			if(file_exists($target_path)){
				$this->image_errors_array[]="File {$this->filename} already exists";
				return false;
			}

			if(move_uploaded_file($this->tmp_path,$target_path)){
				if($this->create_item()){
					unset($this->tmp_path);
					return true;
				}
			}
		}//End create() part
	}//End of save() method


	//Load path,and unlink the image
	public function delete_image(){
		if($this->delete_item($this->id)){
			$target_path=SITE_ROOT.DS.'admin'.DS.$this->upload_directory.DS.$this->filename;
			unlink($target_path);

			//Delete comments of resp photo
			$comments_array=Comment::find_comments($this->id);
			foreach($comments_array as $comments_object) {
				$comments_object->delete_item($comments_object->id);
			}

			return true;
		}
		else
			return false;
	}
}

?>
