<?php
/**
 * FuelPHP ChatWork Packages
 *
 * @author    Kotaro Chiba
 * @copyright Kotaro Chiba
 * @license   MIT License http://www.opensource.org/licenses/mit-license.php
 * @package   Fuel
 */
namespace ChatWork\Collection;

use ChatWork\Collection;
use ChatWork\Model\Room;

/**
 * Room collection
 *
 * @package chatwork
 * @extends ChatWork\Collection
 */
class Rooms extends Collection
{
	/**
	 * Raw data to Room model
	 *
	 * @param  array
	 * @return ChatWork\Model\Room
	 */
	protected function to_model($data)
	{
		return new Room($data, $this->api);
	}
}
