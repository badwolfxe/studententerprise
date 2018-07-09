# dcpro9-ecolidaire

Après git clone :

 1. Générer la base de données (Forward Engineer)
 2. Créer le fichier config/parameters.php :
    define("DB_HOST", "localhost");
    define("DB_NAME", "ecolidaire");
    define("DB_USER", "root");
    define("DB_PASS", "root");

    define("SITE_URL", "http://localhost/dcpro9/ecolidaire/");
    define("ADMIN_URL", SITE_URL . "admin/");

3. Installer les packages npm dans l'admin :
    cd admin/
    npm install# studententerprise
