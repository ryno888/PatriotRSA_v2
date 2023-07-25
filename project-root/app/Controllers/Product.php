<?php

namespace App\Controllers;

class Product extends BaseController {
    //---------------------------------------------------------------------------------------
    public function index($page) {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/product/{$page}");
    }
    //---------------------------------------------------------------------------------------
    public function vlist() {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/product/vlist");
    }
    //---------------------------------------------------------------------------------------
    public function vadd() {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/product/vadd");
    }
    //---------------------------------------------------------------------------------------
    public function xtoggle_product() {

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

