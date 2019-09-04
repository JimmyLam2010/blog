$.ajax({
      type: 'get',
      url: 'http://h1902.teach.com/2019-7-27-php08/teachNote/api/index.php?action=index_article&cate_id=1&limit=6',
      dataType: 'json', // text json xml 
      success: function(data){
        
        console.log(data);
        var str = '';
        
        for(var i = 0; i < data.length; i++) {
          str += `
            <li><a href="http://h1902.teach.com/2019-7-27-php08/teachNote/info.php?aid=${data[i].art_id}" target="_blank" title="${data[i].title}">
              ${data[i].title}
            </a></li>
          `;
        }
        
        $('#newsli1').empty().html(str);
      }
    })

    $.ajax({
      type: 'get',
      url: 'http://h1902.teach.com/2019-7-27-php08/teachNote/api/index.php?action=index_article&cate_id=2&limit=6',
      dataType: 'json', // text json xml 
      success: function(data){

        // console.log(data);
        var str = '';

        if(data) {

            for(var i = 0; i < data.length; i++) {
              str += `
                <li><a href="http://h1902.teach.com/2019-7-27-php08/teachNote/info.php?aid=${data[i].art_id}" target="_blank" title="${data[i].title}">${data[i].title}</a></li>
              `;
            }
            
        }else{

          str += `<li><a href="#" target="_blank" >暫無數據</a></li>`
        }
        
        $('#newsli2').empty().html(str);
      }
    })

    $.ajax({
      type: 'get',
      url: 'api/index.php',
      data: {
        action: 'index_article_new',
        limit: 6,
      },
      dataType: 'json',
      success: function(data) {
        var str = '' 
        for(var i = 0; i < data.length; i++) {
          str += `
            <div class="bloglist">
              <h2>
                <a href="#" title="${data[i].title}">${data[i].title}</a>
              </h2>
              <p>${data[i].description}</p>
            </div>
          `
        }
        $('.blogs').empty().html(str);
      }
    })
    
      $.ajax({
        type: 'get',
        url: './api/index.php',
        data: {
          action: 'index_cate'
        },
        dataType: 'json',
        success: function(data) {
          var str = ''
          for(var i = 0; i < data.length; i++) {
            str += `
              <li> <a href="info.php?cid=${data[i].cate_id}" title="${data[i].cate_name}">${data[i].cate_name}(${data[i].count})</a></li>
            `
          }
          $('#cate').empty().html(str);
        }
      })