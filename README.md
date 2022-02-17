<p align="center">
    <a href="https://goshen-tabernacle.cm"><img src="/art/social-card.png" alt="Goshen Tabernacle Screenshoot"></a>
</p>

<p align="center">
    <a href="https://github.com/mckenziearts/goshen-tabernacle/actions">
        <img src="https://github.com/mckenziearts/goshen-tabernacle/workflows/Tests/badge.svg" alt="Build Status" />
    </a>
</p>

## Goshen Tabernacle

Ce dépôt contient le code source du site de [goshen-tabernacle.com](https://goshen-tabernacle.com). Goshen Tabernacle est l'assemblee locale Camerounaise des croyants qui ont cru au 
messager (prophete) du temps de la fin William Marrion Branham.

Site web : https://goshen-tabernacle.com <br />
Facebook: https://www.facebook.com/goshentabernacle <br />
Instagram: https://instagram.com/goshentabernacleofficiel <br />

## Caractéristiques du Serveur

Les elements suivant sont requis pour demarrer l'installation

- PHP >=8.0
- [Composer](https://getcomposer.org/download/)
- [NPM](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm)
- [Valet](https://laravel.com/docs/valet#installation)

## Installation

> Notez que vous êtes libre d'ajuster l'emplacement `~/Sites/goshen-tabernacle` à n'importe quel répertoire de votre choix sur votre machine. Ce faisant, assurez-vous d'exécuter la commande `valet link` dans le répertoire souhaité.

1. Clonez ce repo avec la commande `git clone git@github.com:mckenziearts/goshen-tabernacle.git ~/Sites/goshen-tabernacle`
2. Exécuter `composer install` pour installer les dépendances PHP
3. Configurez une base de données locale appelée `goshen`
4. Exécutez `composer setup` pour configurer l'application
5. Configurer un pilote de messagerie fonctionnel comme [Mailtrap](https://mailtrap.io/)
6. Configurez les fonctionnalités (facultatives) ci-dessous

Vous pouvez maintenant visiter l'application dans votre navigateur en visitant [http://goshen-tabernacle.test](http://goshen-tabernacle.test). Si vous avez amorcé la base de données, vous pouvez vous connecter à un compte de test avec ** `johndoe` ** & **` password` **.

## Commands

Command | Description
--- | ---
**`php artisan test --parallel`** | Exécuter les tests
`php artisan migrate:fresh --seed` | Reset la base de données
`npx mix --watch` | Surveillez les changements dans les fichiers CSS et JS

## Maintainers

Le site Laravel.cm est actuellement maintenu par [Arthur Monney](https://github.com/mckenziearts). Si vous avez des questions, n'hésitez pas à créer une issue sur ce dépôt.

## Vulnérabilités de sécurité

Si vous découvrez une faille de sécurité dans Laravel.cm, veuillez envoyer un e-mail immédiatement à [contact@arthurmonney.me](mailto:contact@arthurmonney.me). **Ne créez pas de problème pour la vulnérabilité.**
