# WorksAi ForumPulse (`worksai-forumpulse`)

> MIT-licensed PHP community forum with automated spam/toxicity scoring and thread-to-FAQ extraction.

- **Live Subdomain Application:** [https://forumpulse.worksai.org](https://forumpulse.worksai.org)
- **WorksAI Hub Specification:** [https://worksai.org/apps/worksai-forumpulse](https://worksai.org/apps/worksai-forumpulse)
- **Category:** D. WordPress/PHP products
- **License:** MIT (Derived from [Flarum](https://github.com/flarum/framework) @ `a1dd57e`)

## Capability Matrix
- **What You Can Do:** Install the working PHP 8.2+ / Flarum / WordPress bridge (worksai-forumpulse-bridge.php) or call the Edge API to score community threads for link-spam/toxicity and synthesize Schema.org FAQPage JSON-LD.
- **Deterministic Domain Utilities:** moderateThreadAndBuildFaqJsonLd (spam/toxicity scorer, quarantine gate, and Schema.org/FAQPage JSON-LD generator).
- **Genuine AI Model Features:** Cloudflare Workers AI (@cf/meta/llama-3.1-8b-instruct) multi-reply thread summarization into canonical FAQ answers.
- **Persisted R2/Neon Features:** Moderated thread audits and FAQPage JSON-LD schemas persisted in Cloudflare R2 (workspaces/worksai-forumpulse/*).
- **Known Limitations:** Automatic forum webhook moderation requires installing the downloadable PHP bridge on your Flarum or WordPress instance.

## Verification & Local Testing
```bash
npm run lint
npm run typecheck
npm test
```
