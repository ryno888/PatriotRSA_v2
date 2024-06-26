<?php

namespace App\Controllers;

class SysCategory extends BaseController {
    //---------------------------------------------------------------------------------------
    public function vlist() {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/config/category/vlist", ["auth" => "admins"]);
    }
    //---------------------------------------------------------------------------------------
    public function vadd() {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/config/category/vadd", ["auth" => "admins"]);
    }
    //---------------------------------------------------------------------------------------
    public function vedit() {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/config/category/vedit", ["auth" => "admins"]);
    }
    //---------------------------------------------------------------------------------------
    public function xedit() {

		$error_arr = \Kwerqy\Ember\com\ui\helper::evaluate_required_fields();
		if ($error_arr) return \Kwerqy\Ember\com\http\http::ajax_response(["errors" => $error_arr]);

		$category = \Kwerqy\Ember\Ember::dbt("category")->get_fromrequest();
		$category->update();

		return \Kwerqy\Ember\com\http\http::ajax_response([
			"notice" => "Changes Saved",
			"js" => "manage_panel.refresh({
				complete:function(){ app.browser.close_popup(); }
			});",
		]);

    }
    //---------------------------------------------------------------------------------------
    public function xadd() {

    	$category = \Kwerqy\Ember\Ember::dbt("category")->get_fromrequest();

		$error_arr = \Kwerqy\Ember\com\ui\helper::evaluate_required_fields();
		if ($error_arr) return \Kwerqy\Ember\com\http\http::ajax_response(["errors" => $error_arr]);

		$category->save();

		return \Kwerqy\Ember\com\http\http::ajax_response([
			"notice" => "Changes Saved",
			"js" => "manage_panel.refresh({
				complete:function(){ app.browser.close_popup(); }
			});",
		]);

    }
    //---------------------------------------------------------------------------------------
}

