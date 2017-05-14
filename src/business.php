<?php
header("Content-Type: text/plain");

require_once("libraries/inc.config.php");

use generators\template_reader;
use parsers\angular_parser;
use parsers\business_parser;
use parsers\dto_parser;
use parsers\endpoints_parser;
use parsers\html_parser;
use parsers\orm_parser;
use parsers\phpunit_parser;

// CRUD: Create, Read, Update, Delete
// MADS: Modify, Add, Delete, Show
// BREAD: Browse, Read, Edit, Add, Delete
// DAVE: Delete, Add, View, Edit
// CRAP: Create, Retrieve, Alter, Purge
# for each entities, define business rules (methods)
// business = entity, model
// database = orm
// user
// method
// table name
$entities = array();
$setups = glob(__BUSINESS_DEFINITIONS__."/define.*.php");
print_r($setups);
#$setups = array("definitions/define.messagequeue.php");
foreach ($setups as $setup) {
    require_once($setup);
}
#print_r($entities); die();

$template_reader = new template_reader();
$template_reader->write($template_reader->read("phpunit/bootstrap.php.ts"), "phpunit/bootstrap.php");
$template_reader->write($template_reader->read("phpunit/phpunit.cmd.ts"), "phpunit/phpunit.cmd");
$template_reader->write($template_reader->read("phpunit/phpunit.xml.ts"), "phpunit/phpunit.xml");
$template_reader->write($template_reader->read("phpunit/readme.txt"), "phpunit/readme.txt");
$template_reader->write($template_reader->read("libraries/backend/class.spl_include.inc.php"), "libraries/backend/class.spl_include.inc.php");
$template_reader->write($template_reader->read("libraries/dtos/class.dto.inc.php.ts"), "libraries/dtos/class.dto.inc.php"); // @todo Write once only
$template_reader->write($template_reader->read("libraries/orm/class.orm.inc.php"), "libraries/orm/class.orm.inc.php");

print_r($entities); #die();
foreach ($entities as $business)
{
    # CLI Options
    # business dto user
    # business business user -- entity
    # business app.js.ts user
    # business routes.js.ts user
    # business controller.js.ts user
    # business services.js.ts user
    # business endpoints user
    # business orm user -- business
    echo sprintf("\r\nProcessing: Package [%s] at Class [%s].", $business->package_name(), $business->class_name());

    $dto_parser = new dto_parser();
    $dto_body = $dto_parser->generate($business);
    #$dto_body = $dto_parser->asis($business);
    #echo $dto_body; die();

    #$business_parser = new business_parser();
    #$business_body = $business_parser->generate($business);
    #echo $business_body; die();

    #$phpunit_parser = new phpunit_parser();
    #$phpunit_body = $phpunit_parser->generate($business);
    #echo $phpunit_body; die();

    #$endpoints_parser = new endpoints_parser();
    #$endpoints_body = $endpoints_parser->generate($business);
    #echo $endpoints_body; die();

    #$orm_parser = new orm_parser();
    #$orm_body = $orm_parser->generate($business);
    #echo $orm_body; die();

    $angular_parser = new angular_parser();

    ##$app_js = $angular_parser->angular_app_js($business);
    #echo $app_js; die();

    ##$routes_js = $angular_parser->angular_routes_js($business);
    #echo $routes_js; die();

    ##$controller_js = $angular_parser->angular_controller_js($business);
    #echo $controller_js; die();

    ##$service_js = $angular_parser->angular_service_js($business);
    #echo $service_js; die();
    # echo $app_js;
    # echo $routes_js;
    # echo $controller;
    # echo $service_js;

    $html_parser = new html_parser();

    ##$html_list = $html_parser->generate_list($business);
    #echo $html_list; die();

    ##$html_details = $html_parser->generate_details($business);
    #echo $html_details; die();

    ##$html_edit = $html_parser->generate_edit($business);
    #echo $html_edit; die();

    ##$html_flag = $html_parser->generate_flag($business);
    #echo $html_flag; die();

    ##$html_delete = $html_parser->generate_delete($business);
    #echo $html_delete; die();

    ##$html_add = $html_parser->generate_add($business);
    #echo $html_add; die();
    #echo $html_list;
    #echo $html_details;
    #echo $html_edit;
    #echo $html_flag;
    #echo $html_delete;
    #echo $html_add;
    #die(); continue;
    # dto, business
    # phpunit
    # angular: app, route, controller, service
    # html: list, details, edit, add, flag, delete
    # orm: wrapper, orm
    # endpoint, business

    ##$html_add = $html_parser->generate_selenium($business);
}
echo sprintf("%sItems generated: %s.", "\r\n", count($entities));
#print_r($entities);