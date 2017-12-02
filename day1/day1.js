var day = angular.module('day', [
	'ngRoute',
	'ngCookies',
	'ngAnimate'
]);

day.config(function($locationProvider, $routeProvider){
	$locationProvider.hashPrefix('!');

	$routeProvider
		.when('/', {
			templateUrl: 'template/day.html',
			controller: 'Day1Controller',
			controllerAs: 'day1Ctrl'
		})
    .otherwise({redirectTo: '/'});

});
