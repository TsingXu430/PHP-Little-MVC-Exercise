<?php

namespace model;

use core\db\DbHelper;

class CourseModel extends AppModel{

	public function __construct(){
		$this->dbh = DbHelper::getInstance();
	}

	private $tableName = "cmf_course";

	public function selectAll(){

		$sql = "select * from ".$this->tableName;
		return $this->dbh->query($sql,'ALL');

	}
}