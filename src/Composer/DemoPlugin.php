<?php

namespace Fgm\Composer;

use Composer\Composer;
use Composer\EventDispatcher\Event;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Installer\PackageEvents;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginEvents;
use Composer\Plugin\PluginInterface;
use Composer\Script\ScriptEvents;

class DemoPlugin implements EventSubscriberInterface, PluginInterface {
  const NAME = 'DemoPlugin';

  public function activate(Composer $composer, IOInterface $io) {

  }

  public static function getSubscribedEvents() {
    $rc = new \ReflectionClass(ScriptEvents::class);
    $names = $rc->getConstants();
    $ret = [];
    foreach ($names as $name) {
      $res[$name] = ['onEvent'];
    }

    $rc = new \ReflectionClass(PackageEvents::class);
    $names = $rc->getConstants();
    foreach ($names as $name) {
      $res[$name] = ['onEvent'];
    }

    $rc = new \ReflectionClass(PluginEvents::class);
    $names = $rc->getConstants();
    foreach ($names as $name) {
      $res[$name] = ['onEvent'];
    }

    return $res;
  }

  protected function show($v) {
    if (is_array($v) && !empty($v)) {
      echo self::NAME . ': ' . json_encode($v) . "\n";
    }
    elseif (is_scalar($v)) {
      echo self::NAME . ": $v\n";
    }
  }

  public function onEvent($event) {
    $this->show($event->getName());
    $this->show(get_class($event));
    $this->show($event->getFlags());
    $this->show($event->getArguments());
    echo str_repeat('-', 80) . "\n";
  }

}
