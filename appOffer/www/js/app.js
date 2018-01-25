angular.module('offer', ['ionic', 'controllers'])
    .run(function ($ionicPlatform) {
        $ionicPlatform.ready(function () {
            if (window.cordova && window.cordova.plugins.Keyboard) {
                cordova.plugins.Keyboard.hideKeyboardAccessoryBar(true);

                cordova.plugins.Keyboard.disableScroll(true);
            }
            if (window.StatusBar) {
                StatusBar.styleDefault();
            }
        });
    })

    .config(function ($stateProvider, $urlRouterProvider) {
        $stateProvider
            .state('app', {
                url: '/app',
                abstract: true, // Usado para mostrar que ele será usado como tempalte
                templateUrl: 'templates/layout.html'
            })
            // app. é usado para informar que irá usar o template do state abstract
            .state('app.offers', {
                url: '/offers',
                views: {
                    'menuContent': {
                        templateUrl: 'templates/offers.html',
                        controller: 'OffersController'
                    }
                }
            })
            .state('app.favorites', {
                url: '/favorites',
                views: {
                    'menuContent': {
                        templateUrl: 'templates/favorites.html',
                        controller: 'FavoritesController'
                    }
                }
            });

        $urlRouterProvider.otherwise('/app/offers');
    })
