<?php
/**
 * FuelPHP ChatWork Packages
 *
 * @author    Kotaro Chiba
 * @copyright Kotaro Chiba
 * @license   MIT License http://www.opensource.org/licenses/mit-license.php
 * @package   Fuel
 */
namespace ChatWork\Model;

use ChatWork\Model;
use ChatWork\Collection\Rooms;
use ChatWork\Collection\Tasks;
use ChatWork\Collection\Contacts;

/**
 * Current user model
 *
 * @package chatwork
 * @extends ChatWork\Model
 */
class CurrentUser extends Model
{
	protected $account_id        = 0;
	protected $room_id           = 0;
	protected $name              = '';
	protected $chatwork_id       = '';
	protected $organization_id   = 0;
	protected $organization_name = '';
	protected $department        = '';
	protected $title             = '';
	protected $url               = '';
	protected $introduction      = '';
	protected $mail              = '';
	protected $tel_organization  = '';
	protected $tel_extension     = '';
	protected $tel_mobile        = '';
	protected $skype             = '';
	protected $facebook          = '';
	protected $twitter           = '';
	protected $avatar_image_url  = '';

	/**
	 * Get status
	 *
	 * @return array
	 */
	public function get_status()
	{
		$api = parent::get_api();
		return $api->get_my_status();
	}

	/**
	 * Get rooms
	 *
	 * @return ChatWork\Model\Room[]
	 */
	public function get_rooms()
	{
		return Rooms::find();
	}

	/**
	 * Get tasks
	 *
	 * @param	array
	 * @return ChatWork\Model\Task[]
	 */
	public function get_tasks($params = array())
	{
		return Tasks::find('self');
	}

	/**
	 * Get contact list
	 *
	 * @return ChatWork\Model\Contact[]
	 */
	public function get_contacts()
	{
		return Contacts::find();
	}

	/**
	 * Get my chat
	 *
	 * @return ChatWork\Model\Room
	 */
	public function get_room()
	{
		if (empty($this->room_id))
		{
			return null;
		}

		return Room::find($this->room_id);
	}
}
