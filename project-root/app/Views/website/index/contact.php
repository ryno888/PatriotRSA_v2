<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */

    $buffer->xspace(50);

    $buffer->section_([".py-4 py-xl-5" => true, ]);
        $buffer->div_([".container" => true, ]);

            $buffer->div_([".row mt-5" => true, ]);
                $buffer->div_([".col text-center" => true, ]);
                    $buffer->xheader(1, "Contact Us");
                    $buffer->hr();
                $buffer->_div();
            $buffer->_div();

            $buffer->div_([".row d-flex justify-content-center" => true, ]);
                $buffer->div_([".col-md-6 col-xl-4" => true, ]);
                    $buffer->div_([".d-flex flex-column justify-content-center align-items-start h-100" => true, ]);

                        $buffer->a_(["@href" => "https://wa.me/".getenv("ember.website.social.whatsapp.nr"), "@target" => "_blank", ".text-dark" => true]);
                            $buffer->div_([".d-flex align-items-center p-3" => true, ]);
                                $buffer->div_([".bg-primary rounded-2 text-white p-3 fs-3 d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md" => true, ]);
                                    $buffer->xicon("fab-whatsapp");
                                $buffer->_div();
                                $buffer->div_([".px-2" => true, ]);
                                        $buffer->h6_([".font-weight-bold mb-0" => true, ]);
                                            $buffer->add("Need Help? Chat with us");
                                        $buffer->_h6();
                                        $buffer->p_([".mb-0" => true, ]);
                                            $buffer->add("Whatsapp");
                                        $buffer->_p();
                                $buffer->_div();
                            $buffer->_div();
                        $buffer->_a();

                        $buffer->a_(["@href" => "mailto:".getenv("ember.website.social.email.addr"), "@target" => "_blank", ".text-dark" => true]);
                            $buffer->div_([".d-flex align-items-center p-3" => true, ]);
                                $buffer->div_([".bg-primary rounded-2 text-white p-3 fs-3 d-flex flex-shrink-0 justify-content-center align-items-center d-inline-block bs-icon bs-icon-md" => true, ]);
                                    $buffer->xicon("fa-envelope");
                                $buffer->_div();
                                $buffer->div_([".px-2" => true, ]);
                                        $buffer->h6_([".font-weight-bold mb-0" => true, ]);
                                            $buffer->add("Email");
                                        $buffer->_h6();
                                        $buffer->p_([".mb-0" => true, ]);
                                            $buffer->add(getenv("ember.email.contact"));
                                        $buffer->_p();
                                $buffer->_div();
                            $buffer->_div();
                        $buffer->_a();
                    $buffer->_div();
                $buffer->_div();
                $buffer->div_([".col-md-6 col-xl-4" => true, ]);

                    $buffer->form("");
                    $buffer->xitext("per_firstname", false, false, ["@placeholder" => "Name", ".mb-3" => true, "required" => true]);
                    $buffer->xitext("per_lastname", false, false, ["@placeholder" => "Surname", ".mb-3" => true, "required" => true]);
                    $buffer->xitext("per_email", false, false, ["@placeholder" => "Email", ".mb-3" => true, "required" => true]);
                    $buffer->xitextarea("message", false, false, ["@placeholder" => "Message", ".mb-3" => true, "required" => true]);
                    $buffer->xbutton("Submit", false, [".btn-submit w-100" => true]);

                    $buffer->add(\Kwerqy\Ember\com\captcha\captcha::get_html());

                    $action = \Kwerqy\Ember\com\http\http::build_action_url("website/xcontact");
                    \Kwerqy\Ember\com\js\js::add_domready_script("
                        $('body').on('click', '.btn-submit', function(e){
                            let btn = $(this);
                            e.preventDefault();
                            
                            app.html.set_btn_loading(btn);
                            if (typeof grecaptcha != 'undefined') {
                                grecaptcha.ready(function() {
                                    grecaptcha.execute('".getenv("ember.google.sitekey")."', {action: 'submit'}).then(function(token) {
                                        ".\Kwerqy\Ember\com\js\js::ajax($action, [
                                            "*no_overlay" => true,
                                            "*data" => "!{'g-recaptcha-response':token}",
                                            "*form" => "#{$buffer->form_id}",
                                            "*beforeSend" => "function(){ 
                                                $('#{$buffer->form_id}').find('.form-control').removeClass('is-invalid'); 
                                            }",
                                            "*success" => "function(response){
                                                {$buffer->form_id}.process_form_response(response);
                                                app.html.unset_btn_loading(btn);
                                            }",
                                        ])."
                                    });
                                });
                            }else{
                                ".\Kwerqy\Ember\com\js\js::ajax($action, [
                                    "*no_overlay" => true,
                                    "*form" => "#{$buffer->form_id}",
                                    "*beforeSend" => "function(){ 
                                        $('#{$buffer->form_id}').find('.form-control').removeClass('is-invalid'); 
                                    }",
                                    "*success" => "function(response){
                                        {$buffer->form_id}.process_form_response(response);
                                        app.html.unset_btn_loading(btn);
                                    }",
                                ])."
                            }
                        })
                    ");
                $buffer->_div();
            $buffer->_div();
        $buffer->_div();
    $buffer->_section();

});

