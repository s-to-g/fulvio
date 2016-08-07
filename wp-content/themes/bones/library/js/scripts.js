

jQuery(window).on('load resize',function($) {

    var viewport = updateViewportDimensions(),
    $jq = jQuery.noConflict(),
    $projectSections = $jq('.js-project__section'),
    $counterItem = $jq('.js-project__counter-item'),
    $counter = $jq('.project__counter');

    /* the fullpage scroll init */
    $jq('#fullpage').fullpage({
      afterResize: function(){
          $jq.fn.fullpage.reBuild();
      },
      afterLoad: function(slideIndex, index, slideAnchor, slideIndex) {
            $projectSections.each(function() {
            var $that = $jq(this);
            if($that.hasClass('js-no-counter') && $that.hasClass('active')) {
                $counter.hide();
            } else if($that.hasClass('active') && !$that.hasClass('.js-no-counter')) {
                $number = $that.attr('data-section');
                if($number !== $counterItem.text()) {
                    $counterItem.text($number);
                }
                $counter.show();
            }
            });
        }
        //responsiveWidth: 650
    });

    // To enable scrollOverflow when content is too big for a section
    //$jq.fn.fullpage.reBuild();
    
    function updateViewportDimensions() {
        var w=window,d=document,e=d.documentElement,g=d.getElementsByTagName('body')[0],x=w.innerWidth||e.clientWidth||g.clientWidth,y=w.innerHeight||e.clientHeight||g.clientHeight;
        return { width:x,height:y };
    }

    /* not to download second image on small screens */
    var updateImages = function() {
        viewport = updateViewportDimensions();
        if(viewport.width >= 650) {
            var imageLinks = document.getElementsByClassName("js-project-block__image-link--primary");
            for(i = 0; i < imageLinks.length; i++) {
                var linkSrc = imageLinks[i].getAttribute('data-src'),
                imgAlt = imageLinks[i].getAttribute('data-alt'),
                image;
                if(!(imageLinks[i].childNodes.length > 1)) {
                    image = document.createElement("img");
                    image.setAttribute('src', linkSrc);
                    image.setAttribute('alt', imgAlt);
                    imageLinks[i].appendChild(image);
                };
            }
        };
    };

    updateImages();

    /*
    * fix header after intro section, only on home page
    */

    var didScroll,
        introSection = $jq('.content__section--intro'),
        introSectionHeight = (introSection.innerHeight() + 5),
        body = $jq('body'),
        header = $jq('.header');

    if (body.hasClass('post-type-archive-projects')) {
        header.css('top', introSectionHeight);
        header.addClass('header--is-visible');

        $jq(window).scroll(function(event){
            didScroll = true;
        });

        setInterval(function() {
            if (didScroll) {
                fixedHeader();
                didScroll = false;
            }
        }, 50);

        function fixedHeader() {
            if (introSection.innerHeight() < $jq(window).scrollTop()) {
                body.addClass('fixed-header');
            } else {
                body.removeClass('fixed-header');
            }
        }
    }

});
