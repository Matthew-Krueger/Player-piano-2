var app = app || {};

(function(o){
  "use strict";

  // Private Methods
  var ajax, getFormData, setProgress;

  ajax = function(data){
    var xmlhttp = new HMLHttpRequest(), uploaded;

    xmlhttp.open("post", o.options.processor);
    xmlhttp.send(data);
  };

  getFormData = function(source){

  };

  setProgress = function(value){

  };

  o.uploader = function(options){
    o.options = options;

    if (o.options.files !== undifined) {
        ajax(getFormData(o.options.files.files));
    }
  }

}(app));
