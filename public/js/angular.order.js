// function ctrlStyle($scope) {
//     $scope.data = {message:"sample message."};
// }

// var app = angular.module('orderApp', []);
//
// app.controller('sampleCtrl', function($scope, $http) {
//     $scope.sample = "ey";
//
//     $scope.data = "";
//     // Get ajax query
//     $http({
//         method: 'GET',
//         url: '/wb/colors_ss',
//         params: { test: 'testearl' }
//     })
//     .success(function(response) {
//         $scope.data = response;
//     })
//     .error(function(response) {
//         $scope.data = {};
//     })
//     .then(function(response) {
//         if($scope.data == "") {
//             $scope.data = {};
//         }
//     });
//
// });


// ----------------------------------------


// <style>
// 	[ng\:cloak], [ng-cloak], [data-ng-cloak], [x-ng-cloak], .ng-cloak, .x-ng-cloak {
// 		display: none !important;
// 	}
// </style>
//
// <div ng-app="orderApp">
// 	<div ng-controller="sampleCtrl">
// 		<div ng-cloak>
// 			@{{ sample }}
// 		</div>
// 		@{{ data }}
// 	</div>
// </div>
