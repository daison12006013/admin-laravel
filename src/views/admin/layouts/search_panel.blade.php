<form class="form-vertical">
  <legend>Search Panel</legend>
<?php
  foreach ($forms as $form) {
    $pre_text = '';
    $_tmp_html_tags = '';
    foreach ($form as $key => $val) {
      if ($key == 'label') continue;
      if ($key == 'options') continue;

      $_tmp_html_tags .= ' ' . $key . '="' . $val . '" ';
    }

    switch ($form['type']) {
      case 'email':
      case 'text':
        $pre_text = '<input ' . $_tmp_html_tags . '>';
      break;

      case 'select':
        $pre_text = Form::select($form['name'], $form['options'], '', ['class' => $form['class']]);
      break;
    }
?>
  <div class="form-group">
    <label>{{$form['label']}}</label>
    {{$pre_text}}
  </div>
<?php
  }
?>
<div class="pull-right">
  <button type="submit" class="btn btn-primary">Search <span class="fa fa-search fa-fw"></span></button>
</div>
<div class="clearfix"></div>
</form>