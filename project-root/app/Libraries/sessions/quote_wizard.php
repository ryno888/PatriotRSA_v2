<?php
namespace sessions;

class quote_wizard extends \Kwerqy\Ember\com\session\intf\session_helper {

    public array $quote_item_arr = [];

    //--------------------------------------------------------------------------------
    protected function __construct($options = []) {
        parent::__construct($options);
    }
    //--------------------------------------------------------------------------------
    public function add_quote_item(array $data) {
        $index = \Kwerqy\Ember\com\str\str::generate_id();

        $this->quote_item_arr[$index] = array_merge([
            "index" => $index,
            "cri_supplier" => "",
            "cri_code" => "",
            "cri_qty" => 0,
            "cri_note" => "",
        ], $data);
    }
    //--------------------------------------------------------------------------------
    public function remove_quote_item($index) {
        if(isset($this->quote_item_arr[$index]))
            unset($this->quote_item_arr[$index]);
    }
    //--------------------------------------------------------------------------------
}