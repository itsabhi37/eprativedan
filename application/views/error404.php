<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en" class="pos-relative">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>e-Prativedan</title>

	<!-- vendor css -->
    <?= link_tag('assets/lib/font-awesome/css/font-awesome.css') ?>
    <?= link_tag('assets/lib/Ionicons/css/ionicons.css') ?>

    <!-- Bracket CSS -->
    <?= link_tag('assets/css/bracket.css') ?>
	<link rel="icon" href="<?=base_url()?>/assets/img/icon.png" type="image/gif">
  </head>

  <body class="pos-relative">

    <div class="ht-100v d-flex align-items-center justify-content-center">
      <div class="wd-lg-70p wd-xl-50p tx-center pd-x-40">
        <h1 class="tx-100 tx-xs-140 tx-normal tx-inverse tx-roboto mg-b-0">404!</h1>
        <h5 class="tx-xs-24 tx-normal tx-teal mg-b-30 lh-5">The page your are looking for has not been found.</h5>
        <p class="tx-16 mg-b-30">The page you are looking for might have been removed, had its name changed,
or unavailable.</p>

        <div class="d-flex justify-content-center">
        <a class="btn btn-teal" href="<?= base_url('home') ?>"><i class="fa fa-home"></i> Back to Homepage</a>
        </div><!-- d-flex -->
      </div>
    </div><!-- ht-100v -->

	<script src="<?= base_url('assets/lib/jquery/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/lib/popper.js/popper.js') ?>"></script>
	<script src="<?= base_url('assets/lib/bootstrap/bootstrap.js') ?>"></script>
  </body>
</html>
