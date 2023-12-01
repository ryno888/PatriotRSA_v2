<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function ($buffer, $controller, $view) {

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */

    $buffer->div_([".container-fluid" => true]);
        $buffer->div_([".row" => true]);
            $buffer->div_([".col" => true]);
                $manage = \Kwerqy\Ember\com\ui\ui::make()->vmanage();
                $manage->add_link("Back To List", false, ["!click" => "document.location='".site_url("sysproduct/vlist")."'", "icon" => "fa-chevron-left"]);
                $manage->add_link("General Details", site_url("sysproduct/vedit/id/{$controller->id}"), [".active" => true]);
                $manage->add_link("Product Assets", site_url("sysproduct/vadd/id/{$controller->id}"));
                $manage->add_link("Stats", "#");
                $buffer->add($manage->build());
            $buffer->_div();
        $buffer->_div();
    $buffer->_div();
    


});
