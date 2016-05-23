<?php namespace Siada\Sendgrid\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use October\Rain\Auth\Models\User;
use SendGrid;
use Siada\Deals\Models\Deal;

/**
 * Users Back-end Controller
 */
class Users extends Controller
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

        BackendMenu::setContext('Siada.Sendgrid', 'sendgrid', 'users');
    }

    public function onSendEmails()
    {
        $request = post();

        //$sendgrid = new SendGrid('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');
        $sendgrid = new SendGrid('oleksandr', 'User1234');
        $templateId = 'aac473b4-57b1-42b4-b7db-787e41d66a22';

        if ($request['checked']) {
            foreach ($request['checked'] as $item) {

                $users = User::find($item);

                $user_email = $users->email;
                $created_at = Carbon::parse($users->created_at)->format('F jS, Y');

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


                //GET DEALS
                $deal = Deal::orderBy(DB::raw('RAND()'))->take(1);

                if ($deal->exists()) {
                    $email
                        ->addSubstitution(":deal_name", [$deal->get()->first()->name])
                        ->addSubstitution(":deal_desc", [$deal->get()->first()->description])
                        ->addSubstitution(":deal_address", [$deal->get()->first()->address])
                        ->addSubstitution(":deal_text", [$deal->get()->first()->text])
                    ;
                } else {

                    $email
                        ->addSubstitution(":deal_name", ['No data found in DB']) //please use Deals plugin, Admin area.
                        ->addSubstitution(":deal_desc", ['No data found in DB']) //please use Deals plugin, Admin area.
                        ->addSubstitution(":deal_address", ['No data found in DB']) //please use Deals plugin, Admin area.
                        ->addSubstitution(":deal_text", ['No data found in DB']) //please use Deals plugin, Admin area.
                    ;
                }

                $sendgrid->send($email);
            }
        }
    }
}