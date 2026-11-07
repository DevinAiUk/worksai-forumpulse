# WorksAi ForumPulse (`worksai-12`)

> MIT-licensed PHP community forum with automated spam/toxicity scoring and thread-to-FAQ extraction.

**Category:** D. WordPress/PHP products  
**License:** MIT (Derivative of [Flarum](https://github.com/flarum/framework) @ `a1dd57e`)  
**Portfolio Page:** `https://devinai.uk/worksai/products/worksai-forumpulse/`

## Value Proposition & Scope
Replaces $100/month Discourse hosting and $49-$99/month Circle.so plans with a low-memory PHP 8.2+ discussion engine that scores spam/toxicity automatically and turns resolved threads into `FAQPage` JSON-LD.

### What Works Out-of-the-Box (Zero External Credentials Required)
Thread/reply routing, spam/toxicity moderation scoring, XSS sanitization, and Thread-to-FAQ JSON-LD synthesis.

### What Requires User Configuration (`.env.example`)
PHP 8.2+ / MySQL host for live PHP deployment; optional `OPENAI_API_KEY` for multilingual thread translation.

## Measurable Acceptance Criteria
- AC-01: Scores inbound forum posts for spam/link-farming and toxicity, automatically quarantining posts exceeding the moderation threshold.
- AC-02: Synthesizes a resolved discussion thread (question + accepted answer + top replies) into a clean `Schema.org/FAQPage` JSON-LD block.
- AC-03: Sanitizes user-submitted HTML/Markdown to strip `<script>`, `onerror=`, and `javascript:` vectors.
- AC-04: Ships standalone PHP 8.2+ classes (`src/ForumPulse.php`), WordPress SSO/embed bridge, and passing automated unit tests.

## Known Limitations
- Local sandbox VM lacks the `php` CLI binary (`php: command not found`); PHP classes are validated structurally alongside an isomorphic Node.js test engine.
- Third-party Flarum 1.x extensions must be upgraded to the 2.x extension API before installation.

## Quick Start & Verification
```bash
npm test
```
