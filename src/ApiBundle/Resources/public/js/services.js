var apiServices = angular.module('apiServices', ['ngResource']);

apiServices
  .factory('Concesionario', ['$resource', function($resource){
    var resource = $resource('/app_dev.php/api/concesionarios/:id', {id:'@concesionario.id'}, {update:{ method: 'PUT' }});
  		//  resource = tokenHandler.wrapActions(resource, ['get', 'deiTokens', 'tesTokens', 'portalTokens']);
    return resource;
  }]);
