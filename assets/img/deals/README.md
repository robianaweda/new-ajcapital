# Deals Images Folder

## Image Specifications

### Recommended Size:
- **Dimensions**: 1200 x 720 pixels (aspect ratio 5:3)
- **Format**: JPG or WebP
- **File Size**: Maximum 200-300 KB (optimized)

### Alternative Sizes:
- **Standard**: 800 x 480 pixels (smaller file size)
- **Retina**: 1600 x 960 pixels (high-DPI displays)

## Naming Convention

Use the deal ID from `casestudy.json`:
- `deal-1.jpg` for deal with id "1"
- `deal-2.jpg` for deal with id "2"
- etc.

Or use descriptive names:
- `tppi-restructuring.jpg`
- `shariah-debt-restructuring.jpg`

## Usage in casestudy.json

Add the `image` field to each deal entry:

```json
{
  "id": "1",
  "header": "Project TPPI",
  "image": "deal-1.jpg",
  "service": "Debt Restructurings and Turnaround Management",
  ...
}
```

## Fallback Behavior

If the `image` field is:
- **Not defined**: Shows gradient placeholder with briefcase icon
- **Defined but file missing**: Shows gradient placeholder with briefcase icon
- **Defined and file exists**: Displays the image

## Image Optimization Tips

1. Use tools like TinyPNG, ImageOptim, or Squoosh
2. Set quality to 80-85% for JPG
3. Use progressive/optimized encoding
4. Consider WebP format for better compression
5. Ensure images are properly cropped to 5:3 ratio

## Example Images

Place your deal images here with appropriate names matching the `image` field in your JSON data.
