# Umbrellar Veeam page
Campaign page for Veeam

---

## CSS &JS

The css & js are all handled by npm/gupl/browserify.

Make sure you instlal the required npm components

`npm install`

You will also need:

- gulp `npm install gulp -g`
- browserify `npm install browserify -g`

## Watch tasks

There are 2 watch tasks to run:

`gulp watch` - watches out for scss changes.

`cd  js; watchify main.js -o 'uglifyjs -cm > bundle.min.js'` - watches for changes to the main js file.

You may need to install watchify globally: https://www.npmjs.com/package/watchify
