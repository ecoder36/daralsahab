<html>
    <head>
        <title><?= $title; ?></title>
        
        <link rel="shortcut icon" type="image/png" href="<?=  base_url('assets/images/posts/icon.jpg') ?>">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <!--<link rel="stylesheet" href="https://bootswatch.com/flatly/bootstrap.min.css">-->
        <link rel="stylesheet" href="https://bootswatch.com/3/flatly/bootstrap.min.css">
        <!--<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>-->
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
        
        
      	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.datatables.net/rss.xml">
      	<script type="text/javascript" src="https://datatables.net/media/js/site.js?_=d78b222e2531b63c1f8683e47301add9"></script>
      	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
      	<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.4.js"></script>
      	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
      	<script src="https://cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>
      	<link href="//cdn.datatables.net/responsive/2.1.1/css/dataTables.responsive.css"/>

      	<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
      	<script type="text/javascript" language="javascript" src="//cdn.datatables.net/buttons/1.4.2/js/buttons.print.min.js"></script>
        <link rel="stylesheet" href="<?=  base_url('assets/css/style.css') ?>" >
        <script type="text/javascript" src="<?=  base_url('assets/js/myscripts.js') ?>"></script>
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
      
      <!-- Print script -->
      <style type="text/css" media="print">
        .dontprint
        { display: none; }
      </style>
      <script language="javascript">
        function printdiv(printpage)
        {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
        var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr+newstr+footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
        }
      </script>
   

<style type="text/css">

    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);

    }
    @page {
        size: A4;
        margin: 0;
       
    }
     @media print {
        html, body {
            width: 210mm;
            height: 297mm; 
            margin-right:60;
            margin-left:30;
            margin-top:5;
        }
        .page {
           width: 210mm;
            height: 297mm;   
            margin: 10;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
    
</style>
    </head>
    
    <body style="font-family: 'Regulara2'; font-sizeq: 100%;" dir="rtl">
    <!--Test JS File-->
    <!--<button onclick="myFunction()">Try it</button>-->
    <!-- Header -->
		<header id="header" class="alt">    
      <div class="navbar-wrapper">
          <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
              <div class="navbar-header navbar-right">
                <button type="button" class="navbar-toggle collapsed pull-left" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
                  
              <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- to activate base_url() go to config/autoload.php & go to $autoload['helper'] = array() and add 'url' ---- > $autoload['helper'] = array('url');-->
                  <!--<li><a href="<?php //echo base_url(); ?>contact/form">اتصل بنا</a></li>-->
                  <li><a href="<?php echo base_url(); ?>pages/main">الصفحة الرئيسية</a></li>
                </ul>
                <?php if($this->session->userdata('logged_in_1')):?>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="<?php echo base_url(); ?>"> صفحة الموقع </a></li>     
                  <li><a href="<?php echo base_url(); ?>contracts">العقار </a></li>     
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
                <ul class="nav navbar-nav navbar-left ">
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
                    <?php if($this->session->userdata('isadmin') == "99"):?>
                      <li><a href="<?php echo base_url(); ?>users/masteruser">استعادة كلمة المرور  </a></li>
                    <?php endif; ?>
                  <?php endif; ?>
                </ul>
              </div><!--/.nav-collapse -->
            </div>
          </nav>
      </div>
    </header> <!-- /.header -->
    
    
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
