<?php
class Instagram{
    public $url ='http://';
    public $user_name='';
    public $img='';
    public $followd_by;
    private $client_id="your-client-id";

    public function get($url='1')
    {
        $this->url=$url;         
        if(preg_match("#^(https://|www)instagram\.com/([a-zA-Z0-9_\.]+)/?$#i", $this->url))
        {
	// trouver user name
	$user_name= preg_replace("#^(https://|www)instagram\.com/([a-zA-Z0-9_\.]+)/?$#i", '$2', $this->url);
	//trover id
        $this->user_name=$user_name;
	$id_endpoint ="https://api.instagram.com/v1/users/search?q=$this->user_name&client_id=$this->client_id&count=1";
	$id_curl = curl_init($id_endpoint);
	curl_setopt($id_curl, CURLOPT_CONNECTTIMEOUT, 3);
	curl_setopt($id_curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($id_curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	$id_data= json_decode(curl_exec($id_curl));
	if($id_data->meta->code==200)
	{
            //var_dump($id_data); die();
		$user_id = $id_data->data[0]->id;
	}
	else {
		return 0;
	}
	//affiche
	$endpoint ="https://api.instagram.com/v1/users/$user_id?client_id=$this->client_id";
	
	$curl = curl_init($endpoint);
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 3);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	
	$data= json_decode(curl_exec($curl));
	
	if($data->meta->code==200)
	{
            $this->img=$data->data->profile_picture;
            $this->user_name = $data->data->full_name;
	    $this->followd_by = $data->data->counts->followed_by;
            $this->url='https://instagram.com/'.$data->data->username;
            return 1;
	}
	else {
            return 0;
	}
	//var_dump($data);
	
}

else {
    return 0;
}
    }     
    
}
    


?>