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
                    $id = $_REQUEST['idTour'];

                    $tasks = $this->taskModel->getTask(['*'], ["phancong.MaTour", "TrangThai"], [$id, "Đã kết thúc"]);

                    if(!empty($tasks)) {
                        usort($tasks, function($a, $b) {
                            return $b->DanhGia <=> $a->DanhGia;
                        });
                    }
                    else {
                        echo "
                            <script>
                                Swal.fire({
                                    title: 'Thông báo',
                                    html: 'Hiện tại Tour không có hướng dẫn viên!',
                                    icon: 'info',
                                    confirmButtonText: 'Đóng'
                                });
                            </script>
                        ";
                    }

                    return $this->view("guide.index", 
                        [
                            "tasks" => $tasks
                        ]
                    );
                }
                else {
                    header("Location: index.php?controller=auth&action=index");
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
                $id = $_REQUEST['id'];

                $guide = $this->guideModel->getGuide(['*'], 'MaHDV', $id);
                $tasks = $this->taskModel->getTask(['*'], ["phancong.MaHDV", "TrangThai"], [$id, "Đã kết thúc"]);

                if(!empty($guide)) {
                    if(empty($tasks)) {
                        echo "
                            <script>
                                Swal.fire({
                                    title: 'Thông báo',
                                    html: 'Hiện tại hướng dẫn viên không được phân công Tour!',
                                    icon: 'info',
                                    confirmButtonText: 'Đóng'
                                });
                            </script>
                        ";
                    }

                    return $this->view("guide.detail",[
                        'guide' => $guide,
                        'tasks' => $tasks
                    ]);
                }
                else {
                    echo "
                        <div class='none-guide-details'>
                            <h2>Không có dữ liệu!</h2>
                        </div>
                        <script>
                            Swal.fire({
                                title: 'Lỗi',
                                html: 'Hướng dẫn viên không tồn tại hoặc không hợp lệ!',
                                icon: 'error',
                                confirmButtonText: 'Đóng'
                            });
                        </script>
                    ";
                }
            }
        }
        
    }