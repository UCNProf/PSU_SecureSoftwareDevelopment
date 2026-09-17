# Session 03: Identifikation af sårbarheder

## Objective

Identificer sårbarheder og usikre kodningspraksisser i de givne kodeeksempler.

## Materialer

Mappen `snippets/` indeholder seks selvstændige eksempler:

- `snippets/csharp/01-user-search.cs` - SQL-injektion
- `snippets/csharp/02-download.cs` - path traversal
- `snippets/php/01-login.php` - SQL-injektion
- `snippets/php/02-comment.php` - stored XSS
- `snippets/javascript/01-profile.js` - DOM-baseret XSS
- `snippets/javascript/02-calculator.js` - usikker dynamisk kodekørsel

Koden er med vilje sårbar og skal ikke bruges i produktion eller eksponeres på et offentligt system.

## Procedure

1. Gennemgå hvert snippet uden først at se `facilitator-notes.md`.
2. Markér input, der kommer fra en bruger eller en ekstern kilde.
3. Find de linjer, hvor input bruges i databaseforespørgsler, filstier, HTML eller kode.
4. Beskriv sårbarheden og dens konsekvens.
5. Forklar på et højt niveau, hvordan en angriber kan påvirke programmets adfærd.
6. Foreslå en sikker rettelse, og nævn eventuelle resterende risici.

For hvert eksempel bør gruppen besvare:

- Hvilken tillidsgrænse bliver overskredet?
- Hvilken type inputvalidering eller output-encoding mangler?
- Hvilken sikker API eller designændring bør bruges?
- Kan problemet opdages ved code review, test eller statisk analyse?

## Afgrænsning

Diskutér konsekvenser og angrebsvektorer konceptuelt. Brug ikke eksemplerne mod systemer, som I ikke ejer eller har fået tilladelse til at teste.