# Headless WordPress Assessment

This is the assessment for incoming developers aimed toward experience with WordPress combined with a JavaScript-centric front-end.

Please follow the steps below and turn it in to us when you are done!

> NOTE: Anything marked as 'BONUS' is **NOT** required and is only there if you feel like showing off. That being said, feel free to show off. Have fun with it!

## Steps

- [ ] Clone this repo or create a a fresh WordPress site on your local machine using whatever editor you prefer, then establish a public repository where your code will live and can be viewed by us.
- [ ] Create a Docker-based WordPress environment that can be run via docker-compose.yml.
- [ ] Create 5 sample posts and 5 pages inside WordPress.
  - Bonus points: Use wp-cli, or some automated way to do this.
- [ ] Create a custom "Movie" post type and create 10 sample Movie posts.
  - [ ] Create a custom "Genre" taxonomy and attach it to the `movie` post type only.
- [ ] Create a headless WordPress theme (only the bare minimum theme files are required):
   - style.css
   - index.php
   - functions.php  
- [ ] Create a React app with a standard header w/ nav linking to pages, a standard footer, which talks to WordPress REST API. Create the following pages in the React app:
  - [ ] Homepage - 5 Movie Posts
    - Each post should have a featured image, an excerpt and a link to the movie single post page.
    - Bonus points: infinite scroll or pagination.
  - [ ] Single Movie Post (Featured image, title, genre, full text)
    - Bonus points: Showcase other movies.
  - [ ] Single Post (Featured image, title, text)
  - [ ] Single Page (Can be just title, text)
  - Bonus points: Hot or live refresh.
- [ ] Add SCSS compiling in and style your React app.
- [ ] Uglify your JavaScript/SCSS build
- [ ] Add a README with instructions on requirements, installation and running everything.

## Requirements

- Your environment should run in Docker via docker-compose.
- Any JavaScript libraries should be installed via package.json.
- Add installation and instructions for running your code in your README.

## Preferences

- Please don't include your whole database image (if you need to, you can include a database dump, like `dump.sql`).
- The more automated the better (think fewer steps for the assessor to complete to get things working).

## Bonus

- Use [@wordpress/env](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/) as your Docker base.
- Extend [@wordpress/scripts/config/webpack.config](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-scripts/#provide-your-own-webpack-config) and utilize as much WordPress-native JavaScript as possible.
- Add a WordPress REST cache plugin for GET requests.