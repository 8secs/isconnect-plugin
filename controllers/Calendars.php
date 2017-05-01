<?php namespace Istheweb\Connect\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Calendars Back-end Controller
 */
class Calendars extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Istheweb.Connect.Behaviors.DeleteList'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Istheweb.Connect', 'connect', 'calendars');
    }
}