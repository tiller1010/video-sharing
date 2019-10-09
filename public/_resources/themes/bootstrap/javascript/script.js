window.onload = function(){

	var toggle = document.querySelector('.fa-bars');
	var menu = document.querySelector('#MainNav');

	toggle.addEventListener('click', function(){
		if(menu.classList.contains('collapse')){
			menu.classList.remove('collapse');
		}
		else{
			menu.classList.add('collapse');
		}
	});

	// Pagination
	if ($('.pagination').length) {
	    var paginate = function (url) {
	        $.ajax(url)
	            .done(function (response) {
	                $('.main').html(response);
	                $('html, body').animate({
	                    scrollTop: $('.main').offset().top
	                });
	                window.history.pushState(
	                    {url: url},
	                    document.title,
	                    url
	                );    
	            })
	            .fail(function (xhr) {
	                alert('Error: ' + xhr.responseText);
	            });

	    };
	    $('.main').on('click','.pagination a', function (e) {
	        e.preventDefault();
	        var url = $(this).attr('href');
	        paginate(url);
	    });

	    window.onpopstate = function(e) {
	        if (e.state.url) {
	            paginate(e.state.url);
	        }
	        else {
	            e.preventDefault();
	        }
	    };        
	}
}