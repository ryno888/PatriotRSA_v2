<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */

    //evaluate
    if(!$controller->quote_nr) \Kwerqy\Ember\com\http\http::go_error(ERROR_CODE_404);

    //see if quote exists
    $quote_wizard = \sessions\quote_wizard::make();
    $result = $quote_wizard->load($controller->quote_nr);

    if(!$result) \Kwerqy\Ember\com\http\http::go_error(ERROR_CODE_404);

    $buffer->xspace(100);

    $buffer->div_([".container mh-60 my-4" => true]);
        $buffer->div_([".row" => true]);
            $buffer->div_([".col-12" => true]);
                $buffer->xheader(2, "#{$controller->quote_nr}", false, [".text-center" => true]);
            $buffer->_div();
        $buffer->_div();

        $buffer->div_([".row" => true]);
            $buffer->div_([".col-12 col-md-6" => true]);
                $buffer->div_([".row" => true]);
                    $buffer->div_([".col-12 mt-5" => true]);
                        $buffer->xheader(5, "My Details");
                        $buffer->hr();
                        $buffer->xitext("per_firstname", false, "First Name", ["required" => true, "label_col" => 12, ".mb-2" => true]);
                        $buffer->xitext("per_lastname", false, "Surname", ["required" => true, "label_col" => 12, ".mb-2" => true]);
                        $buffer->xitext("per_contactnr", false, "Contact Number", ["required" => true, "label_col" => 12, ".mb-2" => true]);
                    $buffer->_div();

                    $buffer->div_([".col-12 mt-5" => true]);
                        $buffer->xheader(5, "Company Details");
                        $buffer->hr();
                        $buffer->xitext("per_company_name", false, "Company Name", ["required" => true, "label_col" => 12, ".mb-2" => true]);
                        $buffer->xitext("per_tellnr_work", false, "Contact Number", ["required" => true, "label_col" => 12, ".mb-2" => true]);
                        $buffer->xitextarea("per_address_shipping", false, "Shipping Address", ["required" => true, "label_col" => 12, ".mb-2" => true]);
                        $buffer->xitextarea("per_address_billing", false, "Billing Address", ["required" => true, "label_col" => 12, ".mb-2" => true]);
                    $buffer->_div();
                $buffer->_div();
            $buffer->_div();
        $buffer->_div();

    $buffer->_div();

    $buffer->xspace(50);

});