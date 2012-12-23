function showphotos()
    {
    
    $.getJSON('data/photos.json', function(data) {
        
        allphotos = data['photo'];
        totalphotos = allphotos.length;
        
        $.each(data['photo'], function(key, val) {
                    
            var template = $('#phototemplate').html();
            var html = Mustache.to_html(template, val);
            $('#photolist').append(html);   
                            
          });           
            
        }); 
 
    }  
    
function getPhoto(plug)
    {
	$.getJSON('data/photos.json', function(data) {
        $.each(data['photo'], function(key, val) {
        	//alert(plug + ' = ' + val['plug'])
            if(plug==val['plug']){
                var template = $('#photoDetailTemplate').html();
                var html = Mustache.to_html(template, val);
                $('#PhotoDetail').html(html);
            }
          });                            
        });
    }  