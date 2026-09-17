# SQL Injection Lab

Dette lab viser den samme SQL-injektionssårbarhed i to webapplikationer:

- `AspNetCore/` - ASP.NET Core 8 med Dapper, Microsoft.Data.Sqlite og C#.
- `NodeExpress/` - Node.js med Express, better-sqlite3 og JavaScript.
- `Php/` - PHP med PDO og SQLite.

Eksemplerne er med vilje sårbare og må kun køres lokalt i et kontrolleret undervisningsmiljø. De må ikke eksponeres på internettet eller bruges som produktionskode.

## Funktionalitet

Alle applikationer opretter en lokal SQLite-database med tabellerne `books` og `users`. Der seedes tre bøger og tre brugere ved første opstart. Søgefunktionen bruger kun `books`-tabellen og returnerer bogens titel og forfatter.

Begge løsninger har endpointet:

```text
GET /search?term=<søgetekst>
```

Et almindeligt opslag søger efter søgeteksten i `books.title` med SQL-operatoren `LIKE` og returnerer JSON.

## Kør ASP.NET Core

```powershell
cd AspNetCore
dotnet run
```

Med standardprofilen er HTTP-adressen `http://localhost:5253`. HTTPS-profilen bruger `https://localhost:7016`.

## Kør Node Express

```powershell
cd NodeExpress
npm install
node app.js
```

Node-applikationen lytter på `http://localhost:3000`.

## Kør PHP

PHP-løsningen kræver PHP med PDO SQLite aktiveret.

```powershell
cd Php
php -S localhost:8000 router.php
```

PHP-applikationen lytter på `http://localhost:8000`.

## Opgave

1. Kald `/search` med en almindelig søgetekst i alle tre applikationer.
2. Sammenlign JSON-resultaterne.
3. Undersøg, hvordan brugerinput bliver en del af SQL-strengen.
4. Beskriv, hvordan forespørgslen skal ændres, så den bruger parametre.

Se [solutions.md](solutions.md) for analyse og løsningsforslag.