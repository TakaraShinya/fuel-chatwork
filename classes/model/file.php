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
use ChatWork\Model\Room;
use ChatWork\Model\Message;

/**
 * File model
 *
 * @package chatwork
 * @extends ChatWork\Model
 */
class File extends Model
{
	/**
	 * Find file
	 *
	 * @param  int|string
	 * @param  int|string
	 * @param  array
	 * @return ChatWork\Model\File
	 */
	public static function find($room_id, $file_id, $conditions = array())
	{
		$api = parent::get_api();

		$result = $api->get_room_file($room_id, $file_id, $conditions);

		return new static($result, $room_id);
	}

	protected $file_id      = 0;
	protected $account      = array();
	protected $message_id   = 0;
	protected $filename     = '';
	protected $filesize     = 0;
	protected $upload_time  = 0;
	protected $download_url = '';

	/**
	 * Room id that task belongs
	 *
	 * @param int
	 */
	protected $room_id = null;

	/**
	 * Constructor
	 *
	 * @param array
	 * @param int
	 */
	public function __construct($data = array(), $room_id = null)
	{
		parent::__construct($data);

		$this->room_id = $room_id;
	}

	/**
	 * Get room
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

	/**
	 * Get message
	 *
	 * @return ChatWork\Model\Message
	 */
	public function get_message()
	{
		if (empty($this->room_id))
		{
			return null;
		}

		$message_id = $this->message_id;

		return Message::find($this->room_id, $message_id);
	}

	/**
	 * Get upload date
	 *
	 * @param  string
	 * @return string
	 */
	public function get_upload_datetime($format = 'Y-m-d H:i:s')
	{
		return $this->get_datetime($this->upload_time, $format);
	}
}
