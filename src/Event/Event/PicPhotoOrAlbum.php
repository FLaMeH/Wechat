<?php

namespace ISeeCoo\Wechat\Event\Event;

use ISeeCoo\Wechat\Event\Event;

class PicPhotoOrAlbum extends Event {
	public function isValid() {
		return ($this ['MsgType'] === 'event') && ($this ['Event'] === 'pic_photo_or_album');
	}
}
