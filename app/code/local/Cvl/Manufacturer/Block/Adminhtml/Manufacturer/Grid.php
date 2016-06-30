<?php

class Cvl_Manufacturer_Block_Adminhtml_Manufacturer_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('manufacturerGrid');
      $this->setDefaultSort('id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('manufacturer/manufacturer')->getCollection();
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('id', array(
          'header'    => Mage::helper('manufacturer')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'id',
      ));

      $this->addColumn('name', array(
          'header'    => Mage::helper('manufacturer')->__('Manufacturer Name'),
          'align'     =>'left',
          'index'     =>'name',
          'type'      =>'text',
      ));

      $this->addColumn('est_year', array(
          'header'    => Mage::helper('manufacturer')->__('Established Year'),
          'align'     =>'left',
          'index'     =>'est_year',
          'type'      =>'text',
      ));
      
      $this->addColumn('description', array(
          'header'    => Mage::helper('manufacturer')->__('Description'),
          'align'     =>'left',
          'index'     =>'description',
          'type'      =>'text',
      ));
      
      $this->addColumn('filename', array(
          'header'    => Mage::helper('manufacturer')->__('Thumbnail'),
          'renderer'  => 'manufacturer/adminhtml_grid_renderer1_image',
          'filter'=>false,
          'align'     =>'left',
          'type'  => 'image',
          'width'     => '100px',
          'index'     => 'filename',
      ));

      $this->addColumn('status', array(
          'header'    => Mage::helper('manufacturer')->__('Status'),
          'align'     => 'left',
          'width'     => '80px',
          'index'     => 'status',
          'type'      => 'options',
          'options'   => array(
              1 => 'Enabled',
              2 => 'Disabled',
          ),
      ));
	  
        $this->addColumn('action',
            array(
                'header'    =>  Mage::helper('manufacturer')->__('Action'),
                'width'     => '100',
                'type'      => 'action',
                'getter'    => 'getId',
                'actions'   => array(
                    array(
                        'caption'   => Mage::helper('manufacturer')->__('Edit'),
                        'url'       => array('base'=> '*/*/edit'),
                        'field'     => 'id'
                    )
                ),
                'filter'    => false,
                'sortable'  => false,
                'index'     => 'stores',
                'is_system' => true,
        ));
		$this->addExportType('*/*/exportCsv', Mage::helper('manufacturer')->__('CSV'));
		$this->addExportType('*/*/exportXml', Mage::helper('manufacturer')->__('XML'));
	  
      return parent::_prepareColumns();
  }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('id');
        $this->getMassactionBlock()->setFormFieldName('manufacturer');

        $this->getMassactionBlock()->addItem('delete', array(
             'label'    => Mage::helper('manufacturer')->__('Delete'),
             'url'      => $this->getUrl('*/*/massDelete'),
             'confirm'  => Mage::helper('manufacturer')->__('Are you sure?')
        ));

        $statuses = Mage::getSingleton('manufacturer/status')->getOptionArray();

        array_unshift($statuses, array('label'=>'', 'value'=>''));
        $this->getMassactionBlock()->addItem('status', array(
             'label'=> Mage::helper('manufacturer')->__('Change status'),
             'url'  => $this->getUrl('*/*/massStatus', array('_current'=>true)),
             'additional' => array(
                    'visibility' => array(
                         'name' => 'status',
                         'type' => 'select',
                         'class' => 'required-entry',
                         'label' => Mage::helper('manufacturer')->__('Status'),
                         'values' => $statuses
                     )
             )
        ));
        return $this;
    }

  public function getRowUrl($row)
  {
      return $this->getUrl('*/*/edit', array('id' => $row->getId()));
  }

}