<?php
if (!defined('systemcheck'))
	die('Hacking attempt...');
	
class Class_DB
{
	private $charset="utf8";
	private $rs;
	protected $_fetch_array;
	protected $_fetch_assoc;
	protected $timer;
	public static $timer_queries = 0;
	public static $nb_queries = 0;

	public static function connect($host,$user,$pw,$dbname)
	{
		if(@mysql_connect($host, $user, $pw)){
		mysql_select_db($dbname);
		mysql_query("SET NAMES UTF8;");
		return true;
		}
		return false;
	}
	
	public function timer()
	{
		$this->timer = explode (' ', microtime ());
		return $this->timer[0]+$this->timer[1];
	}
	
	public function query($strsql)
	{	
		self::$nb_queries++;
		
        //Execute the query and time the execution time
        $beginning = $this->timer();
        //Execute the query and save the result in a variable
		$this->rs = mysql_query($strsql) or die(mysql_error());
        //We add the query duration to the total
        self::$timer_queries += round($this->timer()-$beginning,4);		
		
		return $this->rs;
		mysql_close();
	}
	
	public function num_rows($rs="")
	{
		if($rs =="")
		return mysql_num_rows($this->rs);
		else
		return mysql_num_rows($rs);
	}
	
	public function fetch_array()
	{
		if(count($this->_fetch_array)>0)
		{
			return $this->_fetch_array;
		}
		else
		{
			while($row = mysql_fetch_array($this->rs))
			{
				$this->_fetch_array = $row;			
			}
			return $this->_fetch_array;
		}
		
	}
	
	public function fetch_assoc($prefix="")
	{
		if(count($this->_fetch_assoc)>0)
		{
			$this->_fetch_assoc = NULL;
		}
			if($prefix == ""){
			
			while($row = mysql_fetch_assoc($this->rs))
			{
				$this->_fetch_assoc = $row;
			}
			}
			else{
			$i=1;	
			while($row = mysql_fetch_assoc($this->rs))
			{
				$this->_fetch_assoc[$prefix.$i] = $row;
				$i++;
			}
			}
			return $this->_fetch_assoc;
		
		
	}		
	
}

?>
