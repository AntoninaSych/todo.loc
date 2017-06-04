<?php
class BaseControllers{
    protected   $_model;
    protected   $_view;
    # private  $instance;

    public  function __construct()
    {
        $this->_model=new BaseModels();
        $this->_view=new BaseViewes();
    }

    public function action_index()
    {
        $data=$this->_model->getData();
        $this->_view->render($template,$page,$data);

    }


}
