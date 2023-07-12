<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */

    $quote_wizard = \sessions\quote_wizard::make();

    $buffer->form("website/xverify_quote_email");

    $buffer->div_([".row justify-content-center py-4" => true]);
        $buffer->div_([".col-12 col-lg-10 text-center fs-7" => true]);
            $buffer->span(["*" => "Here you can add items from different catalogues to build up your quote.", "text-gray" => true]);
        $buffer->_div();
    $buffer->_div();

    $buffer->div_([".row" => true]);
        $buffer->div_([".col-12" => true]);
            $buffer->hr();
        $buffer->_div();
    $buffer->_div();

    if($quote_wizard->quote_item_arr){
        foreach ($quote_wizard->quote_item_arr as $quote_item){
            $buffer->div_([".row align-items-center justify-content-center" => true]);
                $buffer->div_([".col-11 fs-7 bg-light py-3 rounded-3 mb-2" => true]);
                    $buffer->div_([".row align-items-center" => true]);
                        $buffer->div_([".col" => true]);
                            $buffer->div(["*" => $quote_item->qui_supplier, ".font-weight-bold fs-9" => true]);
                            $buffer->span(["*" => "{$quote_item->qui_code} ({$quote_item->qui_qty})", "text-gray" => true]);
                        $buffer->_div();
                        $buffer->div_([".col-auto" => true]);
                            $buffer->xicon("fa-edit", ["!click" => "app.browser.popup('".\Kwerqy\Ember\com\http\http::build_action_url("website/catalogue/edit_quote_item/index/{$quote_item->index}")."', {title:'Edit Item', width:'modal-md', id:'edit_quote_item'})", ".cursor-pointer me-2" => true]);
                            $buffer->xicon("fa-times", ["!click" => \Kwerqy\Ember\com\js\js::ajax(site_url("website/xremove_quote_item"), [
                                "*data" => ["index" => $quote_item->index],
                            ]), ".cursor-pointer" => true]);
                        $buffer->_div();
                    $buffer->_div();
                $buffer->_div();
            $buffer->_div();
        }
    }else{
        $buffer->div_([".row justify-content-center" => true]);
            $buffer->div_([".col-12 col-lg-10 text-center fs-5" => true]);
                $buffer->span(["*" => "No items added yet", "text-gray" => true]);
            $buffer->_div();
        $buffer->_div();
    }

    $buffer->div_([".row" => true]);
        $buffer->div_([".col-12" => true]);
            $buffer->hr();
        $buffer->_div();
    $buffer->_div();

    $buffer->div_([".row my-3" => true]);
        $buffer->div_([".col-12" => true]);
            $buffer->xbutton("Add Item", "app.browser.popup('".\Kwerqy\Ember\com\http\http::build_action_url("website/catalogue/add_quote_item")."', {title:'Add Item', width:'modal-md', id:'add_quote_item'})", [".btn-primary btn-primary-gradient w-100 py-2" => true]);
        $buffer->_div();
    $buffer->_div();

    if($quote_wizard->quote_item_arr){

        $buffer->div_([".row" => true]);
            $buffer->div_([".col-12" => true]);
                $buffer->hr();
            $buffer->_div();
        $buffer->_div();

        $buffer->div_([".row mt-2" => true]);
            $buffer->div_([".col-12" => true]);
                $buffer->xmessage("Please verify your email address before you continue with the quote.");
                $buffer->itext("Email Address", "quo_email", $quote_wizard->quo_email, ["required" => true, "limit" => "email", "label_col" => 12]);
            $buffer->_div();
        $buffer->_div();

        $buffer->div_([".row mt-2" => true]);
            $buffer->div_([".col-12 d-flex" => true]);
                $buffer->xbutton("Clear Quote", \Kwerqy\Ember\com\js\js::ajax(site_url("website/xclear_quote"), ["*confirm" => true]), [".btn-secondary btn-secondary-gradient w-100 me-1 py-2" => true]);
                $buffer->submit_button(["label" => "Verify Email Now", ".btn-primary btn-primary-gradient w-100 py-2" => true]);
            $buffer->_div();
        $buffer->_div();

    }
});