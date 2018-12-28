<?php


class CustomersController extends Zend_Controller_Action
{
    public function init()
    {
        parent::init();
    }

    public function indexAction(){
        $this->view->title = "Customers list";
        $this->view->headTitle($this->view->title);

        $customer = new Application_Model_Customer();
        $this->view->customers = $customer->getAllCustomers();
    }

    public function addAction(){
        $this->view->title = "Add new customer";
        $this->view->headTitle($this->view->title);
        $form = new Application_Form_Customer();

        if ($this->getRequest()->isPost()){
            if ($form->isValid($this->getRequest()->getPost())){
                $customer = new Application_Model_Customer();
                $customer->fill($form->getValues());
                $customer->save();
                $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;
    }

    public function deleteAction(){
        $id = $this->_getParam('id');
        $customer = new Application_Model_Customer($id);
        $customer->delete();
        $this->_helper->redirector('index');
    }

    public function viewAction(){
        $this->view->title = "Customer data";
        $this->view->headTitle($this->view->title);
        $id = $this->_getParam('id');
        $customer = new Application_Model_Customer($id);
        $this->view->customer = $customer;
    }

    public function editAction(){
        $this->view->title = "Add task to customer";
        $this->view->headTitle($this->view->title);

        $id = $this->_getParam('id');
        $form = new Application_Form_Task();

        if ($this->getRequest()->isPost()){
            if ($form->isValid($this->getRequest()->getPost())){
                $task = new Application_Model_Task();
                $task->fill($form->getValues());
                $task->customer_id = $id;
                $task->manager_id = $id;
                $task->save();
                $this->_helper->redirector('index');
            }
        }

        $this->view->form = $form;
    }
}