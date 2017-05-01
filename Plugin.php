<?php namespace Istheweb\Connect;

use Backend;
use DB;
use App;
use Illuminate\Foundation\AliasLoader;
use Lang;
use Event;
use System\Classes\PluginBase;

/**
 * Connect Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'istheweb.connect::lang.plugin.name',
            'description' => 'istheweb.connect::lang.plugin.description',
            'author'      => 'Istheweb',
            'icon'        => 'icon-connectdevelop'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
        // Register ServiceProviders
        App::register('Maknz\Slack\Laravel\ServiceProvider');
        // Register aliases
        $alias = AliasLoader::getInstance();
        $alias->alias('Slack', 'Maknz\Slack\Laravel\Facade');
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Istheweb\Connect\Components\MyComponent' => 'myComponent',
        ];
    }

    // FORM WIDGETS
    public function registerFormWidgets(){
        return [
            'Istheweb\Connect\FormWidgets\Address' => [
                'label' => 'Address',
                'code'  => 'istheweb_connect_address'
            ],
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'istheweb.connect.events' => [
                'tab'   => 'istheweb.connect::lang.menu.connections',
                'label' => 'istheweb.connect::lang.menu.events',
            ],
            'istheweb.connect.contacts' => [
                'tab'   => 'istheweb.connect::lang.menu.connections',
                'label' => 'istheweb.connect::lang.menu.contacts',
            ],
            'istheweb.connect.inboxes' => [
                'tab'   => 'istheweb.connect::lang.menu.connections',
                'label' => 'istheweb.connect::lang.menu.inboxes',
            ],
            'istheweb.connect.subscribers' => [
                'tab'   => 'istheweb.connect::lang.menu.connections',
                'label' => 'istheweb.connect::lang.menu.subscribers',
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {

        return [
            'connect' => [
                'label'       => 'istheweb.connect::lang.plugin.name',
                'url'         => Backend::url('istheweb/connect/connect'),
                'icon'        => 'icon-connectdevelop',
                'permissions' => ['istheweb.connect.*'],
                'order'       => 400,

                'sideMenu'    => [
                    'companies'       => [
                        'label'       => 'istheweb.connect::lang.menu.companies',
                        'url'         => Backend::url('istheweb/connect/companies'),
                        'icon'        => 'icon-bank',
                        'permissions' => ['istheweb.connect.contacts']
                    ],
                    'contacts'        => [
                        'label'       => 'istheweb.connect::lang.menu.contacts',
                        'url'         => Backend::url('istheweb/connect/contacts'),
                        'icon'        => 'icon-user',
                        'permissions' => ['istheweb.connect.contacts']
                    ],
                    'events'          => [
                        'label'       => 'istheweb.connect::lang.menu.events',
                        'url'         => Backend::url('istheweb/connect/events'),
                        'icon'        => 'icon-calendar-o',
                        'permissions' => ['istheweb.connect.events']
                    ],
                    'inboxes'         => [
                        'label'       => 'istheweb.connect::lang.menu.inboxes',
                        'url'         => Backend::url('istheweb/connect/inboxes'),
                        'icon'        => 'icon-inbox',
                        'counter'     => ($i = DB::table('istheweb_connect_inboxes')->where('status', 0)->count()) ? $i : null,
                        'permissions' => ['istheweb.connect.inboxes'],
                    ],
                    'subscribers'     => [
                        'label'       => 'istheweb.connect::lang.menu.subscribers',
                        'url'         => Backend::url('istheweb/connect/subscribers'),
                        'icon'        => 'icon-rss',
                        'permissions' => ['istheweb.connect.subscribers']
                    ],
                ]
            ],
        ];
    }

    // SETTINGS
    public function registerSettings(){
        return [
            /*'slack'           => [
                'label'       => 'istheweb.connect::lang.slack',
                'description' => 'istheweb.connect::lang.slack_description',
                'icon'        => 'icon-slack',
                'class'       => 'Istheweb\Connect\Models\SlackSettings',
                'category'    => 'istheweb.connect::lang.manage',
                'order'       => 101,
                'keywords'    => 'crm customer relationship management slack'
            ],*/
            'mail_preference' => [
                'label'       => 'istheweb.connect::lang.mail_preference',
                'description' => 'istheweb.connect::lang.mail_preference_description',
                'icon'        => 'icon-envelope',
                'class'       => 'Istheweb\Connect\Models\MailSettings',
                'category'    => 'istheweb.connect::lang.manage',
                'order'       => 102,
                'keywords'    => 'crm customer relationship management mail'
            ],
            'company'         => [
                'label'       => 'istheweb.connect::lang.company',
                'description' => 'istheweb.connect::lang.company_description',
                'icon'        => 'icon-building-o',
                'class'       => 'Istheweb\Connect\Models\CompanySettings',
                'category'    => 'istheweb.connect::lang.manage',
                'order'       => 103,
                'keywords'    => 'crm customer relationship management company'
            ],
            'bank'         => [
                'label'       => 'istheweb.connect::lang.bank_accounts',
                'description' => 'istheweb.connect::lang.bank_accounts_description',
                'icon'        => 'icon-money',
                'class'       => 'Istheweb\Connect\Models\BankAccountSettings',
                'category'    => 'istheweb.connect::lang.manage',
                'order'       => 104,
                'keywords'    => 'crm customer relationship management company'
            ]
        ];
    }

}
