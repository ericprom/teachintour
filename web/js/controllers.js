var controllers = angular.module('controllers', ['toaster', 'ngAnimate','ui.bootstrap', 'angular-md5']);
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
  var Program = function(host,param) {
    $rootScope.processing = true;
    var deferred = $q.defer();
    $http.post(host,param).success(function(results) {
      deferred.resolve(results);
      $rootScope.processing = false;
    });
    return deferred.promise;
  }
  var Schedule = function(host,param) {
    $rootScope.processing = true;
    var deferred = $q.defer();
    $http.post(host,param).success(function(results) {
      deferred.resolve(results);
      $rootScope.processing = false;
    });
    return deferred.promise;
  }
  var Condition = function(host,param) {
    $rootScope.processing = true;
    var deferred = $q.defer();
    $http.post(host,param).success(function(results) {
      deferred.resolve(results);
      $rootScope.processing = false;
    });
    return deferred.promise;
  }
  var Setting = function(host,param) {
    $rootScope.processing = true;
    var deferred = $q.defer();
    $http.post(host,param).success(function(results) {
      deferred.resolve(results);
      $rootScope.processing = false;
    });
    return deferred.promise;
  }
  var File = function(host,param) {
    $rootScope.processing = true;
    var deferred = $q.defer();
    $http.post(host,param).success(function(results) {
      deferred.resolve(results);
      $rootScope.processing = false;
    });
    return deferred.promise;
  }
  var Ticket = function(host,param) {
    $rootScope.processing = true;
    var deferred = $q.defer();
    $http.post(host,param).success(function(results) {
      deferred.resolve(results);
      $rootScope.processing = false;
    });
    return deferred.promise;
  }
  var Mailer = function(host,param) {
    $rootScope.processing = true;
    var deferred = $q.defer();
    $http.post(host,param).success(function(results) {
      deferred.resolve(results);
      $rootScope.processing = false;
    });
    return deferred.promise;
  }
  var fbToken = function (config) {
    var tokenUrl = 'https://graph.facebook.com/oauth/access_token?client_id=574606776032825&client_secret=ddb95644bb09c0b7336b161d65c9771e&grant_type=client_credentials';
    var deferred = $q.defer();
    $http.get(tokenUrl, config).success(function(results) {
      deferred.resolve(results);
    });
    return deferred.promise;
  };
  var fbGraph = function (param) {
    var graphUrl = 'https://graph.facebook.com/v2.5/'+param.id+'/'+param.action+'?'+param.config;
    var deferred = $q.defer();
    $http.get(graphUrl, param).success(function(results) {
      deferred.resolve(results);
    });
    return deferred.promise;
  };
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
    Condition:Condition,
    Program:Program,
    Schedule:Schedule,
    Setting:Setting,
    File:File,
    Ticket:Ticket,
    Mailer:Mailer,
    fbGraph:fbGraph,
    fbToken:fbToken,
    parseBool:parseBool,
    Toaster:Toaster,
    Remove:Remove,
  };
});

controllers.controller('ManageController', ['API','$scope', '$location', '$window', '$http',
  function (API, $scope, $location, $window,  $http) {
    var host = $window.location.href.split('/wonderful-journey/')[0]+'/wonderful-journey';
    $scope.Settings = {
      ticket:{
        list:[],
        note:''
      },
      faq:[],
      about:'',
      init:false
    };
    $scope.Programs = [];
    $scope.Program = {
      name:'',
      highlight:'',
      range:'',
      duration:'',
      price:'',
      new:false
    };
    $scope.Slider = {
      list:[],
      addMore:false
    };
    $scope.menu = {
      about:{
        btn:'บันทึกเกี่ยวกับเรา',
        new:true
      },
      faq:{
        btn:'บันทึกคำถาม',
        new:true
      },
      ticket:{
        btn:'บันทึกตั๋วใหม่',
        new:true
      },
    }
    $scope.getSlider = function (){
      API.File(host+'/api/v1/file/select',{filter: {section:'sliders'}}).then(function (result) {
        if(result.status){
          $scope.Slider.list = [];
          angular.forEach(result.data, function (element, index, array) {
            $scope.Slider.list.push(element);
          });
        }
      });
    }
    $scope.init = function(){
      API.Program(host+'/api/v1/program',{filter: {action:"manage", section:"all"}}).then(function (result) {
        if(result.status){
          $scope.Programs = result.data;
        }
      });
      API.Setting(host+'/api/v1/setting',{filter: {action:"select"}}).then(function (result) {
          if(result.status){
            if(result.data!=null){
              $scope.Settings.init = true;
              $scope.Settings.id = result.data.id;
              if(result.data.about!='' && result.data.about!=null){
                $scope.Settings.about = result.data.about;
                $scope.menu.about.btn = 'อัพเดทเกี่ยวกับเรา';
              }
              if(result.data.faq!='' && result.data.faq!=null){
                $scope.Settings.faq = angular.fromJson(result.data.faq);
                $scope.menu.faq.btn = 'อัพเดทคำถามที่พบบ่อย'
              }
              if(result.data.ticket!='' && result.data.ticket!=null){
                $scope.Settings.ticket = angular.fromJson(result.data.ticket);
                $scope.menu.ticket.btn = 'อัพเดทตั๋วเครื่องบิน'
              }
            }
          }
      });
      $scope.getSlider();
    }
    $scope.init();
    $scope.deleteObj = {};
    $scope.deleteProgram = function(data){
      $scope.deleteObj = data;
      $('#confirm-delete').modal('show');
    }
    $scope.deleteNow = function(){
      API.Program(host,{filter: {action:"delete", section:"partial",data:$scope.deleteObj}}).then(function (result) {
        if(result.status){
          API.Remove($scope.Programs,$scope.deleteObj);
          $('#confirm-delete').modal('hide');
          API.Toaster(result.toast,'Program',result.message);
        }
      });
    }
    $scope.addNewProgram = function(){
      if($scope.Program.new){
        $scope.Program.new = false;
      }
      else{
        $scope.Program.new = true;
      }
    }
    $scope.saveNewProgram = function(){
      if($scope.Program.name.length >= 1){
        API.Program(host+'/api/v1/program',{filter: {action:"create", data:$scope.Program}}).then(function (result) {
          if(result.status){
            API.Toaster(result.toast,'Program',result.message);
             $window.location=$window.location.pathname.split('/manage/')[0]+'/program/'+result.data.id;
          }
        });
      }
      else{
        API.Toaster('warning','Program','กรุณากรอกชื่อโปรแกรมก่อนทำการบันทึก');
      }
    }
    $scope.addAirline = function(){
      $scope.Settings.ticket.list.push({
        name:'',
        details:[]
      });
    }
    $scope.deleteAirline = function(ticket){
      API.Remove($scope.Settings.ticket.list,ticket);
    }
    $scope.addTicketDetail = function(ticket){
      ticket.details.push({
        name:'',
        detail:''
      });
    }
    $scope.deleteTicketDetail = function(ticket, detail){
      API.Remove(ticket,detail);
    }
    $scope.saveUpdateAirline = function(){
      var detail = angular.toJson({
        list:$scope.Settings.ticket.list,
        note:$scope.Settings.ticket.note
      });
      var criteria = {filter: {action:"create",section:'ticket', data:{ticket:detail}}};
      if($scope.Settings.init){
        criteria.filter.data.id = $scope.Settings.id;
        criteria.filter.action='update';
      }
      if($scope.Settings.ticket.list.length>=1){
        API.Setting(host+'/api/v1/setting',criteria).then(function (result) {
            if(result.status){
              $scope.menu.ticket.btn = 'อัพเดทตั๋วเครื่องบิน';
              API.Toaster(result.toast,'Tickets',result.message);
            }
        });
      }
      else{
        API.Toaster('warning','Tickets','กรุณากรอกตั๋วก่อนทำการบันทึก');
      }
    }

    $scope.addFaq = function(){
      $scope.Settings.faq.push({
        name:'',
        details:[]
      });
    }
    $scope.deleteFaq = function(faq){
      API.Remove($scope.Settings.faq,faq);
    }
    $scope.addFaqDetail = function(faq){
      faq.details.push({
        name:'',
        detail:''
      });
    }
    $scope.deleteFaqDetail = function(faq, detail){
      API.Remove(faq,detail);
    }
    $scope.saveUpdateFaq = function(){
      var detail = angular.toJson($scope.Settings.faq);
      var criteria = {filter: {action:"create",section:'faq', data:{faq:detail}}};
      if($scope.Settings.init){
        criteria.filter.data.id = $scope.Settings.id;
        criteria.filter.action='update';
      }
      if($scope.Settings.faq.length>=1){
        API.Setting(host+'/api/v1/setting',criteria).then(function (result) {
            if(result.status){
              $scope.menu.faq.btn = 'อัพเดทคำถามที่พบบ่อย'
              API.Toaster(result.toast,'Faq',result.message);
            }
        });
      }
      else{
        API.Toaster('warning','Faq','กรุณากรอกคำถามก่อนทำการบันทึก');
      }
    }
    $scope.saveSettingAbout = function(data){
      var criteria = {filter: {action:"create",section:'about', data:{about:data}}};
      if($scope.Settings.init){
        criteria.filter.data.id = $scope.Settings.id;
        criteria.filter.action='update';
      }
      if(data.length>=1){
        API.Setting(host+'/api/v1/setting',criteria).then(function (result) {
            if(result.status){
              $scope.menu.about.btn = 'อัพเดทเกี่ยวกับเรา'
              API.Toaster(result.toast,'About',result.message);
            }
        });
      }
      else{
        API.Toaster('warning','Setting','กรุณากรอกข้อความก่อนทำการบันทึก');
      }
    }
    $scope.addSlider = function(){
      $scope.Slider.addMore = true;
    }
    $scope.cancelSlider = function(){
      $scope.getSlider();
      $scope.Slider.addMore = false;
    }
    $scope.deleteSlider = function(data){
      if(!data.covered){
        API.File(host+'/api/v1/file', {filter: {action:"unlink",section:"slider",path:data.original_path}}).then(function (result) {
          if(result.status){
            API.Remove($scope.Slider.list,data);
            API.Toaster(result.toast,'Slider',result.message);
          }
        });
      }
      else{
        API.Toaster('warning','Slider','เกิดข้อผิดพลาด');
      }
    }
  }
]);

controllers.controller('ManageProgramController', ['API','$scope', '$location', '$window', '$http', 'md5',
  function (API, $scope, $location, $window,  $http, md5) {
    var host = $window.location.href.split('/wonderful-journey/')[0]+'/wonderful-journey';
    $scope.programID = $window.location.pathname.split('/program/')[1];
    $scope.Program = {};
    $scope.Schedules = [];
    $scope.Conditions = [];
    $scope.Cover = {
      list:[],
      addMore:false
    };
    $scope.Pdf = {
      list:[],
      addMore:false
    };
    $scope.menu = {
      schedule:{
        btn:'บันทึกตารางเวลา',
        new:true
      },
      condition:{
        btn:'บันทึกเงื่อนไข',
        new:true
      }
    }
    $scope.getCover = function(){
      API.File(host+'/api/v1/file/select',{filter: {section:'covers',programID:$scope.programID}}).then(function (result) {
        if(result.status){
          $scope.Cover.list = [];
          angular.forEach(result.data, function (element, index, array) {
            if($scope.Program.cover!='' && md5.createHash($scope.Program.cover)==element.key_path){
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
    $scope.getPdf = function(){
      API.File(host+'/api/v1/file/select',{filter: {section:'pdfs',programID:$scope.programID}}).then(function (result) {
        if(result.status){
          $scope.Pdf.list = [];
          angular.forEach(result.data, function (element, index, array) {
            if($scope.Program.pdf!='' && md5.createHash($scope.Program.pdf)==element.key_path){
              element.filed = true;
            }
            else{
              element.filed = false;
            }
            $scope.Pdf.list.push(element);
          });
        }
      });
    }
    $scope.getSchedule = function(){
      API.Schedule(host+'/api/v1/schedule',{filter: {action:"select", data:{id:$scope.programID}}}).then(function (result) {
          if(result.status){
            if(result.data!=null){
              $scope.Schedules = angular.fromJson(result.data.detail);
              $scope.menu.schedule.btn = 'อัพเดทตารางเวลา'
              $scope.menu.schedule.new = false;
            }
          }
      });
    }
    $scope.getCondition = function(){
      API.Condition(host+'/api/v1/condition',{filter: {action:"select", data:{id:$scope.programID}}}).then(function (result) {
          if(result.status){
            if(result.data!=null){
              $scope.Conditions = angular.fromJson(result.data.detail);
              $scope.menu.condition.btn = 'อัพเดทเงื่อนไข'
              $scope.menu.condition.new = false;
            }
          }
      });
    }
    $scope.init = function(){
      API.Program(host+'/api/v1/program',{filter: {action:"manage", section:"detail", data:{id:$scope.programID }}}).then(function (result) {
        if(result.status){
          result.data.option = API.parseBool(result.data.status);
          $scope.Program = result.data;
        }
      }).then(function(){
        $scope.getCover();
        $scope.getPdf();
        $scope.getSchedule();
        $scope.getCondition();
      });
    }
    $scope.init();

    $scope.switchProgram = function(data){
      if(data==true){
        data = false;
      }
      else{
        data = true;
      }
    }
    $scope.updateProgram = function(){
      if($scope.Program.name.length >= 1){
        if($scope.Program.option==true){
          $scope.Program.status = 1;
        }
        else{
          $scope.Program.status = 0;
        }
        API.Program(host+'/api/v1/program', {filter: {action:"update",section:"detail",data:$scope.Program}}).then(function (result) {
          if(result.status){
            API.Toaster(result.toast,'Program',result.message);
          }
        });
      }
      else{
        API.Toaster('warning','Program','กรุณากรอกชื่อโปรแกรมก่อนทำการบันทึก');
      }
    }
    $scope.addSchedule = function(){
      $scope.Schedules.push({
        name:'',
        details:[]
      });
    }
    $scope.deleteSchedule = function(schedule){
      API.Remove($scope.Schedules,schedule);
    }
    $scope.addScheduleDetail = function(schedule){
      schedule.details.push({
        name:'',
        detail:''
      });
    }
    $scope.deleteScheduleDetail = function(schedule, detail){
      API.Remove(schedule,detail);
    }
    $scope.saveUpdateSchedule = function(){
      $scope.Program.schedule = angular.toJson($scope.Schedules);
      var criteria = {filter: {action:"create", data:$scope.Program}};
      if(!$scope.menu.schedule.new){
        criteria.filter.action='update';
      }
      if($scope.Schedules.length>=1){
        API.Schedule(host+'/api/v1/schedule',criteria).then(function (result) {
            if(result.status){
              $scope.menu.schedule.new = false;
              $scope.menu.schedule.btn = 'อัพเดทตารางเวลา'
              API.Toaster(result.toast,'Schedule',result.message);
            }
        });
      }
      else{
        API.Toaster('warning','Schedule','กรุณากรอกตารางทัวร์ก่อนทำการบันทึก');
      }
    }
    $scope.addCondition = function(){
      $scope.Conditions.push({
        name:'',
        details:[]
      });
    }
    $scope.deleteCondition = function(condition){
      API.Remove($scope.Conditions,condition);
    }
    $scope.addConditionDetail = function(condition){
      condition.details.push({
        name:'',
        detail:''
      });
    }
    $scope.deleteConditionDetail = function(condition, detail){
      API.Remove(condition,detail);
    }
    $scope.saveUpdateCondition = function(){
      $scope.Program.condition = angular.toJson($scope.Conditions);
      var criteria = {filter: {action:"create", data:$scope.Program}};
      if(!$scope.menu.condition.new){
        criteria.filter.action='update';
      }
      if($scope.Conditions.length>=1){
        API.Condition(host+'/api/v1/condition',criteria).then(function (result) {
            if(result.status){
              $scope.menu.condition.new = false;
              $scope.menu.condition.btn = 'อัพเดทเงื่อนไข';
              API.Toaster(result.toast,'Condition',result.message);
            }
        });
      }
      else{
        API.Toaster('warning','Condition','กรุณากรอกเงื่อนไขก่อนทำการบันทึก');
      }
    }

    $scope.addCover = function(){
      $scope.Cover.addMore = true;
    }
    $scope.deleteCover = function(data){
      if(!data.covered){
        API.File(host+'/api/v1/file', {filter: {action:"unlink",section:"cover",path:data.original_path}}).then(function (result) {
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
      $scope.getCover();
      $scope.Cover.addMore = false;
    }
    $scope.markAsCover = function(data){
      $scope.Program.cover = data.original_path;
      if($scope.Program.cover.length >= 1){
        API.Program(host+'/api/v1/program', {filter: {action:"update",section:"cover",data:$scope.Program}}).then(function (result) {
          if(result.status){
             angular.forEach($scope.Cover.list, function (element, index, array) {
              if(element.key_path == data.key_path){
                element.covered = true;
              }
              else{
                element.covered = false;
              }
             });
            API.Toaster(result.toast,'Program',result.message);
          }
        });
      }
    }

    $scope.addPdf = function(){
      $scope.Pdf.addMore = true;
    }
    $scope.cancelPdf = function(){
      $scope.getPdf();
      $scope.Pdf.addMore = false;
    }
    $scope.deletePdf = function(data){
      if(!data.filed){
        API.File(host+'/api/v1/file', {filter: {action:"unlink",section:"pdf",path:data.original_path}}).then(function (result) {
          if(result.status){
            API.Remove($scope.Pdf.list,data);
            API.Toaster(result.toast,'Pdf',result.message);
          }
        });
      }
      else{
        API.Toaster('warning','Pdf','ระบบไม่สามารถไฟล์ PDF ได้');
      }
    }
    $scope.markAsPdf = function(data){
      $scope.Program.pdf = data.original_path;
      if($scope.Program.pdf.length >= 1){
        API.Program(host+'/api/v1/program', {filter: {action:"update",section:"pdf",data:$scope.Program}}).then(function (result) {
          if(result.status){
             angular.forEach($scope.Pdf.list, function (element, index, array) {
              if(element.key_path == data.key_path){
                element.filed = true;
              }
              else{
                element.filed = false;
              }
             });
            API.Toaster(result.toast,'Program',result.message);
          }
        });
      }
    }
  }
]);

controllers.controller('MainController', ['API','$scope', '$location', '$window', '$http',
  function (API, $scope, $location, $window,  $http) {
    var host = $window.location.href.split('/wonderful-journey/')[0]+'/wonderful-journey';
    $scope.limit = 9;
    $scope.skip = 0;
    $scope.total = 0;
    $scope.Programs = [];
    $scope.Sliders = [];
    $scope.Header = {};
    $scope.loadFacebookImage = function(){
      API.fbToken({action:'get facebook token'}).then(function(token){
        var album_criteria = {
          id: '1781836015383517',
          action:'albums',
          config: 'redirect=false&'+token
        }
        API.fbGraph(album_criteria).then(function(album){
          var checkAlbum = 0;
          var totalAlbum = album.data.length-1;
          var albumList = [];
          angular.forEach(album.data, function (element, index, array) {
            if(element.name.indexOf('Timeline Photos') <= -1 && element.name.indexOf('Cover Photos') <= -1 && element.name.indexOf('Profile Pictures') <= -1){
              albumList.push(element);
              if(checkAlbum==totalAlbum){
                var randomAlbum = Math.floor(Math.random() * albumList.length-1) + 1;
                var photo_criteria = {
                  id: albumList[randomAlbum].id,
                  action:'photos',
                  config: 'redirect=false&'+token
                }
                API.fbGraph(photo_criteria).then(function(cover){
                  var picker = Math.floor(Math.random() * cover.data.length) + 1;
                  var picture_criteria = {
                    id: cover.data[picker].id,
                    action:'picture',
                    config: 'redirect=false&'+token
                  }
                  API.fbGraph(picture_criteria).then(function(cover){
                    $scope.Header = cover;
                  });
                });
              }
            }
            checkAlbum++;
          });
        });
      });
    }
    $scope.feedItem = function(skip,limit){
      API.Program(host+'/api/v1/program',{filter: {action:"select", section:"all",skip:skip,limit:limit}}).then(function (result) {
        if(result.status){
          angular.forEach(result.data, function (element, index, array) {
              $scope.Programs.push(element);
          });
          $scope.total = result.total;
        }
      });
      API.File(host+'/api/v1/file/select',{filter: {section:'sliders'}}).then(function (result) {
        if(result.status){
          $scope.Sliders = [];
          angular.forEach(result.data, function (element, index, array) {
            $scope.Sliders.push(element);
          });
        }
      });
      if($scope.Sliders.length<=0){
        $scope.loadFacebookImage();
      }
    }
    $scope.feedItem($scope.skip,$scope.limit);
  }
]);

controllers.controller('ProgramController', ['API','$scope', '$location', '$window', '$http',
  function (API, $scope, $location, $window,  $http) {
    var host = $window.location.href.split('/wonderful-journey/')[0]+'/wonderful-journey';
    $scope.limit = 10;
    $scope.skip = 0;
    $scope.total = 0;
    $scope.Programs = [];
    $scope.feedItem = function(skip,limit){
      API.Program(host+'/api/v1/program',{filter: {action:"select", section:"all",skip:skip,limit:limit}}).then(function (result) {
        if(result.status){
          angular.forEach(result.data, function (element, index, array) {
              $scope.Programs.push(element);
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
controllers.controller('ProgramDetailController', ['API','$scope', '$location', '$window', '$http',
  function (API, $scope, $location, $window,  $http) {
    var host = $window.location.href.split('/wonderful-journey/')[0]+'/wonderful-journey';
    $scope.programID = $window.location.pathname.split('/program/')[1];
    $scope.Program = {
      isLoading:true,
      hasData:false
    };
    API.Program(host+'/api/v1/program',{filter: {action:"select", section:"detail", data:{id:$scope.programID }}}).then(function (result) {
      if(result.status && result.data.length>=1){
        $scope.Program = result.data[0];
        $scope.Program.hasData=true;
        $scope.Program.schedules = angular.fromJson(result.data[0].schedule.detail);
        $scope.Program.conditions = angular.fromJson(result.data[0].condition.detail);
      }
      $scope.Program.isLoading = false;
    });
  }
]);
controllers.controller('AlbumController', ['API','$scope', '$location', '$window', '$http',
  function (API, $scope, $location, $window,  $http) {
    $scope.Albums = [];

    API.fbToken({action:'get facebook token'}).then(function(token){
      var album_criteria = {
        id:'1781836015383517',
        action:'albums',
        config: 'redirect=false&'+token
      }
      API.fbGraph(album_criteria).then(function(album){
        angular.forEach(album.data, function (element, index, array) {
          if(element.name.indexOf('Timeline Photos') <= -1 && element.name.indexOf('Cover Photos') <= -1 && element.name.indexOf('Profile Pictures') <= -1){
              var picture_criteria = {
                id:element.id,
                action:'picture',
                config: 'redirect=false&'+token
              }
              API.fbGraph(picture_criteria).then(function(cover){
              $scope.Albums.push({id:element.id,name:element.name,url:cover.data.url});
            });
          }
        });
      });
    });
  }
]);

controllers.controller('TicketController', ['API','$scope', '$location', '$window', '$http',
  function (API, $scope, $location, $window,  $http) {
    var host = $window.location.href.split('/wonderful-journey/')[0]+'/wonderful-journey';
    $scope.Ticket = {};
    $scope.init = function(){
      API.Setting(host+'/api/v1/setting',{filter: {action:"select"}}).then(function (result) {
          if(result.status){
            if(result.data!=null){
              $scope.Ticket = angular.fromJson(result.data.ticket);
            }
          }
      });
    }
    $scope.init();
  }
]);
controllers.controller('PhotoController', ['API','$scope', '$location', '$window', '$http',
  function (API, $scope, $location, $window,  $http) {
    $scope.albumID = $window.location.pathname.split('/album/')[1];
    $scope.Album = {};
    $scope.Photos = [];
    API.fbToken({action:'get facebook token'}).then(function(token){
      var album_criteria = {
        id: $scope.albumID,
        action:'',
        config: 'fields=name,description,count&redirect=false&'+token
      }
      API.fbGraph(album_criteria).then(function(result){
        $scope.Album = result;
        var photo_criteria = {
          id: result.id,
          action:'photos',
          config: 'redirect=false&'+token
        }
        API.fbGraph(photo_criteria).then(function(album){
          angular.forEach(album.data, function (element, index, array) {
            var picture_criteria = {
              id:element.id,
              action:'picture',
              config: 'redirect=false&'+token
            }
            API.fbGraph(picture_criteria).then(function(photo){
              $scope.Photos.push({url:photo.data.url});
            });
          });
        });
      });
    });
  }
]);

controllers.controller('FaqController', ['API','$scope', '$location', '$window', '$http',
  function (API, $scope, $location, $window,  $http) {
    var host = $window.location.href.split('/wonderful-journey/')[0]+'/wonderful-journey';
    $scope.Faqs = [];
    $scope.init = function(){
      API.Setting(host+'/api/v1/setting',{filter: {action:"select"}}).then(function (result) {
          if(result.status){
            if(result.data!=null){
              $scope.Faqs = angular.fromJson(result.data.faq);
            }
          }
      });
    }
    $scope.init();
  }
]);
controllers.controller('AboutController', ['API','$scope', '$location', '$window', '$http',
  function (API, $scope, $location, $window,  $http) {
    var host = $window.location.href.split('/wonderful-journey/')[0]+'/wonderful-journey';
    $scope.About = {};
    $scope.init = function(){
      API.Setting(host+'/api/v1/setting',{filter: {action:"select"}}).then(function (result) {
          if(result.status){
            if(result.data!=null){
              $scope.About = result.data.about;
            }
          }
      });
    }
    $scope.init();
  }
]);

controllers.controller('ContactController', ['API','$scope', '$location', '$window', '$http',
  function (API, $scope, $location, $window,  $http) {
    var host = $window.location.href.split('/wonderful-journey/')[0]+'/wonderful-journey';
    $scope.init = function(){
      $scope.mail = {
        from:'',
        subject:'',
        body:'',
        bot:'กรุณาลบข้อความนี้ก่อนส่ง เพื่อยืนยันว่าคุณไม่ใช่ BOT',
        send:false
      }
    }
    $scope.init();
    $scope.contactUs = function(){
      if($scope.mail.from!=''){
        if($scope.mail.bot==''){
          $scope.mail.send = true;
          API.Mailer(host+'/api/v1/mailer',{filter: {action:"contact",data:$scope.mail}}).then(function (result) {
              if(result.status){
                API.Toaster(result.toast,'Mailer',result.message);
                $scope.mail.send = false;
                $scope.init();
              }
          });
        }
        else{
          API.Toaster('warning','Mailer','กรุณาลบข้อความ Human verification ก่อนส่ง');
        }
      }
      else{
        API.Toaster('warning','Mailer','กรุณากรอกที่อยู่อีเมล์');
      }
    }

  }
]);


