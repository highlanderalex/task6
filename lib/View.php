<?php
	class View
	{
		private $forRender;
		private $file;
		
		public function __construct($template)
		{
            try
            {
                if( !file_exists($template) )
                {
                    throw new Exception('Template dont exist'); 
                }
                $this->file = file_get_contents($template); 
            }
            catch (Exception $e)
			{
				echo $e->getMessage();
            }
			
		}
		
		public function addToReplace($mArr)
		{
			foreach( $mArr as $key => $val )
			{
				$this->forRender[$key] = $val;
			}
		}
		
		public function templateRender()
		{
			foreach( $this->forRender as $key => $val )
			{
				$this->file = str_replace($key, $val, $this->file);
			}
			echo $this->file;
		}
		
	}
