# Fotos

Die Bilder und die Galerien werden mit einem Plugin namens **Modula** erstellt.

Allgemeine Informationen zum Modula-Plugin ist in der Dokumentation unter [https://wp-modula.com/knowledge-base/](https://wp-modula.com/knowledge-base/) zu finden.

## Bevor du loslegst

Melde dich in den Wordpress-Administratoren-Bereich unter [www.dev.musikwerk-stuttgart.de/wp-admin](http://www.dev.musikwerk-stuttgart.de/wp-admin) an und klick auf *Modula*.

![Modula-Eintrag im Menü](img/modula/Modula_Menu.png)

## Neue Galerie erstellen

Bevor du Bilder hinzufügen kannst, musst du eine Galerie anlegen. Die Galerie sammelt all deiner Bilder von deiner Veranstaltung.

**Um eine Galerie anzulegen:**

1. Im Kopfbereich auf *Add New* klicken.
![Add New-Knopf](img/modula/Modula_Add_New.png)

1. Einen Namen für die neue Galerie eintragen.
![Galeriename eintragen](img/modula/Modula_Galerie_Title.png)

1. Im Bereich *Veröffentlichen* auf *Speichern* (**nicht** auf Save Gallery!) klicken.
![Speichern](img/modula/Modula_Speichern.png)

## Eine bestehende Galerie kopieren

Der einfachste Weg, eine neue Galerie zu erstellen, ist, eine bestehende Galerie zu kopieren. Auf diese Weise sind alle (oder zumindest die meisten) Einstellungen, die du benötigst, bereits konfiguriert.

**Um eine Galerie zu kopieren:**

1. Die zu kopierende Gallerie auf der Überblicksseite suchen und auf *Duplicate gallery* klicken.
![Duplicate gallery](img/modula/Modula_Duplicate_Gallery.png)

## Bilder hinzufügen

Nachdem du deine Gallerie erstellt hast, musst du die Bilder hochladen. Die Bilder können schon in der Wordpress-Bibliothek liegen oder auch auf deinem lokalen Rechner.

---
**TIPP**

Fürs Deckbild auf die Hauptfotoseite [(https://dev.musikwerk-stuttgart.de/fotos)](https://dev.musikwerk-stuttgart.de/fotos) brauchst du ein Bild in der Größe 300 x 200 px. Bevor du deine Bilder hochlädst, solltest du prüfen, dass du so ein Bild hast.

---

**Wenn die Bilder auf deinem lokalen Rechner liegen:**

1. Klick auf *Upload image files*.
![Duplicate gallery](img/modula/Modula_Add_Images.png)
1. Die Bilder von deinem Rechner auswählen.

Die Bilder erscheinen dann im Bereich *Gallery*.

**Wenn die Bilder schon in der Bibliothek existieren:**

1. Klick auf *Select from library*.
![Duplicate gallery](img/modula/Modula_Add_Images.png)

1. Die Bilder auswählen und auf *Zur Galerie hinzufügen* klicken.
![Zur Galerie hinzufügen](img/modula/Modula_Zur_Galerie_hinzufuegen.png)

Die Bilder erscheinen dann im Bereich *Gallery*.

## Galerie konfigurieren

Wenn du eine bestehende Galerie kopiert hast (siehe [Eine bestehende Galerie kopieren](#eine-bestehende-galerie-kopieren)), dann sollte deine neue Galerie schon vorkonfiguriert sind. Wenn du aber deine Galerie selber angelegt hast, musst du die folgenden Einstellungen im Bereich *General* vornehmen:

| Feld | Einstellung |
| ------ | ------------- |
| Gallery Type | Custom Grid |
| Gutter | 2px 2px 2px |
| Image Size | Medium |
| Max Images Count | leer |
| Mobile Max Images Count | leer |
| Powered by | ausgeschaltet |

## Galerie veröffentlichen

Bevor deine Bilder auf der Website erscheinen können, musst du die Galerie veröffentlichen. 

1. Klick auf *Save Gallery* auf der rechten Seite des Bildschirms.

    ![Save Gallery](img/modula/Modula_Save_Gallery.png)

    Modula erstellt dann einen sogenannten Shortcode, worüber du die Galerie in die Website integrieren kannst.

    ![Shortcode](img/modula/Modula_Shortcode.png)

1. Kopierst den Shortcode in die Zwischenablage.

## Eine Fotoseite anlegen

Jetzt hast du deine Galerie erstellt und die Bilder hinzugefügt. Als nächstes Schritt musst du eine eigene Seite für die neue Galerie anlegen.

1. In der linken Leiste auf *Seiten > Alle Seiten* klicken.

    ![Alle Seiten](img/Alle_Seiten.png)

1. Im Kopfbereich auf *Seiten erstellen* klicken

    ![Seiten erstellen](img/Seiten_Erstellen.png)

1. Einen Titel für die Seiten eingeben und dann auf dem Plus (+) klicken.

    ![Titel](img/Seiten_Titel.png)

1. Shortcode auswählen.

    ![Shortcode](img/Shortcode_Block.png)

1. Den Modula-Shortcode aus der Zwischenablage einfügen.

    ![Shortcode einfügen](img/Modula_Shortcode_Eingeben.png)

1. Obenrechts auf *Veröffentlichen* klicken.

    ![Veröffentlichen](img/Veroeffentlichen.png)

1. Die Adresse der Seite in die Zwischenablage kopieren.

    ![Adresse kopieren](img/Seite_Adresse_Kopieren.png)

## Die neue Seite anordnen

Nachdem du deine Fotoseite angelegt hast, erscheint sie zuerst unter *Unassigned Items*. Du musst die also ins Verzeichnis fürs entsprechende Jahr verschieben.

1. Auf *Unassigned Items* klicken und deine neue Seite in der Liste suchen.
1. Mit Mausover auf die Seite auf *QuickEdit* klicken.

    ![QuickEdit](img/Quickedit.png)

1. Unter *Seite Folders* das Häkchen fürs richtige Jahr setzen und dann auf *Aktualisieren* klicken.

    ![Jahr auswählen](img/Jahr_auswaehlen.png)

Deine Seite erscheint nun im ausgewählten Verzeichnis.

## Die Hauptseite anpassen

Du musst jetzt deine neue Fotoseite der Hauptseite hinzufügen.

1. Auf *Hauptseiten* klicken und dann auf *Fotos*.

    ![Fotos](img/Fotos_bearbeiten.png)

1. Auf dem Plus (+) klicken und ein Bild hinzufügen.

    ![Bild hinzufügen](img/Bild_hinfuegen.png)

1. Dein Titelbild hochladen oder aus der Mediathek wählen. Das Bild muss die Größe 300 x 200 px haben.

    ![Titelbild auswählen](img/Titelbild_waehlen.png)

1. Eine Beschriftung hinzufügen.

    ![Beschriftung hinzufügen](img/Beschriftung_hinzufuegen.png)

1. In der Symbolleiste fürs Bild (**nicht** für die Beschriftung) auf *Link einfügen* klicken.

    ![Link einfügen](img/Link_einfuegen.png)

1. Die Adresse deiner Fotoseite aus der Zwischenablage einfügen.

    ![Link eingefügt](img/Link_eingefuegt.png)

1. Die Seite aktualisieren.

    ![Seite aktualisieren](img/Aktualisieren.png)