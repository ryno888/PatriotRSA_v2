<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    $index = \Kwerqy\Ember\com\str\str::generate_id();
    $quote_wizard = \sessions\quote_wizard::make();

    $buffer->div_([".add-quote-item-wrapper" => true]);
        $buffer->form("website/xadd_quote_item");
        $buffer->div_([".row" => true]);
            $buffer->div_([".col-12" => true]);
                $buffer->xihidden("index", $index);

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

                $buffer->xitextarea("qui_note", false, "Notes", [
                    "required" => true,
                    ".mb-2" => true,
                    "label_col" => 12,
                ]);
                $buffer->xdropzone("upload_add_{$index}", $quote_wizard->get_save_directory()."/uploads/{$index}", [
                    "help" => [
                        "*" => "Files limited to 4mb per file and a maximum of 5 files. Please add cloud link in notes for large files.",
                        ".text-danger fs-8" => true,
                    ],
                ]);

            $buffer->_div();
        $buffer->_div();

        $buffer->div_([".row mt-4" => true]);
            $buffer->div_([".col-12" => true]);
                $buffer->span_(["." => true]);
                    $buffer->add("Send us a ");
                    $buffer->xlink("https://wa.me/".getenv("ember.social.whatsapp.nr"), "Whatsapp", [".text-success link-unstyled" => true, "@target" => "_blank"]);
                    $buffer->add(" for any assistance that may be required.");
                $buffer->_span();
            $buffer->_div();
        $buffer->_div();

        $buffer->div_([".row mt-4" => true]);
            $buffer->div_([".col-12" => true]);
                $buffer->submit_button(["label" => "Add Item", ".w-100 mb-2" => true]);
            $buffer->_div();
        $buffer->_div();
    $buffer->_div();

});