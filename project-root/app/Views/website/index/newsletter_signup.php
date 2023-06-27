<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    $buffer->div_([".signup-wrapper" => true]);
        $buffer->form(\Kwerqy\Ember\com\http\http::build_action_url("website/xnewsletter_signup"));
        $buffer->div_([".row" => true]);
            $buffer->div_([".col-12" => true]);
                $buffer->xitext("per_firstname", false, "Firstname", ["required" => true]);
                $buffer->xitext("per_lastname", false, "Surname", ["required" => true]);
                $buffer->xitext("per_email", false, "Email", ["required" => true, "@type" => "email"]);
            $buffer->_div();
        $buffer->_div();

        $buffer->div_([".row" => true]);
            $buffer->div_([".col-12" => true]);
                $buffer->submit_button(["label" => "Subscribe", ".w-100 mb-2" => true]);
            $buffer->_div();
        $buffer->_div();
    $buffer->_div();

});