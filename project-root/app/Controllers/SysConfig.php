<?php

namespace App\Controllers;

class SysConfig extends BaseController {
    //---------------------------------------------------------------------------------------
    public function index($page) {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/product/{$page}", ["auth" => "admins"]);
    }
    //---------------------------------------------------------------------------------------
    public function vlist() {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/product/vlist", ["auth" => "admins"]);
    }
    //---------------------------------------------------------------------------------------
    public function vmanage() {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("system", "system/config/vmanage", ["auth" => "admins"]);
    }
    //---------------------------------------------------------------------------------------
}

