<?php
declare(strict_types=1);
require_once __DIR__ . '/worksai-forumpulse-bridge.php';
use WorksAi\ForumPulse\ForumModerationBridge;

$clean = ForumModerationBridge::moderateLocal([
    'title' => 'How do I configure Cloudflare Email Routing?',
    'questionBody' => 'Verify destination address and configure MX records.',
    'acceptedAnswer' => 'Use route1, route2, and route3.mx.cloudflare.net.'
]);
assert($clean['quarantined'] === false, 'Expected clean thread not to be quarantined');
assert(str_contains($clean['faqJsonLdString'], '"@type":"FAQPage"'), 'Expected FAQPage JSON-LD');

$spam = ForumModerationBridge::moderateLocal([
    'title' => 'Promo',
    'questionBody' => 'Visit http://a.example and casino-bonus-spam now'
]);
assert($spam['quarantined'] === true, 'Expected toxic spam thread to be quarantined');
echo "ForumPulse PHP bridge tests passed.\n";
