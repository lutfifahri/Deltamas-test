<?php
if (!isset($_SESSION['SES_ADM'])) {
    header("location:login");
}
