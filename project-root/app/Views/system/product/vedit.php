<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function ($buffer, $controller, $view) {

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */

    $product = \Kwerqy\Ember\Ember::dbt("product")->get_fromslug($controller->id);

    $buffer->form("sysproduct/xedit");

    $buffer->div_([".container-fluid" => true,]);
        $buffer->div_([".row mb-3" => true,]);
            $buffer->div_([".col-12" => true,]);
                $buffer->submit_button();
            $buffer->_div();
        $buffer->_div();

        $buffer->div_([".row" => true,]);
            $buffer->div_([".col-12 col-md-6" => true,]);
            	$buffer->xfieldset("General Details", function($buffer)use($controller, $product){
					$buffer->xihidden("id", $controller->id);
					$buffer->xitext("pro_name", $product->pro_name, "Title", ["required" => true]);
					$buffer->xicurrency("pro_price", $product->pro_price, "Price", ["@min" => 0, "required" => true]);
					$buffer->xicounter("pro_stock", $product->pro_stock, ["label" => "Stock"]);

					$buffer->div_([".mb-2" => true]);
						$buffer->xiswitch("pro_is_published", $product->pro_is_published, "Published");
						$buffer->xiswitch("pro_is_featured", $product->pro_is_featured, "Featured");
					$buffer->_div();

					$buffer->xitextarea("pro_description", $product->pro_description, "Description");
				});
            $buffer->_div();
            $buffer->div_([".col-12 col-md-6" => true,]);
            	$buffer->xfieldset("Advanced Details", function($buffer)use($controller, $product){

            		$fn_property_variants = function($label, $key, $options = [])use(&$buffer, $product){

            			$options = array_merge([
            			    "rows" => 2,
							"help" => "Add ".strtolower($label)." by separating them with ' | '",
            			], $options);

						$solid = \Kwerqy\Ember\com\solid_classes\solid::get_instance($key);
            			$property_arr = $product->get_property_arr($key);
            			$value_arr = [];
            			array_walk($property_arr, function($property)use(&$value_arr){
            				$value_arr[$property->pdp_value] = $property->pdp_value;
						});

            			$buffer->div_([".row" => true]);
            			    $buffer->div_([".col-12" => true]);
            			    	$buffer->xform_label($label);
            			    $buffer->_div();
            			    $buffer->div_([".col-12" => true]);
            			    	$buffer->xitextarea("{$solid->get_form_id()}_variant", implode(" | ", $value_arr), false, $options);
            			    $buffer->_div();
            			$buffer->_div();
					};


            		$fn_property_variants("Color Variants", PRODUCT_PROPERTY_FEATURE_COLOR);
            		$fn_property_variants("Size Variants", PRODUCT_PROPERTY_SIZE);


				});
            $buffer->_div();
        $buffer->_div();
    $buffer->_div();

});
