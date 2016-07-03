

jQuery(window).on('load resize',function($) {

    var viewport = updateViewportDimensions(),
    $jq = jQuery.noConflict(),
    //$projectSections = document.getElementsByClassName('js-project__section');
    $projectSections = $jq('.js-project__section'),
    $counterItem = $jq('.js-project__counter-item'),
    $counter = $jq('.project__counter');

    /* the fullpage scroll init */
    $jq('#fullpage').fullpage({
      scrollOverflow:true,
      afterLoad: function(slideIndex, index, slideAnchor, slideIndex) {
            $projectSections.each(function() {
            var $that = $jq(this);
            console.log($that);
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
    });
    
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
                image;
                if(!(imageLinks[i].childNodes.length > 1)) {
                    console.log("har inga barn");
                    image = document.createElement("img");
                    image.setAttribute('src', linkSrc);
                    imageLinks[i].appendChild(image);
                };
            }
        };
    };

    updateImages();

});

    jQuery(window).on('scroll', function() {
        console.log("scroll");
    });
