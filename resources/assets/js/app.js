
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));

const app = new Vue({
    el: '#app'
});

/* Added by us*/
function readURL(input, img) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var selector = '#' + img;
        reader.onload = function(e) {
            $(selector).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#dp").change(function() {
    readURL(this, 'preview_cover');
});

$("#profile_photo").change(function () {
    readURL(this, 'preview_profile_image');
});
