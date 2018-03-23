<?php
use Phalcon\Mvc\Controller;

class UserController extends Controller
{

	public function indexAction()
	{

	}

	public function signupAction()
	{

	}

	public function registerAction()
	{
		$User = new Users();

		$success = $User->save(
			$this->request->getPost(),
			[
				"name",
				"email",
			]
			);

			if ($success) {
				echo "thanks for registrating here!";
			} else {
				echo "sorry, the following problems were generated: ";
				$messages = $user->getMessages();

				foreach ($messages as $message) {
					echo $message->getMessage(), "<br>";
				}
			}
			$this->view->disable();
	}
}
