angular.module('controllers')
    .controller('FavoritesController', function ($scope, WebService) {
        $scope.favorites = WebService.getFavorites();

        $scope.removeFavorite = function (offer) {
            var favorites = WebService.getFavorites();
            favorites.splice(offer, 1);
        };
    })