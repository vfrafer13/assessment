# WordPress Developer Assessment

This is our standard assessment for incoming WordPress developers aimed toward experience with WordPress.

Please follow the steps below and turn it in to us when you are done!

## Steps

- [ ] Create a new public repisitory on a service of your choosing (Github, Gitlab or Bitbucket).
  - Note: You will be sharing this link with us and we'll go over your code together!
- [ ] Create a new WordPress Docker setup on your local machine using [this link](https://docs.docker.com/samples/wordpress/).
  - Note: We will do a screenshare and you'll walk us through your local blog.
- [ ] Create a new theme from scratch and add it to the repo.
  - Note: Do not use a theme starter/builder/helper or copy paste a previous theme.
- [ ] Your theme should include the following features:
  - An asset directory for JS/SCSS with the ability to compile utilizing Gulp or Webpack.
  - A new custom post type called "Franchise."
  - A new custom post template called "Franchise Template" (not a page template, but rather a "post template").
  - Display five (5) of the newest Franchise posts
    - Display the post:
      - Thumbnail
      - Title
      - Author
    - Wrap each post in a link to the post
  - Display in a 3-column layout that responsively wraps down to a single column as the browser width shrinks.
  - Register your styles/javascript, but ONLY enqueue if on the Franchise template.
- [ ] Create 10 sample "Franchise" posts through the Dashboard using Gutenberg editor (for live demo purposes).
- [ ] Create a "Load More" button at the bottom of your Franchise post template.
  - Using Vanilla JS, add functionality to the "load more" button to pull the next 5 posts and append them to the previous posts list.
- [ ] Commit all your code to your repo, add a README with clear instructions and send it when you're ready.

## Requirements

- Your repository must be public. If we can't see it, we can't review it.
- Use Docker so we can run it on our systems.
- No starter themes. Start from scratch!
- Add a README with clear instructions for installation and running your code.
