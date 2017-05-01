<?php namespace Istheweb\Connect\Controllers;

use BackendMenu;
use Backend\Classes\Controller;



/**
 * Subscribers Back-end Controller
 */
class Subscribers extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController',
        'Istheweb.Connect.Behaviors.DeleteList',
        'Backend\Behaviors\ImportExportController',
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';
    public $importExportConfig = 'config_migration.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Istheweb.Connect', 'connect', 'subscribers');
    }


}