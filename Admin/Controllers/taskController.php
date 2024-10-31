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
                    $message = "Xóa lịch phân công " . $id . " thành công.";
                    header("Location: index.php?controller=task&action=index&message={$message}&code=0");
                }
                else {
                    $message = "Xóa lịch phân công " . $id . " không thành công!";
                    header("Location: index.php?controller=task&action=index&message={$message}&code=1");
                }
            }
            else {
                $message = "Lịch phân công " . $id . " không tồn tại!";
                header("Location: index.php?controller=task&action=index&message={$message}&code=1");
            }
            exit();
        }
    }