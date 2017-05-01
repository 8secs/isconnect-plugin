<?php namespace Istheweb\Connect\Controllers;

use BackendMenu;
use Backend\Classes\Controller;

/**
 * Connect Back-end Controller
 */
class Connect extends Controller
{

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Istheweb.Connect', 'connect');
    }

    // METODOS
    public function index(){
        return '<div class="layout-relative"> 
                    <div class="layout"> 
                        <div class="layout-row"> 
                            <div class="layout"> 
                                <div class="layout-cell oc-bg-logo"> 
                                    <H1>Bienvenidos a Connect</H1>
                                </div> 
                            </div> 
                        </div> 
                    </div> 
                </div>';
    }
}