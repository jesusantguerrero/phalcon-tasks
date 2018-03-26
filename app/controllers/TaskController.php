<?php
	use Phalcon\Mvc\Controller;

	class TaskController extends Controller {
		public function indexAction() {
			$tasks = Tasks::find();
			echo json_encode($tasks);
			$this->view->disable();
		}

		public function createAction() {
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
					echo json_encode(['success' => 'saved']);
				} else {
					echo json_encode(['error' => json_encode($task->getMessages())]);
				}
				$this->view->disable();
			}
		}

		public function updateAction($id) {
			if ($id) {
				$task = Tasks::findFirst("id='$id'");
				$task->name = $this->request->getPost()['name'];
				$task->state = $this->request->getPost()['state'];
				$success = $task->update();

				if ($success) {
					echo json_encode(['success' => 'saved']);
				} else {
					echo json_encode(['error' => json_encode($task->getMessages())]);
				}
				$this->view->disable();
			}
		}

		public function deleteAction($id) {
			if ($id) {
				$task = Tasks::findFirst("id='$id'");
				$success = $task->delete();
				echo $success;
			}
			$this->view->disable();
		}


	}
