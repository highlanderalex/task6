<?php
	class Controller
	{
		private $model;
		private $view;
		
		public function __construct()
		{
			$this->view = new View(TEMPLATES);
			$this->model = new Model(ADMMAIL);
			
			if ( isset($_POST['send']) )
			{
				$this->pageSendMail($_POST);
			}
			else
			{
				$this->pageDefault();
			}
			$this->view->templateRender();
		}
		
		private function pageSendMail()
		{
			if( $this->model->checkForm() === true )
			{
				$this->model->sendMail();
			}
			$mArr = $this->model->getArray();
			$this->view->addToReplace($mArr);
		}
		
		private function pageDefault()
		{
			$mArr = $this->model->getArray();
			$this->view->addToReplace($mArr);
		}
	}