<?php namespace Siada\Deals\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Deals Back-end Controller
 */
class Deals extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Siada.Deals', 'deals', 'deals');
    }
}