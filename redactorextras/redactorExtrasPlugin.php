<?php

namespace Craft;

class redactorExtrasPlugin extends BasePlugin
{
    function getName()
    {
         return Craft::t('Redactor Extras');
    }

    function getVersion()
    {
        return '1.3.3';
    }

    function getDeveloper()
    {
        return 'ITC Team';
    }

    function getDeveloperUrl()
    {
        return 'https://www.it-s.vn';
    }

    public function getPluginUrl()
    {
        return 'https://github.com/hungdinhvan/Redactor-Extras';
    }

    public function getDocumentationUrl()
    {
        return $this->getPluginUrl() . '/blob/master/README.md';
    }

    public function getReleaseFeedUrl()
    {
        return 'https://github.com/hungdinhvan/Redactor-Extras/blob/master/changelog.json';
    }

    public function getSourceLanguage()
    {
        return 'en';
    }

    protected function defineSettings()
    {
        return array(
            'scriptButtons' => array(
                AttributeType::Bool, 'default' => false
            ),
            'counter' => array(
                AttributeType::Bool, 'default' => false
            ),
            'alignment' => array(
                AttributeType::Bool, 'default' => false
            ),
            'properties' => array(
                AttributeType::Bool, 'default' => false
            ),
            'definedlinks' => array(
                AttributeType::Bool, 'default' => false
            ),
            'limiter' => array(
                AttributeType::Bool, 'default' => false
            ),
            'fontcolor' => array(
                AttributeType::Bool, 'default' => false
            ),
            'fontfamily' => array(
                AttributeType::Bool, 'default' => false
            ),
            'fontsize' => array(
                AttributeType::Bool, 'default' => false
            ),
            'extraPluginJs'      => AttributeType::String,
            'extraPluginCss'      => AttributeType::String,
        );
    }

    public function getSettingsHtml()
    {
        return craft()->templates->render('redactorextras/_settings', array(
            'settings' => $this->getSettings()
        ));
    }

    public function init()
	{
		if (craft()->request->isCpRequest())
		{
            // Get settings
            $settings = $this->getSettings();

            if($settings->scriptButtons === "1")
            {
                craft()->templates->includeJsResource('redactorextras/plugins/scriptbuttons.js');
            }

            if($settings->counter === "1")
            {
                craft()->templates->includeJsResource('redactorextras/plugins/counter.js');
            }

            if($settings->alignment === "1")
            {
                craft()->templates->includeJsResource('redactorextras/plugins/alignment.js');
                craft()->templates->includeCssResource('redactorextras/plugins/alignment.css');
            }

            if($settings->properties === "1")
            {
                craft()->templates->includeJsResource('redactorextras/plugins/properties.js');
            }

            if($settings->definedlinks === "1")
            {
                craft()->templates->includeJsResource('redactorextras/plugins/definedlinks.js');
            }

            if($settings->limiter === "1")
            {
                craft()->templates->includeJsResource('redactorextras/plugins/limiter.js');
            }

            if($settings->fontcolor === "1")
            {
                craft()->templates->includeJsResource('redactorextras/plugins/fontcolor.js');
            }

            if($settings->fontfamily === "1")
            {
                craft()->templates->includeJsResource('redactorextras/plugins/fontfamily.js');
            }

            if($settings->fontsize === "1")
            {
                craft()->templates->includeJsResource('redactorextras/plugins/fontsize.js');
            }
            if($settings->extraPluginJs != "")
            {
                craft()->templates->includeJsFile($settings->extraPluginJs);
            }
            if($settings->extraPluginCss != "")
            {
                craft()->templates->includeCssFile($settings->extraPluginCss);
            }
		}
	}
}