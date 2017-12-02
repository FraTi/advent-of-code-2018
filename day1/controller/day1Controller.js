day.controller('Day1Controller', ['$scope', '$http', '$window', '$cookies', '$location', '$animate', function($scope, $http, $window, $cookies, $location, $animate)
{
  var Day1Controller = this;
  console.log('OK!');


  $scope.output1 = Day1Controller.output1;
  $scope.output2 = Day1Controller.output2;


  Day1Controller.analizzaInput1 = function(){
    var stringa = '';
    var risultato = 0;

    $http.get('input.json').then(function successCallback(response) {
      stringa = response.data.input
      for(var i=0; i<stringa.length; i++){

        if( stringa[i] == stringa[i+1] ){
          risultato += Number(stringa[i]);
        }

        if( i == stringa.length-1 ){
          if( stringa[i] == stringa[0] ){
            risultato += Number(stringa[i]);
          }
        }
      }

      Day1Controller.output1 = risultato;
    });

  }

  Day1Controller.analizzaInput2 = function(){
    var stringa = '';
    var risultato = 0;

    $http.get('input.json').then(function successCallback(response) {
      stringa = response.data.input
      var middle = stringa.length/2;
      console.log(middle);
      for(var i=0; i<stringa.length; i++){

        if( stringa[i] == stringa[middle] ){
          risultato += Number(stringa[i]);
        }

        middle++;

        if( middle == stringa.length ){
          middle = 0;
        }

      }

      Day1Controller.output2 = risultato;
    });

  }

  Day1Controller.analizzaInput1();
  Day1Controller.analizzaInput2();
}]);
