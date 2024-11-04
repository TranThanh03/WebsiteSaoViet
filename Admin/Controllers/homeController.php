<?php 
    class HomeController extends BaseController {
        public $accountModel;
        public $tourModel;
        public $calendarModel;

        public function __construct() {
            $this->model("accountModel");
            $this->accountModel = new AccountModel();

            $this->model("tourModel");
            $this->tourModel = new TourModel();

            $this->model("calendarModel");
            $this->calendarModel = new CalendarModel();
        }

        public function index() {
            $accounts = $this->accountModel->getAll(['*'], 'Quyen', 'admin');
            $tours = $this->tourModel->getAll(['MaTour']);
            $calendars = $this->calendarModel->getCalendar(['TongTien'], 'TrangThai', 'Đã xác nhận');
            $totalCost = 0;
            $latestCalendars = $this->calendarModel->getCalendarLatest(['*'], 'TrangThai', 'Đang xử lý', 'order by ThoiGianDat desc limit 3');

            foreach($calendars as $value) {
                $cost = str_replace(".", "", $value->TongTien); 
                $totalCost += $cost;
            }   

            return $this->view("home.index", 
            [
                'totalUser' => count($accounts),
                'totalTour' => count($tours),
                'totalCalendar' => count($calendars),
                'totalCost' => number_format($totalCost, 0, '.'),
                'latestCalendars' => $latestCalendars
            ]);
        }
    }
?>