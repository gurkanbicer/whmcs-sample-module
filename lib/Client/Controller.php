<?php
namespace WHMCS\Module\Addon\SampleModule\Client;
use WHMCS\Database\Capsule;

    class Controller {

        protected $templateDir = "Client/";

        public function __construct() {}

        private function redirect($url) {
            header("Location: $url");
            exit;
        }

        public function index($vars) {
            return [
                'pagetitle' => 'WHMCS Sample Module',
                'breadcrumb' => [
                    'index.php?m=samplemodule' => 'WHMCS Sample Module',
                ],
                'templatefile' => $this->templateDir . 'index',
                'requirelogin' => false,
                'forcessl' => false,
                'vars' => [
                    'modulelink' => $vars['modulelink'],
                    'module' => $vars['module'],
                    'version' => $vars['version'],
                ]
            ];
        }

    }