<?php 
    class GuideController extends BaseController {
        public $guideModel;
        public $tourModel;
        public $taskModel;

        public function __construct() {
            $this->model('GuideModel');
            $this->guideModel = new GuideModel();

            $this->model('TourModel');
            $this->tourModel = new TourModel();

            $this->model('TaskModel');
            $this->taskModel = new TaskModel();
        }

        public function index() {
            $this->taskModel->updateTask('NgayKT', date('Y-m-d'));

            if(isset($_REQUEST['idTour'])) {
                if(isset($_SESSION['username'])) {
                    $tasks = $this->taskModel->getTask(['*'], ["phancong.MaTour", "TrangThai"], [$_REQUEST['idTour'], "Đã kết thúc"]);

                    usort($tasks, function($a, $b) {
                        return $b->DanhGia <=> $a->DanhGia;
                    });

                    return $this->view("guide.index", 
                    [
                        "tasks" => $tasks
                    ]
                    );
                }
                else {
                    header("Location: index.php?controller=user&action=index");
                }
            }
            else {
                $guides = $this->guideModel->getAll();

                usort($guides, function($a, $b) {
                    return $b->DanhGia <=> $a->DanhGia;
                });

                return $this->view("guide.index", 
                    [
                        "guides" => $guides
                    ]
                );
            }
        }

        public function detail() {
            if(isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
                $this->taskModel->updateTask('NgayKT', date('Y-m-d'));
                $value = $_REQUEST['id'];

                $guide = $this->guideModel->getGuide(['*'], 'MaHDV', $value);
                $tasks = $this->taskModel->getTask(['*'], ["phancong.MaHDV", "TrangThai"], [$value, "Đã kết thúc"]);

                return $this->view("guide.detail",[
                    'guide' => $guide,
                    'tasks' => $tasks
                ]);
            }
        }
        
    }