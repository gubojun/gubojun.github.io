jQuery(function($){
	$(window).load(function() {

		// cache container
		var $container = $('#wpex-grid-wrap');
		
		// initialize isotope
		$container.imagesLoaded(function(){
			$container.isotope({
				itemSelector: '.loop-entry',
				transformsEnabled: false,
            	animationOptions: {
					duration: 400,
					easing: 'swing',
					queue: false
				}
			});
		});
		
		$(window).resize(function () {
		
			// cache container
			var $container = $('#wpex-grid-wrap');
			// initialize isotope
			$container.isotope({ });
		
		}); // END resize
		
		
		//ajax scroll
		var ajaxurl = wpexvars.ajaxurl;
		
		$('div#load-more').click(function() {
			
			$(this).children('a').html(wpexvars.loading);
			
			var $this = $(this),
				anchor = $this.children('a'),
				nonce = anchor.val(),
				pagenum = anchor.data('pagenum'),
				maxpage = anchor.data('maxpage'),
				data = {
					action: 'aq_ajax_scroll',
					pagenum: pagenum,
					archive_type: anchor.data('archive_type'),
					archive_id: anchor.data('archive_id'),
					post_format: anchor.data('post_format'),
					author: anchor.data('author'),
					s: anchor.data('s'),
					security: nonce
				};
				
			$.post(ajaxurl, data, function(response) {
				content = $(response).hide().fadeIn(800);
				
				$(content).imagesLoaded(function() {
					
					$('div#load-more a').html(wpexvars.loadmore);
					
					$('#wpex-grid-wrap').append(content).isotope( 'appended', content, function() {	
					
							$('#wpex-grid-wrap').isotope('reLayout');
							$(".fitvids").fitVids(); //re-fire fitvids
							$(".prettyphoto-link").prettyPhoto({
								theme: lightboxLocalize.theme,
								show_title: false,
								social_tools: false,
								slideshow: false,
								autoplay_slideshow: false,
								wmode: 'opaque',
							});	
						
					});
					
				});
				
				anchor.data('pagenum', pagenum + 1);
				
				if(pagenum >= maxpage) {
					$this.fadeOut();
				}
				
			});
			
			return false;
			
		});
		
	}); // END window ready
}); // END function

