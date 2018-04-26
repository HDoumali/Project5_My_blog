<?php

namespace blog\lib;

class Configuration 
{

    private static $parametres;

    // Renvoie la valeur d'un paramètre de configuration
    public static function get($nom, $valeurParDefaut = null) 
    {
        if (isset(self::getParametres()[$nom])) {
          $valeur = self::getParametres()[$nom];
        } else {
          $valeur = $valeurParDefaut;
        }
        return $valeur;
    }

    // Renvoie le tableau des paramètres en le chargeant au besoin
    private static function getParametres() 
    {
        if (self::$parametres == null) {
          $cheminFichier = "app/Config/prod.ini";
          if (!file_exists($cheminFichier)) {
            $cheminFichier = "app/Config/dev.ini";
          }
          if (!file_exists($cheminFichier)) {
            throw new Exception("Aucun fichier de configuration trouvé");
          } else {
            self::$parametres = parse_ini_file($cheminFichier);
          }
        }
        return self::$parametres;
    }
}