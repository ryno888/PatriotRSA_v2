<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    $buffer->div_([".add-quote-item-wrapper" => true]);
        $buffer->form("website/xadd_quote_item");
        $buffer->div_([".row" => true]);
            $buffer->div_([".col-12" => true]);

                $pro_supplier = [];
                $pro_supplier[null] = "-- Not Selected --";
                $pro_supplier["Amrod Collection"] = "Amrod Collection";
                $pro_supplier["Barron Collection"] = "Barron Collection";
                $pro_supplier["Headwear24 Collection"] = "Headwear24 Collection";
                $pro_supplier["Proactive Collection"] = "Proactive Collection";
                $buffer->xiselect("qui_supplier", $pro_supplier, false, "Supplier", ["required" => true, ".mb-2" => true, "label_col" => 12]);
                $buffer->xitext("qui_code", false, "Product Code", ["required" => true, ".mb-2" => true, "label_col" => 12]);

                $buffer->div_([".form-group mb-2" => true]);
                    $buffer->label(["@for" => "qui_qty", "*" => "Quantity"]);
                    $buffer->div_();
                        $buffer->xicounter("qui_qty", false, ["min" => 1, "disabled_input" => false]);
                    $buffer->_div();
                $buffer->_div();

                $buffer->xitextarea("qui_note", false, "Notes", ["required" => true, ".mb-2" => true, "label_col" => 12]);
            $buffer->_div();
        $buffer->_div();

        $buffer->div_([".row mt-4" => true]);
            $buffer->div_([".col-12" => true]);
                $buffer->submit_button(["label" => "Add Item", ".w-100 mb-2" => true]);
            $buffer->_div();
        $buffer->_div();
    $buffer->_div();

});