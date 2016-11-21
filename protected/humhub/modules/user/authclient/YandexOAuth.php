<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace humhub\modules\user\authclient;



class YandexOAuth extends \yii\authclient\clients\YandexOAuth
{

	
	protected function normalizeUserAttributes($attributes)
    {
        if (!isset($attributes['email'])) {
            	$attributes = $this->api('info', 'GET');
        }

        return parent::normalizeUserAttributes($attributes);
    }
	
	
	protected function defaultViewOptions()
	    {
	            return [
	            'popupWidth' => 860,
	            'popupHeight' => 480,
	            'cssIcon' => 'fa fa-yandex',
	            'buttonBackgroundColor' => '#395697',
	        ];
    }
   
    /**
     * @inheritdoc
     */
    protected function defaultNormalizeUserAttributeMap()
    {
	       return [
				'email' => function ($attributes) {
                	return $attributes['emails'][0];
            	},
            	'username' => 'display_name',
            	'firstname' => 'first_name',
            	'lastname' => 'last_name',   	
           ];
    }
}