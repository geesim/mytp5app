define('initbootstrap',['popper'],function(popper){
    window.Popper =  popper;

    require(['jquery', 'bootstrap'],function($, bootstrap){ });
})