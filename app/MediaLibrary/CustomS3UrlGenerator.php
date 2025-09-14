<?php
namespace App\MediaLibrary;

use Spatie\MediaLibrary\Support\UrlGenerator\DefaultUrlGenerator;

class CustomS3UrlGenerator extends DefaultUrlGenerator
{
    public function getUrl(): string
    {
        $url = parent::getUrl();

        // Strip "rti.ombadc.in/" from the URL
        return str_replace('/rti.ombadc.in', '', $url);
    }
}
