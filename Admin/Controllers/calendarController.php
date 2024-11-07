<?php 
    class CalendarController extends BaseController {
        public $calendarModel;
        public $userModel;
        public $accountModel;
        public $guideModel;
        public $tourModel;

        public function __construct() {
            $this->model("calendarModel");
            $this->calendarModel = new CalendarModel();

            $this->model("userModel");
            $this->userModel = new UserModel();

            $this->model("accountModel");
            $this->accountModel = new AccountModel();

            $this->model("guideModel");
            $this->guideModel = new GuideModel();

            $this->model("tourModel");
            $this->tourModel = new TourModel();
        }

        public function index() {
            $calendars = $this->calendarModel->getAll();
        
            usort($calendars, function($a, $b) {
                $order = ['Đang xử lý' => 1, 'Đã xác nhận' => 2, 'Đã hủy' => 3];
                $statusComparison = $order[$a->TrangThai] <=> $order[$b->TrangThai];
            
                if ($statusComparison === 0) {
                    return $b->MaLD <=> $a->MaLD;
                }
        
                return $statusComparison;
            });
            
            return $this->view("calendar.index",
                ['calendars' => $calendars]
            );
        }

        public function detail() {
            if($_REQUEST['id']) {
                $calendar = $this->calendarModel->getCalendar(['*'], 'MaLD', $_REQUEST['id']);
                $user = $this->userModel->getUser(['*'], 'MaKH', $calendar[0]->MaKH);
                $account = $this->accountModel->getAccount(['SDT'], 'MaTK', $user[0]->MaTK);
                $guide = $this->guideModel->getGuide(['TenHDV', 'AnhHDV'], 'MaHDV', $calendar[0]->MaHDV);
                $tour = $this->tourModel->getTour(['*'], 'MaTour',  $calendar[0]->MaTour);

                return $this->view("calendar.detail",
                    [
                        'calendar' => $calendar,
                        'user' => $user,
                        'account' => $account,
                        'guide' => $guide,
                        'tour' => $tour
                    ]
                );
            }
        }

        public function update() {
            if(isset($_REQUEST['id']) && isset($_REQUEST['status'])) {
                $id = $_REQUEST['id'];
                $status = $_REQUEST['status'];
                $getCalendar = $this->calendarModel->getCalendar(['MaLD'], 'MaLD', $id);

                if(!empty($getCalendar)) {
                    if($status === 'confirm') {
                        $this->calendarModel->updateCalendar(['TrangThai'], ["Đã xác nhận"]
                        , 'MaLD', $id);

                        $code = 0;
                        $message = "Lịch đặt $id đã được xác nhận.";
                    } 
                    else {
                        $this->calendarModel->updateCalendar(['TrangThai'], ["Đã hủy"]
                        , 'MaLD', $id);

                        $code = 0;
                        $message = "Lịch đặt $id đã bị hủy.";
                    }
                }
                else {
                    $code = 0;
                    $message = "Lịch đặt $id không tồn tại.";
                }
            }
            else {
                $code = 1;
                $message = "Lỗi!";
            }

            header("location: index.php?controller=calendar&action=detail&id=$id&code=$code&message=$message");
            exit();
        }

        public function search() {
            if(isset($_REQUEST['btn-search'])) {
                if(isset($_REQUEST['input-search'])) {
                    $input = $_REQUEST['input-search'];

                    $calendars = $this->calendarModel->searchCalendar(['*'], ['lichdat.MaLD', 'lichdat.MaKH', 'lichdat.MaTour', 'lichdat.MaHDV'], $input);

                    usort($calendars, function($a, $b) {
                        $order = ['Đang xử lý' => 1, 'Đã xác nhận' => 2, 'Đã hủy' => 3];
                        $statusComparison = $order[$a->TrangThai] <=> $order[$b->TrangThai];
                    
                        if ($statusComparison === 0) {
                            return $b->MaLD <=> $a->MaLD;
                        }
                
                        return $statusComparison;
                    });

                    if(!empty($calendars)) {
                        return $this->view("calendar.index",
                        [
                            'calendars' => $calendars
                        ]);
                    }
                    else {
                        $code = 1;
                        $message = "Lịch đặt không tồn tại!";

                        header("Location: index.php?controller=calendar&action=index&code=$code&message=$message");
                        exit();
                    }
                }
            }
        }
    }
?>