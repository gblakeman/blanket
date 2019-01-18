// imports all images in `/src/images` so that we are free to use them in Wordpress

// import image files
const images = require.context('./images', true, /^\.\/.*\.png|svg|jpg|gif|ico$/); // eslint-disable-line no-unused-vars
