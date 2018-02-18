<?php

/*    Please retain this copyright header in all versions of the software
*
*    Copyright (C)  Josef A. Puckl | eComStyle.de
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
namespace Ecs\Markdown2Oxid\Model;
use \OxidEsales\Eshop\Core\Registry;

class Article extends Article_parent {

	public function getLongDescription() {
		if ($this->_oLongDesc === null) {
			// initializing
			$this->_oLongDesc = new \OxidEsales\Eshop\Core\Field();
			// choosing which to get..
			$sOxid = $this->getId();
			$sViewName = getViewName('oxartextends', $this->getLanguage());
			$oDb = \OxidEsales\Eshop\Core\DatabaseProvider::getDb();
			$sDbValue = $oDb->getOne("select oxlongdesc from {$sViewName} where oxid = " . $oDb->quote($sOxid));
			// Start Markdown ///////////////////////////////////////////////////////////
			$sDbValue = Registry::getUtilsView()->markitdown($sDbValue);
			// Ende Markdown ///////////////////////////////////////////////////////////
			if ($sDbValue != false) {
				$this->_oLongDesc->setValue($sDbValue, \OxidEsales\Eshop\Core\Field::T_RAW);
			}
			elseif ($this->oxarticles__oxparentid->value) {
				if (!$this->isAdmin() || $this->_blLoadParentData) {
					$oParent = $this->getParentArticle();
					if ($oParent) {
						$this->_oLongDesc->setValue($oParent->getLongDescription()->getRawValue(), \OxidEsales\Eshop\Core\Field::T_RAW);
					}
				}
			}
		}
		return $this->_oLongDesc;
	}

}
