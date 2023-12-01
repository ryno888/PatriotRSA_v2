<?php
\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */

    $link_arr = [];
    $link_arr["Products"] = site_url("sysproduct/vlist");
    $link_arr["Users"] = site_url("system/person/vlist");
    $link_arr["Config"] = site_url("sysconfig/vmanage");
    if(\Kwerqy\Ember\Ember::$user->active_user) $link_arr["Logout"] = site_url("system/xlogout");

    $buffer->section_();
        $navbar = \Kwerqy\Ember\com\ui\ui::make()->navbar();
        $navbar->set_brand_html(function(){
            return \Kwerqy\Ember\com\ui\ui::make()->image(\Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/logo_slim.png"), [".img-fluid pb-2 max-h-70px" => true]);
        });
        foreach ($link_arr as $label => $url) $navbar->add_item($label, $url);

        $buffer->add($navbar->build());
    $buffer->_section();
    
});
