<?php
/**
 * Plugin Name:       WorksAi ForumPulse Companion Bridge
 * Plugin URI:        https://devinai.uk/worksai/products/worksai-forumpulse/
 * Description:       MIT-licensed PHP community forum with automated spam/toxicity scoring and thread-to-FAQ extraction. (MIT-licensed derivative of Flarum @ a1dd57e).
 * Version:           1.0.0
 * Requires at least: 6.4
 * Requires PHP:      8.2
 * Author:            WorksAi.org
 * Author URI:        https://worksai.org
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

require_once __DIR__ . '/src/Engine.php';
