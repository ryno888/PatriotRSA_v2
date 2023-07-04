<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    $quote_wizard = \sessions\quote_wizard::make();

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
                            $buffer->span(["*" => "{$quote_item["cri_supplier"]} - {$quote_item["cri_code"]}", "text-gray" => true]);
                        $buffer->_div();
                        $buffer->div_([".col-auto" => true]);
                            $buffer->xicon("fa-times", ["!click" => \Kwerqy\Ember\com\js\js::ajax(site_url("website/xremove_quote_item"), [
                                "*data" => ["index" => $quote_item["index"]],
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

    $buffer->div_([".row mt-4" => true]);
        $buffer->div_([".col-12" => true]);
            $buffer->xbutton("Add Item", "app.browser.popup('".\Kwerqy\Ember\com\http\http::build_action_url("website/catalogue/add_quote_item")."', {title:'Add Item', width:'modal-md', id:'add_quote_item'})", [".btn-primary w-100" => true]);
        $buffer->_div();
    $buffer->_div();
});