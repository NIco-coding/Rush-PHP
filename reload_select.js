var elements=document.getElementById("order");

elements.addEventListener( 'change', function(){
        var url=window.location.href;

        if(url.search('order')>0)
        {
          window.location.href=url.substr(0,url.search('order')+6)  + elements.value+url.substr(url.search('order')+6+elements.value.length,url.length);
        }else if (url.search('\\?')>0)

        {
        window.location.href=url+'&order=' + elements.value;
        }else
        {
         window.location.href=url+'?order=' + elements.value;
        }

    });

var elements2 = document.getElementsByClassName("cat");

for(var i=0;i<elements2.length;i++)
{
  elements2[i].onclick=function(e) {
    e.preventDefault();
    var id=this.href.substr(this.href.length-1,this.href.length);
    var url=window.location.href;
    console.log(this);
    if(url.search('category')>0)
    {
      window.location.href=url.substr(0,url.search('category')+9)  + id +url.substr(url.search('category')+10,url.length);
    }else if (url.search('\\?')>0)
    {
    window.location.href=url+'&category=' + id;
    }else
    {
     window.location.href=url+'?category=' + id;
    }

  };
}
var elements2 = document.getElementsByClassName("glyphicon");
for(var i=0;i<elements2.length;i++)
{
  elements2[i].onclick=function(e) {
    e.preventDefault();
    var value=document.getElementsByName("the_search")
    var url=window.location.href;
    console.log(this);
    if(url.search('search')>0)
    {
      window.location.href=url.substr(0,url.search('search')+7)  + value[0].value +url.substr(url.search('search')+8,url.length);
    }else if (url.search('\\?')>0)
    {
    window.location.href=url+'&search=' + value[0].value;
    }else
    {
     window.location.href=url+'?search=' + value[0].value;
    }

  };
}
