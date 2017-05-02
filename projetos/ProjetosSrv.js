projeto.
    factory("ProjetosSrv", ['$resource', function($resource){
        return $resource(
            './src/projetos.php', {
                id: '@id'
            }
        );
    }]);