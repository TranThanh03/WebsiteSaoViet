<?php 
    class calendarContentController extends BaseController {
        public $calendarModel;
        public $userModel;
        public $accountModel;
        public $tourModel;
        public $guideModel;
        public $taskModel;

        public function __construct() {
            $this->model('calendarModel');
            $this->calendarModel = new calendarModel();
            
            $this->model('userModel');
            $this->userModel = new userModel();

            $this->model('accountModel');
            $this->accountModel = new accountModel();
            
            $this->model('tourModel');
            $this->tourModel = new tourModel();

            $this->model('guideModel');
            $this->guideModel = new guideModel();

            $this->model('taskModel');
            $this->taskModel = new taskModel();
        }

        private function _get($idTour, $idGuide) {
            $user = $this->userModel->getUser(['*'], 'Email', $_SESSION['username']);
            $account = $this->accountModel->getAccount(['SDT'], 'MaTK', $user[0]->MaTK);
            $tour = $this->tourModel->getById(['MaTour', 'TenTour', 'AnhTour', 'Gia'],'MaTour', $idTour);
            $guide = $this->guideModel->getGuide(['MaHDV', 'TenHDV', 'AnhHDV', 'DanhGia', 'Gia'],'MaHDV', $idGuide);

            return [
                'tour' => $tour,
                'account' => $account,
                'user' => $user,
                'guide' => $guide
            ];
        }

        public function index() {
            if(isset($_SESSION['username'])) {
                $idTour = $_REQUEST['idTour'] ?? '';
                $idGuide = $_REQUEST['idGuide'] ?? '';
                
                $datas = $this->_get($idTour, $idGuide);
                $task = $this->taskModel->getTaskOption(['MaTour', 'MaHDV', 'MaPC', 'NgayKH', 'NgayKT'], [$idTour, $idGuide]);

                return $this->view("calendarContent.index",[
                    'tour' => $datas['tour'],
                    'user' => $datas['user'],
                    'account' => $datas['account'],
                    'guide' => $datas['guide'],
                    'task' => $task 
                ]);
            } else {
                header("Location: index.php?controller=user&action=index");
            }
        }

        public function execPostRequest($url, $data)
        {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data))
            );
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        }

        public function payment() {
            if(isset($_POST['payUrl'])) {
                $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

                $partnerCode = 'MOMOBKUN20180529';
                $accessKey = 'klm05TvNBzhg7h7j';
                $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
                $orderInfo = "Thanh toán qua MoMo";
                $amount = str_replace('.', '', str_replace("VND", "", $_POST['total-price']));
                $orderId = rand(1, 1000);
                $redirectUrl = "http://localhost/WebsiteSaoViet/index.php?controller=calendarContent&action=booking&idUser=" . $_REQUEST['idUser'] . "&idTour=" . $_REQUEST['idTour'] . "&idGuide=" . $_REQUEST['idGuide'] . '&ngayKH=' . $_REQUEST["startDate"] . '&ngayKT=' . $_REQUEST["endDate"];    
                $ipnUrl = "http://localhost/WebsiteSaoViet/index.php?controller=calendarContent&action=booking&idUser=" . $_REQUEST['idUser'] . "&idTour=" . $_REQUEST['idTour'] . "&idGuide=" . $_REQUEST['idGuide'] . '&ngayKH=' . $_REQUEST["startDate"] . '&ngayKT=' . $_REQUEST["startDate"];
                $extraData = "";

                $serectkey = $secretKey;

                $requestId = time() . "";
                $requestType = "payWithATM";
                $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
                $signature = hash_hmac("sha256", $rawHash, $serectkey);
                $data = array(
                    'partnerCode' => $partnerCode,
                    'partnerName' => "Test",
                    "storeId" => "MomoTestStore",
                    'requestId' => $requestId,
                    'amount' => $amount,
                    'orderId' => $orderId,
                    'orderInfo' => $orderInfo,
                    'redirectUrl' => $redirectUrl,
                    'ipnUrl' => $ipnUrl,
                    'lang' => 'vi',
                    'extraData' => $extraData,
                    'requestType' => $requestType,
                    'signature' => $signature);
                $result = $this->execPostRequest($endpoint, json_encode($data));
                $jsonResult = json_decode($result, true);
                if (isset($jsonResult['payUrl'])) {
                    header('Location: ' . $jsonResult['payUrl']);
                }
                else {
                    header('Location: index.php?controller=calendarContent&action=error&idTour=' . $_REQUEST["idTour"] . '&idGuide=' . $_REQUEST["idGuide"]);
                }
            }
        }

        public function booking() {
            if (!empty($_GET)) {
                $resultCode = $_GET["resultCode"];

                if ($resultCode == 0) {
                    $MaKH = $_REQUEST['idUser'];
                    $MaTour = $_REQUEST['idTour'];
                    $MaHDV = $_REQUEST['idGuide'];
                    $NgayKH = date('Y-m-d', strtotime($_REQUEST['ngayKH']));
                    $NgayKT = date('Y-m-d', strtotime($_REQUEST['ngayKT']));
                    $TongTien = number_format($_GET['amount'], 0, ',', '.');
                    $CurrentTime = date('Y-m-d H:i:s');
                    
                    $createCalendar = $this->calendarModel->createCalendar(['MaKH', 'MaTour', 'MaHDV', 'NgayKH', 'NgayKT', 'TongTien', 'ThoiGianDat', 'TrangThai'], 
                                                                            [$MaKH, $MaTour, $MaHDV, $NgayKH, $NgayKT, $TongTien, $CurrentTime, "Đang xử lý"]);
                        
                    if(!empty($createCalendar)) {
                        echo "<script>sessionStorage.setItem('statusCalendar', 'true');</script>";
                        return $this->view('message.index',[
                            'code' => 0,
                            'title' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="50" fill="green">
                                            <circle cx="12" cy="12" r="10" fill="none" stroke="green" stroke-width="2"/>
                                            <path d="M6 12l4 4l8-8" fill="none" stroke="green" stroke-width="2"/>
                                        </svg>
                                        <p>Đặt Tour thành công</p>',
                            'message' => 'Cảm ơn bạn đã đặt tour tại website Sao Việt!',
                            'messageAction' => "",
                            'href' => '#'
                        ]);
                    } else {
                        return $this->view("message.index",[
                            'code' => 1,
                            'title' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="50" fill="red">
                                            <circle cx="12" cy="12" r="10" fill="none" stroke="red" stroke-width="2"/>
                                            <line x1="8" y1="8" x2="16" y2="16" stroke="red" stroke-width="2"/>
                                            <line x1="16" y1="8" x2="8" y2="16" stroke="red" stroke-width="2"/>
                                        </svg>                                       
                                        <p>Đặt Tour không thành công</p>',
                            'message' => 'Có lỗi khi đặt tour. Vui lòng đặt Tour lại!',
                            'messageAction' => "Đặt tour",
                            'href' => "index.php?controller=calendarContent&action=index&idUser=" . $_REQUEST['idUser'] . "&idTour=" . $_REQUEST['idTour'] . "&idGuide=" . $_REQUEST['idGuide']
                        ]);
                    }
                } else {
                    return $this->view("message.index",[
                        'code' => 1,
                        'title' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="50" height="50" fill="red">
                                        <circle cx="12" cy="12" r="10" fill="none" stroke="red" stroke-width="2"/>
                                        <line x1="8" y1="8" x2="16" y2="16" stroke="red" stroke-width="2"/>
                                        <line x1="16" y1="8" x2="8" y2="16" stroke="red" stroke-width="2"/>
                                    </svg>                                       
                                    <p>Đặt Tour không thành công</p>',
                        'message' => 'Có lỗi khi đặt tour. Vui lòng đặt Tour lại!',
                        'messageAction' => "Đặt tour",
                        'href' => "index.php?controller=calendarContent&action=index&idUser=" . $_REQUEST['idUser'] . "&idTour=" . $_REQUEST['idTour'] . "&idGuide=" . $_REQUEST['idGuide']
                    ]);
                }
            }
        }

        public function error() {
            return $this->view("message.error");
        }
    } 