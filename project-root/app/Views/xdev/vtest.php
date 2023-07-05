<?php




\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */


    $email = \Kwerqy\Ember\com\email\email::make();
    $email->set_to("ryno@liquidedge.co.za");
//    $email->set_to("ryno888@gmail.com");
    $email->set_from("admin@patriotrsa.co.za", "PatriotRSA");
    $email->set_subject("test Subject");
    $email->set_body(function(){
        $buffer = \Kwerqy\Ember\com\ui\ui::make()->buffer();
        $buffer->p(["*" => "Dear Admin"]);
        $buffer->p(["*" => "You have received a new contact request from your website."]);
        $buffer->p(["*" => "Here are the details"]);

        $buffer->p(["*" => "Kind Regards"]);
        $buffer->p(["*" => getenv("ember.name"). " Team"]);
        return $buffer->build();
    });
    $email->send();


//    ini_set('error_log', WRITEPATH."logs/log-".\Kwerqy\Ember\com\date\date::strtodate().".log");
//    trigger_error("Error message here", E_USER_ERROR);


//    $email = \Config\Services::email();
//     $email->sendMultipart = false;
//     $email->setMailType("html");
//
//     $email->setFrom(getenv("ember.email.from"), getenv("ember.name").' - Contact Request');
//     $email->setTo("ryno@liquidedge.co.za");
//     $email->setSubject('Contact Request From Website');
//
//     $buffer = \Kwerqy\Ember\com\ui\ui::make()->buffer();
//     $buffer->p(["*" => "Dear Admin"]);
//     $buffer->p(["*" => "You have received a new contact request from your website."]);
//     $buffer->p(["*" => "Here are the details"]);
//
//     $buffer->p(["*" => "Kind Regards"]);
//     $buffer->p(["*" => getenv("ember.name"). " Team"]);
//     $email->setMessage( $buffer->build());
//
//     $result =  $email->send();

//    $person = core::dbt("person");

//    \Kwerqy\Ember\com\factory\coder\codeIgniter\install_views::make()->build();
//    \Kwerqy\Ember\com\factory\coder\codeIgniter\install_dbs::make()->build();

//    \Kwerqy\Ember\com\factory\coder\codeIgniter\install_common_php::make()->build();

//    if(!\Kwerqy\Ember\Ember::is_installed()){
//        file_put_contents(DIR_ROOT.".kwerqy_install_log", Kwerqy\Ember\com\date\date::strtodatetime());
//    }else{
//    }

//    display(\Kwerqy\Ember\Ember::is_installed(), true);


//    $dbt = \Kwerqy\Ember\Ember::dbt("acl_role");
//    $dbt = \Kwerqy\Ember\Ember::dbt("person");
//    helper('acl_role');
//    include(DIR_APP."/Libraries/db/acl_role.php");
//    $db = new \db\acl_role();
//    $buffer->form("xryno/xtest");
//    $buffer->section_([".banner-wrapper" => true, ]);
//        $buffer->div_([".container" => true]);
//            $buffer->div_([".row" => true]);
//                $buffer->div_([".col" => true]);
//                    $buffer->xheader(1, "Test");
//                $buffer->_div();
//                $buffer->div_([".col" => true]);
//                    $buffer->submit_button();
//                $buffer->_div();
//            $buffer->_div();
//        $buffer->_div();
//    $buffer->_section();

});

