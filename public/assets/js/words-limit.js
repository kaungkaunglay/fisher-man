
document.addEventListener('DOMContentLoaded', function() {
  var descriptions = document.querySelectorAll('.description');
  // console.log(descriptions);
  descriptions.forEach(function(description) {
    // var words = description.textContent.split(' ');
    var words =description.textContent.match(/[\p{Script=Hiragana}\p{Script=Katakana}\p{Script=Han}a-zA-Z0-9]+/gu) || [];
    // console.log(words.length);
      if (words.length > 2) {
      description.textContent = words.slice(0, 1).join(' ') + '...';
      }
  });
});
