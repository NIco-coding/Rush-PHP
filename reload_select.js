var elements=document.getElementById("order");

elements.addEventListener( 'change', function(){
        var url=window.location.href;

        if(url.search('order')>0)
        {
          window.location.href=url.substr(0,url.search('order')+6)  + elements.value+url.substr(url.search('order')+7,url.length);
        }else if (url.search('?')>0)
        {
        window.location.href=url+'&order=' + elements.value;
        }else
        {
         window.location.href=url+'?order=' + elements.value;
        }

    });
