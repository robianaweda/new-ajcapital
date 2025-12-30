# Event Placeholder Image Generator Guide

## Quick Start

1. **Open the Generator**
   - Navigate to: `assets/img/events/generate-placeholders.html`
   - Open this file in your web browser (Chrome, Firefox, or Edge recommended)

2. **Generate Images**
   - You'll see 5 different placeholder image styles
   - Each canvas shows a preview of the placeholder design
   - Click the "Download" button under any canvas to save that image

3. **Available Themes**

   ### 1. Conference Theme (`event-conference-placeholder.jpg`)
   - Green gradient with geometric circles
   - Podium/speaker icon
   - Best for: Conferences, Seminars, Industry Events
   - Example: INSOL Singapore Conference, Restructuring Forums

   ### 2. Networking Theme (`event-networking-placeholder.jpg`)
   - Network nodes and connections design
   - Symbolizes collaboration and networking
   - Best for: Roundtable Discussions, Networking Events
   - Example: Debtwire Roundtable, Asia-Pacific Forums

   ### 3. Workshop/Training Theme (`event-workshop-placeholder.jpg`)
   - Presentation board icon
   - Educational feel
   - Best for: Workshops, Training Sessions, Career Events
   - Example: Career Workshop, Case Simulations

   ### 4. International Forum Theme (`event-forum-placeholder.jpg`)
   - Globe/world design with latitude/longitude lines
   - Global perspective
   - Best for: International Forums, Regional Conferences
   - Example: Asia-Pacific Conferences, Global Summits

   ### 5. Minimal Theme (`event-minimal-placeholder.jpg`)
   - Simple calendar icon
   - Clean and professional
   - Best for: Any Event Type (Generic/Universal)
   - Example: One Day Seminars, Generic Events

## How to Use Downloaded Images

### Step 1: Save the Image
1. Click "Download" button for your chosen theme
2. Save to: `assets/img/events/` folder
3. Rename the file to match your event (optional but recommended)
   - Example: `insol-singapore-2019.jpg`

### Step 2: Update events.json
Open `assets/db/events.json` and add the image filename:

```json
{
    "id": 1,
    "slug": "insol-singapore-annual-regional-conference-2019",
    "title": "INSOL Singapore Annual Regional Conference",
    "date": "2-4 April 2019",
    "shortDate": "2019-04-02",
    "excerpt": "AJCapital was a corporate sponsor...",
    "image": "event-conference-placeholder.jpg",
    "location": "Singapore",
    "organizer": "INSOL International"
}
```

### Step 3: Test
Visit the events page: `http://ajcapital.local/EN/eventsandconferences`

## Customization Tips

### If you want to customize the colors:
1. Open `generate-placeholders.html` in a text editor
2. Find the gradient colors:
   - Primary green: `#06832a`
   - Dark green: `#045a1d`
   - Medium green: `#048024`
3. Replace with your desired colors
4. Reload the page in browser

### If you want different dimensions:
1. Change the canvas width and height in the HTML:
   ```html
   <canvas id="canvas1" width="1200" height="720"></canvas>
   ```
2. Common sizes:
   - 1200x720 (5:3 ratio - default)
   - 1600x960 (5:3 ratio - higher res)
   - 1920x1152 (5:3 ratio - full HD)

### If you want to add text/branding:
1. Modify the JavaScript for each canvas
2. Look for the "Text" section in each draw function
3. Add your custom text using `ctx.fillText()`

## Image Specifications

- **Format**: JPEG (90% quality)
- **Dimensions**: 1200 x 720 pixels
- **Aspect Ratio**: 5:3 (same as card display ratio)
- **File Size**: ~50-150KB (optimized for web)
- **Color Space**: RGB

## Alternative: Using Online Tools

If you prefer using online tools instead:

### Recommended Tools:
1. **Canva** (canva.com)
   - Template size: 1200 x 720 px
   - Use green color: #06832a
   - Add icons: calendar, briefcase, globe
   - Export as JPG

2. **Figma** (figma.com)
   - Create frame: 1200 x 720
   - Design with brand colors
   - Export as JPG @ 2x

3. **Adobe Spark** (spark.adobe.com)
   - Social media post size (custom: 1200x720)
   - Professional templates available

4. **Placeit** (placeit.net)
   - Event poster templates
   - Resize to 1200x720

## Getting Real Event Photos

### Best Practices:
1. **During Events**: Take photos of:
   - Venue exterior/interior
   - Speaker panels
   - Audience/attendees (with permission)
   - Signage and branding

2. **Photo Requirements**:
   - Minimum 1200px width
   - Good lighting
   - Professional composition
   - Include AJCapital branding if possible

3. **Copyright**:
   - Use only photos you own or have rights to
   - Event organizer photos (with permission)
   - Stock photos (with proper license)

## Troubleshooting

**Canvas appears blank?**
- Make sure JavaScript is enabled in your browser
- Try a different browser (Chrome recommended)

**Download not working?**
- Right-click on the canvas and select "Save Image As..."

**Image looks blurry on website?**
- Use higher resolution (1600x960 or 1920x1152)
- Ensure JPG quality is at least 85%

**Want different styles?**
- Contact your web developer to customize the generator
- Or use the online tools mentioned above

## Need Help?

For questions or custom placeholder designs, contact the web development team.
