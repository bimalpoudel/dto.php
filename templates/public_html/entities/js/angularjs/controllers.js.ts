/**
 * Controllers
 */

"use strict";

#__CLASS_NAME__App.controller("#__CLASS_NAME__WelcomeController", ["$scope", "#__CLASS_NAME__Service", function($scope, #__CLASS_NAME__Service)
{
	$scope.welcome = {
		"message": "Welcome to #__CLASS_NAME__!",
	};
}]);

// @todo: Bring flag, delete controllers here.
#__CLASS_NAME__App.controller("#__CLASS_NAME__ListController", ["$scope", "$state", "$stateParams", "#__CLASS_NAME__Service", function($scope, $state, $stateParams, #__CLASS_NAME__Service)
{
	$scope.#__CLASS_NAME__ = {
		"records": {},
		"list": function () {
			#__CLASS_NAME__Service.#__CLASS_NAME__.list()
			.then(function (response) {
				$scope.#__CLASS_NAME__.records = response.data;
			}, function (error) {
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

#__CLASS_NAME__App.controller("#__CLASS_NAME__DetailsController", ["$scope", "$state", "$stateParams", "#__CLASS_NAME__Service", function($scope, $state,  $stateParams, #__CLASS_NAME__Service)
{
	$scope.#__CLASS_NAME__ = {
		"record": {},
		"details": function(id){
			#__CLASS_NAME__Service.#__CLASS_NAME__.details({"#__PRIMARY_KEY__": id})
			.then(function(response){
				$scope.record = response.data;
			}, function(error){
				// error
			});
		},
		"init": function()
		{
			$scope.#__CLASS_NAME__.details($stateParams.#__PRIMARY_KEY__);
		},
	};

	$scope.#__CLASS_NAME__.init();
}]);

#__CLASS_NAME__App.controller("#__CLASS_NAME__AddController", ["$scope", "$state", "$stateParams", "#__CLASS_NAME__Service", function($scope, $state, $stateParams, #__CLASS_NAME__Service)
{
	$scope.#__CLASS_NAME__ = {
		"record": {},
		"add": function(record){
			#__CLASS_NAME__Service.#__CLASS_NAME__.add(record)
			.then(function(response){
				$scope.record = response.data;
			}, function(error){
				// error
			});
		},
	};
}]);

#__CLASS_NAME__App.controller("#__CLASS_NAME__EditController", ["$scope", "$state", "$stateParams", "#__CLASS_NAME__Service", function($scope, $state, $stateParams, #__CLASS_NAME__Service)
{
	$scope.#__CLASS_NAME__ = {
		"error": "",
		"record": {},
		"details": function (id) {
			#__CLASS_NAME__Service.#__CLASS_NAME__.details({"#__PRIMARY_KEY__": id})
				.then(function (response) {
					$scope.record = response.data;
				}, function (error) {
					// error
				});
		},
		"edit": function (record) {
			#__CLASS_NAME__Service.#__CLASS_NAME__.edit(record)
			.then(function (response) {
				$scope.record = response.data;
				$state.go("#__CLASS_NAME__.list", ({}));
			},
			function (error) {
				// error
			});
		},
	};

	$scope.#__CLASS_NAME__.details($stateParams.#__PRIMARY_KEY__);
}]);

#__CLASS_NAME__App.controller("#__CLASS_NAME__DeleteController", ["$scope", "$state", "$stateParams", "#__CLASS_NAME__Service", function($scope, $state, $stateParams, #__CLASS_NAME__Service)
{
	$scope.#__CLASS_NAME__ = {
		"error": "",
		"record": {},
		"delete": function (record) {
			#__CLASS_NAME__Service.#__CLASS_NAME__.delete(record)
			.then(function (response) {
				$scope.record = response.data;
			}, function (error) {
				// error
			});
		},
	};
}]);

#__CLASS_NAME__App.controller("#__CLASS_NAME__FlagController", ["$scope", "$state", "$stateParams", "#__CLASS_NAME__Service", function($scope, $state, $stateParams, #__CLASS_NAME__Service)
{
	$scope.#__CLASS_NAME__ = {
		"error": "",
		"record": {},
		"flag": function (record) {
			#__CLASS_NAME__Service.#__CLASS_NAME__.flag(record)
			.then(function (response) {
				$scope.record = response.data;
			}, function (error) {
				// error
			});
		},
	};
}]);

#__ANGULAR_CONTROLLERS__