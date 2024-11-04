<?php 
    class TourController extends BaseController {
        public $tourModel;
        public $calendarModel;
        public $taskModel;
        
        function __construct() {
            $this->model("tourModel");
            $this->tourModel = new TourModel();

            $this->model("calendarModel");
            $this->calendarModel = new CalendarModel();

            $this->model("taskModel");
            $this->taskModel = new TaskModel();
        }
        public function index() {
            $dataCD = [
                [
                    'id' => 1,
                    'name' => 'Tour Biển Đảo'
                ],
                [
                    'id' => 2,
                    'name' => 'Tour Văn Hóa Lịch Sử'
                ],
                [
                    'id' => 3,
                    'name' => 'Tour Nghỉ Dưỡng'
                ],
                [
                    'id' => 4,
                    'name' => 'Tour Mạo Hiểm'
                ],
                [
                    'id' => 5,
                    'name' => 'Tour Ẩm Thực'
                ]
            ];

            $tours = $this->tourModel->getAll();
            return $this->view("tour.index",
            [
                'tours' => $tours,
                'dataCD' => $dataCD
            ]);
        }

        public function create() {
            $dataCD = [
                [
                    'id' => 1,
                    'name' => 'Tour Biển Đảo'
                ],
                [
                    'id' => 2,
                    'name' => 'Tour Văn Hóa Lịch Sử'
                ],
                [
                    'id' => 3,
                    'name' => 'Tour Nghỉ Dưỡng'
                ],
                [
                    'id' => 4,
                    'name' => 'Tour Mạo Hiểm'
                ],
                [
                    'id' => 5,
                    'name' => 'Tour Ẩm Thực'
                ]
            ]; 

            if(isset($_REQUEST['btn-insert'])) {
                $TenTour = $_POST['TenTour'];
                $GioiThieu = $_POST['GioiThieu'];
                $MoTa = $_POST['MoTa'];
                $Gia = $_POST['Gia'];
                $MaCD = $_POST['MaCD'];
                $Anh = basename( $_FILES["avatar-input"]["name"]);
    
                $target_dir    = "./public/img/tour/";
                $target_file   = $target_dir . basename($_FILES["avatar-input"]["name"]);

                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                $maxfilesize   = 800000;

                $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

                if ($_FILES["avatar-input"]["size"] > $maxfilesize)
                {
                    $code = 1;
                    $message = "Không được upload ảnh lớn hơn $maxfilesize (bytes)!";
                }
                else if (!in_array($imageFileType,$allowtypes ))
                {
                    $code = 1;
                    $message = "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF!";
                }
                else
                {
                    if (!move_uploaded_file($_FILES["avatar-input"]["tmp_name"], $target_file)) {
                        $code = 1;
                        $message = "Có lỗi xảy ra khi upload file!";
                        
                    }
                    else {
                        $data = $this->tourModel->insertTour(
                            ['TenTour', 'GioiThieu', 'AnhTour','MoTa', 'GiaTour', 'MaCD'], 
                            ["{$TenTour}", "{$GioiThieu}", "{$Anh}", "{$MoTa}", "{$Gia}", "{$MaCD}"]);

                        $code = 0;
                        $message = "Thêm tour thành công.";
                    }
                }

                if($code == 1) {
                    return $this->view("tour.create", 
                    [
                        'code' => $code,
                        'message' => $message,
                        'dataCD' => $dataCD
                    ]);
                }
                else {
                    header("Location: index.php?controller=tour&action=index&message=$message&code=$code");
                    exit();
                }
            }
            else {
                return $this->view('tour.create', 
                [
                    'dataCD' => $dataCD
                ]);
            }
        }

        public function delete() {
            if(isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];

                $getCalendars = $this->calendarModel->getCalendar(['TrangThai'], 'MaTour', $id);
                $pendingCalendars = array_filter($getCalendars, function($calendar) {
                    return isset($calendar->TrangThai) && $calendar->TrangThai === "Đang xử lý";
                });

                if(empty($pendingCalendars)) {
                    $img = $this->tourModel->getTour(['AnhTour'], 'MaTour', $id);
                    $pathImg = $img[0]->AnhTour;
                    $link = "public/img/tour/$pathImg";
                    
                    $resultTask = $this->taskModel->deleteTask($id, 'MaTour');
                    $resultTour = $this->tourModel->deleteTour($id, 'MaTour');
                    $resultCalendar = $this->calendarModel->deleteCalendar($id, 'MaTour');

                    if($resultTask && $resultTour && $resultCalendar) {
                        unlink($link);

                        $code = 0;
                        $message = "Xóa tour $id thành công.";
                    }
                    else {
                        $code = 1;
                        $message = "Xóa tour $id không thành công!";
                    }       
                }
                else {
                    $code = 1;
                    $message = "Xóa tour $id không thành công do đang có lịch đặt!";
                }
            }
            else {
                $code = 1;
                $message = "Lỗi! Không thể xóa tour.";
            }

            header("Location: index.php?controller=tour&action=index&code=$code&message=$message");
            exit();
        }

        public function showForm() {
            if(isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $dataCD = [
                    [
                        'id' => 1,
                        'name' => 'Tour Biển Đảo'
                    ],
                    [
                        'id' => 2,
                        'name' => 'Tour Văn Hóa Lịch Sử'
                    ],
                    [
                        'id' => 3,
                        'name' => 'Tour Nghỉ Dưỡng'
                    ],
                    [
                        'id' => 4,
                        'name' => 'Tour Mạo Hiểm'
                    ],
                    [
                        'id' => 5,
                        'name' => 'Tour Ẩm Thực'
                    ]
                ];

                $tour = $this->tourModel->getTour(['*'], 'MaTour', $id);
                return $this->view("tour.update",
                [
                    'tour' => $tour,
                    'dataCD' => $dataCD
                ]);
            }
            else {
                $code = 1;
                $message = "Lỗi!";
                header("Location: index.php?controller=tour&action=index&code=$code&message=$message");
                exit();
            }
        }

        public function update() {
            if(isset($_REQUEST['btn-update'])) {
                if(isset($_REQUEST['id'])) {
                    $id = $_REQUEST['id'];
                    $TenTour = $_POST['TenTour'];
                    $GioiThieu = $_POST['GioiThieu'];
                    $MoTa = $_POST['MoTa'];
                    $Gia = $_POST['Gia'];
                    $MaCD = $_POST['MaCD'];
                    
                    if(empty(basename( $_FILES["avatarUpdate"]["name"]))) {
                        $this->tourModel->updateTour(
                            ['TenTour', 'GioiThieu', 'MoTa', 'GiaTour', 'MaCD'],
                            [$TenTour, $GioiThieu, $MoTa, $Gia, $MaCD], 
                            'MaTour', $id);
                            
                        $code = 0;
                        $message = "Cập nhật thông tin tour $id thành công.";
                    } 
                    else {
                        $Anh = basename( $_FILES["avatarUpdate"]["name"]);
    
                        $target_dir    = "./public/img/tour/";
                        $target_file   = $target_dir . basename($_FILES["avatarUpdate"]["name"]);
    
                        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                        $maxfilesize   = 800000;
    
                        $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
    
                        if ($_FILES["avatarUpdate"]["size"] > $maxfilesize)
                        {
                            $code = 1;
                            $message = "Không được upload ảnh lớn hơn $maxfilesize (bytes)!";
                        }
                        else if (!in_array($imageFileType,$allowtypes ))
                        {
                            $code = 1;
                            $message = "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF!";
                        }
                        else
                        {
                            if (!move_uploaded_file($_FILES["avatarUpdate"]["tmp_name"], $target_file)) {
                                $code = 1;
                                $message = "Có lỗi xảy ra khi upload file!";
                                
                            }
                            else {
                                $this->tourModel->updateTour(
                                    ['TenTour', 'GioiThieu', 'AnhTour', 'MoTa', 'GiaTour', 'MaCD'],
                                    [$TenTour, $GioiThieu, $Anh, $MoTa, $Gia, $MaCD], 
                                    'MaTour', $id);
                                
                                $code = 0;
                                $message = "Cập nhật thông tin tour $id thành công.";
                            }
                        }
                    }

                    if($code == 1) {
                        header("Location: index.php?controller=tour&action=showForm&id=$id&message=$message&code=$code");
                    }
                    else {
                        header("Location: index.php?controller=tour&action=index&message=$message&code=$code");
                    }
                }
                else {
                    $code = 1;
                    $message = "Lỗi!";
                    header("Location: index.php?controller=tour&action=index&code=$code&message=$message");
                }
                exit();
            }
        }

        public function search() {
            $dataCD = [
                [
                    'id' => 1,
                    'name' => 'Tour Biển Đảo'
                ],
                [
                    'id' => 2,
                    'name' => 'Tour Văn Hóa Lịch Sử'
                ],
                [
                    'id' => 3,
                    'name' => 'Tour Nghỉ Dưỡng'
                ],
                [
                    'id' => 4,
                    'name' => 'Tour Mạo Hiểm'
                ],
                [
                    'id' => 5,
                    'name' => 'Tour Ẩm Thực'
                ]
            ];

            if(isset($_REQUEST['btn-search'])) {
                if(isset($_REQUEST['input-search'])) {
                    $input = $_REQUEST['input-search'];

                    if(ctype_digit($input)) {
                        $tours = $this->tourModel->searchTour(['*'], ['MaTour'], $input);
                    }
                    else {
                        $tours = $this->tourModel->searchTour(['*'], ['TenTour'], $input);
                    }

                    if(!empty($tours)) {
                        return $this->view("tour.index",
                        [
                            'tours' => $tours,
                            'dataCD' => $dataCD
                        ]);
                    }
                    else {
                        $code = 1;
                        $message = "Tour không tồn tại!";

                        header("Location: index.php?controller=tour&action=index&code=$code&message=$message");
                        exit();
                    }
                }
            }
        }
    }
