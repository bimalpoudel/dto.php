<?php
#die("DTO CRUDer Locked to protect overwriting existing output. Use individual writer...");

require_once("inc.config.php");
require_once("inc.settings.php");

use anytizer\capitalizer;
use generators\template_reader;
use parsers\angular_parser;
use parsers\business_parser;
use parsers\dto_parser;
use parsers\endpoints_parser;
use parsers\html_parser;
use parsers\orm_parser;
use parsers\phpunit_parser;
use anytizer\configs;

/**
 * Used in tracing Issue ID for test cases for PHPUnit
 * @return string
 * @see libraries/classes/parsers/class.phpunit_parser.inc.php
 */
$F_ISSUE_ID = function () {
    static $issue_id = 0;

    if (!$issue_id) {
        $issue_id = 0;
    }

        return sprintf("%06s", ++$issue_id);
};

# for each entities, define business rules (methods)
// business = entity, model
// database = orm
// user
// method
// table name

$configs = new configs();

$template_reader = new template_reader();
if ($configs->templates) {
    echo sprintf("\r\nProcessing static file copy...");

    // @todo Rather, use media.cdn or parallel subdomain
    $template_reader->write($template_reader->read("public_html/css/w3.css"), "public_html/css/w3.css");
    $template_reader->write($template_reader->read("public_html/css/styles.css"), "public_html/css/styles.css"); // from scss
    $template_reader->write($template_reader->read("public_html/js/jquery/jquery-3.4.1.min.js"), "public_html/js/jquery/jquery-3.4.1.min.js");
    $template_reader->write($template_reader->read("public_html/js/general.js"), "public_html/js/general.js");

    $template_reader->write($template_reader->read("phpunit/bootstrap.php.ts"), "phpunit/bootstrap.php");
    $template_reader->write($template_reader->read("phpunit/phpunit.cmd.ts"), "phpunit/phpunit.cmd");
    $template_reader->write($template_reader->read("phpunit/phpunit.xml.ts"), "phpunit/phpunit.xml");
    $template_reader->write($template_reader->read("phpunit/readme.txt"), "phpunit/readme.txt");

    $template_reader->write($template_reader->read("public_html/js/angularjs/angular.min.js"), "public_html/js/angularjs/angular.min.js");
    $template_reader->write($template_reader->read("public_html/js/angularjs/angular-sanitize.min.js"), "public_html/js/angularjs/angular-sanitize.min.js");
    $template_reader->write($template_reader->read("public_html/js/ui-router/angular-ui-router.min.js"), "public_html/js/ui-router/angular-ui-router.min.js");
    $template_reader->write($template_reader->read("public_html/js/ui-router/stateEvents.min.js"), "public_html/js/ui-router/stateEvents.min.js");
    $template_reader->write($template_reader->read("public_html/js/app.js"), "public_html/js/app.js");
}

#die("Static templates done!");
// @todo Package name to be replaced
# .htaccess
# .htpass

foreach ($entities as $business) {
    if (!$business->enabled()) {
        continue;
    }

    # CLI Options
    #echo sprintf("\r\nProcessing: Package [%s] at Class [%s].", $business->package_name(), $business->class_name());
    #continue;

    /**
     * Data Transfer Objects
     */
    if ($configs->dto) {
        $dto_parser = new dto_parser();
        $dto_body = $dto_parser->generate($business);

        // @todo Must have columns available
        $dto_body = $dto_parser->laravel($business);
        $dto_body = $dto_parser->cs($business);

        #$dto_body = $dto_parser->dto_file($business);
        #$dto_body = $dto_parser->asis($business);
        #echo "DTO Class body: ", $dto_body;
    }

    /**
     * ORM/Database Layer
     */
    if ($configs->orm) {
        $orm_parser = new orm_parser();
        $orm_body = $orm_parser->generate($business);
        $orm_body = $orm_parser->generate_orm($business);
        $orm_body = $orm_parser->generate_database($business);
        #echo $orm_body; die();
    }

    /**
     * Business Logic Layer
     */
    if ($configs->business) {
        $business_parser = new business_parser();
        $business_body = $business_parser->copy_files($business);
        $business_body = $business_parser->generate($business);
    }

    /**
     * PHPUnit Templates
     */
    if ($configs->phpunit) {
        $phpunit_parser = new phpunit_parser();
        $phpunit_parser->generate($business);
    }

    /**
     * API Endpoints
     */
    if ($configs->endpoints) {
        $endpoints_parser = new endpoints_parser();
        // actual api with direct database access
        $endpoints_body = $endpoints_parser->generate($business);
        //$endpoints_body = $endpoints_parser->relay($business);
    }

    /**
     * AngularJS Resources
     */
    if ($configs->angularjs) {
        $angular_parser = new angular_parser();
        $angular_parser->generate($business);
    }

    /**
     * HTML, CSS and static JavaScripts Resources
     * Selenium Resources
     */
    if ($configs->html) {
        $html_parser = new html_parser();
        $html_parser->generate($business);
    }

    #die(sprintf("\r\n\r\nLoop stopped for now. Re-Enable me at line #%d.\r\n", __LINE__));
}

/**
 * CRUDed information
 */

$angularjses = [];
$menus = [];

foreach ($entities as $business) {
    if (!$business->enabled()) {
        continue;
    }

    $package_name = $business->package_name();
    $class_name = $business->class_name();
    $capitalizer = new capitalizer();

    /**
     * More readable name
     */
    $class_name_html = $capitalizer->capitalize($class_name);

    if(preg_match("/Actions$/is", $class_name))
    {
        continue;
    }

    $angularjses[] = "
    <script type=\"text/javascript\" src=\"entities/{$package_name}/{$class_name}/js/{$class_name}-routes.js\"></script>
    <script type=\"text/javascript\" src=\"entities/{$package_name}/{$class_name}/js/{$class_name}-directives.js\"></script>
    <script type=\"text/javascript\" src=\"entities/{$package_name}/{$class_name}/js/{$class_name}-services.js\"></script>
    <script type=\"text/javascript\" src=\"entities/{$package_name}/{$class_name}/js/{$class_name}-controllers.js\"></script>
";

    // if 2 or 2+ worded, do not include in main menu
    // rather use a submenu
    // @see https://www.w3schools.com/w3css/w3css_navigation.asp
    if(lcfirst($class_name) != strtolower($class_name))
    {
       # continue;
    }

    $menus[] = "
    <a class=\"w3-bar-item w3-btn\" ui-sref=\"{$class_name}.List({})\" ui-sref-active=\"w3-teal\">
        <i class=\"fas fa-users\"></i>
        {$class_name_html}
    </a>
";
}
$index_html = $template_reader->read("public_html/index.html.ts");
$index_html = str_replace("<!--ANGULAR-JS-COMPONENTS-MARKER-->", implode("", $angularjses), $index_html);
$index_html = str_replace("<!--MENU-REGISTRATION-MARKER-->", implode("", $menus), $index_html);
$template_reader->write($index_html, "public_html/index.html");

echo "\r\n", sprintf("%sItems generated: #%s.\r\nCheck /tmp/acl.log.", "\r\n", count($entities));
#print_r($entities);
