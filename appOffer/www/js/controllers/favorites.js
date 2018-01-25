angular.module('controllers')
    .controller('FavoritesController', function ($scope, WebService) {
        $scope.favorites = WebService.getFavorites();

        $scope.removeFavorite = function (offer) {
            var favorites = WebService.getFavorites();

            angular.forEach(favorites, function (value, key) {
                if (offer.id == value.id) {
                    favorites.splice(key, 1);
                    WebService.setFavorites(favorites);
                }
            });

        };
    })