<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){
	$buffer->section_([".parallax-wrapper" => true]);
	    $buffer->xparallax(\Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/background.png", ["#height" => "calc(100vh + 120px)"]), function(){
	        $buffer = \Kwerqy\Ember\com\ui\ui::make()->buffer();
	        $buffer->div_([".container" => true, ]);
				$buffer->div_([".row justify-content-center" => true, ]);
					$buffer->div_([".col-8 col-md-12 d-flex d-sm-flex d-md-flex justify-content-center align-items-center flex-wrap" => true, ]);
					    $buffer->ximage(\Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/logo_dark.png"), [".img-fluid mw-300px" => true]);
					$buffer->_div();
					$buffer->div_([".col-auto text-center" => true]);
                        $buffer->p(["*" => "Your full <b>printing solutions</b> partner", ".text-white font-weight-200 mt-3 mb-0 display-5 fs-4" => true]);
                        $buffer->hr([".border border-white mt-1" => true]);
                    $buffer->_div();
				$buffer->_div();
			$buffer->_div();
			return $buffer->build();
        });
	$buffer->_section();

	$buffer->div([".vh-100" => true]);

	$buffer->section_([".overflow-hidden" => true]);
		$buffer->div_([".container my-5 py-5" => true, ]);
			$buffer->div_([".row align-items-center g-0" => true]);
			    $buffer->div_([".col-12 col-md-6 col-lg-4 h-300px zoom zoom-sm z-index-1" => true, "@data-aos" => "fade-right", "@data-aos-offset" => \Kwerqy\Ember\com\http\http::is_mobile() ? "150" : "250",]);
			        $buffer->ximage(\Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/caption-1.jpg"), [".h-300px clip-image w-100" => true]);
			    $buffer->_div();
			    $buffer->div_([".col-12 col-md-6 col-lg-4 bg-light h-300px d-flex align-items-center" => true, "@data-aos" => "fade-down", "@data-aos-offset" => \Kwerqy\Ember\com\http\http::is_mobile() ? "150" : "250",]);
			        $buffer->div_([".text-center px-2" => true]);
                        $buffer->xheader(4, "UNLEASH YOUR CREATIVITY", false, [".font-weight-bold m-0" => true]);
                        $buffer->div([".border-bottom border-primary w-100 max-w-150px d-inline-block my-4" => true]);
                        $buffer->div(["*" => "Unleash Your Creativity with Custom Clothing Printing - Get Your Unique Designs Printed on Premium Apparel!", ".m-0" => true]);
			        $buffer->_div();
			    $buffer->_div();
			    $buffer->div_([".col-12 col-md-6 col-lg-4 h-300px zoom zoom-sm z-index-1" => true, "@data-aos" => "fade-left", "@data-aos-offset" => \Kwerqy\Ember\com\http\http::is_mobile() ? "150" : "250",]);
			        $buffer->ximage(\Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/caption-2.jpg"), [".h-300px clip-image w-100" => true]);
			    $buffer->_div();

			    $buffer->div_([".col-12 col-md-6 col-lg-4 h-300px d-flex align-items-center" => true, "@data-aos" => "fade-right", "@data-aos-offset" => \Kwerqy\Ember\com\http\http::is_mobile() ? "150" : "250",]);
			        $buffer->div_([".text-center px-2" => true]);
                        $buffer->xheader(4, "MAKE A STATEMENT", false, [".font-weight-bold m-0" => true]);
                        $buffer->div([".border-bottom border-primary w-100 max-w-150px d-inline-block my-4" => true]);
                        $buffer->div(["*" => "Make a statement with personalized accessories - express yourself with custom printed embellishments."]);
			        $buffer->_div();
			    $buffer->_div();

			    $buffer->div_([".col-12 col-md-6 col-lg-4 h-300px zoom zoom-sm z-index-1" => true, "@data-aos" => "fade-up", "@data-aos-offset" => \Kwerqy\Ember\com\http\http::is_mobile() ? "150" : "250",]);
			        $buffer->ximage(\Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/caption-3.jpg"), [".h-300px clip-image w-100" => true]);
			    $buffer->_div();

			    $buffer->div_([".col-12 col-md-6 col-lg-4 h-300px d-flex align-items-center" => true, "@data-aos" => "fade-left", "@data-aos-offset" => \Kwerqy\Ember\com\http\http::is_mobile() ? "150" : "250",]);
			        $buffer->div_([".text-center px-2" => true]);
                        $buffer->xheader(4, "ELEVATE YOUR STYLE", false, [".font-weight-bold m-0" => true]);
                        $buffer->div([".border-bottom border-primary w-100 max-w-150px d-inline-block my-4" => true]);
                        $buffer->div(["*" => "Elevate your style with our unique printing styles - stand out from the crowd with your own fashion line!"]);
			        $buffer->_div();
			    $buffer->_div();
			$buffer->_div();
		$buffer->_div();
	$buffer->_section();

	$buffer->section_([".mb-4" => true, ]);
		$buffer->div_([".container-fluid" => true, ]);
			$buffer->div_([".row align-items-center text-white p-4 p-md-5 justify-content-center" => true, "@style" => "background: linear-gradient(#552200, #321400 100%);", ]);
				$buffer->div_([".col-12 col-md-6 col-lg-5 col-xl-4 my-3 my-md-4" => true, ]);
					$buffer->xheader(3, "CONNECT WITH");
					$buffer->xheader(1, "PATRIOT RSA", false, [".text-warning font-2-5rem" => true, "#font-family" => "Impact"]);
				$buffer->_div();
				$buffer->div_([".col-12 col-md-6 col-lg-5 col-xl-4 font-weight-300" => true, ]);
					$buffer->p([".m-0" => true, "*" => "Patriot RSA specializes in designing and printing custom apparel, headwear, corporate gifting, corporate branding, accessories and brand development with bold, eye catching graphics. Our products aim to promote a sense of pride and unity amongst our clients. We use high-quality materials and printing techniques to ensure that our products are durable, vibrant and make a statement."]);
                    $buffer->xlink("javascript:app.browser.popup('".\Kwerqy\Ember\com\http\http::build_action_url("website/index/newsletter_signup")."', {title:'Sign up to our newsletter', width:'modal-md'})", "Sign up to our newsletter", [".mt-2 btn btn-outline-warning" => true]);
				$buffer->_div();
			$buffer->_div();
		$buffer->_div();
	$buffer->_section();

	$buffer->section_([".my-5" => true]);
		$buffer->div_([".container" => true, ]);
			$buffer->div_([".row mb-4" => true, ]);
				$buffer->div_([".col" => true, ]);
					$buffer->p([".text-center text-primary fs-7 m-0 font-weight-bold" => true, "*" => "OUR SERVICES"]);
					$buffer->xheader(1, "WHAT WE DO?", false, [".text-center" => true, ]);
				$buffer->_div();
			$buffer->_div();
			$buffer->div_([".row justify-content-center align-items-center overflow-hidden" => true, ]);

                $fn_services_card = function($title, $icon, $description, $options = [])use(&$buffer){

                    $options = array_merge([
                        ".card services-card" => true,
                        "@data-aos" => "fade-right",
                        "@data-aos-once" => "true",
                        "@data-aos-offset" => \Kwerqy\Ember\com\http\http::is_mobile() ? "150" : "250",
                    ], $options);

                    $buffer->div_([".col-md-6 col-lg-5 mb-4" => true, ]);
                        $buffer->div_($options);
                            $buffer->div_([".card-body p-4" => true, ]);
                                $buffer->div_([".row align-items-center" => true, "#min-height" => "140px"]);
                                    $buffer->div_([".col-lg-4" => true, ]);
                                        $buffer->xicon($icon, [".fa-4x text-warning" => true]);
                                    $buffer->_div();
                                    $buffer->div_([".col" => true, ]);
                                        $buffer->xheader(6, $title, false, [".font-weight-bold mt-3 mt-lg-0" => true]);
                                        if(is_string($description)){
                                            $buffer->p(["*" => $description, ".fs-8" => true]);
                                        }else if(is_callable($description)){
                                            $buffer->add($description());
                                        }
                                    $buffer->_div();
                                $buffer->_div();
                            $buffer->_div();
                        $buffer->_div();
                    $buffer->_div();
                };

                $fn_services_card("APPAREL", "fa-vest-patches", "For all your apparel needs. From outdoor to  functions, from sports to leisure. We have a wide range of apparel for your requirements. Design it and we brand it and ship straight to you.", [
                    "@data-aos" => "fade-right",
                ]);
                $fn_services_card("GIFTING", "fa-gifts", "From pens to bags. We have all your corporate gifting, functions and any occasion gifting sorted. Brand an item for a perfect gift.", [
                    "@data-aos" => "fade-left",
                ]);
                $fn_services_card("HEADWEAR", "hat-cowboy-side", "Any and all headwear available from us. Peak caps, trucker caps and even old school beanies. Stick your logo or design on any headwear item.", [
                    "@data-aos" => "fade-right",
                ]);
                $fn_services_card("ACCESSORIES", "fa-hiking", "Need a flash drive for work? Need to protect your laptop? Need some colustom printed stationary? From pens to notepads. We have it all. ", [
                    "@data-aos" => "fade-left",
                ]);

                $fn_services_card("OUTDOOR ADVERTISING", "fa-tree", "From banners to truck tarps. Gazebos to table clothes. Get all your events and advertising merchandise supplied and printed by us.", [
                    "@data-aos" => "fade-right",
                ]);

                $buffer->div_([".col-12" => true]);
                    $buffer->div_([".row justify-content-center" => true]);
                        $buffer->div_([".col-10" => true]);
                            $buffer->xlink(\Kwerqy\Ember\com\http\http::build_action_url("website/index/catalogue"), "VIEW OUR CATALOGUES", [".btn btn-primary btn-lg w-100" => true]);
                        $buffer->_div();
                    $buffer->_div();
                $buffer->_div();
			$buffer->_div();

		$buffer->_div();
	$buffer->_section();

	$buffer->section_([".mb-5 p-5 service-summary" => true]);
        $buffer->div_([".container text-center" => true]);
            $buffer->div_([".row mb-4" => true, ]);
                $buffer->div_([".col" => true, ]);
                    $buffer->xheader(1, "SERVICE SUMMARY", false, [".text-center" => true, ]);
                $buffer->_div();
            $buffer->_div();

            $buffer->div_([".row" => true]);
                $buffer->div_([".col-12 col-md-4 fs-7" => true]);
                    $ul = \Kwerqy\Ember\com\ui\ui::make()->ul();
                    $ul->add_item("Screen printing");
                    $ul->add_item("Pad printing");
                    $ul->add_item("DTF printing");
                    $ul->add_item("Full color digital");
                    $ul->add_item("Graphic design");
                    $ul->add_item("Websites");
                    $ul->add_item("Display system development");
                    $buffer->add($ul->build());
                $buffer->_div();
                $buffer->div_([".col-12 col-md-4 fs-7" => true]);
                    $ul = \Kwerqy\Ember\com\ui\ui::make()->ul();
                    $ul->add_item("Large format digital");
                    $ul->add_item("Uv curved flatbed printing");
                    $ul->add_item("Signage systems");
                    $ul->add_item("Exhibition systems");
                    $ul->add_item("C.n.c routing");
                    $ul->add_item("Laser cutting");
                    $ul->add_item("General signage");
                    $buffer->add($ul->build());
                $buffer->_div();
                $buffer->div_([".col-12 col-md-4 fs-7" => true]);
                    $ul = \Kwerqy\Ember\com\ui\ui::make()->ul();
                    $ul->add_item("Vehicle branding");
                    $ul->add_item("Canvas");
                    $ul->add_item("Outdoor displays");
                    $ul->add_item("Indoor displays");
                    $ul->add_item("3D printing");
                    $ul->add_item("Paper printing");
                    $ul->add_item("Packaging solutions");
                    $buffer->add($ul->build());
                $buffer->_div();
            $buffer->_div();
        $buffer->_div();
	$buffer->_section();

	$buffer->section_([".my-5 bg-gray-200 p-5 how-it-works-wrapper" => true]);

        $buffer->div([".circle" => true]);

	    $buffer->div_([".container" => true]);
	        $buffer->div_([".row" => true, "#min-height" => "250px"]);

	            $fn_icon_circle = function($title, $icon, $options = [])use(&$buffer){

	                $options = array_merge([
	                    ".col-12 col-md-4 justify-content-center d-flex mb-5 mb-md-0 cursor-pointer" => true,
	                    "enable_arrow" => true,
                        "@data-aos-offset" => \Kwerqy\Ember\com\http\http::is_mobile() ? "100" : "250",
                        "@data-aos-once" => "true",
                        "!click" => "document.location='".\Kwerqy\Ember\com\http\http::build_action_url("website/index/catalogue")."'",
	                ], $options);

	                $buffer->div_($options);
                        $buffer->div_([".how-it-works-icon-wrapper zoom" => true]);
                            $buffer->div_([".icon-image" => true]);
                                $buffer->xicon($icon);
                            $buffer->_div();
                            $buffer->strong(["*" => $title]);
                        $buffer->_div();
                    $buffer->_div();

                    if($options["enable_arrow"]){
                        $buffer->div_([".col-12 text-center d-md-none mb-5" => true]);
                            $buffer->xicon("fa-arrow-down");
                        $buffer->_div();
                    }
                };

	            $fn_icon_circle("1. SUBMIT A REQUEST WITH A DESIGN", "fa-paste", [".align-self-end" => true, "@data-aos" => "zoom-in-right",]);
	            $fn_icon_circle("2. PRINT & PACKING", "fa-box-open", [".align-self-center" => true, "@data-aos" => "zoom-in",]);
	            $fn_icon_circle("3. COURIER DELIVERED", "fa-truck", [".align-self-start" => true, "enable_arrow" => false, "@data-aos" => "zoom-in-left",]);

	        $buffer->_div();
	    $buffer->_div();

	$buffer->_section();

	$buffer->section_([".my-5 px-2 px-md-5" => true]);

	    $buffer->div_([".container" => true]);
	        $buffer->div_([".row" => true]);
	            $buffer->div_([".col-12" => true]);
                    $carousel = \Kwerqy\Ember\com\ui\ui::make()->carousel();

                    $item_arr = [];
                    $fn_add_item = function($stream, $description = false) use(&$item_arr){
                        $item_arr[] = [
                            "stream" => $stream,
                            "description" => $description,
                        ];
                    };

                    $fn_add_item(\Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/slide-1-cropped.jpg"), "Our collection includes a range of trendy clothing options such as t-shirts, hoodies, and sweatshirts, all of which are designed with unique and eye-catching prints.");
                    $fn_add_item(\Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/slide-2-cropped.png"));
                    $fn_add_item(\Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/slide-3-cropped.jpg"), "Stationary items such as pens, notebooks, and diaries are popular among our personalized corporate gifts with your company's logo or message.");
                    $fn_add_item(\Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/slide-4-cropped.png"));

                    $fn_add_item(\Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/slide-5-cropped.jpg"), "With our commitment to local production and trendy designs, we are an excellent choice for those looking for stylish and comfortable apparel that supports the local economy.");
                    $fn_add_item(\Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/slide-6-cropped.png"));
                    $fn_add_item(\Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/slide-7-cropped.png"));
                    $fn_add_item(\Kwerqy\Ember\com\http\http::get_stream_url(DIR_ASSETS_IMG."/slide-8-cropped.png"));


                    $array_chunk = array_chunk($item_arr, 4);
                    foreach ($array_chunk as $chunk){
                        $carousel->add_html(function() use($chunk){
                            $buffer = \Kwerqy\Ember\com\ui\ui::make()->buffer();
                            $buffer->div_([".row" => true]);

                                foreach ($chunk as $item){
                                    $buffer->div_([".col-12 col-md-6 col-lg-3" => true, "#min-height" => "400px"]);
                                        $buffer->ximage($item["stream"], [".img-fluid clip-image" => true, ".h-180px" => (bool) $item["description"], ".h-350px" => !(bool) $item["description"] ]);
                                        $buffer->p(["*" => $item["description"], ".fs-7 font-weight-200 mt-2" => true]);
                                    $buffer->_div();
                                }
                            $buffer->_div();

                            return $buffer->build();
                        });
                    }

                    $buffer->add($carousel->build());
	            $buffer->_div();
	        $buffer->_div();
	    $buffer->_div();

	$buffer->_section();




});