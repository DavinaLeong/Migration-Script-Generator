<?php defined('BASEPATH') OR exit('No direct script access allowed');?><meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Migration Script Generator">
<meta name="author" content="The Shipyard Private Limited">

<!-- Bootstrap Core CSS -->
<link href="<?=STATIC_REPO;?>vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Font Awesome -->
<script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>

<!-- Bootstrap Styles for Parsley JS -->
<script src="<?=STATIC_REPO;?>bs-parsley.css"></script>

<!-- Prism CSS (for syntax highlighting) -->
<link href="<?=STATIC_REPO;?>vendor/prismjs/themes/prism-coy.css" rel="stylesheet" />
<!-- <link href="<?=STATIC_REPO;?>vendor/prismjs/plugins/line-numbers/prism-line-numbers.css" rel="stylesheet" /> -->

<!-- favicon -->
<link href="<?=STATIC_REPO;?>favicon.png" type="image/png" rel="icon" />
<title>Migration Script Generator</title>

<style>
	.row {
		min-height: 650px;
	}

	pre, code {
		border-radius: 0;
		border: none;
	}

	footer {
		border-top: thin solid #ddd;
		padding-top: 10px;
		text-align: center;
		min-height: 80px;
	}
</style>