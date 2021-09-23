/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/createform.js ***!
  \************************************/
var add_ingredient = document.querySelector(".add_ingredient");
add_ingredient.addEventListener("click", function () {
  var ingredients = document.querySelector(".ingredients");
  ingredients.insertAdjacentHTML("beforeend", "<div class=\"flex items-center mb-2\">\n        <input type=\"text\" name=\"ingredients[]\" id=\"ingredients\" class=\"h-8 rounded-lg w-full pl-2\">\n        <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-7 w-7 delete_input cursor-pointer\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">\n            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16\" />\n        </svg>\n        </div>");
  delete_input_function();
});
var add_step = document.querySelector(".add_step");
add_step.addEventListener("click", function () {
  var steps = document.querySelector(".steps");
  steps.insertAdjacentHTML("beforeend", "<div class=\"flex items-center mb-2\">\n        <textarea name=\"steps[]\" id=\"steps\" cols=\"30\" rows=\"4\" class=\"rounded-lg w-full resize-none px-2\"></textarea>\n        <svg xmlns=\"http://www.w3.org/2000/svg\" class=\"h-7 w-7 delete_input cursor-pointer\" fill=\"none\" viewBox=\"0 0 24 24\" stroke=\"currentColor\">\n            <path stroke-linecap=\"round\" stroke-linejoin=\"round\" stroke-width=\"2\" d=\"M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16\" />\n        </svg>\n        </div>");
  delete_input_function();
});

var delete_input_function = function delete_input_function() {
  var delete_input = document.querySelectorAll(".delete_input");

  var _loop = function _loop(x) {
    delete_input[x].addEventListener("click", function () {
      delete_input[x].parentNode.remove();
    });
  };

  for (var x = 0; x < delete_input.length; x++) {
    _loop(x);
  }
};

delete_input_function();
/******/ })()
;