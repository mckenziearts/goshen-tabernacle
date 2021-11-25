// Load Trix editor scripts when find editor className
let editor = document.querySelector('.editor')
if (editor) {
  window.trix = require('trix');
}
