var myApp = angular.module('myApp', []);

/*
** Formulaire de recherche de séries
*/
myApp.controller('SearchingForm', function($scope, $http) {
	
	$scope.searchingSeries = function() {
		$('#alertAjout').hide();

		myUrl = "http://www.omdbapi.com/?s=" + $scope.search + "&type=series&r=json";
		$http({
			method : "GET",
			url : myUrl
		})
		.then(function mySuccess(response) {
			$scope.serieToAdd = '';

			if (response.data.Error) {
				$scope.resultsError = response.data.Error;
				$scope.results = '';
				$('#searchByKeyword').addClass('has-warning');
			}
			else{
				$scope.results = response.data;
				$scope.resultsError = '';
				$('#searchByKeyword').removeClass('has-warning');
			}
		}, function myError(response) {
			$scope.resultsError = response.statusText;
		});
	};

	$scope.addSeries = function(imdbID) {
		myUrlOne = "http://www.omdbapi.com/?i=" + imdbID + "&plot=full&r=json";

		$http({
			method : "GET",
			url : myUrlOne
		})
		.then(function mySuccess(response) {
			$scope.serieToAdd = response.data;
			$scope.results = '';

		}, function myError(response) {
			$scope.serieToAddError = response.statusText;
		});
	};

	$scope.addDbSerie = function() {
		// ajax à add_serie.php
		$http({
			url: 'ajax/add_serie.php',
			method: 'POST',
			data: {
				'imdbID': $scope.serieToAdd.imdbID,
				'title': $scope.serieToAdd.Title,
				'year': $scope.serieToAdd.Year,
				'runtime': $scope.serieToAdd.Runtime,
				'genre': $scope.serieToAdd.Genre,
				'actors': $scope.serieToAdd.Actors,
				'plot': $scope.serieToAdd.Plot,
				'country': $scope.serieToAdd.Country,
				'poster': $scope.serieToAdd.Poster,

				'pseudo': $scope.pseudo,
				'comment': $scope.comment
			}
		})
		.success(function(data, status, headers, config) {
			console.log(data);
			if (data == "ok") {
				$scope.serieToAdd = '';
				$('#alertAjout').show();
			}
		})
		.error(function(data, status, headers, config) {
			console.log(status);
		});
	};
});

/*
** Liste des séries
*/
myApp.controller('SeriesListController', function($scope, $http) {
	$scope.getAllSeries = function(limit, orderBy) {
		$http({
			url: 'ajax/fetch_series.php',
			method: 'POST',
			data: {'limit': limit, 'orderBy': orderBy}
		})
		.success(function(data, status, headers, config) {
			console.log(data);
			$scope.series = data;
		})
		.error(function(data, status, headers, config) {
			console.log(status);
		});
	};
});