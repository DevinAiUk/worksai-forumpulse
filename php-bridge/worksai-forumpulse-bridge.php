<?php
/**
 * Package: WorksAi ForumPulse — Community Spam Defense & Schema.org FAQPage Synthesizer Bridge
 * URI: https://forumpulse.worksai.org
 * Version: 1.2.0
 * License: MIT
 */
declare(strict_types=1);
namespace WorksAi\ForumPulse;

final class ForumModerationBridge {
    public static function moderateLocal(array $thread): array {
        $title = trim((string)($thread['title'] ?? ''));
        $questionBody = trim((string)($thread['questionBody'] ?? ''));
        $acceptedAnswer = trim((string)($thread['acceptedAnswer'] ?? 'Pending community resolution.'));
        if ($title === '' || $questionBody === '') {
            throw new \InvalidArgumentException('ValidationError: thread title and questionBody are required.');
        }
        $combined = $title . ' ' . $questionBody . ' ' . $acceptedAnswer;
        preg_match_all('/https?:\/\//i', $combined, $matches);
        $linkCount = count($matches[0]);
        $hasToxic = preg_match('/scam-link-farm|buy-cheap-pills|casino-bonus-spam/i', $combined) === 1;
        $spamScore = min(100, $linkCount * 25 + ($hasToxic ? 80 : 0));
        $quarantined = $spamScore >= 60;

        $safeTitle = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $safeAnswer = htmlspecialchars($acceptedAnswer, ENT_QUOTES, 'UTF-8');
        $faqJsonLd = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => [[
                '@type' => 'Question',
                'name' => $safeTitle,
                'acceptedAnswer' => [
                    '@type' => 'Answer',
                    'text' => $safeAnswer
                ]
            ]]
        ];
        return [
            'quarantined' => $quarantined,
            'spamScore' => $spamScore,
            'sanitizedTitle' => $safeTitle,
            'faqJsonLdString' => json_encode($faqJsonLd, JSON_UNESCAPED_SLASHES)
        ];
    }
}
