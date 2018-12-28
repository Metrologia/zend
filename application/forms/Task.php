<?php

class Application_Form_Task extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }

    public function __construct()
    {
        $this->setName('form_task');
        parent::__construct();

        $taskText = new Zend_Form_Element_Text('text');
        $taskText->setLabel('Task')
            ->setRequired(true)
            ->addValidator('NotEmpty');

        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Add task');

        $this->addElements(array($taskText, $submit));
    }
}

