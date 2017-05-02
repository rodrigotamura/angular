projeto
    .config(['$routeProvider',
        function($routeProvider){
            $routeProvider
                .when('/', {
                    templateUrl: 'projetos/templates/capa.html'
                })
                .when('/novo', {
                    templateUrl: 'projetos/templates/novo.html'
                })
        }
    ]);