<?php

namespace App\Controllers;

class SysProduct extends BaseController {
    //---------------------------------------------------------------------------------------
    public function index($page) {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/product/{$page}", ["auth" => "admins"]);
    }
    //---------------------------------------------------------------------------------------
    public function vlist() {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/product/vlist", ["auth" => "admins"]);
    }
    //---------------------------------------------------------------------------------------
    public function vadd() {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/product/vadd", ["auth" => "admins"]);
    }
    //---------------------------------------------------------------------------------------
    public function vedit() {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/product/vedit", ["auth" => "admins"]);
    }
    //---------------------------------------------------------------------------------------
    public function vmanage() {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/product/vmanage", ["auth" => "admins"]);
    }
    //---------------------------------------------------------------------------------------
    public function xedit() {

		$id = \Kwerqy\Ember\Ember::$request->get("id");

		$error_arr = \Kwerqy\Ember\com\ui\helper::evaluate_required_fields();
		if ($error_arr) return \Kwerqy\Ember\com\http\http::ajax_response(["errors" => $error_arr]);

		$product = \Kwerqy\Ember\Ember::dbt("product")->get_fromslug($id);
		$product->merge_withrequest();
		$product->update();

		$feature_color_arr = \Kwerqy\Ember\com\solid_classes\solid::request_text_to_arr(PRODUCT_PROPERTY_FEATURE_COLOR);
		$product->save_property_str_to_arr(PRODUCT_PROPERTY_FEATURE_COLOR, $feature_color_arr);

		$size_arr = \Kwerqy\Ember\com\solid_classes\solid::request_text_to_arr(PRODUCT_PROPERTY_SIZE);
		$product->save_property_str_to_arr(PRODUCT_PROPERTY_SIZE, $size_arr);


		return \Kwerqy\Ember\com\http\http::ajax_response([
			"notice" => "Changes Saved",
			"js" => "manage_panel.refresh()",
		]);

    }
    //---------------------------------------------------------------------------------------
    public function xtoggle_product() {

        if(!\Kwerqy\Ember\Ember::auth_check("admins")){
            return \Kwerqy\Ember\com\http\http::ajax_response([
                "redirect" => \Kwerqy\Ember\com\http\http::get_error_url(ERROR_CODE_ACCESS_DENIED, ["layout" => "system"]),
            ]);
        }

        $pro_slug = \Kwerqy\Ember\Ember::$request->get('slug', TYPE_STRING);
        $product = \Kwerqy\Ember\Ember::dbt("product")->get_fromslug($pro_slug);
        $field = \Kwerqy\Ember\Ember::$request->get('field', TYPE_STRING);

        if($field && property_exists($product, $field)){
            $product->{$field} = !(bool) $product->{$field};
            $product->update();
        }

        return \Kwerqy\Ember\com\http\http::ajax_response([
            "notice" => "Changes Saved",
        ]);
    }
    //---------------------------------------------------------------------------------------
}

