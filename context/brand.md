# Brand & Style — findaclub

## Personality

findaclub is **professional, modern, and energetic** — it inspires people to get active and find their community. The tone is warm and encouraging without being overly casual. Think of a knowledgeable friend who loves sport and wants to help you get involved, not a corporate directory.

---

## Tone of Voice

- **Active and direct** — "Find your club" not "Clubs can be found here"
- **Encouraging** — Focus on opportunity and community
- **Plain language** — No jargon; accessible to all ages and sport backgrounds
- **Short sentences** — Especially on UI elements, cards, and CTAs
- **Australian English** — Colour (not color), organisation (not organization), etc.

**Example copy:**

> Find a club near you. Filter by sport, location, or team type and get in touch with your next club today.

Not:

> Our platform facilitates the discovery of sporting organisations across Australian regions.

---

## Colours

| Name | Hex | Usage |
|---|---|---|
| Primary Blue | `#0074d9` | Buttons, links, primary actions, nav branding |
| Primary Dark | `#015e96` | Hover states, overlays, dark backgrounds |
| Premium Purple | `#a900dd` | Premium club badges, special indicators |
| Warning Orange | `#e37705` | Alerts, warnings |
| Info Light Blue | `#d3e3f0` | Backgrounds, placeholder images, info boxes |
| Light Hover | `#ededed` | Card hover backgrounds |
| Light Primary | `#f1f6fe` | Subtle blue-tinted section backgrounds |
| Light Purple | `#faf3fc` | Subtle purple-tinted backgrounds |
| Neutral Gray | `#f5f5f5` | Page backgrounds, neutral sections |
| White | `#ffffff` | Card backgrounds, text on dark |
| Dark Text | `#212529` | Body copy |

---

## Typography

### Font Families

| Role | Font | Notes |
|---|---|---|
| Headings | **Bebas Neue** | Google Font; bold, confident, all-caps friendly |
| Body / UI | **Inter** | Google Font; clean, readable, modern sans-serif |

### Sizes

| Element | Size |
|---|---|
| h1 | `calc(1.375rem + 1.5vw)` → max `2.5rem` |
| h2 | `calc(1.325rem + 0.9vw)` → max `2rem` |
| h3 | `calc(1.3rem + 0.6vw)` → max `1.75rem` |
| h4 | `calc(1.275rem + 0.3vw)` → max `1.5rem` |
| h5 | `1.25rem` |
| h6 | `1rem` |
| Body | `1rem` (16px) |
| Line height | `1.5` |

---

## Layout & Spacing

| Token | Value |
|---|---|
| Base spacer | `1rem` |
| Grid gutter | `2rem` |
| Border radius (components) | `15px` |
| Border radius (small) | `0.25rem` |
| Border radius (large) | `1rem` |
| Container max-width | `1400px` |

### Breakpoints

| Name | Width |
|---|---|
| xs | `0` |
| sm | `450px` |
| md | `768px` |
| lg | `992px` |
| xl | `1200px` |
| xxl | `1400px` |

---

## Component Style

### Cards (Club Listings)
- 15px border radius
- 1px border in `#dee2e6`
- Logo: top-left positioned, `100×100px`, `object-fit: contain`
- Image: `250px` height, `object-fit: cover`, centered
- Hover: background shifts to `#ededed`, card lifts `translateY(-5px)`
- Transition: `all 0.3s ease`

### Buttons
- Primary: `#0074d9` background, white text
- Animated arrow icon on hover — moves `20px` to the right
- Transition: `all 0.3s ease`
- White variant: white background, dark text, hover to light gray

### Badges
- Text uppercase, small size
- Premium: purple (`#a900dd`) background
- Info: light blue (`#d3e3f0`) background with primary blue text

### Images
- Default club placeholder: `findaclub-pin.jpg`
- Hero/banner: full-width with gradient overlay (`linear-gradient(180deg, rgba(0,116,217,0.2), white)`)
- Always `object-fit: cover` to maintain aspect ratio

### Icons
- SVG-based checkmarks in primary blue for feature lists
- `24×24px`, circular background

---

## Mood Board in Words

Clean grid layouts. Bold Bebas Neue headlines. Plenty of white space. Energetic blue accents. A hint of premium purple for status. Cards that lift on hover. Smooth, purposeful transitions. Community photography — teams celebrating, people playing. Australian outdoor sport vibes.
