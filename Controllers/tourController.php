<?php 
    class TourController extends BaseController {
        public $tourModel;

        public function __construct() {
            $this->model('TourModel');
            $this->tourModel = new TourModel();
        }
        public function index() {
            return $this->view('tour.index');
        }

        public function detail() {
            if(isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
                $id = $_REQUEST['id'];
                $tour = $this->tourModel->getById(['*'],"MaTour", $id);
                
                if(!empty($tour)) {
                    return $this->view("tour.detail", [
                        'tour' => $tour
                    ]);
                }
                else {
                    echo "
                        <div class='none-tour-details'>
                            <h2>Không có dữ liệu!</h2>
                        </div>
                        <script>
                            Swal.fire({
                                title: 'Lỗi',
                                html: 'Tour <b>$id</b> không tồn tại hoặc không hợp lệ!',
                                icon: 'error',
                                confirmButtonText: 'Đóng'
                            });
                        </script>
                    ";
                }
            }
        }

        public function list() {
            if(isset($_REQUEST['id']) && $_REQUEST['id'] != '') {
                $value = $_REQUEST['id'];
                
                $tours = $this->tourModel->getById(['*'],"MaCD", $value);

                return $this->view("tour.list", [
                    'tours' => $tours
                ]);
            }
            else {
                $tours = $this->tourModel->getAll();

                return $this->view("tour.list", [
                    'tours' => $tours
                ]);
            }
        }

        public function search() {
            $nameTour = $_POST['search_tour'] ?? '';
            if($nameTour != '') {
                $tours = $this->tourModel->searchTour(['*'], 'TenTour', $nameTour);
            } else {
                $tours = [];
            }

            return $this->view("tour.list", [
                'tours' => $tours
            ]);
        }
    }