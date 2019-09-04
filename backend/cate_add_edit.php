<?php 
    include_once('lib/config.php');
    // 检查是否登录
    include_once('lib/admin_check.php');

    // 查询分类
    $sql = "select * from {$pre}cate";
    $cate = getAll($sql);
    $id = isset($_GET['id']) && !empty($_GET['id']) ? intval($_GET['id']) : '';
    $article = array();

    // 网站设置
    $is_recommend = array(
        '0' => '不推荐',
        '1' => '站长推荐',
        '2' => '首页推荐'
    );
    
    if($id) {
        // 编辑展示页面
        $sql = "select * from {$pre}cate where cate_id={$id}";
        $article = getOne($sql);
    }

    if($_POST) {

        $title = isset($_POST['title']) && !empty($_POST['title']) ? trim($_POST['title']) : '';
        $cate_id = isset($_POST['cate_id']) && !empty($_POST['cate_id']) ? intval($_POST['cate_id']) : 1;

        $cate_name = isset($_POST['cate_name']) && !empty($_POST['cate_name']) ? trim($_POST['cate_name']) : 0;

        $data = array(
            'cate_id' => $cate_id,
            'cate_name' => $cate_name
        );

        if($id) {
            $r = update('article', $data, "where art_id={$id}");

            if($r) {
                showMsg('编辑成功...' );die;
            }else{
                showMsg('编辑失败...');die;
            } 
        }else{
            $r = add('article', $data);
            
            if($r) {
                showMsg('添加成功...', 'article-list.php');die;
            }else{
                showMsg('添加失败...');die;
            }
        }
    }
 


?>
<?php include_once('header.php') ?>
<style type="text/css">
    .navbar{
        z-index: 100000;
    }
</style>
<!-- 时间样式 --> 

<link rel="stylesheet" type="text/css" href="js/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css">

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <?php echo $id ? '编辑' : '添加' ?>文章
                        <button class="btn btn-primary pull-right rounded" onclick="history.go(-1)" >
                            <i class="fa fa-chevron-left"></i>
                            <!-- <i class="fa fa-hand-o-left"></i>  -->
                            返回
                        </button>
                    </div>
                    <form method="post" action="" onsubmit="return check()">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="card-body"> 
                            <?php if($cate){ ?>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="cate_id">文章分类</label>
                                        <input id="cate_id" class="form-control" placeholder="文章分类" name="cate_id" value="<?php echo isset($article['cate_id']) ? $article['cate_id'] : '' ?>">
                                    </div> 
                                </div>
                            </div>
                            <?php } ?>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="form-group"> 
                                        <input type="submit" class="btn btn-primary rounded" value="提交">
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>

        
    </div>
</div>
<?php include_once('footer.php') ?>

<!-- 时间插件 -->
<script type="text/javascript" src="js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="js/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>


<!-- 编辑器插件 -->
<script type="text/javascript" src="js/utf8-php/ueditor.config.js"></script>
<script type="text/javascript" src="js/utf8-php/ueditor.all.min.js"></script>
<script type="text/javascript" src="js/utf8-php/lang/zh-cn/zh-cn.js"></script> 

<script type="text/javascript">
    $('#addtime').datetimepicker({
        // 格式化日期
        format: 'yyyy-mm-dd',
        language:  'zh-CN',
    });

    var ue = UE.getEditor('content', {
        toolbars: [ // 配置工具栏
            ['fullscreen', 'source', 'undo', 'redo'],
            ['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc']
        ]
    });

    function check(){

        var title = $('[name="title"]').val()
        var content = $('[name="content"]').val()

        if(title == '') {
            alert('标题不能为空...');
            return false;
        } 
        
        if(content == '') {
            alert('内容不能为空...');
            return false;
        }

        return true;
    }
</script>
