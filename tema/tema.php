<?php

namespace HUU;

class Tema {
	public function yukle(){
		add_integration_function('integrate_menu_buttons', self::class.'::addThemeSettingsLinkMenuItem', false);
		add_integration_function('integrate_setup_profile_context', self::class.'::loadCustomFields', false);
	}


	/**
	 * @param $buttons
	 */
	public function addThemeSettingsLinkMenuItem(&$buttons)
	{
		global $txt, $scripturl, $settings;

		$buttons['admin']['sub_buttons']['current_theme'] = array(
			'title' => $txt['bese_theme_settings'],
			'href' => $scripturl . '?action=admin;area=theme;sa=list;th=' . $settings['theme_id'],
			'show' => allowedTo('admin_forum'),
		);
	}

	/**
	 * @param $fields
	 */
	public static function loadCustomFields(&$fields)
	{
		if (empty($_REQUEST['area']))
			return;

		if ($_REQUEST['area'] === 'theme')
		{
			$fields[] = 'hr';
			$fields[] = 'default_options[bese_dark_mode]';
		}
	}

}