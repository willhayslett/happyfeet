

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
    //Logic for subscriber popup:
    var subscribe = $('#subscribePop');
	var waypoint = new Waypoint({
		element: $('#doobie'),
		handler: function() {
			if (Cookies.get('subscribe') === undefined){
				
				// set the expiring cookie - whether they subscribe or not
				Cookies.set('subscribe', 'no', { expires: 7} ); //expires after 7 days
				
				$('#subscribePop').modal({
		    		'show':true
		    	});
			}
		}
	});
    
    //handle form data:

    $(function() {
	    // Get the form.
	    var form = $('#subscribePopForm');

	    // Get the messages div.
	    var formResponse = $('#formResponse');

	    $('form').submit(function(event){
	    	event.preventDefault();

	    	var formData = $(form).serialize();

	    	$.ajax({
			    type: 'POST',
			    url: $(form).attr('action'),
			    data: formData

			}).done(function(response) {
				// Set the "yes" cookie, which should never expire
				Cookies.set('subscribe', 'yes', { expires: 77777777777777});

			    // Make sure that the formResponse div has the 'success' class.
			    $(formResponse).removeClass('error');
			    $(formResponse).addClass('success');

			    // Set the message text.
			    $(formResponse).text(response);

			    // Clear the form.
			    $('#name').val('');
			    $('#email').val('');

			}).fail(function(data) {
			    // Make sure that the formResponse div has the 'error' class.
			    $(formResponse).removeClass('success');
			    $(formResponse).addClass('error');

			    // Set the message text.
			    if (data.responseText !== '') {
			        $(formResponse).text(data.responseText);
			    } else {
			        $(formResponse).text('Whoops! That didn\'t work as expected. Close this window and let\'s try again.');
			    }
			});
	    });
	});


	//get year for copyright in footer
	function getFooterDate(){
		var footer = $('#footer-date');
		var date = new Date();
		footer.html(date.getFullYear());
	}

	getFooterDate();
});