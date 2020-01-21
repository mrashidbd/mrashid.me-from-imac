//const axios = require(['axios']);



const ajaxLoadMoreProject = () => {

    const button = document.querySelector('#load-more-projects');

    if (typeof (button) != 'undefined' && button != null) {

        button.addEventListener('click', (e) => {
            e.preventDefault();

            let current_page = document.querySelector('.isotope-grid').dataset.page;
            let max_pages = document.querySelector('.isotope-grid').dataset.max;

            let params = new URLSearchParams();
            params.append('action', 'load_more_projects');
            params.append('current_page', current_page);
            params.append('max_pages', max_pages);

            axios.post('/wp-admin/admin-ajax.php', params)
                .then(res => {

                    let projectContainer = document.querySelector('.isotope-grid');

                    projectContainer.innerHTML += res.data.data;

                    let getUrl = window.location;
                    let baseUrl = getUrl.protocol + "//" + getUrl.host + "/";

                    window.history.pushState('', '', baseUrl + 'page/' + (parseInt(document.querySelector('.isotope-grid').dataset.page) + 1));

                    console.log(parseInt(document.querySelector('.isotope-grid').dataset.page));

                    document.querySelector('.isotope-grid').dataset.page++;

                    if (document.querySelector('.isotope-grid').dataset.page == document.querySelector('.isotope-grid').dataset.max) {
                        button.parentNode.removeChild(button);
                    }

                });

        });

    }

}


jQuery(document).ready(function ($) {


    ajaxLoadMoreProject();


});
