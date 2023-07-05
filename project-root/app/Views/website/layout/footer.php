<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */
    
    $link_arr = [];
    $link_arr["Home"] = site_url("website/index/home");
    $link_arr["About"] = site_url("website/index/about");
    $link_arr["Contact"] = site_url("website/index/contact");

    $buffer->footer_([".text-white bg-dark" => true, ]);
		$buffer->div_([".container text-center py-4 py-lg-5" => true, ]);
			$buffer->ul_([".list-inline" => true, ]);
				$buffer->li_([".list-inline-item" => true, ]);
					$buffer->a_([".text-white link-unstyled" => true, "@href" => "https://patriotapparel.co.za/", "@target" => "_blank"]);
                        $buffer->add("In Partnership with Patriot Apparel");
					$buffer->_a();
				$buffer->_li();
			$buffer->_ul();
			$buffer->ul_([".list-inline" => true, ]);

			    $fn_social = function($link, $icon)use(&$buffer){
			        $buffer->li_([".list-inline-item" => true, ]);
                        $buffer->a_([".text-white" => true, "@href" => $link, "@target" => "_blank"]);
                            $buffer->xicon($icon);
                        $buffer->_a();
                    $buffer->_li();
                };

			    $fn_social(getenv("ember.social.facebook"), "fab-facebook");
			    $fn_social(getenv("ember.social.twitter"), "fab-twitter");
			    $fn_social(getenv("ember.social.instagram"), "fab-instagram");
			    $fn_social(getenv("ember.social.tiktok"), "fab-tiktok");

			$buffer->_ul();
			$buffer->p_([".text-white-50 mb-0" => true, ]);
                $buffer->add(\Kwerqy\Ember\Ember::get_copyright());
			$buffer->_p();
		$buffer->_div();
	$buffer->_footer();
    
});
