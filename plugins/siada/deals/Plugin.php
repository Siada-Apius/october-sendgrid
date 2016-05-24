<?php namespace Siada\Deals;

use Backend;
use System\Classes\PluginBase;

/**
 * deals Plugin Information File
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
            'name'        => 'Deals',
            'description' => 'Manage deals',
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
            'Siada\Deals\Components\MyComponent' => 'myComponent',
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
            'siada.deals.some_permission' => [
                'tab' => 'deals',
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
        return [
            'deals' => [
                'label'       => 'Deals',
                'url'         => Backend::url('siada/deals/deals'),
                'icon'        => 'icon-diamond',
                'permissions' => ['siada.deals.*'],
                'order'       => 500,
            ],
        ];
    }

}
