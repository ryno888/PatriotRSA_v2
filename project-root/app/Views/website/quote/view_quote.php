<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */

    //evaluate
    if(!$controller->quote_nr) \Kwerqy\Ember\com\http\http::go_error(ERROR_CODE_404);

    //see if quote exists
    $quote_wizard = \sessions\quote_wizard::make();
    $result = $quote_wizard->load($controller->quote_nr);
    if(!$result) \Kwerqy\Ember\com\http\http::go_error(ERROR_CODE_404);

    $buffer->xspace(100);

    $buffer->div_([".container mh-60 my-4" => true]);
        $buffer->div_([".row" => true]);
            $buffer->div_([".col-12" => true]);
                $buffer->xheader(2, "#{$controller->quote_nr}", false, [".text-center" => true]);
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
                                $ul = \app\ui\ui::make()->ul();
                                $ul->add_li($quote_wizard->per_firstname, "First Name:");
                                $ul->add_li($quote_wizard->per_lastname, "Surname:");
                                $ul->add_li($quote_wizard->per_contactnr, "Contact Number:");
                                $buffer->add($ul->build());
                            $buffer->_div();
                        $buffer->_div();
                    $buffer->_div();

                    $buffer->div_([".col-12 mt-5" => true]);
                        $buffer->xheader(5, "Company Details");
                        $buffer->hr();
                        $buffer->div_([".row mb-2" => true]);
                            $buffer->div_([".col-12" => true]);

                                $ul = \app\ui\ui::make()->ul();
                                $ul->add_li($quote_wizard->per_company_name, "Company Name:");
                                $ul->add_li($quote_wizard->per_tellnr_work, "Company Contact Number:");
                                $ul->add_li($quote_wizard->per_address_shipping, "Shipping Address:");
                                $ul->add_li($quote_wizard->per_address_billing, "Billing Address:");
                                $buffer->add($ul->build());
                            $buffer->_div();
                        $buffer->_div();
                    $buffer->_div();

                    $buffer->div_([".col-12 mt-5" => true]);
                        $buffer->hr();
                        $buffer->div_([".d-flex" => true]);
                            $buffer->xlink(site_url("website/xdownload_quote/quote_nr/{$quote_wizard->quote_nr}"), "Download Quote Data", [".btn btn-outline-primary w-100" => true, "@target" => "_blank"]);
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
                                        $buffer = \app\ui\ui::make()->buffer();
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
    $buffer->_div();
    $buffer->xspace(50);
});