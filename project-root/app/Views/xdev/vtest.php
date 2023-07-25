<?php




\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */


    display(\Kwerqy\Ember\com\num\num::format_bytes(50000));
    display(\Kwerqy\Ember\com\num\num::format_amount(50000));
    display(\Kwerqy\Ember\com\num\num::currency(1234.56), true);


    $product_arr = \Kwerqy\Ember\Ember::dbt("product")->get_fromdb("1=1", ["multiple" => true]);
    foreach ($product_arr as $product){
        $product->pro_name = str_replace('"', "", $product->pro_name);
        $product->update();
    }

//    $mock_data_arr = explode("\n", $mock_data);
//    foreach ($mock_data_arr as $mock_data){
//
//        $product = \Kwerqy\Ember\Ember::dbt("product")->get_fromdefault();
//        $product->pro_name = str_replace(["\n"], "", $mock_data);
//        $product->pro_is_published = 1;
//        $product->pro_price = rand(500, 800);
//        $product->insert();
//
//    }
    
//    $role = \Kwerqy\Ember\com\solid_classes\helper::make()->get_from_constant("USER_ROLE_DEV");
//
//    $sql = \Kwerqy\Ember\com\db\sql\select::make();
//    $sql->select("person_role.*");
//    $sql->from("person_role");
//    $sql->left_join("acl_role", "pel_ref_acl_role = acl_id");
//    $sql->and_where("pel_ref_person = ".dbvalue(2));
//    $sql->and_where("acl_code = ".dbvalue($role->get_code()));
//
//    display($sql->build());

//    $sql = \Kwerqy\Ember\com\db\sql\select::make();
//    $sql->select("person.*");
//    $sql->from("person");
//    $sql->and_where("1=1");
//
//    $person = \Kwerqy\Ember\Ember::dbt("person")->get_fromsql($sql);
//    display($person->has_role(USER_ROLE_DEV));

//    \Kwerqy\Ember\Ember::dbt("acl_role")->install_defaults();
//    \Kwerqy\Ember\Ember::dbt("person")->install_defaults();


//    $php_to_db = \Kwerqy\Ember\com\db\coder\php_to_db::make();
//
//    display($php_to_db->get_create_sql("product"));


//    $email = \Kwerqy\Ember\com\email\email::make();
//    $email->set_to("ryno@liquidedge.co.za");
////    $email->set_to("ryno888@gmail.com");
//    $email->set_from("admin@patriotrsa.co.za", "PatriotRSA");
//    $email->set_subject("test Subject");
//    $email->set_body(function(){
//        $buffer = \Kwerqy\Ember\com\ui\ui::make()->buffer();
//        $buffer->p(["*" => "Dear Admin"]);
//        $buffer->p(["*" => "You have received a new contact request from your website."]);
//        $buffer->p(["*" => "Here are the details"]);
//
//        $buffer->p(["*" => "Kind Regards"]);
//        $buffer->p(["*" => getenv("ember.name"). " Team"]);
//        return $buffer->build();
//    });
//    $email->send();


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

