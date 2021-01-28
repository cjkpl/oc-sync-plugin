<?php namespace Cjkpl\Sync;

use Backend;
use System\Classes\PluginBase;

/**
 * Sync Plugin Information File
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
            'name'        => 'Sync',
            'description' => 'No description provided yet...',
            'author'      => 'Cjkpl',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

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
            'Cjkpl\Sync\Components\MyComponent' => 'myComponent',
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
            'cjkpl.sync.some_permission' => [
                'tab' => 'Sync',
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
        return []; // Remove this line to activate

        return [
            'sync' => [
                'label'       => 'Sync',
                'url'         => Backend::url('cjkpl/sync/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['cjkpl.sync.*'],
                'order'       => 500,
            ],
        ];
    }
}
