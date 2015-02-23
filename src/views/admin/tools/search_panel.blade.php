<form class="form-vertical" method="GET">
  <h4>Search Panel</h4>

  <?php
  $input = array_dot(Input::all());

  foreach ($forms as $form) {
    $pre_defined = ['sort', 'order'];
    if (in_array($form['name'], $pre_defined)) {
      continue;
    }

    $pre_text = '';

    $name = str_replace('[', '.', $form['name']);
    $name = str_replace(']', '', $name);

    switch ($form['type']) {
      case 'email':
        $pre_text = Form::email($form['name'], @$input[$name], $form['html']);
        break;
      
      case 'text':
        $pre_text = Form::text($form['name'], @$input[$name], $form['html']);
        break;
      
      case 'select':
        $pre_text = Form::select($form['name'], $form['options'], @$input[$name], $form['html']);
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
{{Form::hidden('sort', Input::get('sort'))}}
{{Form::hidden('order', Input::get('order'))}}
<div class="pull-right">
  <button type="submit" class="btn btn-primary">Search <span class="fa fa-search fa-fw"></span></button>
</div>
<div class="clearfix"></div>
</form>