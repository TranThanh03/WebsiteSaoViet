<?php 
    class CalendarController extends BaseController {
        public $calendarModel;
        public $accountModel;
        public $tourModel;
        public $guideModel;
        
        public function __construct()
        {
            $this->model('CalendarModel');
            $this->calendarModel = new CalendarModel();
            
            $this->model('AccountModel');
            $this->accountModel = new AccountModel();

            $this->model('TourModel');
            $this->tourModel = new TourModel();

            $this->model('GuideModel');
            $this->guideModel = new GuideModel();
        }
        public function index() {
            if (isset($_SESSION['username'])) {
                $id = $_REQUEST['id'] ?? '';
                $code = $_REQUEST['code'] ?? '';

                $idAcc = $this->accountModel->getAccount(['MaTK'], 'SDT', $_SESSION['username']);
                $idUser = $this->accountModel->getUserIdAccount(['MaKH'], ['taikhoan.MaTK'], $idAcc[0]->MaTK);

                $calendars = [];

                if (!empty($idUser)) {
                    $listCalendarsId = $this->calendarModel->getCalendarById(['MaDD'], "MaKH", $idUser[0]->MaKH);
                    
                    foreach($listCalendarsId as $value) {
                        $getCalendar = $this->calendarModel->getCalendar(['*'], 'MaDD', $value->MaDD);
                        $getTour = $this->tourModel->getTour(['AnhTour'], 'MaTour', $getCalendar[0]->MaTour);
                    
                        $calendars[] = array (
                            'calendar' => $getCalendar,
                            'tour' => !empty($getTour) ? $getTour[0] : null,
                        );
                    }

                    usort($calendars, function ($a, $b) {
                        $order = ['Đang xử lý' => 1, 'Đã xác nhận' => 2, 'Đã hủy' => 3];
                    
                        $statusA = $order[$a['calendar'][0]->TrangThai] ?? PHP_INT_MAX;
                        $statusB = $order[$b['calendar'][0]->TrangThai] ?? PHP_INT_MAX;
                    
                        $statusComparison = $statusA <=> $statusB;
                    
                        if ($statusComparison === 0) {
                            return $b['calendar'][0]->MaDD <=> $a['calendar'][0]->MaDD;
                        }
                    
                        return $statusComparison;
                    });

                    if($id == '' || $code == '') {
                        return $this->view('calendar.index', [
                            'calendars' => $calendars
                        ]);
                    }
                    else {
                        if($code == 0) {
                            return $this->view("calendar.index",
                            [
                                'message' => "
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='35' height='35' fill='green'>
                                        <circle cx='12' cy='12' r='10' fill='none' stroke='green' stroke-width='2'/>
                                        <path d='M6 12l4 4l8-8' fill='none' stroke='green' stroke-width='2'/>
                                    </svg>
                                    <span id='message'>Hủy đơn <b>$id</b> thành công</span>",
                                'calendars' => $calendars
                            ]);
                        }
                        else if($code == 1) {
                            return $this->view("calendar.index",
                            [
                                'message' => "
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='35' height='35' fill='red'>
                                        <circle cx='12' cy='12' r='10' fill='none' stroke='red' stroke-width='2'/>
                                        <line x1='8' y1='8' x2='16' y2='16' stroke='red' stroke-width='2'/>
                                        <line x1='16' y1='8' x2='8' y2='16' stroke='red' stroke-width='2'/>
                                    </svg>                                       
                                    <span id='message'>Hủy đơn <b>$id</b> không thành công</span>",
                                'calendars' => $calendars
                            ]);
                        }
                    }

                } else {
                    return $this->view('calendar.index', [
                        'calendars' => []
                    ]);
                }            
            } 
            else {
                return $this->view('calendar.index');
            }
        } 

        public function cancel() {
            if(isset($_REQUEST['id'])) {
                $id = $_REQUEST['id'];
                $getIdCalendar = $this->calendarModel->getCalendar(['TrangThai'], 'MaDD', $id);
                $result = $this->calendarModel->cancelCalendar(['TrangThai'], ['Đã hủy'], 'MaDD', $id);

                if(isset($result) && !empty($getIdCalendar) && $getIdCalendar[0]->TrangThai != "Đã hủy") {  
                    header('Location: index.php?controller=calendar&action=index&id='.$id.'&code=0');
                } 
                else {
                    header('Location: index.php?controller=calendar&action=index&id='.$id.'&code=1');
                }
                exit();
            }
        }
    }
?>