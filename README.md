# Simple Layout Explanation

These three CSS parts work together to make the page look neat and centered.

## 1) `.page-background`

This is the big outer area of the page.

- It gives the page a dark background.
- It places the content in the middle.
- It makes the page at least as tall as the screen.
- It adds space around the edges so the content does not touch the sides.

Simple idea: this is the outer frame of the page.

## 2) `.content-container`

This is the white box inside the page.

- It gives the content a white background.
- It keeps the box from becoming too wide.
- It adds space inside the box so text is easier to read.
- It rounds the corners.
- It adds a shadow so the box looks like it is floating a little.

Simple idea: this is the main content card.

## 3) `.main-container`

This is another main box used for the page content.

- It gives the box a white background.
- It adds space inside the box.
- It rounds the corners.
- It adds a shadow.
- It keeps the box responsive, so it changes with screen size.
- It stops extra content from spilling outside the box.

Simple idea: this is the main section that holds your content neatly.

## How They Work Together

1. `.page-background` creates the full page background.
2. `.main-container` or `.content-container` goes inside it.
3. The white box appears in the center and holds your page content.

Think of it like this:

- `.page-background` = the room
- `.main-container` / `.content-container` = the table in the middle
- your text and buttons = the things on the table
