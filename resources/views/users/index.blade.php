<?php
//echo Form::open(array('route' => ['users.update','4'],'method'=>'PUT  '));
echo Form::open(array('route' => ['users.store']));
?>
    {{ csrf_field() }}
    <!-- {{ method_field('PUT') }} <!-- spoof -->
    <?php
    echo Form::hidden('username','charmie23');
    echo "<br />";
    echo Form::hidden('password', 'passw0rd');
    echo Form::hidden('user_type', '1');
    echo "<br />";
    echo Form::submit('Click Me!');

echo Form::close();
    ?>