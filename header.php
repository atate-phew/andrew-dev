<?php /*DO NOT DELETE THIS GLOBAL YOU WILL BE SHOT*/ global $gs; ?>
<!doctype html>
<html lang="en">
<head> 

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
		<meta name="viewport" content="width=device-width,initial-scale=1">

    
        <title><?php if(is_front_page()) echo($gs['company-details']['pf_company_name']['0']); else wp_title(''); ?></title>
        
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo(wp_get_attachment_url($gs['company-details']['pf_company_favicon'][0]));?>">
        <link href="/wp-content/themes/phew/styles/css/test-file.css" rel="stylesheet" type="text/css" />
                                       
        <?php wp_head();  ?>                       
       		    
		<link rel="shortcut icon" href="<?php // echo(wp_get_attachment_url($gs['settings']['favicon'][0]));?>" type="image/gif">



            
        
</head>
<body>

<a name="topofsite" id="scrolltop"></a> 
<div id="wrapper">
Header

