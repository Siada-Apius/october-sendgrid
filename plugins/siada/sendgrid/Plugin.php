<?php namespace Siada\Sendgrid;

use Event;
use Backend;
use Carbon\Carbon;
use October\Rain\Auth\Models\User;
use SendGrid;
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
            'name'        => 'Sendgrid',
            'description' => 'Send mails using the SendGrid API',
            'author'      => 'Siada',
            'icon'        => 'icon-at'
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
                'label'       => 'Sendgrid',
                'url'         => Backend::url('siada/sendgrid/users'),
                'icon'        => 'icon-at',
                'permissions' => ['siada.sendgrid.*'],
                'order'       => 500,
            ],
        ];
    }

    public function boot()
    {
        Event::listen('rainlab.user.registration', function($user) {
            $sendgrid = new SendGrid('oleksandr', 'User1234');
            $templateId = 'aac473b4-57b1-42b4-b7db-787e41d66a22';

            $user_email = $user->email;
            $created_at = Carbon::parse($user->created_at)->format('F jS, Y');

            $email = new SendGrid\Email();
            $email
                ->addTo($user_email)
                ->setFrom('octobe.sendgrid@test.com')
                ->setSubject('October/SendGrid Subject')
                ->setText('Hello World!')
                ->setHtml('<strong>Hello World!</strong>')
                ->setTemplateId($templateId)
                ->addSubstitution(":user_email", [$user_email])
                ->addSubstitution(":created_at", [$created_at])
            ;

            $sendgrid->send($email);
        });
    }
}
