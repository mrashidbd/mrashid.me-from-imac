//$queryUrl =   https://www.behance.net/v2/users/mamunurbd?api_key=wxz4mUjYYscNDaiVXOsNLna6JjCsjw0i



// <div class="col-md-6 isotope-single apps">
// <div class="project" style="background-image: url();">
// <div class="desc">
// <div class="con">
// <h3></h3>
// <span></span>
// <p class="icon">
// <span><i class="icon-share3"></i></span>
// <span><i class="icon-eye"></i></span>
// <span><i class="icon-heart"></i></span>
// </p>
// </div>
// </div>
// </div>
// </div>



//http://www.behance.net/v2/users/mamunurbd/projects?api_key=wxz4mUjYYscNDaiVXOsNLna6JjCsjw0i



var apiURI = '//www.behance.net/v2/users/';
var apiUserID = 'mamunurbd';
var apiLinker = '/projects?api_key=';
var apiSkey = 'wxz4mUjYYscNDaiVXOsNLna6JjCsjw0i';


var queryUrl = apiURI + apiUserID + apiLinker + apiSkey;


$(document).ready(function() {

    $.getJSON(queryUrl, function (data) {
        var project_str = "";
        for (i = 0; i < data.projects.length; i++) {
            obj = {};
            obj = data.projects[i];

            project_str += '<a class="tips more-info link" data-placement="bottom" href=" ' + obj.url + '  "><div class="span3 portfolioitem"><img src="' + obj.covers['404'] + '" /><div class="portfolioitem-hoverinfo"><h3>' + obj.name + '</h3></div></div></a>';

        }

        $('#portfolio-items').append(project_str);
    });
});