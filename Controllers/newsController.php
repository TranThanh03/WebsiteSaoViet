<?php 
    class NewsController extends BaseController {
        public function index() {
            return $this->view("news.index");
        }

        public function newsDetail() {
            return $this->view("news.newsDetail");
        }
    }