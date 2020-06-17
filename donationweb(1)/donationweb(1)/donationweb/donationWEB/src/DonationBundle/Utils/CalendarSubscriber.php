<?php


namespace DonationBundle\Utils;

use DonationBundle\Repository\EventRepository;
use CalendarBundle\CalendarEvents;
use CalendarBundle\Entity\Event;
use CalendarBundle\Event\CalendarEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class CalendarSubscriber implements EventSubscriberInterface {

    private $router;
    private $eventsRepository;
    public function __construct(EventRepository $eventsRepository, UrlGeneratorInterface $router) {
        $this->eventsRepository = $eventsRepository;
        $this->router = $router;
    }
    public static function getSubscribedEvents() {
        return [
            CalendarEvents::SET_DATA => 'onCalendarSetData',
        ];
    }
    public function onCalendarSetData(CalendarEvent $calendar) {
        $events = $this->eventsRepository->findAll();
        foreach ($events as $event) {
            $tempEvent = new Event($event->getNameEv(), $event->getDateEv());
            $tempEvent->addOption(
                'url',
                $this->router->generate('donation_displaypage', ['id' => $event->getIdEv(),])
            );
            $calendar->addEvent($tempEvent);
        }
    }
}