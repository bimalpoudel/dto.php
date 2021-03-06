<?php
require_once("inc.config.php");
require_once("inc.settings.php");

use parsers\html_parser;

foreach ($entities as $business) {
    /**
     * HTML, CSS and static JavaScripts Resources
     * Selenium Resources
     */
    if ($configs->html) {
        $html_parser = new html_parser();
        $html_parser->generate($business);
    }
}
