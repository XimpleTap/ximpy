{{ Form::model($profile,array('route'=>array('users.update',$profile->user_id),'method'=>'PUT')) }}
{{ method_field('PUT') }} <!-- spoof -->

{{ Form::label('email', 'Email') }}
{{ Form::text('email_address', null, array('class' => 'form-control')) }}
<br />
{{ Form::submit('Edit the Nerd!', array('class' => 'btn btn-primary')) }}
{{ Form::close() }}