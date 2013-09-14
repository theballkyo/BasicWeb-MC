<?php
if (!defined('systemcheck'))
	die('Hacking attempt...');
	
class data_check extends Class_DB
{
	//setpass 
    private $regpwset;
	private $usermcnet;
	private $pwmcnet;
	private $usermczgm;
	private $pwmczgm;
	private $pwmczgm2;
	private $email;
	private $data;
	private $data_return;
	private $pwmczgmnew;
	private $pwmczgmnew2;
	private $cookie_hash;
	private $cookie_user;
	private $password;
	private $password2;
	private $username;
	//Profile user
	public static $userdata = array();
	public static $currentpage;
	public static $pageinfo;
	public static $page;
	public static $pagetitle;
	public $thispage;
	public static $pageurl;
	public static $timepagestart;
	public static $messageout;
	public static $messagetype;
	
    public function setencrypt($crypt_method)
    {
        $this->regpwset=$crypt_method;
    }
	
	public function check_username($username)
	{
	if (preg_match('/^[a-zA-Z0-9]+$/', $username)) 
	    {
			return true;
		} else {
			return false;
		}
	}

    private function encrypt($text_to_crypt)
    {
        switch($this->regpwset)
        {
            case 'md5': $text_to_crypt=trim(md5($text_to_crypt)); break;
            case 'sha1': $text_to_crypt=trim(sha1($text_to_crypt)); break;
        }
       return $text_to_crypt;
    }
    
	private function escape($str) 
	{ 
		if(is_array($str)) 
		{ 
			foreach($str as $key => $val) 
			{ 
				// RECURSSION! 
				$ret[$key] = $this->escape($val); 
			} 
			return $ret; 
		} 
		else 
		{ 
			if(get_magic_quotes_gpc()) 
			{ 
				$str = stripslashes($str); 
			} 
			return mysql_real_escape_string($str); 
		}
	}
	public function verify_id()
	{
		// create a new cURL resource
		$ch = curl_init();

		// set URL and other appropriate options
		curl_setopt($ch, CURLOPT_URL, "http://login.minecraft.net/?user=".$this->usermcnet."&password=".$this->pwmcnet."&version=12");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1) ;
		curl_setopt($ch, CURLOPT_HEADER, 0);
		// grab URL and pass it to the browser
		 $this->data = curl_exec($ch);
		// close cURL resource, and free up system resources
		curl_close($ch);
		$checkpremium = explode(":deprecated:",$this->data);
		if($this->data=="Bad response"){ return '6';}
		elseif($this->data=="Bad login"){ return '7';}
		elseif($this->data=="Account migrated, use e-mail as username."){ return '8';}
		elseif($this->data=="Old version"){ return '9';}	
		//no premium
		elseif($this->data=="User not premium"){ return '2';}	
		//premium account
		elseif($checkpremium['1'] <> NULL){ return '3';}
		
   		return '10';
		
	}
	

	
	public function register_user()
    {
		if(OP_REG){}else{return 'ปิดรับการสมัครสมาชิกชั่วคราว';}
		
		$_POST = $this->escape($_POST);
		$this->username=$_POST['username'];
		$this->password=$_POST['password'];
        $this->password2=$_POST['password2'];
		$this->email=$_POST['email'];
        $this->encrypt_pass=$this->encrypt($this->password);
		
		if($this->check_username($this->username)){}else{return 'กรุณากรอกชื่อผู้ใช้เฉพาะตัวเลขหรือตัวอักษรภาษาอังกฤษเท่านั้น !';}
		if((strlen($this->username)<3) or (strlen($this->username)>15)) {return 'Entered username length must be of 3 to 15 characters.';}
		if((strlen($this->password)<6) or (strlen($this->password)>20)) {return 'Entered password length must be of 6 to 20 characters.';}
		elseif($this->password!=$this->password2) {return 'Passwords entered do not match.';}
		elseif(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {return 'Email address entered is not valid.';}
		/*
		//verify id minecraft.net 
		$verifyid = $this->verify_id();
		
		if($verifyid > "5")
		{	
        	if($verifyid=="6"){
			return self::getMessage('response error - การตรวจสอบผิดพลาดเซิฟเวอร์อาจมีปัญหา','error');	
			}
			elseif($verifyid=="7"){
			return self::getMessage('Username หรือ Password ไม่ถูกต้อง ','error');	
			}
			elseif($verifyid=="8"){
			return self::getMessage('บัญชีถูกเปลี่ยนแปลง จำเป็นต้องล๊อกอินด้วยอีเมล์แทน','error');	
			}
			elseif($verifyid=="9"){
			return self::getMessage('ลิงค์ตรวจสอบเวอร์ชั่นเก่า โปรดติดต่อ Webmaster','error');	
			}
			elseif($verifyid=="10"){
			return self::getMessage('มีการErrorอย่างไม่คาดคิด โปรดติดต่อ Webmaster','error');	
			}
        }
		*/
		//$verifyid = "2";
		$user = $this->query("select * from authme where username='$this->username'");
		$email = $this->query("select * from authme where email='$this->email'");
		if($this->num_rows($user)>0) {return 'Username ถูกใช้ไปแล้ว';}
		elseif($this->num_rows($email)>0) {return 'Email ถูกใช้ไปแล้ว';}
		else
		{		
			$this->query("INSERT INTO ".DB_AUTH." "."(username , password, email, ip) VALUES 
			('$this->username', '$this->encrypt_pass', '$this->email', '".$_SERVER["REMOTE_ADDR"]."')");
			return true;
		}	
	}

	public static function numberToRoman($num) 
	{
		 // Make sure that we only use the integer portion of the value
		 $n = intval ($num);
		 $result = '';
	 
		 // Declare a lookup array that we will use to traverse the number:
		 $lookup = array ('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400,
		 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40,
		 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
	 
		 foreach ($lookup as $roman => $value) 
		 {
			 // Determine the number of matches
			 $matches = intval ($n / $value);
	 
			 // Store that many characters
			 $result .= str_repeat ($roman, $matches);
	 
			 // Substract that from the number
			 $n = $n % $value;
		 }
	 
		 // The Roman numeral should be built, return it
		 return $result;
	}
}
?>