$( document ).ready(function() {

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1710638195658608',
      cookie     : true,
      xfbml      : true,
      version    : 'v3.0'
    });


  FB.api('me/posts?fields=message,full_picture,created_time,link', 
    {
      access_token: "EAAYT0P39z3ABAExQZBbZArknVVWaUFyGumCMeIn77rBcTldAnIWjIealZB1R3zoRqW3EZAB7hSyEwl2ypt5ZBE1PaPSccUsbRtUeJc1MW2hrTOSyYaOUYIjgROt13QuPOZCgfB76ieBzn4CHwekw4FGcqmB5s1is4HnaszzzKmZAwZDZD"
    }, function(response) {

      if (response && !response.error){
        buildFeed(response);
      };

    });
        
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));

});



function buildFeed(feed){

    var output = ["","","",""];
    j = 0;

    for(var i in feed.data){

        if (i < 15) {

          if (j > 3 ) {
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

                  output[j] += '<div class="news box"><a href="' + feed.data[i].link +'" target="_blank"><figure><img src="'+ feed.data[i].full_picture +'"></figure><div class="inside"><p class="inside-text">' + message + '</p><p class = "inside-posted">Posted '+ day + ' '+ month +'</p><span><i class="fab fa-facebook-f"></i></span></div></a></div>'
                  break;
              case 'https://www.yout':

                  output[j] += '<div class="news box"><a href="' + feed.data[i].link +'" target="_blank"><figure><img src="'+ feed.data[i].full_picture +'"></figure><div class="inside"><p class="inside-text">' + message + '</p><p class = "inside-posted">Posted '+ day + ' '+ month +'</p><span><i class="fab fa-youtube"></i></span></div></a></div>'
                  break;
              case 'https://youtu.be':

                  output[j] += '<div class="news box"><a href="' + feed.data[i].link +'" target="_blank"><figure><img src="'+ feed.data[i].full_picture +'"></figure><div class="inside"><p class="inside-text">' + message + '</p><p class = "inside-posted">Posted '+ day + ' '+ month +'</p><span><i class="fab fa-youtube"></i></span></div></a></div>'
                  break;        
              default:

              output[j] += '<div class="news box"><a href="' + feed.data[i].link +'" target="_blank"><figure><img src="'+ feed.data[i].full_picture +'"></figure><div class="inside"><p class="inside-text">' + message + '</p><p class = "inside-posted">Posted '+ day + ' '+ month +'</p><span></span></div></a></div>'
          }

            
            j++;

          }else if (feed.data[i].message){

            output[j] += '<div class="news box"><div class="inside"><p class="inside-text">' + message + '<br><i class="fab fa-facebook-f"></i></p><p class = "inside-posted">Posted '+ day + ' '+ month +'</p></div></div>';
            j++;


          }


      }else{
        break;
      }

    document.getElementById('content-first-column').innerHTML = output[3];
    document.getElementById('content-second-column').innerHTML = output[0];
    document.getElementById('content-third-column').innerHTML = output[1];
    document.getElementById('content-forth-column').innerHTML = output[2];

    }
}