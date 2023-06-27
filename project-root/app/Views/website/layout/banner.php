<?php
\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */
    
    $buffer->add(\app\ui::make()->loader());

//    $buffer->section_([".banner-wrapper min-h-100px" => true, ]);
//        $buffer->div_([".container" => true, ]);
//            $buffer->div_([".row py-3" => true, ]);
//                $buffer->div_([".col text-center" => true, ]);
//                    $buffer->span_([".text-white" => true, ]);
//                        $buffer->add("JOIN NOW:");
//                        $buffer->xlink("javascript:app.browser.popup('".\Kwerqy\Ember\com\http\http::build_action_url("website/index/newsletter_signup")."', {title:'Sign up to our newsletter', width:'modal-md'})", "Sign up to our newsletter", [".ms-2 text-warning" => true]);
//                    $buffer->_span();
//                $buffer->_div();
//            $buffer->_div();
//        $buffer->_div();
//    $buffer->_section();
    
});

