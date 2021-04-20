<?php
use app\core\blade\form\Form;

$form = new Form();
?>
<?php $form = Form::begin('', 'post') ?>
      <fieldset class="sidenav">
        <legend>Filter:</legend>
        <label for="search">Search:</label>
        <input name="search" type="text">
        <hr>
        <label>Domains:</label>
        <br>
        <input id="d" name="domain" type="radio" value="all" checked>
        <label for="d">All</label>
        <?php
        foreach($domains as $key => $domain) {
          echo "<br><input id=\"d-$key\" name=\"domain\" type=\"radio\" value=\"$domain\">";
          $domain = ucfirst($domain);
          echo "<label for=\"d-$key\"> $domain</label>";
        }
        ?>
        <hr>
        <button type="submit">Delete selected</button>
        <button name="csv" type="button" disabled>Export selected</button>
      </fieldset>
      <table>
        <tr>
          <th><a id="email">Email </a><i class="fas fa-sort"></i></th>
          <th><a id="date">Subscribed at </a><i class="fas fa-sort"></i></th>
          <th>Select <input name="select" type="checkbox"></th>
        </tr>
      </table>
<?php $form = Form::end() ?>
<script> 
  const subs = <?php echo json_encode($subs)?> 
</script>