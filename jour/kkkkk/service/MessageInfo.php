<?php

class MessageInfo
{

    public function __construct()
    {
    }

    public static function AjouterMessageErreur($message)
    {
        $_SESSION["erreurs"][] = $message;
    }

    public static function AjouterMessageErreurEtRediriger($message, $url)
    {
        $_SESSION["erreurs"][] = $message;
        header("Location: " . $url);
    }

    public static function AjouterMessageErreurEtRetour($message)
    {
        $_SESSION["erreurs"][] = $message;
        header("Location:" . $_SERVER["HTTP_REFERER"]);
    }

    public static function AjouterMessageReussiteEtRedirect($message, $url)
    {
        $_SESSION["reussite"] = $message;
        header("Location: " . $url);
    }

    public static function AjouterMessageReussiteEtRetour($message)
    {
        $_SESSION["reussite"] = $message;
        header("Location:" . $_SERVER["HTTP_REFERER"]);
    }
}
