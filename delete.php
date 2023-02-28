<?php

session_start();

$nik = $_GET['nik'];

$db = new PDO("mysql:host=localhost;dbname=pengaduanmasyarakat",'root','');
$query = $db->query("DELETE FROM `masyarakat` WHERE `nik`= '$nik'");

if($query)
{
    header("location:datalaporan");
}