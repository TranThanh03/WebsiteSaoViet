<?php
    class GuideController extends BaseController {
        public $guideModel;
        public $tourModel;
        public $calendarModel;
        public $taskModel;
    
        public function __construct(){
            $this->model("guideModel");
            $this->guideModel = new GuideModel();

            $this->model("tourModel");
            $this->tourModel = new TourModel();
            
            $this->model("calendarModel");
            $this->calendarModel = new CalendarModel();

            $this->model("taskModel");
            $this->taskModel = new TaskModel();
        }

        public function index() {
            $guides = $this->guideModel->getAll(['*']);
            return $this->view("guide.index",
            [
                'guides' => $guides
            ]);
        }

        public function create() {
            if(isset($_REQUEST['btn-insert'])) {
                $TenHDV = $_POST['TenHDV'];
                $SDT = $_POST['SDT'];
                $Email = $_POST['Email'];
                $NgaySinh = $_POST['NgaySinh'];
                $GioiTinh = $_POST['GioiTinh'];
                $MoTa = $_POST['MoTa'];
                $DanhGia = $_POST['DanhGia'];
                $Anh = basename( $_FILES["avatar-input"]["name"]);
    
                $target_dir    = "./public/img/guide/";
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
                        $this->guideModel->insertGuide(
                            ['TenHDV','SDT','Email' ,'NgaySinh' ,'GioiTinh', 'AnhHDV', 'MoTa', 'DanhGia'],
                            [$TenHDV,  $SDT, $Email, $NgaySinh, $GioiTinh, $Anh, $MoTa, $DanhGia]);

                        $code = 0;
                        $message = "Thêm hướng dẫn viên thành công.";
                    }
                }

                if($code == 1) {
                    return $this->view("guide.create", 
                    [
                        'code' => $code,
                        'message' => $message
                    ]);
                }
                else {
                    header("Location: index.php?controller=guide&action=index&message=$message&code=$code");
                    exit();
                }
            }
            else {
                return $this->view("guide.create");
            }
        }

        public function showForm() {
            if(isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];

                $guide = $this->guideModel->getGuide(['*'], 'MaHDV', $id);

                return $this->view("guide.update",
                [
                    'guide' => $guide
                ]);
            }
            else {
                $code = 1;
                $message = "Lỗi!";
                header("Location: index.php?controller=guide&action=index&code=$code&message=$message");
                exit();
            }
        }

        public function update() {
            if(isset($_REQUEST['btn-update'])) {
                if(isset($_REQUEST['id'])) {      
                    $id = $_REQUEST['id'];
                    $TenHDV = $_POST['TenHDV'];
                    $SDT = $_POST['SDT'];
                    $Email = $_POST['Email'];
                    $NgaySinh = $_POST['NgaySinh'];
                    $GioiTinh = $_POST['GioiTinh'];
                    $MoTa = $_POST['MoTa'];
                    $DanhGia = $_POST['DanhGia'];

                    if(empty(basename( $_FILES["avatarUpdate"]["name"]))) {
                        $this->guideModel->updateGuide(
                            ['TenHDV','SDT','Email' ,'NgaySinh' ,'GioiTinh', 'MoTa', 'DanhGia'],
                            [$TenHDV,  $SDT, $Email, $NgaySinh, $GioiTinh, $MoTa, $DanhGia], 
                            'MaHDV', $id);
                        
                        $code = 0;
                        $message = "Cập nhật thông tin hướng dẫn viên $id thành công.";
                    } else {
                        $Anh = basename( $_FILES["avatarUpdate"]["name"]);
    
                        $target_dir    = "./public/img/guide/";
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
                                $this->guideModel->updateGuide(
                                    ['TenHDV','SDT','Email' ,'NgaySinh' ,'GioiTinh', 'AnhHDV', 'MoTa', 'DanhGia'],
                                    [$TenHDV,  $SDT, $Email, $NgaySinh, $GioiTinh, $Anh, $MoTa, $DanhGia], 
                                    'MaHDV', $id);
    
                                $code = 0;
                                $message = "Cập nhật thông tin hướng dẫn viên $id thành công.";
                            }
                        }
                    }

                    if($code == 1) {
                        header("Location: index.php?controller=guide&action=showForm&id=$id&message=$message&code=$code");
                    }
                    else {
                        header("Location: index.php?controller=guide&action=index&message=$message&code=$code");
                    }
                }
                else {
                    $code = 1;
                    $message = "Lỗi!";
                    header("Location: index.php?controller=guide&action=index&code=$code&message=$message");
                }
                exit();
            }
        }
        
        public function delete() {
            if(isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];

                $getCalendars = $this->calendarModel->getCalendar(['TrangThai'], 'MaHDV', $id);
                $pendingCalendars = array_filter($getCalendars, function($calendar) {
                    return isset($calendar->TrangThai) && $calendar->TrangThai === "Đang xử lý";
                });

                if(empty($pendingCalendars)) {
                    $img = $this->guideModel->getGuide(['AnhHDV'], 'MaHDV', $id);
                    $imgString = $img[0]->AnhHDV;
                    $link = "public/img/guide/{$imgString}";
                    
                    try {
                        $resultTask = $this->taskModel->deleteTask($id, 'MaHDV');
                        $resultGuide = $this->guideModel->deleteGuide($id, 'MaHDV');
                        $resultCalendar = $this->calendarModel->deleteCalendar($id, 'MaHDV');

                        if($resultTask && $resultGuide && $resultCalendar) {
                            unlink($link);

                            $code = 0;
                            $message = "Xoá hướng dẫn viên " . $id . " thành công.";
                        }
                    }
                    catch(Exception $e) {
                        $code = 1;
                        $message = "Xoá hướng dẫn viên $id không thành công!";
                    }
                }
                else {
                    $code = 1;
                    $message = "Xóa hướng dẫn viên $id không thành công do đang có lịch đặt!";
                }

                header("Location: index.php?controller=guide&action=index&message={$message}&code={$code}");
                exit();
            }

        }

        public function search() {
            if(isset($_REQUEST['btn-search'])) {
                if(isset($_REQUEST['input-search'])) {
                    $input = $_REQUEST['input-search'];

                    if(ctype_digit($input)) {
                        $guides = $this->guideModel->searchGuide(['*'], ['MaHDV'], $input);
                        if(empty($guides)) {
                            $guides = $this->guideModel->searchGuide(['*'], ['MaHDV', 'SDT'], $input);
                        }
                    }
                    else {
                        $guides = $this->guideModel->searchGuide(['*'], ['TenHDV'], $input);
                    }

                    if(!empty($guides)) {
                        return $this->view("guide.index",
                        [
                            'guides' => $guides
                        ]);
                    }
                    else {
                        $code = 1;
                        $message = "Hướng dẫn viên không tồn tại!";

                        header("Location: index.php?controller=guide&action=index&code=$code&message=$message");
                        exit();
                    }
                }
            }
        }
    }
?>