<?php
namespace CORE4\FalAwsS3\Utility;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Bernhard Schmitt <b.schmitt@core4.de>, CORE4 Werbeagentur
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *  A copy is found in the textfile GPL.txt and important notices to the license
 *  from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


/**
 * Driver configuration FlexForm utility
 *
 * @author Bernhard Schmitt <b.schmitt@core4.de>
 * @package TYPO3
 * @subpackage fal_aws_s3
 */
class FlexFormUtility implements \TYPO3\CMS\Core\SingletonInterface {

	/**
	 * @return FlexFormUtility
	 */
	public function __construct() {
		$configuration = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['fal_aws_s3']);
		if (!isset($configuration['composerPath']) || $configuration['composerPath'] === '') {
			$configuration['composerPath'] = PATH_site . 'typo3conf/';
		}
		require_once $configuration['composerPath'] . 'vendor/autoload.php';
	}

	/**
	 * @param \array& $config
	 * @return void
	 */
	public function addDriverConfigurationRegions(array& $config) {
		$regionOptions = array();
		$reflection = new \ReflectionClass('\Aws\Common\Enum\Region');

		foreach ($reflection->getConstants() as $constant => $value) {
			$regionOptions[] = array($constant, $value);
		}

		$config['items'] = array_merge($config['items'], $regionOptions);
	}

}

?>