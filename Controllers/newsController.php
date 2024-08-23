<?php 
    class NewsController extends BaseController {
        public function index() {
            return $this->view("news.index");
        }

        public function detail() {
            return $this->view("news.detail");
        }
    }