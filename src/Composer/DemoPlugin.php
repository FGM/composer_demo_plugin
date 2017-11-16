<?php

namespace Fgm\Composer;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class DemoPlugin implements EventSubscriberInterface, PluginInterface {
  public function activate(Composer $composer, IOInterface $io) {

  }

  public static function getSubscribedEvents() {
    return [];
  }

}
