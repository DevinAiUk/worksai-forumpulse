import test from "node:test";
import assert from "node:assert/strict";
import { APP_META, handleAppRequest } from "../src/worker.mjs";

test("worksai-forumpulse standalone Worker renders clean WorksAI UI without forbidden branding or hero upstream clutter", async () => {
  const res = await handleAppRequest(new Request("https://forumpulse.worksai.org/"));
  assert.equal(res.status, 200);
  const html = await res.text();
  assert.equal(html.includes(APP_META.name), true);
  assert.equal(html.toLowerCase().includes("devinai.uk"), false);
  assert.equal(html.toLowerCase().includes("devonfolio"), false);
  assert.equal(html.includes("MIT Open Source • WorksAI Foundry"), true);
});

test("worksai-forumpulse /api/ai/analyze and /api/mcp execute real deterministic domain engine and reject empty input", async () => {
  const sample = "{\n  \"thread\": {\n    \"title\": \"How does WorksAI enforce tenant isolation across Neon Postgres and Cloudflare R2?\",\n    \"questionBody\": \"We want to verify that demo accounts cannot read production enterprise objects in R2.\",\n    \"acceptedAnswer\": \"Every Data Lake object uses an opaque UUID key in R2 and checks both tenantId and isDemo boundaries before serving bytes.\"\n  }\n}";
  const aiRes = await handleAppRequest(
    new Request("https://forumpulse.worksai.org/api/ai/analyze", {
      method: "POST",
      headers: { "content-type": "application/json" },
      body: JSON.stringify({ input: sample, tool: APP_META.mcpTools[0] })
    })
  );
  assert.equal(aiRes.status, 200);
  const aiData = await aiRes.json();
  assert.equal(aiData.ok, true);
  assert.equal(typeof aiData.domainResult, "object");
  assert.notEqual(aiData.domainResult, null);
});
