<?php
	use Phalcon\Mvc\Controller;

	class TaskController extends Controller {
		public function indexAction() {
			$tasks = Tasks::find();
			echo json_encode($tasks);
			$this->view->disable();
		}

		public function create() {
			{
				$task = new Tasks();
				$success = $task->save(
					$this->request->getPost(),
					[
						"name",
						"state",
					]
				);

				if ($success) {
					echo json_encode[(['success' => 'saved'])];
				} else {
					echo json_encode(['error' => json_encode($task->getMessages())]);
				}
				$this->view->disable();
			}
		}

		public function delete($id) {
			if ($id) {
				$task = Tasks::find("id='$id'");
				$success = $task->delete();
				echo $success;
			}
			$this->view->disable();
		}


	}
