(function(){


	// image flipper header section (backstrech plugin jquery)

	 $(".header").backstretch([
      "image/1.jpg",
      "image/2.jpg",
      "image/3.jpg"
      ], {
        fade: 750,
        duration: 4000
      }); 
	

   // text fipper header section you can customize it link here http://morphext.fyianlai.com/

   $("#js-rotating").Morphext({
        // The [in] animation type. Refer to Animate.css for a list of available animations.
        animation: "flipInX",
        // An array of phrases to rotate are created based on this separator. Change it if you wish to separate the phrases differently (e.g. So Simple | Very Doge | Much Wow | Such Cool).
        separator: ",",
        // The delay between the changing of each phrase in milliseconds.
        speed: 5000,
        complete: function () {
            // Called after the entrance animation is executed.
        }
    });


  // // this is automatic click slider which clicks one of the option in the services section after some time. 
  // // but this is just for demo purpose you can delete it . it won't hurt the layout

  function demo3(){
    $('#majic').trigger("click");
  }

  setTimeout(demo3,1000);
  

  // this code will work when you click one of the options of the services section . it will active the current item

  $('#majic').on('click',function(){
     $(this).children('a').css({
        'color':'#eab000 '
     }).children('h4').css({
        'color':'#eab000'
     });
     $('#pie').children('a').css({
        'color':'#404040 '
     }).children('h4').css({
        'color':'#404040'
     });
     $('#umberella').children('a').css({
        'color':'#404040 '
     }).children('h4').css({
        'color':'#404040'
     });
     $('#case').children('a').css({
        'color':'#404040 '
     }).children('h4').css({
        'color':'#404040'
     });
  });
  $('#pie').on('click',function(){
     $(this).children('a').css({
        'color':'#eab000 '
     }).children('h4').css({
        'color':'#eab000'
     });
     $('#majic').children('a').css({
        'color':'#404040 '
     }).children('h4').css({
        'color':'#404040'
     });
     $('#umberella').children('a').css({
        'color':'#404040 '
     }).children('h4').css({
        'color':'#404040'
     });
     $('#case').children('a').css({
        'color':'#404040 '
     }).children('h4').css({
        'color':'#404040'
     });
  });

  $('#umberella').on('click',function(){
     $(this).children('a').css({
        'color':'#eab000 '
     }).children('h4').css({
        'color':'#eab000'
     });
     $('#pie').children('a').css({
        'color':'#404040 '
     }).children('h4').css({
        'color':'#404040'
     });
     $('#majic').children('a').css({
        'color':'#404040 '
     }).children('h4').css({
        'color':'#404040'
     });
     $('#case').children('a').css({
        'color':'#404040 '
     }).children('h4').css({
        'color':'#404040'
     });
  });

   $('#case').on('click',function(){
     $(this).children('a').css({
        'color':'#eab000 '
     }).children('h4').css({
        'color':'#eab000'
     });
     $('#pie').children('a').css({
        'color':'#404040 '
     }).children('h4').css({
        'color':'#404040'
     });
     $('#majic').children('a').css({
        'color':'#404040 '
     }).children('h4').css({
        'color':'#404040'
     });
     $('#umberella').children('a').css({
        'color':'#404040 '
     }).children('h4').css({
        'color':'#404040'
     });
  });


  $('.itemSubServices').on('mouseover',function(){
    $(this).children('i').css({
      'color':'#404040'
    }).next('.floated').children('h3').css({
      'color':'#404040'
    })
  });
  $('.itemSubServices').on('mouseout',function(){
    $(this).children('i').css({
      'color':'#eab000'
    }).next('.floated').children('h3').css({
      'color':'#eab000'
    })
  });

   // fun facts hover effect u can customize it

   $('.itemFunFacts').on('mouseover',function(){
      $(this).css({
        'background-color':'#eab000',
        'border':'none',
        'border-radius':'0px'
      }).find('h2').css({
        'color':'#181818'
      }).next('h4').css({
        'color':'#181818'
      })
   });

    $('.itemFunFacts').on('mouseout',function(){
      $(this).css({
        'background-color':'transparent',
        'border-left':'1px solid #fff',
        'border-right':'1px solid #fff',
        'border-radius':'40px'
      }).find('h2').css({
        'color':'#fff'
      }).next('h4').css({
        'color':'#fff'
      })
   });

  // animate numbers fun facts you can customize it


      $('#animateNumber1').animate(  // animate numbers 
        {someValue: 970}, 
        {
        duration: 1000,
        easing:'swing',
        step: function() {
            $('#animateNumber1').text(Math.round(this.someValue));
        }
      });
      $('#animateNumber2').animate(  // animate numbers 
          {someValue: 720}, 
          {
          duration: 1000,
          easing:'swing',
          step: function() {
              $('#animateNumber2').text(Math.round(this.someValue));
          }
      });
      $('#animateNumber3').animate(  // animate numbers 
          {someValue: 450}, 
          {
          duration: 1000,
          easing:'swing',
          step: function() {
              $('#animateNumber3').text(Math.round(this.someValue));
          }
      });
      $('#animateNumber4').animate(  // animate numbers 
          {someValue: 24}, 
          {
          duration: 1000,
          easing:'swing',
          step: function() {
              $('#animateNumber4').text(Math.round(this.someValue));
          }
      });
      
  // team section hover effect

  $('.itemTeam').on('mouseover',function(){
    $(this).css({
      'background-color':'#181818'
    }).find('h3').css({
      'color':'#eab000'
    }).next('h4').css({
      'color':'#eab000'
    });
  });

   $('.itemTeam').on('mouseout',function(){
    $(this).css({
      'background-color':'#fff'
    }).find('h3').css({
      'color':'#404040'
    }).next('h4').css({
      'color':'#707070'
    });
  });
 

  // for social icons hover effect

  $('.itemTeam ul li').on('mouseover',function(){
    $(this).css({
      'border-color':'#fff'
    }).children('a').css({
      'color':'#fff'
    });
  })
   $('.itemTeam ul li').on('mouseout',function(){
    $(this).css({
      'border-color':'#eab000'
    }).children('a').css({
      'color':'#eab000'
    });
  });


  // portfolio section navigation hover effects

  $('.portfolio ul li a').on('click',function(e){
      e.preventDefault();
    $(this).parent().addClass("activeItem").siblings().removeClass("activeItem");
  });

  // portfolio mix it up . please check https://mixitup.kunkalabs.com/ for documentation

   $('#Container').mixItUp();
 

})();