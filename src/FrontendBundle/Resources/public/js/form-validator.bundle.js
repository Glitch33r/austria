(window.webpackJsonp=window.webpackJsonp||[]).push([[9],{105:function(e,n,r){"use strict";r.r(n),r.d(n,"default",function(){return l});r(107),r(2);function i(e,n){for(var r=0;r<n.length;r++){var i=n[r];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}var a,t,o,l=function(){function e(n){!function(e,n){if(!(e instanceof n))throw new TypeError("Cannot call a class as a function")}(this,e),this._form=n}var n,r,a;return n=e,(r=[{key:"validateForm",value:function(){var e=this,n=[];return this._form.querySelectorAll(".js-validate-field").forEach(function(r){var i=e.isFieldValid(r);n.push(i),i||e.showError(r)}),!n.includes(!1)}},{key:"isFieldValid",value:function(n){return e.fields[n.dataset.fieldType].regEx.test(n.value.trim())}},{key:"showError",value:function(e){e.nextSibling.innerHTML=e.dataset.error,e.classList.add("invalid-input")}}])&&i(n.prototype,r),a&&i(n,a),e}();o={email:{regEx:/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/},name:{regEx:/.{2,}/},phone:{regEx:/\+\s\d\d\d\s\d\d\s\d\d\s\d\d\s\d/}},(t="fields")in(a=l)?Object.defineProperty(a,t,{value:o,enumerable:!0,configurable:!0,writable:!0}):a[t]=o},107:function(e,n,r){"use strict";var i=r(29),a=r(56)(!0);i(i.P,"Array",{includes:function(e){return a(this,e,arguments.length>1?arguments[1]:void 0)}}),r(57)("includes")}}]);