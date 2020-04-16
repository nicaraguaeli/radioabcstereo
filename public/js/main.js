$(document).ready(function() {
    var e = document.createElement("audio");

    e.setAttribute("src", $(".active-song").attr("data-src"));
    var a = new TimelineMax;
 


    $(".player").hasClass("play") ? ($(".player").removeClass("play"), e.pause(), TweenMax.to(".player__albumImg", .2, {
            scale: 1,
            ease: Power0.easeNone
        }), console.log("entro stop"), a.pause()) : ($(".player").addClass("play"), e.play(), TweenMax.to(".player__albumImg", .2, {
            scale: 1.1,
            ease: Power0.easeNone
        }), a.resume())
    




    a.to(".player__albumImg", 3, {
        
        repeat: -1,
        ease: Power0.easeNone
    }, "-=0.2"), a.pause(), $(".player__play").click(function() {
        $(".player").hasClass("play") ? ($(".player").removeClass("play"), e.pause(), TweenMax.to(".player__albumImg", .2, {
            scale: 1,
            ease: Power0.easeNone
        }), console.log("entro stop"), a.pause()) : ($(".player").addClass("play"), e.play(), TweenMax.to(".player__albumImg", .2, {
            scale: 1.1,
            ease: Power0.easeNone
        }), a.resume())
    });
    var t = document.getElementById("playhead");

    function s() {
        $(".player__author").text($(".active-song").attr("data-author")), $(".player__song").text($(".active-song").attr("data-song"))
    }
    e.addEventListener("timeupdate", function() {
        var e = this.duration,
            a = this.currentTime / e * 100;
        t.style.width = 4 * a + "px"
    }), s(), $(".player__next").click(function() {
        $(".player .player__albumImg.active-song").is(":last-child") ? ($(".player__albumImg.active-song").removeClass("active-song"), $(".player .player__albumImg:first-child").addClass("active-song"), e.addEventListener("timeupdate", function() {
            var e = this.duration,
                a = this.currentTime / e * 100;
            t.style.width = 4 * a + "px"
        })) : ($(".player__albumImg.active-song").removeClass("active-song").next().addClass("active-song"), e.addEventListener("timeupdate", function() {
            var e = this.duration,
                a = this.currentTime / e * 100;
            t.style.width = a + "%"
        })), s(), e.setAttribute("src", $(".active-song").attr("data-src")), e.play()
    }), $(".player__prev").click(function() {
        $(".player .player__albumImg.active-song").is(":first-child") ? ($(".player__albumImg.active-song").removeClass("active-song"), $(".player .player__albumImg:last-child").addClass("active-song"), e.addEventListener("timeupdate", function() {
            var e = this.duration,
                a = this.currentTime / e * 100;
            t.style.width = 4 * a + "px"
        })) : ($(".player__albumImg.active-song").removeClass("active-song").prev().addClass("active-song"), e.addEventListener("timeupdate", function() {
            var e = this.duration,
                a = this.currentTime / e * 100;
            t.style.width = a + "px"
        })), s(), e.setAttribute("src", $(".active-song").attr("data-src")), e.play()
    })
});