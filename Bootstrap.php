<?php

namespace romaten1\univer;

use yii\base\BootstrapInterface;

/**
 * Blogs module bootstrap class.
 */
class Bootstrap implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public function bootstrap($app)
    {
        // Add module URL rules.
        $app->getUrlManager()->addRules(
            [
                //TODO Customize this rules
                'POST <_m:univer>' => '<_m>/user/create',
                '<_m:univer>' => '<_m>/default/index',
                '<_m:univer>/<id:\d+>-<alias:[a-zA-Z0-9_-]{1,100}+>' => '<_m>/default/view',
            ]
        );

        // Add module I18N category.
        if (!isset($app->i18n->translations['romaten1/univer']) && !isset($app->i18n->translations['romaten1/*'])) {
            $app->i18n->translations['romaten1/univer'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'basePath' => '@romaten1/univer/messages',
                'forceTranslation' => true,
                'fileMap' => [
                    'romaten1/univer' => 'univer.php',
                ]
            ];
        }
    }
}
