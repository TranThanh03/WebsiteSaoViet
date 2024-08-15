<?php
    class BaseController {
        const VIEW_FORDER_NAME = 'Views';
        const MODEL_FORDER_NAME = 'Models';
        
        
        protected function view($viewPath, array $data = []) {
            foreach ($data as $key => $value) {
                $$key = $value;
            }
            require(self::VIEW_FORDER_NAME .'/'. str_replace('.', '/', $viewPath).'.php');
        }

        protected function model($modelPath) {
            require(self::MODEL_FORDER_NAME .'/'. str_replace('.', '/', $modelPath).'.php');
        }
    }
?>