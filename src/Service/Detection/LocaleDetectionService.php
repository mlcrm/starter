<?php

namespace App\Service\Detection;

use Symfony\Component\HttpFoundation\Request;

class LocaleDetectionService
{
    public function detect(Request $request): void
    {
        if ($prefLang = $request->getPreferredLanguage(['ru', 'en'])){
            $request->setDefaultLocale($prefLang);
        }
    }
}
