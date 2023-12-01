<?php
\Kwerqy\Ember\com\ui\ui::make()->ci_view((empty($controller) ?: $controller), function($buffer, $controller, $view){

    /**
     * @var $buffer \Kwerqy\Ember\com\ui\set\bootstrap\html
     * @var $controller \Kwerqy\Ember\com\ci\controller\controller
     * @var $view \Kwerqy\Ember\com\ci\view\view
     */
    
    /**
     * @var $session \Kwerqy\Ember\com\incl\dropzone\session
     */
    $session = $controller->dropzone_session;

    $uploaded_file_data = $session->get_uploaded_file($controller->file_index);

    $cropper = \Kwerqy\Ember\com\incl\dropzone\cropper::make();
    $cropper->set_src($uploaded_file_data["original"]);
    $cropper->add_data("file_index", $controller->file_index);
    $cropper->add_data("session_id", $session->session_id);
    $cropper->set_width($session->crop_width);
    $cropper->set_height($session->crop_height);
    $cropper->set_on_close("$session->dropzone_id.removeUploadedFile('{$controller->file_index}');");

    $buffer->add($cropper->build());
    
});

