<?php
Class ZGMbase
{
	private $view;
	private $urlroot;
	
	public $value = array();
	public $pagename;
	public $server_name;
	public function __construct() 
	{
	
    }
	
	public function run()
	{
		$i=0;
		foreach($this->getview() as $getview)
		{
			if($getview == "")
			{
			
			}
			elseif($i<1)
			{
			$this->view = $getview;
			$i++;
			}
			elseif($i>=1)
			{
				$value[] = $getview;
			}
		}
		$this->pagename = $this->view;
		if($this->view == "")
		{
			include('protected/view/index.php');
		}
		else
		{
			if(!@include('protected/view/'.$this->view.'.php'))
			{
				include('protected/view/error.php');
			}			
		}
	}
	public function getview()
	{
	$str = $_SERVER['SCRIPT_NAME'];
	$replace = '';
	$str = preg_replace('/(\/)index.php/', $replace, $str);
	//$str = preg_replace('~[^a-z0-9?-?\.\-\_]~iu',$replace,$str);
	//$str = '/'.$str.'/';
	$str = str_replace($str,'',$_SERVER['REQUEST_URI']);
	//$str = str_replace($str,'',$_SERVER['REQUEST_URI']);
	$str = explode('/',$str);
	//$str = preg_replace($str,$replace,$_SERVER['REQUEST_URI']);
	return $str;
	}
	private function url_root()
	{
		$folder = dirname($_SERVER['PHP_SELF']);
		$str = preg_replace('~[^a-z0-9?-?\.\-\_]~iu',"",$folder);
		if($str == ""){$folder = "";}
		$web_root = "http://".$_SERVER['HTTP_HOST'].$folder."/";
		$this->urlroot = $web_root;
		//$this->urlroot = str_replace('','',$web_root);
	}
	public function geturlroot()
	{
		if($this->urlroot == null)
		$this->url_root();
		
		return $this->urlroot;
	}
	public function breadcrumbs()
	{		
		return '<a href="'.$this->geturlroot().'">Home</a> > '.$this->pagename;
	}
}
?>