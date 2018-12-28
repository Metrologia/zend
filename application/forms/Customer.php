<?php

class Application_Form_Customer extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
    }

    public function __construct()
    {
        $this->setName('form_customer');
        parent::__construct();

        $customerName = new Zend_Form_Element_Text('name');
        $customerName->setLabel('Customer name')
            ->setRequired(true)
            ->addValidator('NotEmpty')
            ->addFilter('StringTrim')
            ->addFilter('StripTags');
        $customerSurname = new Zend_Form_Element_Text('surname');
        $customerSurname->setLabel('Customer surname')
            ->setRequired(true)
            ->setRequired(true)
            ->addValidator('NotEmpty')
            ->addFilter('StringTrim')
            ->addFilter('StripTags');
        $submit = new Zend_Form_Element_Submit('submit');
        $submit->setLabel('Add customer');

        $this->addElements(array($customerName, $customerSurname, $submit));
    }


}

