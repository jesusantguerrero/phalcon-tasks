<?php
	use Phalcon\Mvc\Controller;

	class TaskController extends Controller {
		public function indexAction() {
			$tasks = Tasks::find();
			$this->view->tasks = $tasks;
		}


	}
