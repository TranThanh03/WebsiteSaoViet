<?php 
    class guideController extends BaseController {
        public $guideModel;
        public $tourModel;
        public $taskModel;

        public function __construct() {
            $this->model('guideModel');
            $this->guideModel = new guideModel();

            $this->model('tourModel');
            $this->tourModel = new tourModel();

            $this->model('taskModel');
            $this->taskModel = new taskModel();
        }

        public function index() {
            if(isset($_REQUEST['idTour'])) {
                if(isset($_SESSION['username'])) {
                    $tasks = $this->taskModel->getTask(['*'], "MaTour", $_REQUEST['idTour']);
                    $arrayGuide = [];

                    foreach($tasks as $item) {
                        $guides = $this->guideModel->getGuide(['*'], "MaHDV", $item->MaHDV);
                        if(!empty($guides)) {
                            $arrayGuide[] = $this->dataNormalization($tasks, $guides, "MaHDV");
                        }
                    }

                    return $this->view("guide.index", 
                    [
                        "guides" => $arrayGuide
                    ]
                    );
                }
                else {
                    header("Location: index.php?controller=user&action=index");
                }
            }
            else {
                $guides = $this->guideModel->getAll();
                return $this->view("guide.index", 
                    [
                        "guides" => $guides
                    ]
                );
            }
        }

        public function dataNormalization($list1, $list2, $option)
        {
            $mergedData = [];

            foreach ($list1 as $item1) {
                foreach ($list2 as $item2) {
                    if ($item1->$option == $item2->$option) {
                        $mergedObject = new stdClass();
                        
                        foreach ($item1 as $key => $value) {
                            $mergedObject->$key = $value;
                        }
                        
                        foreach ($item2 as $key => $value) {
                            $mergedObject->$key = $value;
                        }

                        $mergedData[] = $mergedObject;
                    }
                }
            }

            return $mergedData;
        }

        public function detail() {
            $value = $_REQUEST['id'] ?? '';
            $guide = $this->guideModel->getGuide(['*'], "MaHDV", $value);
            $tasks = $this->taskModel->getTask(['*'], "MaHDV", $value);
            $arrayTour = [];
        
            foreach($tasks as $task) {
                $tours = $this->tourModel->getTour(['*'], "MaTour", $task->MaTour);
                if(!empty($tours)) {
                    $arrayTour[] = $this->dataNormalization($tasks, $tours, "MaTour");
                }
            }

            return $this->view("guide.detail",[
                'guide' => $guide,
                'tours' => $arrayTour
            ]);
        }
        
    }