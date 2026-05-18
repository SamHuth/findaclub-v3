# Tech Stack — findaclub-v3

## Requirements

| Requirement | Version |
|---|---|
| WordPress | 6.9.0+ |
| PHP | 8.2.3+ |
| Composer | Required (only package manager) |

---

## Core Stack

### WordPress
Standard WordPress installation. No headless, no REST-only approach — this is a traditional server-rendered WordPress site with a custom theme.

### Timber 2.x
[Timber](https://timber.github.io/docs/) is the templating engine. It bridges WordPress and Twig — PHP files set up context data, Twig files handle all HTML output.

- Installed via Composer: `"timber/timber": "2.x-dev"`
- PHP template files (e.g. `single.php`) are minimal — they only fetch data and call `Timber::render()`
- All presentation lives in `.twig` files under `views/`

### Twig 3.x
All HTML is written in Twig templates. Never write HTML in PHP files.

- Templates live in `views/`
- Use Timber's Twig extensions for image resizing, date formatting, etc.
- Template naming follows WordPress hierarchy: `single-{post_type}.twig`, `page-{slug}.twig`, etc.
- Timber renders an array of template names — first match wins

### Composer
The only package manager. No npm, no Yarn, no Node.

```bash
composer install    # install dependencies
composer update     # update dependencies
```

---

## Front-End

### CSS
- Plain CSS — no preprocessor (no SASS, no PostCSS, no Tailwind)
- No CSS framework in v3 (v2 used Bootstrap 5 — do not port Bootstrap patterns into v3)
- CSS files live in `static/` and are served directly with no build step
- Use CSS custom properties (`--var-name`) for any repeated values
- Class naming convention: BEM-style (`.block__element--modifier`)

### JavaScript
- jQuery only — no React, Vue, Alpine, or other frameworks
- Minimal custom JS in `static/site.js`
- No bundler — JS files are served directly from `static/`
- If adding JS, enqueue it in `src/StarterSite.php` via `wp_enqueue_script()`

### No Build Step
There is no Webpack, Vite, Gulp, or Grunt. Edit CSS and JS files directly. They are served as-is.

---

## PHP Patterns

### OOP Theme Class
The theme is structured around a single class: `StarterSite` in `src/StarterSite.php`.

```php
class StarterSite extends Timber\Site {
    public function __construct() {
        add_action('after_setup_theme', [$this, 'theme_supports']);
        add_action('init', [$this, 'register_post_types']);
        add_filter('timber/context', [$this, 'add_to_context']);
        // ...
    }
}
```

### WordPress Hooks
All theme customisation goes through WordPress hooks (`add_action`, `add_filter`). Do not call theme functions directly — hook them in.

### Custom Post Meta
There is **no ACF (Advanced Custom Fields)**. All custom data uses standard WordPress post meta:

```php
get_post_meta($post_id, 'field_key', true);
update_post_meta($post_id, 'field_key', $value);
```

Field keys are documented in [site.md](site.md).

### Template Rendering Pattern
PHP templates are thin wrappers:

```php
$context = Timber::context();
$context['post'] = Timber::get_post();
Timber::render(['single-club.twig', 'single.twig'], $context);
```

---

## Testing

- **PHPUnit** with **WorDBless** for unit tests
- Tests live in `tests/`
- No browser tests, no JS tests
- Run tests with: `./vendor/bin/phpunit`

---

## Conventions to Follow

| Rule | Why |
|---|---|
| HTML in `.twig` only | Keeps PHP clean; enforced by Timber architecture |
| Enqueue assets via `wp_enqueue_*` | Never hardcode `<script>` or `<link>` tags in templates |
| Post meta over ACF | No ACF plugin dependency; simpler data model |
| Hooks for everything | Makes the theme extendable and testable |
| No Bootstrap classes | v3 is not Bootstrap-based; use custom CSS |
| No npm/Node tooling | No build step by design; keeps the setup simple |

---

## Deliberate Omissions

These were consciously excluded — do not introduce them:

- **ACF / Advanced Custom Fields** — not installed, not needed
- **Bootstrap** — used in v2 only, not v3
- **SASS/SCSS** — plain CSS is sufficient
- **npm / Node / Webpack / Vite** — no build pipeline by design
- **Block editor (Gutenberg) custom blocks** — not used; classic editor patterns only
- **React / Vue / Alpine** — jQuery only on the front end
