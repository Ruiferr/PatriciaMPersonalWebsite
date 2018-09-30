var width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
var height = (window.innerHeight > 0) ? window.innerHeight : screen.height;
var loaded = false;
// PRELOADER AND SOCIAL FEED LOAD



(function(){function id(v){ return document.getElementById(v); }


  function loadbar() {
    var ovrl = id("overlay"),
        prog = id("progress"),
        stat = id("progstat"),
        img = document.images,
        c = 0,
        tot = img.length;

    if(tot == 0) return true;

    function imgLoaded(){
      c += 1;
      var perc = ((100/tot*c) << 0) +"%";
      //prog.style.width = perc;
      loaderMove();
      stat.innerHTML = "Patricia Melvill "; //+ perc;
      if(c===tot) return true;
    }

    function loaderMove() {
    var width = 1;
    var id = setInterval(frame, 50);

      function frame() {
          if(loaded){return true};
          if (width == 50) {
              prog.style.width = 0;
              clearInterval(id);
              loaderMove();
          } else {
              width++; 
              prog.style.width = width + '%'; 
          }
      }
      
    }

    // SOCIAL TRIGGER


    window.fbAsyncInit = function() {

        FB.init({
          appId      : '1710638195658608',
          cookie     : true,
          xfbml      : true,
          version    : 'v3.0'
        });

        FB.api('me/posts?fields=message,full_picture,created_time,link', {
              access_token: "EAAYT0P39z3ABAExQZBbZArknVVWaUFyGumCMeIn77rBcTldAnIWjIealZB1R3zoRqW3EZAB7hSyEwl2ypt5ZBE1PaPSccUsbRtUeJc1MW2hrTOSyYaOUYIjgROt13QuPOZCgfB76ieBzn4CHwekw4FGcqmB5s1is4HnaszzzKmZAwZDZD"
            }, function(response) {

              if (response && !response.error && width>1024){
                buildFeed(response, 3, 16);
              }else if(response && !response.error && width<=1024 && width>740){
                buildFeed(response, 1, 12);
              }else if(response && !response.error && width<=740){
                buildFeed(response, 0, 8);
              };
              return doneLoading(); 
          });   
    };  


    // SOCIAL TRIGGER

    function doneLoading(){
      ovrl.style.opacity = 0;
      setTimeout(function(){ 
        ovrl.style.display = "none";
      }, 1200);
      setTimeout(function(){ 
        loaded = true;
      }, 1000);
      
    }

    for(var i=0; i<tot; i++) {
      var tImg     = new Image();
      tImg.onload  = imgLoaded;
      tImg.onerror = imgLoaded;
      tImg.src     = img[i].src;
    }    
  }

  document.addEventListener('DOMContentLoaded', loadbar, false);
}());


(function(d, s, id){
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/en_US/sdk.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


// BUILD SOCIAL FEED


function buildFeed(feed, k, posts){

    var output = ["","","",""];
    j = 0;
    l = 0;

    for(var i in feed.data){
        l++;
        if (i < posts) {

          if (j > k ) {
            j = 0;
          }

          if (feed.data[i].message && feed.data[i].full_picture) {

            var day = feed.data[i].created_time.substring(8,(feed.data[i].created_time.length-14));
            var monthValue = feed.data[i].created_time.substring(5,(feed.data[i].created_time.length-17));
            var monthName = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
            var month = monthName[parseInt(monthValue)];

            var message = feed.data[i].message.substring(0,200);

            if (feed.data[i].message.length > 200) {
              var message = feed.data[i].message.substring(0,200) + " ..."
            }

            switch(feed.data[i].link.substring(0,16)) {

              case 'https://www.face':

                  output[j] += '<div class="news box"><figure><img src="'+ feed.data[i].full_picture +'"></figure><div class="inside"><p class="inside-text">' + message + '</p><p class = "inside-posted">Posted '+ day + ' '+ month +'</p><span><a href="' + feed.data[i].link +'" target="_blank"><i class="fab fa-facebook-f"></i></a></span></div></div>'
                  break;
              case 'https://www.yout':

                  output[j] += '<div class="news box"><figure><img src="'+ feed.data[i].full_picture +'"></figure><div class="inside"><p class="inside-text">' + message + '</p><p class = "inside-posted">Posted '+ day + ' '+ month +'</p><span><a href="' + feed.data[i].link +'" target="_blank"><i class="fab fa-youtube"></i></a></span></div></a></div>'
                  break;
              case 'https://youtu.be':

                  output[j] += '<div class="news box"><figure><img src="'+ feed.data[i].full_picture +'"></figure><div class="inside"><p class="inside-text">' + message + '</p><p class = "inside-posted">Posted '+ day + ' '+ month +'</p><span><a href="' + feed.data[i].link +'" target="_blank"><i class="fab fa-youtube"></i></a></span></div></a></div>'
                  break;        
              default:

              output[j] += '<div class="news box"><figure><img src="'+ feed.data[i].full_picture +'"></figure><div class="inside"><p class="inside-text">' + message + '</p><p class = "inside-posted">Posted '+ day + ' '+ month +'</p><span><a href="' + feed.data[i].link +'" target="_blank"><i class="fas fa-chevron-circle-right"></i></a></span></div></a></div>'
            }
            j++;

          }else if (feed.data[i].message){

            output[j] += '<div class="news box"><div class="inside"><p class="inside-text">' + message + '<br><i class="fab fa-facebook-f"></i></p><p class = "inside-posted">Posted '+ day + ' '+ month +'</p></div></div>';
            j++;

          }


        }else{
          break;
        }

    }


    if (k == 3) {
          document.getElementById('content-first-column').innerHTML = output[3];
          document.getElementById('content-second-column').innerHTML = output[0];
          document.getElementById('content-third-column').innerHTML = output[1];
          document.getElementById('content-forth-column').innerHTML = output[2];
    }else if(k == 1){
          document.getElementById('content-first-column').innerHTML = output[1];
          document.getElementById('content-second-column').innerHTML = output[0];
    }else if (k == 0) {
          document.getElementById('content-first-column').innerHTML = output[0];
    }


}






