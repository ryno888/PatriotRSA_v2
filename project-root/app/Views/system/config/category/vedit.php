<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function ($buffer, $controller, $view) {

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */

    $category = \Kwerqy\Ember\Ember::dbt("category")->requestdb("id");

    $buffer->form("syscategory/xedit/id/{$category->id}");

    $buffer->div_([".container-fluid" => true,]);
        $buffer->div_([".row" => true,]);
            $buffer->div_([".col-12" => true,]);
                $buffer->dbinput($category, "cat_name", ["required" => true]);
                $buffer->dbinput($category, "cat_ref_category", ["value_option_arr" => \Kwerqy\Ember\Ember::dbt("category")->select_list(["where" => "cat_ref_category IS NULL"])]);
            $buffer->_div();
        $buffer->_div();

        $buffer->div_([".row my-3" => true,]);
            $buffer->div_([".col-12 d-flex" => true,]);
                $buffer->xbutton("Cancel", "app.browser.close_popup()", [".w-100 me-2 btn-secondary" => true]);
                $buffer->submit_button([".w-100" => true]);
            $buffer->_div();
        $buffer->_div();

    $buffer->_div();

});
