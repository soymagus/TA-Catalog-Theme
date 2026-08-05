(function () {
	'use strict';

	var bar = document.querySelector('[data-ta-mobile-purchase]');
	var form = document.querySelector('.single-product form.cart');
	var action = bar ? bar.querySelector('[data-ta-purchase-action]') : null;

	if (!bar || !form || !action) {
		return;
	}

	bar.hidden = false;
	action.addEventListener('click', function () {
		var requiredSelect = form.querySelector('select[required]');
		if (requiredSelect && !requiredSelect.value) {
			form.scrollIntoView({ behavior: 'smooth', block: 'center' });
			requiredSelect.focus({ preventScroll: true });
			return;
		}

		var submit = form.querySelector('.single_add_to_cart_button:not(.disabled)');
		if (submit) {
			submit.click();
		} else {
			form.scrollIntoView({ behavior: 'smooth', block: 'center' });
		}
	});
}());
