<?php
	use Phalcon\Mvc\Controller;

	class TaskController extends Controller {
		public function indexAction() {
			$Task = new Task();

			$this->view->disable();

		}

	}
