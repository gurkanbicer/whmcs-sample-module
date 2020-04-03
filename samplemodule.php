<?php

use WHMCS\Database\Capsule;
use WHMCS\Module\Addon\SampleModule\Admin\AdminDispatcher;
use WHMCS\Module\Addon\SampleModule\Client\ClientDispatcher;

if (!defined("WHMCS")) die("This file cannot be accessed directly");

function samplemodule_config()
{
    return [
        'name' => 'WHMCS Sample Module',
        'description' => 'This module is a skeleton module for who want to develop a WHMCS module.',
        'author' => 'Your name goes here...',
        'language' => 'english',
        'version' => '1.0.0',
        'fields' => [
            'Text Field Name' => [
                'FriendlyName' => 'Text Field Name',
                'Type' => 'text',
                'Size' => '25',
                'Default' => 'Default value',
                'Description' => 'Description goes here',
            ],
            'Password Field Name' => [
                'FriendlyName' => 'Password Field Name',
                'Type' => 'password',
                'Size' => '25',
                'Default' => '',
                'Description' => 'Enter secret value here',
            ],
            'Checkbox Field Name' => [
                'FriendlyName' => 'Checkbox Field Name',
                'Type' => 'yesno',
                'Description' => 'Tick to enable',
            ],
            'Dropdown Field Name' => [
                'FriendlyName' => 'Dropdown Field Name',
                'Type' => 'dropdown',
                'Options' => [
                    'option1' => 'Display Value 1',
                    'option2' => 'Second Option',
                    'option3' => 'Another Option',
                ],
                'Default' => 'option2',
                'Description' => 'Choose one',
            ],
            'Radio Field Name' => [
                'FriendlyName' => 'Radio Field Name',
                'Type' => 'radio',
                'Options' => 'First Option,Second Option,Third Option',
                'Default' => 'Third Option',
                'Description' => 'Choose your option!',
            ],
            'Textarea Field Name' => [
                'FriendlyName' => 'Textarea Field Name',
                'Type' => 'textarea',
                'Rows' => '3',
                'Cols' => '60',
                'Default' => 'A default value goes here...',
                'Description' => 'Freeform multi-line text input field',
            ],
        ]
    ];
}

function samplemodule_activate()
{
    try {
        Capsule::schema()
            ->create(
                'mod_samplemodule', function ($table) {
                    $table->increments('id');
                    $table->string('name');
                    $table->string('surname');
                    $table->string('age');
                }
            );

        return [
            'status' => 'success',
            'description' => 'Module activated!',
        ];
    } catch (\Exception $e) {
        return [
            'status' => "error",
            'description' => 'Unable to create mod_samplemodule: ' . $e->getMessage(),
        ];
    }
}

function samplemodule_deactivate()
{
    try {
        Capsule::schema()->dropIfExists('mod_samplemodule');

        return [
            'status' => 'success',
            'description' => 'Module deactivated!',
        ];
    } catch (\Exception $e) {
        return [
            "status" => "error",
            "description" => "Unable to drop mod_samplemodule: {$e->getMessage()}",
        ];
    }
}

function samplemodule_output($vars)
{
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "index";
    $dispatcher = new AdminDispatcher();
    return $dispatcher->dispatch($action, $vars);
}

function samplemodule_sidebar($vars)
{
    return <<<HTML
<p>Sidebar output HTML goes here</p>
HTML;
}

function samplemodule_clientarea($vars)
{
    $action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : "index";
    $dispatcher = new ClientDispatcher();
    return $dispatcher->dispatch($action, $vars);
}