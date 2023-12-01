<?php




\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */

//    \Kwerqy\Ember\com\solid_classes\solid::install();
//
//    display(\Kwerqy\Ember\com\http\http::get_control());
//    display(\Kwerqy\Ember\Ember::$request->get("id"));
//    display(\Kwerqy\Ember\Ember::dbt("category")->get_create_sql());
//    display(\Kwerqy\Ember\Ember::dbt("category_property")->get_create_sql());


	$sql = \Kwerqy\Ember\com\db\sql\select::make();
	$sql->select("cat_id AS id");
	$sql->select("category.*");
	$sql->select("keyword.cap_value AS keyword");
	$sql->select("lead_time.cap_value AS lead_time");

	$sql->from("category");
	$sql->left_join_property(CATEGORY_PROPERT_KEYWORD, "category", "keyword");
	$sql->left_join_property(CATEGORY_PROPERT_LEAD_TIME, "category", "lead_time");

	display($sql->build());


//    $product = \Kwerqy\Ember\Ember::dbt("product")->get_fromdb("1=1");
//    $product->save_property(PRODUCT_PROPERTY_FEATURE_COLOR, "red");

//    display($product->get_prop(PRODUCT_PROPERTY_FEATURE_COLOR));
//    display($product->get_prop(PRODUCT_PROPERTY_FEATURE_COLOR));
//    display($product->get_prop(PRODUCT_PROPERTY_FEATURE_COLOR));
//    display($product->get_prop(PRODUCT_PROPERTY_FEATURE_COLOR));

//    echo \Kwerqy\Ember\com\ui\ui::make()->iproperty($product, PRODUCT_PROPERTY_FEATURE_COLOR);
//    echo \Kwerqy\Ember\com\ui\ui::make()->isetting();


//	$solid = \Kwerqy\Ember\com\solid_classes\solid::get_instance(PRODUCT_PROPERTY_FEATURE_COLOR);
//	display($solid->get_display_name());
//	display($solid->format("red"));
//	$solid = \Kwerqy\Ember\com\solid_classes\solid::get_instance(USER_ROLE_ADMIN);
//	display($solid->get_display_name());

//    	$buffer->div_([".container page-wrapper" => true, ]);
//			$buffer->div_([".row" => true, ]);
//			    $buffer->div_([".col" => true, ]);
//
//			        	$fn_check = function($color)use(&$buffer){
//			        	    $buffer->div_([".row" => true]);
//			        	        $buffer->div_([".col-12" => true]);
//                                    $buffer->xicheckbox_round("checkbox_{$color}", true, $color, ["color" => $color]);
//			        	        $buffer->_div();
//			        	    $buffer->_div();
//                        };
//
//			        	$fn_check("red");
//			        	$fn_check("orange");
//			        	$fn_check("yellow");
//			        	$fn_check("green");
//			        	$fn_check("teal");
//			        	$fn_check("cyan");
//			        	$fn_check("blue");
//			        	$fn_check("purple");
//			        	$fn_check("black");
//			        	$fn_check("white");
//			        	$fn_check("gray");
//
////                    $buffer->xirange("range");
//                $buffer->_div();
//            $buffer->_div();
//        $buffer->_div();

});

