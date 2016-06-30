<?php
class Cvl_Manufacturer_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
    	$this->loadLayout();   
      $this->getLayout()->getBlock("head")->setTitle($this->__("Manufacturers"));
      $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
	    $breadcrumbs->addCrumb("home", array(
	                "label" => $this->__("Home"),
	                "title" => $this->__("Home"),
	                "link"  => Mage::getBaseUrl()
	           ));
      $breadcrumbs->addCrumb("Manufacturers", array(
                "label" => $this->__("Manufacturers"),
                "title" => $this->__("Manufacturers")
           ));
      $this->renderLayout();
    }

    public function productlistAction()
    {
    	$this->loadLayout();   
      $this->getLayout()->getBlock("head")->setTitle($this->__("Products"));
      $breadcrumbs = $this->getLayout()->getBlock("breadcrumbs");
	    $breadcrumbs->addCrumb("home", array(
	                "label" => $this->__("Home"),
	                "title" => $this->__("Home"),
	                "link"  => Mage::getBaseUrl()
	           ));
	    $breadcrumbs->addCrumb("manufacturers", array(
	                "label" => $this->__("Manufacturers"),
	                "title" => $this->__("Manufacturers"),
	                "link"  => Mage::getUrl('manufacturer')
	           ));
      $breadcrumbs->addCrumb("Products", array(
                "label" => $this->__("Products"),
                "title" => $this->__("Products")
           ));
      $this->renderLayout();
    	
    }
}