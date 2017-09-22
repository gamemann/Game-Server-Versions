<?php
	class App
	{
		protected $appID;
		protected $urlRequest;
		protected $version;
		
		protected $ip;
		protected $port;
		protected $key;
		
		public function __construct($i, $p, $k)
		{
			$this->ip = $i;
			$this->port = $p;
			$this->key = $k;
			
			$this->appID = 240;
			$this->urlRequest = "https://api.steampowered.com/IGameServersService/GetServerList/v1/?key=" . $this->key . "&limit=1&filter=gameaddr\\" . $this->ip . ":" . $this->port;
			
			$this->getVersion();
		}
		
		protected function getVersion()
		{
			$curl = curl_init();
			
			curl_setopt_array($curl, Array
			(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => $this->urlRequest,
				CURLOPT_SSL_VERIFYPEER => false
			));
			
			$result = curl_exec($curl);
			
			$info = json_decode($result, false);
			
			$tv = $info->response->servers[0]->version;
			
			$this->version = str_replace(".", "", $tv);
		}
		
		public function returnVersion()
		{
			return $this->version;
		}
	}
?>