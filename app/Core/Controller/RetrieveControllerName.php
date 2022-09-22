<?php

declare(strict_types=1);

namespace Ecommerce\Core\Controller;

class RetrieveControllerName
{
    /**
     * Retrieve controller name from URL and put it into array
     *
     * @return string[]
     */
    public function retrieveControllerName(): array
    {
        $requestUri = $_SERVER['REQUEST_URI'];
        if (str_contains($requestUri, '?')) {
            $requestUri = strstr($requestUri, '?', true);
        }
        $requestArray = explode('/', $requestUri);
        $urlKeys = [];
        foreach ($requestArray as $element) {
            if ($element) {
                $element = substr($element, 0, strcspn($element, '.'));
                $urlKeys[] = ucfirst($element);
            }
        }
        return $urlKeys;
    }
}