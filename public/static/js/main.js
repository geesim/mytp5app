require.config({
	baseUrl : '/static/',
    paths : {
        'jquery' : ['js/lib/jquery.min'],
        'bootstrap' : ['js/lib/bootstrap.min']
    },
    shim : {
        'bootstrap' :{
            deps : ['jquery','popper']
        }
    }
});