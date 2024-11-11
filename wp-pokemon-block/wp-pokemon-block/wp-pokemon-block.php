<?php
/**
 * Plugin Name:       Pokemon-block
 * Plugin URI:        https://www.shalser.ru/plugins-wp
 * Description:       Create pokemon block
 * Requires at least: 6.6
 * Requires PHP:      7.2
 * Version:           0.1.0
 * Author:            shalser
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       wp-pokemon-block
 *
 * @package Sh
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Renders the Pokémon block.
 *
 * @param array $attributes Block attributes.
 * @return string Rendered HTML of the Pokémon block.
 */


function wp_pokemon_block_render_callback($attributes)
{
	$type = $attributes['type'] ?? 'normal';

	// Ключ для кэша данных по типу покемонов
	$cache_key = "pokemon_data_{$type}";
	$data = get_transient($cache_key);

	// Если данных нет в кэше, делаем запрос к API
	if (false === $data) {
		$response = wp_remote_get("https://pokeapi.co/api/v2/type/{$type}");
		if (is_wp_error($response)) {
			return '<p>Не удалось загрузить данные покемонов.</p>';
		}

		$data = json_decode(wp_remote_retrieve_body($response), true);

		// Сохраняем данные в кэш на 1 час
		set_transient($cache_key, $data, HOUR_IN_SECONDS);
	}

	// Проверка на наличие покемонов нужного типа
	if (empty($data['pokemon'])) {
		return '<p>Покемоны данного типа не найдены.</p>';
	}

	$output = '<ul class="pokemon-list">';
	foreach (array_slice($data['pokemon'], 0, 1) as $pokemon) {
		$pokemon_name = ucfirst($pokemon['pokemon']['name']);
		$pokemon_url = $pokemon['pokemon']['url'];

		// Кэшируем информацию о каждом покемоне по имени и типу
		$pokemon_cache_key = "pokemon_info_{$type}_{$pokemon_name}";
		$pokemon_data = get_transient($pokemon_cache_key);

		if (false === $pokemon_data) {
			// Если данных нет в кэше, запрашиваем их
			$pokemon_data_response = wp_remote_get($pokemon_url);
			$pokemon_data = json_decode(wp_remote_retrieve_body($pokemon_data_response), true);

			// Сохраняем информацию о покемоне в кэше на 1 час
			set_transient($pokemon_cache_key, $pokemon_data, HOUR_IN_SECONDS);
		}

		$sprite_url = $pokemon_data['sprites']['front_default'] ?? '';

		$output .= "<li><img src='{$sprite_url}' alt='{$pokemon_name}' /><p>{$pokemon_name}</p></li>";
	}
	$output .= '</ul>';

	return $output;
}


/**
 * Registers the block using metadata from `block.json` and sets render callback.
 */
function sh_wp_pokemon_block_block_init() {
	register_block_type(
		__DIR__ . '/build',
		array(
			'render_callback' => 'wp_pokemon_block_render_callback',
		)
	);
}
add_action( 'init', 'sh_wp_pokemon_block_block_init' );
