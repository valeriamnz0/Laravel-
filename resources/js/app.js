/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');
 require('./dollarchange');
 require('./domicilioapi');
 //require('../assets/js/app');
 //require('../assets/js/vendor');
 ///---require('../assets/js/app.min.js');
 ///---require('../assets/js/vendor.min.js');
 //require('../assets/js/pages/chartist.init');
 //require('../assets/js/pages/chartjs.init');
 //require('../assets/js/pages/charts-other.init');
 //require('../assets/js/pages/countdown.init');
 ///---require('../assets/js/pages/dashboard.init');
 //require('../assets/js/pages/datatables.init');
 //require('../assets/js/pages/draggable.init');
 //require('../assets/js/pages/flot.init');
 //require('../assets/js/pages/fontawesome.init');
 //require('../assets/js/pages/form-advanced.init');
 //require('../assets/js/pages/form-editor.init');
 //require('../assets/js/pages/form-fileupload.init');
 //require('../assets/js/pages/form-validation.init');
 //require('../assets/js/pages/form-wizard.init');
 //require('../assets/js/pages/form-xeditable.init');
 //require('../assets/js/pages/fullcalendar.init');
 //require('../assets/js/pages/gallery.init');
 //require('../assets/js/pages/google-maps.init');
 //require('../assets/js/pages/inbox.init');
 //require('../assets/js/pages/jvectormap.init');
 //require('../assets/js/pages/kanban.init');
 //require('../assets/js/pages/materialdesign.init');
 //require('../assets/js/pages/morris.init');
 //require('../assets/js/pages/range-sliders.init');
 //require('../assets/js/pages/responsive-table.init');
 //require('../assets/js/pages/sweet-alerts.init');
 //require('../assets/js/pages/tabledit.init');
 //require('../assets/js/pages/tablesaw.init');
 //require('../assets/js/pages/toastr.init');
 //require('../assets/js/pages/tour.init');
 //require('../assets/js/pages/treeview.init');
 ///---require('../assets/libs/jquery-knob/jquery.knob.min.js');
 ///--require('../assets/libs/morris-js/morris.min.js');
 ///--require('../assets/libs/raphael/raphael.min.js');
 //require('../assets/libs/jquery-tabledit/jquery.tabledit.min.js');
 
 
 window.Vue = require('vue');
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
 Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
 
 const app = new Vue({
     el: '#app',
 });
 