$( document ).ready(function() {

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
    extension = '',
    //main playlist
    tracks = [{
        "track": 1,
        "name": "King of my castle",
        "hasAlbum": "yes",
        "imageCode": "orangeDelight",
        "albumName": "Orange delight",
        "type": "main",
        "file": "king",
    }, {
        "track": 2,
        "name": "Adieu",
        "hasAlbum": "yes",
        "imageCode": "orangeDelight",
        "albumName": "Orange delight",
        "type": "main",
        "file": "adieu"
    }, {
        "track": 3,
        "name": "Atlas Hands",
        "hasAlbum": "yes",
        "imageCode": "divide",
        "albumName": "Divide",
        "type": "main",
        "file": "atlasHands"
    }, {
        "track": 4,
        "name": "July Flame",
        "hasAlbum": "yes",
        "imageCode": "divide",
        "albumName": "Divide",
        "type": "main",
        "file": "julyFlame"
    }, {
        "track": 5,
        "name": "What i might do",
        "hasAlbum": "yes",
        "imageCode": "king",
        "albumName": "Chords & heartbreak",
        "type": "main",
        "file": "mightDo"
    }, {
        "track": 6,
        "name": "Triangle",
        "hasAlbum": "no",
        "imageCode": "king",
        "albumName": "Chords & heartbreak",
        "type": "port",
        "file": "triangle"
    }, {
        "track": 7,
        "name": "Waves",
        "hasAlbum": "no",
        "imageCode": "no",
        "albumName": " ",
        "type": "port",
        "file": "waves"
    }, {
        "track": 8,
        "name": "Younger",
        "hasAlbum": "no",
        "imageCode": "no",
        "albumName": " ",
        "type": "port",
        "file": "younger"
    }];

    //get the main playlist songs
    var mainTracks = tracks.filter(function( obj ) {return obj.type == "main";});

    //get array length from playlist
    mainTrackCount = mainTracks.length,

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
        $('.image').css("background-image", "url(audio/musicImg/"+mainTracks[index].imageCode+".jpg)");
        // album opacity change     
        $(".coverImg").css("opacity", "0.45");
        $("div:visible[id*='"+mainTracks[index].imageCode+"']").css("opacity", "1");
        $('.coverImg').removeClass("imgSelected");
        $("div:visible[id*='"+mainTracks[index].imageCode+"']").addClass("imgSelected");
        if (playing) {
            music.play();
        }
    } else {
        index = mainTrackCount-1;
        loadTrack(index);
        $('.image').css("background-image", "url(audio/musicImg/"+mainTracks[index].imageCode+".jpg)");
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

    // check if it is in the main album
    var found = false;
    for(var i = 0; i < mainTrackCount; i++) {
        if (mainTracks[i].name == tracks[index].name) {
            found = true;
            break;
        }
    }


    if (found == true) {

        //change track name
        document.getElementById('musicLabel').innerHTML = "";
        if (mainTracks[index].hasAlbum != "no") {
            document.getElementById('musicLabel').innerHTML = mainTracks[index].albumName + ": " + mainTracks[index].name;   
        }else{
            document.getElementById('musicLabel').innerHTML = mainTracks[index].name;
        }

        // album opacity change
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

    if ((index + 1) < mainTrackCount) { 
        index++;
        loadTrack(index);
        $('.image').css("background-image", "url(audio/musicImg/"+mainTracks[index].imageCode+".jpg)");
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
        loadTrack(index);
        $('.image').css("background-image", "url(audio/musicImg/"+mainTracks[index].imageCode+".jpg)");
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


    // check if it is in the main album
    var found = false;
    for(var i = 0; i < mainTrackCount; i++) {
        if (mainTracks[i].name == tracks[index].name) {
            found = true;
            break;
        }
    }

   if ((index + 1) < mainTrackCount && found == true) {
        index++;
        loadTrack(index);
        $('.image').css("background-image", "url(audio/musicImg/"+mainTracks[index].imageCode+".jpg)");

        // album opacity change
        $(".coverImg").css("opacity", "0.45");
        $("div:visible[id*='"+mainTracks[index].imageCode+"']").css("opacity", "1");
        $('.coverImg').removeClass("imgSelected");
        $("div:visible[id*='"+mainTracks[index].imageCode+"']").addClass("imgSelected");
        
        music.play();
    } else{
        music.pause();
            
            if (found == true){
                index = 0;
                $('.image').css("background-image", "url(audio/musicImg/"+mainTracks[index].imageCode+".jpg)");
                
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

    if (found == true){
        //change track name
        document.getElementById('musicLabel').innerHTML = "";
        if (mainTracks[index].hasAlbum != "no") {
            document.getElementById('musicLabel').innerHTML = mainTracks[index].albumName + ": " + mainTracks[index].name;   
        }else{
            document.getElementById('musicLabel').innerHTML = mainTracks[index].name;
        }
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
    if (music.currentTime == duration) {

    }
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

function loadTrack(id) {
    index = id;
    music.src = mediaPath + tracks[id].file + extension;
};

function playTrack(id) {
    loadTrack(id);
    music.play();
};

loadTrack(index);



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


    for(var i in mainTracks) {
        var value = mainTracks[i].imageCode;

        if (this.id == value) {
            index = parseInt(i);
            break;
        }
    }

    //change track name
    document.getElementById('musicLabel').innerHTML = "";
    if (mainTracks[index].hasAlbum != "no") {
        document.getElementById('musicLabel').innerHTML = mainTracks[index].albumName + ": " + mainTracks[index].name;   
    }else{
        document.getElementById('musicLabel').innerHTML = mainTracks[index].name;
    }

    //load & play
    loadTrack(index);
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

    for(var i in tracks) {
        var value = tracks[i].file;

        if (name == value) {
            index = parseInt(i);
            break;
        }
    }

    if (!$(".play-music-section").is(":visible")) {         
        $(".play-music-section").fadeIn(500);
        $(".album-selection").slideDown(500);
        $( ".close" ).animate({
            top: "76px"
        }, 1000);
    }


    loadTrack(index);
    play();

    //track name
    document.getElementById('musicLabel').innerHTML = "";
    if (tracks[index].hasAlbum != "no") {
        document.getElementById('musicLabel').innerHTML = tracks[index].albumName + ": " + mainTracks[index].name;   
    }else{
        document.getElementById('musicLabel').innerHTML = tracks[index].name;
    }

    //track image
    $('.image').css("background-image", "url(audio/musicImg/"+tracks[index].imageCode+".jpg)");

    //disable previous/foward buttons 
    $('#btnPrev').hide();
    $('#btnNext').hide();

   if (tracks[index].hasAlbum == "no") {
       //albuns opacity
        $(".coverImg").css("opacity", "0.45");
        $('.coverImg').removeClass("imgSelected");

   }else{
        //show previous/foward buttons 
        $('#btnPrev').show();
        $('#btnNext').show();
   }
}



});











