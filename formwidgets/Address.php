<?php namespace Istheweb\Connect\FormWidgets;

use Backend\Classes\FormWidgetBase;
use HTML;

/**
 * Address Form Widget
 */
class Address extends FormWidgetBase
{

    /**
     * {@inheritDoc}
     */
    protected $defaultAlias = 'istheweb_connect_address';

    protected $fieldMap;

    /**
     * {@inheritDoc}
     */
    public function init()
    {
        $this->fieldMap = $this->getConfig('fieldMap', []);
    }

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('widget');
    }

    /**
     * Prepares the list data
     */
    public function prepareVars()
    {
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->getLoadValue();
        $this->vars['field'] = $this->formField;
    }

    public function getFieldMapAttributes()
    {
        $widget = $this->controller->formGetWidget();
        $fields = $widget->getFields();
        $result = [];
        foreach ($this->fieldMap as $map => $fieldName) {

            if (!$field = array_get($fields, $fieldName))
                continue;

            $result['data-input-'.$map] = '#'.$field->getId();
        }

        return HTML::attributes($result);
    }

    /**
     * {@inheritDoc}
     */
    public function loadAssets()
    {
        $this->addJs('https://maps.googleapis.com/maps/api/js?key=AIzaSyDjjr5MIIPah6GKV9Smiyef5WAdJ3YNBKg&libraries=places');
        $this->addJs('js/location-autocomplete.js', 'core');
    }

}
