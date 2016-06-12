var controllers = angular.module('controllers', ['toaster', 'ngAnimate','ui.bootstrap', 'angular-md5','angularMoment']);
controllers.directive('validNumber', function() {
  return {
    require: '?ngModel',
    link: function(scope, element, attrs, ngModelCtrl) {
      if(!ngModelCtrl) {
        return;
      }
      ngModelCtrl.$parsers.push(function(val) {
        if (angular.isUndefined(val)) {
          var val = '';
        }
        var clean = val.replace(/[^0-9\.]/g, '');
        var decimalCheck = clean.split('.');

        if(!angular.isUndefined(decimalCheck[1])) {
          decimalCheck[1] = decimalCheck[1].slice(0,2);
          clean =decimalCheck[0] + '.' + decimalCheck[1];
        }

        if (val !== clean) {
          ngModelCtrl.$setViewValue(clean);
          ngModelCtrl.$render();
        }
        return clean;
      });

      element.bind('keypress', function(event) {
        if(event.keyCode === 32) {
          event.preventDefault();
        }
      });
    }
  };
});
controllers.filter('dateonly', function(){
  return function(input){
    var date = moment(input);
    var date_fragment = []
    date_fragment.push(date.format('DD'))
    date_fragment.push(date.format('MM'))
    date_fragment.push((parseInt(date.format('YYYY')) + 543))
    return date_fragment.join('/')
  }
});
controllers.directive('typeaheadFocus', function () {
  return {
    require: 'ngModel',
    link: function (scope, element, attr, ngModel) {
      element.bind('click', function () {
        var viewValue = ngModel.$viewValue;
        scope.checkpointState = '';
        scope.$digest();
        if (ngModel.$viewValue == ' ') {
            ngModel.$setViewValue(null);
        }
        ngModel.$setViewValue(' ');
        ngModel.$setViewValue(viewValue || ' ');
      });
      scope.emptyOrMatch = function (actual, expected) {
        if (expected == ' ') {
            return true;
        }
        return actual.indexOf(expected) > -1;
      };
    }
  };
});
controllers.filter("AbbreviateNumber", function ($sce) {
  return function (value) {
    var newValue = value;
    if (value >= 1000) {
      var suffixes = ["", "k", "m", "b","t"];
      var suffixNum = Math.floor( (""+value).length/3 );
      var shortValue = '';
      for (var precision = 2; precision >= 1; precision--) {
        shortValue = parseFloat( (suffixNum != 0 ? (value / Math.pow(1000,suffixNum) ) : value).toPrecision(precision));
        var dotLessShortValue = (shortValue + '').replace(/[^a-zA-Z 0-9]+/g,'');
        if (dotLessShortValue.length <= 2) { break; }
      }
      if (shortValue % 1 != 0)  shortNum = shortValue.toFixed(1);
      newValue = shortValue+suffixes[suffixNum];
    }
    return newValue;
  }
});
controllers.factory('API', function($window,$q,$timeout,$http,$rootScope,toaster,$location){
  var Host = function(){
    if($window.location.origin.indexOf("localhost") > -1){
      return "http://localhost:8888/teachintour";
    }
    else{
      return "http://teachintour.com";
    }
  }
  var Fee = function(param) {
    $rootScope.processing = true;
    var deferred = $q.defer();
    var host = Host()+'/api/v1/fee';
    $http.post(host,param).success(function(results) {
      deferred.resolve(results);
      $rootScope.processing = false;
    });
    return deferred.promise;
  }
  var Location = function(param) {
    $rootScope.processing = true;
    var deferred = $q.defer();
    var host = Host()+'/api/v1/location';
    $http.post(host,param).success(function(results) {
      deferred.resolve(results);
      $rootScope.processing = false;
    });
    return deferred.promise;
  }
  var Project = function(param) {
    $rootScope.processing = true;
    var deferred = $q.defer();
    var host = Host()+'/api/v1/project';
    $http.post(host,param).success(function(results) {
      deferred.resolve(results);
      $rootScope.processing = false;
    });
    return deferred.promise;
  }
  var File = function(param) {
    $rootScope.processing = true;
    var deferred = $q.defer();
    var host = Host()+'/api/v1/file';
    $http.post(host,param).success(function(results) {
      deferred.resolve(results);
      $rootScope.processing = false;
    });
    return deferred.promise;
  }
  var Apply = function(param) {
    $rootScope.processing = true;
    var deferred = $q.defer();
    var host = Host()+'/api/v1/apply';
    $http.post(host,param).success(function(results) {
      deferred.resolve(results);
      $rootScope.processing = false;
    });
    return deferred.promise;
  }
  var Mailer = function(param) {
    $rootScope.processing = true;
    var deferred = $q.defer();
    var host = Host()+'/api/v1/mailer';
    $http.post(host,param).success(function(results) {
      deferred.resolve(results);
      $rootScope.processing = false;
    });
    return deferred.promise;
  }
  var parseBool = function (str) {
    switch (str) {
      case 1:
      case "1":
      case "true":
        return true;
      case 0:
      case "0":
      case "false":
        return false;
    }
  }
  var Toaster = function(type,title,message){
    toaster.pop({
      type: type,
      title: title,
      body: message,
      showCloseButton: true
    });
  }
  var Remove = function (list, item) {
    var index = list.indexOf(item);
    list.splice(index, 1);
  };
  return {
    Fee:Fee,
    Location:Location,
    Project:Project,
    File:File,
    Apply:Apply,
    Mailer:Mailer,
    parseBool:parseBool,
    Toaster:Toaster,
    Remove:Remove,
  };
});

///////////////////////////////////////////////////SETTING FEE///////////////////////////////////////////////////
controllers.controller('SettingFeeController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.limit = 10;
    $scope.skip = 0;
    $scope.total = 0;
    $scope.Fees = [];
    $scope.feedItem = function(skip,limit){
      API.Fee({filter: {action:"manage", section:"all",skip:skip,limit:limit}}).then(function (result) {
        if(result.status){
          angular.forEach(result.data, function (element, index, array) {
              element.detail = angular.fromJson(element.detail);
              element.popular = API.parseBool(element.popular);
              element.shelf = API.parseBool(element.shelf);
              element.available = API.parseBool(element.available);
              $scope.Fees.push(element);
          });
          $scope.total = result.total;
        }
      });
    }
    $scope.feedItem($scope.skip,$scope.limit);
    $scope.loadMoreItem = function(){
        $scope.skip += 10;
        $scope.feedItem($scope.skip,$scope.limit);
    }
  }
]);
controllers.controller('SettingFeeAddController', ['API','$scope', '$location', '$window', '$http',
  function (API, $scope, $location, $window,  $http) {
    $scope.init = function (){
      $scope.Fee = {
        popular:false,
        shelt:false,
        available:true
      };
      $scope.Promotions = [];
    }
    $scope.init();
    $scope.addPromotion = function(promotion){
      if(promotion!=null){
        $scope.Promotions.push({title:promotion});
        $scope.promotion='';
      }
      else{
        API.Toaster('warning','Promotion','กรุณากรอกข้อมูลก่อนทำการบันทึก');
      }
    }
    $scope.removePromotion = function(promotion){
      API.Remove($scope.Promotions,promotion);
    }
    $scope.saveNewPrice = function(){
      $scope.Fee.detail = angular.toJson($scope.Promotions);
      if($scope.Fee.title!=null&&$scope.Fee.price!=null){
        API.Fee({filter: {action:'create',data:$scope.Fee}}).then(function (result) {
          if(result.status){
            API.Toaster(result.toast,'Pricing',result.message);
            $scope.init();
          }
        });
      }
      else{
        API.Toaster('warning','Pricing','กรุณากรอกข้อมูลก่อนทำการบันทึก');
      }
    }
  }
]);

controllers.controller('SettingFeeEditController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.feeID = $window.location.pathname.split('/setting/fee/edit/')[1];
    $scope.Fee = {
        popular:false,
        shelt:false,
        available:true
      };
    $scope.Promotions = [];
    API.Fee({filter: {action:"manage", section:"detail", data:{id:$scope.feeID }}}).then(function (result) {
      if(result.status){
        $scope.Fee = result.data;
        $scope.Fee.popular = API.parseBool(result.data.popular);
        $scope.Fee.shelf = API.parseBool(result.data.shelf);
        $scope.Fee.available = API.parseBool(result.data.available);
        $scope.Promotions = angular.fromJson(result.data.detail);
      }
    });
    $scope.addPromotion = function(promotion){
      if(promotion!=null){
        $scope.Promotions.push({title:promotion});
        $scope.promotion='';
      }
      else{
        API.Toaster('warning','Promotion','กรุณากรอกข้อมูลก่อนทำการบันทึก');
      }
    }
    $scope.removePromotion = function(promotion){
      API.Remove($scope.Promotions,promotion);
    }
    $scope.updateNewPrice = function(){
      $scope.Fee.detail = angular.toJson($scope.Promotions);
      if($scope.Fee.title!=''&&$scope.Fee.price!=''){
        API.Fee({filter: {action:'update',data:$scope.Fee}}).then(function (result) {
          if(result.status){
            API.Toaster(result.toast,'Pricing',result.message);
          }
        });
      }
      else{
        API.Toaster('warning','Pricing','กรุณากรอกข้อมูลก่อนทำการบันทึก');
      }
    }
    $scope.deleteNewPrice = function(){
      if($scope.Fee.id!=null){
        API.Fee({filter: {action:'delete',data:$scope.Fee}}).then(function (result) {
          if(result.status){
            API.Toaster(result.toast,'Pricing',result.message);
            $window.location=$window.location.pathname.split('/setting/')[0]+'/setting/fee/';
          }
        });
      }
    }
  }
]);

///////////////////////////////////////////////////SETTING LOCATION///////////////////////////////////////////////////
controllers.controller('SettingLocationController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.limit = 10;
    $scope.skip = 0;
    $scope.total = 0;
    $scope.Locations = [];
    $scope.feedItem = function(skip,limit){
      API.Location({filter: {action:"manage", section:"all",skip:skip,limit:limit}}).then(function (result) {
        if(result.status){
          angular.forEach(result.data, function (element, index, array) {
              element.available = API.parseBool(element.available);
              $scope.Locations.push(element);
          });
          $scope.total = result.total;
        }
      });
    }
    $scope.feedItem($scope.skip,$scope.limit);
    $scope.loadMoreItem = function(){
        $scope.skip += 10;
        $scope.feedItem($scope.skip,$scope.limit);
    }
  }
]);
controllers.controller('SettingLocationAddController', ['API','$scope', '$location', '$window', '$http',
  function (API, $scope, $location, $window,  $http) {
    $scope.init = function (){
      $scope.Location = {
        available:true
      };
    }
    $scope.init();
    $scope.saveNewLocation = function(){
      if($scope.Location.title!=''){
        API.Location({filter: {action:'create',data:$scope.Location}}).then(function (result) {
          if(result.status && result.data.id){
            API.Toaster(result.toast,'Location',result.message);
            $window.location=$window.location.pathname.split('/setting/')[0]+'/setting/location/edit/'+result.data.id;
            $scope.init();
          }
          else{
            API.Toaster('warning','Location','เกิดข้อผิดพลาด');
          }
        });
      }
      else{
        API.Toaster('warning','Location','กรุณากรอกข้อมูลก่อนทำการบันทึก');
      }
    }
  }
]);
controllers.controller('SettingLocationEditController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.locationID = $window.location.pathname.split('/setting/location/edit/')[1];
    $scope.Location = {
      available:false
    };
    $scope.Cover = {
      list:[],
      addMore:false
    };
    $scope.Gallery = {
      list:[],
      addMore:false
    };
    $scope.getLocationCover = function(){
      $scope.Cover.list = [];
      API.File({filter: {action:'select',folder:'locations',section:'covers',location:$scope.locationID}}).then(function (result) {
        if(result.status){
          angular.forEach(result.data, function (element, index, array) {
            if(md5.createHash($scope.Location.cover)==element.key_path){
              element.covered = true;
            }
            else{
              element.covered = false;
            }
            $scope.Cover.list.push(element);
          });
        }
      });
    }
    $scope.getLocationGallery = function(){
      $scope.Gallery.list = [];
      API.File({filter: {action:'select',folder:'locations',section:'galleries',location:$scope.locationID}}).then(function (result) {
        if(result.status){
          $scope.Gallery.list = result.data;
          // angular.forEach(result.data, function (element, index, array) {
          //   if(md5.createHash($scope.Location.cover)==element.key_path){
          //     element.covered = true;
          //   }
          //   else{
          //     element.covered = false;
          //   }
          //   $scope.Gallery.list.push(element);
          // });
        }
      });
    }
    API.Location({filter: {action:"manage", section:"detail", data:{id:$scope.locationID }}}).then(function (result) {
      if(result.status){
        $scope.Location = result.data;
        $scope.Location.available = API.parseBool(result.data.available);
      }
    }).then(function(){
      $scope.getLocationCover();
      $scope.getLocationGallery();
    });
    $scope.updateNewLocation = function(){
      if($scope.Location.title!=''){
        API.Location({filter: {action:'update', section:"detail",data:$scope.Location}}).then(function (result) {
          if(result.status){
            API.Toaster(result.toast,'Location',result.message);
          }
        });
      }
      else{
        API.Toaster('warning','Location','กรุณากรอกข้อมูลก่อนทำการบันทึก');
      }
    }
    $scope.deleteNewLocation = function(){
      if($scope.Location.id!=null){
        API.Location({filter: {action:'delete',data:$scope.Location}}).then(function (result) {
          if(result.status){
            API.Toaster(result.toast,'Location',result.message);
            $window.location=$window.location.pathname.split('/setting/')[0]+'/setting/location/';
          }
        });
      }
    }

    $scope.addCover = function(){
      $scope.Cover.addMore = true;
    }
    $scope.deleteCover = function(data){
      if(!data.covered){
        API.File({filter: {action:"unlink",section:"cover",path:data.original_path}}).then(function (result) {
          if(result.status){
            API.Remove($scope.Cover.list,data);
            API.Toaster(result.toast,'Cover',result.message);
          }
        });
      }
      else{
        API.Toaster('warning','Cover','ระบบไม่สามารถลบรูป Cover ได้');
      }
    }
    $scope.cancelUpload = function(){
      $scope.getLocationCover();
      $scope.Cover.addMore = false;
    }
    $scope.markAsCover = function(data){
      $scope.Location.cover = data.original_path;
      if($scope.Location.cover.length >= 1){
        API.Location({filter: {action:"update",section:"cover",data:$scope.Location}}).then(function (result) {
          if(result.status){
             angular.forEach($scope.Cover.list, function (element, index, array) {
              if(element.key_path == data.key_path){
                element.covered = true;
              }
              else{
                element.covered = false;
              }
             });
            API.Toaster(result.toast,'Location',result.message);
          }
        });
      }
    }

    $scope.addGalleryImage = function(){
      $scope.Gallery.addMore = true;
    }
    $scope.deleteGalleryImage = function(data){
      API.File({filter: {action:"unlink",section:"gallery",path:data.original_path}}).then(function (result) {
        if(result.status){
          API.Remove($scope.Gallery.list,data);
          API.Toaster(result.toast,'Gallery',result.message);
        }
      });
    }
    $scope.cancelGalleryUpload = function(){
      $scope.getLocationGallery();
      $scope.Gallery.addMore = false;
    }
  }
]);
controllers.controller('SettingLocationDetailController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.locationID = $window.location.pathname.split('/setting/location/')[1];
    $scope.Location = {
        available:false
      };
    API.Location({filter: {action:"manage", section:"preview", data:{id:$scope.locationID }}}).then(function (result) {
      if(result.status){
        $scope.Location = result.data;
        $scope.Location.available = API.parseBool(result.data.available);
      }
    });
  }
]);
///////////////////////////////////////////////////SETTING PROJECT///////////////////////////////////////////////////
controllers.controller('SettingProjectController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.limit = 10;
    $scope.skip = 0;
    $scope.total = 0;
    $scope.Projects = [];
    $scope.feedItem = function(skip,limit){
      API.Project({filter: {action:"manage", section:"all",skip:skip,limit:limit}}).then(function (result) {
        if(result.status){
          angular.forEach(result.data, function (element, index, array) {
              element.available = API.parseBool(element.available);
              $scope.Projects.push(element);
          });
          $scope.total = result.total;
        }
      });
    }
    $scope.feedItem($scope.skip,$scope.limit);
    $scope.loadMoreItem = function(){
        $scope.skip += 10;
        $scope.feedItem($scope.skip,$scope.limit);
    }
  }
]);
controllers.controller('SettingProjectAddController', ['API','$scope', '$location', '$window', '$http',
  function (API, $scope, $location, $window,  $http) {
    $scope.init = function (){
      $scope.Project = {
        available:true
      };
    }
    $scope.init();
    $scope.saveNewProject = function(){
      if($scope.Project.title!=''){
        API.Project({filter: {action:'create',data:$scope.Project}}).then(function (result) {
          if(result.status && result.data.id){
            API.Toaster(result.toast,'Project',result.message);
            $window.location=$window.location.pathname.split('/setting/')[0]+'/setting/project/edit/'+result.data.id;
            $scope.init();
          }
          else{
            API.Toaster('warning','Project','เกิดข้อผิดพลาด');
          }
        });
      }
      else{
        API.Toaster('warning','Project','กรุณากรอกข้อมูลก่อนทำการบันทึก');
      }
    }
  }
]);
controllers.controller('SettingProjectEditController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.projectID = $window.location.pathname.split('/setting/project/edit/')[1];
    $scope.Project = {
      available:false
    };
    $scope.Cover = {
      list:[],
      addMore:false
    };
    $scope.getProjectCover = function(){
      $scope.Cover.list = [];
      API.File({filter: {action:'select',folder:'projects',section:'covers',location:$scope.projectID}}).then(function (result) {
        if(result.status){
          angular.forEach(result.data, function (element, index, array) {
            console.log($scope.Project.cover );
            if(md5.createHash($scope.Project.cover)==element.key_path){
              element.covered = true;
            }
            else{
              element.covered = false;
            }
            $scope.Cover.list.push(element);
          });
        }
      });
    }
    API.Project({filter: {action:"manage", section:"detail", data:{id:$scope.projectID }}}).then(function (result) {
      if(result.status){
        $scope.Project = result.data;
        $scope.Project.available = API.parseBool(result.data.available);
      }
    }).then(function(){
      $scope.getProjectCover();
    });
    $scope.updateNewProject = function(){
      if($scope.Project.title!=''){
        API.Project({filter: {action:'update', section:"detail",data:$scope.Project}}).then(function (result) {
          if(result.status){
            API.Toaster(result.toast,'Project',result.message);
          }
        });
      }
      else{
        API.Toaster('warning','Project','กรุณากรอกข้อมูลก่อนทำการบันทึก');
      }
    }
    $scope.deleteNewProject = function(){
      if($scope.Project.id!=null){
        API.Project({filter: {action:'delete',data:$scope.Project}}).then(function (result) {
          if(result.status){
            API.Toaster(result.toast,'Project',result.message);
            $window.location=$window.location.pathname.split('/setting/')[0]+'/setting/project/';
          }
        });
      }
    }

    $scope.addCover = function(){
      $scope.Cover.addMore = true;
    }
    $scope.deleteCover = function(data){
      if(!data.covered){
        API.File({filter: {action:"unlink",section:"cover",path:data.original_path}}).then(function (result) {
          if(result.status){
            API.Remove($scope.Cover.list,data);
            API.Toaster(result.toast,'Cover',result.message);
          }
        });
      }
      else{
        API.Toaster('warning','Cover','ระบบไม่สามารถลบรูป Cover ได้');
      }
    }
    $scope.cancelUpload = function(){
      $scope.getProjectCover();
      $scope.Cover.addMore = false;
    }
    $scope.markAsCover = function(data){
      $scope.Project.cover = data.original_path;
      if($scope.Project.cover.length >= 1){
        API.Project({filter: {action:"update",section:"cover",data:$scope.Project}}).then(function (result) {
          if(result.status){
             angular.forEach($scope.Cover.list, function (element, index, array) {
              if(element.key_path == data.key_path){
                element.covered = true;
              }
              else{
                element.covered = false;
              }
             });
            API.Toaster(result.toast,'Project',result.message);
          }
        });
      }
    }
  }
]);
controllers.controller('SettingProjectDetailController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.projectID = $window.location.pathname.split('/setting/project/')[1];
    $scope.Project = {
        available:false
      };
    API.Project({filter: {action:"manage", section:"preview", data:{id:$scope.projectID }}}).then(function (result) {
      if(result.status){
        $scope.Project = result.data;
        $scope.Project.available = API.parseBool(result.data.available);
      }
    });
  }
]);
///////////////////////////////////////////////////SETTING APPLICATIONS///////////////////////////////////////////////////
controllers.controller('SettingApplicationController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.limit = 10;
    $scope.skip = 0;
    $scope.total = 0;
    $scope.Applications = [];
    $scope.feedItem = function(skip,limit){
      API.Apply({filter: {action:"manage", section:"all",skip:skip,limit:limit}}).then(function (result) {
        console.log(result);
        if(result.status){
          angular.forEach(result.data, function (element, index, array) {
              $scope.Applications.push(element);
          });
          $scope.total = result.total;
        }
      });
    }
    $scope.feedItem($scope.skip,$scope.limit);
    $scope.loadMoreItem = function(){
        $scope.skip += 10;
        $scope.feedItem($scope.skip,$scope.limit);
    }
  }
]);
controllers.controller('SettingApplicationDetailController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.applicationID = $window.location.pathname.split('/setting/application/')[1];
    API.Apply({filter: {action:"manage", section:"preview", data:{id:$scope.applicationID }}}).then(function (result) {
      if(result.status){
        var application = result.data[0];
        $scope.approval = {
          id:application.id,
          status: application.approval,
          date:application.approvedAt,
          note:application.note
        }
        $scope.personal = {
          firstname:application.firstname,
          lastname:application.lastname,
          nationality:application.nationality,
          date_of_birth:application.date_of_birth,
          gender:application.gender,
          email:application.email,
          phone:application.phone,
          line:application.line,
          facebook:application.facebook,
          skype:application.skype,
        };
        $scope.address = {
          street:application.street,
          city:application.city,
          state:application.state,
          zipcode:application.zipcode,
          country:application.country
        };
        $scope.tour = {
          location:application.location,
          project:application.project,
          fee:application.fee,
          start_date:application.start_date
        };
        $scope.other = {
          education:application.education,
          experience:application.experience,
          language:application.language,
          skill:application.skill
        };
        $scope.emergency = {
          contact:application.emergency
        };
        $scope.background = {
          violation:application.violation,
          violation_detail:application.violation_detail,
          criminal:application.criminal,
          criminal_detail:application.criminal_detail
        };
      }
    });
    $scope.ResponseBack = function(){
      API.Apply({filter: {action:"approval", data:$scope.approval}}).then(function (result) {
        if(result.status){
          API.Toaster(result.toast,'Approval',result.message);
        }
      });
    }
  }
]);
///////////////////////////////////////////////////FEE VIEW///////////////////////////////////////////////////
controllers.controller('FeeController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.Fees = [];
    API.Fee({filter: {action:"select", section:"all"}}).then(function (result) {
      if(result.status){
        angular.forEach(result.data, function (element, index, array) {
          element.detail = angular.fromJson(element.detail);
          element.popular = API.parseBool(element.popular);
          element.shelf = API.parseBool(element.shelf);
          element.available = API.parseBool(element.available);
          $scope.Fees.push(element);
        });
      }
    });
  }
]);
///////////////////////////////////////////////////LOCATION VIEW///////////////////////////////////////////////////
controllers.controller('LocationController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.limit = 9;
    $scope.skip = 0;
    $scope.total = 0;
    $scope.Locations = [];
    $scope.feedItem = function(skip,limit){
      API.Location({filter: {action:"select", section:"all",skip:skip,limit:limit}}).then(function (result) {
        if(result.status){
          $scope.Locations = result.data;
          $scope.total = result.total;
        }
      });
    }
    $scope.feedItem($scope.skip,$scope.limit);
    $scope.loadMoreItem = function(){
        $scope.skip += 10;
        $scope.feedItem($scope.skip,$scope.limit);
    }
  }
]);
controllers.controller('LocationDetailController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.LocationID = $window.location.pathname.split('/location/')[1];
    $scope.Location = {};
    $scope.Galleries = [];
    API.Location({filter: {action:"select", section:"detail", data:{id:$scope.LocationID }}}).then(function (result) {
      if(result.status){
        $scope.Location = result.data;
      }
    }).then(function(){
      // API.File({filter: {action:'select',folder:'locations',section:'galleries',location:$scope.LocationID}}).then(function (result) {
      //   if(result.status){
      //     console.log(result);
      //     $scope.Galleries = result.data;
      //   }
      // });
    });

  }
]);
///////////////////////////////////////////////////PROJECT VIEW///////////////////////////////////////////////////
controllers.controller('ProjectController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {

    $scope.limit = 9;
    $scope.skip = 0;
    $scope.total = 0;
    $scope.Projects = [];
    $scope.feedItem = function(skip,limit){
      API.Project({filter: {action:"select", section:"all",skip:skip,limit:limit}}).then(function (result) {
        if(result.status){
          angular.forEach(result.data, function (element, index, array) {
              $scope.Projects.push(element);
          });
          $scope.total = result.total;
        }
      });
    }
    $scope.feedItem($scope.skip,$scope.limit);
    $scope.loadMoreItem = function(){
        $scope.skip += 10;
        $scope.feedItem($scope.skip,$scope.limit);
    }
  }
]);
controllers.controller('ProjectDetailController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.projectID = $window.location.pathname.split('/project/')[1];
    $scope.Project = {};
    API.Project({filter: {action:"select", section:"detail", data:{id:$scope.projectID }}}).then(function (result) {
      if(result.status){
        $scope.Project = result.data;
      }
    });
  }
]);
///////////////////////////////////////////////////MAIN VIEW///////////////////////////////////////////////////
controllers.controller('MainController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.limit = 6;
    $scope.skip = 0;
    $scope.total = 0;
    $scope.Projects = [];
    $scope.feedItem = function(skip,limit){
      API.Project({filter: {action:"select", section:"all",skip:skip,limit:limit}}).then(function (result) {
        if(result.status){
          angular.forEach(result.data, function (element, index, array) {
              $scope.Projects.push(element);
          });
          $scope.total = result.total;
        }
      });
    }
    $scope.feedItem($scope.skip,$scope.limit);
    $scope.loadMoreItem = function(){
        $scope.skip += 10;
        $scope.feedItem($scope.skip,$scope.limit);
    }
  }
]);
/////////////////////////////////////////////////CONTACT VIEW///////////////////////////////////////////////////
controllers.controller('ContactFormController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.init = function(){
      $scope.mail = {
        bot:'REMOVE this text before send',
        send:false
      }
    }
    API.Mailer({filter: {action:"test"}}).then(function (result) {
     console.log(result);
    });
    $scope.init();
    $scope.contactUs = function(){
      if($scope.mail.email){
        if($scope.mail.bot==''){
          $scope.mail.send = true;
          API.Mailer({filter: {action:"contact", section:"email",data: $scope.mail}}).then(function (result) {
            if(result.status){
              API.Toaster(result.toast,'Mailer',result.message);
              $scope.mail.send = false;
              $scope.init();
            }
          });
        }
        else{
          API.Toaster('warning','Mailer','Please remove Human verification text.');
        }
      }
      else{
        API.Toaster('warning','Mailer','Please fill in email address.');
      }
    }
  }
]);

///////////////////////////////////////////////////APPLY ONLINE///////////////////////////////////////////////////
controllers.controller('ApplyOnlineController', ['API','$rootScope', '$scope', '$location', '$window', '$http', 'md5', 'moment',
  function (API, $rootScope, $scope, $location, $window,  $http, md5, moment) {
    $scope.Locations = [];
    $scope.Projects = [];
    $scope.Fees = [];
    API.Location({filter: {action:"select", section:"appy"}}).then(function (result) {
      if(result.status){
        $scope.Locations = result.data;
      }
    });
    API.Project({filter: {action:"select", section:"appy"}}).then(function (result) {
      if(result.status){
        $scope.Projects = result.data;
      }
    });
    API.Fee({filter: {action:"select", section:"appy"}}).then(function (result) {
      if(result.status){
        console.log(result.data);
        $scope.Fees = result.data;
      }
    });
    $scope.init = function(){
      $scope.agreement = false;
      $scope.personal = {
        firstname:'',
        lastname:'',
        nationality:'',
        date_of_birth:'',
        gender:'1',
        email:'',
        phone:''
      };
      $scope.address = {
        street:'',
        city:'',
        state:'',
        zipcode:'',
        country:''
      };
      $scope.tour = {
        location:'1',
        project:'1',
        fee:'2',
        start_date:''
      };
      $scope.other = {
        education:'',
        experience:'',
        language:'',
        skill:''
      };
      $scope.emergency = {
        contact:''
      };
      $scope.background = {
        violation:'no',
        violation_detail:'NA',
        criminal:'no',
        criminal_detail:'NA'
      };
    }

    $scope.init();
    $scope.submitApplication = function(data){
      if(data.agreement){
        API.Apply({filter: {action:'create',data:data}}).then(function (result) {
          if(result.status){
            $scope.init();
            API.Toaster(result.toast,'Application',result.message);
          }
          else{
            API.Toaster('warning','Project','เกิดข้อผิดพลาด');
          }
        });
      }
      else{
        $rootScope.processing = false;
        API.Toaster('warning','teachin\' tour','Please accept TERMS AND CONDITIONS before submitting the form!');
      }
    }
    $scope.ApplyNow = function(){
      $scope.Apply = {
        personal: $scope.personal,
        address: $scope.address,
        tour: $scope.tour,
        other: $scope.other,
        emergency: $scope.emergency,
        background: $scope.background,
        agreement:$scope.agreement
      };
      var status = [];
      for (var k in $scope.Apply) {
        if ($scope.Apply.hasOwnProperty(k)) {
          for (var m in $scope.Apply[k]) {
            if($scope.Apply[k][m].length>0){
              status.push(true);
            }
            else{
              status.push(false);
              API.Toaster('warning','Apply',m+' cannot be blank.');
            }
          }
        }
      }
      if(status.indexOf(false) <= -1){
        $scope.submitApplication($scope.Apply);
      }
    }
  }
]);
/////////////////////////////////////////////////CONTACT VIEW///////////////////////////////////////////////////
controllers.controller('ApplicationController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.limit = 10;
    $scope.skip = 0;
    $scope.total = 0;
    $scope.Applications = [];
    $scope.feedItem = function(skip,limit){
      API.Apply({filter: {action:"select", section:"all",skip:skip,limit:limit}}).then(function (result) {
        console.log(result);
        if(result.status){
          angular.forEach(result.data, function (element, index, array) {
              $scope.Applications.push(element);
          });
          $scope.total = result.total;
        }
      });
    }
    $scope.feedItem($scope.skip,$scope.limit);
    $scope.loadMoreItem = function(){
        $scope.skip += 10;
        $scope.feedItem($scope.skip,$scope.limit);
    }
  }
]);
controllers.controller('ApplicationDetailController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    $scope.applicationID = $window.location.pathname.split('/application/')[1];
    API.Apply({filter: {action:"select", section:"detail", data:{id:$scope.applicationID }}}).then(function (result) {
      if(result.status){
        var application = result.data[0];
        $scope.approval = {
          id:application.id,
          status: application.approval,
          date:application.approvedAt,
          note:application.note
        }
        $scope.personal = {
          firstname:application.firstname,
          lastname:application.lastname,
          nationality:application.nationality,
          date_of_birth:application.date_of_birth,
          gender:application.gender,
          email:application.email,
          phone:application.phone,
          line:application.line,
          facebook:application.facebook,
          skype:application.skype,
        };
        $scope.address = {
          street:application.street,
          city:application.city,
          state:application.state,
          zipcode:application.zipcode,
          country:application.country
        };
        $scope.tour = {
          location:application.location,
          project:application.project,
          fee:application.fee,
          start_date:application.start_date
        };
        $scope.other = {
          education:application.education,
          experience:application.experience,
          language:application.language,
          skill:application.skill
        };
        $scope.emergency = {
          contact:application.emergency
        };
        $scope.background = {
          violation:application.violation,
          violation_detail:application.violation_detail,
          criminal:application.criminal,
          criminal_detail:application.criminal_detail
        };
      }
    });
  }
]);

