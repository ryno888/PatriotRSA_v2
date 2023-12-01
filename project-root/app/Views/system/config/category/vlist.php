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
				    $table->set_key("cat_id");
				    $table->set_title("Category");
				    $table->nav_append_left(function($table, $toolbar){
				        $toolbar->add_button("Add new Category", \app\ui\ui::make()->js_popup(site_url("syscategory/vadd"), [
                            "*title" => "Add new Category",
                            "*width" => "modal-md",
							"*height_class" => "min-h-30vh"
                        ]), [".btn-sm" => true, "icon" => "fa-plus"]);
                    });
				    $table->set_search_field("cat_name");
				    $table->set_sql(function(){
				        $sql = \Kwerqy\Ember\com\db\sql\select::make();
				        $sql->select("cat_id AS id");
				        $sql->select("category.*");
//				        $sql->from_subquery("SELECT cat_id FROM category", "sub_category");
//				        $sql->left_join_property(PRODUCT_PROPERTY_COLOR_DESCRIPTION, "category", "color_description");
				        $sql->from("category");
				        return $sql;
                    });
				    $table->add_field("Title", "cat_name");

				    $table->add_action_dropdown(function($item_data, $dropdown, $table){
				        $dropdown->add_link(site_url("sysproduct/vmanage/id/{$item_data["cat_slug"]}"), "Edit");
                    });

                    $buffer->add($table->build());
				$buffer->_div();
			$buffer->_div();
		$buffer->_div();

});
