# Szerveroldali - bevezető óra

## Környezet
- PHP + Composer (csomagkezelő PHP-hez)
  - [Windowsra ajánlott telepítő](https://github.com/totadavid95/PhpComposerInstaller/releases/tag/v1.2.4)
- Node.js + NPM
  - **Szükség lesz rá már a Laravel/PHP résznél is a front-end assetek buildelése miatt!**
  - hivatalos telepítő használható

## Composer

- "Composer is an application-level dependency manager for the PHP programming language that provides a standard format for managing dependencies of PHP software and required libraries."
- Elsődleges package repo: [Packagist](https://packagist.org/)
  - Figyelem! Nem minden lesz automatikusan értelmes attól, hogy itt fent van! (pl. `is-even` kismillió kiadásban!)

### Parancsok

- `composer init`
  - új projekt inicializálása
- `composer require <vendor>/<name>`
  - új `<vendor>/<name>` csomag behúzása a projektbe
  - változások: 
    - hozzáadódik a `composer.json` fájlhoz a dependencia
    - letöltődik a `vendor` mappába
- `composer install`
  - dependenciák újratelepítése (pl. `vendor` mappa elvesztése esetén)
- A dependenciákat tartalmazó `vendor` mappát **NEM** adod be és **NEM** töltöd fel verziókezelőbe! (Amellett, hogy fölösleges, még bajt is tud néha okozni eltérő futtatási környezet esetén!)
  - `.gitignore` !!!

### Amiket kipróbáltunk órán

- [Cowsay](https://packagist.org/packages/alrik11es/cowsayphp)
- [PHP](https://packagist.org/packages/fakerphp/faker)

### Kódba
- dependenciák behúzása egyszerűen: ```require_once('vendor/autoload.php'); ```
- használd az adott csomag dokumentációját
  - én se tudom fejből, hogy milyen állatok vannak a Cowsay-ben :)