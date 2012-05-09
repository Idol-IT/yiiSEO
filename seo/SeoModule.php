<?php
/**
 * SeoModule class file
 *
 * @author Ivan Suvorov <ivan@idol-studio.com>
 * @link http://idol-it.com/
 * @copyright Copyright &copy; 2012 Idol-IT
 * @license BSD licence
 */

class SeoModule extends CWebModule
{
    private $_assetsUrl;
	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'seo.models.*',
			'seo.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}

    public function getAssetsUrl()
    {
        if($this->_assetsUrl===null)
            $this->_assetsUrl=Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.modules.seo.assets'));
        return $this->_assetsUrl;
    }

    /**
     * @param string the base URL that contains all published asset files.
     */
    public function setAssetsUrl($value)
    {
        $this->_assetsUrl=$value;
    }
}
