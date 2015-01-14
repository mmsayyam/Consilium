var anchor = $('.anchor').position().left;
var trigger = $('.videos');
var numbers = 2;
for(var i = 1; i < 6; i++) {
    console.log('Item '+ i + ': ' + $('.list-' + i).position().left)
}

$('.right').click(function() {
    $('.videos').animate({
        scrollLeft: $('.list-' + numbers).position().left - 39
    }, 300);
    numbers += 1;
});

$('.left').click(function() {
    if(numbers > 0) {
        numbers -= 1;
        $('videos').animate({
            scrollLeft: $('.list-' + numbers).position().left,
        }, 300);

    }
    
})

/*if($(window).width() < 768) {
    function goLeft() {
        trigger.animate({
            scrollLeft: '-=75'
        },100, goLeft);
    }

    function goRight() {
        trigger.animate({
            scrollLeft: '+=75'
        },100, goRight);
    }

    $(".left").mousedown(goLeft).mouseup(stopScroll);
    $(".right").mousedown(goRight).mouseup(stopScroll);
}
if($(window).width() > 768) {
    function goLeft() {
        trigger.animate({
            scrollLeft: '-=150'
        },100, goLeft);
    }

    function goRight() {
        trigger.animate({
            scrollLeft: '+=150'
        },100, goRight);
    }

    $(".left").mousedown(goLeft).mouseup(stopScroll);
    $(".right").mousedown(goRight).mouseup(stopScroll);
}

function stopScroll() {
    trigger.stop();
}*/



if($(window).width() < 769) {
    $('video').removeAttr('disabled');
    $('video').attr('controls', 'controls');
    $('.overlay').css('display', 'none');
}
else {
    $('video').attr('disabled', 'disabled');
    $('video').removeAttr('controls');
    $('.overlay').css('display', 'block');

    $(".video-cont video").click(function() {
        var src = $(this).children("source").attr("src");
        var content = $(this).children("#content").attr("value");
        var title = $(this).children("#title").attr("value");
        var video = '<div><video class="embed-responsive-item" width="600px" height="400px" controls autoplay><source src="'+src+'" type="video/mp4"><source src="movie.ogg" type="video/ogg">Your browser does not support the video tag.</video></div>';
        $("#myModal").modal();
        $("#myModal").on("shown.bs.modal", function(){
            $("#myModal .modal-body").html(video);
            $("#myModal .modal-footer").html(content);
            $("#myModal .modal-header h4").html(title);
        });
        $("#myModal").on("hidden.bs.modal", function(){
            $("#myModal .modal-body").html('');
        });
    });
}