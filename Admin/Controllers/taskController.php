<?php
    class TaskController extends BaseController {
        public $taskModel;

        function __construct() {
            $this->model("taskModel");
            $this->taskModel = new taskModel();
        }

        public function index() {
            $tasks = $this->taskModel->getAll();

            return $this->view('task.index', [
                'tasks' => $tasks
            ]);
        }

        public function delete() {
            $id = $_REQUEST['id'];

            $getID = $this->taskModel->getTask(['MaPC'], 'MaPC', $id);
            if(!empty($getID)) {
                $result = $this->taskModel->deleteTask($id, 'MaPC');

                if($result) {
                    header('Location: index.php?controller=task&action=index&code=0');
                }
                else {
                    header('Location: index.php?controller=task&action=index&code=1');
                }
            }
            else {
                header('Location: index.php?controller=task&action=index&code=2');
            }
            exit();
        }
    }