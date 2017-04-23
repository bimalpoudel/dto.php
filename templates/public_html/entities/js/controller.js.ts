/**
 * Controllers
 */

"use strict";

#__CLASS_NAME__App.controller("#__CLASS_NAME__ListController", ["$scope", "$state", "#__CLASS_NAME__Service", function($scope, $state, #__CLASS_NAME__Service)
{
	$scope.#__CLASS_NAME__ = {
		"data": null,
		"list": function () {
			#__CLASS_NAME__Service.#__CLASS_NAME__.list()
				.then(function (response) {
					$scope.data = response.data;
				}, function (response) {
					// error
				});
		},
		"init": function()
		{
			$scope.#__CLASS_NAME__.list();
		},
	};

	$scope.#__CLASS_NAME__.init();
}]);

#__CLASS_NAME__App.controller("#__CLASS_NAME__DetailsController", ["$scope", "$stateParams", "$state","#__CLASS_NAME__Service", function($scope, $stateParams, $state,  #__CLASS_NAME__Service)
{
	var id = $stateParams.id;

	$scope.#__CLASS_NAME__ = {
		"record": {},
		"details": function(id){
			#__CLASS_NAME__Service.#__CLASS_NAME__.details(id)
				.then(function(response){
					$scope.data = response.data;
				}, function(response){
					// error
				});
		},
		"init": function()
		{
			$scope.#__CLASS_NAME__.details(id);
		},
	};

	$scope.#__CLASS_NAME__.init();
}]);

#__CLASS_NAME__App.controller("#__CLASS_NAME__AddController", ["$scope", "$state", "#__CLASS_NAME__Service", function($scope, $state, #__CLASS_NAME__Service)
{
	$scope.#__CLASS_NAME__ = {
		"add": function(record){
			#__CLASS_NAME__Service.#__CLASS_NAME__.add(record)
				.then(function(response){
					$scope.data = response.data;
				}, function(response){
					// error
				});
		},
	};
}]);

#__CLASS_NAME__App.controller("#__CLASS_NAME__EditController", ["$scope", "#__CLASS_NAME__Service", function($scope, #__CLASS_NAME__Service)
{
	$scope.#__CLASS_NAME__ = {
		"error": "",
		"edit": function (record) {
			#__CLASS_NAME__Service.#__CLASS_NAME__.edit(record)
				.then(function (response) {
					$scope.data = response.data;
				},
				function (response) {
					// error
				});
		},
	};
}]);

#__CLASS_NAME__App.controller("#__CLASS_NAME__DeleteController", ["$scope", "#__CLASS_NAME__Service", function($scope, #__CLASS_NAME__Service)
{
	$scope.#__CLASS_NAME__ = {
		"error": "",
		"delete": function (record) {
			#__CLASS_NAME__Service.#__CLASS_NAME__.delete(record)
				.then(function (response) {
					$scope.data = response.data;
				}, function (response) {
					// error
				});
		},
	};
}]);

#__CLASS_NAME__App.controller("#__CLASS_NAME__FlagController", ["$scope", "#__CLASS_NAME__Service", function($scope, #__CLASS_NAME__Service)
{
	$scope.#__CLASS_NAME__ = {
		"error": "",
		"flag": function (record) {
			#__CLASS_NAME__Service.#__CLASS_NAME__.flag(record)
				.then(function (response) {
					$scope.data = response.data;
				}, function (response) {
					// error
				});
		},
	};
}]);

#__CLASS_NAME__App.controller("WelcomeController", ["$scope", "#__CLASS_NAME__Service", function($scope, signupsService)
{
	$scope.#__CLASS_NAME__ = {
		"welcome": "",
	};
}]);

// #__PUBLIC_METHODS__
