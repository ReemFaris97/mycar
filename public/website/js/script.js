$(document).ready(function () {

    /*Start Input Image*/
    // ADD IMAGE
    $('.image-uploader').change(function (event) {
        $(this).parents('.images-upload-block').append('<div class="uploaded-block"><img src="' + URL.createObjectURL(event.target.files[0]) + '"><button class="close">&times;</button></div>');
    });

    // REMOVE IMAGE
    $('.images-upload-block').on('click', '.close', function () {
        $(this).parents('.uploaded-block').remove();
    });
    /*End Input Image*/

    /// loading website

    jQuery(window).load(function () {
        $(".loader").fadeOut(500, function () {
            $(".loading").fadeOut(500);
            //            $(".loading img").slideUp(1000);
            $("body").css("overflow-y", "auto");
        });
    });

    /* Start Smooth Scroll */
    $('.navbar a').click(function (e) {
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top
        }, 1000);
        e.preventDefault();
    });
    /* End Smooth Scroll */

    /// navbar button
    $('#nav-icon1').click(function () {
        $(this).toggleClass('open');
        $(".navy").toggleClass("back-nav");
        $(".body-overlay").toggleClass("back");
        $("body").toggleClass("body-over");
    });

    $(".body-overlay").click(function () {
        $(this).toggleClass("back");
        $('#nav-icon1').toggleClass('open');
        $(".navy").toggleClass("back-nav");
        $("body").toggleClass("body-over");
    });


    ////////////// chat modal/////////////////////////////////////////////////////////////////////////////////////////
    $('#seven').click(function () {
        //////////////////// textarea focus //////////////////////////////////////
        $('#inbox').focus();
        var buttonId = $(this).attr('id');
        $('#modal-container').removeAttr('class').addClass(buttonId);
        $('body').addClass('modal-active');
        $('#chats').scrollTop($('#chats')[0].scrollHeight);
    });

    $('.closeit').click(function () {
        $('#modal-container').addClass('out');
        $('body').removeClass('modal-active');
    });


    ///////////////////// enter submit /////////////
    $('#inbox').keydown(function () {
        $('#chats').scrollTop($('#chats')[0].scrollHeight);

        var message = $("textarea").val();
        function isEmptyOrSpaces(str){
            return str === null || str.match(/^ *$/) !== null;
        }
        if (event.keyCode == 13) {
            if(isEmptyOrSpaces(message)){
                alert("Enter Some Text In Textarea");
            } else {

                var msgSend = $(".chat1.send").val();
                $(".chats").append('<div class="chat1 send"><div class="chat-img"><img src="img/1.png"></div><div class="chat-body"><p class="newmsg">' + message + '</p></div></div>');
                //      $(".newmsg").text();
                //      $('#my_form').submit();
                //      alert("Your message is sent succesfully:- " );
            }
            $("textarea").val('');
            $('#chats').scrollTop($('#chats')[0].scrollHeight);
            return false;
            $('#inbox').focus();

        }
    });

    $('#sendnow').click(function () {
        $('#inbox').focus();
        var message = $("textarea").val();
        function isEmptyOrSpaces(str){
            return str === null || str.match(/^ *$/) !== null;
        }
        if(isEmptyOrSpaces(message)){
            alert("Enter Some Text In Textarea");

        } else {

            var msgSend = $(".chat1.send").val();
            $(".chats").append('<div class="chat1 send"><div class="chat-img"><img src="img/1.png"></div><div class="chat-body"><p class="newmsg">' + message + '</p></div></div>');
            //                $(".newmsg").text();

            //                $('#my_form').submit();
            //                alert("Your message is sent succesfully:- " );
        }
        $("textarea").val('');

        //                var len = $('#chats').height();
        //                console.log(len);
        //               $('#chats').scrollTop(len * 1000);

        $('#chats').scrollTop($('#chats')[0].scrollHeight);

        return false;
    });

    //////////// Append Chat .///////////////////////

    ///////////////////////////////////////////

    //////////////////////////////// call modal ///////////////////////////////////////////////////////////////
    $('#two').click(function () {
        var buttonId = $(this).attr('id');
        $('#modal-call').removeAttr('class').addClass(buttonId);
        $('body').addClass('modal-active');
    });

    $('.closeit').click(function () {
        $('#modal-call').addClass('out');
        $('body').removeClass('modal-active');
    });


    /**
     * Set timer countdown in seconds with callback
     */
    $("#two").click(function () {
        $('#countdown-1').timeTo(120, function () {
            alert('Countdown finished');
        });
        $('#reset-1').click(function () {
            $('#countdown-1').timeTo('reset');
        });
        

    });


    /*********************************************** like and dislike *************************/

    $(".like").click(function () {
        $(this).toggleClass("animated bounceIn orange");
        $(".dislike").removeClass("animated fadeOutDown orange");
    });

    $(".dislike").on("click", function () {
        $(this).toggleClass("animated fadeOutDown orange").one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass("animated fadeOutDown");
        });
        $(".like").removeClass("animated bounceIn orange");
    });



    //////////////////////////////// Suggest modal ///////////////////////////////////////////////////////////////
    $('.new-evl').click(function () {

        $(this).closest(".sgst-btns").append('<div id="myModal" class="modal fade suggest-mdl" role="dialog"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button><h4 class="modal-title">اضافة اقتراح</h4></div><form><div class="form-group"><textarea rows="4" cols="95" id="inbox" class="form-control input-lg" data-fv-field="inbox" placeholder="اكتب اقتراحك..."></textarea></div><div class="modal-footer"><button type="submit" data-dismiss="modal">ارسال</button></div></form></div></div></div>');

    });


    ///////////////////////////////// Sign Modal //////////////////////////////////////
    $(".verfy").slideUp();
    $("#step2").on("click", function () {
        $(".step1").slideUp(500);
        $(".verfy").slideDown(500);
    });

    $("#edit-1").on("click", function () {
        $(".verfy").slideUp(500);
        $(".step1").slideDown(500);
    });

    $("#step2").click(function () {
        $('#countdown-1').timeTo(120, function () {
            alert('Countdown finished');
        });
        $('#reset-1').click(function () {
            $('#countdown-1').timeTo('reset');
        });

    });


    
    //////////////////////////////
    'use strict';

    var scrollButton,
        i,
        atr;

    scrollButton = $("#scroll-top");

    $(window).scroll(function () {
        if ($(this).scrollTop() >= 500) {
            scrollButton.show();
        } else {
            scrollButton.hide();
        }
    });


    $("#scroll-top").click(function () {
        $("html,body").animate({
            scrollTop: 0
        }, 600);
    });


    /************************ Counter *****************************/
            var countDownDate = new Date("Jan 5, 2021 15:37:25").getTime();
    var x = setInterval(function () {
        var now = new Date().getTime();
        var distance = countDownDate - now;
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);


        document.getElementById("demo").innerHTML = hours + "h:" +
            minutes + "m:" + seconds + "s";


        if (distance < 0) {
            clearInterval(x);
            document.getElementById("demo").innerHTML = "EXPIRED";
        }
    }, 1000);
    
    
    


});
