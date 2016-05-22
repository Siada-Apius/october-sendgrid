<?php namespace Siada\Sendgrid;

use Backend;
use System\Classes\PluginBase;

/**
 * sendgrid Plugin Information File
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
            'name'        => 'sendgrid',
            'description' => 'No description provided yet...',
            'author'      => 'siada',
            'icon'        => 'icon-leaf'
        ];
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
            'Siada\Sendgrid\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'siada.sendgrid.some_permission' => [
                'tab' => 'sendgrid',
                'label' => 'Some permission'
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
//        return []; // Remove this line to activate

        return [
            'sendgrid' => [
                'label'       => 'sendgrid',
                'url'         => Backend::url('siada/sendgrid/users'),
                'icon'        => 'icon-leaf',
                'permissions' => ['siada.sendgrid.*'],
                'order'       => 500,
            ],
        ];
    }

}
