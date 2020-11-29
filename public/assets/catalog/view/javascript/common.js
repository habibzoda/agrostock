function getURLVar(key) {
	var value = [];

	var query = String(document.location).split('?');

	if (query[1]) {
		var part = query[1].split('&');

		for (i = 0; i < part.length; i++) {
			var data = part[i].split('=');

			if (data[0] && data[1]) {
				value[data[0]] = data[1];
			}
		}

		if (value[key]) {
			return value[key];
		} else {
			return '';
		}
	}
}

$(document).ready(function() {	
	// Highlight any found errors
	$('.text-danger').each(function() {
		var element = $(this).parent().parent();

		if (element.hasClass('form-group')) {
			element.addClass('has-error');
		}
	});

	// Currency
	$('#form-currency .currency-select').on('click', function(e) {
		e.preventDefault();

		$('#form-currency input[name=\'code\']').val($(this).attr('name'));

		$('#form-currency').submit();
	});

	// Language
	$('#form-language .language-select').on('click', function(e) {
		e.preventDefault();

		$('#form-language input[name=\'code\']').val($(this).attr('name'));

		$('#form-language').submit();
	});

	/* Search */
	$('#search input[name=\'search\']').parent().find('button').on('click', function() {
		var url = $('base').attr('href') + 'index.php?route=product/search';

		var value = $('header #search input[name=\'search\']').val();

		if (value) {
			url += '&search=' + encodeURIComponent(value);
		}

		location = url;
	});

	$('#search input[name=\'search\']').on('keydown', function(e) {
		if (e.keyCode == 13) {
			$('header #search input[name=\'search\']').parent().find('button').trigger('click');
		}
	});

	// Menu
	$('#menu .dropdown-menu').each(function() {
		var menu = $('#menu').offset();
		var dropdown = $(this).parent().offset();

		var i = (dropdown.left + $(this).outerWidth()) - (menu.left + $('#menu').outerWidth());

		if (i > 0) {
			$(this).css('margin-left', '-' + (i + 10) + 'px');
		}
	});

	// Product List
	$('#list-view').click(function() {
		$('#content .product-grid > .clearfix').remove();
		$('.product-list-js').fadeOut(500,function() {
			$('#content .row > .product-grid').attr('class', 'product-layout product-list');
			$(this).find('.image').addClass('col-xs-12 col-sm-4 col-md-4 col-lg-4');
			$(this).find('.caption').addClass('col-xs-12 col-sm-8 col-md-8 col-lg-8');
			$('.image .countdown-container').hide();
            $('.caption .countdown-container').css('display','inline-block');
    	});
		$('#grid-view').removeClass('active');
		$('#list-view').addClass('active');
		localStorage.setItem('display', 'list');
		$('.product-list-js').fadeIn(500);

	});

	// Product Grid
	$('#grid-view').click(function() {
		// What a shame bootstrap does not take into account dynamically loaded columns
		var cols = $('#column-right, #column-left').length;

		$('.product-list-js').fadeOut(500,function() {

			$('.image').removeClass('col-xs-12 col-sm-4 col-md-4 col-lg-4');
            $('.caption').removeClass('col-xs-12 col-sm-8 col-md-8 col-lg-8');
			if (cols == 2) {
					$('#content .product-list').attr('class', 'product-layout product-grid col-lg-6 col-md-6 col-sm-6 col-xs-12');
			} else if (cols == 1) {
					$('#content .product-list').attr('class', 'product-layout product-grid col-lg-3 col-md-6 col-sm-6 col-xs-12');
			} else {
					$('#content .product-list').attr('class', 'product-layout product-grid col-lg-3 col-md-4 col-sm-6 col-xs-12');
			}
			$('.image .countdown-container').css('display','inline-block');
			$('.caption .countdown-container').hide();
    	});
		$('#list-view').removeClass('active');
		$('#grid-view').addClass('active');
		localStorage.setItem('display', 'grid');
		$('.product-list-js').fadeIn(500);
	});

	if (localStorage.getItem('display') == 'list') {
		$('#list-view').trigger('click');
		$('#list-view').addClass('active');
	} else {
		$('#grid-view').trigger('click');
		$('#grid-view').addClass('active');
	}

	// Checkout
	$(document).on('keydown', '#collapse-checkout-option input[name=\'email\'], #collapse-checkout-option input[name=\'password\']', function(e) {
		if (e.keyCode == 13) {
			$('#collapse-checkout-option #button-login').trigger('click');
		}
	});

	// tooltips on hover
	$('[data-toggle=\'tooltip\']').tooltip({container: 'body',trigger:'hover'});

	// Makes tooltips work on ajax generated content
	$(document).ajaxStop(function() {
		$('[data-toggle=\'tooltip\']').tooltip({container: 'body',trigger:'hover'});
	});
});

// Cart add remove functions
var cart = {
	'add': function(product_id, quantity) {
		$.ajax({
			url: 'index.php?route=checkout/cart/add',
			type: 'post',
			data: 'product_id=' + product_id + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
			dataType: 'json',
			beforeSend: function() {
			},
			complete: function() {
			},
			success: function(json) {
				$('.alert-dismissible, .text-danger').remove();

				if (json['redirect']) {
					location = json['redirect'];
				}

				if (json['success']) {
					/*$('#content').parent().before('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + ' <button type="button" class="close" data-dismiss="alert">&times;</button></div>');
					$('html, body').animate({ scrollTop: 0 }, 'slow');*/
					// Need to set timeout otherwise it wont update the total
					setTimeout(function () {

						$('#cart > button').html('<span class="cart-link"><span class="cart-img hidden-xs hidden-sm"><svg xmlns="http://www.w3.org/2000/svg" style="display: none;"><symbol id="shopping-bag" viewBox="0 0 630 630"><title>shopping-bag</title><path d="m450.026 192.65h-31l-87.436-126.828a7 7 0 1 0 -11.526 7.945l81.955 118.883h-286.083l81.954-118.883a7 7 0 1 0 -11.526-7.945l-87.432 126.828h-36.958a29.492 29.492 0 1 0 0 58.983h5.226l17.591 173.3a26.924 26.924 0 0 0 26.862 24.273h288.691a26.922 26.922 0 0 0 26.861-24.273l17.592-173.3h5.229a29.492 29.492 0 1 0 0-58.983zm-36.749 230.868a12.962 12.962 0 0 1-12.933 11.687h-288.688a12.962 12.962 0 0 1-12.933-11.687l-17.448-171.885h349.45zm36.749-185.885h-388.052a15.492 15.492 0 1 10-30.983h388.052a15.492 15.492 0 1 1 0 30.983z"/><path d="m256 407.526a7 7 0 0 0 7-7v-115.296a7 7 0 0 0 -14 0v115.3a7 7 0 0 0 7 6.996z"/><path d="m335.57 407.526a7 7 0 0 0 7-7v-115.296a7 7 0 0 0 -14 0v115.3a7 7 0 0 0 7 6.996z"/><path d="m176.43 407.526a7 7 0 0 0 7-7v-115.296a7 7 0 0 0 -14 0v115.3a7 7 0 0 0 7 6.996z"/></svg><svg class="icon" viewBox="0 0 30 30"><use xlink:href="#shopping-bag" x="8%" y="7%"></use></svg></span><span class="cart-img hidden-lg hidden-md"><svg xmlns="http://www.w3.org/2000/svg" style="display: none;"><symbol id="shopping-cart-empty-side-view" viewBox="0 0 740 740"><title>shopping-cart-empty-side-view</title><path d="M444.274,93.36c-2.558-3.666-6.674-5.932-11.145-6.123L155.942,75.289c-7.953-0.348-14.599,5.792-14.939,13.708 c-0.338,7.913,5.792,14.599,13.707,14.939l258.421,11.14L362.32,273.61H136.205L95.354,51.179 c-0.898-4.875-4.245-8.942-8.861-10.753L19.586,14.141c-7.374-2.887-15.695,0.735-18.591,8.1c-2.891,7.369,0.73,15.695,8.1,18.591 l59.491,23.371l41.572,226.335c1.253,6.804,7.183,11.746,14.104,11.746h6.896l-15.747,43.74c-1.318,3.664-0.775,7.733,1.468,10.916 c2.24,3.184,5.883,5.078,9.772,5.078h11.045c-6.844,7.617-11.045,17.646-11.045,28.675c0,23.718,19.299,43.012,43.012,43.012 s43.012-19.294,43.012-43.012c0-11.028-4.201-21.058-11.044-28.675h93.777c-6.847,7.617-11.047,17.646-11.047,28.675 c0,23.718,19.294,43.012,43.012,43.012c23.719,0,43.012-19.294,43.012-43.012c0-11.028-4.2-21.058-11.042-28.675h13.432 c6.6,0,11.948-5.349,11.948-11.947c0-6.6-5.349-11.948-11.948-11.948H143.651l12.902-35.843h216.221 c6.235,0,11.752-4.028,13.651-9.96l59.739-186.387C447.536,101.679,446.832,97.028,444.274,93.36z M169.664,409.814 c-10.543,0-19.117-8.573-19.117-19.116s8.574-19.117,19.117-19.117s19.116,8.574,19.116,19.117S180.207,409.814,169.664,409.814z M327.373,409.814c-10.543,0-19.116-8.573-19.116-19.116s8.573-19.117,19.116-19.117s19.116,8.574,19.116,19.117 S337.916,409.814,327.373,409.814z"/></symbol></svg><svg class="icon" viewBox="0 0 30 30"><use xlink:href="#shopping-cart-empty-side-view" x="17%" y="22%"></use></svg></span><span class="cart-content"><span class="cart-name">'+ $('#cart .cart-name').text() +'</span><span class="cart-products-count hidden-sm hidden-xs">' + json['text_items_small'] + ' ' + json['total'] + '</span><span class="cart-products-count hidden-lg hidden-md">' + json['text_items_small'] + '</span></span></span>');						
						}, 100);

					$.notify({message:json.success},{type:"success",offset:0,placement:{from:"top",align:"center"},z_index: 9999,animate:{enter:"animated fadeInDown",exit:"animated fadeOutUp"},template:'<div data-notify="container" class="col-xs-12 alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button><span data-notify="icon"></span> <span data-notify="title">{1}</span> <span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>'});
					$('#cart > ul').load('index.php?route=common/cart/info ul li');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	},
	'update': function(key, quantity) {
		$.ajax({
			url: 'index.php?route=checkout/cart/edit',
			type: 'post',
			data: 'key=' + key + '&quantity=' + (typeof(quantity) != 'undefined' ? quantity : 1),
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				// Need to set timeout otherwise it wont update the total
				setTimeout(function () {
					$('#cart > button').html('<span class="cart-link"><span class="cart-img hidden-xs hidden-sm"><svg xmlns="http://www.w3.org/2000/svg" style="display: none;"><symbol id="shopping-bag" viewBox="0 0 630 630"><title>shopping-bag</title><path d="m450.026 192.65h-31l-87.436-126.828a7 7 0 1 0 -11.526 7.945l81.955 118.883h-286.083l81.954-118.883a7 7 0 1 0 -11.526-7.945l-87.432 126.828h-36.958a29.492 29.492 0 1 0 0 58.983h5.226l17.591 173.3a26.924 26.924 0 0 0 26.862 24.273h288.691a26.922 26.922 0 0 0 26.861-24.273l17.592-173.3h5.229a29.492 29.492 0 1 0 0-58.983zm-36.749 230.868a12.962 12.962 0 0 1-12.933 11.687h-288.688a12.962 12.962 0 0 1-12.933-11.687l-17.448-171.885h349.45zm36.749-185.885h-388.052a15.492 15.492 0 1 10-30.983h388.052a15.492 15.492 0 1 1 0 30.983z"/><path d="m256 407.526a7 7 0 0 0 7-7v-115.296a7 7 0 0 0 -14 0v115.3a7 7 0 0 0 7 6.996z"/><path d="m335.57 407.526a7 7 0 0 0 7-7v-115.296a7 7 0 0 0 -14 0v115.3a7 7 0 0 0 7 6.996z"/><path d="m176.43 407.526a7 7 0 0 0 7-7v-115.296a7 7 0 0 0 -14 0v115.3a7 7 0 0 0 7 6.996z"/></svg><svg class="icon" viewBox="0 0 30 30"><use xlink:href="#shopping-bag" x="8%" y="7%"></use></svg></span><span class="cart-img hidden-lg hidden-md"><svg xmlns="http://www.w3.org/2000/svg" style="display: none;"><symbol id="shopping-cart-empty-side-view" viewBox="0 0 740 740"><title>shopping-cart-empty-side-view</title><path d="M444.274,93.36c-2.558-3.666-6.674-5.932-11.145-6.123L155.942,75.289c-7.953-0.348-14.599,5.792-14.939,13.708 c-0.338,7.913,5.792,14.599,13.707,14.939l258.421,11.14L362.32,273.61H136.205L95.354,51.179 c-0.898-4.875-4.245-8.942-8.861-10.753L19.586,14.141c-7.374-2.887-15.695,0.735-18.591,8.1c-2.891,7.369,0.73,15.695,8.1,18.591 l59.491,23.371l41.572,226.335c1.253,6.804,7.183,11.746,14.104,11.746h6.896l-15.747,43.74c-1.318,3.664-0.775,7.733,1.468,10.916 c2.24,3.184,5.883,5.078,9.772,5.078h11.045c-6.844,7.617-11.045,17.646-11.045,28.675c0,23.718,19.299,43.012,43.012,43.012 s43.012-19.294,43.012-43.012c0-11.028-4.201-21.058-11.044-28.675h93.777c-6.847,7.617-11.047,17.646-11.047,28.675 c0,23.718,19.294,43.012,43.012,43.012c23.719,0,43.012-19.294,43.012-43.012c0-11.028-4.2-21.058-11.042-28.675h13.432 c6.6,0,11.948-5.349,11.948-11.947c0-6.6-5.349-11.948-11.948-11.948H143.651l12.902-35.843h216.221 c6.235,0,11.752-4.028,13.651-9.96l59.739-186.387C447.536,101.679,446.832,97.028,444.274,93.36z M169.664,409.814 c-10.543,0-19.117-8.573-19.117-19.116s8.574-19.117,19.117-19.117s19.116,8.574,19.116,19.117S180.207,409.814,169.664,409.814z M327.373,409.814c-10.543,0-19.116-8.573-19.116-19.116s8.573-19.117,19.116-19.117s19.116,8.574,19.116,19.117 S337.916,409.814,327.373,409.814z"/></symbol></svg><svg class="icon" viewBox="0 0 30 30"><use xlink:href="#shopping-cart-empty-side-view" x="17%" y="22%"></use></svg></span><span class="cart-content"><span class="cart-name">'+ $('#cart .cart-name').text() +'</span><span class="cart-products-count hidden-sm hidden-xs">' + json['text_items_small'] + ' ' + json['total'] + '</span><span class="cart-products-count hidden-lg hidden-md">' + json['text_items_small'] + '</span></span></span>');						
						}, 100);

				if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
					location = 'index.php?route=checkout/cart';
				} else {
					$('#cart > ul').load('index.php?route=common/cart/info ul li');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	},
	'remove': function(key) {
		$.ajax({
			url: 'index.php?route=checkout/cart/remove',
			type: 'post',
			data: 'key=' + key,
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				// Need to set timeout otherwise it wont update the total
				setTimeout(function () {
					$('#cart > button').html('<span class="cart-link"><span class="cart-img hidden-xs hidden-sm"><svg xmlns="http://www.w3.org/2000/svg" style="display: none;"><symbol id="shopping-bag" viewBox="0 0 630 630"><title>shopping-bag</title><path d="m450.026 192.65h-31l-87.436-126.828a7 7 0 1 0 -11.526 7.945l81.955 118.883h-286.083l81.954-118.883a7 7 0 1 0 -11.526-7.945l-87.432 126.828h-36.958a29.492 29.492 0 1 0 0 58.983h5.226l17.591 173.3a26.924 26.924 0 0 0 26.862 24.273h288.691a26.922 26.922 0 0 0 26.861-24.273l17.592-173.3h5.229a29.492 29.492 0 1 0 0-58.983zm-36.749 230.868a12.962 12.962 0 0 1-12.933 11.687h-288.688a12.962 12.962 0 0 1-12.933-11.687l-17.448-171.885h349.45zm36.749-185.885h-388.052a15.492 15.492 0 1 10-30.983h388.052a15.492 15.492 0 1 1 0 30.983z"/><path d="m256 407.526a7 7 0 0 0 7-7v-115.296a7 7 0 0 0 -14 0v115.3a7 7 0 0 0 7 6.996z"/><path d="m335.57 407.526a7 7 0 0 0 7-7v-115.296a7 7 0 0 0 -14 0v115.3a7 7 0 0 0 7 6.996z"/><path d="m176.43 407.526a7 7 0 0 0 7-7v-115.296a7 7 0 0 0 -14 0v115.3a7 7 0 0 0 7 6.996z"/></svg><svg class="icon" viewBox="0 0 30 30"><use xlink:href="#shopping-bag" x="8%" y="7%"></use></svg></span><span class="cart-img hidden-lg hidden-md"><svg xmlns="http://www.w3.org/2000/svg" style="display: none;"><symbol id="shopping-cart-empty-side-view" viewBox="0 0 740 740"><title>shopping-cart-empty-side-view</title><path d="M444.274,93.36c-2.558-3.666-6.674-5.932-11.145-6.123L155.942,75.289c-7.953-0.348-14.599,5.792-14.939,13.708 c-0.338,7.913,5.792,14.599,13.707,14.939l258.421,11.14L362.32,273.61H136.205L95.354,51.179 c-0.898-4.875-4.245-8.942-8.861-10.753L19.586,14.141c-7.374-2.887-15.695,0.735-18.591,8.1c-2.891,7.369,0.73,15.695,8.1,18.591 l59.491,23.371l41.572,226.335c1.253,6.804,7.183,11.746,14.104,11.746h6.896l-15.747,43.74c-1.318,3.664-0.775,7.733,1.468,10.916 c2.24,3.184,5.883,5.078,9.772,5.078h11.045c-6.844,7.617-11.045,17.646-11.045,28.675c0,23.718,19.299,43.012,43.012,43.012 s43.012-19.294,43.012-43.012c0-11.028-4.201-21.058-11.044-28.675h93.777c-6.847,7.617-11.047,17.646-11.047,28.675 c0,23.718,19.294,43.012,43.012,43.012c23.719,0,43.012-19.294,43.012-43.012c0-11.028-4.2-21.058-11.042-28.675h13.432 c6.6,0,11.948-5.349,11.948-11.947c0-6.6-5.349-11.948-11.948-11.948H143.651l12.902-35.843h216.221 c6.235,0,11.752-4.028,13.651-9.96l59.739-186.387C447.536,101.679,446.832,97.028,444.274,93.36z M169.664,409.814 c-10.543,0-19.117-8.573-19.117-19.116s8.574-19.117,19.117-19.117s19.116,8.574,19.116,19.117S180.207,409.814,169.664,409.814z M327.373,409.814c-10.543,0-19.116-8.573-19.116-19.116s8.573-19.117,19.116-19.117s19.116,8.574,19.116,19.117 S337.916,409.814,327.373,409.814z"/></symbol></svg><svg class="icon" viewBox="0 0 30 30"><use xlink:href="#shopping-cart-empty-side-view" x="17%" y="22%"></use></svg></span><span class="cart-content"><span class="cart-name">'+ $('#cart .cart-name').text() +'</span><span class="cart-products-count hidden-sm hidden-xs">' + json['text_items_small'] + ' ' + json['total'] + '</span><span class="cart-products-count hidden-lg hidden-md">' + json['text_items_small'] + '</span></span></span>');						
						}, 100);

				if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
					location = 'index.php?route=checkout/cart';
				} else {
					$('#cart > ul').load('index.php?route=common/cart/info ul li');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
}

var voucher = {
	'add': function() {

	},
	'remove': function(key) {
		$.ajax({
			url: 'index.php?route=checkout/cart/remove',
			type: 'post',
			data: 'key=' + key,
			dataType: 'json',
			beforeSend: function() {
				$('#cart > button').button('loading');
			},
			complete: function() {
				$('#cart > button').button('reset');
			},
			success: function(json) {
				// Need to set timeout otherwise it wont update the total
				setTimeout(function () {
					$('#cart > button').html('<span class="cart-link"><span class="cart-img hidden-xs hidden-sm"><svg xmlns="http://www.w3.org/2000/svg" style="display: none;"><symbol id="shopping-bag" viewBox="0 0 630 630"><title>shopping-bag</title><path d="m450.026 192.65h-31l-87.436-126.828a7 7 0 1 0 -11.526 7.945l81.955 118.883h-286.083l81.954-118.883a7 7 0 1 0 -11.526-7.945l-87.432 126.828h-36.958a29.492 29.492 0 1 0 0 58.983h5.226l17.591 173.3a26.924 26.924 0 0 0 26.862 24.273h288.691a26.922 26.922 0 0 0 26.861-24.273l17.592-173.3h5.229a29.492 29.492 0 1 0 0-58.983zm-36.749 230.868a12.962 12.962 0 0 1-12.933 11.687h-288.688a12.962 12.962 0 0 1-12.933-11.687l-17.448-171.885h349.45zm36.749-185.885h-388.052a15.492 15.492 0 1 10-30.983h388.052a15.492 15.492 0 1 1 0 30.983z"/><path d="m256 407.526a7 7 0 0 0 7-7v-115.296a7 7 0 0 0 -14 0v115.3a7 7 0 0 0 7 6.996z"/><path d="m335.57 407.526a7 7 0 0 0 7-7v-115.296a7 7 0 0 0 -14 0v115.3a7 7 0 0 0 7 6.996z"/><path d="m176.43 407.526a7 7 0 0 0 7-7v-115.296a7 7 0 0 0 -14 0v115.3a7 7 0 0 0 7 6.996z"/></svg><svg class="icon" viewBox="0 0 30 30"><use xlink:href="#shopping-bag" x="8%" y="7%"></use></svg></span><span class="cart-img hidden-lg hidden-md"><svg xmlns="http://www.w3.org/2000/svg" style="display: none;"><symbol id="shopping-cart-empty-side-view" viewBox="0 0 740 740"><title>shopping-cart-empty-side-view</title><path d="M444.274,93.36c-2.558-3.666-6.674-5.932-11.145-6.123L155.942,75.289c-7.953-0.348-14.599,5.792-14.939,13.708 c-0.338,7.913,5.792,14.599,13.707,14.939l258.421,11.14L362.32,273.61H136.205L95.354,51.179 c-0.898-4.875-4.245-8.942-8.861-10.753L19.586,14.141c-7.374-2.887-15.695,0.735-18.591,8.1c-2.891,7.369,0.73,15.695,8.1,18.591 l59.491,23.371l41.572,226.335c1.253,6.804,7.183,11.746,14.104,11.746h6.896l-15.747,43.74c-1.318,3.664-0.775,7.733,1.468,10.916 c2.24,3.184,5.883,5.078,9.772,5.078h11.045c-6.844,7.617-11.045,17.646-11.045,28.675c0,23.718,19.299,43.012,43.012,43.012 s43.012-19.294,43.012-43.012c0-11.028-4.201-21.058-11.044-28.675h93.777c-6.847,7.617-11.047,17.646-11.047,28.675 c0,23.718,19.294,43.012,43.012,43.012c23.719,0,43.012-19.294,43.012-43.012c0-11.028-4.2-21.058-11.042-28.675h13.432 c6.6,0,11.948-5.349,11.948-11.947c0-6.6-5.349-11.948-11.948-11.948H143.651l12.902-35.843h216.221 c6.235,0,11.752-4.028,13.651-9.96l59.739-186.387C447.536,101.679,446.832,97.028,444.274,93.36z M169.664,409.814 c-10.543,0-19.117-8.573-19.117-19.116s8.574-19.117,19.117-19.117s19.116,8.574,19.116,19.117S180.207,409.814,169.664,409.814z M327.373,409.814c-10.543,0-19.116-8.573-19.116-19.116s8.573-19.117,19.116-19.117s19.116,8.574,19.116,19.117 S337.916,409.814,327.373,409.814z"/></symbol></svg><svg class="icon" viewBox="0 0 30 30"><use xlink:href="#shopping-cart-empty-side-view" x="17%" y="22%"></use></svg></span><span class="cart-content"><span class="cart-name">'+ $('#cart .cart-name').text() +'</span><span class="cart-products-count hidden-sm hidden-xs">' + json['text_items_small'] + ' ' + json['total'] + '</span><span class="cart-products-count hidden-lg hidden-md">' + json['text_items_small'] + '</span></span></span>');						
						}, 100);

				if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
					location = 'index.php?route=checkout/cart';
				} else {
					$('#cart > ul').load('index.php?route=common/cart/info ul li');
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	}
}

var wishlist = {
	'add': function(product_id) {
		$.ajax({
			url: 'index.php?route=account/wishlist/add',
			type: 'post',
			data: 'product_id=' + product_id,
			dataType: 'json',
			success: function(json) {
				$('.alert-dismissible').remove();

				if (json['redirect']) {
					location = json['redirect'];
				}
				$('#wishlist-total span').html(json['total']);
				$('#wishlist-total').attr('title', json['total']);
				if (json['success']) {
					if ($(document).find('.quickview-container').length && parent) { 
						parent.$.notify({message:json.success},{type:"success",offset:0,placement:{from:"top",align:"center"},z_index: 9999,animate:{enter:"animated fadeInDown",exit:"animated fadeOutUp"},template:'<div data-notify="container" class="col-xs-12 col-sm-12 alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button><span data-notify="icon"></span> <span data-notify="title">{1}</span> <span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>'});
					} else {
						$.notify({message:json.success},{type:"success",offset:0,placement:{from:"top",align:"center"},z_index: 9999,animate:{enter:"animated fadeInDown",exit:"animated fadeOutUp"},template:'<div data-notify="container" class="col-xs-12 col-sm-12 alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button><span data-notify="icon"></span> <span data-notify="title">{1}</span> <span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>'});
					}
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	},
	'remove': function() {

	}
}

var compare = {
	'add': function(product_id) {
		$.ajax({
			url: 'index.php?route=product/compare/add',
			type: 'post',
			data: 'product_id=' + product_id,
			dataType: 'json',
			success: function(json) {
				$('.alert-dismissible').remove();
				$('#compare-total').html(json['total']);
				if (json['success']) {
					if ($(document).find('.quickview-container').length && parent) {
						parent.$.notify({message:json.success},{type:"success",offset:0,placement:{from:"top",align:"center"},z_index: 9999,animate:{enter:"animated fadeInDown",exit:"animated fadeOutUp"},template:'<div data-notify="container" class="col-xs-12 alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button><span data-notify="icon"></span> <span data-notify="title">{1}</span> <span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>'});

			        } else {
						$.notify({message:json.success},{type:"success",offset:0,placement:{from:"top",align:"center"},z_index: 9999,animate:{enter:"animated fadeInDown",exit:"animated fadeOutUp"},template:'<div data-notify="container" class="col-xs-12 alert alert-{0}" role="alert"><button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button><span data-notify="icon"></span> <span data-notify="title">{1}</span> <span data-notify="message">{2}</span><div class="progress" data-notify="progressbar"><div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div></div><a href="{3}" target="{4}" data-notify="url"></a></div>'});
					$('#compare-total').html(json['total']);

			        }
				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
			}
		});
	},
	'remove': function() {

	}
}

/* Agree to Terms */
$(document).delegate('.agree', 'click', function(e) {
	e.preventDefault();

	$('#modal-agree').remove();

	var element = this;

	$.ajax({
		url: $(element).attr('href'),
		type: 'get',
		dataType: 'html',
		success: function(data) {
			html  = '<div id="modal-agree" class="modal">';
			html += '  <div class="modal-dialog">';
			html += '    <div class="modal-content">';
			html += '      <div class="modal-header">';
			html += '        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
			html += '        <h4 class="modal-title">' + $(element).text() + '</h4>';
			html += '      </div>';
			html += '      <div class="modal-body">' + data + '</div>';
			html += '    </div>';
			html += '  </div>';
			html += '</div>';

			$('body').append(html);

			$('#modal-agree').modal('show');
		}
	});
});

// Autocomplete */
(function($) {
	$.fn.autocomplete = function(option) {
		return this.each(function() {
			this.timer = null;
			this.items = new Array();

			$.extend(this, option);

			$(this).attr('autocomplete', 'off');

			// Focus
			$(this).on('focus', function() {
				this.request();
			});

			// Blur
			$(this).on('blur', function() {
				setTimeout(function(object) {
					object.hide();
				}, 200, this);
			});

			// Keydown
			$(this).on('keydown', function(event) {
				switch(event.keyCode) {
					case 27: // escape
						this.hide();
						break;
					default:
						this.request();
						break;
				}
			});

			// Click
			this.click = function(event) {
				event.preventDefault();

				value = $(event.target).parent().attr('data-value');

				if (value && this.items[value]) {
					this.select(this.items[value]);
				}
			}

			// Show
			this.show = function() {
				var pos = $(this).position();

				$(this).siblings('ul.dropdown-menu').css({
					top: pos.top + $(this).outerHeight(),
					left: pos.left
				});

				$(this).siblings('ul.dropdown-menu').show();
			}

			// Hide
			this.hide = function() {
				$(this).siblings('ul.dropdown-menu').hide();
			}

			// Request
			this.request = function() {
				clearTimeout(this.timer);

				this.timer = setTimeout(function(object) {
					object.source($(object).val(), $.proxy(object.response, object));
				}, 200, this);
			}

			// Response
			this.response = function(json) {
				html = '';

				if (json.length) {
					for (i = 0; i < json.length; i++) {
						this.items[json[i]['value']] = json[i];
					}

					for (i = 0; i < json.length; i++) {
						if (!json[i]['category']) {
							html += '<li data-value="' + json[i]['value'] + '"><a href="#">' + json[i]['label'] + '</a></li>';
						}
					}

					// Get all the ones with a categories
					var category = new Array();

					for (i = 0; i < json.length; i++) {
						if (json[i]['category']) {
							if (!category[json[i]['category']]) {
								category[json[i]['category']] = new Array();
								category[json[i]['category']]['name'] = json[i]['category'];
								category[json[i]['category']]['item'] = new Array();
							}

							category[json[i]['category']]['item'].push(json[i]);
						}
					}

					for (i in category) {
						html += '<li class="dropdown-header">' + category[i]['name'] + '</li>';

						for (j = 0; j < category[i]['item'].length; j++) {
							html += '<li data-value="' + category[i]['item'][j]['value'] + '"><a href="#">&nbsp;&nbsp;&nbsp;' + category[i]['item'][j]['label'] + '</a></li>';
						}
					}
				}

				if (html) {
					this.show();
				} else {
					this.hide();
				}

				$(this).siblings('ul.dropdown-menu').html(html);
			}

			$(this).after('<ul class="dropdown-menu"></ul>');
			$(this).siblings('ul.dropdown-menu').delegate('a', 'click', $.proxy(this.click, this));

		});
	}
})(window.jQuery);
