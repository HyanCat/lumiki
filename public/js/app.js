/**
 *
 * lumiki
 *
 * Created by HyanCat on 15/5/19.
 * Copyright (C) 2015 HyanCat. All rights reserved.
 */


var tokenOperation = function () {
	return {
		init: function () {
			$('.generate-token').click(function () {
				$.ajax({
					url     : '/token',
					type    : 'POST',
					dataType: 'json',
					success : function (response) {
						if (response.error == 0) {
							var token      = response.message.token;
							var id         = response.message.id;
							var tokenTable = $('#tokenTable');
							$('<tr><td>' + token + '</td><td><div class="ui mini negative button delete-button" data-id="' + id + '">删除</div> </td></tr>')
								.fadeIn().appendTo(tokenTable.find('tbody').first());
						}
					},
					error   : function (request) {

					}
				});
			});

			$('#tokenTable').on('click', '.delete-button', function () {
				var id      = $(this).attr('data-id');
				var thisRow = $(this).closest('tr');
				$.ajax({
					url     : '/token/' + id,
					type    : 'POST',
					dataType: 'json',
					data    : {
						_method: 'DELETE',
					},
					success : function (response) {
						if (response.error == 0) {
							thisRow.fadeOut('fast', function () {
								thisRow.remove();
							});
						}
					},
					error   : function (request) {

					}
				});
			});
		}
	};
}();

var userOperation = function () {
	return {
		init: function () {
			$('#userTable').on('click', '.delete-button', function () {
				var id      = $(this).attr('data-id');
				var thisRow = $(this).closest('tr');
				$.ajax({
					url     : '/user/' + id,
					type    : 'POST',
					dataType: 'json',
					data    : {
						_method: 'DELETE',
					},
					success : function (response) {
						if (response.error == 0) {
							thisRow.fadeOut('fast', function () {
								thisRow.remove();
							});
						}
					},
					error   : function (request) {

					}
				});
			});
		}
	};
}();

$(document).ready(function () {
	tokenOperation.init();
	userOperation.init();
});
//# sourceMappingURL=app.js.map