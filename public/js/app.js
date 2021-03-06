/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(1);
module.exports = __webpack_require__(2);


/***/ }),
/* 1 */
/***/ (function(module, exports) {

/*
/!**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 *!/

require('./bootstrap');

window.Vue = require('vue');

/!**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 *!/

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});
*/

/!* Added by us*!/;

// To read image
function readURL(input, img) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var selector = '#' + img;
        reader.onload = function (e) {
            $(selector).attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

// preview cover image
$("#dp").change(function () {
    readURL(this, 'preview_cover');
});

// preview profile image
$("#profile_photo").change(function () {
    readURL(this, 'preview_profile_image');
});

// preview preview_dish_thumbnail image
$("#dish_thumbnail1").change(function () {
    readURL(this, 'preview_dish_thumbnail');
});

// preview screenshot1 image
$("#screenshot1").change(function () {
    readURL(this, 'preview_screenshot1');
});

// preview screenshot2 image
$("#screenshot2").change(function () {
    readURL(this, 'preview_screenshot2');
});

// preview screenshot3 image
$("#screenshot3").change(function () {
    readURL(this, 'preview_screenshot3');
});

// dynamically add dish subcategory with JSON
$("#dish_category").on('change', function (e) {
    // console.log(e);

    var cat_name = e.target.value;

    $.get('/ajax-subcat?cat_name=' + cat_name, function (data) {
        $('#dish_subcategory').empty();
        // $('#dish_subcategory').prepend('<option value="" selected>Select Sub Category</option>');
        $.each(data, function (index, subCatObj) {
            $('#dish_subcategory').append('<option value="' + subCatObj.name + '">' + subCatObj.name + '</option>');
        });
    });
});

// To trigger the city select option
$("#dish_category").trigger('change');

// dynamically add dish subcategory with JSON
$("#city").on('change', function (e) {
    // console.log(e);

    var city_name = e.target.value;

    $.get('/ajax-areas?city_name=' + city_name, function (data) {
        $('#areas').empty();

        $.each(data, function (index, area) {
            $('#areas').append('<option value="' + area.name + '">' + area.name + '</option>');
        });
    });
});

// To trigger the category select option
$("#city").trigger('change');

$('div.max-length').maxlength();

// To add ck-editor in textarea
// CKEDITOR.replace('article-ckeditor');

//snackbar
$('#snackbar').css('z-index', '99999');

function snackbar($msg) {
    $('#snackbar').html($msg);
    $('#snackbar').toggleClass('show');
    setTimeout(function () {
        $('#snackbar').removeClass('show');
    }, 1600);
}

/*
$('ul.pagination').hide();
$(function() {
    $('.scroll').jscroll({
        autoTrigger: true,
        nextSelector: '.pagination li.active + li a',
        contentSelector: 'div.scroll',
        debug: 'false',
        padding: 0,
        callback: function() {
            // $('ul.pagination:visible:first').hide();
            $('ul.pagination').remove();
        }
    });
});
*/

/***/ }),
/* 2 */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ })
/******/ ]);