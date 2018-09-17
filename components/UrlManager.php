<?php
/**
 * Created by PhpStorm.
 * User: singletonn
 * Date: 9/17/18
 * Time: 5:42 PM
 */

namespace pantera\content\components;

use yii\web\Request;
use yii\web\UrlRuleInterface;

class UrlManager implements UrlRuleInterface
{

    /**
     * Parses the given request and returns the corresponding route and parameters.
     * @param \yii\web\UrlManager $manager the URL manager
     * @param Request $request the request component
     * @return array|bool the parsing result. The route and the parameters are returned as an array.
     * If false, it means this rule cannot be used to parse this path info.
     */
    public function parseRequest($manager, $request)
    {
        // TODO: Implement parseRequest() method.
    }

    /**
     * Creates a URL according to the given route and parameters.
     * @param \yii\web\UrlManager $manager the URL manager
     * @param string $route the route. It should not have slashes at the beginning or the end.
     * @param array $params the parameters
     * @return string|bool the created URL, or false if this rule cannot be used for creating this URL.
     */
    public function createUrl($manager, $route, $params)
    {
        // TODO: Implement createUrl() method.
    }
}