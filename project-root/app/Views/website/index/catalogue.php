<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    $fn_card = function($filename, $description, $link, $options = []) use(&$buffer){
        $options = array_merge([
            "@class" => "col-12 col-sm-6 col-md-4 col-lg-3 mb-4"
        ], $options);

        $buffer->div_($options);

            $buffer->div_([".bg-catalogue-img-mobile-wrap d-lg-none" => true, ".d-none" => !\Kwerqy\Ember\com\http\http::is_mobile()]);
                $buffer->ximage(\Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/catalogue/{$filename}"), [".img-fluid clip-image" => true]);
                $buffer->div_([".content" => true]);
                    $buffer->div_([".w-100" => true]);
                        $buffer->p_([".display-7 fs-5 text-center px-3 font-weight-500" => true, ".text-light" => true, ]);
                            $buffer->add($description);
                        $buffer->_p();
                        $buffer->p_();
                            $buffer->xlink($link, "View Catalogue", ["@target" => "_blank", ".btn btn-primary" => true]);
                        $buffer->_p();
                    $buffer->_div();
                $buffer->_div();
            $buffer->_div();

            $buffer->add(\Kwerqy\Ember\com\ui\ui::make()->image_card()
                ->set_src(\Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/catalogue/{$filename}"))
                ->set_hover_content(function()use($link, $description){
                    $buffer = \Kwerqy\Ember\com\ui\ui::make()->buffer();
                    $buffer->p_([".display-7 fs-5 text-center px-3" => true, ".text-light" => true, ]);
                        $buffer->add($description);
                    $buffer->_p();
                    $buffer->p_();
                        $buffer->xlink($link, "View Catalogue", ["@target" => "_blank", ".btn btn-primary" => true]);
                    $buffer->_p();

                    return $buffer->build();
                }, [".from-b bg-gray" => true, "opacity" => 100])
                ->build([".d-none d-lg-block" => true, ".d-none" => \Kwerqy\Ember\com\http\http::is_mobile()])
            );

        $buffer->_div();
    };

    $buffer->xspace(80);
    $buffer->div_([".container min-h-100vh my-5" => true]);

        $buffer->div_([".col text-center" => true, ]);
            $buffer->xheader(1, "Catalogues");
            $buffer->hr();
        $buffer->_div();

        $buffer->div_([".row my-4 pt-4" => true]);
            $buffer->div_([".col-12" => true]);
                $buffer->xheader(3, "Amrod Collection");
            $buffer->_div();
        $buffer->_div();

        $buffer->div_([".row" => true, ]);

            $fn_card("amrod/Corporate and promotional headwear and apparel.png", "Corporate and promotional headwear and apparel", "https://viewer.zoomcatalog.com/corporate-and-promotional-apparel-and-headwear-2023-2024");
            $fn_card("amrod/Altitude workwear.png", "Altitude workwear", "https://viewer.zoomcatalog.com/altitude-workwear-2023-2024");
            $fn_card("amrod/Alex Varga (Timeless collection).png", "Alex Varga (Timeless collection)", "https://issuu.com/amrodcorporate/docs/alex_varga_2022_2023?fr=sMDJlMzUzMjgyNDY");
            $fn_card("amrod/Kooshty (clean living).png", "Kooshty (clean living)", "https://issuu.com/amrodcorporate/docs/kooshty_2022_2023?fr=sNTdjYjUzMjgyNDY");
            $fn_card("amrod/Okiyo (Eco conscious).png", "Okiyo (Eco conscious)", "https://issuu.com/amrodcorporate/docs/okiyo_2022_2023?fr=sNGI3MjUzMjgyNDY");
            $fn_card("amrod/Serendipio (home and drinkware).png", "Serendipio (home and drinkware)", "https://issuu.com/amrodcorporate/docs/serendipio_2022_2023?fr=sNTZlMDUzMjgyNDY");
            $fn_card("amrod/Slazenger.png", "Slazenger", "https://issuu.com/amrodcorporate/docs/slazenger_2022_2023?fr=sNDdkZTUzMjgyNDY");
            $fn_card("amrod/Swiss cougar (tech collection).png", "Swiss cougar (tech collection)", "https://issuu.com/amrodcorporate/docs/swiss_cougar_2022_2023?fr=sMzgxZjUzMjgyNDY");
            $fn_card("amrod/Andy Cartwright (signature collection).png", "Andy Cartwright (signature collection)", "https://issuu.com/amrodcorporate/docs/andy_cartwright_2022_2023?fr=sMTIzYzU0NjkwMjI");
            $fn_card("amrod/Custom Packaging.png", "Custom Packaging", "https://multimedia.marketing.amrod.co.za/amrod-B/documents/45d9ed96-02cd-4c58-a58c-70757b40a755.pdf");
            $fn_card("amrod/Display catalogue.png", "Display catalogue", "https://viewer.zoomcatalog.com/display-2023-2024");
            $fn_card("amrod/Promotional products.png", "Promotional products", "https://viewer.zoomcats.com/promotional-products-201920");

        $buffer->_div();


        $buffer->div_([".row my-4 pt-4" => true]);
            $buffer->div_([".col-12" => true]);
                $buffer->xheader(3, "Barron Collection");
            $buffer->_div();
        $buffer->_div();

        $buffer->div_([".row" => true, ]);

            $fn_card("barron/Winter catalogue.png", "Winter catalogue", "https://api-coffee-latte-live.kevro.co.za/Catalogues/Winter%20Catalogue%202023/Winter%20Catalogue%202023/");
            $fn_card("barron/Back to school.png", "Back to school", "https://api-coffee-latte-live.kevro.co.za/Catalogues/Back%20to%20School%202022/Back%20to%20School%202022/");
            $fn_card("barron/Gifts and bags.png", "Gifts and bags", "https://api-coffee-latte-live.kevro.co.za/Catalogues/Gifts%20and%20Bags%202022/Gifts%20and%20Bags%202022/2/");
            $fn_card("barron/Summer catalogue.png", "Summer catalogue", "https://api-coffee-latte-live.kevro.co.za/Catalogues/Summer%20Catalogue%202022/Summer%20Catalogue%202022/");
            $fn_card("barron/Eco friendly bags and gifts.png", "Eco friendly bags and gifts", "https://api-coffee-latte-live.kevro.co.za/Catalogues/Eco-Friendly%20Gifts%20and%20Bags%20Catalogue%202022/Eco-Friendly%20Gifts%20and%20Bags%20Catalogue%202022/");
            $fn_card("barron/Display catalogue.png", "Display catalogue", "https://api-coffee-latte-live.kevro.co.za/Catalogues/Display%20Catalogue%202023/Display%20Catalogue%202023/");
            $fn_card("barron/Workwear and apparel.png", "Workwear and apparel", "https://api-coffee-latte-live.kevro.co.za/Catalogues/Apparel%20And%20Workwear%202023/Apparel%20And%20Workwear%202023/");

        $buffer->_div();

        $buffer->div_([".row my-4 pt-4" => true]);
            $buffer->div_([".col-12" => true]);
                $buffer->xheader(3, "Headwear24 Collection");
            $buffer->_div();
        $buffer->_div();

        $buffer->div_([".row" => true, ]);
            $fn_card("headwear24/Headwear catalogue.png", "Headwear catalogue", "https://drive.google.com/file/d/1ADrw6812J073c75h_vkkKgwQOXTwdSqG/view?usp=sharing");
            $fn_card("headwear24/Uflex catalogue.png", "Uflex catalogue", "https://drive.google.com/file/d/1SG9g0prca_m0cgvAx42_c8KFa_hsKJM6/view?usp=sharing");
        $buffer->_div();


        $buffer->div_([".row my-4 pt-4" => true]);
            $buffer->div_([".col-12" => true]);
                $buffer->xheader(3, "Proactive Collection");
            $buffer->_div();
        $buffer->_div();

        $buffer->div_([".row" => true, ]);
            $fn_card("proactive/T-shirts & Tops.png", "T-shirts & Tops", "https://distributor.proactiveclothing.com/images/uploaded/catalogue-download/2023/PDFs/Proactive-Catalogue-2023-T-SHIRTS&TOPS.pdf");
            $fn_card("proactive/Polos & Golf Shirts.png", "Polos & Golf Shirts", "https://distributor.proactiveclothing.com/images/uploaded/catalogue-download/2023/PDFs/Proactive-Catalogue-2023-POLOS&GOLF-SHIRTS.pdf");
            $fn_card("proactive/Shirts & Blouses.png", "Shirts & Blouses", "https://distributor.proactiveclothing.com/images/uploaded/catalogue-download/2023/PDFs/Proactive-Catalogue-2023-SHIRTS&BLOUSES.pdf");
            $fn_card("proactive/Corporate Collection.png", "Corporate Collection", "https://distributor.proactiveclothing.com/images/uploaded/catalogue-download/2023/PDFs/Proactive-Catalogue-2023-CORPORATE-COLLECTION.pdf");
            $fn_card("proactive/Fleece & Knitwear.png", "Fleece & Knitwear", "https://distributor.proactiveclothing.com/images/uploaded/catalogue-download/2023/PDFs/Proactive-Catalogue-2023-FLEECE&KNITWEAR.pdf");
            $fn_card("proactive/Jacket Collection.png", "Jacket Collection", "https://distributor.proactiveclothing.com/images/uploaded/catalogue-download/2023/PDFs/Proactive-Catalogue-2023-JACKETS.pdf");
            $fn_card("proactive/Activewear.png", "Activewear", "https://distributor.proactiveclothing.com/images/uploaded/catalogue-download/2023/PDFs/Proactive-Catalogue-2023-ACTIVEWEAR.pdf");
            $fn_card("proactive/Workwear.png", "Workwear", "https://distributor.proactiveclothing.com/images/uploaded/catalogue-download/2023/PDFs/Proactive-Catalogue-2023-WORKWEAR.pdf");
            $fn_card("proactive/Medical & Service.png", "Medical & Service", "https://distributor.proactiveclothing.com/images/uploaded/catalogue-download/2023/PDFs/Proactive-Catalogue-2023-MEDICAL&SERVICE-COLLECTION.pdf");
            $fn_card("proactive/Chef Collection.png", "Chef Collection", "https://distributor.proactiveclothing.com/images/uploaded/catalogue-download/2023/PDFs/Proactive-Catalogue-2023-CHEF-COLLECTION.pdf");
            $fn_card("proactive/Beauty Collection.png", "Beauty Collection", "https://distributor.proactiveclothing.com/images/uploaded/catalogue-download/2023/PDFs/Proactive-Catalogue-2023-BEAUTY-COLLECTION.pdf");
            $fn_card("proactive/Headwear & Bags.png", "Headwear & Bags", "https://distributor.proactiveclothing.com/images/uploaded/catalogue-download/2023/PDFs/Proactive-Catalogue-2023-HEADWEAR&BAG-COLLECTION.pdf");
        $buffer->_div();

//        $buffer->div_([".row my-4 pt-4" => true]);
//            $buffer->div_([".col-12" => true]);
//                $buffer->xheader(3, "Captivity");
//            $buffer->_div();
//        $buffer->_div();
//
//        $buffer->div_([".row" => true, ]);
//            $fn_card("headwear24/Headwear catalogue.png", "Headwear catalogue", "https://api-coffee-latte-live.kevro.co.za/Catalogues/Apparel%20And%20Workwear%202023/Apparel%20And%20Workwear%202023/");
//        $buffer->_div();


    $buffer->_div();


}, ["section" => "website"]);