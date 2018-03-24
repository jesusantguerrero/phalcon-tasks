<?php
use Phalcon\Mvc\Model;

class Task extends Model {
	public $id;
	public $name;
	public $done;
	public $created;
	public $updated;
}
