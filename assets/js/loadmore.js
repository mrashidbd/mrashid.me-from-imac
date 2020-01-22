;
(function ($) {

    $(document).ready(function () {

        $("#load-more-projects").on('click', function (e) {

            var nexturl = $(this).attr('href');
            $.get(nexturl, {}, function (data) {
                var projectList = $(data).find("#project-container").html();
                //console.log(projectList);
                $("#project-container").append(projectList);

                var newPageLink = $(data).find("#load-more-projects").attr("href");
                if (newPageLink) {
                    $("#load-more-projects").attr('href', newPageLink);
                } else {
                    $("#load-more-projects").hide('slow');
                }

            });

            return false;
        });


        var newPageLinks = $("#load-more-projects").attr("href");
        if (!newPageLinks) {
            $("#load-more-projects").hide('slow');
        }


    });



})(jQuery);
