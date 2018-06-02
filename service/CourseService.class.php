<?php

namespace service;

use model\CourseModel;

class CourseService{

	private $_course_model;

	public function __construct(){
		$this->_course_model = new CourseModel();
	}

	public function schedule(){
		$res = $this->_course_model -> selectAll();
		var_dump($res);
	}

	public function __destruct(){
		//echo 'destruct';
	}

	public function __clone(){
		//echo 'clone';
	}
}