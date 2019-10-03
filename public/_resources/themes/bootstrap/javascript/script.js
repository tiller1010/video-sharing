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
}