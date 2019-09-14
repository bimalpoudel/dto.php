/**
 * routes.js #__CLASS_NAME__
 */
"use strict";
let #__CLASS_NAME__App = myApp;
#__CLASS_NAME__App.config(function($stateProvider, $urlRouterProvider)
{
	let template = function _template(path)
	{
		// #__PUBLIC_URL__/
		const TEMPLATES_PATH = "entities/#__PACKAGE_NAME__/#__CLASS_NAME__/html";
		const TEMPLATES_URL = TEMPLATES_PATH+"/"+path;
		console.log("Loading Template: "+TEMPLATES_URL);
		return TEMPLATES_URL;
	};

	$urlRouterProvider.otherwise("/#__CLASS_NAME__");

	$stateProvider
		.state("#__CLASS_NAME__", {
			url: "/#__CLASS_NAME__",
			templateUrl: template("welcome.html"),
		})

		.state("#__CLASS_NAME__.list", {
			url: "/list",
			templateUrl: template("list.html"),
			controller: "#__CLASS_NAME__ListController",
		})

		.state("#__CLASS_NAME__.details", {
			url: "/details/:#__PRIMARY_KEY__",
			templateUrl: template("details.html"),
			controller: "#__CLASS_NAME__DetailsController",
		})

		.state("#__CLASS_NAME__.add", {
			url: "/add",
			templateUrl: template("add.html"),
			controller: "#__CLASS_NAME__AddController",
		})

		.state("#__CLASS_NAME__.edit", {
			url: "/edit/:#__PRIMARY_KEY__",
			templateUrl: template("edit.html"),
			controller: "#__CLASS_NAME__EditController",
		})

		.state("#__CLASS_NAME__.delete", {
			url: "/delete",
			templateUrl: template("delete.html"),
			controller: "#__CLASS_NAME__DeleteController",
		})

		.state("#__CLASS_NAME__.flag", {
			url: "/flag",
			templateUrl: template("flag.html"),
			controller: "#__CLASS_NAME__FlagController",
		})

        #__ANGULAR_ROUTES__
	;
	
	// $locationProvider.html5Mode(true); //Remove the '#' from URL.
});
