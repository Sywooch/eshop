/*jshint -W069 */
$(document).ready(function() {
	var url = 'snippets/process.php';
	
	function updateCartCharacteristics(data) {
		if(data['count']) {
			$('#cart-count').text(data['count']);
		}
		if(data['sum']) {
			$('#cart-sum').text(data['sum']);
		}
	}
	function getId(o) {
		return parseInt(o.attr('id').replace(/[^\d]+/, ''));
	}
	
	$('button[type="button"]').click(function(event) {
		event.preventDefault();
	});
	
	// Check promocode
	$('#promo-code-wrapper button').click(function() {
		$this = $(this).prev();
		$('#cart-item-promocode').next().remove();
		$.post(url, {
			'action': 'a', 
			'promocode': $.trim($('#cart-item-promocode').val())
		}, function(data, textStatus, jqXHR) {
			if(textStatus == 'success' && data['status'] == 1) {
				$this.removeClass('has-error').addClass('has-success');
				$('#cart-item-promocode').after('<span class="glyphicon glyphicon-ok form-control-feedback"></span>');
			}
			else {
				$this.removeClass('has-success').addClass('has-error');
				$('#cart-item-promocode').after('<span class="glyphicon glyphicon-remove form-control-feedback"></span>');
			}
		},
		'json');
	});
	
	// Add to cart
	$('#push-to-cart').click(function() {
		$this = $(this);
		$this.button('loading');
		var amount = $.trim($('#cart-item-amount').val());
		$.post(url, {
			'action': 'b', 
			'item_id': parseInt($('#item_id').val()),
			'size': $.trim($('#cart-item-size option:selected').val()),
			'amount': amount,
			'inscription': $.trim($('#cart-item-inscription').val()),
			'printpromolink': $('#cart-item-printpromolink').prop('checked')+0,
			'promocode': $.trim($('#cart-item-promocode').val())
		}, function(data, textStatus, jqXHR) {
			if(textStatus == 'success' && data['status'] == 1) {
				$('#modalCart .alert-success').html('Вы добавили футболок: <span class="amount badge">' + amount + '</span>.');
				$('#modalCart .var-error').hide();
				$('#modalCart .var-success').show();
				updateCartCharacteristics(data);
			}
			else {
				if(data['reason'] == 'size') {
					$('#modalCart .alert-danger').html('Вы не выбрали размер.');
				}
				else if(data['reason'] == 'amount') {
					$('#modalCart .alert-danger').html('Вы не указали количество.');
				}
				$('#modalCart .var-success').hide();
				$('#modalCart .var-error').show();
			}
			$('#modalCart').modal();
			$this.button('reset');
		},
		'json');
	});
	
	// Push to cart
	$('button[id^="item-id-"]').click(function() {
		$this = $(this);
		$this.button('loading');
		$.post(url, {
			'action': 'c', 
			'item_id': getId($(this))
		}, function(data, textStatus, jqXHR) {
			if(textStatus == 'success' && data['status'] == 1) {
				$('#modalCart .alert-success').html('Вы положили <span class="badge">1</span> футболку в Вашу корзину.');
				$('#modalCart .var-error').hide();
				$('#modalCart .var-success').show();
				updateCartCharacteristics(data);
			}
			else {
				$('#modalCart .var-success').hide();
				$('#modalCart .var-error').show();
			}
			$('#modalCart').modal();
			$this.button('reset');
		},
		'json');
	});
	
	$("#blueimp-gallery").on('slide', function (event, index, slide) {
		$('.add-to-cart').unbind().click(function() {
			$this = $(this);
			$this.button('loading');
			var id = $(this).parents('.modal-content').find('img').attr('src').match(/\?(\d+)$/)[1];
			$.post(url, {
				'action': 'c', 
				'item_id': id
			}, function(data, textStatus, jqXHR) {
				if(textStatus == 'success' && data['status'] == 1) {
					$('#modalCart .alert-success').html('Вы положили <span class="badge">1</span> футболку в Вашу корзину.');
					$('#modalCart .var-error').hide();
					$('#modalCart .var-success').show();
					updateCartCharacteristics(data);
				}
				else {
					$('#modalCart .var-success').hide();
					$('#modalCart .var-error').show();
				}
				$('#modalCart').css({'z-index': $('#blueimp-gallery').css('z-index') + 1});
				$('#modalCart').modal();
				$this.button('reset');
			},
			'json');
		});
	});
	
	// Delete from cart
	$('button[id^="cart-id-"]').click(function() {
		$this = $(this);
		$this.button('loading');
		$.post(url, {
			'action': 'd', 
			'id': getId($(this))
		}, function(data, textStatus, jqXHR) {
			if(textStatus == 'success' && data['status'] == 1) {
				if(data['count'] > 0) {
					$this.parents('tr:first').remove();
					updateCartCharacteristics(data);
					$('#cart-total').text(data['total']);
				}
				else {
					$('#cart-wrapper').remove();
					$('.alert-info').show();
				}
				if(data['count'] < 5) {
					$('#back-to-top').parent().remove();
				}
			}
			$this.button('reset');
		},
		'json');
	});
	
	// Update cart
	$('button[id^="cart-idu-"]').click(function() {
		$this = $(this);
		var id = getId($(this));
		$this.button('loading');
		$.post(url, {
			'action': 'e', 
			'id': id,
			'size': $.trim($('#cart-item-size-' + id + ' option:selected').val()),
			'amount': $.trim($('#cart-item-amount-' + id).val()),
			'printpromolink': $('#cart-item-printpromolink-' +id).prop('checked')+0,
		}, function(data, textStatus, jqXHR) {
			if(textStatus == 'success' && data['status'] == 1) {
				$('#cart-item-price-' +id).find('span').remove();
				if($('#cart-item-printpromolink-' +id).prop('checked')) {
					$('#cart-item-price-' +id).append('<span class="small label label-default">-10%</span>');
				}
				updateCartCharacteristics(data);
				$('#cart-item-price-amount-' + id + '').text(data['priceamount']);
				$('#cart-total').text(data['total']);
			}
			$this.button('reset');
		},
		'json');
	});
	
	$('td[id^="cart-inscription-"] a').click(function(event) {
		event.preventDefault();
		var id = getId($(this).parents('td:first'));
		$('#modalCartItem').modal().one('shown.bs.modal', function(e) {
			$('textarea', $(this)).val($.trim($('#cart-inscription-' + id + ' div:first').text()));
		}).one('hide.bs.modal', function (e) {
			var inscription = $.trim($('textarea', $(this)).val());
			$.post(url, {
				'action': 'f', 
				'id': id,
				'inscription': inscription
			}, function(data, textStatus, jqXHR) {
				if(textStatus == 'success' && data['status'] == 1) {
					$('#cart-inscription-' + id + ' div:first').text(inscription);
				}
			},
			'json');
		});

	});
	
});
