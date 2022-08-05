<?php
session_start();

echo $email;

session_unset();
session_destroy();
