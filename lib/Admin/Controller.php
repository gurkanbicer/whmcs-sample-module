<?php

namespace WHMCS\Module\Addon\SampleModule\Admin;
use WHMCS\Database\Capsule;

    class Controller {

        protected $smarty;

        public function __construct() {
            $this->setSmarty();
        }

        private function view($view = 'index') {
            $this->smarty->display($view . '.tpl');
        }

        private function setSmarty() {
            $this->smarty = new \Smarty();
            $this->smarty->template_dir = str_ireplace('lib/Admin', '', __DIR__) . 'templates/Admin/';
            $this->smarty->compile_dir = str_ireplace('lib/Admin', '', __DIR__) . 'templates_c/';
        }

        private function set($key, $value) {
            $this->smarty->assign($key, $value);
        }

        private function redirect($url) {
            header("Location: $url");
            exit;
        }

        public function index($vars) {
            $this->set('module', $vars['module']);
            $this->set('modulelink', $vars['modulelink']);
            $this->set('version', $vars['version']);
            $this->set('action', __FUNCTION__);

            $this->view('index');
        }

    }