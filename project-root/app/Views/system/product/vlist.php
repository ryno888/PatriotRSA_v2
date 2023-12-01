<?php

\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */

		$buffer->div_([".container-fluid" => true, ]);
			$buffer->div_([".row" => true, ]);
				$buffer->div_([".col-12" => true, ]);

				    $table = \Kwerqy\Ember\com\ui\ui::make()->table();
				    $table->set_key("pro_id");
				    $table->set_title("Products");
				    $table->nav_append_left(function($table, $toolbar){
				        $toolbar->add_button("Add new Product", \app\ui\ui::make()->js_popup(site_url("sysproduct/vadd"), [
                            "*title" => "Add new Product",
                            "*width" => "modal-xl",
                        ]), [".btn-sm" => true, "icon" => "fa-plus"]);
                    });
				    $table->set_search_field("pro_name");
				    $table->set_sql(function(){
				        $sql = \Kwerqy\Ember\com\db\sql\select::make();
				        $sql->select("pro_id AS id");
				        $sql->select("product.*");
				        $sql->from("product");
				        return $sql;
                    });
				    $table->add_field("Title", "pro_name");
				    $table->add_field("Published", "id", ["nosort" => true, "function" => function($content, $item_index, $field_index, $table){
				        $product = \Kwerqy\Ember\Ember::dbt("product")->get_fromarray($table->item_arr[$item_index]);
				        return \app\ui\ui::make()->iswitch("switch_{$product->id}", $product->pro_is_published, false, [
				            "!click" => \Kwerqy\Ember\com\js\js::ajax(site_url("sysproduct/xtoggle_product/slug/{$product->pro_slug}/field/pro_is_published")),
                            "/wrapper" => [".mt-1" => true]
                        ]);
                    }]);
				    $table->add_field("Price", "pro_price", ["function" => function($content, $item_index, $field_index, $table){
				        return \Kwerqy\Ember\com\num\num::currency($content);
                    }]);

				    $table->add_action_dropdown(function($item_data, $dropdown, $table){
				        $dropdown->add_link(site_url("sysproduct/vmanage/id/{$item_data["pro_slug"]}"), "Edit");
                    });

                    $buffer->add($table->build());
				$buffer->_div();
			$buffer->_div();
		$buffer->_div();

});
