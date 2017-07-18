const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');




/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */
/*
elixir(function(mix) {
    //app.scss includes app css, Boostrap and Ionicons
    mix.sass('app.scss')
        .styles([

            './public/bootstrap/css/bootstrap.min.css',
            './public/dist/css/AdminLTE.min.css',
            './public/dist/css/skins/_all-skins.min.css',
            './public/css/font-awesome.min.css',
            './public/plugins/iCheck/flat/blue.css',
            './public/plugins/morris/morris.css',
            './public/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
            './public/plugins/datepicker/datepicker3.css',
            './public/plugins/daterangepicker/daterangepicker-bs3.css',
            './public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'
        ])
        .scripts([

            './public/plugins/jQuery/jQuery-2.1.3.min.js',
            './public/plugins/jQueryUI/jquery-ui.js',
            //'./public/js/moment.min.js',
            './public/bootstrap/js/bootstrap.min.js',
            './public/plugins/morris/morris.min.js',
            './public/plugins/sparkline/jquery.sparkline.min.js',
            './public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js',
            './public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js',
            './public/plugins/knob/jquery.knob.js',
            './public/plugins/daterangepicker/moment.js',
            './public/plugins/daterangepicker/daterangepicker.js',

            './public/plugins/datepicker/bootstrap-datepicker.js',
            './public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js',
            './public/plugins/iCheck/icheck.min.js',
            './public/plugins/slimScroll/jquery.slimscroll.min.js',
            './public/plugins/fastclick/fastclick.min.js',
            './public/dist/js/app.min.js',
            './public/dist/js/pages/dashboard.js',
            './public/dist/js/demo.js',
            './public/js/scrip.js'
    ])
        .copy('node_modules/font-awesome/fonts/*.*','public/fonts/')
        .copy('node_modules/ionicons/dist/fonts/*.*','public/fonts/')
        .copy('node_modules/admin-lte/bootstrap/fonts/*.*','public/fonts/bootstrap')
        .copy('node_modules/admin-lte/dist/css/skins/*.*','public/css/skins')
        .copy('node_modules/admin-lte/dist/img','public/img')
        .copy('node_modules/admin-lte/plugins','public/plugins')
        .copy('node_modules/icheck/skins/square/blue.png','public/css')
        .copy('node_modules/icheck/skins/square/blue@2x.png','public/css')
        //.copy('node_modules/moment/min/*.js','public/js')
        //.copy('node_modules/jquery/dist/jquery.js','public/js')
        .webpack('app.js');
});
*/
elixir(function(mix) {
    //app.scss includes app css, Boostrap and Ionicons
    mix.sass('app.scss')
        .styles([
            './public/bootstrap/css/bootstrap.min.css',
            './public/css/font-awesome.min.css',
            './public/css/ionicons.min.css',
            './public/dist/css/AdminLTE.min.css',
            './public/dist/css/skins/_all-skins.min.css',
            './public/css/bootstrap-datepicker.standalone.css',

            './public/plugins/iCheck/flat/blue.css',
            './public/plugins/morris/morris.css',
            './public/plugins/jvectormap/jquery-jvectormap-1.2.2.css',
            './public/plugins/datepicker/datepicker3.css',
            './public/plugins/daterangepicker/daterangepicker-bs3.css',
            './public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'
        ])
        .scripts([

            './public/plugins/jQuery/jQuery-2.1.3.min.js',
            './public/plugins/jQueryUI/jquery-ui.js',
            './public/bootstrap/js/bootstrap.min.js',
            './public/plugins/chartjs/Chart.min.js',
            './public/plugins/fastclick/fastclick.min.js',
            './public/dist/js/app.min.js',
            './public/dist/js/demo.js',
            './public/js/jquery.mask.js',
            './public/js/scrip.js',
            './public/js/bootstrap-datepicker.js'

        ])
        .copy('node_modules/font-awesome/fonts/*.*','public/fonts/')
        .copy('node_modules/ionicons/dist/fonts/*.*','public/fonts/')
        .copy('node_modules/admin-lte/bootstrap/fonts/*.*','public/fonts/bootstrap')
        .copy('node_modules/admin-lte/dist/css/skins/*.*','public/css/skins')
        .copy('node_modules/admin-lte/dist/img','public/img')
        .copy('node_modules/admin-lte/plugins','public/plugins')
        .copy('node_modules/icheck/skins/square/blue.png','public/css')
        .copy('node_modules/icheck/skins/square/blue@2x.png','public/css')
        .copy('node_modules/jquery-mask-plugin/dist/jquery.mask.js','public/js')
        //.copy('node_modules/moment/min/*.js','public/js')
        //.copy('node_modules/jquery/dist/jquery.js','public/js')
        .webpack('app.js');
});