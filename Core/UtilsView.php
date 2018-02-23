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
namespace Ecs\Markdown2Oxid\Core;
use \OxidEsales\Eshop\Core\Registry;

class UtilsView extends UtilsView_parent {

	public function markitdown($value) {
		if ($this->isAdmin() or strncmp("{md}", $value, 4))
			return $value;
		$myConfig = Registry::getConfig();
		$pdextra = $myConfig->getConfigParam('ecs_pdextra');

		/* Platzhalter ersetzen */
		$imgurl = $myConfig->getOutUrl() . 'pictures/';
		$mediaurl = $myConfig->getOutUrl() . 'media/';
		$shopurl = $myConfig->getShopUrl();
		$search = array('{md}', '{img}', '{media}', '{shop}', '___', '__');
		$replace = array('', $imgurl, $mediaurl, $shopurl, '***', '§US§');
		$value = str_replace($search, $replace, $value);

		/* Parsedown */
		require_once ('Parsedown.php');
		if ($pdextra) {
			require_once ('ParsedownExtra.php');
			$Parsedown = new \ParsedownExtra();
		}
		else {
			$Parsedown = new \Parsedown();
		}
		$value = $Parsedown->text($value);

		/* Korrektur für Smarty Tags */
		$search = array('§US§', '-&gt;');
		$replace = array('__', '->');
		return str_replace($search, $replace, $value);
	}

}
