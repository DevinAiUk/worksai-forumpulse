export const APP_DB_CONFIG = {
  schema: "worksai_hub",
  appSlug: "worksai-forumpulse",
  subdomain: "forumpulse.worksai.org",
  mcpEndpoint: "https://forumpulse.worksai.org/api/mcp",
  aiEndpoint: "https://forumpulse.worksai.org/api/ai/analyze",
  mcpTools: ["forumpulse.score_moderation", "forumpulse.detect_duplicate_thread", "forumpulse.extract_faq_jsonld"]
} as const;
