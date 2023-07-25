<?php

namespace App\Controllers;

class Website extends BaseController {
    //---------------------------------------------------------------------------------------
    public function index($page) {

        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("website", "website/index/{$page}");
    }
    //---------------------------------------------------------------------------------------
    public function catalogue($page) {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("website", "website/catalogue/$page", [
            "pre_layout" => [],
            "post_layout" => [],
        ]);
    }
    //---------------------------------------------------------------------------------------
    public function quote($page) {
        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("website", "website/quote/$page");
    }
    //---------------------------------------------------------------------------------------
    public function message() {

        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("website", "website/index/message");
    }
    //---------------------------------------------------------------------------------------
    public function error() {

        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("website", "website/index/error");
    }
    //---------------------------------------------------------------------------------------
    public function xcontact() {

        if(!\Kwerqy\Ember\com\captcha\captcha::is_valid()){
            return \Kwerqy\Ember\com\http\http::ajax_response(["redirect" => \Kwerqy\Ember\com\http\http::get_error_url(ERROR_CODE_CAPTCHA_ERROR)]);
        }

        if(!\Kwerqy\Ember\com\http\http::is_valid_form_submit()){
		    return \Kwerqy\Ember\com\http\http::ajax_response(["redirect" => \Kwerqy\Ember\com\http\http::get_error_url(ERROR_CODE_ACCESS_DENIED)]);
        }

         $per_firstname = \Kwerqy\Ember\Ember::$request->get('per_firstname', TYPE_STRING);
		 $per_lastname = \Kwerqy\Ember\Ember::$request->get('per_lastname', TYPE_STRING);
		 $per_email = \Kwerqy\Ember\Ember::$request->get('per_email', TYPE_STRING);
		 $message = \Kwerqy\Ember\Ember::$request->get('message', TYPE_TEXT);

		 $error_arr = [];
		 if(!$per_firstname) $error_arr["per_firstname"] = "Name is required";
		 if(!$per_lastname) $error_arr["per_lastname"] = "Surname is required";
		 if(!$per_email) $error_arr["per_email"] = "Email is required";
		 if(!$message) $error_arr["message"] = "";

		 if($error_arr) return \Kwerqy\Ember\com\http\http::ajax_response(["errors" => $error_arr]);

		if(!\Kwerqy\Ember\com\data\data::is_valid_email( $per_email)){
		    return \Kwerqy\Ember\com\http\http::ajax_response(["redirect" => \Kwerqy\Ember\com\http\http::get_error_url(ERROR_CODE_ACCESS_DENIED)]);
        }

		$email = \Kwerqy\Ember\com\email\email::make();
        $email->set_to(getenv("ember.email.contact"));
        $email->set_from(getenv("ember.email.from"), getenv("ember.name").' - Contact Request');
        $email->set_subject("Contact Request From Website");

        $email->set_body(function()use($per_firstname, $per_lastname, $per_email, $message){
            $buffer = \Kwerqy\Ember\com\ui\ui::make()->buffer();
            $buffer->p(["*" => "Dear Admin"]);
            $buffer->p(["*" => "You have received a new contact request from your website."]);
            $buffer->p(["*" => "Here are the details"]);

            $buffer->p_();
                $buffer->strong(["*" => "Firstname: "])->span(["*" =>  $per_firstname, ".comment" => true])->br();
                $buffer->strong(["*" => "Surname: "])->span(["*" =>  $per_lastname, ".comment" => true])->br();
                $buffer->strong(["*" => "Email: "])->span(["*" =>  $per_email, ".comment" => true])->br()->br();
                $buffer->strong(["*" => "Message: "])->span(["*" => nl2br( $message), ".comment" => true])->br();
            $buffer->_p();

            $buffer->p(["*" => "Kind Regards", "#margin" => "0px"]);
            $buffer->strong(["*" => getenv("ember.name"). " Team"]);

            return $buffer->build();
        });
        $email->send();

        return \Kwerqy\Ember\com\http\http::ajax_response(["redirect" => \Kwerqy\Ember\com\http\http::get_message_url(MESSAGE_CODE_100)]);

    }
    //---------------------------------------------------------------------------------------
    public function xremove_quote_item() {
        $index = \Kwerqy\Ember\Ember::$request->get('index', TYPE_STRING);
        if($index){
            $quote_wizard = \sessions\quote_wizard::make();
            $quote_wizard->remove_quote_item($index);
            $quote_wizard->update();

            return \Kwerqy\Ember\com\http\http::ajax_response(["js" => "
                quote_panel.refresh({no_overlay:true});
            "]);

        }
    }
    //---------------------------------------------------------------------------------------
    public function xclear_quote() {
        $quote_wizard = \sessions\quote_wizard::make();
        $quote_wizard->clear(["delete" => true]);

        return \Kwerqy\Ember\com\http\http::ajax_response(["js" => "
            quote_panel.refresh({no_overlay:true});
        "]);
    }
    //---------------------------------------------------------------------------------------
    public function xadd_quote_item() {

//        if(!\Kwerqy\Ember\com\captcha\captcha::is_valid()){
//            $solid = \Kwerqy\Ember\com\solid_classes\helper::make()->get_from_constant("ERROR_CODE_CAPTCHA_ERROR");
//            return \Kwerqy\Ember\com\http\http::ajax_response(["alert" => $solid->get_description(), "title" => $solid->get_name()]);
//        }

        if(!\Kwerqy\Ember\com\http\http::is_valid_form_submit()){
		    return \Kwerqy\Ember\com\http\http::ajax_response(["redirect" => \Kwerqy\Ember\com\http\http::get_error_url(ERROR_CODE_ACCESS_DENIED)]);
        }

        $index = \Kwerqy\Ember\Ember::$request->get('index', TYPE_STRING);
        $quote_wizard = \sessions\quote_wizard::make();

         $quote_wizard->set_quote_item([
            "qui_supplier" => \Kwerqy\Ember\Ember::$request->get('qui_supplier', TYPE_STRING),
            "qui_code" => \Kwerqy\Ember\Ember::$request->get('qui_code', TYPE_STRING),
            "qui_qty" => \Kwerqy\Ember\Ember::$request->get('qui_qty', TYPE_STRING),
            "qui_note" => \Kwerqy\Ember\Ember::$request->get('qui_note', TYPE_TEXT),
         ], ["index" => $index]);

         $quote_wizard->update();

        return \Kwerqy\Ember\com\http\http::ajax_response(["js" => "
            $('#add_quote_item .btn-close').click();
            quote_panel.refresh({no_overlay:true});
        "]);

    }
    //---------------------------------------------------------------------------------------
    public function xedit_quote_item() {

//        if(!\Kwerqy\Ember\com\captcha\captcha::is_valid()){
//            $solid = \Kwerqy\Ember\com\solid_classes\helper::make()->get_from_constant("ERROR_CODE_CAPTCHA_ERROR");
//            return \Kwerqy\Ember\com\http\http::ajax_response(["alert" => $solid->get_description(), "title" => $solid->get_name()]);
//        }

        if(!\Kwerqy\Ember\com\http\http::is_valid_form_submit()){
		    return \Kwerqy\Ember\com\http\http::ajax_response(["redirect" => \Kwerqy\Ember\com\http\http::get_error_url(ERROR_CODE_ACCESS_DENIED)]);
        }

        $index = \Kwerqy\Ember\Ember::$request->get('index', TYPE_STRING);
        $quote_wizard = \sessions\quote_wizard::make();

        if($index){
            $quote_wizard->set_quote_item([
                "qui_supplier" => \Kwerqy\Ember\Ember::$request->get('qui_supplier', TYPE_STRING),
                "qui_code" => \Kwerqy\Ember\Ember::$request->get('qui_code', TYPE_STRING),
                "qui_qty" => \Kwerqy\Ember\Ember::$request->get('qui_qty', TYPE_STRING),
                "qui_note" => \Kwerqy\Ember\Ember::$request->get('qui_note', TYPE_TEXT),
             ], ["index" => $index]);
        }

         $quote_wizard->update();

        return \Kwerqy\Ember\com\http\http::ajax_response(["js" => "
            $('#edit_quote_item .btn-close').click();
            quote_panel.refresh({no_overlay:true});
        "]);

    }
    //---------------------------------------------------------------------------------------
    public function xverify_quote_email() {

//        if(!\Kwerqy\Ember\com\captcha\captcha::is_valid()){
//            $solid = \Kwerqy\Ember\com\solid_classes\helper::make()->get_from_constant("ERROR_CODE_CAPTCHA_ERROR");
//            return \Kwerqy\Ember\com\http\http::ajax_response(["alert" => $solid->get_description(), "title" => $solid->get_name()]);
//        }

        if(!\Kwerqy\Ember\com\http\http::is_valid_form_submit()){
		    return \Kwerqy\Ember\com\http\http::ajax_response(["redirect" => \Kwerqy\Ember\com\http\http::get_error_url(ERROR_CODE_ACCESS_DENIED)]);
        }

        $quote_wizard = \sessions\quote_wizard::make();
        $quote_wizard->quo_email = \Kwerqy\Ember\Ember::$request->get('quo_email', TYPE_STRING);
        $quote_wizard->update();

        if(!\Kwerqy\Ember\com\http\http::is_valid_email($quote_wizard->quo_email)){
            return \Kwerqy\Ember\com\http\http::ajax_response(["errors" => [
                "quo_email" => "Email address is not valid"
            ]]);
        }

        $quote_wizard->save();

        $email = \Kwerqy\Ember\com\email\email::make();
        $email->set_to($quote_wizard->quo_email);
        $email->set_subject("Verify Email - Quote #{$quote_wizard->quote_nr}");
        $email->set_body(function()use($quote_wizard){

            $buffer = \Kwerqy\Ember\com\ui\ui::make()->buffer();
            $buffer->p(["*" => "Thank you for requesting a quote."]);
            $buffer->p(["*" => "Before we can continue, please take a moment to verify your email address by clicking the link below."]);

            $buffer->p_();
                $buffer->xlink(site_url("website/quote/complete_quote/quote_nr/{$quote_wizard->quote_nr}/id/{$quote_wizard->id}"), "Verify my Email Address");
            $buffer->_p();

            $buffer->p(["*" => "Kind Regards", "#margin" => "0px"]);
            $buffer->strong(["*" => getenv("ember.name"). " Team"]);

            return $buffer->build();

        });
        $email->send();

        return \Kwerqy\Ember\com\http\http::ajax_response(["redirect" => \Kwerqy\Ember\com\http\http::get_message_url(MESSAGE_CODE_102)]);

    }
    //---------------------------------------------------------------------------------------
    public function newsletter_signup() {

        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("website", "website/index/newsletter_signup", [
            "pre_layout" => [],
            "post_layout" => [],
        ]);
    }
    //---------------------------------------------------------------------------------------
    public function add_quote_item() {

        return \Kwerqy\Ember\com\ui\ui::make()->ci_controller("website", "website/index/add_quote_item", [
            "pre_layout" => [],
            "post_layout" => [],
        ]);
    }
    //---------------------------------------------------------------------------------------
    public function xdownload_quote_item() {

        $quote_nr = \Kwerqy\Ember\Ember::$request->get('quote_nr', TYPE_STRING);
        $id = \Kwerqy\Ember\Ember::$request->get('id', TYPE_STRING);
        $filename = urldecode(\Kwerqy\Ember\Ember::$request->get('filename', TYPE_STRING));

        if($quote_nr){
            $quote_wizard = \sessions\quote_wizard::make();
            $result = $quote_wizard->load($quote_nr, ["update" => false]);
            if($result){
                $quote_item = $quote_wizard->get_quote_item($id);
                return $this->response->download($filename, file_get_contents("{$quote_item->file_directory}/{$filename}"));
            }

        }
    }
    //---------------------------------------------------------------------------------------
    public function xdownload_quote() {

        $quote_nr = \Kwerqy\Ember\Ember::$request->get('quote_nr', TYPE_STRING);

        if($quote_nr){
            $quote_wizard = \sessions\quote_wizard::make();


            $filename = DIR_TEMP."/quotes/{$quote_wizard->quote_nr}/{$quote_wizard->quote_nr}.zip";

            //create temp folder
            \Kwerqy\Ember\com\os\os::mkdir(dirname($filename));

            $zip = new \ZipArchive();

            if ($zip->open($filename, \ZipArchive::CREATE | \ZipArchive::OVERWRITE) != TRUE) {
                throw new \Exception("Could not open archive");
            }

            //create data file
            $file_contents = file_get_contents(DIR_QUOTES."/{$quote_wizard->quote_nr}/quote_data");
            $file_contents = json_decode($file_contents);

            $zip->addFromString("{$quote_wizard->quote_nr}.txt", print_r($file_contents, true));

            $rootPath = DIR_QUOTES."/{$quote_wizard->quote_nr}/uploads/";
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($rootPath),
                \RecursiveIteratorIterator::LEAVES_ONLY
            );

            foreach ($files as $name => $file)
            {
                // Skip directories (they would be added automatically)
                if (!$file->isDir())
                {
                    // Get real and relative path for current file
                    $filePath = $file->getRealPath();
                    $relativePath = substr($filePath, strlen($rootPath) + 1);

                    // Add current file to archive
                    $zip->addFile($filePath, $relativePath);
                }
            }

            // close and save archive
            $zip->close();

            $result = $this->response->download(basename($filename), file_get_contents($filename));

            \Kwerqy\Ember\com\os\os::removedir(dirname($filename));

            return $result;

        }
    }
    //---------------------------------------------------------------------------------------
    public function xcomplete_quote() {

//        if (!\Kwerqy\Ember\com\captcha\captcha::is_valid()) {
//            $solid = \Kwerqy\Ember\com\solid_classes\helper::make()->get_from_constant("ERROR_CODE_CAPTCHA_ERROR");
//            return \Kwerqy\Ember\com\http\http::ajax_response(["alert" => $solid->get_description(), "title" => $solid->get_name()]);
//        }

        if (!\Kwerqy\Ember\com\http\http::is_valid_form_submit()) {
            return \Kwerqy\Ember\com\http\http::ajax_response(["redirect" => \Kwerqy\Ember\com\http\http::get_error_url(ERROR_CODE_ACCESS_DENIED)]);
        }


        $quote_wizard = \sessions\quote_wizard::make();
        $quote_wizard->per_firstname = \Kwerqy\Ember\Ember::$request->get('per_firstname', TYPE_STRING);
        $quote_wizard->per_lastname = \Kwerqy\Ember\Ember::$request->get('per_lastname', TYPE_STRING);
        $quote_wizard->per_contactnr = \Kwerqy\Ember\Ember::$request->get('per_contactnr', TYPE_STRING);
        $quote_wizard->per_company_name = \Kwerqy\Ember\Ember::$request->get('per_company_name', TYPE_STRING);
        $quote_wizard->per_tellnr_work = \Kwerqy\Ember\Ember::$request->get('per_tellnr_work', TYPE_STRING);
        $quote_wizard->per_address_shipping = \Kwerqy\Ember\Ember::$request->get('per_address_shipping', TYPE_TEXT);
        $quote_wizard->per_address_billing = \Kwerqy\Ember\Ember::$request->get('per_address_billing', TYPE_TEXT);

        $error_arr = [];
        if (!$quote_wizard->per_firstname) $error_arr["per_firstname"] = "Name is required";
        if (!$quote_wizard->per_lastname) $error_arr["per_lastname"] = "Surname is required";
        if (!$quote_wizard->per_contactnr) $error_arr["per_contactnr"] = "Contact Number";
        if (!$quote_wizard->per_company_name) $error_arr["per_company_name"] = "Company Name";
        if (!$quote_wizard->per_tellnr_work) $error_arr["per_tellnr_work"] = "Company Contact Number";
        if (!$quote_wizard->per_address_shipping) $error_arr["per_address_shipping"] = "Shipping Address";
        if (!$quote_wizard->per_address_billing) $error_arr["per_address_billing"] = "Billing Address";

        if ($error_arr) return \Kwerqy\Ember\com\http\http::ajax_response(["errors" => $error_arr]);

        $quote_wizard->quo_is_complete = true;
        $quote_wizard->save();

        $email = \Kwerqy\Ember\com\email\email::make();
        $email->set_to(getenv("ember.email.order"));
        $email->set_subject("New Quote Request - #{$quote_wizard->quote_nr}");
        $email->set_body(function () use ($quote_wizard) {

            $buffer = \Kwerqy\Ember\com\ui\ui::make()->buffer();
            $buffer->p(["*" => "A new quote has been submitted from the website."]);

            $buffer->p_();
            $buffer->add("Please ")->xlink(site_url("website/quote/view_quote/quote_nr/{$quote_wizard->quote_nr}"), "Click Here")->add(" to view the quote.");
            $buffer->_p();

            $buffer->p(["*" => "Kind Regards", "#margin" => "0px"]);
            $buffer->strong(["*" => getenv("ember.name") . " Team"]);

            return $buffer->build();

        });
        $email->send();

        return \Kwerqy\Ember\com\http\http::ajax_response(["redirect" => \Kwerqy\Ember\com\http\http::get_message_url(MESSAGE_CODE_100)]);

    }
    //---------------------------------------------------------------------------------------
}


