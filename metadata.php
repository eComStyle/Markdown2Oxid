<?php
/*    Please retain this copyright header in all versions of the software
 *
 *    Copyright (C) Josef A. Puckl | eComStyle.de
 *
 *    This program is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU General Public License for more details.
 *
 *    You should have received a copy of the GNU General Public License
 *    along with this program.  If not, see {http://www.gnu.org/licenses/}.
 */

$sdesc ='<a href="https://de.wikipedia.org/wiki/Markdown" target="_blank" title="Wiki"><u><b>Markdown</b></u></a> f&uuml;r Artikel-Langbeschreibung und CMS-Seiten.<br>
Markdown kann, aber muss nicht immer verwendet werden.<br>
Markdown wird aktiviert, indem die erste Teile einer Artikel-Langbeschreibung oder CMS-Seite folgenderma&szlig;en aussieht:
<pre>{md}</pre>
Mit dem eigentlichen Inhalt wird in Zeile 2 begonnen, dier erste Zeile erscheint nicht auf der Website.<br>
Zur Vereinfachung k&ouml;nnen zus&auml;tzlich k&ouml;nnen folgende Platzhalter verwendet werden:
<pre>{img} -> https://shopurl.de/out/pictures/
{media} -> https://shopurl.de/out/media/
{shop} -> https://shopurl.de/</pre>';

$sMetadataVersion = '2.0';
$aModule = array(
    'id'           => 'ecs_markdown2oxid',
    'title'        => '<strong style="color:#04B431;">e</strong><strong>ComStyle.de</strong>:  <i>Markdown2Oxid</i>',
    'description'  => $sdesc,
    'version'      => '2.3.4',
    'thumbnail'    => 'ecs.png',
    'author'       => '<strong style="font-size: 17px;color:#04B431;">e</strong><strong style="font-size: 16px;">ComStyle.de</strong>',
    'email'        => 'info@ecomstyle.de',
    'url'          => 'https://ecomstyle.de',
    'extend'       =>  array(
        \OxidEsales\Eshop\Core\UtilsView::class                                 => Ecs\Markdown2Oxid\Core\UtilsView::class,
        \OxidEsales\Eshop\Application\Controller\ContentController::class       => Ecs\Markdown2Oxid\Controller\ContentController::class,
        \OxidEsales\Eshop\Application\Controller\ArticleListController::class   => Ecs\Markdown2Oxid\Controller\ArticleListController::class,
        \OxidEsales\Eshop\Application\Model\Article::class                      => Ecs\Markdown2Oxid\Model\Article::class,
    ),
    'blocks' => array(
        array('template' => 'page/list/list.tpl', 'block'=>'page_list_listhead', 'file'=>'/views/blocks/ecs_page_list_listhead.tpl'),
    ),
    'settings'          => array(
        array('group' => 'ecs_main', 'name' => 'ecs_pdextra', 'type' => 'bool', 'value' => false),
    ),
);
