<?php
\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */

    $control = \Kwerqy\Ember\com\http\http::get_control();
    $is_homepage = in_array($control, ["website/index/home", "/"]);

    $url_arr = [];
    $url_arr[] = ["label" => "Home", "link" => $is_homepage ? "#" : site_url("website/index/home"), ".active" => false];
    $url_arr[] = ["label" => "Catalogues", "link" => site_url("website/index/catalogue"), ".active" => $control == "website/index/catalogue"];
    $url_arr[] = ["label" => "About", "link" => site_url("website/index/about"), ".active" => $control == "website/index/about"];
    $url_arr[] = ["label" => "Contact Us", "link" => site_url("website/index/contact"), ".active" => $control == "website/index/contact"];
    $url_arr[] = ["label" => "Patriot Apparel", "link" => "https://patriotapparel.co.za/", "@target" => "_blank"];

    $navbar = \Kwerqy\Ember\com\ui\ui::make()->navbar(["id" => "website_nav"]);
    $navbar->set_brand_html(function(){



    });
    foreach ($url_arr as $url) {
        $navbar->add_item($url["label"], $url["link"], $url);
    }

    $navbar->append(function(){
        $ul = \Kwerqy\Ember\com\ui\ui::make()->ul();
        $ul->add_item(\Kwerqy\Ember\com\ui\ui::make()->link(getenv("ember.social.facebook"), false, ["icon" => "fab-facebook", "@target" => "_blank"]), [".nav-item social-link" => true]);
        $ul->add_item(\Kwerqy\Ember\com\ui\ui::make()->link(getenv("ember.social.instagram"), false, ["icon" => "fab-instagram", "@target" => "_blank"]), [".nav-item social-link" => true]);
        $ul->add_item(\Kwerqy\Ember\com\ui\ui::make()->link(getenv("ember.social.twitter"), false, ["icon" => "fab-twitter", "@target" => "_blank"]), [".nav-item social-link" => true]);
        $ul->add_item(\Kwerqy\Ember\com\ui\ui::make()->link(getenv("ember.social.tiktok"), false, ["icon" => "fab-tiktok", "@target" => "_blank"]), [".nav-item social-link" => true]);
        $ul->add_item(\Kwerqy\Ember\com\ui\ui::make()->link(site_url("website/index/contact"), false, ["icon" => "fa-envelope", "@target" => "_blank"]), [".nav-item social-link" => true]);
        return $ul->build([".navbar-nav ms-auto mb-lg-0 d-inline-block d-lg-flex px-2 px-lg-0" => true, ]);
    });

    $buffer->add($navbar->build([
        ".fixed-top" => true,
        "bg_color" => false,
        ".navbar-shrink force bg-checkered" => !$is_homepage,
        "/navbar-toggler" => [".ms-auto" => true],
        "/navbar-collapse" => [".py-3 py-lg-0" => true],
    ]));

});