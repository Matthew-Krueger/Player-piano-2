var app = app || {};

(function(o){
  "use strict";

  // Private Methods
  var ajax, getFormData, setProgress;

  ajax = function(data){
    var xmlhttp = new XMLHttpRequest(), uploaded;

    xmlhttp.addEventListener("readystatechange",function () {
      if(this.readyState === 4){
        if(this.status === 200){
          uploaded = JSON.parse(this.response);
          console.log(uploaded);
        }
      }
    });

    xmlhttp.open("post", o.options.processor);
    xmlhttp.send(data);
  };

  getFormData = function(source){
    var data = new FormData(), i;
    for (i = 0; i < source.length; i = i + 1) {
      data.append('file[]', source[i]);
    }

    data.append('ajax', true);

    return data;
  };

  setProgress = function(value){

  };

  o.uploader = function(options){
    o.options = options;

    if (o.options.files !== undefined) {
        ajax(getFormData(o.options.files.files));
    }
  }

}(app));
