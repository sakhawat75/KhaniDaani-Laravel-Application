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

/!* Added by us*!/

// To read image
function readURL(input, img) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var selector = '#' + img;
        reader.onload = function (e) {
            $(selector).attr('src', e.target.result);
        }

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

    let cat_name = e.target.value;

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

    let city_name = e.target.value;

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
