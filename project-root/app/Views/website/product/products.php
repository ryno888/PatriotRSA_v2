<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){


    $category_filter = \sessions\category_filter::make();
    $data_arr = \Kwerqy\Ember\Ember::db()->select($category_filter->get_sql());

    if($category_filter->get_total_pages() > 0){
        $buffer->div_([".row mb-3 mt-3 mt-lg-0" => true]);
            $buffer->div_([".col" => true]);
                $buffer->div_([".d-flex justify-content-end" => true]);
                    $buffer->xpagination([
                        "*total" => $category_filter->get_total_pages(),
                        "*page" => $category_filter->page,
                        "*maxVisible" => 5,
                        "*firstLastUse" => true,
                        "!click" => "function(page){
                            ".\Kwerqy\Ember\com\js\js::ajax(site_url("website/xfilter_category"), [
                                "*no_overlay" => true,
                                "*beforeSend" => "function(){ app.overlay.show(); }",
                                "*data" => "!{ 
                                    page:page,
                                    price_from:{$category_filter->price_from},
                                    price_to:{$category_filter->price_to},
                                }"
                            ])."
                        }",
                    ]);
                $buffer->_div();
            $buffer->_div();
        $buffer->_div();

        $buffer->div_([".row g-2" => true, ]);
            $fn_card = function($data)use(&$buffer){
                $buffer->div_([".col-12 col-sm-6 col-md-4 col-xl-3" => true, ]);
                    $buffer->xproduct_card($data);
                $buffer->_div();
            };

            foreach ($data_arr as $data){
                $fn_card($data);
            }
        $buffer->_div();
    }else{
        $buffer->div_([".row min-h-40vh align-items-center" => true, ]);
            $buffer->div_([".col-12" => true]);
                $buffer->xheader(5, "No results found", false, [".display-5 text-muted fs-4 mt-5 text-center" => true]);
            $buffer->_div();
        $buffer->_div();
    }

});