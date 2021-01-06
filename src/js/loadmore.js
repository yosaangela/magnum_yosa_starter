(function ($) {
	var page = 2;
	$("body").on("click", ".loadmore", function () {
		var data = {
			action: "load_posts_by_ajax",
			page: page,
			security: blog.security,
		};

		$.post(blog.ajaxurl, data, function (response) {
			if ($.trim(response) != "") {
				$(".my-posts").append(response);
				page++;
			} else {
				$(".loadmore").replaceWith("<center>Niets meer te laden</center>");
			}
		});
	});
})(jQuery);
