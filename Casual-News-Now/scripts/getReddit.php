<?php

	$query = $_GET['query'];
	echo json_encode(getPosts($query));
	
	function getPosts($q) {
		$ch = curl_init();
		curl_setopt($ch,CURLOPT_URL,"http://www.reddit.com/search.json?q=".$q);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
		$result = curl_exec($ch);
		curl_close($ch);
		
		$jsondata = json_decode($result,true);
		$posts = $jsondata['data']['children'];
		
		//print_r($posts);
		$title = array();
		$url = array();
		
		$i = 0;
		foreach($posts as $post){
			if ($i < 20) {
				$title[] = $post['data']['title']; 
				$url[] = 'http://www.reddit.com'.$post['data']['permalink'];	
			}
			$i++;
		}
		
		$obj = array();
		
		for ($i=0;$i<20;$i++) {
			$obj[] = array('title'=> htmlentities($title[$i]), 'link'=> htmlentities($url[$i]));
		}
		
		return $obj;
	}
	



?>