<html>
    <head>
        <title><?= $title; ?></title>
        
        <link rel="shortcut icon" type="image/png" href="<?=  base_url('assets/images/posts/icon.jpg') ?>">
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">
        <!--<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>-->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
	<script type="text/javascript" src="https://datatables.net/media/js/site.js?_=d78b222e2531b63c1f8683e47301add9"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>

        <link rel="stylesheet" href="<?=  base_url('assets/css/style.css') ?>" >
         <style type="text/css">
          @font-face{
          font-family:'Regulara1';
          src: url('../assets/fonts/stoor.ttf'); /* here you go, IE */
        }                                                 
        @font-face {
          font-family: 'Regulara2';
          src:  url("<?=  base_url('assets/fonts/UniversNextArabic-Regular.ttf') ?>");
          font-weight: normal;
          font-style: normal;
        }
      </style>
    </head>
    <body style="font-family: 'Regulara2'; font-sizeq: 100%;" dir="rtl">
    <nav class="navbar navbar-inverse">
      <div class="container">
        
        <div id="navbar" >
          <ul class="nav navbar-nav pull-right">
              <!-- to activate base_url() go to config/autoload.php & go to $autoload['helper'] = array() and add 'url' ---- > $autoload['helper'] = array('url');-->
            
            <li><a href="<?php echo base_url(); ?>contact/form">اتصل بنا</a></li>
            <li><a href="<?php echo base_url(); ?>">الصفحة الرئيسية</a></li>
          </ul>
          <?php if($this->session->userdata('logged_in_1')):?>
          <ul class="nav navbar-nav pull-right">   
             <li class="dropdown ">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">العاملين  <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class="divider"></li>
                <li><a href="<?php echo base_url(); ?>worker/main"> معلومات العاملين </a></li>
                <li class="divider"></li>
                <li><a href="<?php echo base_url(); ?>worker/form">إضافة عامل</a></li>
              </ul>
            </li>
            
            <li><a href="<?php echo base_url(); ?>contact/main">رسائل اتصل بنا </a></li>  
           
          
          </ul>
            <?php endif; ?>
          <ul class="nav navbar-nav ">
            <?php if(!$this->session->userdata('logged_in_1')):?>
              <li><a href="<?php echo base_url(); ?>users/login">تسجيل الدخول</a></li>
            <?php endif; ?>
            <?php if($this->session->userdata('logged_in_1')):?>
              <li><a href="" data-toggle="modal" data-target="#myModal"><?php echo $_SESSION['username']; ?></a></li>
              <li><a href="<?php echo base_url(); ?>users/logout">تسجيل الخروج</a></li>
              <?php if($this->session->userdata('isadmin') == "1"):?>
                <li class="dropdown ">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true"> المستخدمين  <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url(); ?>users/main"> عرض  المستخدمين  </a></li>
                  <li class="divider"></li>
                  <li><a href="<?php echo base_url(); ?>users/register"> إضافة مستخدم</a></li>
                </ul>
              </li>
              <?php endif; ?>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </nav>
<?php if($this->session->userdata('logged_in_1')): ?>
<div  id="myModal" class="modal">
  <div class="modal-dialog">
  
    <?php echo form_open('users/pagechangepass'); ?>
    <input type="hidden" name="id" value="<?php echo $_SESSION['user_id']; ?>">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close pull-left" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">  معلومات المستخدم </h4>
      </div>
      <div class="modal-body">
    
         <?php 
         echo  'الإسم : '.$this->session->userdata('name') ;
         echo  '<br>'.'الإيميل : '.$_SESSION['email'];
         echo  '<br>'.'الجوال : '.$_SESSION['mobile'];
          ?>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
         <button type="submit" class="btn btn-primary"> تغيير كلمة المرور</button>
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>
 <?php endif; ?>
    <div class="container">
      <?php if(validation_errors()): ?>
     <?php echo '<div class="alert alert-danger">'.validation_errors().'</div>'; ?>
      <?php endif; ?>
        <!-- Flash messages -->
      <?php if($this->session->flashdata('danger')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('danger').'</p>'; ?>
      <?php endif; ?>
      
      <?php if($this->session->flashdata('success')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('success').'</p>'; ?>
      <?php endif; ?>
      
      <?php if($this->session->flashdata('user_registered')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_updated')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_created')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('post_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('login_failed')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('user_loggedin')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
      <?php endif; ?>

       <?php if($this->session->flashdata('user_loggedout')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
      <?php endif; ?>

      <?php if($this->session->flashdata('category_deleted')): ?>
        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_deleted').'</p>'; ?>
      <?php endif; ?>
      
      <?php if($this->session->flashdata('category_deleted_userProblem')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('category_deleted_userProblem').'</p>'; ?>
      <?php endif; ?>
      
      <?php if($this->session->flashdata('category_deleted_IDuserProblem')): ?>
        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('category_deleted_IDuserProblem').'</p>'; ?>
      <?php endif; ?>
