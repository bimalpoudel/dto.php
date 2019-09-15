# Full stack source code generator


## Usage

    cd src
    php -f business.php

This is **not a general purpose software**. It helps developers to produce raw full stack source code from MySQL Database. It ambitiously covers:
 - AngularJS Components
 - API Endpoints
 - Unit Tests
 - ORM
 - HTML files

Output of this product is useful as a backbone of starting a new web project.


## Requirements:

* Business Definitions render
* __Complete MySQL Database__ for a project before generating a source code stack.
* An advanced PHP IDE like [PHPStorm](https://www.jetbrains.com/?from=anytizer) or [NetBeans](https://netbeans.org/).
* [Composer](https://getcomposer.org/)
* [Postman](https://www.getpostman.com/) or [relay.php](https://github.com/anytizer/relay.php) project
* [PHPUnit](https://phpunit.de/)


## Dependencies

The following sub-projects are necessary:

 * [Business Definition Files](https://github.com/anytizer/business.definitions) generated by [Business Definer](https://github.com/anytizer/definitions.business) project.
 * [API.php](https://github.com/anytizer/api.php) project for backend APIs
 * This project itself.
 * [Boilerplate for AngularJS](https://github.com/anytizer/boilerplate.angularjs)
 * MySQL Database Connection shared between these projects.


## Installation

Checkout the required project under your web root.

    mkdir [HTDOCS]/project
    cd project
    mkdir public_html
    
    git clone https://github.com/anytizer/definitions.business.git
    git clone https://github.com/anytizer/business.definitions.git
    git clone https://github.com/anytizer/boilerplate.angularjs.git
    git clone https://github.com/anytizer/relay.php.git
    
    git clone https://github.com/anytizer/api.php.git
    cd api.php
    composer update
    cd ..

    git clone https://github.com/anytizer/dto.php.git
    cd dto.php
    composer update

    cd src
    cp inc.config-sample.php inc.config.php


Edit: your `inc.config.php` for:

 * MySQL Database Connection details
 * Path to business definition files
 * Relative URL path to [api.php](https://github.com/anytizer/api.php) project.
 * Output/Export location


    php -f business.php

     
Then see the output directory.


## ATTN

This project may be broken due to several reasons:
 - requirement of full paths in configurations
 - composer modules
 - dependent project files
 - not tested in other environments
 - work in progress

The source code is available for a reference only.
