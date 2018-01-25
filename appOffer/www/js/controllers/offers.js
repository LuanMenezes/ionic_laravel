angular.module('controllers')
    .controller('OffersController', function ($scope, WebService, $ionicPopup, $ionicListDelegate) {
        $scope.offers = WebService.getOffers();

        $scope.saveFavorite = function (offer) {
            var count = 0;
            var favorites = WebService.getFavorites();

            angular.forEach(favorites, function (value, key) {
                if (offer.id == value.id) {
                    count++;
                    var alertPopup = $ionicPopup.alert({
                        title: "Oops..",
                        template: 'This offer is now available as a Favorite.'
                    });
                    // alertPopup.then(function(res) {
                    //     console.log('Thank you for not eating my delicious ice cream cone');
                    // });
                    $ionicListDelegate.closeOptionButtons();

                    return;
                }
            });

            if(!count){
                $ionicListDelegate.closeOptionButtons();
                favorites.push(offer);
                WebService.setFavorites(favorites);
            }
        };
    })