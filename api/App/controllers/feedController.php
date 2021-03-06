<?php
require_once(CONTROLLER_PATH ."/controller.php");
class feedController extends controller{

	public $feedClass;
	public function __construct($db) {
		require_once((CLASS_PATH . '/feed/feed.php'));
		$this->feedClass = new Feed($db);
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
				if(trim($requestUrl[1]) == 'feed')
				{
					return $this->feedClass->feed();
				}
				else if(trim($requestUrl[1]) == 'mystories'){
					return $this->feedClass->mystories();
				}
				else if(trim($requestUrl[1]) == 'bookmark'){
					return $this->feedClass->bookmark();
				}
			}else{
				return $this->feedClass->feed();
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
