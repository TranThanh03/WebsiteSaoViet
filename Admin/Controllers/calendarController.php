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
                    return $b->MaDD <=> $a->MaDD;
                }
        
                return $statusComparison;
            });
            
            return $this->view("calendar.index",
                ['calendars' => $calendars]
            );
        }

        public function detail() {
            if($_REQUEST['id']) {
                $calendar = $this->calendarModel->getCalendar(['*'], 'MaDD', $_REQUEST['id']);
                $user = $this->userModel->getUser(['MaTK'], 'MaKH', $calendar[0]->MaKH);

                if(!empty($user)) {
                    $account = $this->accountModel->getAccount(['SDT, Email'], 'MaTK', $user[0]->MaTK);
                }

                $guide = $this->guideModel->getGuide(['AnhHDV'], 'MaHDV', $calendar[0]->MaHDV);
                $tour = $this->tourModel->getTour(['AnhTour'], 'MaTour',  $calendar[0]->MaTour);

                if (!empty($account)) {
                    return $this->view("calendar.detail",
                        [
                            'calendar' => $calendar,
                            'account' => $account,
                            'guide' => $guide,
                            'tour' => $tour
                        ]
                    );
                }
                else {
                    return $this->view("calendar.detail",
                        [
                            'calendar' => $calendar,
                            'guide' => $guide,
                            'tour' => $tour
                        ]
                    );
                }
            }
        }

        public function update() {
            if(isset($_REQUEST['id']) && isset($_REQUEST['status'])) {
                $id = $_REQUEST['id'];
                $status = $_REQUEST['status'];
                $getCalendar = $this->calendarModel->getCalendar(['MaDD'], 'MaDD', $id);

                if(!empty($getCalendar)) {
                    if($status === 'confirm') {
                        $this->calendarModel->updateCalendar(['TrangThai'], ["Đã xác nhận"]
                        , 'MaDD', $id);

                        $code = 0;
                        $message = "Đơn đặt $id đã được xác nhận.";
                    } 
                    else {
                        $this->calendarModel->updateCalendar(['TrangThai'], ["Đã hủy"]
                        , 'MaDD', $id);

                        $code = 1;
                        $message = "Đơn đặt $id đã bị hủy.";
                    }
                }
                else {
                    $code = 1;
                    $message = "Đơn đặt $id không tồn tại.";
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

                    $calendars = $this->calendarModel->searchCalendar(['*'], ['dondat.MaDD', 'dondat.MaKH', 'dondat.MaTour', 'dondat.MaHDV'], $input);

                    usort($calendars, function($a, $b) {
                        $order = ['Đang xử lý' => 1, 'Đã xác nhận' => 2, 'Đã hủy' => 3];
                        $statusComparison = $order[$a->TrangThai] <=> $order[$b->TrangThai];
                    
                        if ($statusComparison === 0) {
                            return $b->MaDD <=> $a->MaDD;
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
                        $message = "Đơn đặt không tồn tại!";

                        header("Location: index.php?controller=calendar&action=index&code=$code&message=$message");
                        exit();
                    }
                }
            }
        }
    }
?>