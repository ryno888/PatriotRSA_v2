<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    $buffer->div_([".add-quote-item-wrapper" => true]);
        $buffer->form(site_url(""));
        $buffer->div_([".row" => true]);
            $buffer->div_([".col-12" => true]);


                $pro_supplier = [];
                $pro_supplier[null] = "-- Not Selected --";
                $pro_supplier["Amrod Collection"] = "Amrod Collection";
                $pro_supplier["Barron Collection"] = "Barron Collection";
                $pro_supplier["Headwear24 Collection"] = "Headwear24 Collection";
                $pro_supplier["Proactive Collection"] = "Proactive Collection";
                $buffer->xiselect("cri_supplier", $pro_supplier, false, "Supplier", ["required" => true, ".mb-2" => true, "label_col" => 12]);
                $buffer->xitext("cri_code", false, "Product Code", ["required" => true, ".mb-2" => true, "label_col" => 12]);

                $buffer->div_([".form-group mb-2" => true]);
                    $buffer->label(["@for" => "cri_qty", "*" => "Quantity"]);
                    $buffer->div_();
                        $buffer->xicounter("cri_qty", false, ["min" => 1]);
                    $buffer->_div();
                $buffer->_div();

                $buffer->xitextarea("cri_note", false, "Notes", ["required" => true, ".mb-2" => true, "label_col" => 12]);
            $buffer->_div();
        $buffer->_div();

        $buffer->div_([".row mt-4" => true]);
            $buffer->div_([".col-12" => true]);
                $buffer->submit_button(["label" => "Subscribe", ".w-100 mb-2" => true]);
            $buffer->_div();
        $buffer->_div();
    $buffer->_div();

});