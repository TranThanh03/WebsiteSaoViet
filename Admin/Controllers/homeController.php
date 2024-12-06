<?php 
    class HomeController extends BaseController {
        public $userModel;
        public $tourModel;
        public $guideModel;
        public $calendarModel;

        public function __construct() {
            $this->model("userModel");
            $this->userModel = new UserModel();

            $this->model("tourModel");
            $this->tourModel = new TourModel();

            $this->model("guideModel");
            $this->guideModel = new GuideModel();

            $this->model("calendarModel");
            $this->calendarModel = new CalendarModel();
        }

        public function index() {
            $users = $this->userModel->getAll(['*']);
            $tours = $this->tourModel->getAll(['MaTour']);
            $guides = $this->guideModel->getAll(['MaHDV']);
            $calendars = $this->calendarModel->getCalendar(['TongTien'], 'TrangThai', 'Đã xác nhận');
            $totalCost = 0;
            $latestCalendars = $this->calendarModel->getCalendarLatest(['*'], 'TrangThai', 'Đang xử lý', 'order by ThoiGianDat desc limit 3');

            foreach($calendars as $value) {
                $cost = str_replace(".", "", $value->TongTien); 
                $totalCost += $cost;
            }   

            return $this->view("home.index", 
            [
                'totalUser' => count($users),
                'totalTour' => count($tours),
                'totalGuide' => count($guides),
                'totalCalendar' => count($calendars),
                'totalCost' => number_format($totalCost, 0, '.'),
                'latestCalendars' => $latestCalendars
            ]);
        }
    }
?>