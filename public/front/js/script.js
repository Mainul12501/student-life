// home page isotope scripts starts
// Note: to view all images on first page load this code will work
// $('.isotop-box').isotope({
//     itemSelector : '.item',
//     layoutMode: 'fitRows',
//     stagger: 30,
//     // resize:true
// });
// Note: to hide all images and view selected images, use this code
$(document).ready(function() {
    var selector = $('.group .btn').attr("data-filter");
    $(".isotop-box").isotope({
        itemSelector : '.item',
        layoutMode: 'fitRows',
        stagger: 30,
        filter : selector
        });
})
$('.group .btn').click(function() {
    $('.group .btn').removeClass('active');
    $(this).addClass('active');

    var selector = $(this).attr("data-filter");
    $(".isotop-box").isotope({
    filter : selector
    });
    return false ;
});

// home page isotope scripts ends
// magnificPopup lightbox script starts
$(document).ready(function() {
    $('.popup').magnificPopup({
        type: 'image',
        // other options
        closeOnContentClick: true,
		closeBtnInside: false,
		fixedContentPos: true,
		mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
		image: {
			verticalFit: true
		},
		zoom: {
			enabled: true,
			duration: 300 // don't foget to change the duration also in CSS
		},
        gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
      });

})
// magnificPopup lightbox script ends
// home page owl carousal
$(document).ready(function() {
    $('.owl-carousel').owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayHoverPause:true,
        autoplayTimeout:1000,
        mouseDrag: true,
        touchDrag: true,
        dots: false,
        nav:true,
        responsiveClass:true,
        responsive: {
            1000: {
                item: 4
            },
            770: {
                item: 3
            },
            425: {
                item: 2
            }
        }
    });
})
// home page owl carousal ends

// user info page custom scripts
$('#broYes').click(function() {
    $('.bro-sis-name').removeClass('hidden');
    $('#broNameField').removeClass('hidden');
});
$('#sisYes').click(function() {
    $('.bro-sis-name').removeClass('hidden');
    $('#sisNameField').removeClass('hidden');
});
$('#broNo').click(function() {
    $('#broNameField').addClass('hidden');
});
$('#sisNo').click(function() {
    $('#sisNameField').addClass('hidden');
});
//  remove disabled attr on edit button click
$('#disableInputs').click(function() {
    $('#disableInputs').css('display', 'none');
    $('#closeBtn').css('display', 'block');
    $('.show-me').removeClass('hide-me');

    // start again
    $('#userDisplaySec').css('display', 'none');
    $('#userInfoSec').css('display', 'block');
});
$(document).ready(function() {

    $('#userInfoSec form #userInfoSaveBtn').css('display', 'none');
    $('#closeBtn').css('display', 'none');
    // font size change
    $('#userDisplaySec label').css('font-size', '19px');
    $('#userDisplaySec span').css('font-size', '20px');
    $('#userInfoSec').css('display', 'none');
})
$('#closeBtn').click(function() {
    $('#disableInputs').css('display', 'block');
    $('#closeBtn').css('display', 'none');
    $('.show-me').addClass('hide-me');

    // start again
    $('#userDisplaySec').css('display', 'block');
    $('#userInfoSec').css('display', 'none');
})

// comment box
$('#commentBox').click(function() {
    $('#savbutton').css('display', 'block');
    $('#commentBox').css('display', 'none');
})
$('#cancelComment').click(function() {
    event.preventDefault();
    $('#savbutton').css('display', 'none');
    $('#commentInput').val('');
    $('#commentBox').css('display', 'block');
})
$('#commentBox').keyup(function () {
    var v = $('#commentInput').val();
    if (v != null)
    {
        $('#saveComment').removeAttr('disabled');
    }
    if (v === '')
    {
        // alert('hi');
        $('#saveComment').attr('disabled', 'true');
    }
});
$('#saveComment').click(function () {
    if (!$('#saveComment').attr('disabled', 'true'))
    {
        $('#savbutton').css('display', 'none');
        $('#commentBox').css('display', 'black');
    }
});
