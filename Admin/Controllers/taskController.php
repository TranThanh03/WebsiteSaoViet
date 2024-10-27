<?php
    class TaskController extends BaseController {
        public $taskModel;

        function __construct() {
            $this->model("taskModel");
            $this->taskModel = new taskModel();
        }
        public function index() {
            return $this->view('task.index');
        }
    }