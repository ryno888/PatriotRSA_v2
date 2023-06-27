<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ciiewiew
     */

    $buffer->xspace(80);
    $buffer->div_([".container" => true, ]);
		$buffer->div_([".row justify-content-center" => true, ]);
			$buffer->div_([".col-xl-10" => true, ]);
				$buffer->div_([".row mt-5" => true, ]);
					$buffer->div_([".col text-center" => true, ]);
						$buffer->xheader(1, "About Us");
						$buffer->hr();
					$buffer->_div();
				$buffer->_div();
				$buffer->div_([".row justify-content-center align-items-center my-5" => true, ]);
					$buffer->div_([".col-sm-7 col-md-5 col-lg-4 col-xl-5 col-xxl-4 overflow-hidden" => true, ]);
                        $buffer->img([".img-fluid" => true, "@src" => \Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/about-1.jpg"), "@data-aos" => "fade-right", "@data-aos-duration" => 800]);
					$buffer->_div();
					$buffer->div_([".col-sm-12 col-md-7 col-lg-7 col-xl-7 col-xxl-8" => true, ]);
					    $buffer->xheader(2, "What makes you a patriot?");
						$buffer->p_();
                            $buffer->add("Is it your relentless pursuit of victories on the field? Your loyalty toward your team through the blood, sweat and tears of the season? Is it your heart skipping a beat as you line up your crosshair and squeeze the trigger or by the technique in which you reel in your catch? Is it your passion for speed and adrenalin or your love of history? Or is it your unyielding devotion to the conservation of nature and the elements?");
						$buffer->_p();
					$buffer->_div();
				$buffer->_div();
				$buffer->div_([".row justify-content-center align-items-center my-5" => true, ]);
					$buffer->div_([".col-sm-7 col-md-5 col-lg-4 col-xl-5 col-xxl-4 order-sm-first order-md-last overflow-hidden" => true, ]);
                        $buffer->img([".img-fluid" => true, "@src" => \Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/about-2.jpg"), "@data-aos" => "fade-left", "@data-aos-duration" => 800]);
					$buffer->_div();
					$buffer->div_([".col-sm-12 col-md-7 col-lg-8 col-xl-7 col-xxl-8" => true, ]);
					    $buffer->xheader(2, "Being a Patriot is more than this.");
						$buffer->p_();
                            $buffer->add("Being a Patriot is about vigorous support in the face of adversity. Its when you grit your teeth with determination. It's about knowing your craft, predicting the way forward and showing your support no matter what! A Patriot doesnât have to be a professional in the industry, A Patriot is a certified enthusiast â respecting the profession and the artistry behind it, having true zeal about that sport, heritage or conservation. Being a Patriot is about keeping your beliefs close to your heart, wearing them on your sleeve and proudly displaying them on your chest for the world to see! You are a Patriot when you wear Patriot Apparel.");
						$buffer->_p();
					$buffer->_div();
				$buffer->_div();
				$buffer->div_([".row justify-content-center mb-5" => true, ]);
					$buffer->div_([".col overflow-hidden" => true, ]);
                        $buffer->img([".img-fluid" => true, "@src" => \Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/about-banner.jpg"), "@data-aos" => "zoom-out", "@data-aos-duration" => 800 ]);
					$buffer->_div();
				$buffer->_div();
			$buffer->_div();
		$buffer->_div();
	$buffer->_div();

});

