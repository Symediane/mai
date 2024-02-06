<?php
$articles = get_field('articles');
?>

<div class="presse__articles">
  <?php
  $articleCount = count($articles);
  $articleIndex = 0;

  // Display the first centered article
  if ($articleCount > 0) {
    $firstArticle = $articles[0];
    displayArticle($firstArticle, 'centered');
    $articleIndex++;
  }

  // Display the remaining articles in groups of 3 and 2
  while ($articleIndex < $articleCount) {
    echo '<div class="article-group">';
    for ($i = 0; $i < 3 && $articleIndex < $articleCount; $i++, $articleIndex++) {
      $article = $articles[$articleIndex];
      displayArticle($article);
    }
    echo '</div>';

    echo '<div class="article-group">';
    for ($i = 0; $i < 2 && $articleIndex < $articleCount; $i++, $articleIndex++) {
      $article = $articles[$articleIndex];
      displayArticle($article);
    }
    echo '</div>';
  }

  function displayArticle($article, $alignment = '') {
    $citation = $article['citation'];
    $magazine = $article['magazine'];
    $duree = $article['duree'];
    ?>
    <div class="presse__articles__article <?= $alignment ?>">
      <?php if ($citation) { ?>
        <div class="citation">
          <?= $citation; ?>
        </div>
      <?php } if ($magazine) { ?>
        <div class="magazine">
          <?= $magazine; ?>
        </div>
      <?php } if ($duree) { ?>
        <div class="duree">
          <?= $duree; ?>
        </div>
      <?php } ?>
    </div>
    <?php
  }
  ?>
</div>
