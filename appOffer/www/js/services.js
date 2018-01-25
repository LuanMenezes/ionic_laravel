angular.module('services', ['ngStorage'])
    .service('WebService', function ($localStorage) {
        // $localStorage.title = "Ionic + Laravel";



        var _getOffers = function () {
            if(!$localStorage.offers){
                $localStorage.offers = [
                    {
                        id: 1,
                        title: "Offer001",
                        description: "Description 001",
                        price: 3.99,
                        price_f: 'R$ 3,99',
                        validity: '2018-01-31',
                        img: 'img/product.png'
                    }, {
                        id: 2,
                        title: "Offer002",
                        description: "Description 002",
                        price: 132.99,
                        price_f: 'R$ 132,99',
                        validity: '2017-12-31',
                        img: 'img/product.png'
                    }, {
                        id: 3,
                        title: "Offer003",
                        description: "Description 003",
                        price: 13.89,
                        price_f: 'R$ 13,89',
                        validity: '2018-05-31',
                        img: 'img/product.png'
                    }
                ];
            }
            return $localStorage.offers;
        };

        var _getFavorites = function () {
            if(!$localStorage.favorites){
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