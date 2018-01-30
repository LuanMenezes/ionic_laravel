angular.module('services', ['ngStorage'])
    .service('WebService', function ($localStorage, $http) {
        // $localStorage.title = "Ionic + Laravel";

        var _getOffers = function () {
            $http.get('http://localhost:8000/api/offers')
                .then(function (value) {
                    $localStorage.offers = value.data;
                }, function (reason) {
                    console.log("Error:", reason);
                });
            console.log("Offers", $localStorage.offers);
            return $localStorage.offers;
        };

        var _getFavorites = function () {
            if (!$localStorage.favorites) {
                $localStorage.favorites = [];
            }
            return $localStorage.favorites;
        };

        var _setFavorites = function (favorites) {
            $localStorage.favorites = favorites;
        };

        return {
            getOffers: _getOffers,
            getFavorites: _getFavorites,
            setFavorites: _setFavorites
        };
    })