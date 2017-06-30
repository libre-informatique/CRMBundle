<?php

foreach (glob(__DIR__.'/AppBundle/Entity/OuterExtension/*/*.php') as $file) {
    require_once $file;
}
