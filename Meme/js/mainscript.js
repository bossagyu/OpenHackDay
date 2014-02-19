  function kaiwa() {
  event.preventDefault();
  var $form = $('#the-form');
  var $button = $form.find('button');
  var $msg = $(".inputtextarea").val();
  var $mode = $(".mode").val();
  var $context = $(".context").val();
  var $url = "http://126.9.211.82/hackday/Talk/talk";
    console.log($mode);
    $.ajax({
      type: $form.attr('method'),
      url: $url,
      //dataType: 'jsonp',

      data: {
        utt: $msg,
        value: 3,
        context: $context,
        mode: $mode,
        tun: 1
      },

      success: function(data) {
        console.log(data)
      },
      error: function(err) {
        console.log(err)
      }
    }).done(function(data) {
      data = $.parseJSON(data);
        $(".context").attr("value", data.context);
        $(".mode").attr("value", data.mode);
        mojitypetest(data.answer);
    }).fail(function() {
        alert("error");
    });
      var num = Math.floor(Math.random()*3);
          
           document.images["memeimage"].src = memeimg[num];
          document.getElementById("pop").style.visibility = "hidden";


 }

 function question(){
          event.preventDefault();
          var $form = $('#the-form');
          var $button = $form.find('button');
          var $msg = $(".inputtextarea").val();
          var $url = "http://126.9.211.82/hackday/Talk/qa" ;
          $.ajax({
            type: $form.attr('method'),
            url: $url,
            data: {
              question: $msg,
              value: "high"
            }
          }).done(function(data) {
            data = $.parseJSON(data);
            $(".context").attr("value", data.context);
            $(".mode").attr("value", data.mode);
            mojitypetest(data.answer);
          }).fail(function() {
            alert("error");
          });
              var num = Math.floor(Math.random()*3);
          
           document.images["memeimage"].src = memeimg[num];
           document.getElementById("pop").style.visibility = "hidden";
}

function recomend(){
    $(document).ready(function(event) {
      var $url = "http://126.9.211.82/hackday/Talk/recspot";
      $.ajax({
        type: "POST",
        url: $url,
        data: {
          yan: 1
        }
      }).done(function(data) {
        data = $.parseJSON(data);
        mojitypetest(data.answer);
        var num = Math.floor(Math.random()*3);
     document.images["memeimage"].src = memeimg[num];
           console.log(data.url);
           $("#recomendimg").attr('src', data.url);
      }).fail(function() {
        alert("error");
      });
    });
     
}


