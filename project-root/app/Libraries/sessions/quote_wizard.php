<?php
namespace sessions;

class quote_wizard extends \Kwerqy\Ember\com\session\intf\session_helper {

    public array $quote_item_arr = [];
    public string $quote_nr = '';
    public string $quo_email = '';

    //--------------------------------------------------------------------------------
    protected function __construct($options = []) {

        $this->quote_nr = $this->generate_quote_number();

        parent::__construct($options);
    }
    //--------------------------------------------------------------------------------
    private function generate_quote_number() {
        $quote_nr_parts = [];
        $quote_nr_parts[] = "QUO";
        $quote_nr_parts[] = sizeof(glob(DIR_QUOTES."*"));
        $quote_nr_parts[] = time();
        return implode("-", $quote_nr_parts);
    }
    //--------------------------------------------------------------------------------
    public function set_quote_item(array $data, $options = []) {
        $options = array_merge([
            "index" => \Kwerqy\Ember\com\str\str::generate_id()
        ], $options);

        $this->quote_item_arr[$options["index"]] = array_merge([
            "index" => $options["index"],
            "qui_supplier" => "",
            "qui_code" => "",
            "qui_qty" => 0,
            "qui_note" => "",
        ], $data);
    }
    //--------------------------------------------------------------------------------
    public function remove_quote_item($index) {
        if(isset($this->quote_item_arr[$index]))
            unset($this->quote_item_arr[$index]);
    }
    //--------------------------------------------------------------------------------
    public function get_quote_item($index) {
        if(isset($this->quote_item_arr[$index]))
            return $this->quote_item_arr[$index];
    }
    //--------------------------------------------------------------------------------
    protected function on_clear($options = []) {
        $this->quote_item_arr = [];
        $this->quote_nr = '';
        $this->quo_email = '';
    }
    //--------------------------------------------------------------------------------
    public function save() {

        $filename = DIR_QUOTES."/{$this->quote_nr}/quote_data";
        $data_arr = [];
        $data_arr["quote_nr"] = $this->quote_nr;
        $data_arr["quo_email"] = $this->quo_email;
        $data_arr["quote_item_arr"] = $this->quote_item_arr;


        \Kwerqy\Ember\com\os\os::mkdir(dirname($filename));

        $quote_data = fopen($filename, "w");
        fwrite($quote_data, json_encode($data_arr));
        fclose($quote_data);

        return $filename;
    }
    //--------------------------------------------------------------------------------
    public function load($quote_nr) {

        $filename = DIR_QUOTES."/{$quote_nr}/quote_data";

        if(file_exists($filename)){
            $data = json_decode(file_get_contents($filename));
            $this->quote_nr = $data->quote_nr;
            $this->quo_email = $data->quo_email;

            foreach ($data->quote_item_arr as $quote_item){
                $this->quote_item_arr[$quote_item->index] = (array) $quote_item;
            }
            $this->update();
        }
    }
    //--------------------------------------------------------------------------------
}