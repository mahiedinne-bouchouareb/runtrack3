<?php
class PdoRunTrack
{
    private $pdo;

    public function __construct()
    {
        $pdo = new PDO('mysql:dbname=utilisateur;host=localhost', 'root', '');
    }
}
