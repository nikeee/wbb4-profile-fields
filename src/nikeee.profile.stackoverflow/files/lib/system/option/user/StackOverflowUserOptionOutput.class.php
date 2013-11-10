<?php
namespace wcf\system\option\user;
use wcf\data\user\option\UserOption;
use wcf\data\user\User;
use wcf\util\StringUtil;

/**
 * User option output implementation for the output of a StackOverflow user profile.
 * 
 * @author	Niklas Mollenhauer
 * @copyright	2013 Niklas Mollenhauer
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 * @package	com.woltlab.wcf
 * @subpackage	system.option.user
 * @category	Community Framework
 */
class StackOverflowUserOptionOutput implements IUserOptionOutput {
	/**
	 * @see	wcf\system\option\user\IUserOptionOutput::getOutput()
	 */
	public function getOutput(User $user, UserOption $option, $value) {
		if (empty($value) || $value <= 0) return '';
		
		$flairLink = 'https://stackoverflow.com/users/flair/';
		$flairPostfix = '.png';
		$profileLink = 'https://stackoverflow.com/users/';

		$value = trim($value);
		$imageUrl = $flairLink . $value . $flairPostfix;
		$linkUrl = $profileLink . $value;

		$imageUrl = StringUtil::encodeHTML($imageUrl);
		$linkUrl = StringUtil::encodeHTML($linkUrl);
		$value = StringUtil::encodeHTML($value);

		return '<a href="'.$linkUrl.'" class="externalURL"'.(EXTERNAL_LINK_REL_NOFOLLOW ? ' rel="nofollow"' : '').(EXTERNAL_LINK_TARGET_BLANK ? ' target="_blank"' : '').'><img src="'.$imageUrl.'" alt="'.$value.'" /></a>';
	}
}
