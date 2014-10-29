<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
        <head>
                <title>Info-Saeule</title>
                <link href="bildschirm.css" rel="stylesheet" type="text/css" media="screen" />
                <link href="druckversion.css" rel="stylesheet" type="text/css" media="print" />
                 <link rel="shortcut icon" href="heizungs_hofmann/favicon.ico" type="image/x-icon">
                 <script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
tinymce.init({
    selector: "textarea"
 });
</script>

<!-- Place this in the body of the page content -->


        </head>


        <body id="body" >

                         <form method="post" name="formular" enctype="multipart/form-data" action="" >

                        <div id="wrapper" >

                                <div id="head" >
                                        <? include("head.php5")?>
                                </div>        <!-- Ende head -->


                                <div id="links" >
                                        <? include("links.php5")?>
                                </div>        <!-- Ende navigation -->


                               <div id="content" >
                                        <? include($contenInhalt) ?>
                                </div>        <!-- Ende content -->

                                <div id="feet" >
                                        <? include("feet.php5")?>
                                </div>        <!-- Ende feet -->



                        </div>        <!-- Ende wrapper -->


        </form>

        </body>
</html>