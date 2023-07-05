<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    $link = \Kwerqy\Ember\Ember::$request->get_get("link", TYPE_STRING);
    $link = urldecode($link);

    $buffer->div_([".row" => true]);
        $buffer->div_([".col-12" => true]);
            $buffer->iframe([
                "@src" => $link,
                "@title" => "W3Schools Free Online Web Tutorials",
                "#width" => "100%",
                "#height" => "90vh",
            ]);
        $buffer->_div();
    $buffer->_div();
});