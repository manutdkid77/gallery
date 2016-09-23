<?php

class Comment extends Db_object{

	public static $tb_name='comments';
	public static $tb_fields=array(
			'photo_id','author','body','date'
		);
	public $id;
	public $photo_id;
	public $author;
	public $body;
	public $date;

	//Create comment method
	public static function create_comment($photo_id,$author,$body){
		if(!empty($photo_id) && !empty($author) && !empty($body)){
			$comment = new Comment();
			$comment->photo_id=$photo_id;
			$comment->author=$author;
			$comment->body=$body;
    		$comment->date=date('m.d.y');
			return $comment;
		}
		else
		 return false; 
		
	}//End create comment method


	//Get comments to be displayed
	public static function find_comments($photo_id){
		global $database;
		$photo_id=$database->escape_string($photo_id);
		$sql="SELECT * FROM ".self::$tb_name;
		$sql.=" WHERE photo_id=".$photo_id;
		$sql.=" ORDER BY photo_id ASC";
		return self::db_query($sql);
	}//End of find comments


	//Get comment count method
	//Didnt use it as yet
	public static function get_comment_count($photo_id){
		global $database;
		$photo_id=$database->escape_string($photo_id);
		$sql="SELECT * FROM ".self::$tb_name;
		$sql.=" WHERE photo_id=".$photo_id;
		return mysqli_num_rows($database->query($sql));
	}

}//End of comments class

?>