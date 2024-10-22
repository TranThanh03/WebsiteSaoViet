<?php 
    class calendarController extends BaseController {
        public $calendarModel;
        public $userModel;
        public function __construct()
        {
            $this->model('calendarModel');
            $this->calendarModel = new calendarModel();
            
            $this->model('userModel');
            $this->userModel = new userModel();
        }
        public function index() {
            if (isset($_SESSION['username'])) {
                $idUser = $this->userModel->getUser(['MaKH'], 'email', $_SESSION['username']);
                $idCalendar = $this->calendarModel->getCalendar(['MaLD'], 'MaKH', $idUser[0]->MaKH);
                $calendars = [];
            
                if (!empty($idCalendar)) {
                    foreach ($idCalendar as $value) {
                        $data = $this->calendarModel->getById(['*'], "MaLD", $value->MaLD);
                        array_push($calendars, $data);
                    }
                    
                    usort($calendars, function($a, $b) {
                        $order = ['Đang xử lý' => 1, 'Đã xác nhận' => 2, 'Đã hủy' => 3];
                        
                        $statusComparison = $order[$a[0]->TrangThai] <=> $order[$b[0]->TrangThai];
                        if ($statusComparison === 0) {
                            return $b[0]->MaLD <=> $a[0]->MaLD;
                        }

                        return $statusComparison;
                    });
                    

                    return $this->view('calendar.index', [
                        'calendars' => $calendars
                    ]);
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
                $getIdCalendar = $this->calendarModel->getCalendar(['TrangThai'], 'MaLD', $id);
                $result = $this->calendarModel->cancelCalendar(['TrangThai'], ['Đã hủy'], 'MaLD', $id);

                $idUser = $this->userModel->getUser(['MaKH'], 'email', $_SESSION['username']);
                $idCalendar = $this->calendarModel->getCalendar(['MaLD'], 'MaKH', $idUser[0]->MaKH);
                $calendars = [];
            
                if (!empty($idCalendar)) {
                    foreach ($idCalendar as $value) {
                        $data = $this->calendarModel->getById(['*'], "MaLD", $value->MaLD);
                        array_push($calendars, $data);
                    }
                    
                    usort($calendars, function($a, $b) {
                        $order = ['Đang xử lý' => 1, 'Đã xác nhận' => 2, 'Đã hủy' => 3];
                        $statusComparison = $order[$a[0]->TrangThai] <=> $order[$b[0]->TrangThai];
                    
                        if ($statusComparison === 0) {
                            return $b[0]->MaLD <=> $a[0]->MaLD;
                        }
                
                        return $statusComparison;
                    });
                }     

                if(!empty($result) && !empty($getIdCalendar) && $getIdCalendar[0]->TrangThai != "Đã hủy") {
                    
                return $this->view("calendar.index",
                [
                        'code' => 0,
                        'message' => "
                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='35' height='35' fill='green'>
                                <circle cx='12' cy='12' r='10' fill='none' stroke='green' stroke-width='2'/>
                                <path d='M6 12l4 4l8-8' fill='none' stroke='green' stroke-width='2'/>
                            </svg>
                            <span id='message'>Hủy Tour <b>$id</b> thành công</span>",
                        'calendars' => $calendars
                ]);
                }
                else {
                    return $this->view("calendar.index",
                [
                        'code' => 1,
                        'message' => "
                            <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' width='35' height='35' fill='red'>
                                <circle cx='12' cy='12' r='10' fill='none' stroke='red' stroke-width='2'/>
                                <line x1='8' y1='8' x2='16' y2='16' stroke='red' stroke-width='2'/>
                                <line x1='16' y1='8' x2='8' y2='16' stroke='red' stroke-width='2'/>
                            </svg>                                       
                            <span id='message'>Hủy Tour <b>$id</b> không thành công</span>",
                        'calendars' => $calendars
                ]);
                }
            }
        }
    }
?>