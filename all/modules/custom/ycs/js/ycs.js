jQuery(function(){
  jQuery('#slides').slides({
  preload: true,
				preloadImage: 'img/loading.gif',
				play: 9000,
				pause: 2500,
				hoverPause: true,
        effect:  'fade',
        crossfade: true,
				animationStart: function(current){
					jQuery('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					jQuery('.caption').animate({
						bottom:0
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					jQuery('.caption').animate({
						bottom:0
					},200);
				}
			});
});
