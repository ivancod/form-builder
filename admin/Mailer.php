<?php

function configure_smtp( PHPMailer $phpmailer ) {
    $phpmailer->isSMTP(); //switch to smtp
    $phpmailer->Host       = 'smtp-relay.sendinblue.com';
    $phpmailer->SMTPAuth   = true;
    $phpmailer->Port       = 587;
    // $phpmailer->Username   = 'amit@matat.co.il';
    // $phpmailer->Password   = '1VKZAfYw2qIzyHcR';
    $phpmailer->SMTPSecure = false;
    $phpmailer->From       = 'offix@offix-israel.co.il';
    $phpmailer->FromName   = 'Offix';
}
  
add_action( 'phpmailer_init', 'configure_smtp' );