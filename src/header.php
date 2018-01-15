<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Expires" content="Wed, 01 Mar 2019 00:00:00 GMT">
<title><?php wp_title( '-', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="icon" href="<?= get_template_directory_uri() ?>/images/favicon.ico" type="image/x-icon" />
<?php wp_head(); ?>

<!-- BEGIN JIVOSITE CODE {literal} -->
<script type='text/javascript'>
	(function(){ 
		var widget_id = 'a0NUY0sVjW';
		var d=document;
		var w=window;
		function l(){var s = document.createElement('script'); 
		s.type = 'text/javascript'; 
		s.async = true; 
		s.src = '//code.jivosite.com/script/widget/'+widget_id; 
		var ss = document.getElementsByTagName('script')[0]; 
		ss.parentNode.insertBefore(s, ss);
	}if(d.readyState=='complete'){
		l();
	}else{
		if(w.attachEvent){w.attachEvent('onload',l);
		}else{
			w.addEventListener('load',l,false);
		}
	}
})();
</script>
<!-- {/literal} END JIVOSITE CODE -->

<!-- Google Tag Manager -->
<meta name="google-site-verification" content="i7hGUhosYR7OBuzhrKMknAV_WVLUDbnAy00eXUAdsXo" />


<!-- Google Analytics -->
<script>
window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
ga('create', 'UA-23241781-18', 'auto');
ga('send', 'pageview');
</script>
<script async src='https://www.google-analytics.com/analytics.js'></script>
<!-- End Google Analytics -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-525KWG');</script>
<!-- End Google Tag Manager -->
</head>
<body <?php body_class(); ?>>
<? get_sidebar(); ?>