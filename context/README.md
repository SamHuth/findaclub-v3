# LLM Context — findaclub-v3

This folder provides structured context for AI assistants (Claude, Copilot, Cursor, etc.) working on the findaclub-v3 WordPress theme and its companion plugin.

**Read all three files before making any changes.** Together they give you a complete picture of what the site does, how the code is structured, and how the brand should look and feel — so you can make suggestions that actually fit.

---

## Files

| File | What it covers |
|---|---|
| [site.md](site.md) | What findaclub is, who it's for, core features, plugin architecture, key file map |
| [tech-stack.md](tech-stack.md) | WordPress setup, Timber/Twig templating, CSS/JS approach, PHP patterns, coding conventions |
| [brand.md](brand.md) | Colours, typography, tone of voice, component style, mood |

---

## Scope note

The theme (`findaclub-v3`) and the plugin (`wp-content/plugins/findaclub/`) are tightly coupled — the plugin owns all custom post type, taxonomy, shortcode, and SEO logic. Changes to one often affect the other. Both are in scope for AI assistance.
