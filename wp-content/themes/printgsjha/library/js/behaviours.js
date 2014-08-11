/********** logo fading function **********/
	jQuery.noConflict();
    jQuery(document).ready(function($){

    $("#logo img").fadeTo("slow", 1);
    $("#logo img").hover(function(){
    $(this).fadeTo("medium", 0.5); // This should set the opacity to 80% on hover
    },function(){
    $(this).fadeTo("slow", 1); // This should set the opacity back to 50% on mouseout
    });
/********** tooltip function **********/
    $(".tooltip").tipTip();

/********** prettyphoto lightbox **********/
    $("a[class^='prettyPhoto']").prettyPhoto({animationSpeed:'slow',theme:'facebook',slideshow:2000});


/********** jquery toogle function **********/
	$('#toggle-view li').click(function () {
		var text = $(this).children('p');

		if (text.is(':hidden')) {
			text.slideDown('200');
			$(this).find('.toggle-indicator').text('-');
		} else {
			text.slideUp('200');
			$(this).find('.toggle-indicator').text('+');
		}
	});


});


/* PORTFOLIO SIDEBAR KEEP VISIBLE ON SCROLL */

function sidebarVisible(){
	var offset = $j(".sidebar").offset();
	var topPadding = 15;
	$j(window).scroll(function() {
		if ($j(window).scrollTop() > offset.top) {
			$j(".sidebar").stop().animate({
			marginTop: $j(window).scrollTop() - offset.top + topPadding
		});
		} else {
			$j(".sidebar").stop().animate({
			marginTop: 0
			});
		};
	});
}

/* PORTFOLIO FADING SORTING */

function fadingSorting(){
$j('.filters li a').click(function(){
		$j('a').each(function(){
			$j(this).removeClass('selected');
		});
		$j(this).addClass('selected');
		var $id = $(this).attr('id');
		if($id == 'all'){
		$j('.gallery ul li').children('.overlay').show();
		$j('.gallery ul li').fadeTo('normal',1);

		}else{
			$itemson = $j('.gallery ul').children('.'+$id);
			$itemson.fadeTo('normal',1);
			$itemson.children('.overlay').show();
			$j('.gallery ul').children('.overlay').show();
			$items = $j('.gallery ul').children().not('.'+$id);
			$items.fadeTo('fast',0.1);
			$items.children('.overlay').hide();
		}
		return false;
	});
}

/* PORTFOLIO ANIMATED SORTING */

function animatedSorting(){

(function($) {

	$.fn.sorted = function(customOptions) {
		var options = {
			reversed: false,
			by: function(a) {
				return a.text();
			}
		};

		$.extend(options, customOptions);

		$data = jQuery(this);
		arr = $data.get();
		arr.sort(function(a, b) {

			var valA = options.by($(a));
			var valB = options.by($(b));

			if (options.reversed) {
				return (valA < valB) ? 1 : (valA > valB) ? -1 : 0;
			} else {
				return (valA < valB) ? -1 : (valA > valB) ? 1 : 0;
			}

		});

		return $(arr);

	};

})(jQuery);

jQuery(function() {

	var read_button = function(class_names) {

		var r = {
			selected: false,
			type: 0
		};

		for (var i=0; i < class_names.length; i++) {

			if (class_names[i].indexOf('selected-') == 0) {
				r.selected = true;
			}

			if (class_names[i].indexOf('segment-') == 0) {
				r.segment = class_names[i].split('-')[1];
			}
		};

		return r;

	};

	var determine_sort = function($buttons) {
		var $selected = $buttons.parent().filter('[class*="selected-"]');
		return $selected.find('a').attr('data-value');
	};

	var determine_kind = function($buttons) {
		var $selected = $buttons.parent().filter('[class*="selected-"]');
		return $selected.find('a').attr('data-value');
	};

	var $preferences = {
		duration: 500,
		adjustHeight: 'auto'
	}

	var $list = jQuery('#itemList');
	var $data = $list.clone();

	var $controls = jQuery('.filters');

	$controls.each(function(i) {

		var $control = jQuery(this);
		var $buttons = $control.find('a');

		$buttons.bind('click', function(e) {

			$j('a').each(function(){
					$j(this).removeClass('selected');
				});
			$j(this).addClass('selected');
			var $button = jQuery(this);
			var $button_container = $button.parent();
			var button_properties = read_button($button_container.attr('class').split(' '));
			var selected = button_properties.selected;
			var button_segment = button_properties.segment;

			if (!selected) {

				$buttons.parent().removeClass();
				$button_container.addClass('selected-' + button_segment);

				var sorting_type = determine_sort($controls.eq(1).find('a'));
				var sorting_kind = determine_kind($controls.eq(0).find('a'));

				if (sorting_kind == 'all') {
					var $filtered_data = $data.find('li');
				} else {
					var $filtered_data = $data.find('li.' + sorting_kind);
				}

				var $sorted_data = $filtered_data.sorted({
					by: function(v) {
						return jQuery(v).text().toLowerCase();
					}
				});

				$list.quicksand($sorted_data, $preferences, function() {
												showOverlay();
											});

			}

			e.preventDefault();

		});

	});

});
}

/* THUMBS OVERLAY */

function showOverlay(){
	$j('.gallery ul li .overlay').hover(
		function () {
        	$j(this).fadeTo('fast', 1);
        	},
        function () {
        	$j(this).fadeTo('fast', 0);
      	}
	);
}


