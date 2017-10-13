srAttendanceList = {
	initUserDetails: function (ajax_links) {
		$('tr.xali_user_details_row').each(function (row_index, row) {
			$(row).find('a.xali_link_save').on('click', function () {
				$(this).hide();
				$(row).find('span.xali_saving').show();
				status = 0;
				$(row).find('input[type=radio]').each(function (j, radio) {
					if ($(radio).is(':checked')) {
						status = radio.value;
					}
				});

				$.ajax({
					url: ajax_links[row_index],
					type: "GET",
					data: {
						"status": status
					}
				}).done(function () {
					$(row).find('font.xali_warning').hide();
					$(row).find('span.xali_saving').hide();
				});
			});
			$(row).find('input[type=radio]').each(function (k, radio) {
				$(radio).on('click', function () {
					$(row).find('a.xali_link_save').show();
					// $(row).find('font.xali_warning').show();
				})
			})
		});
	}
}
