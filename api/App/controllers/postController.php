<?php
require_once(CONTROLLER_PATH ."/controller.php");
class postController extends controller{

	public $postClass;
	public function __construct($db) {
		require_once((CLASS_PATH . '/post/post.php'));
		$this->postClass = new Post($db);
		
	}

	public function call($db, $method){
		
		$requestUrl = array();
		if(isset($_REQUEST['requestUrl'])){
			$requestUrl = explode('/', $_REQUEST['requestUrl']);
		}
		
		switch($method) {
			case 'PUT':
			  break;

			case 'DELETE':
			  break;

			case 'GET':
			break;

			case 'POST':
			if(isset($requestUrl[1])){
				if(trim($requestUrl[1]) == 'like')
				{
					return $this->postClass->like();
				}
				else if(trim($requestUrl[1]) == 'read'){
					return $this->postClass->read();
				}
				else if(trim($requestUrl[1]) == 'bookmark'){
					return $this->postClass->bookmark();
				}
				else if(trim($requestUrl[1]) == 'write'){
					return $this->postClass->write();
				}
				else if(trim($requestUrl[1]) == 'comment'){
					return $this->postClass->comment();
				}
				else if(trim($requestUrl[1]) == 'loadcomments'){
					return $this->postClass->loadcomments();
				}
			}else{
				return $this->postClass->feed();
			}
			break;

			default:
			  header('HTTP/1.1 405 Method Not Allowed');
			  header('Allow: GET, PUT, DELETE');
			  break;
		}
	}


}
?>
