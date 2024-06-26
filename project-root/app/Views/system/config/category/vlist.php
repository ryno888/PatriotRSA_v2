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
				    $table->set_search_field("CONCAT(cat_name, parent_cat_name)");
				    $table->set_sql(function(){
				        $sql = \Kwerqy\Ember\com\db\sql\select::make();
				        $sql->select("category.cat_id AS id");
				        $sql->select("category.*");
				        $sql->select("parent_category.cat_name AS parent_cat_name");
				        $sql->from("category");
				        $sql->left_join("category AS parent_category", "(category.cat_ref_category = parent_category.cat_id)");
				        return $sql;
                    });


				    $table->add_field("Title", "cat_name");
				    $table->add_field("Parent Category", "parent_cat_name");

				    $table->add_action_dropdown(function($item_data, $dropdown, $table){
				        $dropdown->add_link("javascript:".\app\ui\ui::make()->js_popup(site_url("syscategory/vedit/id/{$item_data["cat_id"]}"), [
                            "*title" => "Edit Category",
                            "*width" => "modal-md",
							"*height_class" => "min-h-30vh"
                        ]), "Edit");
                    });

                    $buffer->add($table->build());
				$buffer->_div();
			$buffer->_div();
		$buffer->_div();

});
