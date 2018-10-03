var tracks; // full playlist
var mainTracks; //main playlist

//playlist Data call
(function playListCall(){
    $.ajax({
    url:"playercollection.php",
    type: "POST",
    success:function(response) {
        tracks = JSON.parse(response);
        console.log(tracks);
        //get the main playlist songs
        mainTracks = tracks.filter(function( obj ) {return obj.type == "main";});
        console.log(mainTracks);
    }
 });
})();

// callback function to check if tracks are ready
function whenAvailable(name, callback) {
    var interval = 10; // ms
    window.setTimeout(function() {
        if (window[name]) {
            callback(window[name]);
        } else {
            window.setTimeout(arguments.callee, interval);
        }
    }, interval);
}



$( document ).ready(function() {

whenAvailable("tracks", function(t) {

    var music = document.getElementById('music'); // id for audio element
    var duration = music.duration; // Duration of audio clip, calculated here for embedding purposes
    var playButton = document.getElementById('playButton'); // play button
    var prevButton = document.getElementById('btnPrev'); // previous button
    var nextButton = document.getElementById('btnNext'); // foward button
    var playhead = document.getElementById('playhead'); // playhead
    var timeline = document.getElementById('timelineFrame'); // timeline
    var timelineFrame = document.getElementById('timeline'); // timeline frame
    var volume = document.getElementById('mute');   // mute
    var supportsAudio = document.createElement('audio').canPlayType;
 

    var index = 0,
        playing = false,
        mediaPath = 'audio/',
        extension = '';



    // audio set / extension set
    audio = $('#music').bind('play', function () {playing=true;}).bind('pause', function () {playing=false;}).get(0);
    extension = audio.canPlayType('audio/mpeg') ? '.mp3' : audio.canPlayType('audio/ogg') ? '.ogg' : '';


    ///////////CONTROLS


    // play/foward/previous button event listenter
    playButton.addEventListener("click", play);
    prevButton.addEventListener("click", previous);
    nextButton.addEventListener("click", foward);


    //PREVIOUS BUTTON
    function previous(){

        if ((index - 1) > -1) {
            index--;
            loadTrack(index);
            $('.image').css("background-image", "url(audioImg/"+mainTracks[index].imageFullCode+")");
            // album opacity change     
            $(".coverImg").css("opacity", "0.45");
            $("div:visible[id*='"+mainTracks[index].imageCode+"']").css("opacity", "1");
            $('.coverImg').removeClass("imgSelected");
            $("div:visible[id*='"+mainTracks[index].imageCode+"']").addClass("imgSelected");
            if (playing) {
                music.play();
            }
        } else {
            index = mainTracks.length-1;
            loadTrack(index);
            $('.image').css("background-image", "url(audioImg/"+mainTracks[index].imageFullCode+")");
            // album opacity change        
            $(".coverImg").css("opacity", "0.45");
            $("div:visible[id*='"+mainTracks[index].imageCode+"']").css("opacity", "1");
            $('.coverImg').removeClass("imgSelected");
            $("div:visible[id*='"+mainTracks[index].imageCode+"']").addClass("imgSelected");
            if (playing) {
                music.play();
            }
        }

        //change track name
        document.getElementById('musicLabel').innerHTML = "";
        if (mainTracks[index].hasAlbum != "no") {
            document.getElementById('musicLabel').innerHTML = mainTracks[index].albumName + ": " + mainTracks[index].name;   
        }else{
            document.getElementById('musicLabel').innerHTML = mainTracks[index].name;
        }
    }

    //PLAY & PAUSE
    function play() {


        if (!supportsAudio) {
            $(".errorMessage").show();
        }


        // album opacity change
        if ($('#btnPrev').is(':visible')) {

            //change track name
            document.getElementById('musicLabel').innerHTML = "";
            document.getElementById('musicLabel').innerHTML = mainTracks[index].albumName + ": " + mainTracks[index].name;
            // set the right image
            $('.image').css("background-image", "url(audioImg/"+mainTracks[index].imageFullCode+")");   


            $(".coverImg").css("opacity", "0.45");
            $("div:visible[id*='"+mainTracks[index].imageCode+"']").css("opacity", "1");
            $('.coverImg').removeClass("imgSelected");
            $("div:visible[id*='"+mainTracks[index].imageCode+"']").addClass("imgSelected");
        }




        // start music
        if (music.paused) {
                music.play();
                // remove play, add pause
                document.getElementById('playButton').innerHTML = "";
                document.getElementById('playButton').innerHTML = "II";
        } else { // pause music
                music.pause();
                // remove pause, add play
                document.getElementById('playButton').innerHTML = "";
                document.getElementById('playButton').innerHTML = "<i class=\"fas fa-caret-right\"></i>";
        }

    }



    //FOWARD BUTTON
    function foward(){

        if ((index + 1) < mainTracks.length) { 
            index++;
            loadMainTrack(index);
            $('.image').css("background-image", "url(audioImg/"+mainTracks[index].imageFullCode+")");
            // album opacity change
            $(".coverImg").css("opacity", "0.45");
            $("div:visible[id*='"+mainTracks[index].imageCode+"']").css("opacity", "1");
            $('.coverImg').removeClass("imgSelected");
            $("div:visible[id*='"+mainTracks[index].imageCode+"']").addClass("imgSelected");
            
            if (playing) {
                music.play();
            }
        } else {
            index = 0;
            loadMainTrack(index);
            $('.image').css("background-image", "url(audioImg/"+mainTracks[index].imageFullCode+")");
            // album opacity change
            $(".coverImg").css("opacity", "0.45");
            $("div:visible[id*='"+mainTracks[index].imageCode+"']").css("opacity", "1");
            $('.coverImg').removeClass("imgSelected");
            $("div:visible[id*='"+mainTracks[index].imageCode+"']").addClass("imgSelected");
            // remove play, add pause
            document.getElementById('playButton').innerHTML = "";
            document.getElementById('playButton').innerHTML = "II";
            if (playing) {
                music.play();
            }
        }

        //change track name
        document.getElementById('musicLabel').innerHTML = "";
        if (mainTracks[index].hasAlbum != "no") {
            document.getElementById('musicLabel').innerHTML = mainTracks[index].albumName + ": " + mainTracks[index].name;   
        }else{
            document.getElementById('musicLabel').innerHTML = mainTracks[index].name;
        }
    }


    //MUSIC FINISHED
    music.addEventListener('ended', function() {


       if ((index + 1) < mainTracks.length && $('#btnPrev').is(':visible')) {
            index++;
            loadMainTrack(index);

            //change image
            $('.image').css("background-image", "url(audioImg/"+mainTracks[index].imageFullCode+")");

            //change track name
            document.getElementById('musicLabel').innerHTML = "";
            document.getElementById('musicLabel').innerHTML = mainTracks[index].albumName + ": " + mainTracks[index].name; 

            // album opacity change
            $(".coverImg").css("opacity", "0.45");
            $("div:visible[id*='"+mainTracks[index].imageCode+"']").css("opacity", "1");
            $('.coverImg').removeClass("imgSelected");
            $("div:visible[id*='"+mainTracks[index].imageCode+"']").addClass("imgSelected");
            
            music.play();
        } else{
            music.pause();
                
                if ($('#btnPrev').is(':visible')){
                    index = 0;
                    //change image
                    $('.image').css("background-image", "url(audioImg/"+mainTracks[index].imageFullCode+")");

                    //change track name
                    document.getElementById('musicLabel').innerHTML = "";
                    document.getElementById('musicLabel').innerHTML = mainTracks[index].albumName + ": " + mainTracks[index].name; 

                    // album opacity change
                    $(".coverImg").css("opacity", "0.45");
                    $("div:visible[id*='"+mainTracks[index].imageCode+"']").css("opacity", "1");
                    $('.coverImg').removeClass("imgSelected");
                    $("div:visible[id*='"+mainTracks[index].imageCode+"']").addClass("imgSelected");
                }

            loadTrack(index);

            document.getElementById('playButton').innerHTML = ""
            document.getElementById('playButton').innerHTML = "<i class=\"fas fa-caret-right\"></i>"
        }

    }, false);


    //MUTE SOUND
    volume.addEventListener("click", function(event) {

        if (document.getElementById('mute').innerHTML == "<i class=\"fa fa-volume-off\" aria-hidden=\"true\"></i>") {
            document.getElementById('music').muted = false;
            document.getElementById('mute').innerHTML = ""
            document.getElementById('mute').innerHTML = "<i class=\"fa fa-volume-up\" aria-hidden=\"true\"></i>"
        }else{
            document.getElementById('music').muted = true;
            document.getElementById('mute').innerHTML = ""
            document.getElementById('mute').innerHTML = "<i class=\"fa fa-volume-off\" aria-hidden=\"true\"></i>"
        }

    }, false);



    ///////////TIMELINE



    // timeupdate event listener
    music.addEventListener("timeupdate", timeUpdate, false);

    // makes timeline clickable
    timeline.addEventListener("click", function(event) {
        moveplayhead(event);
        music.currentTime = duration * clickPercent(event);
    }, false);

    // returns click as decimal (.77) of the total timelineWidth
    function clickPercent(event) {
        return (event.clientX - getPosition(timeline)) / (timeline.offsetWidth - playhead.offsetWidth);

    }

    // makes playhead draggable
    playhead.addEventListener('mousedown', mouseDown, false);
    window.addEventListener('mouseup', mouseUp, false);

    // Boolean value so that audio position is updated only when the playhead is released
    var onplayhead = false;

    // mouseDown EventListener
    function mouseDown() {
        onplayhead = true;
        window.addEventListener('mousemove', moveplayhead, true);
        music.removeEventListener('timeupdate', timeUpdate, false);
    }

    // mouseUp EventListener
    // getting input from all mouse clicks
    function mouseUp(event) {
        if (onplayhead == true) {
            moveplayhead(event);
            window.removeEventListener('mousemove', moveplayhead, true);
            // change current time
            music.currentTime = duration * clickPercent(event);
            music.addEventListener('timeupdate', timeUpdate, false);
        }
        onplayhead = false;
    }
    // mousemove EventListener
    // Moves playhead as user drags
    function moveplayhead(event) {
        var newMargLeft = event.clientX - getPosition(timeline);

        if (newMargLeft >= 0 && newMargLeft <= (timeline.offsetWidth - playhead.offsetWidth)) {
            playhead.style.marginLeft = newMargLeft + "px";
        }
        if (newMargLeft < 0) {
            playhead.style.marginLeft = "0px";
        }
        if (newMargLeft > (timeline.offsetWidth - playhead.offsetWidth)) {
            playhead.style.marginLeft = (timeline.offsetWidth - playhead.offsetWidth) + "px";
        }
    }

    // timeUpdate
    // Synchronizes playhead position with current point in audio
    function timeUpdate() {
        var playPercent = (timeline.offsetWidth - playhead.offsetWidth) * (music.currentTime / duration);
        playhead.style.marginLeft = playPercent + "px";
        timelineFrame.style.width = playPercent + "px";
    }

    // Gets audio file duration
    music.addEventListener("canplaythrough", function() {
        duration = music.duration;
    }, false);


    // getPosition
    // Returns elements left position relative to top-left of viewport
    function getPosition(el) {
        return el.getBoundingClientRect().left;
    }

    function loadMainTrack(id) {
        id = index;
        music.src = mediaPath + mainTracks[id].file + extension;
    };

    function loadTrack(id) {
        id = index;
        music.src = mediaPath + tracks[id].file + extension;
    };


    loadMainTrack(index);



    // --------------------------------------------------------------------- //



    // ALBUM ROTATION FUNCTIONALITY

    $('.coverImg').click(function(){

        //disable buttons 
       $('#btnPrev').fadeIn(500);
       $('#btnNext').fadeIn(500);

        // album opacity change
        $('.coverImg').css("opacity", "0.45");
        $('.coverImg p').hide();
        $('.coverImg').removeClass("imgSelected");
        $(this).addClass("imgSelected");
        $(this).css("opacity", "1");

        var url = $(this).css('background-image');
        url = url.replace('url(','').replace(')','').replace(/\"/gi, "");
        $('.image').css("background-image", "url("+url+")");

        var found_tracks = false;
        for(var i in mainTracks) {
            var value = mainTracks[i].imageCode;

            if (this.id == value) {
                found_tracks = true;
                index = parseInt(i);
                break;
            }
        }

        if (!found_tracks) {
            index = 0;
            document.getElementById('musicLabel').innerHTML = "";
            music.pause();
            music.currentTime = 0;
            // remove pause, add play
            document.getElementById('playButton').innerHTML = ""
            document.getElementById('playButton').innerHTML = "<i class=\"fas fa-caret-right\"></i>"
            return;
        }

        //change track name
        document.getElementById('musicLabel').innerHTML = "";
        document.getElementById('musicLabel').innerHTML = mainTracks[index].albumName + ": " + mainTracks[index].name;   


        //load & play
        loadMainTrack(index);
        music.play(); 

        // remove play, add pause
        document.getElementById('playButton').innerHTML = "";
        document.getElementById('playButton').innerHTML = "II";
    });



    // KEYBOARD FUNCTIONALITY

    window.onkeydown = function(e){
        if(e.keyCode === 32 && $(".play-music-section").is(":visible")){
            e.preventDefault();
            if (music.paused) {
                music.play();
                // remove play, add pause
                document.getElementById('playButton').innerHTML = "";
                document.getElementById('playButton').innerHTML = "II";
            }else{
                music.pause();
                // remove pause, add play
                document.getElementById('playButton').innerHTML = "";
                document.getElementById('playButton').innerHTML = "<i class=\"fas fa-caret-right\"></i>";
            }
        }

        if(e.keyCode === 37 && $(".play-music-section").is(":visible")){
            previous();
            //enable buttons 
            $('#btnPrev').show();
            $('#btnNext').show();
        }

        if (e.keyCode === 39 && $(".play-music-section").is(":visible")) {
            foward();
            //enable buttons 
            $('#btnPrev').show();
            $('#btnNext').show();
        }
    }


    //PORTFOLIO FUNCTIONALITY

    $(".project-know-more span").click(function(){
        var songName = $(this).attr("id");
        playSoundtrack(songName);
        $(".fa-play").hide();   
        $(".right-bar .fa-times").fadeIn(500); 
        width<740 ? $(".right-bar .mobile-album-btn").fadeIn(500) : null;
        width<740 ? $('.main-content').hide() : null; 
    });


    $("#myBtn").click(function(){
        music.pause();
        // remove pause, add play
        document.getElementById('playButton').innerHTML = "";
        document.getElementById('playButton').innerHTML = "<i class=\"fas fa-caret-right\"></i>";
    });


    function playSoundtrack(name){

        // Search track
        for(var i in tracks) {
            var value = tracks[i].file;
            if (name == value) {
                index = parseInt(i);
                break;
            }
        }

        document.getElementById('musicLabel').innerHTML = "";


        if (tracks[index].hasAlbum != "no") {

            // Search mainTrack
            for(var i in mainTracks) {
                var value = mainTracks[i].file;
                if (name == value) {
                    index = parseInt(i);
                    break;
                }
            }
            //track album name + name
            document.getElementById('musicLabel').innerHTML = mainTracks[index].albumName + ": " + mainTracks[index].name; 

            //track image
            $('.image').css("background-image", "url(audioImg/"+mainTracks[index].imageFullCode+")");


            //enable previous/foward buttons 
            $('#btnPrev').show();
            $('#btnNext').show();

            loadMainTrack(index);
            play();  
        
        }else{

            //track name
            document.getElementById('musicLabel').innerHTML = tracks[index].name;

            //track image
            $('.image').css("background-image", "url(audioImg/"+ tracks[index].imageFullCode+")");

            //disable previous/foward buttons 
            $('#btnPrev').hide();
            $('#btnNext').hide();

            //albuns opacity
            $(".coverImg").css("opacity", "0.45");
            $('.coverImg').removeClass("imgSelected");

            loadTrack(index);
            play();
        }


        if (!$(".play-music-section").is(":visible")) {         
            $(".play-music-section").fadeIn(500);
            $(".album-selection").slideDown(500);
            $( ".close" ).animate({
                top: "76px"
            }, 1000);
        }



    }


});


});












