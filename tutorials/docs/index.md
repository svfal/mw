# MW-Website Tutorials

Die Musikwerk-Website läuft auf Wordpress und verwendet eine Reihe von Plugins, um Fotos, Veranstaltungen und den Shop zu verwalten. In diesem Dokument zeigen wir dir, wie du die Wordpress-Plugins verwenden kannst, um diese Elemente zu verwalten.

## Bevor du loslegst

- Du musst Wordpress installieren. Die neuste Version von Wordpress findest du unter [https://de.wordpress.org/download/](https://de.wordpress.org/download/).

- Du brauchst zuerst einen User für den Wordpress-Administrationsbereich unter [www.dev.musikwerk-stuttgart.de/wp-admin](http://www.dev.musikwerk-stuttgart.de/wp-admin). Folgende Personen können einen User für dich anlegen:

    - Arnd Pohlmann
    - Daniel Kimmich
    - Sven Falkenhein
    - Carl Isaac

- Du kennst dich mit git und GitHub etwas aus.

# Homepage anpassen

## Bild austauschen

Das Titelbild auf dem Homepage ist Teil des Wordpress-Themes, das in unserem GitHub-Repository liegt. 

1. Das GitHub-Repository [https://github.com/svfal/mw.git](https://github.com/svfal/mw.git) klonen.
1. Zum Verzeichnis `mwtheme/img` navigieren.
1. Dort das Bild `mw-start-2018.jpg` austauschen.
   Am einfachsten ist es, das neue Bild den gleichen Namen zu geben. D.h. dein neues Bild sollte auch `mw-start-2018.jpg` heißen. Falls du aber ein anderes Namen vergibst, musst du den Namen auch in der Datei `index.php` ändern. Siehe [Text ändern](#text-ändern).
1. Deine Änderungen ans Repository zurückpushen.

## Text ändern

Der Text auf dem Homepage ist Teil des Wordpress-Themes, das in unserem GitHub-Repository liegt. 

1. Das GitHub-Repository [https://github.com/svfal/mw.git](https://github.com/svfal/mw.git) klonen.
1. Zur Datei `mwtheme/index.php` navigieren.
1. Den Text dort wie gewünscht anpassen.
1. Deine Änderungen ans Repository zurückpushen.