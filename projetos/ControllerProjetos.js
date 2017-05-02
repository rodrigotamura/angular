projeto
    .controller('CtrlProjetos', ['$scope','ProjetosSrv',
        function($scope, ProjetosSrv){

            $scope.registros = ProjetosSrv.query();

            $scope.inicia = function(){
                $scope.boxSuccess = true;
                $scope.item = {};
                $scope.item.acao = "add";
            }

            $scope.adicionar = function(item){
                alert($jQuery.param(item));
                $scope.resultado = ProjetosSrv.save(
                    {},
                    $jQuery.param(item),
                    function(data, status, headers, config) {
                        $scope.boxSuccess = false;
                    },
                    function(data, status, headers, config) {
                        alert('Erro ao cadastrar. '.data,messages[0]);
                    }
                )
            }
        }]
    );