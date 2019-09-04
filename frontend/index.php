﻿<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页_杨青个人博客 - 一个站在web前端设计之路的女技术员个人博客网站</title>
<meta name="keywords" content="个人博客,杨青个人博客,个人博客模板,杨青" />
<meta name="description" content="杨青个人博客，是一个站在web前端设计之路的女程序员个人网站，提供个人博客模板免费资源下载的个人原创网站。" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/index.css" rel="stylesheet">
<style type="text/css">
  .newsli{
    min-height: 180px;
  }
</style>
</head>
<body>
<header>
  <?php include_once("header.php") ?>
</header>
<div class="box">
  <div class="newsbox f_l ">
    <div class="newstitle"><span><a href="/zcfg/">+</a></span><b>博客日记</b></div>
    <ul class="newsli" id="newsli1">
        
    </ul>
    

  </div>
  <script src="https://cdn.bootcss.com/jquery/1.11.1/jquery.js"></script>
  <script type="text/javascript">
    $.ajax({
      type: 'get',
      url: 'api/index.php?action=index_article&cate_id=1&limit=6',
      dataType: 'json', // text json xml 
      success: function(data){
        var str = '';
        
        for(var i = 0; i < data.length; i++) {
          str += `
            <li><a href="info.php?aid=${data[i].art_id}" target="_blank" title="${data[i].title}">
              ${data[i].title}
            </a></li>
          `;
        }
        
        $('#newsli1').empty().html(str);
      }
    })

    $.ajax({
      type: 'get',
      url: 'api/index.php?action=index_article&cate_id=2&limit=6',
      dataType: 'json', // text json xml 
      success: function(data){

        // console.log(data);
        var str = '';

        if(data) {

            for(var i = 0; i < data.length; i++) {
              str += `
                <li><a href="info.php?aid=${data[i].art_id}" target="_blank" title="${data[i].title}">${data[i].title}</a></li>
              `;
            }
            
        }else{

          str += `<li><a href="#" target="_blank" >暫無數據</a></li>`
        }
        
        $('#newsli2').empty().html(str);
      }
    })
  </script>

  <div class="newsbox f_r ">
    <div class="newstitle"><span><a href="/zcfg/">+</a></span><b>学无止境</b></div>
    <ul class="newsli" id="newsli2">
       
    </ul>
  </div>
  <div class="blank"></div>
  <div class="sbox f_l" id="box1"> </div>
    <script type="text/javascript">
      $.ajax({
        type: 'get',
        url: 'api/index.php',
        data: {
          action: 'index_article_popular',
          cate_id: 1,
        },
        dataType: 'json',
        success: function(data) {
          var str = `
            <span>${data[0].cate_name}</span>
            <h2>${data[0].title}</h2>
            <p>${data[0].description}</p>
            <a href="/" class="read">点击阅读</a>
            `;
            console.log(data);
            $('#box1').empty().html(str);
        },
      })
    </script>
  <div class="sbox f_l ml" id="box2"> </div>
    <script type="text/javascript">
      $.ajax({
        type: 'get',
        url: 'api/index.php',
        data: {
          action: 'index_article_popular',
          cate_id: 2,
        },
        dataType: 'json',
        success: function(data) {
          var str = `
            <span>${data[0].cate_name}</span>
            <h2>${data[0].title}</h2>
            <p>${data[0].description}</p>
            <a href="/" class="read">点击阅读</a>
            `;
            console.log(data);
            $('#box2').empty().html(str);
        },
      })
    </script>
  <div class="sbox f_r" id="box3"> </div>
  <script type="text/javascript">
    $.ajax({
      type: 'get',
      url: 'api/index.php',
      data: {
        action: 'index_article_popular',
        cate_id: 3,
      },
      dataType: 'json',
      success: function(data) {
        var str = `
          <span>${data[0].cate_name}</span>
          <h2>${data[0].title}</h2>
          <p>${data[0].description}</p>
          <a href="/" class="read">点击阅读</a>
          `;
          console.log(data);
          $('#box3').empty().html(str);
      },
    })
    </script>
  <div class="blank"></div>
  <div class="blogs">
    
  </div>
  <script type="text/javascript">
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
  </script>
  <aside>
    <div class="ztbox">
      <ul id="cate">
         
      </ul>
    </div>
    <script type="text/javascript">
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
              <li> <a href="info.html?cid=${data[i].cate_id}" title="${data[i].cate_name}">${data[i].cate_name}(${data[i].count})</a></li>
            `
          }
          $('#cate').empty().html(str);
        }
      })
    </script>
    <div class="paihang">
      <h2>点击排行</h2>
      <ul id="ranking">
        
      </ul>
    </div>
    <script type="text/javascript">
      $.ajax({
        type: 'get',
        url: './api/index.php',
        data: {
          action: 'index_article_reading',
          limit: 9,
        },
        dataType: 'json',
        success: function(data) {
          var str = ''
          for(var i = 0; i < data.length; i++) {
            str += `
              <li> <a href="localhost/mysql/info.html?aid=${data[i].art_id}" target="_blank" title="${data[i].title}">
              ${data[i].title}
              </li>
            `
          }
          $('#ranking').empty().html(str);
        }
      })
    </script>
    <div class="paihang">
      <h2>站长推荐</h2>
      <ul id="recommendation">
        
      </ul>
    </div>
    <script type="text/javascript">
      $.ajax({
        type: 'get',
        url: './api/index.php',
        data: {
          action: 'index_article_recommendation',
          limit: 9,
        },
        dataType: 'json',
        success: function(data) {
          var str = ''
          for(var i = 0; i < data.length; i++) {
            str += `
              <li> <a href="localhost/mysql/info.html?aid=${data[i].art_id}" target="_blank" title="${data[i].title}">
              ${data[i].title}
              </li>
            `
          }
          $('#recommendation').empty().html(str);
        }
      })
    </script>
    <div class="paihang">
      <h2>友情链接</h2>
      <ul id="link">
        
      </ul>
    </div>
    <script>
      $.ajax({
        type: 'get',
        url: './api/index.php',
        data: {
          action: 'friendly_link',
          limit: 3,
        },
        dataType: 'json',
        success: function(data){
          var str = '';
          for(var i = 0; i < data.length; i++) {
            str += `
              <li> <a href="${data[i].link}" target="_blank" title="${data[i].link_name}">
              ${data[i].link_name}
              </li>
            `
          }
          // console.log(data);
          $('#link').empty().html(str);
        }
      })
    </script>
  </aside>
</div>
<footer>
  <p>Design by <a href="http://www.yangqq.com" target="_blank">杨青个人博客</a> </p>
  <p>备案号：<a href="/">蜀ICP备11002373号-1</a></p>
</footer>
</body>
</html>
