<?php

function getUrlParams($url)
{
    $urlString = $url;
    $filterParams = strstr($urlString, '?');
    if ($filterParams) {
        $data = substr($filterParams, 1);
        $params = explode('&', $data);
        $arrayParams = [];

        foreach ($params as $key => $value) {
            $arrayValue = explode("=", $value);
            $arrayParams[$arrayValue[0]] = $arrayValue[1];
        }
        return $arrayParams;
    } else{
        return false;
    }
}
