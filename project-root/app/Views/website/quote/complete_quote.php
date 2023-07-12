<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */

    //evaluate
    if(!$controller->quote_nr) \Kwerqy\Ember\com\http\http::go_error(ERROR_CODE_404);
    if(!$controller->id) \Kwerqy\Ember\com\http\http::go_error(ERROR_CODE_404);

    //see if quote exists
    $quote_wizard = \sessions\quote_wizard::make();
    $result = $quote_wizard->load($controller->quote_nr);
    if(!$result) \Kwerqy\Ember\com\http\http::go_error(ERROR_CODE_404);
    if($controller->id != $quote_wizard->id) \Kwerqy\Ember\com\http\http::go_error(ERROR_CODE_404);

    $buffer->xspace(100);
    $buffer->form("website/xcomplete_quote");
    $buffer->xihidden("quote_nr", $controller->quote_nr);

    $buffer->div_([".container mh-60 my-4" => true]);
        $buffer->div_([".row" => true]);
            $buffer->div_([".col-12" => true]);
                $buffer->xheader(2, "#{$controller->quote_nr}", false, [".text-center" => true]);
            $buffer->_div();
        $buffer->_div();

        if($quote_wizard->quo_is_complete){
            \Kwerqy\Ember\com\http\http::redirect("website/quote/view_quote/quote_nr/{$quote_wizard->quote_nr}");
        }else{
            $buffer->div_([".row" => true]);
                $buffer->div_([".col-12 mt-3" => true]);
                    $buffer->xmessage("Thank you for verifying your email address. One final step. Please complete the form below to submit your quote.");
                $buffer->_div();
            $buffer->_div();

            $buffer->div_([".row" => true]);
                $buffer->div_([".col-12 col-md-6" => true]);
                    $buffer->div_([".row" => true]);
                        $buffer->div_([".col-12 mt-4" => true]);
                            $buffer->xheader(5, "My Details");
                            $buffer->hr();
                            $buffer->div_([".row mb-2" => true]);
                                $buffer->div_([".col-12" => true]);
                                    $buffer->xitext("per_firstname", false, "First Name", ["required" => true, "label_col" => 12]);
                                $buffer->_div();
                            $buffer->_div();
                            $buffer->div_([".row mb-2" => true]);
                                $buffer->div_([".col-12" => true]);
                                    $buffer->xitext("per_lastname", false, "Surname", ["required" => true, "label_col" => 12]);
                                $buffer->_div();
                            $buffer->_div();
                            $buffer->div_([".row mb-2" => true]);
                                $buffer->div_([".col-12" => true]);
                                    $buffer->xitext("per_contactnr", false, "Contact Number", ["required" => true, "label_col" => 12]);
                                $buffer->_div();
                            $buffer->_div();
                        $buffer->_div();

                        $buffer->div_([".col-12 mt-5" => true]);
                            $buffer->xheader(5, "Company Details");
                            $buffer->hr();
                            $buffer->div_([".row mb-2" => true]);
                                $buffer->div_([".col-12" => true]);
                                    $buffer->xitext("per_company_name", false, "Company Name", ["required" => true, "label_col" => 12]);
                                $buffer->_div();
                            $buffer->_div();
                            $buffer->div_([".row mb-2" => true]);
                                $buffer->div_([".col-12" => true]);
                                    $buffer->xitext("per_tellnr_work", false, "Company Contact Number", ["required" => true, "label_col" => 12]);
                                $buffer->_div();
                            $buffer->_div();
                            $buffer->div_([".row mb-2" => true]);
                                $buffer->div_([".col-12" => true]);
                                    $buffer->xitextarea("per_address_shipping", false, "Shipping Address", ["required" => true, "label_col" => 12]);
                                $buffer->_div();
                            $buffer->_div();
                            $buffer->div_([".row mb-2" => true]);
                                $buffer->div_([".col-12" => true]);
                                    $buffer->xitextarea("per_address_billing", false, "Billing Address", ["required" => true, "label_col" => 12]);
                                $buffer->_div();
                            $buffer->_div();
                        $buffer->_div();

                        $buffer->div_([".col-12 mt-5" => true]);
                            $buffer->hr();
                            $buffer->div_([".d-flex" => true]);
                                $buffer->xlink("#", "Cancel Quote", [".btn btn-outline-secondary w-100 me-2" => true]);
                                $buffer->submit_button(["label" => "Submit Quote", ".w-100" => true]);
                            $buffer->_div();
                        $buffer->_div();
                    $buffer->_div();
                $buffer->_div();

                $buffer->div_([".col-12 col-md-6" => true]);
                    $buffer->div_([".row" => true]);
                        $buffer->div_([".col-12 mt-4" => true]);
                            $buffer->xheader(5, "Quote Items");
                            $buffer->hr();

                            $item = 1;
                            foreach ($quote_wizard->quote_item_arr as $quote_item){
                                $buffer->div_([".row" => true]);
                                    $buffer->div_([".col-12" => true]);
                                        $buffer->xheader(5, "Item {$item}");
                                        $ul = \Kwerqy\Ember\com\ui\set\bootstrap\ul::make();
                                        $ul->add_li($quote_item->qui_supplier, "Supplier:");
                                        $ul->add_li($quote_item->qui_code, "Product Code:");
                                        $ul->add_li($quote_item->qui_qty, "Qty:");
                                        $ul->add_li(nl2br($quote_item->qui_note), "Note:", ["/content" => [".fs-8" => true]]);
                                        $ul->add_li(function()use($quote_item, $quote_wizard){
                                            $buffer = \app\ui::make()->buffer();
                                            $file_arr = glob($quote_item->file_directory."/*");
                                            foreach ($file_arr as $file){
                                                $buffer->xlink(site_url("website/xdownload_quote_item/quote_nr/{$quote_wizard->quote_nr}/id/{$quote_item->index}/filename/".urlencode(basename($file))), false, ["icon" => "fa-paperclip", ".btn btn-outline-primary me-1" => true, "@target" => "_blank", "@title" => basename($file)]);
                                            }
                                            return $buffer->build();
                                        }, "Files:");
                                        $buffer->add($ul->build());
                                        $buffer->hr();
                                    $buffer->_div();
                                $buffer->_div();

                                $item++;
                            }

                        $buffer->_div();
                    $buffer->_div();
                $buffer->_div();

            $buffer->_div();
        }


    $buffer->_div();

    $buffer->xspace(50);

});