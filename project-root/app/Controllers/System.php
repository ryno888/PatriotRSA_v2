<?php

namespace App\Controllers;

class System extends BaseController {
    //---------------------------------------------------------------------------------------
    public function index($page) {

        if(!\Kwerqy\Ember\Ember::$user->active_user)
            \Kwerqy\Ember\com\http\http::redirect("system/login");

        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/index/{$page}", ["auth" => "admins"]);
    }
    //---------------------------------------------------------------------------------------
    public function person($page) {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/person/{$page}", ["auth" => "admins"]);
    }
    //---------------------------------------------------------------------------------------
    public function error() {

        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/index/error", [
            "pre_layout" => [
	            "bootstrap/layout/head",
            ],
            "post_layout" => [
                "bootstrap/layout/scripts",
            ],
        ]);
    }
    //---------------------------------------------------------------------------------------
    public function login() {

        if(\Kwerqy\Ember\Ember::$user->active_user){
        	if(\Kwerqy\Ember\Ember::auth_check("admins")) return \Kwerqy\Ember\com\http\http::redirect("system/index/home");
            else return \Kwerqy\Ember\com\http\http::go_error(ERROR_CODE_ACTIVE_SESSION);
		}

        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/index/login", [
            "pre_layout" => [
	            "system/layout/head",
            ],
            "post_layout" => [
                "system/layout/scripts",
            ],
        ]);
    }
    //---------------------------------------------------------------------------------------
    public function xlogin() {

        $this->response->setContentType('Content-Type: application/json');

        $per_username = \Kwerqy\Ember\Ember::$request->get('per_username', TYPE_STRING);
		$per_password = \Kwerqy\Ember\Ember::$request->get('per_password', TYPE_STRING);

		if(!\Kwerqy\Ember\com\http\http::is_valid_form_submit()){
		    return \Kwerqy\Ember\com\http\http::ajax_response(["redirect" => \Kwerqy\Ember\com\http\http::build_action_url("system/error", ["code" => "ERROR_CODE_ACCESS_DENIED"])]);
        }

		if(!$per_username || !$per_password)
			return \Kwerqy\Ember\com\http\http::ajax_response(["redirect" => \Kwerqy\Ember\com\http\http::build_action_url("system/error", ["code" => "ERROR_CODE_LOGIN_INVALID_DETAILS"])]);

		$redirect = \Kwerqy\Ember\com\user\user::make()->login($per_username, $per_password, [
		    "return_url" => true,
            "success_redirect" => \Kwerqy\Ember\com\http\http::build_action_url("system/index/home"),
        ]);
		return \Kwerqy\Ember\com\http\http::ajax_response(["redirect" => $redirect]);

    }
    //---------------------------------------------------------------------------------------
    public function xlogout() {
        \Kwerqy\Ember\com\user\user::make()->logout();
    }
    //---------------------------------------------------------------------------------------
}

