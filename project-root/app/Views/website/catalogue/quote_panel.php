<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){
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

    $buffer->div_([".row justify-content-center" => true]);
        $buffer->div_([".col-12 col-lg-10 text-center fs-5" => true]);
            $buffer->span(["*" => "No items added yet", "text-gray" => true]);
        $buffer->_div();
    $buffer->_div();

    $buffer->div_([".row" => true]);
        $buffer->div_([".col-12" => true]);
            $buffer->hr();
        $buffer->_div();
    $buffer->_div();

    $buffer->div_([".row mt-4" => true]);
        $buffer->div_([".col-12" => true]);
            $buffer->xbutton("Add Item", "app.browser.popup('".\Kwerqy\Ember\com\http\http::build_action_url("website/catalogue/add_quote_item")."', {title:'Add Item', width:'modal-md'})", [".btn-primary w-100" => true]);
        $buffer->_div();
    $buffer->_div();
});