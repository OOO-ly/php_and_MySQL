<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    &lt;script&gt; alert('hi'); &lt;/script&gt;
    <?= htmlspecialchars('<script>alert</script>') ?>
  </body>
</html>