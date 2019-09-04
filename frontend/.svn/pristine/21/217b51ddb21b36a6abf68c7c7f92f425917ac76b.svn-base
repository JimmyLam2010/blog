<?php
// 设置时区
date_default_timezone_set('PRC');

// 设置路径
define("APP", str_replace('\\', '/', dirname(__DIR__)) . '/');
define("LIB", APP . 'lib/config.php' );
define("DB", APP . 'lib/db.php' );

// 引入库文件
include_once( LIB );
include_once( DB );

// 链接数据库
$cn = connect($host, $user, $pwd, $db);

// http://h1902.teach.com/2019-7-27-php08/teachNote/api/index.php?action=index_article&limit=6

//h1902.teach.com/2019-7-27-php08/teachNote/api/index.php?action=news&limit=6

//
//	array(2) {
//   ["action"]=>
//   string(13) "index_article"
//   ["limit"]=>
//   string(1) "6"
// }

 
// 请求数据
$action = isset($_GET['action']) && !empty($_GET['action']) ? $_GET['action']:'index';
$limit = isset($_GET['limit']) && !empty($_GET['limit']) ? $_GET['limit']: 1;
// 分类id
$cate_id = isset($_GET['cate_id']) && !empty($_GET['cate_id']) ? $_GET['cate_id']: 1;
// 详情id
$aid = isset($_GET['aid']) && !empty($_GET['aid']) ? $_GET['aid']: 1;

// 首页根据分类id查询文章
if( $action == 'index_article') {
	// join> where> order by> limit
	$sql = "select art_id, title from {$pre}article where cate_id = {$cate_id} order by art_id desc limit {$limit}";
	$data = getAll($sql);
	echo json_encode($data);die;
}

// 首页查询最新六篇文章
if( $action == 'index_article_new') {
	$sql = "select art_id, title, description from {$pre}article order by art_id desc limit {$limit}";
	$data = getAll($sql); 
	echo json_encode($data);die;
}

// 首页根据点击量查询文章
if( $action == 'index_article_reading') {
	$sql = "select art_id, title, description from {$pre}article order by reading desc limit {$limit}";
	$data = getAll($sql); 
	echo json_encode($data);die;
}

//首页现实点击量最多的文章
if( $action == 'index_article_popular') {
	$sql = "select art_id, title, description, c.cate_name, reading from pre_article as a, pre_cate as c where a.cate_id = c.cate_id and c.cate_id = {$cate_id} order by reading desc";
	$data = getAll($sql);
	echo json_encode($data);die;
}


// 首页站长推荐文章
if( $action == 'index_article_recommendation') {
	$sql = "select art_id, title, description from {$pre}article order by recommend desc limit {$limit}";
	$data = getAll($sql); 
	echo json_encode($data);die;
}

// 首页分类
if( $action == 'index_cate') {
	$sql = "select * from {$pre}cate  order by cate_id asc";
	$data = getAll($sql);

	foreach($data as $key=>$value) {

		$cate_id = $value['cate_id'];
		$sql = "select count(*) as c from {$pre}article where cate_id={$cate_id}";
		$temp = getOne($sql);
		$data[$key]['count'] = $temp['c'];
	}
 	
	echo json_encode($data);die;
}

//友情链接
if($action == 'friendly_link'){
	$sql = "select * from {$pre}link order by link_id asc limit {$limit}";
	$data = getAll($sql);
	echo json_encode($data);die;
}

// 博客详情
if( $action == 'blog_detail') {
	$sql = "select * from {$pre}article as a left join {$pre}cate as c on c.cate_id = a.cate_id where a.art_id=${aid}";
	$data = getOne($sql);
	
	// 时间处理
	$data['addtime'] = date('Y-m-d', $data['addtime']);

	echo json_encode($data);die;
}



 


