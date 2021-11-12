<?php

namespace App\EventSubscriber;

use App\Service\Detection\LocaleDetectionService;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class StartupSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private LocaleDetectionService $localeDetectionService
    ){}

    public function localeDetection(RequestEvent $requestEvent): void
    {
        $this->localeDetectionService->detect($requestEvent->getRequest());
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => ['localeDetection', 17],
        ];
    }
}
