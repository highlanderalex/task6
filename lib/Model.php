<?php
	class Model
	{	
		private $arr = array('%TITLE%' => 'FORMA', 
						 '%ERROR%' => '',
						 '%DATA%' => '', 
						 '%NAME%' => '',
						 '%MAIL%' => '',
						 '%SUBJECT%' => '',
						 '%MSG%' => '',
                         '%DEFAULT%' => ' selected',
                         '%KEY1%' => '',
                         '%KEY2%' => '');
		private $admMail;
						 
		public function __construct($aMail)
		{
			$this->admMail = $aMail;
		}
		
		public function getArray()
		{
			return $this->arr;
		}
		
		public function checkForm()
		{
			$flag = true;
			foreach ($_POST as $key => $value)
			{
				$$key = trim(htmlspecialchars($_POST[$key]));
			}
			if( !empty($name) )
			{
				$this->arr['%NAME%'] = $name;
				$this->arr['%DATA%'] = $name . "\r\n";
			}
			else
			{
				$this->arr['%ERROR%'] = "Field name empty\r\n";
				$flag = false;
			}
			if( !empty($email) && preg_match("/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/u",$email))
			{
				$this->arr['%MAIL%'] = $email;
				$this->arr['%DATA%'] .= $email . "\r\n";
			}
			else
			{
				$this->arr['%ERROR%'] .= "Field email error\r\n";
				$flag = false;
			}
			if( 'default' != $subject)
			{
				$this->arr['%SUBJECT%'] = $subject;
				$this->arr['%DATA%'] .= $subject . "\r\n";
									
					if ( 'Item 1' == $subject)
					{
                        $this->arr['%KEY1%'] = ' selected';
                        $this->arr['%DEFAULT%'] = '';
                    }

					if ( 'Item 2' == $subject)
					{
						$this->arr['%KEY2%'] = ' selected';
                        $this->arr['%DEFAULT%'] = '';
                    }
								
			}
			else
			{
				$this->arr['%ERROR%'] .= "Select something field subject\r\n";
				$flag = false;
			}
			if( !empty($msg))
			{
				$this->arr['%MSG%'] = $msg;
				$this->arr['%DATA%'] .= $msg . "\r\n";
			}
			else
			{
				$this->arr['%ERROR%'] .= "Field message empty\r\n";
				$flag = false;
			}
			if ( $flag == true )
			{
				$this->arr['%ERROR%'] = 'MAIL SUCCESS SEND';
				return true;
			}
			else 
			{
				$this->arr['%DATA%'] = '';
				return false;
			}
		}
		
		private function defaultArr()
		{
			foreach( $this->arr as $key => $val )
			{
				if ( '%TITLE%' != $key && '%ERROR%' != $key && '%DATA%' != $key )
					$this->arr[$key] = '';
			}
			$this->arr['%DEFAULT%'] = ' selected';
		}
		
		public function sendMail()
		{
			$msg = $this->arr['%MSG%'] . "\r\n" .$_SERVER['REMOTE_ADDR'] . "\r\n" . $_SERVER['HTTP_USER_AGENT'];
			$email = $this->arr['%MAIL%'];
			$header = 'Content-type:text/plain; Charset=utf-8' . "\r\n". 'From: ' . $email . "\r\n";    
            if (mail($this->admMail, $this->arr['%SUBJECT%'], $msg, $header))
            {
			    $this->defaultArr();
                return true;   
            }
            else
            {
                return false;
            }
		}
		

	}
