'use strict';

jQuery(function($) {
	var SITE_URL				= ORDER_CONFIG.site_url;
	var WB_COUNT				= 0;
	var MIN_WB_COUNT			= ORDER_CONFIG.min_max_limit[0];
	var MAX_WB_COUNT			= ORDER_CONFIG.min_max_limit[1];
	var WB_DEFAULT_PRICING_TBL	= 'debossed:0-50'; // style + size
	var WB_DEFAULT_PROD_SHIP	= MIN_WB_COUNT + ':0-50';
	var WB_SELECTED_PROD_SHIP	= {production: 0, shipping: 0}; // default production and shipping options. overwritten when select changes
	var WB_MOLD_FEE				= parseFloat(ORDER_CONFIG.mold_fee);

	setTimeout(function() {
		on_select_wb_style();
		on_select_wb_size();

		preload_customize_modals('fonts');
		preload_customize_modals('fontcolor');
		preload_customize_modals('cliparts');

		update_total();

		$('#test-preview').on('click', update_preview);

		$('.js-daily-deal-expiry').countdown({
			date: ORDER_CONFIG.daily_deal_expiry,
			render: function(data) {             
				var tmpl = _.template('{{hours}}:{{minutes}}:{{seconds}}'),
					data = {
						hours: this.leadingZeros(data.hours, 2),
						minutes: this.leadingZeros(data.min, 2),
						seconds: this.leadingZeros(data.sec, 2)
					};

				$(this.el).html(tmpl(data));
			},
			onEnd: function() {
				// todo
			}
		});

	}, 1);

	function get_wb_option_selected(option)
	{
		return $('.js-highlight-selected-option.js-options-' + option).find('input.js-selected-option-value').val();
	}

	function preload_customize_modals(id)
	{
		var el = $('#js-modal-' + id),
			url = SITE_URL + 'secured/order-ajax.php',
			data = {
				'action': 'customize-modal',
				'view-modal': id
			};

		if(! el.length)
		{
			return false;
		}

		$.post(url, data, function(html) {
			el.find('.js-modal-spinner').remove();
			el.find('.uk-modal-dialog').append(html);
		});
	}

	function format_currency(amount)
	{
		return numeral(amount).format('0,0.00');
	}

	function active_panel(el)
	{
		_toggle_active_panel(el, true);
	}

	function default_panel(el)
	{
		_toggle_active_panel(el, false);
	}

	function _toggle_active_panel(el, active)
	{
		var	cls_active = 'uk-panel-box-primary',
			cls_default = 'uk-panel-hover';

		if(el.length)
		{
			if(active)
			{
				el.addClass(cls_active).removeClass(cls_default);
			}
			else
			{
				el.addClass(cls_default).removeClass(cls_active);
			}
		}
	}

	function toggle_pricing_table(style, size)
	{
		var selected = WB_DEFAULT_PRICING_TBL.split(':', 2),
			style = style || get_wb_option_selected('styles'),
			style = (style !== '') ? style : selected[0],
			size = size || get_wb_option_selected('sizes'),
			size = size.replace('inch', ''),
			size = (size !== '') ? size : selected[1],
			el = [style, size].join('-'),
			target = $('.js-pricing-table[data-pricing-tbl="'+ el +'"]');

		if(target.length)
		{
			target.siblings().addClass('uk-hidden');
			target.removeClass('uk-hidden');
		}
	}

	// sets value to blank or 0 and removes active panel
	function reset_color_quantity_input()
	{
		var panel = $('.js-colors-quantity-container').find('.uk-panel-box-primary');
			panel.find('input.js-input-quantity[value!=""]').val('');

		default_panel(panel);
	}

	function on_select_wb_style(target)
	{
		var fontcolor_container = $('.js-customize-fontcolor-container'),
			customize_container = $('.js-customize-container'),
			customize_cont_childs = customize_container.find('> div:not("#wb-preview-container")'),
			toggle_sizes = [],
			value;

		if(target)
		{
			value = target.find('.js-selected-icon').attr('data-selected-option');
		}
		else
		{
			value = $('.js-options-styles .js-selected-option-value').val();
		}

		reset_color_quantity_input();
		toggle_pricing_table(value, null);
		update_total();
		toggle_production_shipping_options();

		if(value !== 'dual-layer' || value !== 'figured')
		{
			toggle_colors_quantity('solid');
		}

		switch(value)
		{
			case 'debossed':
			case 'embossed':
				fontcolor_container.addClass('uk-hidden');
			break;

			case 'blank':
				// hide customization sections except preview
				customize_cont_childs.addClass('uk-hidden');
			break;

			case 'dual-layer':
				fontcolor_container.addClass('uk-hidden');
				toggle_colors_quantity('dual-layer');

				toggle_sizes.push('0-50', '0-75');
			break;

			default:
				if(value === 'figured' || value === 'embossed-printed')
				{
					if(value === 'figured')
					{
						toggle_colors_quantity('figured');
					}

					toggle_sizes.push('0-50', '0-75', '1-00');
				}

				fontcolor_container.removeClass('uk-hidden');
				customize_cont_childs.removeClass('uk-hidden');
		}

		$('.js-options-sizes [data-wb-size]').removeClass('uk-hidden');

		if(toggle_sizes.length)
		{
			$('.js-options-sizes [data-wb-size]').addClass('uk-hidden');

			$.each(toggle_sizes, function(idx, inch) {
				inch = (inch + 'inch');
				$('.js-options-sizes [data-wb-size="'+ inch +'"]').removeClass('uk-hidden');
			});
		}
	}

	function on_select_wb_size(target)
	{
		var value,
			active_size,
			active_size_image,
			colors_container = $('.js-colors-quantity-container'),
			active_color = colors_container.find('[data-color-opt-type]:visible'),
			sizes_container = active_color.find('.js-colors-sizes');

		if(target)
		{
			value = target.find('.js-selected-icon').attr('data-selected-option');
		}
		else
		{
			value = $('.js-options-sizes .js-selected-option-value').val();
		}

		toggle_pricing_table(null, value);
		update_total();
		toggle_production_shipping_options();

		active_size = value.replace('inch', '');
		active_size_image = sizes_container.find('img[data-color-size="'+ active_size +'"]');

		if(sizes_container.length)
		{
			sizes_container.find('img[data-color-size]').addClass('uk-hidden');

			if(active_size_image.length)
			{
				active_size_image.removeClass('uk-hidden');
			}
			else
			{
				var one_inch = sizes_container.find('img[data-color-size="1-00"]');

				if(one_inch.length)
				{
					one_inch.removeClass('uk-hidden');
				}
				else
				{
					sizes_container.find('img[data-color-size="0-50"]').removeClass('uk-hidden');
				}
			}
		}
	}

	function toggle_colors_quantity(type, from_btn)
	{
		var container = $('.js-colors-quantity-container'),
			from_btn = from_btn || false,
			buttons = container.find('.js-button-filter-types'),
			active_btn = buttons.find('[data-btn-filter-type="'+ type +'"]'),
			active_color = container.find('[data-color-opt-type="'+ type +'"]');

		container.find('input[name="BandType"]').val(type);

		active_color
			.addClass('uk-scrollable-box')
			.removeClass('uk-hidden');

		active_color.trigger('display.uk.check');
		active_color.siblings('[data-color-opt-type]').addClass('uk-hidden');

		if(type === 'dual-layer')
		{
			buttons.addClass('uk-hidden');
		}
		else
		{
			buttons.removeClass('uk-hidden');
		}

		if(! from_btn)
		{
			buttons.find('button.uk-active').removeClass('uk-active');

			if(active_btn.length)
			{
				active_btn.addClass('uk-active');
			}
			else
			{
				buttons.find('[data-btn-filter-type="solid"]').addClass('uk-active');
			}
		}

		on_select_wb_size();
	}

	function order_summary_list_tmpl(description, price, icon)
	{
		var html = $('.js-order-summary-container .js-order-summary-list-tmpl').html(),
			tmpl = _.template(html);

		icon = icon || 'check';
		price = parseFloat(price) || 0;
		price = format_currency(price);

		return tmpl({
			description: description,
			price: price,
			icon: icon
		});
	}

	function update_preview()
	{
		var input = $('form .js-wristband-preview'),
			data = input.serialize(),
			url = SITE_URL + 'secured/preview/',
			cont = $('.js-preview-container'),
			progress = cont.find('.js-preview-progress'),
			resp = cont.find('.js-preview-response'),
			selected_type = $('.js-colors-quantity-container input[name="BandType"]').val();

		progress.removeClass('uk-hidden');
		resp.addClass('uk-hidden');

		if(selected_type !== '')
		{
			var selected_colors = [];

			$('.js-colors-quantity-container [data-color-opt-type="'+ selected_type +'"] input.js-input-quantity[value!=""]').each(function() {
				var el = $(this),
					val = el.val();

				if(val !== '' && val >= 1)
				{
					selected_colors.push(el.attr('data-qty-color-code'));
				}
			});

			if(selected_colors.length)
			{
				data += ('&colors=' + selected_colors.join('|'));
			}
		}

		data += ('&width=' + $('.js-preview-container').width());

		$.post(url, data, function(html) {
			progress.addClass('uk-hidden');
			resp
				.removeClass('uk-hidden')
				.html(html);
		});
	}

	function update_total()
	{
		// set quantity
		var inp_qty = $('.js-colors-quantity-container input.js-input-quantity[value!=""]'),
			cnt = 0,
			arr_molds = [],
			arr_wb_types = {};

		_.map(['segmented', 'swirl', 'glow'], function(t) {
			arr_wb_types[t] = 0;
		});

		$.each(inp_qty, function() {
			var inp = $(this),
				v = inp.val(),
				v = Number(v),
				size = inp.attr('data-qty-color-size'),
				code = inp.attr('data-qty-color-code'),
				type = inp.attr('data-qty-color-type');

			if(v !== '' && v >= 1)
			{
				_.map(arr_wb_types, function(x, tmp) {
					if(tmp === type || (type.indexOf(tmp) >= 0))
					{
						arr_wb_types[tmp] += v;
					}
				});

				arr_molds.push(size);
				cnt += v;
			}
		});

		WB_COUNT = cnt;

		// check if count exceeds max wb allowed
		if(WB_COUNT > MAX_WB_COUNT)
		{
			WB_COUNT = MAX_WB_COUNT;
		}

		// toggle order summary
		var prnt = $('.js-order-summary-container'),
			summ_cont = prnt.find('.js-order-summary'),
			summ_list = summ_cont.find('.js-order-summary-list'),
			summ_alert = prnt.find('.js-order-summary-alert'),
			pricing_tbl = $('.js-pricing-table[data-pricing-tbl]:not(".uk-hidden")');

		summ_alert.find('u').html(MIN_WB_COUNT);

		if(WB_COUNT >= MIN_WB_COUNT)
		{
			var subtotal = 0,
				amt_each = 0;

			summ_cont.removeClass('uk-hidden');
			summ_list.html('');
			summ_alert.addClass('uk-hidden');

			pricing_tbl.find('[data-qty-range]').each(function() {
				var t = $(this),
					r = t.attr('data-qty-range').split('-'),
					amt = t.text(),
					_min = r[0],
					_min = parseFloat(_min),
					_max = r[1],
					_max = parseFloat(_max),
					amt = parseFloat(amt);

				if(WB_COUNT >= _min && WB_COUNT <= _max)
				{
					amt_each = amt.toFixed(2);
				}
			});

			subtotal = parseFloat(WB_COUNT) * amt_each;

			// display wb count
			(function() {
				var tmpl = 'Wristbands ({{wbcount}} x ${{price}} each)',
					out;

				tmpl = _.template(tmpl);
				out = tmpl({
					wbcount: numeral(WB_COUNT).format('0,0'),
					price: format_currency(amt_each)
				});

				summ_list.append(order_summary_list_tmpl(out, subtotal, 'circle-o-notch'));
			})();

			_.map(arr_wb_types, function(cnt, type) {
				if(cnt > 0)
				{
					var tmpl = _.template('{{type}} Wristbands ({{cnt}} x ${{price}} each)'),
						out;

					if(cnt > MAX_WB_COUNT)
					{
						cnt = MAX_WB_COUNT;
					}

					_.each(ORDER_CONFIG.addons_pricing, function(data, range) {
						var range = range.split('-', 2),
							_min = range[0],
							_min = parseFloat(_min),
							_max = range[1],
							_max = parseFloat(_max),
							_tmp_cnt = (cnt < MIN_WB_COUNT ? MIN_WB_COUNT : cnt), // bug when count is less than min
							_subtotal = 0;

						if(_tmp_cnt >= _min && _tmp_cnt <= _max)
						{
							_.each(data, function(amt, name) {
								if(type.toLowerCase() === name.toLowerCase())
								{
									out = tmpl({
										type: _.titleize(type),
										cnt: numeral(cnt).format('0,0'),
										price: format_currency(amt)
									});

									_subtotal = (cnt * amt);
									subtotal += _subtotal;

									summ_list.append(order_summary_list_tmpl(out, _subtotal, 'life-ring'));

								}
							});
						}
					});
				}
			});

			// mold fee
			if(arr_molds.length)
			{
				arr_molds = _.uniq(arr_molds);

				$.each(arr_molds, function(idx, mold) {
					var tmpl = _.template('Mold Fee ({{mold}})'),
						out = tmpl({mold: mold}),
						_mold_fee = (idx == 0 ? 0 : parseFloat(WB_MOLD_FEE)); // first mold is free

					subtotal += _mold_fee;

					summ_list.append(order_summary_list_tmpl(out, _mold_fee, 'dollar'));
				});
			}

			// wb messages
			$('.js-customize-container input.js-input-wb-message:not(:disabled)').each(function() {
				var inp = $(this),
					name = inp.attr('name'),
					val = inp.val();

				if(val !== '')
				{
					var price_el = $('.js-customize-container .js-addon-price[data-addon-name="'+ name +'"]'),
						price_each = price_el.hasClass('js-addon-price-each'),
						price = 0,
						_subtotal = 0;

					if(price_el.length)
					{
						price = price_el.text();
						price = parseFloat(price);

						if(price_each)
						{
							_subtotal = (WB_COUNT * price);
						}
						else
						{
							_subtotal = price;
						}

						subtotal += _subtotal;

						(function() {
							var tmpl = '{{desc}}',
								out;

							if(price_each)
							{
								tmpl += ' (${{price}} each)';
							}

							tmpl = _.template(tmpl);
							out = tmpl({
								desc: price_el.attr('data-addon-title'),
								price: format_currency(price)
							});

							summ_list.append(order_summary_list_tmpl(out, _subtotal, 'pencil'));
						})();
					}
				}
			});

			var clipart_price = 0;

			// cliparts
			$('.js-customize-container input.js-clipart-name:not(:disabled)').each(function() {
				var inp = $(this),
					val = inp.val();

				if(val !== '')
				{
					var price_el = $('.js-customize-container .js-addon-price[data-addon-name="Clipart"]'),
						price_each = price_el.hasClass('js-addon-price-each'),
						price = 0;

					if(price_el.length)
					{
						price = price_el.text();
						price = parseFloat(price);

						if(price_each)
						{
							clipart_price = (WB_COUNT * price);
						}
						else
						{
							clipart_price = price;
						}
					}
				}
			});

			if(clipart_price != 0)
			{
				(function() {
					var tmpl = '{{desc}}',
						out;

					var price_el = $('.js-customize-container .js-addon-price[data-addon-name="Clipart"]'),
						price = price_el.text(),
						price = parseFloat(price),
						price_each = price_el.hasClass('js-addon-price-each');

					if(price_each)
					{
						tmpl += ' (${{price}} each)';
					}

					tmpl = _.template(tmpl);
					out = tmpl({
						desc: price_el.attr('data-addon-title'),
						price: format_currency(price)
					});

					summ_list.append(order_summary_list_tmpl(out, clipart_price, 'image'));
				})();
			}

			subtotal += clipart_price;

			// addons
			$('.js-addons-container .js-addon-price').each(function() {
				var addon = $(this),
					addon_name = addon.attr('data-addon-name'),
					addon_price = addon.text(),
					addon_price = parseFloat(addon_price),
					addon_price_each = addon.hasClass('js-addon-price-each'),
					addon_inp = $('.js-addons-container input[name="'+ addon_name +'"]'),
					_subtotal = 0;

				if(addon_inp.length && addon_inp.val() >= 1)
				{
					if(addon_price_each)
					{
						_subtotal = (WB_COUNT * addon_price);
					}
					else
					{
						_subtotal = addon_price;
					}

					subtotal += _subtotal;

					var tmpl = '{{desc}}',
						out;

					if(addon_price_each)
					{
						tmpl += ' (${{price}} each)';
					}

					tmpl = _.template(tmpl);
					out = tmpl({
						desc: addon.attr('data-addon-title'),
						price: format_currency(addon_price)
					});

					summ_list.append(order_summary_list_tmpl(out, _subtotal, 'user-plus'));
				}
			});

			// shipping/production
			$('.js-production-shipping-container').find('select.js-shipping-options, select.js-production-options').each(function() {
				var el = $(this),
					title = el.attr('data-title'),
					is_shipping_opt = el.hasClass('js-shipping-options'),
					icon = is_shipping_opt ? 'truck' : 'recycle',
					val = 0,
					price = 0,
					sel = el.find('option:selected[data-price]');

				if(sel.length)
				{
					var tmpl = _.template('{{title}} ({{days}} {{day_text}})'),
						out;

					val = Number(sel.val());
					price = parseFloat(sel.attr('data-price'));
					subtotal += price;

					out = tmpl({
						title: title,
						days: val,
						day_text: (val > 1 ? 'Days' : 'Day')
					});

					summ_list.append(order_summary_list_tmpl(out, price, icon));
				}
			});

			summ_cont.find('.js-subtotal').text(format_currency(subtotal));
		}
		else
		{
			summ_cont.addClass('uk-hidden');
			summ_alert.removeClass('uk-hidden');
		}
	}

	function toggle_production_shipping_options()
	{
		var def_prod_ship = WB_DEFAULT_PROD_SHIP.split(':', 2);

		function _create_ps_option(el)
		{
			var opt = $('<option>');

			opt
				.val(el.attr('data-wb-days'))
				.attr('data-price', el.attr('data-wb-price'))
				.text(el.html());

			return opt;
		}

		function _toggle_ps_opts(filter_type, style, size)
		{
			var prnt = $('.js-production-shipping-container'),
				sel = prnt.find('select.js-'+ filter_type +'-options'),
				sel_opt_default = sel.find('option[value="0"]'),
				opts_html = prnt.find('.js-'+ filter_type +'-options-html > [data-ps-option]'),
				active_opt = null,
				active_opt_val = WB_SELECTED_PROD_SHIP[filter_type];

			sel_opt_default.prop('selected', true);
			sel_opt_default.siblings().remove();

			$.each(opts_html, function() {
				var o = $(this),
					_min = o.attr('data-wb-min'),
					_min = parseFloat(_min),
					_max = o.attr('data-wb-max'),
					_max = parseFloat(_max),
					_style = o.attr('data-wb-style'),
					_size = o.attr('data-wb-size'),
					_default_cnt = parseFloat(def_prod_ship[0]);

				if((WB_COUNT >= _min && WB_COUNT <= _max) || (WB_COUNT == 0 && _min === _default_cnt))
				{
					if(_size === size)
					{
						if(_style !== '')
						{
							_.map(_style.split('|'), function(_s) {
								if(style === _s)
								{
									sel.append(_create_ps_option(o));
								}
							});
						}
						else
						{
							sel.append(_create_ps_option(o));
						}
					}
				}
			});

			if(active_opt_val != 0)
			{
				active_opt = sel.find('option[value="'+ active_opt_val +'"]');

				if(active_opt.length)
				{
					active_opt.prop('selected', true);
				}
			}
		}

		var style = get_wb_option_selected('styles'), 
			size = get_wb_option_selected('sizes'),
			size = size.replace('inch', ''),
			size = (size !== '' ? size : def_prod_ship[1]);

		if(style !== '')
		{
			_toggle_ps_opts('production', style, size);
			_toggle_ps_opts('shipping', style, size);
		}
	}

	function toggle_free_wristbands()
	{
		var free = 0,
			prnt = $('.js-free-bands-container'),
			list = prnt.find('.js-free-bands-list'),
			accept = prnt.find('.js-free-bands-accept'),
			icon = accept.find('i'),
			icon_checked = 'uk-icon-toggle-on',
			icon_unchecked = 'uk-icon-toggle-off';

		if(WB_COUNT >= 200)
		{
			free = 200
		}
		else
		{
			if(WB_COUNT >= 100 && WB_COUNT <= 199)
			{
				free = 100;
			}
		}

		function _titleize(str)
		{
			str = _.humanize(str);
			return _.titleize(str);
		}

		function _free_wb_list()
		{
			var el = $('.js-colors-quantity-container input.js-input-quantity[value!=""]'),
				opts = {};

			$.each(el, function() {
				var inp = $(this),
					v = inp.val(),
					v = Number(v),
					name = inp.attr('name');

				if(v !== '' && v >= 1)
				{
					var parts = name.split('_'),
						size = _titleize(parts[1]),
						style = _titleize(parts[2]),
						color = _titleize(parts[3]);

					opts[name.replace('qty_', '')] = {
						size: size,
						style: style,
						color: color,
						value: v
					};
				}
			});

			var tmpl = prnt.find('.js-free-bands-list-tmpl').html(),
				tmpl = _.template(tmpl),
				container = prnt.find('.js-free-bands-list-html'),
				cnt = _.size(opts),
				value = '';

			switch(cnt)
			{
				case 1:
				case 2:
				case 4:
				case 5:
					// value = (free / cnt);
				break;
			}

			container.html('');

			_.map(opts, function(data, name) {
				data.name = name;
				data['max'] = data.value;

				if(data.color)
				{
					data.color = (data.color).replace('Pantone', 'Pantone ');
					data.color = (data.color).replace('Lightblue', 'Light Blue');
					data.color = (data.color).replace('Lightgreen', 'Light Green');
				}

				container.append(tmpl(data));
			});
		}

		accept.off();

		if(free > 0)
		{
			prnt
				.removeClass('uk-hidden')
				.find('.js-free-bands-count')
				.text(free);

			_free_wb_list();

			accept.on('click', function() {
				if(icon.hasClass(icon_checked))
				{
					list.addClass('uk-hidden');
					icon
						.addClass(icon_unchecked)
						.removeClass(icon_checked);
				}
				else
				{
					list.removeClass('uk-hidden');
					icon
						.addClass(icon_checked)
						.removeClass(icon_unchecked);
				}
			});
		}
		else
		{
			prnt.addClass('uk-hidden');
			list.addClass('uk-hidden');

			icon
				.addClass(icon_unchecked)
				.removeClass(icon_checked);
		}
	}

	$(document).on('keyup keydown', '.js-colors-quantity-container input.js-input-quantity', function() {
		var el = $(this),
			value = el.val(),
			value = Number(value),
			panel = el.parents('.uk-panel-box').first();

		if(value == 0)
		{
			el.val('');
			value = '';
		}

		if(value !== '' && value >= 1)
		{
			active_panel(panel);
		}
		else
		{
			default_panel(panel);
		}
	});

	$('.js-addon-price[data-addon-name]').each(function() {
		var el = $(this),
			value = el.text();

		el.attr('data-addon-default-price', value);
	});

	$(document).on('blur keydown', '.js-colors-quantity-container input.js-input-quantity', _.debounce(function() {
		var pricing_changed = false;

		update_total();
		toggle_production_shipping_options();
		toggle_free_wristbands();

		$.each(ORDER_CONFIG.addons_pricing, function(cnt, data) {
			cnt = cnt.split('-', 2);

			var _min = parseFloat(cnt[0]),
				_max = parseFloat(cnt[1]);

			$.each(data, function(name, val) {
				var el = $('.js-addon-price[data-addon-name="'+ name +'"]'),
					def = el.attr('data-addon-default-price'),
					val = (parseFloat(val)).toFixed(2);

				if(el.length)
				{
					if(WB_COUNT >= _min && WB_COUNT <= _max)
					{
						el.html(val);
						pricing_changed = true;
					}
				}
			});
		});

		if(! pricing_changed)
		{
			// reset to default pricing
			$('.js-addon-price[data-addon-name]').each(function() {
				var el = $(this),
					val = el.attr('data-addon-default-price'),
					val = (parseFloat(val)).toFixed(2);

				el.html(val);
			});
		}
	}, 250));

	$('.js-colors-quantity-container').on('click', '.js-button-filter-types button', function() {
		var ft = $(this).attr('data-btn-filter-type'),
			style = get_wb_option_selected('styles');

		if(style === 'figured')
		{
			if(ft === 'solid')
			{
				ft = 'figured';
			}
			else
			{
				ft = ('figured-' + ft);
			}
		}

		toggle_colors_quantity(ft, true);
	});

	// custom color
	$(document).on('click', 'button.js-select-custom-color', function() {
		var btn = $(this),
			mdl_id = '#js-modal-custom-color',
			mdl = $(mdl_id),
			mdl_spinner = mdl.find('.js-modal-spinner'),
			mdl_html = mdl.find('.js-modal-custom-color-html'),

			wb_type = btn.parents('[data-color-opt-type]:first').attr('data-color-opt-type'),
			select_custom_single = true,

			post_data = {action: 'custom-colors'},

			min_colors = 1,
			max_colors = 1;

		switch(wb_type)
		{
			case 'segmented':
			case 'swirl':
				select_custom_single = false;
			break;
		}

		mdl.find('.js-select-custom-single, .js-select-custom-multi').addClass('uk-hidden');

		if(select_custom_single)
		{
			mdl.find('.js-select-custom-single').removeClass('uk-hidden');
		}
		else
		{
			min_colors = 2;
			max_colors = 3;

			mdl.find('.js-select-custom-multi').removeClass('uk-hidden');
		}

		post_data.min_colors = min_colors;
		post_data.max_colors = max_colors;

		UIkit.modal(mdl_id).show();

		function custom_color_count()
		{
			return mdl.find('.js-selected-colors-container .js-selected-colors .js-selected-color').length;
		}

		function toggle_save_btn()
		{
			var cnt = custom_color_count();
			var save_btn = mdl.find('.js-selected-colors-container button.js-btn');

			if(cnt == min_colors || cnt == max_colors)
			{
				save_btn.prop('disabled', false);
			}
			else
			{
				save_btn.prop('disabled', true);
			}
		}

		function can_append_custom_color()
		{
			var len = custom_color_count();

			if(! len)
			{
				return true;
			}

			return (len < max_colors);
		}

		function append_custom_color(name, title, hex)
		{
			var prnt = mdl.find('.js-selected-colors-container'),
				tmpl = prnt.find('.js-selected-color-tmpl').html(),
				tmpl = _.template(tmpl),
				out = tmpl({name: name, title: title, hex: hex});

			prnt
				.removeClass('uk-hidden')
				.find('.js-selected-colors').append(out);
		}

		function display_selected_custom_colors(data)
		{
			var tbl = mdl.find('.js-selected-color-table-tmpl table'),
				td = tbl.find('td'),
				tmpl = td.prop('outerHTML'),
				opt = '';

			if(_.isUndefined(tmpl))
			{
				UIkit.modal(mdl_id).hide();
				return;
			}

			_.each(data, function(inp, idx) {
				inp = $(inp);

				var tmp = _.template(tmpl);

				opt += tmp({
					max_colors: max_colors,
					wb_type: wb_type,
					name: inp.attr('name'),
					title: inp.attr('title'),
					hex: inp.val(),
					tooltip_config: "{pos:'bottom'}"
				});
			});

			tbl.find('tr').html(opt);

			$('.js-colors-quantity-container [data-color-opt-type="'+ wb_type +'"] .js-selected-color-table').html(tbl);

			UIkit.modal(mdl_id).hide();
		}

		$.post(SITE_URL + 'secured/order-ajax.php', post_data, function(html) {
			mdl_spinner.addClass('uk-hidden');
			mdl_html
				.html(html)
				.removeClass('uk-hidden');

			// select color
			mdl_html.find('.js-modal-select-color').on('click', function() {
				var el = $(this),
					name = el.attr('data-color-name'),
					title = el.attr('title'),
					hex = el.attr('data-color-hex'),
					append = can_append_custom_color();

				if(max_colors == 1)
				{
					// override selected color
					if(! append)
					{
						append = true;
						mdl.find('.js-selected-colors-container .js-selected-colors .js-selected-color').remove();
					}
				}

				if(append)
				{
					append_custom_color(name, title, hex);
				}

				setTimeout(toggle_save_btn, 30);
			});

			// save selection
			mdl.find('.js-selected-colors-container').off().on('click', 'button.js-btn', function() {
				var inp = mdl.find('.js-selected-colors .js-selected-color input:hidden');

				display_selected_custom_colors(inp);
			});

			// replace color
			mdl_html.find('.js-selected-colors').off().on('click', '.js-replace-color', function() {
				$(this).parents('.js-selected-color:first').remove();

				toggle_save_btn();

				if(! custom_color_count())
				{
					mdl.find('.js-selected-colors-container').addClass('uk-hidden');
				}
			});

			// get existing colors from step 3
			$('.js-colors-quantity-container [data-color-opt-type="'+ wb_type +'"] .js-selected-color-table input:hidden').each(function() {
				var inp = $(this),
					name = inp.attr('data-name'),
					title = inp.attr('title'),
					hex = inp.attr('data-hex');

				append_custom_color(name, title, hex);
				toggle_save_btn();
			});
		}); // post
	});

	// custom color
	$('#js-modal-custom-color').on('hide.uk.modal', function(el) {
		var	mdl = $(el.target),
			mdl_spinner = mdl.find('.js-modal-spinner'),
			mdl_html = mdl.find('.js-modal-custom-color-html');

		mdl_spinner.removeClass('uk-hidden');
		mdl_html
			.html('')
			.addClass('uk-hidden');
	});

	// load colors and qty
	(function() {
		var container = $('.js-colors-quantity-container'),
			container_width = container.width(),
			data = {
				action: 'colors-quantity',
				container_width: parseInt(container_width)
			};

		$.post(SITE_URL + 'secured/order-ajax.php', data, function(html) {
			var style_selected = get_wb_option_selected('styles'),
				btn_container,
				btn,
				btn_width,
				btn_height;

			if(style_selected === '')
			{
				style_selected = 'solid';
			}

			container.html(html);

			setTimeout(function() {
				btn_container = container.find('.js-select-custom-color-container');

				if(btn_container.length)
				{
					btn = btn_container.first().find('button.js-select-custom-color');
					btn_width = btn.width();
					btn_width = parseInt(btn_width);
					btn_height = btn.height();
					btn_height = parseInt(btn_height);

					if(parseInt(btn_width / btn_height) < 2)
					{
						btn_container.css('width', '100%');
					}
				}

				toggle_colors_quantity(style_selected);
			}, 10)
		});
	})();

	$('.js-highlight-selected-option > div .uk-panel').on('click', function(e) {
		// zoom icon clicked
		if($(e.target).is('.js-icon-zoom-image'))
		{
			return;
		}

		var el = $(this),
			selected = el.parents('.js-highlight-selected-option'),
			selected_option = el.find('.js-selected-icon').attr('data-selected-option');

		function _toggle_sel_icons(elem, active)
		{
			var a = elem.find('.js-selected-icon-active'),
				i = elem.find('.js-selected-icon-inactive'),
				h = 'uk-hidden';

			if(active)
			{
				a.removeClass(h);
				i.addClass(h);
			}
			else
			{
				a.addClass(h);
				i.removeClass(h);
			}
		}

		selected.find('input.js-selected-option-value').val(selected_option);
		selected.addClass('js-has-selected-option');

		_toggle_sel_icons(selected, false);
		_toggle_sel_icons(el, true);

		default_panel(selected.find('.uk-panel-box-primary'));
		active_panel(el);
	});

	// wristband style selected
	$('.js-options-styles > div').on('click', function() {
		on_select_wb_style($(this));
	});

	// wristband size selected
	$('.js-options-sizes > div').on('click', function() {
		on_select_wb_size($(this));
		reset_color_quantity_input();
	});

	// select message style
	$('.js-message-style-buttons > button').on('click', function() {
		var el = $(this),
			def = $('#customize-message-style-default, #customize-cliparts-default'),
			cont = $('#customize-message-style-continuous, #customize-cliparts-continuous');

		$('input.js-message-style-selected-option').val(el.attr('name'));

		if(el.hasClass('uk-active'))
		{
			return;
		}

		el.siblings().removeClass('uk-active');
		el.addClass('uk-active');

		if(el.hasClass('js-message-style-button-continuous'))
		{
			def
				.addClass('uk-hidden')
				.find('input.js-input-wb-message, input.js-clipart-name')
				.prop('disabled', true);

			cont
				.removeClass('uk-hidden')
				.find('input.js-input-wb-message, input.js-clipart-name')
				.prop('disabled', false);
		}
		else
		{
			def
				.removeClass('uk-hidden')
				.find('input.js-input-wb-message, input.js-clipart-name')
				.prop('disabled', false);

			cont
				.addClass('uk-hidden')
				.find('input.js-input-wb-message, input.js-clipart-name')
				.prop('disabled', true);
		}

		update_total();
	});

	$('.js-customize-container input.js-input-wb-message').on('keydown blur', function(e) {
		var el = $(this),
			name = el.attr('name'),
			val = el.val(),
			val = $.trim(val),
			req = el.prop('required');

		if(req && (val === ''))
		{
			if(e.type === 'blur')
			{
				el.addClass('uk-form-danger');
			}
		}
		else
		{
			if(e.type === 'blur')
			{
				el.val(val);
			}

			el.removeClass('uk-form-danger');
		}

		setTimeout(_.debounce(update_total, 100), 1);
	});

	// modal select font style
	$('#js-modal-fonts').on('click', 'a.js-modal-selected-font', function(e) {
		e.preventDefault();

		var el = $(this),
			prnt = $('.js-customize-font-container'),
			name = el.attr('data-font-name'),
			src = el.find('img').attr('src');

		prnt.find('input.js-customize-font-value').val(name);
		prnt.find('img.js-customize-font-image').attr({
			src: src,
			alt: name
		});

		UIkit.modal('#js-modal-fonts').hide();
	});

	// modal select font color
	$('#js-modal-fontcolor').on('click', 'a.js-modal-selected-fontcolor', function(e) {
		e.preventDefault();

		var el = $(this),
			prnt = $('.js-customize-fontcolor-container'),
			name = el.attr('data-color-name'),
			label = el.attr('title'),
			hex = el.attr('data-color-hex');

		prnt.find('.js-customize-fontcolor-label').html(label);
		prnt.find('input.js-customize-fontcolor-value').val(name);
		prnt.find('input.js-customize-fontcolor-hex').val(hex.replace('#', ''));
		prnt.find('.js-customize-fontcolor-bgcolor').css('background-color', hex);

		UIkit.modal('#js-modal-fontcolor').hide();
	});

	// clipart selected from modal
	$('#js-modal-cliparts').on('click', 'a.js-modal-selected-clipart', function(e) {
		e.preventDefault();

		var mc = $('#js-modal-cliparts'),
			el = $(this),
			name = el.attr('data-clipart-name'),
			src = el.find('img').attr('src'),
			fld = mc.attr('data-clipart-field-active'),
			prnt = $('.js-clipart-options[data-clipart-field="'+ fld +'"]');

		if(prnt.length)
		{
			prnt.find('input.js-clipart-name').val(name);
			prnt.find('.js-clipart-buttons').addClass('uk-hidden');
			prnt.find('.js-clipart-preview').removeClass('uk-hidden');
			prnt.find('.js-clipart-preview img.js-clipart-image').attr({
				src: src,
				alt: name
			});
		}

		UIkit.modal('#js-modal-cliparts').hide();
		update_total();
	});

	// browse and remove clipart/artwork
	$('.js-clipart-options').on('click', '.js-modal-cliparts, .js-modal-artworks, .js-clipart-remove, .js-artwork-remove', function() {
		var el = $(this),
			prnt = el.parents('.js-clipart-options').first(),
			fld = prnt.attr('data-clipart-field'),
			name = prnt.find('input.js-clipart-name').val();

		if(el.hasClass('js-clipart-remove') || el.hasClass('js-artwork-remove'))
		{
			if(el.hasClass('js-artwork-remove'))
			{
				$.post(SITE_URL + 'secured/order-ajax.php', {
					action: 'delete-artwork',
					name: name
				});
			}

			prnt.find('input.js-clipart-name').val('');
			prnt.find('.js-clipart-buttons').removeClass('uk-hidden');
			prnt.find('.js-clipart-preview, .js-artwork-preview').addClass('uk-hidden');
		}
		else
		{
			$('#js-modal-cliparts, #js-modal-upload-clipart').attr('data-clipart-field-active', fld);
		}

		update_total();
	});

	// toggle extra small/large qty sizes
	$('.js-colors-quantity-container').on('click', '.js-qty-toggle-extra', function() {
		var el = $(this),
			cls = 'js-qty-toggle-extra-hidden',
			icon_hidden = 'uk-icon-chevron-down',
			icon_visible = 'uk-icon-chevron-up';

		if(el.hasClass(cls))
		{
			el.removeClass(cls);
			el.find('i').removeClass(icon_hidden).addClass(icon_visible);
		}
		else
		{
			el.addClass(cls);
			el.find('i').addClass(icon_hidden).removeClass(icon_visible);
		}
	});

	// check/uncheck add-ons
	$('.js-addons-container label').on('click', function() {
		var el = $(this),
			i = el.find('i'),
			inp = el.find('input'),
			icon_checked = 'uk-icon-check-circle',
			icon_unchecked = 'uk-icon-circle-thin';

		if(inp.val() > 0)
		{
			inp.val(0);
			i
				.removeClass(icon_checked)
				.addClass(icon_unchecked);
		}
		else
		{
			inp.val(1);
			i
				.addClass(icon_checked)
				.removeClass(icon_unchecked);
		}

		update_total();
	});

	// select production or shipping options
	$('.js-production-shipping-container').find('select.js-shipping-options, select.js-production-options').on('change', function() {
		var el = $(this),
			opt = el.find('option:selected'),
			val = opt.val(),
			is_shipping_sel = el.hasClass('js-shipping-options'),
			filter_type = (is_shipping_sel ? 'shipping' : 'production');

		WB_SELECTED_PROD_SHIP[filter_type] = val;

		update_total();

		if(val == 0)
		{
			el.addClass('uk-form-danger');
		}
		else
		{
			el.removeClass('uk-form-danger');
		}
	});

	// upload
	(function() {
		var prnt = $('#js-modal-upload-clipart'),
			alert_cont = prnt.find('.js-upload-alert-container'),
			btn_cont = prnt.find('.js-upload-select-container'),
			input = btn_cont.find('input.js-upload-select'),
			max_filesize = input.attr('data-max-filesize');

		var notif = function(error) {
			error = error || 'format';
			error = alert_cont.find('[data-upload-error="'+ error +'"]').html();

			alert_cont
				.removeClass('uk-hidden')
				.find('.js-alert-message')
				.html(error);

			setTimeout(function() {
				alert_cont.addClass('uk-hidden');
			}, 2500);
		}

		var loadstart = function() {
			bar.css('width', '0%');
			progressbar.removeClass('uk-hidden');
			alert_cont.addClass('uk-hidden');
			btn_cont.addClass('uk-hidden');
		}

		var notallowed = function() {
			notif();
		}

		var progress = function(percent) {
			percent = Math.ceil(percent);
			bar.css('width', percent + '%');

			if(percent >= 1)
			{
				if(percent < 100)
				{
					upload_percent
						.removeClass('uk-hidden')
						.find('span')
						.text(percent + '%');
				}
				else
				{
					upload_percent.addClass('uk-hidden');
				}
			}
		}

		var complete = function(response) {
			if(response.success)
			{
				bar.css('width', '100%');
				upload_complete.removeClass('uk-hidden');

				var src = response.name,
					fld = prnt.attr('data-clipart-field-active'),
					prnt_opt = $('.js-clipart-options[data-clipart-field="'+ fld +'"]');

				if(prnt_opt.length)
				{
					prnt_opt.find('input.js-clipart-name').val(src);
					prnt_opt.find('.js-clipart-buttons').addClass('uk-hidden');
					prnt_opt.find('.js-artwork-preview').removeClass('uk-hidden');
					prnt_opt.find('.js-artwork-preview img.js-artwork-image').attr('src', ORDER_CONFIG.artworks_url + src);

					update_total();
				}

				setTimeout(function(){
					progressbar.addClass('uk-hidden');
					btn_cont.removeClass('uk-hidden');
					upload_complete.addClass('uk-hidden');

					setTimeout(function() {
						UIkit.modal('#js-modal-upload-clipart').hide();
					}, 500);
				}, 300);
			}
			else
			{
				progressbar.addClass('uk-hidden');
				btn_cont.removeClass('uk-hidden');
				notif(response.error);
			}
		}

		var beforeSend = function(xhr) {
			if(typeof input.attr('data-filesize') !== 'undefined')
			{
				var fs = input.attr('data-filesize'),
					fs = Number(fs);

				if(fs > max_filesize)
				{
					progressbar.addClass('uk-hidden');
					upload_percent.addClass('uk-hidden');

					if(xhr)
					{
						xhr.abort();
					}

					return false;
				}
			}
		}

		var progressbar = prnt.find('.js-upload-progress'),
			bar = progressbar.find('.uk-progress-bar'),
			upload_percent = prnt.find('.js-upload-percent'),
			upload_complete = prnt.find('.js-upload-completed'),
			settings = {
				action:		SITE_URL + 'secured/order-ajax.php',
				allow:		'*.(jpg|jpeg|gif|png)',
				filelimit:	1,
				param:		'file',
				params:		{action: 'upload-artwork'},
				type:		'json',
				loadstart:	loadstart,
				notallowed:	notallowed,
				beforeSend:	beforeSend,
				progress:	progress,
				complete:	complete
			};

		if(typeof FileReader !== 'undefined' && ('FileReader' in window))
		{
			input.on('change', function(e) {
				var f = e.target.files[0];

				input.attr('data-filesize', f.size);

				if(f.size && (f.size > max_filesize))
				{
					notif('filesize');
				}
			});
		}

		UIkit.uploadSelect(input, settings);
	})();

	$(document).on('keypress keyup keydown', '.js-numeric', function(e) {
		// numeric pad
		if(e.which >= 96 && e.which <= 105)
		{
			return true;
		}

		// left/right arrow keys and delete
		if(e.which == 37 || e.which == 39 || e.which == 46)
		{
			return true;
		}

		if(e.which != 8 && e.which != 0 && e.which != 9 && e.which != 46 && (e.which < 48 || e.which > 57))
		{
			return false;
		}

		return true;
	});

	$(document).on('click', '[data-btn-slideto]', function() {
		var el = $(this),
			pos = el.attr('data-btn-slideto'),
			target = $('[data-slide-pos="'+ pos +'"]');

		$('html, body').animate({scrollTop: (target.offset().top) - 5}, 750);
	});
});