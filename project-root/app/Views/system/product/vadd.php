<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function ($buffer, $controller, $view) {

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */

    $product = \Kwerqy\Ember\Ember::dbt("product")->get_fromdefault();

    $buffer->form("product/xadd");

    $buffer->div_([".container-fluid" => true,]);
        $buffer->div_([".row mb-3" => true,]);
            $buffer->div_([".col-12" => true,]);
                $buffer->submit_button();
            $buffer->_div();
        $buffer->_div();

        $buffer->div_([".row" => true,]);
            $buffer->div_([".col-12 col-md-6" => true,]);
                $buffer->itext("Title", "pro_name", $product->pro_name);
                $buffer->icurrency("Price", "pro_price", $product->pro_price, ["@min" => 0]);
            $buffer->_div();
        $buffer->_div();
    $buffer->_div();

});
