<?php

class Application_Form_Manager extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }

    public function __construct()
    {
        $this->setName('form_manager');
        parent::__construct();

        $managerName = new Zend_Form_Element_Text('name');
        $managerName->setLabel('Manager name')
            ->setRequired(true)
            ->addValidator('NotEmpty')
            ->addFilter('StringTrim')
            ->addFilter('StripTags');
        $managerSurname = new Zend_Form_Element_Text('surname');
        $managerSurname->setLabel('Manager surname')
            ->setRequired(true)
            ->setRequired(true)
            ->addValidator('NotEmpty')
            ->addFilter('StringTrim')
            ->addFilter('StripTags');
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Add manager');

        $this->addElements(array($managerName, $managerSurname, $submit));
    }
}

