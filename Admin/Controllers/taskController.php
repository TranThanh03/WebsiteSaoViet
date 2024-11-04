<?php
    class TaskController extends BaseController {
        public $taskModel;
        public $tourModel;
        public $guideModel;

        function __construct() {
            $this->model("taskModel");
            $this->taskModel = new TaskModel();

            $this->model("tourModel");
            $this->tourModel = new TourModel();

            $this->model("guideModel");
            $this->guideModel = new GuideModel();
        }

        public function index() {
            $this->taskModel->updateTask('NgayKT', date('Y-m-d'));

            $tasks = $this->taskModel->getAll();
            usort($tasks, function($a, $b) {
                $order = ["Đang diễn ra", "Đã kết thúc"];
                $statusA = array_search($a->TrangThai, $order);
                $statusB = array_search($b->TrangThai, $order);
                
                return $statusA - $statusB;
            });

            return $this->view('task.index', [
                'tasks' => $tasks
            ]);
        }

        public function insert() {
            if(isset($_REQUEST['btn-submit'])) {
                $MaTour = $_POST['MaTour'];
                $MaHDV = $_POST['MaHDV'];
                $NgayKH = date('Y-m-d', strtotime($_POST['NgayKH']));
                $NgayKT = date('Y-m-d', strtotime($_POST['NgayKT']));
                $nowDate = date('Y-m-d');

                if($NgayKH >= $nowDate) {
                    if($NgayKT >= $NgayKH) {
                        $getTask = $this->taskModel->getTaskDate(["MaHDV", "TrangThai", "NgayKH", "NgayKT"], ["{$MaHDV}", "Đang diễn ra", "{$NgayKH}", "{$NgayKT}"]);
            
                        if(empty($getTask)) {
                            $this->taskModel->insertTask(["MaTour", "MaHDV", "NgayKH", "NgayKT", "TrangThai"],
                                                        ["{$MaTour}", "{$MaHDV}", "{$NgayKH}", "{$NgayKT}", "Đang diễn ra"]);

                            $code = 0;
                            $message = "Thêm mới thành công.";
                        }
                        else {
                            $code = 1;
                            $code2 = 2;
                            $message = "Hướng dẫn viên này đang có lịch phân công. Vui lòng đổi lịch khác!";
                        }
                    }
                    else {
                        $code = 1;
                        $code2 = 2;
                        $startDate = date('d/m/Y', strtotime($NgayKH));
                        $message = "Ngày kết thúc phải bắt đầu từ $startDate!";
                    }
                }
                else {
                    $code = 1;
                    $code2 = 2;
                    $nowDate = date('d/m/Y', strtotime($nowDate));
                    $message = "Ngày khởi hành phải bắt đầu từ $nowDate!";
                }

                if($code == 1) {
                    header("Location: index.php?controller=task&action=index&message=$message&code=$code&code2=$code2&idTour=$MaTour&idGuide=$MaHDV&startDate=$NgayKH&endDate=$NgayKT");
                }
                else if($code == 0) {
                    header("Location: index.php?controller=task&action=index&message=$message&code=$code");
                }

                exit();
            }
        }

        public function delete() {
            if(isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];

                try {
                    $getTask = $this->taskModel->getTask(['MaPC'], 'MaPC', $id);
                    if(!empty($getTask)) {
                        $this->taskModel->deleteTask($id, 'MaPC');

                        $code = 0;
                        $message = "Xoá lịch phân công $id thành công.";
                    }
                    else {
                        $code = 1;
                        $message = "Lịch phân công $id không tồn tại!";
                    }
                }
                catch(Exception) {
                    $code = 1;
                    $message = "Xoá lịch phân công $id không thành công!";
                }
            }
            else {
                $code = 1;
                $message = "Lỗi! Không thể xoá lịch phân công.";
            } 

            header("Location: index.php?controller=task&action=index&code=$code&message=$message");
            exit();
        }

        public function search() {
            if(isset($_REQUEST['btn-search'])) {
                if(isset($_REQUEST['input-search'])) {
                    $input = $_REQUEST['input-search'];

                    $tasks = $this->taskModel->searchTask(['*'], ['phancong.MaPC', 'phancong.MaTour', 'phancong.MaHDV'], $input);

                    if(!empty($tasks)) {
                        return $this->view("task.index",
                        [
                            'tasks' => $tasks
                        ]);
                    }
                    else {
                        $code = 1;
                        $message = "Phân công không tồn tại!";

                        header("Location: index.php?controller=task&action=index&code=$code&message=$message");
                        exit();
                    }
                }
            }
        }
    }
?>