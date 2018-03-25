<?php
use Phalcon\Mvc\Model;

class Tasks extends Model {
	public $id;
	public $name;
	public $state;
	public $created;
	public $updated;
}
