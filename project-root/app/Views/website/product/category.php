<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    $category_filter = \sessions\category_filter::make();

    $buffer->xspace(50);

    $buffer->div_([".container my-5 my-sm-7 py-sm-2" => true, ]);
        $buffer->div_([".row" => true, ]);
            $buffer->div_([".col-md-12 col-lg-3 col-xl-3" => true, ]);
                $buffer->div_([".row" => true, ]);
                    $buffer->div_([".col" => true, ]);
                        $buffer->xheader(1, "Product Filter", false, [".display-6 fs-4" => true]);
                        $buffer->hr();
                    $buffer->_div();
                $buffer->_div();
                $buffer->div_([".row mb-2" => true, ]);
                    $buffer->div_([".col" => true, ]);
                        $collapse = \Kwerqy\Ember\com\ui\ui::make()->collapse();
                        $collapse->set_title(\Kwerqy\Ember\com\ui\ui::make()->tag()->span(["*" => "Price Filter"]));
                        $collapse->add_html(\Kwerqy\Ember\com\ui\ui::make()->irange("price", [
                            "value_from" => $category_filter->price_from,
                            "value_to" => $category_filter->price_to,
                            "min" => $category_filter->price_min,
                            "max" => $category_filter->price_max,
                            "/" => [
                                "*onFinish" => "!function(data){
                                    ".\Kwerqy\Ember\com\js\js::ajax(site_url("website/xfilter_category"), [
                                        "*no_overlay" => true,
                                        "*beforeSend" => "function(){ app.overlay.show(); }",
                                        "*data" => "!{ 
                                            page:1,
                                            price_from:data.from_pretty,
                                            price_to:data.to_pretty,
                                        }"
                                    ])."
                                }"
                            ],
                        ]));
                        $buffer->add($collapse->build([
                            ".show" => true,
                            "/link" => [
                                ".toggle-icon" => true,
                                "@data-icon-default" => "fa-caret-square-down",
                                "@data-icon-toggle" => "fa-caret-square-up",

                                "icon_right" => "fa-caret-square-down",
                                "/icon" => [
                                    ".float-end mt-1" => true,
                                ]
                            ],
                        ]));
                        $buffer->hr();
                    $buffer->_div();
                $buffer->_div();
                $buffer->div_([".row mb-2" => true, ]);
                    $buffer->div_([".col" => true, ]);
                        $collapse = \Kwerqy\Ember\com\ui\ui::make()->collapse();
                        $collapse->set_title(\Kwerqy\Ember\com\ui\ui::make()->tag()->span(["*" => "Color Filter"]));
                        $collapse->add_html(function(){
                            $buffer = \Kwerqy\Ember\com\ui\ui::make()->buffer();

                            $fn_check = function($color, $checked = false, $label = false)use(&$buffer){

                                if(!$label) $label = \Kwerqy\Ember\com\str\str::propercase($color);

                                $buffer->div_([".row" => true]);
                                    $buffer->div_([".col-12" => true]);
                                        $buffer->xicheckbox_round("checkbox_{$color}", $checked, $label, ["color" => $color]);
                                    $buffer->_div();
                                $buffer->_div();
                            };

                            $fn_check("red");
                            $fn_check("orange");
                            $fn_check("yellow");
                            $fn_check("green");
                            $fn_check("teal");
                            $fn_check("cyan");
                            $fn_check("blue");
                            $fn_check("purple");
                            $fn_check("black");
                            $fn_check("white");
                            $fn_check("gray");

                            return $buffer->build();

                        });
                        $buffer->add($collapse->build([
                            ".show" => true,
                            "/link" => [
                                ".toggle-icon" => true,
                                "@data-icon-default" => "fa-caret-square-down",
                                "@data-icon-toggle" => "fa-caret-square-up",

                                "icon_right" => "fa-caret-square-down",
                                "/icon" => [
                                    ".float-end mt-1" => true,
                                ]
                            ],
                        ]));
                        $buffer->hr();
                    $buffer->_div();
                $buffer->_div();

                $buffer->div_([".row mb-2" => true, ]);
                    $buffer->div_([".col" => true, ]);
                        $collapse = \Kwerqy\Ember\com\ui\ui::make()->collapse();
                        $collapse->set_title(\Kwerqy\Ember\com\ui\ui::make()->tag()->span(["*" => "Size Filter"]));
                        $collapse->add_html(function(){
                            $buffer = \Kwerqy\Ember\com\ui\ui::make()->buffer();

                            $buffer->xiswitch("small", false, "Small");
                            $buffer->xiswitch("medium", false, "Medium");
                            $buffer->xiswitch("large", false, "Large");
                            $buffer->xiswitch("extra_large", false, "Extra Large");

                            return $buffer->build();

                        });
                        $buffer->add($collapse->build([
                            ".show" => true,
                            "/link" => [
                                ".toggle-icon" => true,
                                "@data-icon-default" => "fa-caret-square-down",
                                "@data-icon-toggle" => "fa-caret-square-up",

                                "icon_right" => "fa-caret-square-down",
                                "/icon" => [
                                    ".float-end mt-1" => true,
                                ]
                            ],
                        ]));
                        $buffer->hr();
                    $buffer->_div();
                $buffer->_div();

                $buffer->div_([".row mt-3" => true, ]);
                    $buffer->div_([".col" => true, ]);
                    $buffer->input([".form-control" => true, "@type" => "search", "@placeholder" => "Search", ]);
                    $buffer->_div();
                $buffer->_div();
            $buffer->_div();
            $buffer->div_([".col" => true, ]);
                $buffer->div_([".row g-2 min-h-80vh" => true, ]);
                    $buffer->div_([".col-12" => true, ]);

                        $panel = \Kwerqy\Ember\com\ui\ui::make()->panel(site_url("website/product/products"), ["id" => "product_panel"]);
                        $buffer->add($panel->build());

                    $buffer->_div();
                $buffer->_div();
            $buffer->_div();
        $buffer->_div();
    $buffer->_div();

});