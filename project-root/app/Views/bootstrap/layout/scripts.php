<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ciiewiew
     */
    
    $buffer->add(\Kwerqy\Ember\com\compiler\assets::make(["section" => "system"])->run()->get_stream_js());
    $buffer->xdebug();
    
});

