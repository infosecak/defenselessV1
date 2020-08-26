<?php

function redirect($url) {
    echo "<script>window.location.replace = '{$url}';</script>";
}