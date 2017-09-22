<?php
	class App
	{
		protected $appID;
		protected $urlRequest;
		protected $version;
		
		public function __construct()
		{
			$this->appID = 440;
			$this->urlRequest = "https://api.steampowered.com/ISteamApps/UpToDateCheck/v1/?appid=" . $this->appID . "&version=0";
			
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
			
			$this->version = $info->response->required_version;
		}
		
		public function returnVersion()
		{
			return $this->version;
		}
	}
?>