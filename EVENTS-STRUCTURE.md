# Events & Conferences - Structure Documentation

## URL Structure

### Event Detail Page URL Pattern
```
http://ajcapital.local/EN/eventsandconferences/{year}/{month}/{day}/{slug}
```

### Example URLs
```
http://ajcapital.local/EN/eventsandconferences/2019/04/02/insol-singapore-annual-regional-conference-2019
http://ajcapital.local/EN/eventsandconferences/2018/10/11/debtwire-asia-pacific-distressed-debt-forum-2018
http://ajcapital.local/EN/eventsandconferences/2015/02/05/restructuring-roundtable-2015
```

### URL Parameters
- `{year}` - 4 digit year (e.g., 2019)
- `{month}` - 2 digit month (e.g., 04)
- `{day}` - 2 digit day (e.g., 02)
- `{slug}` - URL-friendly event identifier (e.g., insol-singapore-annual-regional-conference-2019)

---

## Page Architecture

### Route Handler
**File**: `app/routes.php` (line 245-284)

**Logic**:
1. Extract year, month, day, and slug from URL
2. Load events from `assets/db/events.json`
3. Find matching event by slug and date
4. Return 404 if event not found
5. Render template with event data

### Template File
**File**: `app/resources/views/en/eventsandconferences-detail.twig`

---

## Page Structure (Visual Layout)

```
┌─────────────────────────────────────────────────────────┐
│  BREADCRUMB                                             │
│  Home > Events & Conferences > [Event Title]            │
├─────────────────────────────────────────────────────────┤
│                                                         │
│  ┌───────────────────────────────────────────────┐     │
│  │  EVENT HEADER                                 │     │
│  │  ─────────────────────────────────────────── │     │
│  │  [Event Title - H1]                          │     │
│  │  📅 Date    📍 Location                      │     │
│  └───────────────────────────────────────────────┘     │
│                                                         │
│  ┌───────────────────────────────────────────────┐     │
│  │  EVENT CONTENT                                │     │
│  │                                               │     │
│  │  [Full Description - Multiple Paragraphs]    │     │
│  │                                               │     │
│  │  ┌─────────────────────────────────────┐     │     │
│  │  │  EVENT INFO BOX (Green Border)      │     │     │
│  │  │  • Venue: [Venue Name]              │     │     │
│  │  │  • Organized by: [Organizer]        │     │     │
│  │  │  • Reference: [Link] 🔗             │     │     │
│  │  └─────────────────────────────────────┘     │     │
│  └───────────────────────────────────────────────┘     │
│                                                         │
│  ┌───────────────────────────────────────────────┐     │
│  │  FOOTER                                       │     │
│  │  [← Back to Events & Conferences Button]     │     │
│  └───────────────────────────────────────────────┘     │
└─────────────────────────────────────────────────────────┘
```

---

## Component Breakdown

### 1. Breadcrumb Navigation
```html
Home > Events & Conferences > [Event Title]
```

**Purpose**:
- Shows user's current location in site hierarchy
- Provides quick navigation back to parent pages

**Styling**:
- Background: Light gray (#f8f9fa)
- Links: Green (#2c5530)
- Active item: Gray text

---

### 2. Event Header Section

#### Title (H1)
- **Font**: 2rem (32px), bold 600
- **Color**: Dark green (#2c5530)
- **Example**: "INSOL Singapore Annual Regional Conference"

#### Meta Information
Shows inline with icons:
- **📅 Date**: "2-4 April 2019"
- **📍 Location**: "Singapore"

**Styling**:
- Font size: 0.95rem
- Color: Gray (#666)
- Icons: Green (#2c5530)

**Visual Separator**:
- 2px solid green bottom border

---

### 3. Event Content Section

#### Description
- **Content**: Full event description (from `description` field in JSON)
- **Format**: Multi-paragraph text with line breaks preserved
- **Font size**: 1rem (16px)
- **Line height**: 1.7 (good readability)
- **Color**: Dark gray (#333)

#### Info Box (Highlighted Section)
A bordered box containing structured metadata:

**Appearance**:
- Background: Light gray (#f8f9fa)
- Left border: 4px solid green (#2c5530)
- Padding: 1.25rem
- Border radius: 0.5rem

**Contains**:
1. **Venue**
   - Label: "Venue:" (green, bold)
   - Value: e.g., "Marina Bay Sands Expo® and Convention Centre"

2. **Organizer**
   - Label: "Organized by:" (green, bold)
   - Value: e.g., "INSOL International"

3. **Reference Link** (if available)
   - Label: "Reference:" (green, bold)
   - Value: Clickable external link with icon
   - Opens in new tab (target="_blank")
   - Example: "https://www.insol.org/events/detail/76 🔗"

---

### 4. Footer Section

#### Back Button
```
← Back to Events & Conferences
```

**Styling**:
- Type: Outline button
- Color: Green border with green text
- Hover: Filled green background with white text
- Padding: 0.5rem 1.5rem
- Icon: Left arrow

**Functionality**:
- Returns user to events listing page
- URL: `/EN/eventsandconferences`

---

## Data Flow

### From JSON to Template

**events.json structure**:
```json
{
    "id": 1,
    "slug": "insol-singapore-annual-regional-conference-2019",
    "title": "INSOL Singapore Annual Regional Conference",
    "date": "2-4 April 2019",
    "shortDate": "2019-04-02",
    "excerpt": "Short description...",
    "description": "Full detailed description...",
    "venue": "Marina Bay Sands Expo® and Convention Centre",
    "location": "Singapore",
    "organizer": "INSOL International",
    "reference": "https://www.insol.org/events/detail/76",
    "image": "events-1.jpg",
    "featured": true
}
```

**Template variables**:
- `page.event.title` → Event title (H1)
- `page.event.date` → Display date
- `page.event.location` → Location with icon
- `page.event.description` → Full description (nl2br filter)
- `page.event.venue` → Venue name
- `page.event.organizer` → Organizer name
- `page.event.reference` → External link (optional)

---

## Responsive Design

### Desktop (> 768px)
- Full width layout
- Title: 2rem (32px)
- Info labels: Inline with values

### Mobile (≤ 768px)
- Title: 1.5rem (24px)
- Info labels: Block display (stacked above values)
- Full width components
- Adjusted padding and spacing

---

## Color Scheme

| Element | Color | Hex Code |
|---------|-------|----------|
| Primary Green | Dark Green | #2c5530 |
| Hover Green | Medium Green | #4a8a4f |
| Text | Dark Gray | #333 |
| Meta Text | Gray | #666 |
| Background (Info Box) | Light Gray | #f8f9fa |
| Border | Light Gray | #dee2e6 |

---

## Key Features

### ✅ Implemented
1. **SEO-Friendly URLs** - Date and slug based
2. **Breadcrumb Navigation** - Clear hierarchy
3. **Responsive Design** - Mobile and desktop optimized
4. **External Links** - Open in new tab with icon
5. **Conditional Display** - Only shows available fields
6. **Clean Typography** - Readable line height and spacing
7. **Visual Hierarchy** - Clear content structure
8. **Back Navigation** - Easy return to listing

### 🎨 Design Consistency
- Matches overall AJCapital brand colors
- Green accents throughout
- Professional financial services aesthetic
- Clean, minimal design

---

## Usage Examples

### Creating URL for Existing Event

1. Find event in `events.json`:
```json
{
    "slug": "insol-jakarta-one-day-seminar-2018",
    "shortDate": "2018-09-13"
}
```

2. Build URL:
```
Year: 2018
Month: 09
Day: 13
Slug: insol-jakarta-one-day-seminar-2018

Final URL:
http://ajcapital.local/EN/eventsandconferences/2018/09/13/insol-jakarta-one-day-seminar-2018
```

### Adding New Event

1. **Add to JSON** (`assets/db/events.json`):
```json
{
    "id": 12,
    "slug": "new-event-2025",
    "title": "New Event Title",
    "date": "15 January 2025",
    "shortDate": "2025-01-15",
    "excerpt": "Brief description...",
    "description": "Full description here...",
    "venue": "Event Venue",
    "location": "City Name",
    "organizer": "Organizer Name",
    "reference": "https://example.com",
    "image": "events-12.jpg",
    "featured": false
}
```

2. **Automatic URL Generation**:
```
http://ajcapital.local/EN/eventsandconferences/2025/01/15/new-event-2025
```

3. **No template changes needed** - Dynamic routing handles it!

---

## Related Files

### Templates
- **Listing Page**: `app/resources/views/en/eventsandconferences.twig`
- **Detail Page**: `app/resources/views/en/eventsandconferences-detail.twig`

### Data
- **Events Data**: `assets/db/events.json`
- **Event Images**: `assets/img/events/`

### Routes
- **Route Definition**: `app/routes.php` (lines 228-284)

---

## Common Issues & Solutions

### Issue: 404 Not Found
**Cause**:
- Slug doesn't match JSON
- Date parameters don't match shortDate
- Event doesn't exist in JSON

**Solution**:
- Verify slug matches exactly (case-sensitive)
- Check date format: YYYY-MM-DD in shortDate
- Ensure event exists in events.json

### Issue: Missing Information
**Cause**: Optional fields empty in JSON

**Solution**:
- Template uses conditional display (`{% if %}`)
- Only populated fields will show
- Not an error - by design

### Issue: Link Doesn't Work from Listing
**Cause**: URL generation mismatch

**Solution**:
- Listing uses: `base_url()` + `deal_url()` function
- Verify slug and shortDate are correct in JSON

---

## Future Enhancements (Suggested)

1. **Featured Image Display**
   - Add large hero image at top of detail page
   - Use `event.image` field
   - Similar to deals detail page

2. **Social Sharing**
   - Add share buttons (LinkedIn, Twitter)
   - Professional networks focus

3. **Related Events**
   - Show similar events by location or organizer
   - Increase engagement

4. **Event Gallery**
   - Multiple images per event
   - Photo gallery component

5. **Attendees/Speakers**
   - List AJCapital representatives
   - Link to leadership profiles

6. **Download Materials**
   - Presentations, reports, photos
   - PDF downloads

---

## Testing URLs

Based on current events.json:

```
✅ http://ajcapital.local/EN/eventsandconferences/2019/04/02/insol-singapore-annual-regional-conference-2019
✅ http://ajcapital.local/EN/eventsandconferences/2018/10/11/debtwire-asia-pacific-distressed-debt-forum-2018
✅ http://ajcapital.local/EN/eventsandconferences/2018/09/13/insol-jakarta-one-day-seminar-2018
✅ http://ajcapital.local/EN/eventsandconferences/2017/08/24/singapore-insolvency-conference-2017
✅ http://ajcapital.local/EN/eventsandconferences/2016/09/14/insol-jakarta-one-day-seminar-2016
✅ http://ajcapital.local/EN/eventsandconferences/2016/05/17/debt-restructuring-asia-next-wave-2016
✅ http://ajcapital.local/EN/eventsandconferences/2015/11/20/introduction-restructuring-insolvency-indonesia-2015
✅ http://ajcapital.local/EN/eventsandconferences/2015/08/27/restructuring-spotlight-2015
✅ http://ajcapital.local/EN/eventsandconferences/2015/02/05/restructuring-roundtable-2015
✅ http://ajcapital.local/EN/eventsandconferences/2014/03/29/career-workshop-case-simulations-2014
✅ http://ajcapital.local/EN/eventsandconferences/2013/11/05/maximizing-outcomes-asia-restructuring-2013
```

All 11 events should have working detail pages!
