# Events & Conferences Images

This folder contains images for the Events & Conferences page.

## Image Guidelines

### Recommended Specifications:
- **Aspect Ratio**: 5:3 (e.g., 1200x720px, 1000x600px, 800x480px)
- **Format**: JPG or PNG
- **File Size**: Optimized for web (< 500KB recommended)
- **Minimum Width**: 800px
- **Quality**: High resolution for retina displays

### Naming Convention:
Use descriptive, URL-friendly names matching the event slug:
```
insol-singapore-2019.jpg
debtwire-hong-kong-2018.jpg
restructuring-roundtable-2015.jpg
```

### Adding Images to Events:

1. **Save the image** to this folder: `assets/img/events/`

2. **Update the JSON file**: Edit `assets/db/events.json` and add the image filename:
```json
{
    "id": 1,
    "slug": "insol-singapore-annual-regional-conference-2019",
    "title": "INSOL Singapore Annual Regional Conference",
    "image": "insol-singapore-2019.jpg",
    ...
}
```

3. **Test the display**: Visit the events page to verify the image appears correctly

### Image Optimization Tips:
- Compress images using tools like TinyPNG or ImageOptim
- Use progressive JPEG format for better loading experience
- Consider WebP format for modern browsers (with JPG fallback)
- Crop images to focus on key elements (speakers, venues, branding)

## Placeholder Behavior:
If no image is specified (empty string or missing field), the card will show a green gradient background with a calendar icon.

## Current Implementation:
The template expects images at path: `/assets/img/events/{filename}`

Example:
```twig
{% if event.image %}
    style="background-image: url('{{ base_url() }}/assets/img/events/{{ event.image }}');"
{% endif %}
```
