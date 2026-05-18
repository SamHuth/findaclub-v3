# Site & Company — findaclub.com.au

## What is findaclub?

findaclub.com.au is an Australian sports club directory and discovery platform. It helps people find a local sports club to join, filtered by sport type, geographic location, and competition level. Club administrators can also list and manage their club's profile.

The site is built and maintained by Samuel Huth. It is currently on its third major version (v3), a rebuild using Timber/Twig templating.

---

## Audience

**Primary:** Australians looking to join a local sports club — any age, any sport, any skill level.

**Secondary:** Club administrators who want their club discoverable online and can receive enquiries through the site.

---

## Core Features

### Club Directory
- Clubs are a custom post type (`club`) managed through WordPress admin
- Each club belongs to one **sport**, one **state**, and one or more **regions** and **leagues**
- Clubs are displayed in filterable grid listings via the `[ClubList]` shortcode

### Filtering
Users can filter clubs by:
- Sport (tennis, hockey, cricket, etc.)
- State (all Australian states/territories)
- Region (sub-state geographic area)
- League (competition/division)
- Play opportunities: Mens, Womens, Juniors, Masters, Coach

### Premium Clubs
- Clubs can have a `is_premium` flag set in WordPress admin
- Premium clubs are sorted to the top of results
- They display a purple badge and additional information (positions, coach details)

### Club Data Fields
Each club stores the following post meta:

| Field key | Description |
|---|---|
| `address` | Physical address |
| `phone` | Club phone number |
| `email` | Club contact email |
| `website` | Club website URL |
| `bio` | Short club description |
| `about` | Longer about text |
| `training` | Training details/schedule |
| `training_days` | Specific training days |
| `coach_name` | Head coach name |
| `coach_title` | Coach title/role |
| `coach_email` | Coach email |
| `coach_phone` | Coach phone |
| `play_Mens` | `true` if men's teams available |
| `play_Womens` | `true` if women's teams available |
| `play_Juniors` | `true` if junior teams available |
| `play_Masters` | `true` if masters teams available |
| `play_Coach` | `true` if coaching positions available |
| `is_premium` | `true` for premium clubs |
| `top_league` | Primary league for SEO purposes |

### URL Structure
Clubs use a custom permalink: `/sport/state/club-slug/`
Example: `/tennis/victoria/melbourne-tennis-club/`

### SEO
- Dynamic meta titles: `Club Name | Sport club in State`
- Dynamic meta descriptions: `View teams and opportunities available at [Club], a [Sport] club based in [Location]`
- Handled via The SEO Framework plugin hooks in `filters.php`

### Shortcode
`[ClubList]` renders a responsive grid of clubs. Attributes:

| Attribute | Description |
|---|---|
| `sport` | Filter by sport slug |
| `state` | Filter by state slug |
| `region` | Filter by region slug |
| `league` | Filter by league slug |
| `limit` | Max clubs to show |
| `premium_only` | Show only premium clubs |
| `name` | Filter by club name |
| `id` | Show specific club by ID |
| `link` | Custom link URL |
| `link_text` | Custom link text |

### Contact
Contact Form 7 is used for club enquiry forms. Custom attributes route submissions to the right club/email.

---

## Plugin Architecture

The theme depends on a companion plugin: `wp-content/plugins/findaclub/`

The plugin owns all business logic. The theme owns all presentation.

| File | Responsibility |
|---|---|
| `findaclub.php` | Plugin bootstrap |
| `actions.php` | CPT registration, taxonomy registration, query filtering (27 per page, premium boost) |
| `shortcodes.php` | `[ClubList]` shortcode rendering |
| `filters.php` | SEO meta tags, custom URL rewrites |
| `admin.php` | Custom admin dashboard widget, field documentation |

---

## Theme File Map

| Path | Purpose |
|---|---|
| `functions.php` | Loads Timber, bootstraps `StarterSite` |
| `src/StarterSite.php` | Main theme class — hooks, context, Twig extensions |
| `views/` | All Twig templates |
| `views/base.twig` | Master layout (header, footer, nav, content wrapper) |
| `views/single.twig` | Single post display |
| `views/page.twig` | Page template |
| `views/archive.twig` | Archive/listing template |
| `views/tease.twig` | Reusable post card component |
| `static/` | Static CSS and JS assets (served directly, no build step) |
| `static/site.js` | Minimal custom JS |
| `composer.json` | PHP dependencies (Timber) |
