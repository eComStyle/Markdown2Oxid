Markdown 2 Oxid
===============

### Shopversion
OXID eShop 6

### Features
Markdown zur Formatierung von Artikel- / Kategorie-Langbeschreibung und CMS-Seiten

### Installation (Kurzform)
`composer require ecs/markdown2oxid`

### Installation (Langform)
- Erstellen Sie via SSH-Client eine Verbindung mit dem Server, auf dem Ihr OXID eShop liegt.
- Wechseln Sie in Ihr OXID-Projektverzeichnis, in dem sich die Datei composer.json sowie die source- und vendor-Ordner befinden.
- Führen Sie dort folgenden Befehl aus: `composer require ecs/markdown2oxid`
- Loggen Sie sich in Ihren Shop-Admin ein und aktivieren das neue Modul unter Erweiterungen/Module.

### Bedienung
- Vorhandenen WYSIWYG Editor deaktivieren oder bei aktiven WYSIWYG Editor in den Quelltext-Modus wechseln ( Button `</>` ).
- Die Lanbeschreibung / CMS-Seite mit `{md}` beginnen, um Markdown zu aktivieren (Kürzel wird nicht im Shop angezeigt).
- Texte mit Markdown formatieren: <https://ecomstyle.de/blog/markdown2oxid-doku/>

### License
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.

