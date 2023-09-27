# Szerveroldali - Laravel

## Projekt elkezdése (Breeze kezdőcsomagból)

1. `composer create-project laravel/laravel laravel_blog`
2. `composer require laravel/breeze --dev` - afféle kezdőcsomag, tartalmazza pl. a hitelesítést
3. `php artisan breeze:install` - válasszuk ki, hogy sima `blade` sablonokkal dolgozunk
4. Adatbázis-kapcsolat beállítása `.env` fájlban, hogy legyen
   - MySQL esetén `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` és `DB_PASSWORD` konfigurálása
   - fájl alapú (SQLite esetén) `DB_CONNECTION=sqlite` beállítása és **a többi `DB_` sor TÖRLÉSE!**
     - hasznos VS Code kiegészítő: [SQLite Viewer](https://marketplace.visualstudio.com/items?itemName=qwtel.sqlite-viewer)
5. `php artisan migrate` - hozzuk létre a táblákat (pl. amiket a Breeze igényel)
6. `npm i` - frond-end buildeléséhez szükséges **Node.js** dependenciák telepítése

## Projekt futtatása

1. Front-end oldali assetek buildelése: `npm run build`
2. `php artisan serve` - elindítja a Laravel alkalmazást a lokális PHP fejlesztői szerverben

## SOS! Leklónoztam/letöltöttem ezt a git repót, de nem indul el az órai projekt?!

Mindenki őrizze meg a nyugtalanságát! A függőségek és a `.gitignore` miatt van néhány beüzemelési teendő, de nem lesz vészes:

1. A Composer- és NPM-függőségek miatt első dolog:
   - `composer install`
   - `npm i`
2. Nincs `.env` fájlod, ami a saját környezeted leírja a Laravel felé. Van azonban egy `.env.example`, amit átnevezhetsz és elvégezheted benne a saját adatbázis-kapcsolatod beállítását (lásd fent 4. pont)!
3. Szintén az `.env` fájl hiánya miatt szükséged lesz egy új titkosító-kulcsra, hát generálj ilyet: `php artisan key:generate`
4. Természetesen a migrációkat se felejtsük el futtatni az újonnan beállított adatbázison: `php artisan migrate`
5. Elméletben ezen a ponton minden rendben van, és követheted a "Projekt futtatás" cím alatti pontokat.

## Migrációk - Artisan parancsok

Kódolás előtt érdemes áttekinteni, hogy mit is csinálunk, különös tekintettek a kapcsolatokra és az elnevezési konvenciókra:
- (Adattárolás)[http://webprogramozas.inf.elte.hu/#!/subjects/webprog-server/handouts/laravel-03-adatt%C3%A1rol%C3%A1s]
- (Kapcsolatok)[http://webprogramozas.inf.elte.hu/#!/subjects/webprog-server/handouts/laravel-04-rel%C3%A1ci%C3%B3k]

- `php artisan migrate` - a még le nem futtatott migrációk futtatása
- `php artisan migrate:fresh` - szálljunk ki és szálljunk be, minden migráció újrafuttatása
- `php artisan make:model [név]` - új model generálása (órai példán: blogposztoknak)
  - modell = PHP osztály, tehát nagy kezdőbetűvel és egyes számban írandó (pl. `Post`)
  - erősen még az `-mf` flag használata, ami az új modellhez egy üres migrációt és factoryt is kigenerál
- `php artisan make:migration [név]` - új migráció generálása (modell nélkül)
  - nevezési konvenció: `create_foos_table`, ekkor automágikusan kitölti, hogy a létrehozandó a `foos` nevű tábla