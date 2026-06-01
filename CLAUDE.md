# Claude Instructions — findaclub-v3

Read the files in `context/` before making changes. They define the site purpose, tech stack, and brand.

---

## Rules

### No new dependencies
Do not suggest or install new WordPress plugins, Composer packages, npm packages, or any other external libraries. Solve problems using what is already installed. If something genuinely cannot be done without a new dependency, say so explicitly and let the developer decide — do not add it yourself.

### Write readable, componentised code
Code is read far more often than it is written. Prioritise clarity:
- Break templates into Twig partials rather than building long monolithic files
- Extract repeated PHP logic into named methods on `StarterSite` or helper functions
- Group related CSS rules with a short comment header to make scanning easy
- Use descriptive variable and function names over abbreviations

Componentise where it genuinely reduces repetition or improves clarity. Do not over-abstract for its own sake — three clear lines beat a confusing helper.

### Never change core brand without asking first
Do not modify brand colours, font families, or core visual style without prompting first. These are defined in `context/brand.md` and are intentional. If a task requires a brand decision (e.g. a new colour, a new typeface), pause and ask before implementing.

### Australian English
Use Australian English spelling in all code comments, copy, and documentation.

| Use | Not |
|---|---|
| colour | color |
| organisation | organization |
| customise | customize |
| behaviour | behavior |
| centre | center |
| licence (noun) | license |

### Follow WordPress best practices
- Enqueue all CSS and JS via `wp_enqueue_style()` / `wp_enqueue_script()` — never hardcode `<link>` or `<script>` tags in templates
- Register everything through hooks (`add_action`, `add_filter`) — do not call functions directly at file scope
- Prefix all custom function names, post meta keys, and option names with `fac_` to avoid collisions
- Sanitise all input with the appropriate WordPress function (`sanitize_text_field()`, `absint()`, etc.)
- Escape all output with the appropriate WordPress function (`esc_html()`, `esc_url()`, `esc_attr()`, etc.)
- Use `get_post_meta()` / `update_post_meta()` for custom fields — there is no ACF in this project


Design inspo
https://dribbble.com/shots/23892478-Sports-Club-Landing-page-for-a-SaaS-software-platform
https://dribbble.com/shots/25596911-Website-design-concepting-for-MVP-Sports-Club
https://dribbble.com/shots/26073053--Sports-Coach-Booking-App