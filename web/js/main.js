var navbar_initialized = false;

jQuery(document).ready(function() {
    jQuery('.btn-modal').on('click', mbd.modalDisplay);

    jQuery('#app-form').on('beforeSubmit', mbd.modalSubmit);

    window_width = jQuery(window).width();

    lbd.checkSidebarImage();

    if(window_width <= 991){
        lbd.initRightMenu();
    }
});

jQuery(window).resize(function(){
    if(jQuery(window).width() <= 991){
        lbd.initRightMenu();
    }
});

mbd = {
    modalClass: '.modal',
    modalBody: '.modal-body',
    modalHeaderClass: '.modal-header-content',
    modalHeaderTitle: 'Window',
    pjaxContainer: '#app-pjax-container',
    modalDisplay: function(e) {
        var href = jQuery(this).attr('href');

        jQuery(mbd.modalHeaderClass).text(mbd.modalHeaderTitle);
        jQuery(mbd.modalClass).modal('show').find(mbd.modalBody).load(href);

        return false;
    },
    modalClose: function(e) {
        jQuery(mbd.modalClass).modal('hide');
    },
    modalSubmit: function(e) {
        var form = jQuery(this);

        jQuery.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            success: function(r) {
                mbd.modalClose();

                if (r.result == 'success') {
                    mbd.pjaxReload();
                }
            },
        });

        return false;
    },
    pjaxReload: function() {
        jQuery.pjax.reload({ container: mbd.pjaxContainer });
    },
};

lbd = {
    misc:{
        navbar_menu_visible: 0
    },

    checkSidebarImage: function(){
        $sidebar = jQuery('.sidebar');
        image_src = $sidebar.data('image');

        if(image_src !== undefined){
            sidebar_container = '<div class="sidebar-background" style="background-image: url(' + image_src + ') "/>'
            $sidebar.append(sidebar_container);
        }
    },
    initRightMenu: function(){
         if(!navbar_initialized){
            $navbar = jQuery('nav').find('.navbar-collapse').first().clone(true);

            $sidebar = jQuery('.sidebar');
            sidebar_color = $sidebar.data('color');

            $logo = $sidebar.find('.logo').first();
            logo_content = $logo[0].outerHTML;

            ul_content = '';

            $navbar.attr('data-color',sidebar_color);

            //add the content from the regular header to the right menu
            $navbar.children('ul').each(function(){
                content_buff = jQuery(this).html();
                ul_content = ul_content + content_buff;
            });

            // add the content from the sidebar to the right menu
            content_buff = $sidebar.find('.nav').html();
            ul_content = ul_content + content_buff;


            ul_content = '<div class="sidebar-wrapper">' +
                            '<ul class="nav navbar-nav">' +
                                ul_content +
                            '</ul>' +
                          '</div>';

            navbar_content = logo_content + ul_content;

            $navbar.html(navbar_content);

            jQuery('body').append($navbar);

            background_image = $sidebar.data('image');
            if(background_image != undefined){
                $navbar.css('background',"url('" + background_image + "')")
                       .removeAttr('data-nav-image')
                       .addClass('has-image');
            }


             $toggle = jQuery('.navbar-toggle');

             $navbar.find('a').removeClass('btn btn-round btn-default');
             $navbar.find('button').removeClass('btn-round btn-fill btn-info btn-primary btn-success btn-danger btn-warning btn-neutral');
             $navbar.find('button').addClass('btn-simple btn-block');

             $toggle.click(function (){
                if(lbd.misc.navbar_menu_visible == 1) {
                    jQuery('html').removeClass('nav-open');
                    lbd.misc.navbar_menu_visible = 0;
                    jQuery('#bodyClick').remove();
                     setTimeout(function(){
                        $toggle.removeClass('toggled');
                     }, 400);

                } else {
                    setTimeout(function(){
                        $toggle.addClass('toggled');
                    }, 430);

                    div = '<div id="bodyClick"></div>';
                    jQuery(div).appendTo("body").click(function() {
                        jQuery('html').removeClass('nav-open');
                        lbd.misc.navbar_menu_visible = 0;
                        jQuery('#bodyClick').remove();
                         setTimeout(function(){
                            $toggle.removeClass('toggled');
                         }, 400);
                    });

                    jQuery('html').addClass('nav-open');
                    lbd.misc.navbar_menu_visible = 1;

                }
            });
            navbar_initialized = true;
        }

    }
}