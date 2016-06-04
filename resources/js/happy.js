

$(document).ready(function(){

	//fix navbar when scroll down reaches height of jumbotron image

	var nav = $("#container");

	nav.on("scroll", function(e) {
		e.preventDefault();	   
		document.alert('test'); 
	  	if (this.scrollTop > 193) {
	    	nav.addClass("fixed");
	  	} else {
	    	nav.removeClass("fixed");
	  	}
	  
	});
	
	//blink trending headline element for added cheesy effect
	setInterval(function(){
		$('.trending-head').fadeOut(500);
		$('.trending-head').fadeIn(500);
	}, 1000);


	//initiate ticker object for scrolling trending text
	var marq = $('.marquee');
	var textarray = [
	  	'The rumor is it\'s a boy, but it\'s super hush hush.',
	  	'#sengesbump',
	  	'Socrates prepares light reading for the new baby, including popular works such as "The Republic" and "Phaedo"',
	  	'Critics Respond to "Nightmare on Doobie Street 4: Baby\s Revenge"!'
	];
	var elementCount = 0;
	var executeNum = 1;

	function iterateTrending(counter, executeNumber){
		var length = textarray.length;
		console.log(length);
		console.log(executeNumber);

		if (executeNumber == 1){
			marq.marquee({duration: 4000});
			executeNumber++;
		} else {
			if (counter < length){
				marq.marquee('destroy').html(textarray[counter]).marquee({duration: 3000});
				counter++;
			} else {
				counter = 0;
			}
		}

		elementCount = counter;
		executeNum = executeNumber;
	};

	//initialize marquee
	iterateTrending(elementCount, executeNum);
	var iterate = iterateTrending(elementCount, executeNum);
	//bind iterateTrending to finished event to continuously loop through array
	marq.bind('finished', iterate);


	//getting video element using jQuery
    var vid = $(".video");
    var playing = false;
    //check if video is ready to play
  	vid.on('canplay', function(){
        vid.click(function(){
        	/*this.paused ? this.play() : this.pause();*/
        	if(playing == false){
        		$(this).get(0).setAttribute("controls","controls")
        		$(this).get(0).play();
         		playing = true;
        	} else {
        		$(this).get(0).removeAttribute("controls") 
        		$(this).get(0).pause();
        		playing = false;
        	}
        })
    });

    /*
		Vertically center Bootstrap 3 modals so they aren't always stuck at the top
	*/
/*	$(function() {
	    function reposition() {
	        var modal = $(this),
	            dialog = modal.find('.modal-dialog');
	        modal.css('display', 'block');
	        
	        // Dividing by two centers the modal exactly, but dividing by three 
	        // or four works better for larger screens.
	        dialog.css("margin-top", Math.max(0, ($(window).height() - dialog.height()) / 2));
	    }
	    // Reposition when a modal is shown
	    $('.modal').on('show.bs.modal', reposition);
	    // Reposition when the window is resized
	    $(window).on('resize', function() {
	        $('.modal:visible').each(reposition);
	    });
	});
*/
    //Cookie handlers for subscribe popup:
    /*Cookies.set('subscribe', 'yes');
    Cookies.set('subscribe', 'no');*/
    

	//get year for copyright in footer
	function getFooterDate(){
		var footer = $('#footer-date');
		var date = new Date();
		footer.html(date.getFullYear());
	}

	getFooterDate();
});